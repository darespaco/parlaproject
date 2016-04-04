function Agregator(walls){
	//                                       __  _          
	//     ____  _________  ____  ___  _____/ /_(_)__  _____
	//    / __ \/ ___/ __ \/ __ \/ _ \/ ___/ __/ / _ \/ ___/
	//   / /_/ / /  / /_/ / /_/ /  __/ /  / /_/ /  __(__  ) 
	//  / .___/_/   \____/ .___/\___/_/   \__/_/\___/____/  
	// /_/              /_/                                 
	var $this = this;
	this.walls = walls;
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  

	/**
	 * Initialize wall object for each item
	 * @param  object walls --- global walls object
	 * @return object --- walls with initialized wall field
	 */
	this.initializeWalls = function(walls){
		window.autoload_busy = {};
		var options = {},
			classDictionary = {
				facebook:  'new Facebook(options, walls[i].id)',
				vk:        'new VK(options, walls[i].id)',
				instagram: 'new Instagram(options, walls[i].id)',
				post_type: 'new PostType(options, walls[i].id)',
				twitter:   'new Twitter(options, walls[i].id)',
				vimeo:     'new Vimeo(options, walls[i].id)',
			},
			result = [];


		for(var i = 0; i < walls.length; i++)
		{
			if(typeof(classDictionary[walls[i].type]) != 'undefined')
			{
				walls[i].id             = i;
				window.autoload_busy[i] = false;
				options                 = walls[i].options;
				walls[i].wall           = eval(classDictionary[walls[i].type]);
				result.push(walls[i]);
			} 
		}
		return result;
	};

	/**
	 * Reorganize options in a convenient format
	 * @param object walls --- walls options
	 * @return object --- reorganized options
	 */
	this.reorganizeOptions = function(walls){
		for(var i = 0; i < walls.length; i++)
		{
			walls[i].options = {};
			for(var x = 0; x < walls[i].values.length; x++)
			{
				walls[i].options[ walls[i].values[x].name ] = walls[i].values[x].value;
			}
		}
		return walls;
	};

	/**
	 * Initialize masonry bricks
	 */
	this.masonryInit = function(){
		jQuery(gc_social_wall.container).imagesLoaded(function(){
			jQuery(gc_social_wall.container).masonry({
				itemSelector: gc_social_wall.item_selector,
				gutter: parseInt(gc_social_wall.gutter),
				columnWidth: parseInt(gc_social_wall.width),
				isInitLayout: true,
				isResizeBound: true,
				animationOptions: {
			        duration: 300,
			        easing: 'linear',
			        queue: false
			    }
			});
		});
	};

	/**
	 * Append button to HTML
	 * @param  string type --- wall type
	 * @param  string html --- button code
	 */
	this.appendButton = function(type, html){
		if(html == '' || type == '') return '';
		if(!this.buttonAlreadyExists(type))
		{
			jQuery(gc_social_wall.container_buttons).append(html);	
		}
	};

	/**
	 * Check button already exists?
	 * @param  string type --- wall type
	 * @return boolean --- true if yes | false if not
	 */
	this.buttonAlreadyExists = function(type){
		var is_exists = false;
		jQuery(gc_social_wall.container_buttons).find('li').each(function(){
			if(jQuery(this).attr('class') == type) is_exists = true
		});
		return is_exists;
	};

	/**
	 * Load all buttons to container
	 */
	this.loadButtons = function(){
		for(var i = 0; i < this.walls.length; i++)
		{
			if(this.walls[i].options.show_button == 'on')
			{
				this.appendButton(this.walls[i].type, this.walls[i].wall.getButton());	
			}
		}
	};

	/**
	 * Load first items
	 */
	this.loadItems = function(){
		for(var i = 0; i < this.walls.length; i++)
		{
			this.walls[i].wall.getItems();
		}
	};

	/**
	 * Autoload social wall items
	 */
	this.autoLoad = function(){
		var filter = new Filter();
		var bricks_level = 0;
		jQuery(document).scroll(function() {
			bricks_level = jQuery('#bricks').offset().top + jQuery('#bricks').height() - 1000;
			if(jQuery(this).scrollTop() > bricks_level)
			{
				if($this.isLoaded())
				{
					for(var i = 0; i < $this.walls.length; i++)
					{
					
						if($this.walls[i].options.auto_load == 'on' && !filter.isFiltered('.' + $this.walls[i].wall.getType()))
						{
							$this.walls[i].wall.getNext();	
						}	
					}
				}
			}
		});
	};

	this.isLoaded = function(){
		for(var i in window.autoload_busy)
		{
			if(window.autoload_busy[i]) return false;
		}
		return true;
	}

	/**
	 * Initialize filter toggle buttons
	 */
	this.filterButtonsInit = function(){
		var filter = new Filter();
		jQuery(gc_social_wall.container_buttons + ' li a').click(function(e){
			filter.toggle(e);
		});
	};

	// ==============================================================
	// Initialize
	// ==============================================================
	this.walls = this.reorganizeOptions(this.walls);
	this.walls = this.initializeWalls(this.walls);
	this.masonryInit();
	this.loadButtons();
	this.loadItems();
	this.autoLoad();
	this.filterButtonsInit();
}