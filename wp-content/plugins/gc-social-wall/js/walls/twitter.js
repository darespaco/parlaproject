function Twitter(options, id){

	//                                       __  _          
	//     ____  _________  ____  ___  _____/ /_(_)__  _____
	//    / __ \/ ___/ __ \/ __ \/ _ \/ ___/ __/ / _ \/ ___/
	//   / /_/ / /  / /_/ / /_/ /  __/ /  / /_/ /  __(__  ) 
	//  / .___/_/   \____/ .___/\___/_/   \__/_/\___/____/  
	// /_/              /_/                                 
	var me = new Feed(options, id);

	me.max_id = 0;
	me.isNext = false;
	me.name   = this.constructor.name;

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

	/**
	 * Generate query URL
	 * @return string --- query URL
	 */
	me.getURL = function()
	{
		var query = {
			action:             'getTweets',
			max_id: 			me.max_id,
			posts_per_load:     me.options.posts_per_load,
			twitter_page:       me.options.twitter_page,
			cunsumer_key:       me.options.cunsumer_key,
			consumer_secret:    me.options.consumer_secret,
			oauth_token:        me.options.oauth_token,
			oauth_token_secret: me.options.oauth_token_secret,
		};
		return gc_social_wall.ajax_url + '?' + jQuery.param(query);
	};

	/**
	 * Load items
	 * @param  stirng url --- ajax url
	 */
	me.load = function(url){
		var tmp = 0;
		jQuery.ajax({
			type: "GET",
			dataType: 'json',
			url: url,
			success: function(response){
				me.max_id   = response[response.length-1].id_str;
				me.url_next = me.getURL();
				
				if(me.isNext === true)
				{
					response = response.slice(1);
				}
				else
				{
					me.options.posts_per_load = parseInt(me.options.posts_per_load)+1;
				}
				me.addBricks(response);
				me.isNext = true;
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
	 * Get brick object HTML
	 * @param  object el --- response element
	 * @return object --- brick object
	 */
	me.getBrick = function(el){
		var txt = el.text;
		txt = me.cutText(txt, me.options.max_symbols_per_post);
		txt = me.wrapHashTags(txt, 'https://twitter.com/hashtag/{0}?src=hash');
		
		el.link = String.Format(
			'https://twitter.com/{0}/status/{1}', 
			el.user.screen_name, 
			el.id_str
		);			

		el.created_at = Date.parse(el.created_at);
		return {
			time: el.created_at,
			author: me.getAuthorPanel(el),
			header: me.getImageHeader(me.getImage(el), el.link) + me.getSharePanel(el.link),
			section: me.getTextSection(txt, me.getCounters(el), el.link),
			footer: me.getFooter(el.link, el.user.name, me.getElapsedTime(el.created_at))
		};
	};

	/**
	 * Get image from source
	 * @return object el --- faceboo item
	 */
	me.getImage = function(el){
		var picture = '';
		if(me.in(el, ['entities', 'media', 0, 'media_url']))
			picture = el.entities.media[0].media_url;
		return picture;
	};

	/**
	 * Get message author
	 * @param  object el --- facebook item
	 * @return string --- HTML code
	 */
	me.getAuthorPanel = function(el){
		if(me.options.show_author_panel != 'on') return '';

		var link = String.Format(
			'https://twitter.com/{0}', 
			el.user.screen_name
		);
		var img = String.Format(
			'<img width="30" src="{0}" alt="{1}" class="circle">',
			el.user.profile_image_url,
			el.user.name
		);

		var text = String.Format(
			'<div class="txt"><b class="title">{0}</b></div>',
			el.user.name,
			el.user.location
		);
		
		return String.Format(
			'<a class="panel" target="_blank" href="{0}">{1}</a>',
			link,
			img + text
		);
	};

	/**
	 * Get message counters
	 * @param  object el --- facebook item
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
				'fa-retweet',
				parseInt(el.retweet_count)
			)
		);
		counters.push(
			String.Format(
				pattern,
				'fa-star',
				parseInt(el.favorite_count)
			)
		);
		counters.push('</ul></div>');
		return counters.join(' ');
	};

	return me; 
}