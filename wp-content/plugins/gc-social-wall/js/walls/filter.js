function Filter(){
	//                                       __  _          
	//     ____  _________  ____  ___  _____/ /_(_)__  _____
	//    / __ \/ ___/ __ \/ __ \/ _ \/ ___/ __/ / _ \/ ___/
	//   / /_/ / /  / /_/ / /_/ /  __/ /  / /_/ /  __(__  ) 
	//  / .___/_/   \____/ .___/\___/_/   \__/_/\___/____/  
	// /_/              /_/                                 
	var $this              = this;
	this.container         = jQuery(gc_social_wall.container);
	this.container_buttons = jQuery(gc_social_wall.container_buttons);
	this.filter_class      = 'filter';
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	                                             
	
	/**
	 * Feed filter toggle
	 * @param  object event --- click
	 */
	this.toggle = function(e)
	{
		jQuery(e.target).parents('li').toggleClass(this.filter_class);
		this.run();
		e.preventDefault();
	};

	/**
	 * Filter not neede bricks
	 */
	this.run = function(){
		this.showAllBricks(this.container);
		this.container_buttons.find('li').each(function(){
			if(jQuery(this).hasClass($this.filter_class))
			{
				$this.hideBricksByFeed($this.container, jQuery(this).find('a').attr('href').replace('#', ''));
			}
		});
		this.container.masonry('layout');
	};

	/**
	 * Show all bricks
	 * @param  object bricks --- jQuery bricks html wrapper
	 */
	this.showAllBricks = function(bricks)
	{
		bricks.find('.brick').each(function(){
			jQuery(this).show();
		});
	};

	/**
	 * Hide bricks by feed type
	 * @param  object bricks --- jQuery bricks html wrapper
	 * @param  string feed   --- feed type
	 */
	this.hideBricksByFeed = function(bricks, feed)
	{
		bricks.find('.brick.' + feed).each(function(){
			jQuery(this).hide();
		});
	};

	/**
	 * This selector class filterd?
	 * @param  string class_selector --- class selector
	 * @return {Boolean} --- true if filtered | false if not
	 */
	this.isFiltered = function(class_selector)
	{
		return this.container_buttons.find(class_selector).hasClass($this.filter_class);
	};
}