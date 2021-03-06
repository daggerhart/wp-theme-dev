# Advanced WordPress Theme

A theme that uses more advanced features and code for WordPress.

## Work in Progress

This theme will always be a work in progress, as it is where I will place future examples.

##### Features

* Bootstrap
* SASS
* Granular templates
* Translation ready
* Customizer theme settings
    * Content Width: `content_width` - Dynamic content width (oembeds, etc) 
    * Excerpt Length: `excerpt_length` - How many words should appear in excerpts
    * Excerpt More: `excerpt_more` - Modify the html appended to excerpts.
    * Bootstrap Container: Fluid or fixed width content.
    * Bootstrap Navbar: Default or inverse navbar style.
    * Google Fonts: Separate choices for headings and content.
* Page Templates
    

### Folder Structure 

* **assets** - CSS and javascript files
    * **js** - Location for all Javascript related to this theme.
    * **css** - Location for 3rd-Party CSS used by this theme.
    * **sass** - Location for all SCSS files used by this theme.
* **includes** - WordPress hooks and other PHP functions and classes used by this theme.
    * **vendor** - Location for 3rd party PHP libraries.
* **page-templates** - Location of templates that may be used by the Page post type.
* **partials** - Templates that represent the interior content of a page/post.
* **widget-templates** - Template location for widgets.

### Theme Files

File | Description
---|---
`style.css` | Contains theme details (meta data) and the main site css.
`header.php` | Default template for the beginning of the HTML document. Normally includes the site header nad main navigational menu.
`footer.php` | Default template for the end of the HTML document. Normally includes a copyright date and some additional site information. 
`sidebar.php` | Default wrapper template for sidebar widgets. 

### Template Hierarchy Files

These templates define the theme layout for different types of pages throughout the site. **Template Hierarchy files must be located in the root of your theme.** 

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

### Page Templates Files

In WordPress the "Page" post_type is special. Each Page can choose its own template explicitly. You can place custom page templates in the `page-templates` folder.

File | Description
---|---
`page-templates/page-no-sidebars.php` | Like `page.php`, but this template has no sidebar. Used as an example for creating admin-selectable templates for Pages.
`page-templates/page-list-category.php` | Like `page.php`, but this template performs an additional custom query if the page being viewed has "page_category_slug" post meta.


### Content Template Files

These templates are used to output the actual content.

File | Description
---|---
`partials/content.php` | Default content template used when a more appropriate one can't be found.
`partials/content-no-results.php` | Template used when no posts are found for the page.
`partials/content-page.php` | Template used to display the content of a Page. 
`partials/content-post.php` | Template used to display the content of a Post.
`partials/content-search.php` | Template used to display a single search result in a list of search results.
`partials/entry-author.php` | Template to display "About the Author" information.
`partials/entry-footer.php` | Template for common footer data.
`partials/entry-meta.php` | Template for post date, time, and author info
`partials/entry-navigation.php` | Template for post navigation (Next Post, Previous Post).
`partials/entry-pager.php` | Template for single post pager. Posts can be broken into pages by using the `<!--nextpage-->` tag in the content body.
`partials/entry-taxonomy.php` | Template used to display Categories and Tags related to the current post. 
`partials/entry-thumbnail-fancy.php` | Template for showing a large version of the Featured Image on a post.


### Content Template Patterns

These patterns can be used to create more-specific content templates.

Pattern | Description
---|---
`partials/content-{post_type}.php` | Like `content.php`, but this template handles content for a custom post_type. Example: `partials/content-gallery_item.php`
`partials/content-post-{post_format}.php` | Like `content-post.php`, but this template is for a specific post_format. Example: `partials/content-post-video.php`
`partials/entry-footer-{post_type}.php` | Like `entry-footer.php`, but this template is for a specific post_type. Example: `partials/entry-footer-gallery_item.php`
`partials/entry-meta-{post_type}.php` | Like `entry-meta.php`, but this template is for a specific post_type. Example: `entry-meta-gallery_item.php`

### Widget Templates

Templating provided by [Sweet Widgets Templates](https://github.com/daggerhart/sweet-widgets/tree/master/modules/widget-templates).


#### Widget Template Patterns

These patterns can be used to create more-specific widget templates.

Pattern | Description
---|---
`widget-templates/{sidebar-id}--{widget-id}.php` | Specific widget in specific sidebar.
`widget-templates/{sidebar-id}--default.php` | Any widget in a specific sidebar.
`widget-templates/{widget-id}.php` | Specific widget in any sidebar.
`widget-templates/widget--default.php` | Any widget in any sidebar.


#### Widget Template Files

File | Description
---|---
`widget-templates/widget--default.php` | The default HTML for widgets in this theme.

### Other Files

File | Description
---|---
`functions.php` | Used to load other files from the `includes` folder.
`includes/assets.php` | Hooks related to assets and serving them.
`includes/config.php` | Hooks this theme uses to initialize itself.
`includes/sidebars.php` | Hooks that register and alter theme sidebars and widgets.
`includes/utilities.php` | Custom functions used by the theme.


## SCSS

[CLI Reference](http://sass-lang.com/documentation/file.SASS_REFERENCE.html)

```
sass -scss --watch style.scss:style.css
```

##### Todo

* Core Theme supports
    * `custom-background` Background color
    * `custom-header` Header image
* Accessibility