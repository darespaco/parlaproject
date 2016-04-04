function Vimeo(options, id){

	//                                       __  _          
	//     ____  _________  ____  ___  _____/ /_(_)__  _____
	//    / __ \/ ___/ __ \/ __ \/ _ \/ ___/ __/ / _ \/ ___/
	//   / /_/ / /  / /_/ / /_/ /  __/ /  / /_/ /  __(__  ) 
	//  / .___/_/   \____/ .___/\___/_/   \__/_/\___/____/  
	// /_/              /_/                                 
	var me = new Feed(options, id);

	me.offset       = 1;
	me.name 		= this.constructor.name;

	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	                                             
    me.getItems = function()
	{
		me.url = me.getURL();
		me.load(me.url);
	};      

	me.getURL = function()
	{
		return String.Format(
			'https://api.vimeo.com/users/{0}/videos?page={1}&per_page={2}&sort=date&direction=desc',
			me.options.vimeo_account,
			me.offset,
			me.options.posts_per_load
		);
	};

	/**
	 * Load items
	 * @param  stirng url --- ajax url
	 */
	me.load = function(url){
		jQuery.ajax({
			type: 'GET',
			dataType: 'json',
			url: url,
			beforeSend: function(xhrObj){
	            xhrObj.setRequestHeader("Accept","application/vnd.vimeo.*+json; version=3.2");
	            xhrObj.setRequestHeader("User-Agent","vimeo.php 1.0; (http://developer.vimeo.com/api/docs)");
	            xhrObj.setRequestHeader("Authorization","Bearer " + me.options.app_access_token);
	            me.beforeSend();
	        },
			success: function(response){
				if(typeof(response.data) != 'undefined')
				{
					me.addBricks(response.data);
					if(response.paging.next != null)
						response.paging.next = 'https://api.vimeo.com/' + response.paging.next;
					me.url_next = response.paging.next;
				}
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
	 * Get brick object HTML
	 * @param  object el --- response element
	 * @return object --- brick object
	 */
	me.getBrick = function(el){
		var re = /T.*/;
		el.created_time = me.createFromMysql(el.created_time.replace(re, ''));
		txt = me.cutText(el.description, me.options.max_symbols_per_post);
		return {
			time: el.created_time,
			author: me.getAuthorPanel(el),
			header: me.getImageHeader(me.getImage(el), el.link) + me.getSharePanel(el.link),
			section: me.getTextSection(txt, me.getCounters(el), el.link),
			footer: me.getFooter(el.link, el.user.name, me.getElapsedTime(el.created_time))
		};
	};

	/**
	 * Get image from vimeo item
	 * @param object el --- json item
	 * @return string --- picture url
	 */
	me.getImage = function(el){
		if(me.in(el, ['pictures', 'sizes']))
		{
			var image = el.pictures.sizes[el.pictures.sizes.length-1];
			return image.link;
		}
		return '';
	};

	/**
	 * Get message counters
	 * @param  object el --- instagram item
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
				'fa-heart',
				parseInt(el.metadata.connections.likes.total)
			)
		);
		counters.push(
			String.Format(
				pattern,
				'fa-comments',
				parseInt(el.metadata.connections.comments.total)
			)
		);
		counters.push(
			String.Format(
				pattern,
				'fa-eye',
				parseInt(el.stats.plays)
			)
		);
		counters.push('</ul></div>');
		return counters.join(' ');
	};

	/**
	 * Get message author
	 * @param  object el --- facebook item
	 * @return string --- HTML code
	 */
	me.getAuthorPanel = function(el){
		if(me.options.show_author_panel != 'on') return '';

		var img = String.Format(
			'<img width="30" src="{0}" alt="{1}" class="circle">',
			me.getUserPicture(el),
			el.user.name
		);
		var text = String.Format(
			'<div class="txt"><b class="title">{0}</b></div>',
			el.user.name,
			el.name
		);
		return String.Format(
			'<a class="panel" target="_blank" href="{0}">{1}</a>',
			el.user.link,
			img + text
		);
	};

	me.getUserPicture = function(el){
		if(el.user.pictures != null)
		{
			return el.user.pictures.sizes[el.user.pictures.sizes.length-1];
		}
		return 'http://placehold.it/300x300';
	};

	return me; 
}