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
   $slider = null;
   switch (get_the_title()) {
      case 'Niños':
         //$slider = '[smartslider3 slider=5]';
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

   		</div><!-- #content -->
      </div>
   </div>
         <?php if (get_the_title() == 'Niños') { ?>

            <div class="hidden-phone selector blue-bg ninos-clas">
               <div class="sel-element">
                  <h5>CATEQUESIS</h5>
                  <div class="white-line"></div>
                  <p class="extract"><i>8 a 10 años</i></p>
                  <div class="sel-box-small">
                     <img class="sel-img" src=<?php echo get_template_directory_uri() . '/img/icon-catequesis.png'; ?> />
                     <div class="sel-icon">
                        <a href="#catequesis" />
                           <img class="sel-icon-img" src=<?php echo get_template_directory_uri() . '/img/icon-down.png'; ?> />
                        </a>
                     </div>
                  </div>
               </div>

               <div class="sel-element">
                  <h5>MOVIMIENTO INFANTIL</h5>
                  <div class="white-line"></div>
                  <p class="extract"><i>10 a 12 años</i></p>
                  <div class="sel-box-small">
                     <img class="sel-img" src=<?php echo get_template_directory_uri() . '/img/icon-movimiento-infantil.png'; ?> />
                     <div class="sel-icon">
                        <a href="#movimiento" />
                           <img class="sel-icon-img" src=<?php echo get_template_directory_uri() . '/img/icon-down.png'; ?> />
                        </a>
                     </div>
                  </div>
               </div>

               <div class="sel-element">
                  <h5>JUVENILES</h5>
                  <div class="white-line"></div>
                  <p class="extract"><i>13 a 15 años</i></p>
                  <div class="sel-box-small">
                     <img class="sel-img" src=<?php echo get_template_directory_uri() . '/img/icon-juveniles.png'; ?> />
                     <div class="sel-icon">
                        <a href="#juveniles"/>
                           <img class="sel-icon-img" src=<?php echo get_template_directory_uri() . '/img/icon-down.png'; ?> />
                        </a>
                     </div>
                  </div>
               </div>

            </div>

            <div class="inner-wrap">

               <div id="catequesis" class="ninos-type">
                  <h1 class="home-title">CATEQUESIS</h1>
                  <div class="small-line"></div>
                  <p class="extract"><i>8 a 10 años</i></p>
                  <div class="col-sm-6 col-md-7" role="complementary">
                     <!-- <h4 class="act-type-title">Actividades puntuales</h4> -->
                     <?php if ( is_active_sidebar( "kids-punctual-act-cat" ) ) : ?>
                        <?php dynamic_sidebar( "kids-punctual-act-cat"); ?>
                     <?php endif; ?>
                  </div>

                  <div class="col-sm-6 col-md-5" role="complementary">
                     <!-- <h4 class="act-type-title">Vida durante el año</h4> -->
                     <?php if ( is_active_sidebar( "kids-general-act-cat") ) : ?>
                        <?php dynamic_sidebar( "kids-general-act-cat"); ?>
                     <?php endif; ?>
                  </div>
               </div><!-- #primary -->

               <div id="movimiento" class="ninos-type">
                  <h1 class="home-title">MOVIMIENTO INFANTIL</h1>
                  <div class="small-line"></div>
                  <p class="extract"><i>10 a 12 años</i></p>
                  <div class="col-sm-6 col-md-7" role="complementary">
                     <!-- <h4 class="act-type-title">Actividades puntuales</h4> -->
                     <?php if ( is_active_sidebar( "kids-punctual-act-mov") ) : ?>
                        <?php dynamic_sidebar( "kids-punctual-act-mov"); ?>
                     <?php endif; ?>
                  </div>

                  <div class="col-sm-6 col-md-5" role="complementary">
                     <!-- <h4 class="act-type-title">Vida durante el año</h4> -->
                     <?php if ( is_active_sidebar( "kids-general-act-mov") ) : ?>
                        <?php dynamic_sidebar( "kids-general-act-mov"); ?>
                     <?php endif; ?>
                  </div>
               </div><!-- #primary -->

               <div id="juveniles" class="ninos-type">
                  <h1 class="home-title">JUVENILES</h1>
                  <div class="small-line"></div>
                  <p class="extract"><i>13 a 15 años</i></p>
                  <div class="col-sm-6 col-md-7" role="complementary">
                     <!-- <h4 class="act-type-title">Actividades puntuales</h4> -->
                     <?php if ( is_active_sidebar( "kids-punctual-act-juv") ) : ?>
                        <?php dynamic_sidebar( "kids-punctual-act-juv"); ?>
                     <?php endif; ?>
                  </div>

                  <div class="col-sm-6 col-md-5" role="complementary">
                     <!-- <h4 class="act-type-title">Vida durante el año</h4> -->
                     <?php if ( is_active_sidebar( "kids-general-act-juv") ) : ?>
                        <?php dynamic_sidebar( "kids-general-act-juv"); ?>
                     <?php endif; ?>
                  </div>
               </div><!-- #primary -->
            
            <?php do_action( 'explore_after_body_content' ); ?>
            
            </div>

         <?php } else { ?>

   <div class="inner-wrap">
      <div id="primary">
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

   <?php } ?>

<?php get_footer(); ?>