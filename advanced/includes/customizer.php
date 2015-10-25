<?php
/**
 * awesomesauce Theme Customizer.
 *
 * @package awesomesauce
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function awesomesauce_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'theme_settings',
		array(
			'title'    => 'Theme Settings',
			'priority' => 35,
		) );

	/*
	 * Bootstrap container class
	 */
	$wp_customize->add_setting( 'container_class',
		array(
			'default' => 'container',
		) );

	$wp_customize->add_control( 'container_class',
		array(
			'label'   => 'Container',
			'section' => 'theme_settings',
			'type'    => 'select',
			'choices' => array(
				'container'       => 'Fixed',
				'container-fluid' => 'Fluid',
			)
		) );

	/*
	 * Bootstrap navbar class
	 */
	$wp_customize->add_setting( 'navbar_class',
		array(
			'default' => 'navbar-default',
		) );

	$wp_customize->add_control( 'navbar_class',
		array(
			'label'   => 'Navbar Style',
			'section' => 'theme_settings',
			'type'    => 'select',
			'choices' => array(
				'navbar-default' => 'Default',
				'navbar-inverse' => 'Inverse',
			)
		) );

	/*
	 * Content width
	 */
	$wp_customize->add_setting( 'content_width',
		array(
			'default' => 640,
		) );

	$wp_customize->add_control( 'content_width',
		array(
			'label'       => 'Content widget',
			'description' => 'Pixel width limit for embedded content.',
			'section'     => 'theme_settings',
			'type'        => 'number',
		) );

	/*
	 * Excerpt length
	 */
	$wp_customize->add_setting( 'excerpt_length',
		array(
			'default' => 20,
		) );

	$wp_customize->add_control( 'excerpt_length',
		array(
			'label'       => 'Excerpt Length',
			'description' => 'Word limit for excerpts.',
			'section'     => 'theme_settings',
			'type'        => 'number',
		) );

	/*
	 * Excerpt more
	 */
	$wp_customize->add_setting( 'excerpt_more',
		array(
			'default' => '[&hellip;]',
		) );

	$wp_customize->add_control( 'excerpt_more',
		array(
			'label'       => 'Excerpt more',
			'description' => 'Content appended to post excerpts.',
			'section'     => 'theme_settings',
			'type'        => 'text',
		) );

	/*
	 * Excerpt more link
	 */
	$wp_customize->add_setting( 'excerpt_more_link',
		array(
			'default' => 0,
		) );

	$wp_customize->add_control( 'excerpt_more_link',
		array(
			'label'       => 'Link "Excerpt more"',
			'description' => 'Convert the "Excerpt more" content into a link to the post.',
			'section'     => 'theme_settings',
			'type'        => 'checkbox',
		) );
}
add_action( 'customize_register', 'awesomesauce_customize_register' );
