<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Property_House
 */

if ( ! is_active_sidebar( 'frontpage-sidebar' ) ) {
	return;
}
?>

<div class="right-sidebar col-md-3">

	<div class="col-md-12 col-sm-6">

		<?php wp_nav_menu( array( 'theme_location' => 'client-resources', 'menu_id' => 'client-resources', 'menu_class' => '', 'container' => 'div', 'container_class' => 'client-resources' ) ); ?>
		
	</div>
	
	<?php dynamic_sidebar( 'frontpage-sidebar' ); ?>
	
</div>
