### Folder Structure 

* **assets** - CSS and javascript files
    * **js** - Location for all Javascript related to this theme.
    * **css** - Location for all CSS related to this theme.
* **includes** - WordPress hooks and other PHP functions and classes used by this theme.
* **page-templates** - Location of templates that may be used by the Page post type.
* **partials** - Templates that represent the interior content of a page/post.

### Theme Files

File | Description
---|---
`style.css` | Contains theme details (meta data) and the main site css.
`header.php` | Default template for the beginning of the HTML document. Normally includes the site header nad main navigational menu.
`footer.php` | Default template for the end of the HTML document. Normally includes a copyright date and some additional site information. 
`sidebar.php` | Default wrapper template for sidebar widgets. 

### Template Hierarchy Files

These templates define the theme layout for different types of pages throughout the site. 

File | Description
---|---
`404.php` | Page not found - shown when the requested URL is not found within WordPress.
`archive.php` | Wrapper for a list of posts when viewing a category or tag.
`comments.php` | Template that wraps comment output and provides the comment form. 
`front-page.php` | Template for the site's home page. 
`page.php` | Wrapper template for an individual Page. 
`search.php` | Wrapper for a list of search results.
`single.php` | Wrapper for an individual content of a custom post_type.   
`single-post.php` | Wrapper for an individual Post.   
`index.php` | `(empty)`The final fall-back when no appropriate template is found. Since we have covered the main template hierarchy with other files, this has been intentionally left blank. 

More more information of additional template files, review the [Template Hierarchy](https://developer.wordpress.org/themes/basics/template-hierarchy/).

### Content Template Files

These templates are used to output the actual content.

File | Description
---|---
`partials/content.php` | Default content template used when a more appropriate one can't be found.
`partials/content-no-results.php` | Template used when no posts are found in a loop.
`partials/content-page.php` | Template used to display the content of a single Page. 
`partials/content-post.php` | Template used to display the content of a single Post.
`partials/content-search.php` | Template used to display a single search result in a list of search results.


### Other Files

File | Description
---|---
`functions.php` | Used to load other files from the `includes` folder.
`includes/assets.php` | Hooks related to assets and serving them.
`includes/config.php` | Hooks this theme uses to initialize itself.
`includes/sidebars.php` | Hooks that register and alter theme sidebars and widgets.
`includes/template-tags.php` | Custom functions that produce re-usable output.
`includes/utilities.php` | Custom functions used by the theme.


