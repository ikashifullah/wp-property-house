<?php get_header(); ?>

<main id="main" class="main-content" role="main">
	
		<?php
		
			$term = get_query_var( 'term' );
			
			$taxonomy = get_query_var( 'taxonomy' );
			
			$current_tax_arr = get_term_by( 'slug', $term, $taxonomy );
			
			$args['post_type'] = 'property';
		
			$args['showposts'] = 1;
	
			$tax_query = array();
			
			$tax_query[] = array(
			
				 'taxonomy' => $taxonomy,
				 
				 'terms' => $term,
				 
				 'field' => 'slug'

			);
			
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			$args['paged'] = $paged;
					
			$args['tax_query'] = $tax_query;
									
			$the_query = new WP_Query( $args );
			
			$sing_pl_prop = ($the_query->found_posts > 1) ? 'Properties' : 'Property';
		?>
		
		<h1 class="main-heading"><?php echo ($the_query->found_posts > 0) ? $the_query->found_posts. ' '.$sing_pl_prop. ' found for '. $current_tax_arr->name : 'No '.$sing_pl_prop.' found for '. $current_tax_arr->name; ?></h1>
	
		<div class="col-md-8 col-sm-12">
		
			<?php
				
			if( $the_query -> have_posts() ) {
				
				while( $the_query -> have_posts() ) {
					
					$the_query -> the_post();
					
					get_template_part( 'template-parts/content', 'listing' );
							
				}
						
			} 
			
			wp_reset_postdata();
				
			?>
		
			<div class="row page-navigation">
		
				<?php wp_pagenavi( array( 'query' => $the_query) ); ?>
				
			</div>
			
		</div>
			
		<?php get_sidebar('frontpage'); ?>	
		
</main><!-- #main -->

<?php get_footer(); ?>