<?php 

add_action('wp_enqueue_scripts', 'prop_load_scripts');
function prop_load_scripts() {

	global $javo_theme_option;
	// load all scripts
	prop_get_script('bootstrap.min.js', 'bootstrap', '3.3.5'); 
	prop_get_script('jquery-1.11.3.min.js', 'jquery', '1.11.3'); 
	prop_get_script('owl.carousel.min.js', 'owl-jquery', '1.3.3'); 
	// Load scripts for magnific-popup
	prop_get_script('jquery.magnific-popup.min.js', 'magnific-popup', '1.3.4'); 

	// Load all styles
	prop_get_style("magnific-popup.css", "magnific-popup");
	prop_get_style("bootstrap.min.css", "bootstrap", "3.3.5");
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/font-awesome/css/font-awesome.min.css', NULL, '4.4.0');
	prop_get_style("main.css", "main-styles");
	prop_get_style("owl.carousel.css", "owl-styles");
	prop_get_style("owl.theme.css", "owl-theme");
	// Load style for magnific-popup
	
	
	$protocol = is_ssl() ? 'https' : 'http';

	$javo_load_fonts = Array("basic_font", "h1_font", "h2_font", "h3_font", "h4_font", "h5_font", "h6_font");

	foreach($javo_load_fonts as $index=>$font)

		if($javo_theme_option[$font] != "")

			wp_enqueue_style( 'javo-opensans', "$protocol://fonts.googleapis.com/css?family=$javo_theme_option[$font]");
	
}

?>