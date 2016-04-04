function VK(options, id){
	var me = new Feed(options, id);

	me.offset       = 0;
	me.name 		= this.constructor.name;
	me.SITE         = 'https://vk.com/';
    me.AUTHOR_URL   = 'https://vk.com/{0}';
    me.USER_URL     = 'https://api.vk.com/method/users.get?uids={0}&fields=site,uid,first_name,last_name,nickname,screen_name,photo_big';
    me.WALL_URL     = 'https://api.vk.com/method/wall.get?domain={0}&count={1}&offset={2}';     

    me.getItems = function()
	{
		me.setUser();
		me.url = me.getURL();
		me.load(me.url);
	};      

	me.getURL = function()
	{
		return String.Format(
			me.WALL_URL,
			me.options.vk_account,
			me.options.posts_per_load,
			me.offset
		);
	};

	/**
	 * Set user
	 */
	me.setUser = function(){
		var url = String.Format(
			me.USER_URL,
			me.options.vk_account
		);

		jQuery.ajax({
			type: "GET",
			dataType: 'jsonp',
			url: url,
			success: function(response){
				if(me.in(response, ['response', 0]))
				{	
					me.user = response.response[0];
				}
			}
		});
	};

	me.getNext = function()
	{
		me.load(me.url_next);
	};   

	/**
	 * Load items
	 * @param  stirng url --- ajax url
	 */
	me.load = function(url){
		jQuery.ajax({
			type: "GET",
			dataType: 'jsonp',
			url: url,
			success: function(response){
				if(typeof(response) != 'undefined')
				{
					response = response.response.splice(1);
					me.addBricks(response);
					me.offset  += parseInt(me.options.posts_per_load);
					me.url_next = me.getURL();
				}
			},
			beforeSend: function(){
				me.beforeSend();
			},
			complete: function(){
				me.complete();
			},
			error: function(){
				me.complete();
			}
		});
	};  

	/**
	 * Get message author
	 * @param  object el --- facebook item
	 * @return string --- HTML code
	 */
	me.getAuthorPanel = function(el){
		if(me.options.show_author_panel != 'on') return '';
		
		var user_picture = me.user.photo_big != '' ? me.user.photo_big : 'http://placehold.it/30x30';

		var link = String.Format(
			me.AUTHOR_URL, 
			me.options.vk_account
		);
		var img = String.Format(
			'<img width="30" src="{0}" alt="{1}" class="circle">',
			user_picture,
			me.user.screen_name
		);
		var text = String.Format(
			'<div class="txt"><b class="title">{0}</b></div>',
			me.user.first_name + ' ' + me.user.last_name,
			me.user.site
		);
		return String.Format(
			'<a class="panel" target="_blank" href="{0}">{1}</a>',
			link,
			img + text
		);
	};    

	/**
	 * Get message counters
	 * @param  object el --- vk item
	 * @return string --- HTML code
	 */
	me.getCounters = function(el){
		if(me.options.show_counters != 'on') return '';

		var counters = [];
		var pattern  = '<li><i class="fa {0}"></i> {1}</li>';

		counters.push('<div class="counts"><ul>');
		counters.push(
			String.Format(
				pattern, 
				'fa-bullhorn',
				parseInt(el.reposts.count)
			)
		);
		counters.push(
			String.Format(
				pattern,
				'fa-heart',
				parseInt(el.likes.count)
			)
		);
		counters.push(
			String.Format(
				pattern,
				'fa-comments',
				parseInt(el.comments.count)
			)
		);
		counters.push('</ul></div>');
		return counters.join(' ');
	};

	/**
	 * Get image from element
	 * @param  object el --- vk item
	 * @return string --- image source
	 */
	me.getImage = function(el)
	{
		var picture = '';
		if(me.in(el, ['attachment', 'photo', 'src_xxbig']))
		{
			picture = el.attachment.photo.src_xxbig;
		}
		return picture;
	};  

	/**
	 * Get brick object HTML
	 * @param  object el --- response element
	 * @return object --- brick object
	 */
	me.getBrick = function(el){
		var txt = me.cutText(el.text, me.options.max_symbols_per_post);
		el.link = String.Format(
			'{0}id{1}?w=wall{1}_{2}',
			me.SITE,
			el.from_id,
			el.id
		);
		return {
			time: (el.date*1000),
			author: me.getAuthorPanel(el),
			header: me.getImageHeader(me.getImage(el), el.link) + me.getSharePanel(el.link),
			section: me.getTextSection(txt, me.getCounters(el), el.link),
			footer: me.getFooter(el.link, me.user.screen_name, me.getElapsedTime((el.date*1000)))
		};
	}; 

	return me; 
}