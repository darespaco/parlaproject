<?php
/**
 * Template Name: Actividades Template
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

      <div id="primary" class="centered">
         <div class="inner-wrap">
            <div class="page-title">
               <?php the_title() ?>
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

         <div id="act-selector" class="selector">
            <h6 class="hint"> Selecciona uno de los tres grupos... </h6>
            <div class="sel-element">
               <h5>Niños</h5>
               <div class="sel-box">
                  <img class="sel-img" src=<?php echo get_template_directory_uri() . '/img/icon-niños.png'; ?> />
                  <div class="sel-icon">
                     <a href=<?php echo esc_url( get_permalink( 35 ) ); ?> />
                        <img class="sel-icon-img" src=<?php echo get_template_directory_uri() . '/img/icon-go.png'; ?> />
                     </a>
                  </div>
               </div>
            </div>

            <div class="sel-element">
               <h5>Jóvenes</h5>
               <div class="sel-box">
                  <img class="sel-img" src=<?php echo get_template_directory_uri() . '/img/icon-jovenes.png'; ?> />
                  <div class="sel-icon">
                     <a href=<?php echo esc_url( get_permalink( 33 ) ); ?> />
                        <img class="sel-icon-img" src=<?php echo get_template_directory_uri() . '/img/icon-go.png'; ?> />
                     </a>
                  </div>
               </div>
            </div>

            <div class="sel-element">
               <h5>Adultos</h5>
               <div class="sel-box">
                  <img class="sel-img" src=<?php echo get_template_directory_uri() . '/img/icon-adultos.png'; ?> />
                  <div class="sel-icon">
                     <a href=<?php echo esc_url( get_permalink( 37 ) ); ?> />
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
   	</div><!-- #primary -->

   	<?php
      if ( $layout != "no_sidebar_full_width" &&  $layout != "no_sidebar_content_centered" ) {
         get_sidebar();
      }
      ?>

   	<?php do_action( 'explore_after_body_content' ); ?>
   </div>

<?php get_footer(); ?>