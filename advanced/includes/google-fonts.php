<?php

/**
 * An array of all google font options
 *
 * @return array
 */
function awesomesauce_google_fonts_options(){
	$fonts = array(
		'Lato',
		'Merriweather',
		'Montserrat',
		'Neuton',
		'Oswald',
		'Quattrocento',
		'Playfair Display',
		'Open Sans',
		'Roboto Slab',
		'Roboto',
	);

	return $fonts;
}

/**
 * Add google font options to the customizer
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function awesomesauce_google_fonts_customize_register( $wp_customize ) {
	/*
	 * Google Fonts
	 */
	$font_choices = array(
		0 => esc_html__( '- Disabled -', 'awesomesauce' )
	);

	// loop through list of available fonts
	foreach ( awesomesauce_google_fonts_options() as $option ){
		$font_choices[ $option ] = $option;
	}

	// headings
	$wp_customize->add_setting( 'google_fonts_headings',
		array(
			'default' => 0,
		) );

	$wp_customize->add_control( 'google_fonts_headings',
		array(
			'label'       => esc_html__( 'Headings font', 'awesomesauce' ),
			'description' => esc_html__( '', 'awesomesauce' ),
			'section'     => 'theme_settings',
			'type'        => 'select',
			'choices'     => $font_choices,
		) );

	// content
	$wp_customize->add_setting( 'google_fonts_content',
		array(
			'default' => 0,
		) );

	$wp_customize->add_control( 'google_fonts_content',
		array(
			'label'       => esc_html__( 'Content font', 'awesomesauce' ),
			'description' => esc_html__( '', 'awesomesauce' ),
			'section'     => 'theme_settings',
			'type'        => 'select',
			'choices'     => $font_choices,
		) );
}
add_action( 'customize_register', 'awesomesauce_google_fonts_customize_register' );

/**
 * Enqueue scripts and styles.
 */
function awesomesauce_google_fonts_scripts() {
	// google fonts
	if ( get_theme_mod( 'google_fonts_headings', false ) || get_theme_mod( 'google_fonts_headings', false ) ) {
		wp_enqueue_style( 'awesomesauce-google-fonts', _awesomesauce_google_fonts_url() );
	}
}
add_action( 'wp_enqueue_scripts', 'awesomesauce_google_fonts_scripts' );

/**
 * Inject the font family styles into the HTML head
 */
function awesomesauce_google_fonts_wp_head(){
	$headings = get_theme_mod( 'google_fonts_headings', 0 );

	if ( $headings )
	{
		?>
		<style>
			h1,h2,h3,h4,h5,h6,nav {
				font-family: '<?php echo $headings; ?>', sans-serif;
			}
		</style>
	<?php
	}

	$content = get_theme_mod( 'google_fonts_content', 0 );

	if ( $content )
	{
		?>
		<style>
			body, p {
				font-family: '<?php echo $content; ?>', serif;
			}
		</style>
	<?php
	}
}
add_action( 'wp_head', 'awesomesauce_google_fonts_wp_head' );

/**
 * Create a url for the selected Google fonts
 *
 * Examples: //fonts.googleapis.com/css?family=Open+Sans:400,700,300|Quattrocento|Lato|Merriweather|Montserrat|Neuton|Oswald|Playfair+Display|Roboto|Roboto+Slab
 *
 * @return string
 */
function _awesomesauce_google_fonts_url(){
	$headings = get_theme_mod( 'google_fonts_headings', 0 );
	$content = get_theme_mod( 'google_fonts_content', 0 );
	$fonts = array();

	if ( $headings ) {
		$fonts[] = urlencode( $headings );
	}

	if ( $content ) {
		$fonts[] = urlencode( $content );
	}

	$url = '//fonts.googleapis.com/css?family=' . implode( '|', $fonts );

	return $url;
}