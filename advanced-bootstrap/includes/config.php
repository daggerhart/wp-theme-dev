<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function awesomesauce_setup() {	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on awesomesauce, use a find and replace
	 * to change 'awesomesauce' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'awesomesauce', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	/*
	 * Add a "fancy-large" image size for large background images
	 */
	add_image_size( 'fancy-large', 900, 300, array( 'center', 'top' ) );

	/*
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'awesomesauce' ),
	) );
}
add_action( 'after_setup_theme', 'awesomesauce_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @link https://codex.wordpress.org/Content_Width
 *
 * @global int $content_width
 */
function awesomesauce_content_width() {
	$GLOBALS['content_width'] = get_theme_mod( 'content_width', 640 );
}
add_action( 'after_setup_theme', 'awesomesauce_content_width', 0 );

/**
 * Allow the theme settings to override excerpt_length
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/excerpt_length
 *
 * @param $length
 * @return mixed
 */
function awesomesauce_excerpt_length( $length ){
	return get_theme_mod( 'excerpt_length', $length );
}
add_filter( 'excerpt_length', 'awesomesauce_excerpt_length' );

/**
 * Allow the theme settings to override excerpt_more
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/excerpt_more
 *
 * @param $more
 * @return mixed
 */
function awesomesauce_excerpt_more( $more ){
	$more = html_entity_decode( get_theme_mod( 'excerpt_more', $more ) );

	// optionally, create as a link
	if ( get_theme_mod( 'excerpt_more_link' , 0 ) ) {
		$href = get_permalink();
		$more = "<a href='{$href}'>{$more}</a>";
	}

	// wrap for styling
	return "<span class='excerpt-more'>{$more}</span>";
}
add_filter( 'excerpt_more', 'awesomesauce_excerpt_more' );

/**
 * Sweet Widget Templates - Override the widget templates folder
 *
 * @param $folder
 * @return string
 */
function awesomesauce_widget_templates_folder( $folder ){
	return 'widget-templates';
}
add_filter( 'sweet_widgets_templates-folder', 'awesomesauce_widget_templates_folder' );