<?php

class KS_Property_Fancy {
	
	public function __construct() {
		
		add_shortcode( 'property-fancy', array( $this, 'property_fancy_function' ) );
		
	}
	
	public function property_fancy_function( $atts, $content ){
		
		extract( 
			shortcode_atts(
			
				array(
				
					'status' => '',
					
					'type' => '',
					
					'city' => '',
					
					'count' => 4,
					
					'order' => 'DESC',
					
					'title' => '',
					
					'length' => 150
				
				), $atts		
		
			) 
		);
		
		$args = array(
		
			'post_type' => 'property',
			
			'post_status' => 'publish',
			
			'posts_per_page' => $count,
			
			'order' => $order,
			
			'orderby' => 'date',
			
			'tax_query' => array()
		
		);
		
		/*status,type,city check */
		
		if($status!=''){
			
			$args['tax_query'][] = array(
			
				'taxonomy' => 'property_status',
				
				'field' => 'slug',
				
				'terms' => $status
			
			);
			
		}
		
		if($type!=''){
			
			$args['tax_query'][] = array(
			
				'taxonomy' => 'property_type',
				
				'field' => 'slug',
				
				'terms' => $type
			
			);
		}
		
		if($city!=''){

			$args['tax_query'][] = Array(

				'taxonomy'=>'property_city',

				'field'=>'slug',

				'terms'=>$city

			);

		}
		
		$ks_this_posts = new WP_Query($args);
		
		ob_start();
		
		$i = 0;
		?>
		
		<div class="sc-property" id="sc-property-fancy">
		
			<div class="row">

				<div class="col-md-12 sc-pro-title">
				
					<div class="line-title-bigdots">
					
						<h2><span><?php echo $title ?></span></h2>
					
					</div>
				
				</div>
			
			</div>
			
			<div class="row">
			
				<?php
				
					if( $ks_this_posts -> have_posts() ) {
						
						while( $ks_this_posts -> have_posts() ) {
							
							$ks_this_posts -> the_post();
							
							$ks_property_str = new get_char( get_post( get_the_ID() ) );
							
							?>		
							<div class="col-md-6">

								<div class="panel panel-default prop-listing-item">

									<div class="panel-body">

										<div class="row pretty_blogs" id="mini-album-listing">

											<div class="col-md-5 blog-thum-box">

												<div>

													<div class="javo_img_hover" style="position: relative; overflow: auto; display: inline-block;">

														<a href="<?php the_permalink();?>" style="display:block;">

															<?php the_post_thumbnail('javo-box', Array('class'=>'img-responsive', 'style'=>''));?>

														</a>

													</div>

												</div>
												
												<span class="up-text"><?php echo $ks_property_str->__hasStatus();?></span>
											
											</div> <!-- col-md-5 -->
											
											<div class="col-md-7 blog-meta-box">
											
												<h2 class="title">
												
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												
												</h2>
												
												<div class="excerpt">

													<?php echo $ks_this_posts->the_excerpt(); ?>

														<a href="<?php the_permalink(); ?>">

															<span class="more">[<?php _e('MORE', 'property-house');?>]</span>

														</a>

												</div>
												
												<div class="property-meta">
												
													<span class="col-md-4"><i class="icon-bed"></i><?php echo $ks_property_str->__meta('bedrooms'); ?></span>
													
													<span class="col-md-4"><i class="icon-bed"></i><?php echo $ks_property_str->__meta('bathrooms'); ?></span>
													
													<span class="col-md-4"><i class="icon-bed"></i><?php echo $ks_property_str->__cate('property_type', 'No Type', true); ?></span>
													
													<span class="col-md-4"><i class="icon-bed"></i><?php echo $ks_property_str->__cate('property_status', 'No Status', true); ?></span>
													
													<span class="col-md-4"><i class="icon-bed"></i><?php echo $ks_property_str->__cate('property_city', 'No City', false); ?></span>
													
													<span class="col-md-4"><i class="icon-bed"></i><?php echo $ks_property_str->__cate('locations', 'No Location', false); ?></span>
													
													<span class="col-md-4"><i class="icon-bed"></i><?php echo $ks_property_str->__cate('property_amenities', 'No Amenities', false); ?></span>
												
												</div>
											
											</div> <!-- col-md-7 -->
											
										</div>	
										
									</div>
									
								</div>
								
							</div>	
							<?php
							
						}
						
					}
				
				?>
			
			</div>
	
		</div>
		
		<?php
	
		$content = ob_get_clean();	

		return $content;
	
	}
		
}

new KS_Property_Fancy();

?>