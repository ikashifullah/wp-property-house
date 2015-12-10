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

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
			
			<br />
			<form  method="get" action="<?php bloginfo('url');?>/listing-search-results/">
			<?php  /*$taxonomies = get_object_taxonomies('property');
		
				foreach($taxonomies as $tax){
					echo buildSelect($tax);
				}
				*/
				echo buildSelect('property_status');
				echo buildSelect('property_type');
				echo buildSelect('locations');
				echo buildSelect('property_city');
			?>
			<select name="min_bedroom">	
				<option value=""> Any</option>
				<option value="-1"> Studio</option>
				<option value="1"> 1</option>
				<option value="2"> 2</option>
				<option value="5"> 5</option>
			</select>
			
			<select name="max_bedroom">
				<option value=""> Any</option>
				<option value="-1">Studio</option>
				<option value="1"> 1</option>
				<option value="2"> 2</option>
				<option value="3"> 3</option>
				<option value="4"> 4</option>
				<option value="5"> 5</option>
			</select>
			
			<select name="min_bathroom">	
				<option value=""> Any</option>
				<option value="-1">Studio</option>
				<option value="1"> 1</option>
				<option value="2"> 2</option>
				<option value="3"> 3</option>
				<option value="4"> 4</option>
				<option value="5"> 5</option>
			</select>
			
			<select name="max_bathroom">
				<option value=""> Any</option>
				<option value="-1">Studio</option>
				<option value="1"> 1</option>
				<option value="2"> 2</option>
				<option value="3"> 3</option>
				<option value="4"> 4</option>
				<option value="5"> 5</option>
				<option value="6"> 6</option>
			</select>
			
			Enter ID: <input type="text" name="prop_id" />
			
			<input type="submit"/>
			</form>
			
			

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
