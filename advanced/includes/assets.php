<?php

/**
 * Enqueue scripts and styles.
 */
function awesomesauce_scripts() {
	$theme = wp_get_theme();
	$version = $theme->get( 'Version' );

	wp_enqueue_style( 'awesomesauce-style', get_stylesheet_uri(), array(), $version );

	wp_enqueue_script( 'awesomesauce-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), $version, true );

	// google fonts
	if ( get_theme_mod( 'google_fonts_headings', false ) || get_theme_mod( 'google_fonts_headings', false ) ) {
		wp_enqueue_style( 'awesomesauce-google-fonts', _awesomesauce_google_fonts_url(), array(), $version );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/*
	 * Bootstrap
	 */
	// bootstrap js
	wp_enqueue_script( 'bootstrap-min-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', array( 'jquery' ), $version, true );
}
add_action( 'wp_enqueue_scripts', 'awesomesauce_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function awesomesauce_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'awesomesauce_body_classes' );
