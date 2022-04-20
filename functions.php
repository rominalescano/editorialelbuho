<?php
/**
 * bonusbank functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package editorialelbuho
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '2.0.0' );
}

require get_template_directory() . '/functions/setups.php';


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
require get_template_directory() . '/functions/widgets.php';

/**
 * Enqueue scripts and styles.
 * set async attrs
 */
require get_template_directory() . '/functions/enqueues.php';

/**
 * Blocks Gutemberg
 */
require get_template_directory() . '/functions/block_types.php';


/**
 * Admin Menu Options
 */
require get_template_directory() . '/functions/admin_menu_options.php';


// 
require_once 'functions/redirect-logo-cutom-page.php';

//Disable Gutenberg Blocks
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );
