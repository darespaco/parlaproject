<?php
/**
 *
 * Template Name: Textos Template
 *
 * Theme Page Section for our theme.
 *
 * @package ThemeGrill
 * @subpackage Explore
 * @since Explore 1.0
 */
?>

<?php get_header(); ?>
   
   <div class="main-img text-bg">
      <span id="anchor-first" class="anchor"></span>
      <a class="go-anchor-button" href="#anchor-first">
         <img class="icon-down" src=<?php echo get_template_directory_uri() . '/img/icon-down.png'; ?> >
      </a>
   </div>

   <div class="inner-wrap">


      <?php do_action( 'explore_before_body_content' ); ?>

      <div id="primary">
         <div class="page-title">
            <?php the_title() ?> de interés
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