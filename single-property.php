<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Property_House
 */

get_header(); ?>

<div class="main-content">
		
		<?php while ( have_posts() ) : the_post(); ?>
		
		<?php the_title( '<h1 class="main-heading">', '</h1>' ); ?>
		
		<?php 
		
			$detail_images = @unserialize(get_post_meta($post->ID, "detail_images", true)); 
			
			if(!empty($detail_images)): ?>
			
				<div class="single-image-slider">
					
					<?php 
						foreach($detail_images as $index => $image) {
							
							$img_src = wp_get_attachment_image_src($image, 'full');
							if($img_src !="")
								printf("<li><img src='%s'></li>",$img_src[0]);
						}
					?>
					
				</div>			
				
			<?php endif; ?>

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

</div><!-- .main-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
