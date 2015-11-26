<?php 

add_action('wp_enqueue_scripts', 'prop_load_scripts');
function prop_load_scripts() {

	// load all scripts
	prop_get_script('bootstrap.min.js', 'bootstrap', '3.3.5'); 
	prop_get_script('jquery-1.11.3.min.js', 'jquery', '1.11.3'); 
	prop_get_script('owl.carousel.min.js', 'owl-jquery', '1.3.3'); 

	// Load all styles
	prop_get_style("bootstrap.min.css", "bootstrap", "3.3.5");
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/font-awesome/css/font-awesome.min.css', NULL, '4.4.0');
	prop_get_style("main.css", "main-styles");
	prop_get_style("owl.carousel.css", "owl-styles");
	prop_get_style("owl.theme.css", "owl-theme");
	
}

?>