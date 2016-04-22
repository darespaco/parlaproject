<?php
/**
 * Template Name: Sacramentos Template
 *
 * Theme Page Section for our theme.
 *
 * @package ThemeGrill
 * @subpackage Explore
 * @since Explore 1.0
 */
?>

<?php get_header(); ?>

   

   	<?php do_action( 'explore_before_body_content' ); ?>

   	<div id="primary">
         <div class="inner-wrap">
            <div class="page-title">
               Los <?php the_title() ?>
               <br>
               <div class="small-line"></div>
            </div>
      		<div id="content" class="clearfix">

      			<?php while ( have_posts() ) : the_post(); ?>

      				<?php get_template_part( 'content', 'page' ); ?>

      				<?php
      					do_action( 'explore_before_comments_template' );
      					// If comments are open or we have at least one comment, load up the comment template
      					if ( comments_open() || '0' != get_comments_number() )
      						comments_template();
      	      		do_action ( 'explore_after_comments_template' );
      				?>

      			<?php endwhile; ?>
               
            </div><!-- #content -->
         </div>
      </div><!-- primary -->

      <div id="sacramentos-selector" class="selector blue-bg">
         <div class="sel-element">
            <h5>Bautismo</h5>
            <div class="sel-box">
               <img class="sel-img" src=<?php echo get_template_directory_uri() . '/img/icon-bautismo.png'; ?> />
               <div class="sel-icon">
                  <a href=<?php echo esc_url( get_permalink( 258 ) ); ?> />
                     <img class="sel-icon-img" src=<?php echo get_template_directory_uri() . '/img/icon-go.png'; ?> />
                  </a>
               </div>
            </div>
         </div>

         <div class="sel-element">
            <h5>Penitencia</h5>
            <div class="sel-box">
               <img class="sel-img" src=<?php echo get_template_directory_uri() . '/img/icon-penitencia.png'; ?> />
               <div class="sel-icon">
                  <a href=<?php echo esc_url( get_permalink( 262 ) ); ?> />
                     <img class="sel-icon-img" src=<?php echo get_template_directory_uri() . '/img/icon-go.png'; ?> />
                  </a>
               </div>
            </div>
         </div>

         <div class="sel-element">
            <h5>Primera Comunión</h5>
            <div class="sel-box">
               <img class="sel-img" src=<?php echo get_template_directory_uri() . '/img/icon-eucaristia.png'; ?> />
               <div class="sel-icon">
                  <a href=<?php echo esc_url( get_permalink( 264 ) ); ?> />
                     <img class="sel-icon-img" src=<?php echo get_template_directory_uri() . '/img/icon-go.png'; ?> />
                  </a>
               </div>
            </div>
         </div>

         <div class="sel-element">
            <h5>Confirmación</h5>
            <div class="sel-box">
               <img class="sel-img" src=<?php echo get_template_directory_uri() . '/img/icon-confirmacion.png'; ?> />
               <div class="sel-icon">
                  <a href=<?php echo esc_url( get_permalink( 260 ) ); ?> />
                     <img class="sel-icon-img" src=<?php echo get_template_directory_uri() . '/img/icon-go.png'; ?> />
                  </a>
               </div>
            </div>
         </div>

         <div class="sel-element">
            <h5>Matrimonio</h5>
            <div class="sel-box">
               <img class="sel-img" src=<?php echo get_template_directory_uri() . '/img/icon-matrimonio.png'; ?> />
               <div class="sel-icon">
                  <a href=<?php echo esc_url( get_permalink( 270 ) ); ?> />
                     <img class="sel-icon-img" src=<?php echo get_template_directory_uri() . '/img/icon-go.png'; ?> />
                  </a>
               </div>
            </div>
         </div>

         <div class="sel-element">
            <h5>Orden Sacerdotal</h5>
            <div class="sel-box">
               <img class="sel-img" src=<?php echo get_template_directory_uri() . '/img/icon-orden.png'; ?> />
               <div class="sel-icon">
                  <a href=<?php echo esc_url( get_permalink( 266 ) ); ?> />
                     <img class="sel-icon-img" src=<?php echo get_template_directory_uri() . '/img/icon-go.png'; ?> />
                  </a>
               </div>
            </div>
         </div>
         
         <div class="sel-element">
            <h5>Unción de enfermos</h5>
            <div class="sel-box">
               <img class="sel-img" src=<?php echo get_template_directory_uri() . '/img/icon-uncion.png'; ?> />
               <div class="sel-icon">
                  <a href=<?php echo esc_url( get_permalink( 268 ) ); ?> />
                     <img class="sel-icon-img" src=<?php echo get_template_directory_uri() . '/img/icon-go.png'; ?> />
                  </a>
               </div>
            </div>
         </div>

      </div>

      <?php
      $layout = explore_sidebar_layout();
      if ( $layout == "both_sidebar" ) {
         get_sidebar( 'left' );
      }
      ?>

   	<?php
      if ( $layout != "no_sidebar_full_width" &&  $layout != "no_sidebar_content_centered" ) {
         get_sidebar();
      }
      ?>

   	<?php do_action( 'explore_after_body_content' ); ?>
   </div>

<?php get_footer(); ?>