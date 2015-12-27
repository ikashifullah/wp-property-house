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
		
	<div class="col-md-8 col-sm-12">
	
		<div class="row">
		
		<?php while ( have_posts() ) : the_post(); ?>
		
		<?php the_title( '<h1 class="main-heading">', '</h1>' ); ?>
		
			<div class="col-md-8 col-sm-12">
		
			<?php 
		
			$detail_images = @unserialize(get_post_meta($post->ID, "detail_images", true)); 
			
			if(!empty($detail_images)): ?>
			
				<div class="single-image-slider">
									
					<?php 
						$i = 1;
						$total_images = count($detail_images);
												
						foreach( $detail_images  as $index => $image) {
							
							$img_src = wp_get_attachment_image_src($image, 'full');
							if($img_src !="") {
								$display = '';
								if($i > 1) {
										$display = "style='display: none;'";
								}
									printf("<a href='%s' ".$display."><img src='%s'></a>", $img_src[0], $img_src[0]);
								
							}
							
							$i++;	
						}
						
					?>
					<div class="single-total-images"><?php echo $total_images; ?> Photos - Click to enlarge</div>
				</div>			
				
			<?php endif; ?>

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		
			</div>
			
		<?php endwhile; // End of the loop. ?>
		
			<div class="col-md-4 col-sm-12">
				Similar Properties
			</div>
			
		</div> <!-- .row -->
		
	</div>	<!-- .col-md-8 .col-sm-12 -->
	
	<?php get_sidebar('frontpage'); ?>		
	
	<div class="clearfix"></div>
	
	<div class="row col-md-12">
	
		<div  class="real-estate-footer-heading">
		
			<h2>Real Estate Links</h2>
			
		</div>
		
	</div>

</div><!-- .main-content -->

<?php get_footer(); ?>
