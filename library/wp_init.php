<?php
/**
 * Property House functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Property_House
 */

if ( ! function_exists( 'property_house_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function property_house_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Property House, use a find and replace
	 * to change 'property-house' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'property-house', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'property-house' ),
	) );
	
	register_nav_menus( array(
		'for-sale-menu' => esc_html__( 'For Sale Menu', 'property-house' ),
	) );
	
	register_nav_menus( array(
		'for-rent-menu' => esc_html__( 'For Rent Menu', 'property-house' ),
	) );
	
	register_nav_menus( array(
		'by-location-menu-col1' => esc_html__( 'By Location Column1', 'property-house' ),
	) );
	
	register_nav_menus( array(
		'by-location-menu-col2' => esc_html__( 'By Location Column2', 'property-house' ),
	) );
	
	register_nav_menus( array(
		'by-location-menu-col3' => esc_html__( 'By Location Column3', 'property-house' ),
	) );
	
	register_nav_menus( array(
		'client-resources-1' => esc_html__( 'Client Resources', 'property-house' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'property_house_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // property_house_setup
add_action( 'after_setup_theme', 'property_house_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function property_house_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'property_house_content_width', 640 );
}
add_action( 'after_setup_theme', 'property_house_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function property_house_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'property-house' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Sidebar', 'property-house' ),
		'id'            => 'frontpage-sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="col-md-12 col-sm-6">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'property_house_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function property_house_scripts() {
	wp_enqueue_style( 'property-house-style', get_stylesheet_uri() );

	wp_enqueue_script( 'property-house-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'property-house-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'property_house_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


// Register Custom Post Type 'Property'
function ks_set_post_type() {

	$labels = array(
		'name'                  => _x( 'Properties', 'Post Type General Name', 'property-house' ),
		'singular_name'         => _x( 'Property', 'Post Type Singular Name', 'property-house' ),
		'menu_name'             => __( 'Sale Property', 'property-house' ),
		'name_admin_bar'        => __( 'Property', 'property-house' ),
		'parent_item_colon'     => __( 'Parent Item:', 'property-house' ),
		'all_items'             => __( 'All Properties', 'property-house' ),
		'add_new_item'          => __( 'Add New Property', 'property-house' ),
		'add_new'               => __( 'Add New', 'property-house' ),
		'new_item'              => __( 'New Property', 'property-house' ),
		'edit_item'             => __( 'Edit Property', 'property-house' ),
		'update_item'           => __( 'Update Property', 'property-house' ),
		'view_item'             => __( 'View Property', 'property-house' ),
		'search_items'          => __( 'Search Property', 'property-house' ),
		'not_found'             => __( 'Not found', 'property-house' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'property-house' ),
		'items_list'            => __( ' Property list', 'property-house' ),
		'items_list_navigation' => __( 'Properties list navigation', 'property-house' ),
		'filter_items_list'     => __( 'Filter Properties list', 'property-house' ),
	);
	$args = array(
		'label'                 => __( 'Property', 'property-house' ),
		'description'           => __( 'This Post Type create a listing.', 'property-house' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'public'                => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-home',
		'rewrite' => array( 'slug' => '/dubai/property-for-sale' ),
	);
	register_post_type( 'property', $args );
	
		// Property > Features
		register_taxonomy( 'property_amenities', array( 'property' ), array(
			'label' => __( 'Amenities', "property-house" ),
			'hierarchical' => true,
			'rewrite' => array( 'slug' => 'property_amenities' )
		));
		
		// Property > Type
		register_taxonomy('property_type', 'property', Array(
			'label' => __( 'Type', "property-house" ),
			'rewrite' => array( 'slug' => 'property_type' ),
			'hierarchical' => true,
		));
		// Property > City
		register_taxonomy('property_city', 'property', Array(
			'label' => __( 'City', "property-house" ),
			'rewrite' => array( 'slug' => 'property_city' ),
			'hierarchical' => true,
		));
		// Property > Rent
		register_taxonomy('for_rent', 'property', Array(
			'label' => __( 'Rent', "property-house" ),
			'rewrite' => array( 'slug' => 'for-rent' ),
			'hierarchical' => true,
		));
		// Property > Rent
		register_taxonomy('for_sale', 'property', Array(
			'label' => __( 'Sale', "property-house" ),
			'rewrite' => array( 'slug' => 'for_sale' ),
			'hierarchical' => true,
		));

}
add_action( 'init', 'ks_set_post_type', 0 );






