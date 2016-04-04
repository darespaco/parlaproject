function PostType(options, id){
	//                                       __  _          
	//     ____  _________  ____  ___  _____/ /_(_)__  _____
	//    / __ \/ ___/ __ \/ __ \/ _ \/ ___/ __/ / _ \/ ___/
	//   / /_/ / /  / /_/ / /_/ /  __/ /  / /_/ /  __(__  ) 
	//  / .___/_/   \____/ .___/\___/_/   \__/_/\___/____/  
	// /_/              /_/                                 
	var me = new Feed(options, id);

	me.offset = 0;
	me.name   = this.constructor.name;

	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	
	/**
	 * Load items
	 */
	me.getItems = function()
	{
		me.load(me.getURL());
	};	       

	/**
	 * Load items
	 * @param  stirng url --- ajax url
	 */
	me.load = function(url){
		jQuery.ajax({
			type: "GET",
			dataType: 'json',
			url: url,
			beforeSend: function(){
				me.beforeSend();
			},
			success: function(response){
				if(response.data)
				{
					me.offset   = me.offset + parseInt(me.options.posts_per_load);
					me.url_next = me.getURL();

					me.addBricks(response.data);
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
	 * Generate URL
	 * @return string --- URL
	 */
	me.getURL = function(){
		return gc_social_wall.ajax_url + '?' + jQuery.param(me.getAtts());
	}

	/**
	 * Get query attributes
	 * @return json --- query attributes
	 */
	me.getAtts = function(){
		return atts = {
			action: 'getPosts',
			args: {
				posts_per_page: parseInt(me.options.posts_per_load),
				offset:         parseInt(me.offset),
				post_type:      me.post_type
			}
		};
	};

	/**
	 * Get brick object HTML
	 * @param  object el --- response element
	 * @return object --- brick object
	 */
	me.getBrick = function(el){
		txt = me.cutText(el.post_content, me.options.max_symbols_per_post);
		el.post_date = me.createFromMysql(el.post_date);
		return {
			time: el.post_date,
			author: null,
			header: me.getImageHeader(el.thumbnail, el.link) + me.getSharePanel(el.link),
			section: me.getTextSection(txt, me.getCounters(el), el.link),
			footer: me.getFooter(el.link, el.author.data.display_name, me.getElapsedTime(el.post_date))
		};
	};

	/**
	 * Get message counters
	 * @param  object el --- item
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
				'fa-comments',
				parseInt(el.comment_count)
			)
		);
		counters.push('</ul></div>');
		return counters.join(' ');
	};

	return me;
}