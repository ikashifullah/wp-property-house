<?php
/**
 * mortgagehouse functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mortgagehouse
 */

 
@error_reporting(E_ALL);
@ini_set("log_errors", 1);



define( 'PROP_THEME_DIR', get_template_directory_uri() );
define( 'PROP_IMG_DIR', PROP_THEME_DIR."/images");   // Images folder

// Includes : Basic or default functions and included files
require_once get_template_directory().'/library/define.php';
require_once get_template_directory().'/library/load.php';      // loading functions, classes, shotcode, widgets
require_once get_template_directory().'/library/enqueue.php';
require_once get_template_directory().'/library/wp_init.php';

require_once get_template_directory()."/library/admin/theme-settings.php";   // theme options


function buildSelect($tax){	
	$terms = get_terms($tax);
	$x = '<select name="'. $tax .'" class="form-control input-sm">';
	$x .= '<option value="">Select '. ucfirst($tax) .'</option>';
	foreach ($terms as $term) {
	   $x .= '<option value="' . $term->slug . '">' . $term->name . '</option>';	
	}
	$x .= '</select>';
	return $x;
}