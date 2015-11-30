<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Property_House
 */
 

$query = new WP_Query( array('post_type' => 'property'));
 
 echo '<pre>';
print_r($query);

exit;
 
 

$taxonomies = get_object_taxonomies( array( 'post_type' => 'property' ) );
$lists = array();
$i = 0;
foreach($taxonomies as $key => $taxonomy) {

	$lists[] = get_categories('taxonomy='.$taxonomy.'&type=property'); 
	
	echo '<pre>';
	print_r($lists[0]);
	exit;	
	
}

echo '<pre>';
print_r($res);
exit;
 
 
$terms = get_terms('property_status');

$posts = array();
foreach ( $terms as $term ) {
	if($term->slug == 'sale')
		$posts[$term->name] = get_posts(array( 'posts_per_page' => -1, 'post_type' => 'property', 'tax_name' => $term->name ));
}



echo '<pre>';
print_r($posts);
exit;


get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
