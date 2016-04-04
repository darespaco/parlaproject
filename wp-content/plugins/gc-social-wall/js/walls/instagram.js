function Instagram(options, id){

	//                                       __  _          
	//     ____  _________  ____  ___  _____/ /_(_)__  _____
	//    / __ \/ ___/ __ \/ __ \/ _ \/ ___/ __/ / _ \/ ___/
	//   / /_/ / /  / /_/ / /_/ /  __/ /  / /_/ /  __(__  ) 
	//  / .___/_/   \____/ .___/\___/_/   \__/_/\___/____/  
	// /_/              /_/                                 
	var me = new Feed(options, id);

	me.offset       = 0;
	me.name 		= this.constructor.name;

	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	                                             
    me.getItems = function()
	{
		me.url = me.getURL(me.options.search_type);
		me.load(me.url);
	};      

	me.getURL = function(type)
	{
		var urls = {
			// ==============================================================
			// POPULAR ITEMS
			// ==============================================================
			0 : String.Format(
				'https://api.instagram.com/v1/media/popular?client_id={0}&count={1}',
				me.options.client_id,
				me.options.posts_per_load
			),
			// ==============================================================
			// SEARCH BY TAG
			// ==============================================================
			1 : String.Format(
				'https://api.instagram.com/v1/tags/{0}/media/recent?client_id={1}&count={2}',       
				me.options.query,
				me.options.client_id,
				me.options.posts_per_load
			),
			// ==============================================================
			// LOCATION ID
			// ==============================================================
			2 : String.Format(
				'https://api.instagram.com/v1/locations/{0}/media/recent?client_id={1}&count={2}',  
				me.options.query,
				me.options.client_id,
				me.options.posts_per_load
			),
			// ==============================================================
			// USER FEED
			// ==============================================================
			3 : String.Format(
				'https://api.instagram.com/v1/users/{0}/media/recent?client_id={1}&count={2}',      
				me.options.query,
				me.options.client_id,
				me.options.posts_per_load
			)
		};
		return urls[type];
	};

	/**
	 * Load items
	 * @param  stirng url --- ajax url
	 */
	me.load = function(url){
		jQuery.ajax({
			type: 'GET',
			dataType: 'jsonp',
			url: url,
			beforeSend: function(){
				me.beforeSend();
			},
			success: function(response){
				if(typeof(response.data) != 'undefined')
				{
					me.addBricks(response.data);
					me.url_next = me.getNextPageURL(url, response);
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
	 * Get pagination ( next page ) url from response
	 * @param string url --- old url
	 * @param  json response --- json response
	 * @return string --- next page
	 */
	me.getNextPageURL = function(url, response){
		if(typeof(response.pagination) != 'undefined')
		{
			return response.pagination.next_url;
		}
		return url;
	};

	/**
	 * Get brick object HTML
	 * @param  object el --- response element
	 * @return object --- brick object
	 */
	me.getBrick = function(el){
		if(!me.in(el, ['caption', 'text']))
		{
			el.caption = {text : ''};
		}
		txt = me.cutText(el.caption.text, me.options.max_symbols_per_post);
		el.created_time = parseInt(el.created_time) * 1000;
		return {
			time: el.created_time,
			author: me.getAuthorPanel(el),
			header: me.getImageHeader(el.images.standard_resolution.url, el.link) + me.getSharePanel(el.link),
			section: me.getTextSection(txt, me.getCounters(el), el.link),
			footer: me.getFooter(el.link, el.user.full_name, me.getElapsedTime(el.created_time))
		};
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
	 * Get message author
	 * @param  object el --- facebook item
	 * @return string --- HTML code
	 */
	me.getAuthorPanel = function(el){
		if(me.options.show_author_panel != 'on') return '';

		var link = String.Format(
			'http://instagram.com/{0}', 
			el.user.username
		);
		var img = String.Format(
			'<img width="30" src="{0}" alt="{1}" class="circle">',
			el.user.profile_picture,
			el.user.full_name
		);
		var text = String.Format(
			'<div class="txt"><b class="title">{0}</b></div>',
			el.user.full_name,
			el.user.website
		);
		return String.Format(
			'<a class="panel" target="_blank" href="{0}">{1}</a>',
			link,
			img + text
		);
	};

	return me; 
}