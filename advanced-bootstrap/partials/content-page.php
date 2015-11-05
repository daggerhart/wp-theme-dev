<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header page-header">
		<?php get_template_part( 'partials/entry-thumbnail-fancy' ); ?>

		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php get_template_part( 'partials/entry-pager', get_post_type() ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

