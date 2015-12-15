<?php
/**
 * Template Name: Searched Result
 */

get_header();

$status = $_GET['status'];
$city = $_GET['city'];
$type = $_GET['type'];


$args = array(
		
			'post_type' => 'property',
			
			'post_status' => 'publish',
			
			'posts_per_page' => 6,
			
			'order' => 'DESC',
			
			'orderby' => 'date',
			
			'tax_query' => array()
		
		);
		
$status = $type = $city = '';	
	
if(isset($status) && !empty($status)){
		
		$args['tax_query'][] = array(
		
			'taxonomy' => 'property_status',
			
			'field' => 'slug',
			
			//'terms' => $status
			'terms' => 'rent'
		
		);
		
	}
/*
if(isset($type) && !empty($type)){
		
		$args['tax_query'][] = array(
		
			'taxonomy' => 'property_type',
			
			'field' => 'slug',
			
			'terms' => $type
		
		);
	}
	
	if(isset($city) && !empty($city)){

		$args['tax_query'][] = Array(

			'taxonomy'=>'property_city',

			'field'=>'slug',

			'terms'=>$city

		);

	}
*/
	$ks_this_posts = new WP_Query($args);				
		
?>
<div class="main-content">
	
	<h1 class="main-heading">?? Apartments found for Sale</h1>
	
		<div class="col-md-8 col-sm-12">
		
			<?php
				
			if( $ks_this_posts -> have_posts() ) {
				
				while( $ks_this_posts -> have_posts() ) {
					
					$ks_this_posts -> the_post();
					
					$ks_property_str = new get_char( get_post( get_the_ID() ) );
					
			?>

			<div class="single-listing">
		
				<div class="row">		
				
					<div class="col-md-9 col-sm-6">
							
						<h3 class="listing-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						
						<div class="listing-images" style="float: left;">
							<a href="<?php the_permalink(); ?>">
								<div style="background-image: url('http://localhost:8080/wptesting/wp-content/themes/property-house/images/thumbnail.jpeg');"></div>
								<!--<img src="http://localhost:8080/wptesting/wp-content/themes/property-house/images/thumbnail.jpeg" />-->
							</a>
						</div>
						
						<div class="listing-features">
							<ul>
								<li>Bedrooms : <b><?php echo $ks_property_str->__meta('bedrooms'); ?></b></li>
								<li>Bathrooms: <b><?php echo $ks_property_str->__meta('bathrooms'); ?></b></li>
							</ul>
						</div>
						<div class="listing-features">
							<ul>
								<li>size : <b>2313 SqFt</b></li>
							</ul>
						</div>

						<div class="clearfix"></div>
						
						<div class="listing-location"><i class="fa fa-map-marker fa-lg"></i> Located : UAE ‪>‪ <?php echo $ks_property_str->__cate('locations', 'No Location', false); ?> ‪>‪ <?php echo $ks_property_str->__cate('property_city', 'No City', false); ?></div>	
							
					</div>
					
					<div class="col-md-3 col-sm-6">
							
						<div class="listing-price">AED 175,000 /yr</div>	
							
					</div>
				
				</div>
				
			</div>
			
			<?php
							
				}
						
			}
				
		?>
					
		</div>	
		
		<?php get_sidebar('frontpage'); ?>					
		
	</div>
	
	<div class="clearfix"></div>
	
	<div class="row col-md-12">
	
		<div  class="real-estate-footer-heading">
		
			<h2>Real Estate Links</h2>
			
		</div>
		
	</div>
	
</div>	

<?php get_footer(); ?>