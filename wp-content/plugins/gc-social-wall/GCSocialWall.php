<?php
/*
Plugin Name: GC Social wall
Plugin URI: http://wordpress.org/plugins/gc_social_wall/
Description: This plugin helps to export your records from social networks in WordPress blog. To use it, simply insert this short code [gc_social_wall] in the right place.
Author: Guriev Eugen
Version: 1.15
Author URI: http://gurievcreative.com
*/

require_once '__.php';

class GCSocialWall{
	//                          __              __      
	//   _________  ____  _____/ /_____ _____  / /______
	//  / ___/ __ \/ __ \/ ___/ __/ __ `/ __ \/ __/ ___/
	// / /__/ /_/ / / / (__  ) /_/ /_/ / / / / /_(__  ) 
	// \___/\____/_/ /_/____/\__/\__,_/_/ /_/\__/____/  
	const FIELD_SHORT_CODE = 'gc_social_wall_short_code';                                                 
	//                                       __  _          
	//     ____  _________  ____  ___  _____/ /_(_)__  _____
	//    / __ \/ ___/ __ \/ __ \/ _ \/ ___/ __/ / _ \/ ___/
	//   / /_/ / /  / /_/ / /_/ /  __/ /  / /_/ /  __(__  ) 
	//  / .___/_/   \____/ .___/\___/_/   \__/_/\___/____/  
	// /_/              /_/                                 
	private $page;
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	public function __construct()
	{
		$this->page = new Wall\Page();

		// ==============================================================
		// Control Collections
		// ==============================================================
		$ccollection_global = new Controls\ControlsCollection(
			array(
				new Controls\Text(
					'Brick width', 
					array(
						'default-value' => '236',
						'description'   => 'Brick width in pixels.'
					), 
					array('placeholder' => 'Brick width in pixels')
				),
				new Controls\Text(
					'Brick gutter', 
					array(
						'default-value' => '10',
						'description'   => 'Brick gutter in pixels.'
					), 
					array('placeholder' => 'Brick gutter in pixels')
				),
			)
		);

		// ==============================================================
		// Sections
		// ==============================================================
		$section_global    = new Admin\Section(
			'Global settings', 
			array(
				'prefix'   => 'globals_',
				'tab_icon' => 'fa-cog'
			), 
			$ccollection_global
		);
		// ==============================================================
		// Pages
		// ==============================================================
		$page_settings = new Admin\Page(
			'Setting', 
			array('parent_page' => 'gc_social_wall'), 
			array(
				$section_global
			)
		);
		// ==============================================================
		// Actions & Filters
		// ==============================================================
		add_action('wp_ajax_saveShortCode', array(&$this, 'saveShortCodeAJAX'));
		add_action('wp_ajax_nopriv_saveShortCode', array(&$this, 'saveShortCodeAJAX'));
		add_action('wp_ajax_loadShortCode', array(&$this, 'loadShortCodeAJAX'));
		add_action('wp_ajax_nopriv_loadShortCode', array(&$this, 'loadShortCodeAJAX'));
		add_action('wp_ajax_getPosts', array(&$this, 'getPostsAJAX'));
		add_action('wp_ajax_nopriv_getPosts', array(&$this, 'getPostsAJAX'));
		add_action('wp_ajax_getTweets', array(&$this, 'getTweetsAJAX'));
		add_action('wp_ajax_nopriv_getTweets', array(&$this, 'getTweetsAJAX'));
		add_action('wp_enqueue_scripts', array(&$this, 'scriptsAndStyles'));
		// ==============================================================
		// Shortcodes
		// ==============================================================
		add_shortcode( 'gc_social_wall', array(&$this, 'initializeWall') );

	}

	/**
	 * Add scripts and styles to theme
	 */
	public function scriptsAndStyles()
	{
		// ==============================================================
		// Scripts
		// ==============================================================
		wp_enqueue_script('string-format', GCLIB_URL.'/js/string.format.js', array('jquery'));
		wp_enqueue_script('filter', GCLIB_URL.'/js/walls/filter.js', array('jquery'));
		wp_enqueue_script('agregator', GCLIB_URL.'/js/walls/agregator.js', array('jquery', 'filter'));
		wp_enqueue_script('feed', GCLIB_URL.'/js/walls/feed.js', array('jquery'));
		wp_enqueue_script('facebook_wall', GCLIB_URL.'/js/walls/facebook.js', array('jquery'));
		wp_enqueue_script('instagram_wall', GCLIB_URL.'/js/walls/instagram.js', array('jquery'));
		wp_enqueue_script('post_type_wall', GCLIB_URL.'/js/walls/post_type.js', array('jquery'));
		wp_enqueue_script('vk_wall', GCLIB_URL.'/js/walls/vk.js', array('jquery'));
		wp_enqueue_script('twitter_wall', GCLIB_URL.'/js/walls/twitter.js', array('jquery'));
		wp_enqueue_script('vimeo_wall', GCLIB_URL.'/js/walls/vimeo.js', array('jquery'));
		wp_enqueue_script('instagram_wall', GCLIB_URL.'/js/walls/instagram.js', array('jquery'));
		wp_enqueue_script('gc_social_wall', GCLIB_URL.'/js/gc_social_wall.js', array('jquery'));
		wp_localize_script('gc_social_wall', 'gc_social_wall', array(
				'container'            => '#bricks .bricks-content',
				'container_buttons'    => '#bricks nav .bricks-buttons',
				'ajax_url'             => admin_url( 'admin-ajax.php' ),
				'width'                => (string) get_option('globals_brick_width'),
				'gutter'               => (string) get_option( 'globals_brick_gutter' ),
			) 
		);
		wp_enqueue_script('masonry', GCLIB_URL.'/js/masonry.js');
		wp_enqueue_script('imagesloaded', GCLIB_URL.'/js/imagesloaded.js');
		// ==============================================================
		// Styles
		// ==============================================================
		wp_enqueue_style('gc_social_wall', GCLIB_URL.'/css/gc_social_wall.css');
		wp_enqueue_style('font-aweseome', \__::FONT_AWESOME_CSS);
	}

	public function initializeWall($atts, $content)
	{
		ob_start();
		?>
		<div id="bricks">
			<nav><ul class="bricks-buttons"></ul></nav>
			<div class="bricks-content">
			</div>
		</div>
		<script>
		var walls_to_load = <?php echo base64_decode($content); ?>;
		</script>
		<?php
		
		$var = ob_get_contents();
		ob_end_clean();
		return $var;
		
	}

	/**
	 * Get posts from ajax arguments [AJAX]
	 */
	public function getPostsAJAX()
	{
		if(!isset($_GET['args'])) die(); 
		$defaults = array(
			'posts_per_page'   => 5,
			'offset'           => 0,
			'category'         => '',
			'category_name'    => '',
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => '',
			'meta_value'       => '',
			'post_type'        => 'post',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'post_status'      => 'publish',
			'suppress_filters' => true
		);

		$args  = array_merge($defaults, $_GET['args']);
		$posts = get_posts( $args );
		if(count($posts))
		{
			foreach ($posts as &$p) 
			{
				$p->thumbnail = '';
				$user         = get_user_by( 'id', $p->post_author );
				$avatar       = get_avatar( $user->data->ID, 60);
				$user->url    = get_author_posts_url($user->data->ID);
				$user->avatar = $this->getImageURLFromHTML($avatar);
				$p->link      = get_permalink( $p->ID );
				$p->author    = $user;

				if(has_post_thumbnail($p->ID))
				{	
					$p->thumbnail = \__::getThumbnailURL($p->ID, 'medium');
				}
			}
		}
		echo json_encode(array( 'data' => $posts ));
		die();
	}

	/**
	 * Get tweets from account [AJAX]
	 */
	public function getTweetsAJAX()
	{
		$twitter = new \sdk\TwitterOAuth\TwitterOAuth(	
			$_GET['cunsumer_key'],
			$_GET['consumer_secret'],
			$_GET['oauth_token'],
			$_GET['oauth_token_secret']
		);
		if(isset($_GET['max_id']) && intval($_GET['max_id']) > 0)
		{
			$query  = sprintf(
				'https://api.twitter.com/1.1/statuses/user_timeline.json?count=%s&screen_name=%s&max_id=%s', 
				$_GET['posts_per_load'], 
				urlencode($_GET['twitter_page']),
				$_GET['max_id']
			);	
		}
		else
		{
			$query  = sprintf(
				'https://api.twitter.com/1.1/statuses/user_timeline.json?count=%s&screen_name=%s', 
				$_GET['posts_per_load'], 
				urlencode($_GET['twitter_page'])
			);
		}
		
		
		$tweets = $twitter->get($query);	
		echo json_encode($tweets);
		die();
	}

	private function getImageURLFromHTML($get_avatar)
	{
	    preg_match("/src='(.*?)'/i", $get_avatar, $matches);
	    return $matches[1];
	}

	/**
	 * Save short code to data base [AJAX]
	 */
	public function saveShortCodeAJAX()
	{
		$json['result'] = false;
		if(isset($_POST['request']) AND is_array($_POST['request']))
		{
			$json['result'] = update_option( self::FIELD_SHORT_CODE, $_POST['request'] );
		}
		echo json_encode($json);
		die();
	}

	/**
	 * Load shortcode [AJAX]
	 */
	public function loadShortCodeAJAX()
	{
		$json = array(
			'result'    => false,
			'shortcode' => ''
		);
		
		$shortcode = get_option(self::FIELD_SHORT_CODE);
		if($shortcode)
		{
			$json['result'] = true;
			$json['shortcode'] = $shortcode;
		}
		echo json_encode($json);
		die();
	}
}
// =========================================================
// LAUNCH
// =========================================================
$GLOBALS['gc_social_wall'] = new GCSocialWall();





