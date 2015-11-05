<?php
/**
 * The front page template file.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

<div class="row">
	<div id="primary" class="content-area col-sm-8">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/*
					 * Front page needs to be able to handle almost any content.
					 * Load the appropriate template.
					 */
					if ( 'page' == get_post_type() ) {
						get_template_part( 'partials/content', 'page' );
					}
					else if ( 'post' == get_post_type() ) {
						get_template_part( 'partials/content-post', get_post_format() );
					}
					else {
						get_template_part( 'partials/content', get_post_type() );
					}
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'partials/content', 'no-results' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div id="secondary" class="widget-area col-sm-4" role="complementary">
		<?php get_sidebar(); ?>
	</div><!-- #secondary -->
</div>

<?php get_footer(); ?>
