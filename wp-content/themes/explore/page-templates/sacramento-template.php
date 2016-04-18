<?php
/**
 * Template Name: Sacramento (unique) Template
 *
 * Theme Page Section for our theme.
 *
 * @package ThemeGrill
 * @subpackage Explore
 * @since Explore 1.0
 */
?>

<?php

   $slider_img = null;

   switch (get_the_title()) {
      case 'Bautismo':
         $slider_img = "baut-bg";
         $quote = "“Porque todos los que habéis sido bautizados en Cristo, de Cristo estáis revestidos”";
         $sign = "- Gálatas 3:27 -";
         $questions = array(
            "¿Puedo bautizarme?", 
            "¿Quiénes pueden ser los padrinos?", 
            "¿Cómo puedo hacer para bautizarme?", 
            "¿Tengo que ser un niño?"
         );
         $answers = array(
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida.", 
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida.", 
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida.", 
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida."
         );
         break;
      case "Penitencia":
         $slider_img = "peni-bg";
         $quote = "“Porque todos los que habéis sido bautizados en Cristo, de Cristo estáis revestidos”";
         $sign = "- Gálatas 3, 27 -";
         $questions = array(
            "¿Puedo bautizarme?", 
            "¿Quiénes pueden ser los padrinos?", 
            "¿Cómo puedo hacer para bautizarme?", 
            "¿Tengo que ser un niño?"
         );
         $answers = array(
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida.", 
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida.", 
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida.", 
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida."
         );
         break;
      case 'Confirmación':
         $slider_img = "conf-bg";
         $quote = "“Donde está el Espíritu del Señor, allí está la libertad.”";
         $sign = "- Corintios 3, 17 -";
         $questions = array(
            "¿Puedo confirmarme?", 
            "¿Quiénes pueden ser los padrinos?", 
            "¿Cómo puedo hacer para confirmarme?", 
            "¿Tengo que estar bautizado?"
         );
         $answers = array(
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida.", 
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida.", 
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida.", 
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida."
         );
         break;
      case 'Matrimonio':
         $slider_img = "matr-bg";
         $quote = "“Esta es nuestra confianza: que el que ha inaugurado entre vosotros esta buena obra, la llevará adelante hasta el Día de Cristo Jesús.”";
         $sign = "- Filipenses 1, 3-11 -";
         $questions = array(
            "¿Podemos casarnos?", 
            "¿Quiénes pueden ser los testigos?", 
            "¿Cómo podemos hacer para casarnos?", 
            "¿Tengo que ser cristiano?"
         );
         $answers = array(
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida.", 
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida.", 
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida.", 
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida."
         );
         break;
      case 'Unción de Enfermos':
         $slider_img = "unci-bg";
         $quote = "“Le sostiene Yahveh en su lecho de dolor; tú rehaces entera la postración en que se sume”";
         $sign = "- Salmo 40, 1-3 -";
         $questions = array(
            "¿Puedo recibir la extrema unción?",
            "¿Cómo puedo hacer para recibirla?", 
            "¿Tengo que ser un anciano?"
         );
         $answers = array(
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida.", 
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida.", 
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida.", 
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida."
         );
         break;
      case 'Orden Sacerdotal':
         $slider_img = "orde-bg";
         $quote = "“El hombre de la palabra de Dios, el hombre del sacramento, el hombre del misterio de la fe”";
         $sign = "- San Juan Pablo II -";
         $questions = array(
            "¿Puedo bautizarme?", 
            "¿Quiénes pueden ser los padrinos?", 
            "¿Cómo puedo hacer para bautizarme?", 
            "¿Tengo que ser un niño?"
         );
         $answers = array(
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida.", 
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida.", 
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida.", 
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida."
         );
         break;
      case 'Primera Comunión':
         $slider_img = "euca-bg";
         $quote = "“Tomó luego pan, y, dadas las gracias, lo partió y se lo dio diciendo: Este es mi cuerpo que es entregado por vosotros; haced esto en recuerdo mío.”";
         $sign = "- Lucas 22, 19 -";
         $questions = array(
            "¿Puedo bautizarme?", 
            "¿Quiénes pueden ser los padrinos?", 
            "¿Cómo puedo hacer para bautizarme?", 
            "¿Tengo que ser un niño?"
         );
         $answers = array(
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida.", 
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida.", 
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida.", 
            "Por supuesto que sí, no existen condiciones previas para ello más que el deseo de pertenecer al pueblo de la Iglesia, pertenencia que padres y padrinos de una forma especial deberán acompañar a lo largo de su vida."
         );
         break;      
      default:
         # code...
         break;
   };

?>

<?php get_header(); ?>
      
      <?php echo do_shortcode('[ssbp]'); ?>
      
      <div class="main-img <?php echo $slider_img ?>">
         <div class="page-title-slider">
            <?php the_title() ?>
            <br>
            <div class="small-line"></div>
         </div>
         <span id="anchor-first" class="anchor"></span>
         <a class="go-anchor-button" href="#anchor-first">
            <img class="icon-down" src=<?php echo get_template_directory_uri() . '/img/icon-down.png'; ?> >
         </a>
      </div>

      <?php do_action( 'explore_before_body_content' ); ?>

      <div id="primary">
         <div class="inner-wrap">
            


            <div id="content" class="clearfix">

               <blockquote style="text-align: center;">
                  <h6><span style="color: #333333;"><?php echo $quote ?></span></h6>
                  <p style="text-align: center;"><span style="color: #808080;"><em><?php echo $sign ?></em></span></p>
               </blockquote>

               <div class="col-sm-8 col-md-8">

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

               </div>

               <div class="col-sm-4 col-md-4 sacramentos-sb">

                  <a href="#sac-contact" class="text-btn contacto-btn go-anchor-button">Contáctanos</a>

                  <div class="col-md-12 border-left side-box">
                     <h5 class="home-title">Preguntas habituales</h5>

                     <?php
                        foreach ($questions as $i=>$question) {
                           echo "<h6 class='question'>" . $question . "</h6>";
                           echo "<p class='answer'>" . $answers[$i] . "</p>";
                        }

                     ?>

                  </div>

               </div>

               <div id="sac-contact" class="col-md-8 col-md-offset-2 side-box">
                  <hr />

                  <h6 class="home-title question">¿Aún tienes más preguntas? ¡Haznos todas las que quieras!</h6>

                  <!--=== Contact Form ===-->
                  <form id="contact-form" action="contact.php" method="post" novalidate="">
                     
                     <div class="form-group">
                       <div class="controls">
                        <input id="contact-name" name="contactName" placeholder="Tu nombre" class="form-control requiredField" type="text" data-error-empty="Por favor, dinos cómo te llamas">
                       </div>
                     </div><!-- End name input -->
                     
                     <div class="form-group">
                       <div class=" controls">
                        <input id="contact-mail" name="email" placeholder="Tu email" class="form-control requiredField" type="email" data-error-empty="Please enter your email" data-error-invalid="Esta dirección de email no es válida">
                       </div>
                     </div><!-- End email input -->
                     
                     <div class="form-group">
                        <div class="controls">
                           <textarea id="contact-message" name="comments" placeholder="Escribe aquí tus preguntas" class="form-control requiredField" rows="8" data-error-empty="Please enter your message"></textarea>
                        </div>
                     </div><!-- End textarea -->
                     
                     <p class="text-center"><button name="submit" type="submit" class="btn btn-quattro" data-error-message="¡Error!" data-sending-message="Enviando..." data-ok-message="¡Mensaje enviado!"><i class="fa fa-paper-plane"></i>  Enviar mensaje</button></p>
                     <input type="hidden" name="submitted" id="submitted" value="true">
                     
                  </form><!-- End contact-form -->
            
               </div>

      		</div><!-- #content -->
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