<?php if (!session_id()) session_start();

/**
 * Template Name: Custom Search Results
 */

get_header();


$list = array();
$item = array();  
if($_GET){
	foreach($_GET as $key => $value){
		if($value != ''){
			$item['taxonomy'] = htmlspecialchars($key);
			$item['terms'] = htmlspecialchars($value);
			$item['field'] = 'slug';
			$list[] = $item;
		}		
	}
	$_SESSION['realty-search'] = !empty($list) ? $list : array();
}

$search = !empty($_SESSION['realty-search']) ? $_SESSION['realty-search'] : array();
$cleanArray = array_merge(array('relation' => 'AND'), $search);
//$cleanArray = array_merge(array('relation' => 'AND'), $list);

$args['post_type'] = 'property';

$args['showposts'] = 1;

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args['paged'] = $paged;

$args['tax_query'] = $cleanArray;

$the_query = new WP_Query( $args );

?>

<div class="main-content">
	
	<h1 class="main-heading"><?php echo ($the_query->found_posts > 0) ? $the_query->found_posts. ' Apartments found for Sale' : 'No Apartments found for Sale'; ?></h1>
	
		<div class="col-md-8 col-sm-12">
		
			<?php
				
			if( $the_query -> have_posts() ) {
				
				while( $the_query -> have_posts() ) {
					
					$the_query -> the_post();
					
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
	
</div>	

<?php get_footer(); ?>