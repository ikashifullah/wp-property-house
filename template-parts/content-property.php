<div class="main-content">
	
	<?php
	
	$args['post_type'] = 'property';
		
	$args['showposts'] = 5;
	
	$tax_query = array();
			
	if( is_page( 'apartment-for-sale' ) ) {  // Apartment for sale
		
		$property_for_sale = 'sale';

		$property_type = 'apartment';
		
	} else if( is_page( 'apartment-flat-for-rent' ) ) { // Apartment for Rent
		
		$property_for_sale = 'rent';

		$property_type = 'apartment';
		
	} else if( is_page( 'land-for-sale' ) ) { // Land for Sale
		
		$property_for_sale = 'sale';

		$property_type = 'land';
		
	} else if( is_page( 'rooms-for-rent' ) ) { // Rooms for rent
		
		$property_for_sale = 'rent';

		$property_type = 'rooms';
		
	} else if( is_page( 'commercial-for-sale' ) ) { // Commercial for Sale
		
		$property_for_sale = 'sale';

		$property_type = 'commercial';
		
	} else if( is_page( 'commercial-for-rent' ) ) { // Commercial for Rent
		
		$property_for_sale = 'rent';

		$property_type = 'commercial';
		
	} else if( is_page( 'villa-for-sale' ) ) { // Villa for Sale
		
		$property_for_sale = 'sale';

		$property_type = 'villa';
		
	} else if( is_page( 'villa-house-for-rent' ) ) { // Villa for Rent
		
		$property_for_sale = 'rent';

		$property_type = 'villa';
		
	}
	

	if( !empty($property_for_sale) ) {
	
		$tax_query[] = array(
			 'taxonomy' => 'property_status',
			 'terms' => $property_for_sale,
			 'field' => 'slug'
		);
		
	}
	
	if( !empty($property_type) ) {
	
		$tax_query[] = array(
			 'taxonomy' => 'property_type',
			 'terms' => $property_type,
			 'field' => 'slug'
		);
	
	}
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	$args['paged'] = $paged;

	$args['tax_query'] = $tax_query;

	//$args['meta_query'] = $meta_query;

	$cleanArray = array_merge(array('relation' => 'AND'), $args);
		
	$the_query = new WP_Query( $cleanArray );
			
	?>
	
	<h1 class="main-heading"><?php echo ($the_query->found_posts > 0) ? $the_query->found_posts. ' '. $property_type .' found for '. $property_for_sale : 'No '.$property_type.' found for '. $property_for_sale; ?></h1>
	
		<div class="col-md-8 col-sm-12">
		
			
			<?php
				
			if( $the_query -> have_posts() ) {
				
				while( $the_query -> have_posts() ) {
					
					$the_query -> the_post();
					
					get_template_part( 'template-parts/content', 'listing' );
							
				}
						
			}
			
			wp_reset_postdata();
				
			?>
		
			<div class="row page-navigation">
		
				<?php wp_pagenavi( array( 'query' => $the_query) ); ?>
				
			</div>
			
		</div>
			
		<?php get_sidebar('frontpage'); ?>					
		
</div>
	
<div class="clearfix"></div>
	
<div class="row col-md-12">

	<div  class="real-estate-footer-heading">
	
		<h2>Real Estate Links</h2>
		
	</div>
	
</div>
	

 
