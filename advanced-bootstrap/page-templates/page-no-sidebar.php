<?php
/**
 * Template Name: No Sidebar
 *
 * This is an example of a custom page template that can be chosen from the
 * admin dashboard.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/page-templates/
 */

get_header(); ?>

<div class="row">
	<div id="primary" class="content-area col-xs-12">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					// partials/content-page.php
					get_template_part( 'partials/content', 'page' );
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
</div>

<?php get_footer(); ?>
