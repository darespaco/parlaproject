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

<?php include 'simple_html_dom.php' ?>

<?php get_header(); ?>

      <div class="home-slider">
         <?php echo do_shortcode('[smartslider3 slider=2]'); ?>
         <span id="ns" class="anchor"></span>
         <a class="go-anchor-button btn-scroll-arrow" href="#ns">
            <img class="icon-down" src=<?php echo get_template_directory_uri() . '/img/icon-down.png'; ?> >
         </a>
      </div>

      <div class="visible-phone mobile-navigation">
         <a href="#content_anchor"><div class="mb-avisos-icon col-xs-4"><img src=<?php echo get_template_directory_uri() . '/img/mobile/avisos-icon.png'; ?>></div></a>
         <a href="#content_anchor"><div class="mb-horarios-icon col-xs-4"><img src=<?php echo get_template_directory_uri() . '/img/mobile/horarios-icon.png'; ?>></div></a>
         <a href="#content_anchor"><div class="mb-calendario-icon col-xs-4"><img src=<?php echo get_template_directory_uri() . '/img/mobile/calendario-icon.png'; ?>></div></a>
         <a href="#content_anchor"><div class="mb-evangelio-icon col-xs-4"><img src=<?php echo get_template_directory_uri() . '/img/mobile/evangelio-icon.png'; ?>></div></a>
         <a href="#content_anchor"><div class="mb-redes-icon col-xs-4"><img src=<?php echo get_template_directory_uri() . '/img/mobile/redes-icon.png'; ?>></div></a>
         <a href="#content_anchor"><div class="mb-suscribete-icon col-xs-4"><img src=<?php echo get_template_directory_uri() . '/img/mobile/suscribete-icon.png'; ?>></div></a>
      </div>

      <span id="content_anchor"></span>
      <div class="home-content">

         <div class="home-main">

         		<div class="mb-avisos-section col-xs-12 col-md-8" role="complementary">

                  <?php if ( is_active_sidebar( 'home-main-left' ) ) : ?>
                     <?php dynamic_sidebar( 'home-main-left' ); ?>
                  <?php endif; ?>

         		</div>

         		<div class="mb-horarios-section col-xs-12 col-md-4 border-left" role="complementary">

            		<?php if ( is_active_sidebar( 'home-main-right' ) ) : ?>
         			<?php dynamic_sidebar( 'home-main-right' ); ?>
         		<?php endif; ?>

         		</div>

         </div>

         <div class="home-second">

            <div class="mb-calendario-section">
               <div class="col-md-8 home-calendar">

                  <h4 class="home-title">
                     Calendario
                     <br>
                     <div class="line"></div>
                  </h4>
                  <?php echo do_shortcode('[ai1ec view="monthly"]'); ?>
               </div>
            </div>

            <div class="mb-evangelio-section col-md-4 home-evangeli border-left">

                  <?php
                     $html=file_get_contents('http://evangeli.net/evangelio');         
                     $first_step = explode( 'dia_liturgic" >' , $html );
                     $second_step = explode('</p>' , $first_step[1] );
                     $ev_title = "Evangelio del día";
                     $third_step = explode('class="santoral">' , $second_step[1] );
                     $fourth_step = explode('</p>' , $third_step[1] );
                     $ev_subtitle = $second_step[0];
                     $santoral = $fourth_step[0];
                     if ($santoral) {
                        $evangeli = $second_step[2];
                     } else {
                        $evangeli = $second_step[1];
                     }
                  ?> 

                  <h4 class="home-title">
                     <?php echo $ev_title; ?>
                     <br>
                     <div class="line"></div>
                  </h4>
                  
                  <p class="home-heading">
                     <?php echo $ev_subtitle; ?>
                  </p>

                  <?php echo $evangeli . $evangeli_plus; ?>

            </div>
         </div>        

         <div class="mb-redes-section home-middle">
            <h4 class="home-title">Redes Sociales</h4>
            <h6 class="home-subtitle">¡No te pierdas las últimas novedades!</h6>
            <hr class="line">
            <br>

            <!--
            <div class="visible-phone mb-rrss-box">
               <div class="col-xs-4">
                  <div class="mb-pope-icon">
                     <img class="mb-rs-icon" src=<?php echo get_template_directory_uri() . '/img/icon-pope.jpeg'; ?> />
                  </div>
                  <p class="home-heading">Papa Francisco</p>
               </div>
               

               <div class="col-xs-4">
                  <div class="mb-parroquia-icon">
                     <img class="mb-rs-icon" src=<?php echo get_template_directory_uri() . '/img/icon-parroquia.jpg'; ?> />
                  </div>
                  <p class="home-heading">Parroquia Nuestra Señora de la Asunción</p>

               </div>

               <div class="col-xs-4">
                     <div class="mb-diocesis-icon">
                        <img class="mb-rs-icon" src=<?php echo get_template_directory_uri() . '/img/icon-getafe.jpg'; ?> />
                     </div>
                     <p class="home-heading">Diócesis de Getafe</p>
               </div>

               <div class="mb-parroquia-timeline col-xs-12">
                  <?php echo do_shortcode('[dpSocialTimeline id=1]'); ?>
               </div>
               
               <div class="mb-pope-timeline col-xs-12">
                  <?php echo do_shortcode('[dpSocialTimeline id=2]'); ?>
               </div>

               <div class="mb-diocesis-timeline col-xs-12">
                  <?php echo do_shortcode('[dpSocialTimeline id=3]'); ?>
               </div>
            </div>
            -->

            <div class="rrss-box">

               <div class="col-md-4">
                  <a href="https://twitter.com/pontifex_es" target="_blank">
                     <img class="rs-icon-over" src=<?php echo get_template_directory_uri() . '/img/icon-tw.png'; ?> />
                     <img class="rs-icon" src=<?php echo get_template_directory_uri() . '/img/icon-pope.jpeg'; ?> />
                     <p class="home-heading">Papa Francisco</p>
                  </a>
                  <?php echo do_shortcode('[dpSocialTimeline id=2]'); ?>
               </div>
               
               <div class="col-md-4">
                  <a href="https://facebook.com/parroquia.asuncionparla" target="_blank">
                     <img class="rs-icon-over" src=<?php echo get_template_directory_uri() . '/img/icon-fb.png'; ?> />
                     <img class="rs-icon" src=<?php echo get_template_directory_uri() . '/img/icon-parroquia.jpg'; ?> />
                     <p class="home-heading">Parroquia Nuestra Señora de la Asunción</p>
                  </a>
                  <?php echo do_shortcode('[dpSocialTimeline id=1]'); ?>
               </div>

               <div class="col-md-4">
                  <a href="https://twitter.com/diocesisgetafe" target="_blank">
                     <img class="rs-icon-over" src=<?php echo get_template_directory_uri() . '/img/icon-tw.png'; ?> />
                     <img class="rs-icon" src=<?php echo get_template_directory_uri() . '/img/icon-getafe.jpg'; ?> />
                     <p class="home-heading">Diócesis de Getafe</p>
                  </a>
                  <?php echo do_shortcode('[dpSocialTimeline id=3]'); ?>
               </div>

            </div>
            <!--
            <hr>
            <div class="btn btn-default moreRS">Mostrar más</div>
            -->
         </div>



         <div class="hidden-phone selector blue-bg">
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

         <div class="mb-suscribete-section home-bottom">

            <div class="home-bottom-content">
               <div class="visible-phone">
                 <h3 class="home-title">
                     Suscríbete
                     <br>
                     <div class="line"></div>
                  </h3>
                  <p class="home-heading">¡Y no te pierdas nada!</p>
               </div>

                  <div class="newsletter newsletter-subscription">
                  <form method="post" action="#" onsubmit="return newsletter_check(this)">

                     <input class="newsletter-email" type="email" name="ne" size="30" required>
                     <input class="newsletter-submit" type="submit" value="Suscríbeme"/>
                  
                  </form>
                  </div>
            </div>

         </div>

      </div>
<?php get_footer(); ?>