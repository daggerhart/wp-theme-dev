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
			'title'    => esc_html__( 'Theme Settings', 'awesomesauce' ),
			'priority' => 35,
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
			'label'       => esc_html__( 'Content widget', 'awesomesauce' ),
			'description' => esc_html__( 'Pixel width limit for embedded content.', 'awesomesauce' ),
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
			'label'       => esc_html__( 'Excerpt Length', 'awesomesauce' ),
			'description' => esc_html__( 'Word limit for excerpts.', 'awesomesauce' ),
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
			'label'       => esc_html__( 'Excerpt more', 'awesomesauce' ),
			'description' => esc_html__( 'Content appended to post excerpts.', 'awesomesauce' ),
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
			'label'       => esc_html__( 'Link "Excerpt more"', 'awesomesauce' ),
			'description' => esc_html__( 'Convert the "Excerpt more" content into a link to the post.', 'awesomesauce' ),
			'section'     => 'theme_settings',
			'type'        => 'checkbox',
		) );
}
add_action( 'customize_register', 'awesomesauce_customize_register' );
