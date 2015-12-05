<?php 

class javo_main_search_shortcode{
	
	public function __construct() {
		
		add_shortcode( 'javo_main_search', array( $this, 'javo_main_search_callback' ) );
	}
	
	public function javo_main_search_callback( $attr, $content = "" ) {
		
		extract(shortcode_atts( array(
			'name' => 'null'
		), $attr));
		
		
		return $this->javo_main_search_formfield($attr);
		
	}
	
	public function javo_main_search_terms($tax=""){
		
		if($tax == "") return;
		
		$terms = get_terms( $tax, array('hide_empty' => 0 ));
		
		$str = '';
		
		foreach($terms as $term){
			
			$str .= sprintf("<option value='%s'>%s</option>", $term->term_id, $term->name);
			
		}
		
		return $str;
		
	}	
	
	public function javo_main_search_formfield($attr){
		
		global $javo_tso;	
		ob_start();
	?>	
		<div class="javo_formfield">
		
			<?php /*<form method="get" action="<?php echo get_permalink($javo_tso->get('page_property_result'));?>"> */ ?>
			<form method="get" action="http://localhost:8080/wptesting/searched-result">
			
				<div class="row">

					<div class="col-md-12">

						<div class="basic row"><!-- BASIC SEARCH FORM -->
						
							<div class="col-md-2 col-sm-2">
							
							<select  class='form-control' name='city'>
								
								<option value=''>Select any Location</option>

								<?php echo $this->javo_main_search_terms("property_city");?>
									
							</select>		

							</div><!-- Property Location End -->
							
							
							<div class="col-md-2 col-sm-2">
							
							<select  class='form-control' name='status'>
								
								<option value=''>Rent / Sale</option>
							
								<?php echo $this->javo_main_search_terms("property_status");?>
								
							</select>	

							</div><!-- Property Status End -->
							
							<div class="col-md-2 col-sm-2">
							
							<select  class='form-control' name='type'>
								
								<option value=''>Property Type</option>
							
								<?php echo $this->javo_main_search_terms("property_type");?>
									
							</select>		

							</div><!-- Property Type End -->
							
							<div class="col-md-2 col-sm-2">
							
								<select  class='form-control' name='min_bedroom'>
									<option value=''>Min Bedrooms</option>
										<?php 
									
										for($i = 0; $i< 12; $i++) {
											echo '<option value="'.$i.'">'.$i.'</option>';
										}
									
										?>
									<option value="12+">12+</option>
										
								</select>		

							</div><!-- Property Min Bed End -->
							
							<div class="col-md-2 col-sm-2">
							
								<select  class='form-control' name='max_bedroom'>
									<option value=''>Max Bedrooms</option>
										<?php 
									
										for($i = 0; $i< 12; $i++) {
											echo '<option value="'.$i.'">'.$i.'</option>';
										}
									
										?>
									<option value="12+">12+</option>
										
								</select>		

							</div><!-- Property Max Bed End -->
							
							<button type="submit" class="btn btn-primary">Search</button>
						
						</div><!-- BASIC ROW END  -->

					</div> <!-- col-md-12 -->

				</div> <!-- rows -->
			
			</form>
		
		</div>
	<?php
		return ob_get_clean();
	}
	
}

new javo_main_search_shortcode();

?>