<?php
/**
 * Template Name: Home template
 *
 * This is the template that displays full width page without sidebar
 *
 * @package dazzling
 */

get_header(); ?>

	<?php echo do_shortcode('[smartslider3 slider=2]'); ?>

	<div class="home-widget-area row">
		<?php if ( is_active_sidebar( 'home-avisos' ) ) : ?>
		<div class="col-sm-6 col-md-8 home-widget" role="complementary">
			<?php dynamic_sidebar( 'home-avisos' ); ?>
		</div><!-- .widget-area .first -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'home-info' ) ) : ?>
		<div class="col-sm-6 col-md-4 home-widget" role="complementary">
			<?php dynamic_sidebar( 'home-info' ); ?>
		</div><!-- .widget-area .second -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'home-rsp' ) ) : ?>
		<div class="col-sm-6 col-md-4 home-widget" role="complementary">
			<?php dynamic_sidebar( 'home-rsp' ); ?>
		</div><!-- .widget-area .third -->
		<?php endif; ?>
    
    <?php if ( is_active_sidebar( 'home-rsd' ) ) : ?>
		<div class="col-sm-6 col-md-4 home-widget" role="complementary">
			<?php dynamic_sidebar( 'home-rsd' ); ?>
		</div><!-- .widget-area .fourth -->
		<?php endif; ?>
    
    <?php if ( is_active_sidebar( 'home-rss' ) ) : ?>
		<div class="col-sm-6 col-md-4 home-widget" role="complementary">
			<?php dynamic_sidebar( 'home-rss' ); ?>
		</div><!-- .widget-area .fifth -->
		<?php endif; ?>
    
    <?php if ( is_active_sidebar( 'home-suscribe' ) ) : ?>
		<div class="col-sm-6 col-md-4 home-widget" role="complementary">
			<?php dynamic_sidebar( 'home-suscribe' ); ?>
		</div><!-- .widget-area .sixth -->
		<?php endif; ?>
    
	</div>

	<div id="primary" class="content-area col-sm-12 col-md-12">
		<main id="main" class="site-main" role="main">

			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
