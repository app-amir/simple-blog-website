<?php
/**
 * Theme functions and definitions
 *
 * @package BLOG
 */
define( 'BLOG', '1.0.1' );
define( 'BLOG_DIR', trailingslashit( get_stylesheet_directory() ) );

/**
 * Include methods.php.
 * @since 1.0.1
 */
require_once BLOG_DIR . 'includes/methods.php';

/**
 * By Using this Function Enqueue all the Scripts
 */
add_action( 'wp_enqueue_scripts', 'BLOG_enqueue_scripts', 200 );

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function BLOG_enqueue_scripts() {

	/**
	 * BLOG style.css file
	 */
	wp_enqueue_style( 'blog-style', get_stylesheet_directory_uri() . '/style.css',
		array( 'hello-elementor-theme-style' ),
		BLOG
	);

}