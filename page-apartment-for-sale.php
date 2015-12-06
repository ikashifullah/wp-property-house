<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Property_House
 */
 

get_header(); ?>

<div class="main-content">
	
	<h1 class="main-heading">5 Apartments found for Sale</h1>
	
	<div class="col-md-8 col-sm-12">

		<div class="row">
			
			<div class="col-md-9 col-sm-6">
                    
				<div class="listing-title"><a href="#">1 Br Apartment for sale</a></div>
				
				<div class="listing-images" style="float: left;">
					<a href="#"><img src="http://localhost:8080/wptesting/wp-content/themes/property-house/images/thumbnail.jpeg" /></a>
				</div>
				
				<div class="listing-features">
					<ul>
						<li>Bedrooms : 3</li>
						<li>Bathrooms: 4</li>
						<li>size : 1432 SqFt</li>
					</ul>
				</div>	
					
			</div>
			
			<div class="col-md-3 col-sm-6">
                    
				<div class="listing-price">AED 175,000 /yr</div>	
					
			</div>
		</div>

			
			<h2 class="property-feature">Featured Properties for Rent</h2>
			
			<div class="owl-carousel"  id="property-feature-rent-id">				
				
				<div class="col-md-12">
				
					<div class="property-feature-cont">
					
						<div class="property-img">
						
							<img src="<?php echo get_template_directory_uri(); ?>/images/feature.jpg" />
							
						</div>
						
						<div class="property-feature-details">
						
							<h3><a href="#">Blandit pellentesque ridiculus luctus cras vitae, diam risus molestie morbi dui. Ut vestibulum at</a></h3>
							
						</div>
						
					</div>
					
				</div>
				
				<div class="col-md-12">
				
					<div class="property-feature-cont">
					
						<div class="property-img">
						
							<img src="<?php echo get_template_directory_uri(); ?>/images/feature.jpg" />
							
						</div>
						
						<div class="property-feature-details">
						
							<h3><a href="#">Blandit pellentesque ridiculus luctus cras vitae, diam risus molestie morbi dui. Ut vestibulum at</a></h3>
							
						</div>
						
					</div>
					
				</div>
				
				<div class="col-md-12">
				
					<div class="property-feature-cont">
					
						<div class="property-img">
						
							<img src="<?php echo get_template_directory_uri(); ?>/images/feature.jpg" />
							
						</div>
						
						<div class="property-feature-details">
						
							<h3><a href="#">Blandit pellentesque ridiculus luctus cras vitae, diam risus molestie morbi dui. Ut vestibulum at</a></h3>
							
						</div>
						
					</div>
					
				</div>
				
				<div class="col-md-12">
				
					<div class="property-feature-cont">
					
						<div class="property-img">
						
							<img src="<?php echo get_template_directory_uri(); ?>/images/feature.jpg" />
							
						</div>
						
						<div class="property-feature-details">
						
							<h3><a href="#">Blandit pellentesque ridiculus luctus cras vitae, diam risus molestie morbi dui. Ut vestibulum at</a></h3>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
			
        </div>
		
	</div>
	
	<?php get_sidebar('frontpage'); ?>		
	
	<div class="clearfix"></div>
	
	<div class="row col-md-12">
	
		<div  class="real-estate-footer-heading">
		
			<h2>Real Estate Links</h2>
			
		</div>
		
	</div>
	
</div>	

<?php get_footer(); ?>
