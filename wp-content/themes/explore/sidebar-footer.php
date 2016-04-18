<?php
/**
 * The Sidebar containing the footer widget areas.
 *
 * @package ThemeGrill
 * @subpackage Explore
 * @since Explore 1.0
 */
?>

<?php
/**
 * The footer widget area is triggered if any of the areas
 * have widgets. So let's check that first.
 *
 * If none of the sidebars have widgets, then let's bail early.
 */
if( !is_active_sidebar( 'explore_footer_sidebar_one' ) &&
	!is_active_sidebar( 'explore_footer_sidebar_two' ) &&
	!is_active_sidebar( 'explore_footer_sidebar_three' ) &&
	!is_active_sidebar( 'explore_footer_sidebar_four' ) ) {
	return;
}
?>
<div class="footer-widgets-wrapper">
	<div class="inner-wrap">
		<div class="footer-widgets-area clearfix">
			<div class="tg-one-third tg-column-1">
				<?php
				// Calling the footer sidebar if it exists.
				if ( !dynamic_sidebar( 'explore_footer_sidebar_one' ) ):
				endif;
				?>
			</div>
			<div class="tg-one-third tg-column-2">

				<aside id="text-3" class="widget widget_text">
					<h3 class="widget-title">
						<span>Síguenos</span>
					</h3>
		
					<div style="text-align:center">
						<a href="http://www.facebook.com/parroquia.asuncionparla" target="_blank">
							<img src=<?php echo get_template_directory_uri() . '/img/footer-facebook.png'?> title="Facebook" class="footer-social-icon" alt="Síguenos en Facebook">
						</a>

						<a href="http://twitter.com/pontifex_es" target="_blank">
							<img src=<?php echo get_template_directory_uri() . '/img/footer-twitter.png'?> title="Twitter"class="footer-social-icon" alt="Síguenos en Twitter">
						</a>

						<a href="mailto:parroquia@parla.es">
							<img src=<?php echo get_template_directory_uri() . '/img/footer-email.png'?> title="Email" class="footer-social-icon" alt="Mándanos un email">
						</a>
					</div>
				</aside>

			</div>
			<div class="tg-one-third tg-column-3">
				<?php
				// Calling the footer sidebar if it exists.
				if ( !dynamic_sidebar( 'explore_footer_sidebar_three' ) ):
				endif;
				?>
			</div>
		</div>
	</div>
</div>