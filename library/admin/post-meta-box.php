<?php 

class javo_post_meta_box{
	
	public function __construct() {
		
		add_action( 'add_meta_boxes', array( $this, 'javo_post_meta_box_init') );
		add_action( 'save_post', Array( $this, 'javo_post_meta_box_save' ) );
		// enqueue these files for google map
		add_action('admin_enqueue_scripts', Array($this, 'javo_admin_post_meta_enqueue'));
		
	}
	
	public function javo_post_meta_box_init() {
		
		add_meta_box( "javo_property_options", "Property meta", array($this, "javo_property_option_box"), "property" );
		
		
	}
	
	public function javo_pt_add($meta_key, $post_id=NULL){
		if($post_id == NULL) return;
		return sprintf( "<input name='javo_pt[%s]' value='%s'>", $meta_key, get_post_meta( $post_id, $meta_key, true ) );
	}
	
	public function javo_property_option_box( $post ) {
		$javo_theme_option = @unserialize(get_option("javo_themes_settings"));
	?>	
		<table class="form-table">
			<tr>
				<th><?php _e('Property ID', 'property-house');?></th>
				<td><?php echo $this->javo_pt_add("property_id", $post->ID);?></td>
			</tr>
			<tr>
				<th><?php _e('Bedrooms', 'property-house');?></th>
				<td><?php echo $this->javo_pt_add("bedrooms", $post->ID);?></td>
			</tr>
			<tr>
				<th><?php _e('Bathrooms', 'property-house');?></th>
				<td><?php echo $this->javo_pt_add("bathrooms", $post->ID);?></td>
			</tr>
			<tr>
				<th><?php _e('Parking', 'property-house');?></th>
				<td><?php echo $this->javo_pt_add("parking", $post->ID);?></td>
			</tr>
			<tr>
				<th><?php _e('Plot Size', 'property-house');?></th>
				<td><?php echo $this->javo_pt_add("plot_size", $post->ID);?></td>
			</tr>
			<tr>
				<th><?php _e('Living Rooms', 'property-house');?></th>
				<td><?php echo $this->javo_pt_add("living_rooms", $post->ID);?></td>
			</tr>
			<tr>
				<th><?php _e('Kitchens', 'property-house');?></th>
				<td><?php echo $this->javo_pt_add("kitchens", $post->ID);?></td>
			</tr>
			<tr>
				<th><?php _e('Rooms', 'property-house');?></th>
				<td><?php echo $this->javo_pt_add("rooms", $post->ID);?></td>
			</tr>
			<tr>
				<th><?php _e('Sale Price', 'property-house');?></th>
				<td><?php echo $this->javo_pt_add("sale_price", $post->ID);?>
				(Please type numbers only without any dots or commas.)
				</td>
			</tr>
			<tr>
				<th><?php _e('Price Prefix', 'property-house');?></th>
				<td><?php echo $this->javo_pt_add("price_postfix", $post->ID);?></td>
			</tr>
			<tr>
				<th><?php _e('Area', 'property-house');?></th>
				<td><?php echo $this->javo_pt_add("area", $post->ID);?></td>
			</tr>
			<tr>
				<th><?php _e('Area Suffix', 'property-house');?></th>
				<td><?php echo $this->javo_pt_add("area_postfix", $post->ID);?></td>
			</tr>
			<tr>
				<th><?php _e('Location Position', 'property-house');?></th>
				<td>
					<input class="javo_txt_find_address">
					<div class="map_area"></div>
					<?php
						$latlng = @unserialize( get_post_meta( $post->ID, "latlng", true ) );
						printf("
							Latitude : <input name='javo_pt[lat]' value='%s' type='text'>
							Longitude : <input name='javo_pt[lng]' value='%s' type='text'>
						", $latlng['lat'], $latlng['lng']);
					?>	
				</td>
			</tr>
			<tr>
				<th><?php _e('Detail Images', 'property-house');?></th>
				<td>
					<div class="">
						<a href="javascript:" class="button button-primary javo_pt_detail_add">Add detail image</a>
					</div>				
					<div class="javo_pt_images">
						<?php 
							$images = @unserialize(get_post_meta($post->ID, "detail_images", true));
							if(is_Array($images)){
								foreach($images as $img => $src){
									$url = wp_get_attachment_image_src($src, 'thumbnail');
									printf("
									<div class='javo_pt_field' style='float:left;'>
										<img src='%s'><input name='javo_pt_detail[]' value='%s' type='hidden'>
										<div class='' align='center'>
											<input class='javo_pt_detail_del button' type='button' value='Delete'>
										</div>
									</div>
									", $url[0], $src);
								}
							}		
						?>
					</div>
				</td>
			</tr>	
		</table>
		<script>
			jQuery(document).ready(function() {
				var _cur;
				_cur = jQuery("input[name='javo_pt[lat]']").val() != "" && jQuery("input[name='javo_pt[lng]']").val() != "" ? new google.maps.LatLng(jQuery("input[name='javo_pt[lat]']").val(), jQuery("input[name='javo_pt[lng]']").val()) : new google.maps.LatLng(25.205986811016395, 55.269644975000006);
				var option = {
					map:{ options:{zoom:10} },
					marker:{
						options:{ draggable:true },
						events:{
							dragend:function(m){
								var mark = m.getPosition();
								jQuery("input[name='javo_pt[lat]']").val(mark.lat());
								jQuery("input[name='javo_pt[lng]']").val(mark.lng());
							}
						}
					}
				};
				option.map.options.center = _cur;
				option.marker.values = [{ latLng: _cur }];
				
				jQuery(".map_area").css("height", 300).gmap3(option);
				
				jQuery(".javo_txt_find_address").autocomplete({
					source: function() {
						jQuery(".map_area").gmap3({
							getaddress: {
								address: jQuery(this).val(),
								callback: function(results){
									if (!results) return;
									jQuery(".javo_txt_find_address").autocomplete("display", results, false);
								}
							}
						});
					},
					cb:{
						cast: function(item){
							return item.formatted_address;
						},
						select: function(item) {
							jQuery(".map_area").gmap3({
								clear: "marker",
								marker: {
									options:{ draggable:true },
									events:{
										dragend:function(m){
											var mark = m.getPosition();
											jQuery("input[name='javo_pt[lat]']").val(mark.lat());
											jQuery("input[name='javo_pt[lng]']").val(mark.lng());
										}
									},
									latLng: item.geometry.location
								},
								map:{
									options: {
										center: item.geometry.location,
									}
								}
							});
							var _find = item.geometry.location;
							jQuery("input[name='javo_pt[lat]']").val(_find.lat());
							jQuery("input[name='javo_pt[lng]']").val(_find.lng());
						}
					}
				})
				.focus();
			
				// Delete details image one by one
				jQuery("body").on("click", ".javo_pt_detail_del", function(){
					var t = jQuery(this);
					 if (confirm("Are you sure to delete?")) {
						t.parents(".javo_pt_field").remove();
					}
					return false;
					
				});
			
				// Add details images
				jQuery("body").on("click", ".javo_pt_detail_add", function(e){
					e.preventDefault();
					var file_frame, t = jQuery(this);
					if(file_frame){ file_frame.open(); return; }
					file_frame = wp.media.frames.file_frame = wp.media({
						title: 'Select or Upload Media for Property Listing',
						button: {
							text: 'Use this media',
						},
						multiple: false
					});
					file_frame.on( 'select', function(){
						var str ="";
						attachment = file_frame.state().get('selection').first().toJSON();

						str += "<div class='javo_pt_field' style='float:left;'>";
						str += "<img src='" + attachment.url + "' width='150'> <div align='center'>";
						str += "<input name='javo_pt_detail[]' value='" + attachment.id + "' type='hidden'>";
						str += "<input class='javo_pt_detail_del button' type='button' value='Delete'>";
						str += "</div></div>";
						t.parents("td").find(".javo_pt_images").append(str);
					});
					file_frame.open();
				});

			});
		</script>
	<?php	
	}
	
	public function javo_post_meta_box_save($post_id) {
		
		// In case of auto save
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;
		
		$javo_query = new javo_array($_POST);
		
		switch (get_post_type($post_id) ) {
			
			case 'property': 
				if(isset($_POST['javo_pt'])){
						
						$ppt_meta = $_POST['javo_pt'];
						$latlng = Array( "lat"=> $ppt_meta['lat'], "lng"=> $ppt_meta['lng']);
						$ppt_images = !empty($_POST['javo_pt_detail'])? $_POST['javo_pt_detail'] : null;
						$javo_pt_query = new javo_array($ppt_meta);
						
						update_post_meta($post_id, 'property_id', $javo_pt_query->get('property_id'));
						update_post_meta($post_id, 'bedrooms', $javo_pt_query->get('bedrooms'));
						update_post_meta($post_id, 'bathrooms', $javo_pt_query->get('bathrooms'));
						update_post_meta($post_id, 'parking', $javo_pt_query->get('parking'));
						update_post_meta($post_id, 'plot_size', $javo_pt_query->get('plot_size'));
						update_post_meta($post_id, 'living_rooms', $javo_pt_query->get('living_rooms'));
						update_post_meta($post_id, 'kitchens', $javo_pt_query->get('kitchens'));
						update_post_meta($post_id, 'rooms', $javo_pt_query->get('rooms'));
						update_post_meta($post_id, 'sale_price', $javo_pt_query->get('sale_price'));
						update_post_meta($post_id, 'price_postfix', $javo_pt_query->get('price_postfix'));
						update_post_meta($post_id, 'area', $javo_pt_query->get('area'));
						update_post_meta($post_id, 'area_postfix', $javo_pt_query->get('area_postfix'));
						update_post_meta($post_id, 'latlng', @serialize($latlng));
						update_post_meta($post_id, 'detail_images', @serialize($ppt_images));
					
				}			
			break; 
			
		}
	}
	
	public function javo_admin_post_meta_enqueue() {
		
		wp_enqueue_script("google_map_API", "http://maps.google.com/maps/api/js?sensor=false&amp;language=en", null, "0.0.1", false);
		prop_get_script('gmap3.min.js', 'jQuery-gmap3', '5.1.1', false); 
		prop_get_script('jquery-autocomplete.js', 'jQuery-AutoComplete', '0.1.1', false); 
		prop_get_style('jquery-autocomplete.css', 'AutoComplete-css', '0.1.1', false); 
		
	}
	
}

new javo_post_meta_box();

?>