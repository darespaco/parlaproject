function Facebook(options, id){
	var me = new Feed(options, id);

	me.name = this.constructor.name;
	me.finish = false;

	me.args = {
		access_token: me.options.app_id + '|' + me.options.app_key,
		fields: 'type,link,picture,from,message,created_time,comments.limit(1).summary(true),likes.limit(1).summary(true),shares,attachments',
		limit: me.options.posts_per_load
	};

	me.url = String.Format(
		'https://graph.facebook.com/v2.1/{0}/posts?{1}',
		me.options.facebook_page,
		jQuery.param(me.args)
	);

	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  

	/**
	 * Get all items
	 */
	me.getItems = function(){
		me.setUserPicture();
		// ==============================================================
		// Load wall posts
		// ==============================================================
		me.load(me.url);
	};	   

	/**
	 * Get message author
	 * @param  object el --- facebook item
	 * @return string --- HTML code
	 */
	me.getAuthorPanel = function(el){
		if(me.options.show_author_panel != 'on') return '';
		
		var user_picture = me.user_picture != '' ? me.user_picture : 'http://placehold.it/30x30';

		var link = String.Format(
			'https://facebook.com/{0}', 
			me.options.facebook_page
		);
		var img = String.Format(
			'<img width="30" src="{0}" alt="{1}" class="circle">',
			user_picture,
			el.from.name
		);
		var text = String.Format(
			'<div class="txt"><b class="title">{0}</b></div>',
			el.from.name,
			el.from.category
		);
		return String.Format(
			'<a class="panel" target="_blank" href="{0}">{1}</a>',
			link,
			img + text
		);
	};

	/**
	 * Load items
	 * @param  stirng url --- ajax url
	 */
	me.load = function(url){
		if(me.finish) return true;
		jQuery.ajax({
			type: "GET",
			dataType: 'json',
			url: url,
			beforeSend: function(){
				me.beforeSend();
			},
			success: function(response){
				if(typeof(response.data) != 'undefined')
				{
					me.addBricks(response.data);
					me.url_next = response.paging.next;
				}
			},
			complete: function(){
				me.complete();
			},
			error: function(jqXHR, textStatus, errorThrown){
				me.finish = true;
				me.complete();
			}
		});
	};	

	

	/**
	 * Set user picture
	 */
	me.setUserPicture = function(){
		var args = {
			access_token: me.options.app_id + '|' + me.options.app_key,
			fields: 'url',
			redirect: 'false'
		};
		me.url_user = String.Format(
			'https://graph.facebook.com/v2.1/{0}/picture?{1}',
			me.options.facebook_page,
			jQuery.param(args)
		);

		jQuery.ajax({
			type: "GET",
			dataType: 'json',
			url: me.url_user,
			data: me.options.facebook_page,
			success: function(response){
				if(typeof(response.data.url) != 'undefined')
				{
					me.user_picture = response.data.url;
				}
			}
		});
	};

	/**
	 * Get brick object HTML
	 * @param  object el --- response element
	 * @return object --- brick object
	 */
	me.getBrick = function(el){
		var ids = el.id.split('_');
		var txt = me.getText(el);
		txt = me.cutText(txt, me.options.max_symbols_per_post);
		txt = me.wrapHashTags(txt, 'https://www.facebook.com/hashtag/{0}');
		el.link = 'https://www.facebook.com/permalink.php?story_fbid=' + ids[1] + '&id=' + ids[0];
		return {
			time: Date.parse(el.created_time),
			author: me.getAuthorPanel(el) || null,
			header:  me.getImageHeader(me.getImage(el), el.link) + me.getSharePanel(el.link),
			section: me.getTextSection(txt, me.getCounters(el), el.link),
			footer: me.getFooter(el.link, el.from.name, me.getElapsedTime(Date.parse(el.created_time)))
		};
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

		if(typeof(el.shares) == 'undefined')
		{
			el.shares = {};
			el.shares.count = 0;
		}

		counters.push('<div class="counts"><ul>');
		if(this.in(el, ['shares', 'count']))
		{
			counters.push(
				String.Format(
					pattern, 
					'fa-share-alt',
					parseInt(el.shares.count)
				)
			);
		}
		if(this.in(el, ['likes', 'summary', 'total_count']))
		{
			counters.push(
				String.Format(
					pattern,
					'fa-heart',
					parseInt(el.likes.summary.total_count)
				)
			);	
		}
		if(this.in(el, ['comments', 'summary', 'total_count']))
		{
			counters.push(
				String.Format(
					pattern,
					'fa-comments',
					parseInt(el.comments.summary.total_count)
				)
			);	
		}
		
		counters.push('</ul></div>');
		return counters.join(' ');
	};

	/**
	 * Get image from source
	 * @return object el --- faceboo item
	 */
	me.getImage = function(el){
		var picture = el.picture;
		if(me.in(el, ['attachments', 'data', 0, 'media', 'image', 'src']))
			picture = el.attachments.data[0].media.image.src;
		return picture;
	};

	/**
	 * Get text from facebook element
	 * @param  object el --- facebook element
	 * @return string --- text
	 */
	me.getText = function(el){
		var str = '';
		if(me.isset(el.story)) str += el.story;
		if(me.isset(el.message)) str += el.message;
		return str;
	};

	return me;
}



