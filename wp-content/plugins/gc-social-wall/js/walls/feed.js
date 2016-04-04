function Feed(options, id){
	//                                       __  _          
	//     ____  _________  ____  ___  _____/ /_(_)__  _____
	//    / __ \/ ___/ __ \/ __ \/ _ \/ ___/ __/ / _ \/ ___/
	//   / /_/ / /  / /_/ / /_/ /  __/ /  / /_/ /  __(__  ) 
	//  / .___/_/   \____/ .___/\___/_/   \__/_/\___/____/  
	// /_/              /_/                                 
	var $this      = this;
	this.id        = id;
	this.options   = options;
	this.url       = '';
	this.url_next  = '';
	this.name      = this.constructor.name;
	this.container = gc_social_wall.container;

	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	
	/**
	 * Get class type
	 * @return string --- class type
	 */
	this.getType = function(){
		return this.name.toLowerCase();
	};

	/**
	 * Get next items
	 */
	this.getNext = function(){
		if(this.url_next != null)
		{
			this.load(this.url_next);	
		}
	}; 

	/**
	 * Add bricks to container
	 */
	this.addBricks = function(response){
		var elements = [];
		for(var i = 0; i < response.length; i++)
		{
			elements.push( $this.wrapItem( $this.getBrick(response[i]) ) );
		}
		elements = jQuery(elements.join('')).css({opacity: 0});
		
		elements.imagesLoaded(function(){
			jQuery($this.container).append(elements);
			jQuery($this.container).masonry( 'appended', elements, true );
			elements.animate({opacity: 1});
		});
		jQuery($this.container).masonry('layout');
	};

	/**
	 * Get footer block
	 * @param  object el --- facebook item
	 * @return string --- HTML code
	 */
	this.getFooter = function(link, from_name, time_ago){
		var footer = [];

		footer.push('<footer>');
		footer.push('<a class="fb-footer" href="' + link + '" target="_blank">');
		footer.push('Ver el post original');
		footer.push('</a>');
		footer.push('</footer>');
		return footer.join(' ');
	};

	/**
	 * Get image header
	 * @param  string src --- image source
	 * @return string --- HTML code
	 */
	this.getImageHeader = function(src, link){
		if(src != '')
		{
			return '<header><a href="' + link + '" target="_blank">' + '<img src="' + src + '" alt="Image">' + '</a></header>';
		}
		return '';
	};

	/**
	 * Get text section
	 * @param  string text --- brick text
	 * @param  string counters --- counters html
	 * @return string --- HTML code
	 */
	this.getTextSection = function(text, counters, link){
		return String.Format(
			'<section><div class="text">{0}</div>{1}</section>',
			text,
			counters
		);
	};

	/**
	 * Get switcher button
	 */
	this.getButton = function(){
		return String.Format(
			'<li class="{0}"><a href="#{0}"><i class="fa fa-2x {1}"></i></a></li>',
			this.getType(),
			this.options.icon
		);
	};   

	/**
	 * Wrap one item to HTML code
	 * @param  object brick --- brick HTML object
	 * @return string --- brick HTML code
	 */
	this.wrapItem = function(brick){
		return String.Format(
			'<div data-time="{0}" class="brick {1}" > {2} <header>{3}</header> {4} {5} </div>',
			brick.time,
			this.getType(),
			brick.author,
			brick.header,
			brick.section,
			brick.footer,
			gc_social_wall.width,
			gc_social_wall.gutter
		);
	};  

	/**
	 * Get all hash tags from text
	 * @param  string text --- text with hash tags
	 * @return array --- hashtags
	 */
	this.getAllHashTags = function(text){
		return text.match(/#[^\s]*/i);
	};

	/**
	 * Wrap text hash tags
	 * @param  string text --- some text with hash tags
	 * @param  string pattern --- url pattern
	 * @return string --- text with hash tags url's
	 */
	this.wrapHashTags = function(text, pattern){
		var match = this.getAllHashTags(text);
		var tag   = '';

		if(match != null)
		{
			for(var i = 0; i < match.length; i++)
			{
				tag = match[i].replace('#', '').replace(',', '');
				tag = String.Format(pattern, tag);
				tag = String.Format('<a href="{0}">{1}</a>', tag, match[i]);
				text = text.replace(match[i], tag);
			}	
		}
		return text;
	};

	/**
	 * Get share panel to each brick
	 * @param  string url --- link to share
	 * @return string --- HTML code
	 */
	this.getSharePanel = function(url){
		var panel           = [];	
		var facebook_url    = 'http://www.facebook.com/sharer.php?u=' + url;
		var twitter_url     = 'https://twitter.com/share?url=' + url;
		var google_plus_url = 'https://plus.google.com/share?url=' + url;
		var linkedin_url    = 'http://www.linkedin.com/shareArticle?mini=true&url=' + url;

		panel.push('<ul class="share-panel">');
		// ==============================================================
		// Facebook
		// ==============================================================
		panel.push('<li class="facebook">');
		panel.push('<a href="' + facebook_url + '" target="_blank" onclick="sharePopup(this, event)">');
		panel.push('<i class="fa fa-facebook"></i>');
		panel.push('</a>');
		panel.push('</li>');
		// ==============================================================
		// Twitter
		// ==============================================================	
		panel.push('<li class="twitter">');
		panel.push('<a href="' + twitter_url + '" target="_blank" onclick="sharePopup(this, event)">');
		panel.push('<i class="fa fa-twitter"></i>');
		panel.push('</a>');
		panel.push('</li>');
		// ==============================================================
		// Google plus
		// ==============================================================
		panel.push('<li class="google-plus">');
		panel.push('<a href="' + google_plus_url + '" target="_blank" onclick="sharePopup(this, event)">');
		panel.push('<i class="fa fa-google-plus"></i>');
		panel.push('</a>');
		panel.push('</li>');
		// ==============================================================
		// Linked in
		// ==============================================================
		panel.push('<li class="linkedin">');
		panel.push('<a href="' + linkedin_url + '" target="_blank" onclick="sharePopup(this, event)">');
		panel.push('<i class="fa fa-linkedin"></i>');
		panel.push('</a>');
		panel.push('</li>');

		panel.push('</ul>');
		return panel.join(' ');
	};

	/**
	 * Get elapsed time
	 * @param  integer time --- unix timestamp
	 * @return string elapsed time
	 */
	this.getElapsedTime = function(time){
		var str   = '';
		var items = [];
		var date  = new Date();
		var d     = new Date();
		var time  = date.getTime() - time;
		var text  = '';
		var unit  = 0;
		var res   = {
			year   : 0,
			month  : 0,
			day    : 0,
			hour   : 0,
			minute : 0,
			second : 0
		};

	    var tokens = {
	        '31536000000' : 'year',
	        '2592000000'  : 'month',        
	        '86400000'    : 'day',
	        '3600000'     : 'hour',
	        '60000'       : 'minute',
	        '1000'        : 'second'
	    };

	    for(var key in tokens)
	    {
	    	text = tokens[key];
	    	unit = parseInt(key);
	    	if(time < unit) continue;
	    	
	    	res[text] = Math.floor(time/unit);
	    	time = time-(res[text]*unit);
	    }
	    for(var key in res)
	    {
	    	if(!parseInt(res[key])) continue;
	    	items.push(res[key] + ' ' + key + ' ');
	    }
	    items = items.slice(0, 2);
	    return items.join(' ') + ' ago';
	}

	/**
	 * Check variable to isset
	 * @param  mixed variable --- variable to check
	 * @return boolean --- true if succes | false if not
	 */
	this.isset = function(variable){
		return typeof(variable) != 'undefined';
	};

	/**
	 * Make long text smaller
	 * @param  string text --- long text
	 * @param  integer symbols --- limit symbols
	 * @return string --- small text aka limited
	 */
	this.cutText = function(text, symbols){
		var old_text = text;
		if(text === null) return '';
		var pieces = [];
		text = text.substr(0, parseInt(symbols)+1);
		if(text.length > symbols)
		{
			pieces = text.split(' ');

			if(pieces > 1)
				delete pieces[pieces.length-1];
			text = pieces.join(' ').trim();
			text = text.length > 0 ? text + '...' : ''; 
			return text;
		}
		return text;
	};

	/**
	 * Sort bricks by time
	 */
	this.sortBricks = function(){
		var list = jQuery(gc_social_wall.container + ' .brick').toArray();
		list.sort(function(a, b){
			if(jQuery(a).data('time') > jQuery(b).data('time')) return -1;
			return 1;
		});

		jQuery(list).appendTo(gc_social_wall.container);
		jQuery(gc_social_wall.container).masonry('reloadItems');
		jQuery(gc_social_wall.container).masonry('layout');
	}

	/**
	 * Get image header
	 * @param  string src --- image url
	 * @return string --- HTML code
	 */
	this.getImageHeader = function(src, link){
		if(src != '')
		{
			return '<a href="' + link + '" target="_blank">' + '<img src="' + src + '" alt="Image">' + '</a>';
		}
		return '';
	};

	/**
	 * Create date from MYSQL datetime string
	 * @param  string mysql_string --- mysql datetime string like: Y-m-d H:i:s
	 * @return date --- date object
	 */
	this.createFromMysql = function(mysql_string)
	{ 
	   if(typeof mysql_string === 'string')
	   {
	      var t = mysql_string.split(/[- :]/);
	      return new Date(t[0], t[1] - 1, t[2], t[3] || 0, t[4] || 0, t[5] || 0);          
	   }

	   return null;   
	}

	/**
	 * Check json branch
	 * @param  object json --- json object
	 * @param  array items --- branch items
	 * @return true if branch finded | false if not
	 */
	this.in = function(json, items)
	{
		for(var i = 0; i < items.length; i++)
		{
			if(json != null)
			{
				if(typeof(json[items[i]]) != 'undefined')
				{
					json = json[items[i]];
				}
				else return false;	
			}
			else return false;
			
		}
		return true;
	}    

	/**
	 * Standart before send AJAX
	 */
	this.beforeSend = function()
	{
		window.autoload_busy[$this.id] = true;
	};   

	/**
	 * Standart complete AJAX
	 */
	this.complete = function()
	{
		setTimeout(function(){
			window.autoload_busy[$this.id] = false;
		}, 500);
	};
}