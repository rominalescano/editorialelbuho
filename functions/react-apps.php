<?php
/**
 * Enqueue react apps
 *
 * @category   Actions
 * @package    WordPress
 * @subpackage Bonusbank
 * @author     Kronoscode <kronoscode.com>
 * @link       https://kronoscode.com
 * @since      1.0.0
 */
add_action( 'wp_enqueue_scripts', 'react_apps_enqueue' );
/** Enqueue Apps
 */
function react_apps_enqueue() {
	if ( is_page( 'Bonusbank Lock In Calculator' ) ) {
        wp_enqueue_script( 
            'lockin-main',
            get_stylesheet_directory_uri() . '/apps/lock-in/dist/lock-in.min.js',
            array (  ), '2.0.0',
             true
        );
        wp_register_style(
			'lockin-styles',
			get_template_directory_uri() . '/apps/lock-in/dist/lock-in.min.css',
			array(),
			'1.0.0',
			'all'
		);
    }
}