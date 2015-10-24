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
 * Scripts and Style related hooks
 */
require get_template_directory() . '/includes/assets.php';

/**
 * Sidebar and widget related hooks
 */
require get_template_directory() . '/includes/sidebars.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Utility functions that help the template files
 */
require get_template_directory() . '/includes/utilities.php';

/**
 * Bootstrap Navwalker helps convert normal theme menus into Bootstrap Navbars
 *
 * https://github.com/twittem/wp-bootstrap-navwalker
 */
require get_template_directory() . '/includes/vendor/wp_bootstrap_navwalker.php';
