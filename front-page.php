<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Property_House
 */

get_header(); ?>

<div class="main-content">
	
	<h1 class="main-heading">Welcome to Property house, the right place to <b>Buy</b>, <b>sell</b> or <b>rent</b> a house</h1>
	
	<div class="col-md-8 col-sm-12">

		<div class="row">
			
			<div class="col-md-6 col-sm-6">
                    
					<h2><i class="fa fa-home"></i><a href="#"> Property for Sale</a></h2>
					
					<?php wp_nav_menu( array( 'theme_location' => 'for-sale-menu', 'menu_id' => 'for-sale-menu', 'menu_class' => 'property-type-list' ) ); ?>
					
			</div>
			
			<div class="col-md-6 col-sm-6">
                    
					<h2><i class="fa fa-home"></i><a href="#"> Property for Rent</a></h2>
					
					<?php wp_nav_menu( array( 'theme_location' => 'for-rent-menu', 'menu_id' => 'for-rent-menu', 'menu_class' => 'property-type-list' ) ); ?>
					
			</div>			
			
		</div>

		<div class="row">
			
			<div class="col-md-12">
			
				<h2><i class="fa fa-map-marker"></i><a href="#"> Property by Location</a></h2>
				
			</div>
			
			<div class="col-md-4 col-sm-4">
			
				<?php wp_nav_menu( array( 'theme_location' => 'by-location-menu-col1', 'menu_id' => 'by-location-menu-col1', 'menu_class' => 'property-type-list' ) ); ?>
				
			</div>
			
			<div class="col-md-4 col-sm-4">
			
				<?php wp_nav_menu( array( 'theme_location' => 'by-location-menu-col2', 'menu_id' => 'by-location-menu-col1', 'menu_class' => 'property-type-list' ) ); ?>
				
			</div>
			
			<div class="col-md-4 col-sm-4">
			
				<?php wp_nav_menu( array( 'theme_location' => 'by-location-menu-col3', 'menu_id' => 'by-location-menu-col1', 'menu_class' => 'property-type-list' ) ); ?>
				
			</div>
			
		</div>

		<div class="row">
			
			<h2 class="property-feature">Featured Properties for Sale</h2>
			
			<div class="owl-carousel"  id="property-feature-sale-id">				
				
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

		<div class="row">
			
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
