<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php awesomesauce_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'awesomesauce' ),
				'after'  => '</div>',
			) );
		?>

		<h2>Other useful <a target="_blank" href="https://codex.wordpress.org/Template_Tags">Template Tags</a>.</h2>

		<dl>
			<dt>Post Featured Image at Medium size:</dt>
			<dd><?php the_post_thumbnail('medium'); ?></dd>

			<dt>Post Excerpt (summary):</dt>
			<dd><?php the_excerpt(); ?></dd>

			<dt>Author:</dt>
			<dd><?php the_author(); ?></dd>

			<dt>Author Avatar:</dt>
			<dd><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?></dd>

			<dt>Date: </dt>
			<dd><?php the_date(); ?></dd>

			<dt>Time Ago:</dt>
			<dd><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></dd>

			<dt>Permalink (URL):</dt>
			<dd><?php the_permalink(); ?></dd>

			<dt>Post Categories:</dt>
			<dd><?php the_category(); ?></dd>

			<dt>Post Tags: </dt>
			<dd><?php the_tags(); ?></dd>

			<dt>Post ID:</dt>
			<dd><?php the_ID(); // or alternatively get_the_ID(); ?></dd>
		</dl>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php awesomesauce_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

