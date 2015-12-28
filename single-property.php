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
		
	<div class="col-md-9 col-sm-12">
	
		<div class="row">
		
		<?php while ( have_posts() ) : the_post(); ?>
		
		<?php
		
			$ks_property_str = new get_char( get_post( get_the_ID() ) );
			
			$latlng = unserialize(get_post_meta($post->ID, "latlng", true));
					
			$detail_images = @unserialize(get_post_meta($post->ID, "detail_images", true)); 
		
		?>
		
		<?php the_title( '<h1 class="main-heading" style="float: left;">', '</h1>' ); ?>
			<div class="single-listing-price" style="margin-top: 18px; display: inline-block;"><?php echo $ks_property_str->__meta('price_postfix'); ?> <b style="font-size: 20px;"><?php echo $ks_property_str->__meta('sale_price'); ?></b> /yr</div>
			
		
			<div class="col-md-8 col-sm-12">
		
			<?php 
			
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

				<h3> Details: </h3>
				
				<table class="single-details-list">
				
					<tr>
						
						<td style="width: 60%;"> Bedrooms: </td>
						
						<td><?php echo $ks_property_str->__meta('bedrooms'); ?></td>
					
					</tr>
					
					<tr>
						
						<td> Status: </td>
						
						<td><?php echo $ks_property_str->__cate('property_status', 'No Status', false); ?></td>
					
					</tr>
					
					<tr>
					
						<td> Size: </td>
						
						<td><?php echo $ks_property_str->__meta('area').' '. $ks_property_str->__meta('area_postfix'); ?></td>
						
					</tr>
					
					<tr>	
						
						<td>Property Reference: </td>
						
						<td><?php echo $ks_property_str->__meta('property_id'); ?></td>
						
					</tr>
					
					<tr>	
						
						<td>Amenities: </td>
						
						<td><?php echo $ks_property_str->__cate('property_amenities', 'No Amenities', false); ?></td>
						
					</tr>
				
				</table>
				
				<h3> Description: </h3>
				
				<div class="single-details-text">
				
					<?php the_content(); ?>
					
				</div>
				
			</div>
			
			
		<?php endwhile; // End of the loop. ?>
		
			<div class="col-md-4 col-sm-12">
			
				<a href="#" class="btn blue big-button"><i class="fa fa-envelope"></i> Send reply</a><p></p>
				
				<a href="#" class="btn blue big-button"><i class="fa fa-phone"></i> Show Phone Number</a><p></p>
				
				<h4 style="color: #aaabad; margin: 0;">Location</h4>
				
				<p style="color: #666;"><?php echo $ks_property_str->__cate('property_city', 'No City', false); ?>, <?php echo $ks_property_str->__cate('locations', 'No Location', false); ?></p>
				
				<div class="map_area"></div>
				
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

<?php if( !empty($latlng['lat']) && !empty($latlng['lng'])): ?>

	<script type="text/javascript">

	jQuery(document).ready(function(){

		var option = {

			map:{

				options:{

					center: new google.maps.LatLng(<?php echo $latlng['lat'];?>, <?php echo $latlng['lng'];?>),

					zoom:12,

					mapTypeControl: false,

					navigationControl: true,

					scrollwheel: false,

					streetViewControl: true

				}

			},

			marker:{

				latLng:[<?php echo $latlng['lat'];?>, <?php echo $latlng['lng'];?>],

				draggable:true

			}

		};


		jQuery(".map_area").css("height", "220px").gmap3(option);
	});

	</script>
	
<?php endif; ?>	

<?php get_footer(); ?>
