<?php
/**
 * Template Name: List in Category
 *
 * This is an example of a custom page template that can be chosen from the
 * admin dashboard.
 *
 * This template expects a meta key named "page_category_slug" with the value of
 * a category term slug. See: partials/query-list-category.php
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/page-templates/
 */

get_header(); ?>

<div class="row">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					// show the normal page details above the custom query
					get_template_part( 'partials/content', 'page' );
				?>

				<?php
					// include our custom query
					get_template_part( 'queries/query-list-category' );
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

	<div id="secondary" class="widget-area" role="complementary">
		<?php get_sidebar(); ?>
	</div><!-- #secondary -->
</div>

<?php get_footer(); ?>
