<?php $ks_property_str = new get_char( get_post( get_the_ID() ) ); ?>
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
					<li>size : <b><?php echo $ks_property_str->__meta('area').' '. $ks_property_str->__meta('area_postfix'); ?></b></li>
					<li>Status: <b><?php echo $ks_property_str->__cate('property_status', 'No Status', false); ?></b></li>
					<li>Type: <b><?php echo $ks_property_str->__cate('property_type', 'No Type', false); ?></b></li>
				</ul>
			</div>

			<div class="clearfix"></div>
			
			<div class="listing-location"><i class="fa fa-map-marker fa-lg"></i> Located : UAE ><?php echo $ks_property_str->__cate('locations', 'No Location', false); ?> > <?php echo $ks_property_str->__cate('property_city', 'No City', false); ?></div>	
				
		</div>
		
		<div class="col-md-3 col-sm-6">
				
			<div class="listing-price">AED 175,000 /yr</div>	
				
		</div>
	
	</div>
	
</div>
			
			
					