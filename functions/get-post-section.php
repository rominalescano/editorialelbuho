<?php
/**
 * Get Post
 *
 * Query Post
 *
 * @category   Tool
 * @package    WordPress
 * @subpackage Bonusbank
 * @author     Kronoscode <kronoscode.com>
 * @link       https://kronoscode.com
 * @since      1.0.0
 */

/**
 * Get Post
 * Query Post
 *
 * @package WordPress
 * @param string $query query value.
 */
function posts_in_category( $query ) {
	if ( $query->is_category ) {
		$query->set( 'posts_per_archive_page', 20 );
	}
}
add_filter( 'pre_get_posts', 'posts_in_category' );
