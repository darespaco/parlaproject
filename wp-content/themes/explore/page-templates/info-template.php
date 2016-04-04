<?php
/**
 * Template Name: Info Template
 *
 * Displays the Info Page Template of the theme.
 *
 * @package ThemeGrill
 * @subpackage Explore
 * @since Explore 1.0
 * @author Diego Arespacochaga
 */
?>

<?php get_header(); ?>

<div class="inner-wrap home">

	<div class="col-sm-6 col-md-9" role="complementary">
		<?php if ( is_active_sidebar( 'info-main' ) ) : ?>
			<?php dynamic_sidebar( 'info-main' ); ?>
		<?php endif; ?>
	</div>

	<div class="col-sm-6 col-md-3" role="complementary">
		<?php if ( is_active_sidebar( 'info-sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'info-sidebar' ); ?>
		<?php endif; ?>
	</div>

</div>

<?php get_footer(); ?>