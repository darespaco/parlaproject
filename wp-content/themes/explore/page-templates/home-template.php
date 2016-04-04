<?php
/**
 * Template Name: Home Template
 *
 * Displays the Home Page Template of the theme.
 *
 * @package ThemeGrill
 * @subpackage Explore
 * @since Explore 1.0
 * @author Diego Arespacochaga
 */
?>

<?php get_header(); ?>

      <div class="home-slider">
       	<?php echo do_shortcode('[smartslider3 slider=2]'); ?>
         <span id="anchor-first" class="anchor"></span>
         <a class="go-anchor-button" href="#anchor-first">
            <img class="icon-down" src=<?php echo get_template_directory_uri() . '/img/icon-down.png'; ?> >
         </a>
      </div>

      <div class="home-content">

         <div class="home-main">

         		<div class="col-sm-8 col-md-8" role="complementary">

         			<?php if ( is_active_sidebar( 'home-main-left' ) ) : ?>
         				<?php dynamic_sidebar( 'home-main-left' ); ?>
         		<?php endif; ?>

         		</div>

         		<div class="col-sm-4 col-md-4 border-left" role="complementary">

            		<?php if ( is_active_sidebar( 'home-main-right' ) ) : ?>
         			<?php dynamic_sidebar( 'home-main-right' ); ?>
         		<?php endif; ?>

         		</div>

         <div class="anchor">
            <a class="go-anchor-button" href="#anchor-second">
               <img id="anchor-second" class="icon-down" src=<?php echo get_template_directory_uri() . '/img/icon-down.png'; ?> >
            </a>
         </div>
         </div>

         <div class="selector blue-bg">
               <h6>¿Qué puedes encontrar en la web?</h6>
               <div class="sel-element sel-small">
                  <h5>Vida Parroquial</h5>
                  <div class="sel-box">
                     <img class="sel-img" src=<?php echo get_template_directory_uri() . '/img/icon-actividades.png'; ?> />
                     <div class="sel-icon">
                        <a href=<?php echo esc_url( get_permalink( 7 ) ); ?> />
                           <img class="sel-icon-img" src=<?php echo get_template_directory_uri() . '/img/icon-go.png'; ?> />
                        </a>
                     </div>
                  </div>
                  <p class="extract">Compañía para la vida. Para pequeños y mayores<br><i>¡Entra y entérate!</i></p>
               </div>

               <div class="sel-element sel-small">
                  <h5>Sacramentos</h5>
                  <div class="sel-box">
                     <img class="sel-img" src=<?php echo get_template_directory_uri() . '/img/icon-sacramentos.png'; ?> />
                     <div class="sel-icon">
                        <a href=<?php echo esc_url( get_permalink( 18 ) ); ?> />
                           <img class="sel-icon-img" src=<?php echo get_template_directory_uri() . '/img/icon-go.png'; ?> />
                        </a>
                     </div>
                  </div>
                  <p class="extract">¿Conoces los Sacramentos, cuáles son y qué significan?<br><i>¡Entra e infórmate!</i></p>
               </div>

               <div class="sel-element sel-small">
                  <h5>Textos</h5>
                  <div class="sel-box">
                     <img class="sel-img" src=<?php echo get_template_directory_uri() . '/img/icon-articulos.png'; ?> />
                     <div class="sel-icon">
                        <a href=<?php echo esc_url( get_permalink( 9 ) ); ?> />
                           <img class="sel-icon-img" src=<?php echo get_template_directory_uri() . '/img/icon-go.png'; ?> />
                        </a>
                     </div>
                  </div>
                  <p class="extract">Lo que merece la pena hay que compartirlo<br><i>¡Entra y descúbrelo!</i></p>
               </div>

               <div class="sel-element sel-small">
                  <h5>Contacto</h5>
                  <div class="sel-box">
                     <img class="sel-img" src=<?php echo get_template_directory_uri() . '/img/icon-contacto.png'; ?> />
                     <div class="sel-icon">
                        <a href=<?php echo esc_url( get_permalink( 37 ) ); ?> />
                           <img class="sel-icon-img" src=<?php echo get_template_directory_uri() . '/img/icon-go.png'; ?> />
                        </a>
                     </div>
                  </div>
                  <p class="extract">Y para cualquier duda que te surja<br><i>¡Entra y pregunta!</i></p>
               </div>
         </div>

         <div class="home-middle">
            <h4 class="home-title">Redes Sociales</h4>
            <h6 class="home-title">¡No te pierdas las últimas novedades!</h6>
            <hr class="line">
            <br>

            <div class="rrss-box">

               <div class="col-md-4">
                  <a href="https://twitter.com/pontifex_es" target="_blank">
                     <img class="rs-icon-over" src=<?php echo get_template_directory_uri() . '/img/icon-tw.png'; ?> />
                     <img class="rs-icon" src=<?php echo get_template_directory_uri() . '/img/icon-pope.jpeg'; ?> />
                     <h6 class="home-title">Papa Francisco</h6>
                  </a>
                  <?php echo do_shortcode('[dpSocialTimeline id=2]'); ?>
               </div>
               
               <div class="col-md-4">
                  <a href="https://facebook.com/parroquia.asuncionparla" target="_blank">
                     <img class="rs-icon-over" src=<?php echo get_template_directory_uri() . '/img/icon-fb.png'; ?> />
                     <img class="rs-icon" src=<?php echo get_template_directory_uri() . '/img/icon-parroquia.jpg'; ?> />
                     <h6 class="home-title">Parroquia Nuestra Señora de la Asunción</h6>
                  </a>
                  <?php echo do_shortcode('[dpSocialTimeline id=1]'); ?>
               </div>

               <div class="col-md-4">
                  <a href="https://twitter.com/diocesisgetafe" target="_blank">
                     <img class="rs-icon-over" src=<?php echo get_template_directory_uri() . '/img/icon-tw.png'; ?> />
                     <img class="rs-icon" src=<?php echo get_template_directory_uri() . '/img/icon-getafe.jpg'; ?> />
                     <h6 class="home-title">Diócesis de Getafe</h6>
                  </a>
                  <?php echo do_shortcode('[dpSocialTimeline id=3]'); ?>
               </div>

            </div>
            <hr>
            <div class="btn btn-default moreRS">Mostrar más</div>

         </div>

         <div class="home-bottom">

            <div class="home-bottom-content">
              <?php es_subbox( $namefield = "NO", $desc = "", $group = "" ); ?>
            </div>

         </div>

      </div>
<?php get_footer(); ?>