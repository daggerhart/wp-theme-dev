<?php
/*
 * Pagination for Multi-page posts that use <!--nextpage--> within the content.
 */
// Bootstrap pagination
wp_link_pages( array(
	'before' => '<nav class="entry-pager"><ul class="pagination"><li>',
	'separator' => '</li><li>',
	'after'  => '</li></ul></nav>',
	//'next_or_number' => 'next',
	'link_before' => '<span class="inner">',
	'link_after' => '</span>',
) );
