<?php
/**
 *
 * Template Name: Actividad Template
 *
 * Theme Page Section for our theme.
 *
 * @package ThemeGrill
 * @subpackage Explore
 * @since Explore 1.0
 */
?>



<?php
   switch (get_the_title()) {
      case 'Niños':
         $slider = '[smartslider3 slider=5]';
         $puntual = 'kids-punctual-act';
         $general = 'kids-general-act';
         break;

      case 'Jóvenes':
         $slider = '[smartslider3 slider=8]';
         $puntual = 'youth-punctual-act';
         $general = 'youth-general-act';
         break;

      case 'Adultos':
         $slider = '[smartslider3 slider=7]';
         $puntual = 'sr-punctual-act';
         $general = 'sr-general-act';
         break;
      
      default:
         # code...
         break;
   }
?>

<?php get_header(); ?>
   
   <?php echo do_shortcode('[ssbp]'); ?>
   
   <div class="inner-wrap">

      <div class="main-slider">
         <?php 
             echo do_shortcode($slider);
          ?>
      </div>

      <?php do_action( 'explore_before_body_content' ); ?>

      <div id="primary">
         <div class="page-title">
            Actividades para <?php the_title() ?>
            <br>
            <div class="small-line"></div>
         </div>
   		<div id="content" class="clearfix">

   			<?php while ( have_posts() ) : the_post(); ?>

   				<?php get_template_part( 'content', 'page' ); ?>

   			<?php endwhile; ?>
            <hr>

   		</div><!-- #content -->


         <div class="col-sm-6 col-md-7" role="complementary">
            <!-- <h4 class="act-type-title">Actividades puntuales</h4> -->
            <?php if ( is_active_sidebar( $puntual ) ) : ?>
               <?php dynamic_sidebar( $puntual ); ?>
            <?php endif; ?>
         </div>

         <div class="col-sm-6 col-md-5" role="complementary">
            <!-- <h4 class="act-type-title">Vida durante el año</h4> -->
            <?php if ( is_active_sidebar( $general ) ) : ?>
               <?php dynamic_sidebar( $general ); ?>
            <?php endif; ?>
         </div>

   	</div><!-- #primary -->

   	<?php do_action( 'explore_after_body_content' ); ?>
   </div>

<?php get_footer(); ?>