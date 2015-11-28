<?php
/**
 * The template for displaying the blog page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */
$blog_page_id = get_option('page_for_posts');

get_header(); ?>

<div class="row">
	<div id="primary" class="content-area col-sm-8">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
	
			<?php if ( $blog_page_id ) : ?>
				<header class="page-header">
					<h1 class="entry-title"><?php echo get_the_title($blog_page_id); ?></h1>
				</header><!-- .page-header -->
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-post-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'partials/content-post', get_post_format() );
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
