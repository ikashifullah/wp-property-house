<?php if (!session_id()) session_start();

/**
 * Template Name: Custom Search Results
 */

get_header();

$list = array();
$item = array();  
/*
if($_GET){
	foreach($_GET as $key => $value){
	//	echo $key. ' ';
		
		if($value != ''){
			$item['taxonomy'] = htmlspecialchars($key);
			$item['terms'] = htmlspecialchars($value);
			$item['field'] = 'slug';
			$list[] = $item;
		}		
	}
	$_SESSION['realty-search'] = !empty($list) ? $list : array();
}
*/
$tax_query = array();
if( !empty($_GET['property_status']) ) {
	
	$tax_query[] = array(
         'taxonomy' => 'property_status',
         'terms' => $_GET['property_status'],
         'field' => 'slug'
    );
}
if( !empty($_GET['property_type']) ) {
	
	$tax_query[] = array(
         'taxonomy' => 'property_type',
         'terms' => $_GET['property_type'],
         'field' => 'slug'
    );
}
if( !empty($_GET['property_city']) ) {
	
	$tax_query[] = array(
         'taxonomy' => 'property_city',
         'terms' => $_GET['property_city'],
         'field' => 'slug'
    );
}
if( !empty($_GET['locations']) ) {
	
	$tax_query[] = array(
         'taxonomy' => 'locations',
         'terms' => $_GET['locations'],
         'field' => 'slug'
    );
}

/*$search = !empty($_SESSION['realty-search']) ? $_SESSION['realty-search'] : array();
$cleanArray = array_merge(array('relation' => 'AND'), $search); */


$args['post_type'] = 'property';

$args['showposts'] = 5;

$meta_query = array();
if (!empty($_GET['prop_id'])) {
    $meta_query[] = array(
         'key' => 'property_id',
         'value' => $_GET['prop_id'],
         'compare' => 'LIKE'
    );
}

if(!empty( $_GET['min_bedroom'] ) && empty( $_GET['max_bedroom'] ) ) {
	$meta_query[] = array(
         'key' => 'bedrooms',
         'value'   => $_GET['min_bedroom'],
		 'compare' => '>='
    );	
} else if(!empty( $_GET['max_bedroom'] ) && empty( $_GET['min_bedroom'] ) ) {
	$meta_query[] = array(
         'key' => 'bedrooms',
         'value'   => $_GET['max_bedroom'],
		 'compare' => '<='
    );	
} else if( !empty( $_GET['min_bedroom'] ) && !empty( $_GET['max_bedroom'] ) ) {
	$meta_query[] = array(
         'key' => 'bedrooms',
         'value'   => array($_GET['min_bedroom'], $_GET['max_bedroom']),
		 'type' => 'numeric',
         'compare' => 'BETWEEN'
    );
}

if(!empty( $_GET['min_bathroom'] ) && empty( $_GET['max_bathroom'] ) ) {
	$meta_query[] = array(
         'key' => 'bedrooms',
         'value'   => $_GET['min_bathroom'],
		 'compare' => '>='
    );	
} else if(!empty( $_GET['max_bathroom'] ) && empty( $_GET['min_bathroom'] ) ) {
	$meta_query[] = array(
         'key' => 'bedrooms',
         'value'   => $_GET['max_bathroom'],
		 'compare' => '<='
    );	
} else if( !empty( $_GET['min_bathroom'] ) && !empty( $_GET['max_bathroom'] ) ) {
	$meta_query[] = array(
         'key' => 'bedrooms',
         'value'   => array($_GET['min_bathroom'], $_GET['max_bathroom']),
		 'type' => 'numeric',
         'compare' => 'BETWEEN'
    );
}

/* Bedroom Checks */
/*
if($_GET['min_bedroom'] == '' && $_GET['max_bedroom'] != '') {
	$_GET['min_bedroom'] = 0;
} else if($_GET['max_bedroom'] == '' && $_GET['min_bedroom'] != '') {
	$_GET['max_bedroom'] = 20;	
} else if($_GET['min_bedroom'] == '' && $_GET['max_bedroom'] == '') {
	$_GET['min_bedroom'] = 0; $_GET['max_bedroom'] = 20;	
}

// Bathroom Checks 
if($_GET['min_bathroom'] == '' && $_GET['max_bathroom'] != '') {
	$value = 0;
	$compare = '>=';
} else if($_GET['max_bathroom'] == '' && $_GET['min_bathroom'] != '') {
	$value = 0;
	$compare = '<=';
} else if($_GET['min_bathroom'] == '' && $_GET['max_bathroom'] == '') {
	//$_GET['min_bathroom'] = 0; $_GET['max_bathroom'] = 20;	
	$value = array(0, 20);
	$compare = 'BETWEEN';
} else {
	//$_GET['min_bathroom'] = 0; $_GET['max_bathroom'] = 20;	
	$value = array($_GET['min_bathroom'], $_GET['max_bathroom']);
	$compare = 'BETWEEN';
} 

$args['meta_query'] = array(
						
						'relation' => 'AND',	
                          array(
                              'key'     => 'bedrooms',
                              //'value'   => array($_GET['min_bedroom'], $_GET['max_bedroom']),
                              'value'   => $value,
							  //'compare' => 'BETWEEN'
							  'compare' => $compare,
                          ), 
						  array(
							'key'     => 'bathrooms',
							//'value'   => array($_GET['min_bedroom'], $_GET['max_bedroom']),
                            'value'   => $value,
							//'compare' => 'BETWEEN'
							'compare' => $compare,
						)
						 
					);
*/					
					  
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args['paged'] = $paged;

$args['tax_query'] = $tax_query;

$args['meta_query'] = $meta_query;

$cleanArray = array_merge(array('relation' => 'AND'), $args);

$the_query = new WP_Query( $args );

/*   echo '<pre>';
  print_r($the_query);
  exit;  */    
  

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
								<li>Status: <b><?php echo $ks_property_str->__cate('property_status', 'No Status', false); ?></b></li>
								<li>Type: <b><?php echo $ks_property_str->__cate('property_type', 'No Type', false); ?></b></li>
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