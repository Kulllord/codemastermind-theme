<?php
/**
 * Enqueue scripts and styles.
 */
function cmm_s_scripts() {
	/**
	 * If WP is in script debug, or we pass ?script_debug in a URL - set debug to true.
	 */
	$debug = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG == true ) || ( isset( $_GET['script_debug'] ) ) ? true : false;

	/**
	 * If we are debugging the site, use a unique version every page load so as to
	 * ensure no cache issues.
	 */
	$version = '0.1.0';

	/**
	 * Should we load minified files?
	 */
	$suffix = ( true === $debug ) ? '' : '.min';

	// Enqueue styles.
	wp_enqueue_style( 'cmm_s-style', get_stylesheet_directory_uri() . '/style' . $suffix . '.css', array(), $version );

	// Enqueue scripts.
	// wp_enqueue_script( 'cmm_s-bootstrap', get_template_directory_uri() . '/js/bootstrap' . $suffix . '.js', array( 'jquery' ), $version, true );
	wp_enqueue_script( 'cmm_s-scripts', get_template_directory_uri() . '/js/project' . $suffix . '.js', array( 'jquery' ), $version, true );
	// wp_enqueue_script( 'cmm_s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), $version, true );
	// wp_enqueue_script( 'cmm_s-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), $version, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cmm_s_scripts' );
