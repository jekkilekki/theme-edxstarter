<?php
/**
 * EdxStarter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage EdxStarter
 * @since 1.0.0
 */

/**
 * Enqueues the Stylesheet for EdxStarter.
 */
function edxstarter_enqueue_scripts() {
	wp_enqueue_style( 'edxstarter-style', get_template_directory_uri() . '/style.css', array(), '20121213' );
}
add_action( 'wp_enqueue_scripts', 'edxstarter_enqueue_scripts' );
