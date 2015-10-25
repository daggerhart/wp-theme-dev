<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 */

get_header(); ?>
<div class="row">
	<section id="primary" class="content-area col-sm-8">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'awesomesauce' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'partials/content', 'search' );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'partials/content', 'no-results' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<div id="secondary" class="widget-area col-sm-4" role="complementary">
		<?php get_sidebar(); ?>
	</div><!-- #secondary -->
</div>
<?php get_footer(); ?>
