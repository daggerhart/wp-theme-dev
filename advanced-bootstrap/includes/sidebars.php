<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function awesomesauce_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'awesomesauce' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'awesomesauce_widgets_init' );

/**
 * Execute shortcodes within text widgets
 */
//add_filter('widget_text', 'do_shortcode');