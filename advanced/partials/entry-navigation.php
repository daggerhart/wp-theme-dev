<?php
/*
 * Previous & Next Posts links
 */
$previous   = get_previous_post_link( '<li class="previous">%link</li>', '<span aria-hidden="true">&larr;</span> %title' );
$next       = get_next_post_link( '<li class="next">%link</li>', '%title <span aria-hidden="true">&rarr;</span>' );

// Only add markup if there's somewhere to navigate to.
if ( $previous || $next )
{
	?>
	<nav>
		<h2 class="screen-reader-text">Post navigation</h2>
		<ul class="pager">
			<?php echo $previous.$next; ?>
		</ul>
	</nav>
	<?php
}
