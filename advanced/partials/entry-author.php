<?php

/*
 * About the author
 */
$author_id = get_the_author_meta( 'ID' );
$author_description = get_the_author_meta( 'description' );
$author_posts_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
$author_avatar = get_avatar( $author_id, 96, '', 'author avatar', array( 'class' => 'author-avatar' ) );
$author_url = get_the_author_meta( 'url' );
?>
<div class="about-the-author">
	<h4 class="author-title"><?php esc_html_e( 'About the Author', 'awesomesauce' ); ?></h4>

	<div class="row">
		<div class="col-1">
			<a class="author-avatar" href="<?php echo esc_url( $author_posts_url ); ?>">
				<?php echo $author_avatar; ?>
			</a>
		</div>

		<div class="col-2">
			<h4><?php the_author(); ?></h4>

			<?php if ( $author_description ) : ?>
				<p><?php echo $author_description; ?></p>
			<?php endif; ?>

			<div class="author-posts">
				<a href="<?php echo esc_url( $author_posts_url ); ?>" class="author-posts-item">
					<?php esc_html_e( 'Other posts by ', 'awesomesauce' ); ?><?php the_author(); ?>
					<span class="author-posts-count"><?php the_author_posts(); ?></span>
				</a>

				<?php if ( $author_url ) : ?>
					<a href="<?php echo esc_url( $author_url ); ?>" class="author-posts-item" target="_blank">
						<?php printf( esc_html__( "Visit %s's website", 'awesomesauce' ), get_the_author() ); ?>
					</a>
				<?php endif; ?>
			</div><!-- /.author-posts -->
		</div><!-- /.column -->
	</div><!-- /.row -->
</div><!-- /.about-the-author -->
