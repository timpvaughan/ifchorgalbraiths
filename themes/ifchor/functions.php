<?php
$ifchor        = wp_get_theme();
$theme_version = $ifchor->get( 'Version' );

if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
	$theme_version = current_time( 'timestamp' ); //for development time only
}

define( 'IFCHOR_DIR', get_template_directory() );
define( 'IFCHOR_URL', get_template_directory_uri() );
define( 'IFCHOR_ASSETS_URI', get_template_directory_uri() . '/assets/' );
define( 'IFCHOR_INC_DIR', get_template_directory() . '/inc/' );
define( 'IFCHOR_LIB_DIR', get_template_directory() . '/libs/' );
define( 'IFCHOR_VERSION', $theme_version );

/**
 * After theme setup
 */
require IFCHOR_INC_DIR . 'template-setup.php';

/**
 * Register default widgets
 */
require IFCHOR_INC_DIR . 'template-widgets.php';

/**
 * Enqueue scripts and styles.
 */
require IFCHOR_INC_DIR . 'template-assets.php';

// function ifchor_scripts() {
// 	wp_enqueue_style( 'ifchor-style', get_stylesheet_uri(), array(), _S_VERSION );
// 	wp_style_add_data( 'ifchor-style', 'rtl', 'replace' );

// 	wp_enqueue_script( 'ifchor-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

// 	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
// 		wp_enqueue_script( 'comment-reply' );
// 	}
// }
// add_action( 'wp_enqueue_scripts', 'ifchor_scripts' );

/**
 * Implement the Custom Header feature.
 */
require IFCHOR_INC_DIR . 'custom-header.php';

/**
 * Custom template tags for this theme.
 */
require IFCHOR_INC_DIR . 'template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require IFCHOR_INC_DIR . 'template-functions.php';

/**
 * Customizer additions.
 */
require IFCHOR_INC_DIR . 'customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require IFCHOR_INC_DIR . 'jetpack.php';
}

/**
 * Load Bootstrap 5 navwalker
 */
require IFCHOR_LIB_DIR . 'bs5-navwalker.php';

/**
 * Load comment template
 */
require IFCHOR_INC_DIR . 'comment-template.php';

/**
 * Load WooCommerce support
 */

if( class_exists( 'WooCommerce' ) ) {
	require IFCHOR_INC_DIR . 'woocommerce-init.php';
}


// Svg support for media library
function ifchor_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'upload_mimes', 'ifchor_mime_types' );

