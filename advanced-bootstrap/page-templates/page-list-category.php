<?php
/**
 * Template Name: List in Category
 *
 * This is an example of a custom page template that can be chosen from the
 * admin dashboard.
 *
 * This template expects a meta key named "page_category_slug" with the value of
 * a category term slug.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/page-templates/
 *
 * WP_Query() class
 * @link https://codex.wordpress.org/Class_Reference/WP_Query
 */

get_header(); ?>

<div class="row">
	<div id="primary" class="content-area col-sm-8">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					// show the normal page details above the custom query
					get_template_part( 'partials/content', 'page' );
				?>

				<?php
					/*
					 * Execute the custom query.
					 *
					 * - Make sure we have a usable category as post_meta
					 * - Create a new custom WP_Query()
					 * - Loop through the custom query and include the template
					 *   for each item.
					 */

					// our page meta data we expect
					$term_slug = get_post_meta( get_the_ID(), 'page_category_slug', TRUE );
					$term = get_category_by_slug( $term_slug );

					// verify that we have a usable category
					if ( $term ){

						// create a new custom query
						$custom_query = new WP_Query( array(
							'tax_query' => array(
								'post_category_slug' => array(
									'taxonomy' => 'category',
									'field'    => 'slug',
									'terms'    => $term_slug,
								),
							),
						) );

						// loop through the found items
						while( $custom_query->have_posts() ) {
							$custom_query->the_post();

							// include a single item's template
							get_template_part( 'partials/content', get_post_type() );
						}
						// return to the original page being viewed
						wp_reset_postdata();
					}

					/*
					 * End of custom query
					 */
				?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div id="secondary" class="widget-area col-sm-4" role="complementary">
		<?php get_sidebar(); ?>
	</div><!-- #secondary -->
</div>

<?php get_footer(); ?>
