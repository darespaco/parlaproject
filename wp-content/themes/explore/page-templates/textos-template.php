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
         <div class="page-title-slider">
            <?php the_title() ?> de interés
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

      <div class="col-md-8 articles">
         <h5 class="home-title">Artículos</h5>
         <hr class="line">
         <?php if ( is_active_sidebar( 'textos' ) ) : ?>
            <?php dynamic_sidebar( 'textos' ); ?>
         <?php endif; ?>
      </div>

      <div class="col-md-4 documents">
         <h5 class="home-title">Documentos</h5>
         <hr class="line">
         <div class="document-box">
            <h4 class="document-title">El Catecismo de la Iglesia Católica</h4>
            <div class="document-content clearfix">
               <p>El Catecismo de la Iglesia Católica presenta una exposición orgánica y sistemática de los contenidos fundamentales de la fe y de la moral católicas, a la luz de la Tradición viva de la Iglesia y del Concilio Vaticano II; y contribuye notablemente a un conocimiento más profundo y sistemático de la fe.</p>
            </div>
            <a href="http://www.vatican.va/archive/catechism_sp/index_sp.html" target="_blank"><div class="see-more-documents">Ver el Catecismo</div></a>
            <br>
            <hr class="line">
         </div>

         <div class="document-box">
            <h4 class="document-title">Otro documento fijo</h4>
            <div class="document-content clearfix">
               <p>El Catecismo de la Iglesia Católica presenta una exposición orgánica y sistemática de los contenidos fundamentales de la fe y de la moral católicas, a la luz de la Tradición viva de la Iglesia y del Concilio Vaticano II; y contribuye notablemente a un conocimiento más profundo y sistemático de la fe.</p>           
            </div>
            <a href="" target="_blank"><div class="see-more-documents">Ver documento completo</div></a>
            <br>
            <hr class="line">
         </div>
      </div>
	</div><!-- #primary -->

	<?php do_action( 'explore_after_body_content' ); ?>

<?php get_footer(); ?>