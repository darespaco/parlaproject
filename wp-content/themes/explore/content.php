<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ThemeGrill
 * @subpackage Explore
 * @since Explore 1.0
 */
?>

<div class="searching-box col-md-12">
  <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
  	<?php do_action( 'explore_before_post_content' ); ?>

     	<?php
     	if( !is_single() ) {
     	?>
        	<header class="entry-header">
           	<h2 class="entry-title">
           		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a>
           	</h2>
        	</header>
     	<?php
     	}
     	?>

        <?php explore_entry_meta(); ?>

     	<?php
  		if( has_post_thumbnail() ) {
  			$image = '';
       		$title_attribute = get_the_title( $post->ID );
       		$image .= '<figure class="post-featured-image">';
    			$image .= '<a href="' . get_permalink() . '" title="'.the_title( '', '', false ).'">';
    			$image .= get_the_post_thumbnail( $post->ID, 'explore-featured', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ) ) ).'</a>';
    			$image .= '</figure>';

    			echo $image;
    		}
     	?>

     	<div class="entry-content clearfix">
     		<?php echo get_the_excerpt() . "..."; ?>
     	</div>

      <a class="text-btn" href="<?php the_permalink(); ?>">Esto es lo que busco</a>

  	<?php do_action( 'explore_after_post_content' ); ?>
  </article>
</div>