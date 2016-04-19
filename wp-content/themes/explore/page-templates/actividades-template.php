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
      </div>

         <div id="act-selector" class="selector blue-bg">
            <div class="auxiliar-down">
               <h6 class="hint">¡Entra y entérate de las actividades que realizamos en la parroquia!</h6>
            </div>
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

            <a class="go-anchor-button btn-scroll-arrow down left" href="#ns">
               <img class="icon-down" src=<?php echo get_template_directory_uri() . '/img/icon-down.png'; ?> >
            </a>
            <span id="ns" class="anchor"></span>
         </div>

         <div class="col-md-8 home-calendar">

            <h4 class="home-title">
               Calendario
               <br>
               <div class="line"></div>
            </h4>
            <?php echo do_shortcode('[ai1ec view="monthly"]'); ?>
         </div>

         <div class="col-md-4 fb-sidebar">

            <a href="https://facebook.com/parroquia.asuncionparla" target="_blank">
               <h4 class="home-title">
                  Nuestro Facebook
                  <br>
                  <div class="line"></div>
               </h4>
            </a>
            <div class="fb-timeline">
               <?php echo do_shortcode('[dpSocialTimeline id=1]'); ?>
            </div>
         </div>

   	</div><!-- #primary -->

      <div class="home-bottom">

         <div class="home-bottom-content">
           <?php es_subbox( $namefield = "NO", $desc = "", $group = "" ); ?>
         </div>

      </div>

   	<?php do_action( 'explore_after_body_content' ); ?>

<?php get_footer(); ?>