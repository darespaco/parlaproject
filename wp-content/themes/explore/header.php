<?php
/**
 * Theme Header Section for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main" class="clearfix">
 *
 * @package ThemeGrill
 * @subpackage Explore
 * @since Explore 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
/**
 * This hook is important for wordpress plugins and other many things
 */
wp_head();
?>
</head>

<body <?php body_class(); ?>>
<?php	do_action( 'explore_before' ); ?>
<div id="page" class="hfeed site">
	<?php do_action( 'explore_before_header' ); ?>
	<header id="masthead" class="site-header clearfix">

      <?php get_sidebar( 'header' ); ?>

		<?php if( get_theme_mod( 'explore_header_image_position', 'above' ) == 'above' ) { explore_render_header_image(); } ?>

		<div id="header-text-nav-container">
			<div class="inner-wrap">

			<!-- MOBILE VERSION HEADER -->

			   <div id="header-text-nav-wrap" class="visible-big-phone clearfix">
					
					<div id="header-right-section">
	                  

						<div id="header-left-section" class="mb-header-logo">
						<?php
						if( ( get_theme_mod( 'explore_show_header_logo_text', 'text_only' ) == 'both' || get_theme_mod( 'explore_show_header_logo_text', 'text_only' ) == 'logo_only' ) && get_theme_mod( 'explore_header_logo_image', '' ) != '' ) {
						?>
							<div id="header-logo-image">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri() . '/img/logo/logo_forum_definitivo.png'; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
							</div><!-- #header-logo-image -->
						<?php 
						}

                  $screen_reader = '';
						if( get_theme_mod( 'explore_show_header_logo_text', 'text_only' ) == 'logo_only' || get_theme_mod( 'explore_show_header_logo_text', 'text_only' ) == 'none' ) {
                     $screen_reader = 'screen-reader-text';
                  }
						?>
						<div id="header-text" class="<?php echo $screen_reader; ?>">
                     <?php if ( is_front_page() || is_home() ) : ?>
   							<h1 id="site-title">
   								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
   							</h1>
                     <?php else : ?>
                        <h3 id="site-title">
                           <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                        </h3>
                     <?php endif; ?>
                     <?php
                     $description = get_bloginfo( 'description', 'display' );
                     if ( $description || is_customize_preview() ) : ?>
							  <p id="site-description"><?php bloginfo( 'description' ); ?></p><!-- #site-description -->
                     <?php endif;?>
						</div><!-- #header-text -->
					</div><!-- #header-left-section -->

	                	<i class="fa fa-search search-top"></i>
	                	<div class="search-form-top">
	                    	 <?php get_search_form(); ?>
	                  	</div><!-- .search-form-top -->
			    	<?php if( is_active_sidebar( 'explore_header_sidebar_one' ) ||
	   is_active_sidebar( 'explore_header_sidebar_two' ) ||
	   is_active_sidebar( 'explore_header_sidebar_three' ) ) : ?>
	                     <i class="fa fa-arrow-down header-widget-controller"></i>
	                  <?php endif; ?>
	                  <?php explore_social_menu(); ?>
							<nav id="site-navigation" class="main-navigation" role="navigation">
								<p class="menu-toggle"></p>
								<?php
								if ( has_nav_menu( 'primary' ) ) {
									wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class'    => 'menu menu-primary-container' ) );
								} else {
									wp_page_menu();
								}
								?>
							</nav>
			    	</div><!-- #header-right-section -->


			   </div><!-- #header-text-nav-wrap -->

			<!-- DESKTOP VERSION -->

				<div id="header-text-nav-wrap" class="hidden-big-phone clearfix">
					<div id="header-left-section">
						<?php
						if( ( get_theme_mod( 'explore_show_header_logo_text', 'text_only' ) == 'both' || get_theme_mod( 'explore_show_header_logo_text', 'text_only' ) == 'logo_only' ) && get_theme_mod( 'explore_header_logo_image', '' ) != '' ) {
						?>
							<div id="header-logo-image">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri() . '/img/logo/logo_forum_definitivo.png'; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
							</div><!-- #header-logo-image -->
						<?php 
						}

                  $screen_reader = '';
						if( get_theme_mod( 'explore_show_header_logo_text', 'text_only' ) == 'logo_only' || get_theme_mod( 'explore_show_header_logo_text', 'text_only' ) == 'none' ) {
                     $screen_reader = 'screen-reader-text';
                  }
						?>
						<div id="header-text" class="<?php echo $screen_reader; ?>">
                     <?php if ( is_front_page() || is_home() ) : ?>
   							<h1 id="site-title">
   								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
   							</h1>
                     <?php else : ?>
                        <h3 id="site-title">
                           <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                        </h3>
                     <?php endif; ?>
                     <?php
                     $description = get_bloginfo( 'description', 'display' );
                     if ( $description || is_customize_preview() ) : ?>
							  <p id="site-description"><?php bloginfo( 'description' ); ?></p><!-- #site-description -->
                     <?php endif;?>
						</div><!-- #header-text -->
					</div><!-- #header-left-section -->
					<div id="header-right-section">
                  <?php if( is_active_sidebar( 'explore_header_sidebar_one' ) ||
   is_active_sidebar( 'explore_header_sidebar_two' ) ||
   is_active_sidebar( 'explore_header_sidebar_three' ) ) : ?>
                     <i class="fa fa-arrow-down header-widget-controller"></i>
                  <?php endif; ?>
                  <i class="fa fa-search search-top"></i>
                  <div class="search-form-top">
                     <?php get_search_form(); ?>
                  </div><!-- .search-form-top -->
                  <?php explore_social_menu(); ?>
						<nav id="site-navigation" class="main-navigation" role="navigation">
							<p class="menu-toggle"></p>
							<?php
							if ( has_nav_menu( 'primary' ) ) {
								wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class'    => 'menu menu-primary-container' ) );
							} else {
								wp_page_menu();
							}
							?>
						</nav>
			    	</div><!-- #header-right-section -->

			   </div><!-- #header-text-nav-wrap -->

			</div><!-- .inner-wrap -->
			<!--
			<?php
				/*$religiousTime = "T. Ordinario";*/
			?>
			<a id="religious-time" class="btn-1" href="http://conferenciaepiscopal.es/wp-content/uploads/2015/12/Calendario_liturgico_2015-2016.pdf" target="_blank"><?php echo $religiousTime ?></a>
			-->
		</div><!-- #header-text-nav-container -->

		<?php if( get_theme_mod( 'explore_header_image_position', 'above' ) == 'below' ) { explore_render_header_image(); } ?>

		<?php
      if( is_front_page() && !is_home() && get_theme_mod( 'explore_activate_slider', '0' ) == '1' ) {
         explore_featured_image_slider();
      }
      // showing the pages/posts title
		if( ( '' != explore_header_title() )  && !( is_front_page() ) && false) { ?>
			<div class="header-post-title-container clearfix">
				<div class="inner-wrap">
					<div class="post-title-wrapper">
						<?php
						if( '' != explore_header_title() ) {
						?>
					   	<h1 class="header-post-title-class"><?php echo explore_header_title(); ?></h1>
					   <?php
						}
						?>
					</div>
					<?php if( function_exists( 'explore_breadcrumb' ) ) { explore_breadcrumb(); } ?>
				</div>
			</div>
			<?php
	   	}
		?>
	</header>
	<?php do_action( 'explore_after_header' ); ?>
	<?php do_action( 'explore_before_main' ); ?>
	<div id="main" class="clearfix">