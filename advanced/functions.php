<?php
/**
 * Awesomesauce - Base Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * This file is automatically loaded on every page while this theme is enabled.
 */

/**
 * Setup and Initialization related hooks
 */
require get_template_directory() . '/includes/config.php';

/**
 * Customizer settings
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Scripts and Style related hooks
 */
require get_template_directory() . '/includes/assets.php';

/**
 * Google Fonts as settings in the Customizer
 */
require get_template_directory() . '/includes/google-fonts.php';

/**
 * Sidebar and widget related hooks
 */
require get_template_directory() . '/includes/sidebars.php';

/**
 * Utility functions that help the template files
 */
require get_template_directory() . '/includes/utilities.php';

/**
 * Sweet Widget Templates
 *
 * https://github.com/daggerhart/sweet-widgets
 */
require get_template_directory() . '/includes/vendor/widget-templates.php';
