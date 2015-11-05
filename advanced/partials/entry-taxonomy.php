<?php

/*
 * Small list of categories
 */
$categories_list = get_the_category_list( '</span> <span class="inline-category">' );

if ( $categories_list && awesomesauce_categorized_blog() )
{
	?>
	<div class="cat-links">
		<span class="inline-category"><?php echo $categories_list ?></span>
	</div>
	<?php
}

/*
 * Small list of tags
 */
$tags_list = get_the_tag_list( '', '</span> <span class="inline-tag">' );

if ( $tags_list )
{
	?>
	<div class="tag-links">
		<span class="inline-tag"><?php echo $tags_list?></span>
	</div>
<?php
}
