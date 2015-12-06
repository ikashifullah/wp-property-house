<?php

class get_char {
	
	public $title, $origin_title, $post, $content, $p_type, $p_id, $excerpt, $excerpt_meta, $area, $price, $price_extension, $sns, $author, $author_name, $agent_page, $author_property_count;
	
	public function __construct($post){
		
		$this->post = $post;
		
		$this->content = apply_filters( 'the_content', $this->post->post_content );
		
		$this->origin_title = sprintf('<a href="%s">%s</a>', get_permalink( $this->post->ID ), $this->post->post_title );
		
		$this->p_type = get_post_type($this->post->ID);
		
		$this->p_id = $post->ID;
		
		
	}
	
	public function __hasStatus(){
		
		$output = '';
		
		$terms = wp_get_post_terms( $this->post->ID, 'property_status' );
		
		if(is_Array($terms)) {
			
			foreach($terms as $term) {
				
				$output = $term -> name;
				
			}
			
		}
		
		return ( $output != '' ) ? $output : '';
		
	}
	
	public function __meta($meta_key) {
		
		return get_post_meta($this->post->ID, $meta_key, true);
		
	}
	
	public function __cate( $tax_name, $default = null, $get_array = false ){
	
		$terms = wp_get_post_terms( $this->post->ID, $tax_name );
		
		if($terms != '') {
			
			$output = '';
				
			if( !$get_array ) {
				
				foreach($terms as $term) {
					
					$output .= $term->name . ', ';				
					
				}
				return substr(trim($output), 0, -1);
				
			} else {
				
				return $terms[0] -> name;
				
			}	
						
		}
		
		return false;
		
	}
	
}