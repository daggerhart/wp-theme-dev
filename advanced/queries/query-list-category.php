<?php

/**
 * Execute the custom query.
 *
 * This template expects a meta key named "page_category_slug" with the value of
 * a category term slug.
 *
 * - Make sure we have a usable category as post_meta
 * - Create a new custom WP_Query()
 * - Loop through the custom query and include the template
 *   for each item.
 *
 * WP_Query() class
 * @link https://codex.wordpress.org/Class_Reference/WP_Query
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
