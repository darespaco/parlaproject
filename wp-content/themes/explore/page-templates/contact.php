<?php
/**
 * Template Name: Contact Page Template
 *
 * Displays the Contact Page Template of the theme.
 *
 * @package ThemeGrill
 * @subpackage Explore
 * @since Explore 1.0
 */
?>

<?php get_header(); ?>

   <div class="inner-wrap">

   	<?php do_action( 'explore_before_body_content' ); ?>

   	<div id="primary">
         <div class="page-title">
            <?php the_title() ?>
            <br>
            <div class="small-line"></div>
         </div>

   		<div id="sac-contact" class="col-md-8 col-md-offset-2 side-box">
            <a href="tel://916787878"><p class="home-subtitle">Teléfono: (+34) 916787878</p></a>
            <hr />

            <h6 class="home-title question">¡Cuéntanos! ¿Alguna pregunta sobre la parroquia?</h6>

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
   	</div><!-- #primary -->


   	<?php do_action( 'explore_after_body_content' ); ?>

   </div>

<?php get_footer(); ?>