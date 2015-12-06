<?php

	/** Widgets **/
	require_once get_template_directory() . '/library/widgets/prop_image_upload.php';

	/** Admin Resources **/
	require_once get_template_directory() . '/library/admin/post-meta-box.php';

	/** Shortcodes **/
	require_once get_template_directory() . '/library/shortcodes/sc-javo-main-search.php';
	require_once get_template_directory() . '/library/shortcodes/sc-javo-property-fancy.php';
	
	/** Classes **/
	//require_once get_template_directory() . '/library/classes/sc-javo-main-search.php';
	require_once get_template_directory() . "/library/classes/javo_array.php";   
	require_once get_template_directory() . "/library/classes/javo-post-class.php";
	require_once get_template_directory() . "/library/classes/javo-get-option.php";

?>