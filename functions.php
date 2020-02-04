<?php

/**
 * Enqueue Styles
 */
function add_theme_scripts() {
	wp_enqueue_style( 'edxstarter-style', get_stylesheet_uri(), array(), '20200125' );
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
