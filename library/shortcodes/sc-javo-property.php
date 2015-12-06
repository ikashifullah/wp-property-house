<?php

class javo_property_display {
	
	public function __construct() {
		
		add_shortcode( 'javo_property', array( $this, 'property_callback' ) );
		
	}
	
	
	public function property_callback($param, $content = '') {
		
		extract(
			shortcode_atts(
			
				array(
				
					'title' => 'Properties',
					
					'count' => 4, 
					
					'status' => null,
					
					'style' => null,
					
					'length' => 150
				
				), $param
			
			)		
		);
		
		$javo_args = array(
			
			'post_type' => 'property',
			
			'posts_per_page' => $count,
			
			'post_status' => 'publish'			
			
		);
		
	}
	
	
}

new javo_property_display();