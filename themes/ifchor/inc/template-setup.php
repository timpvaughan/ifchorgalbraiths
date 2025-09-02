<?php
function ifchor_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on CrossOriginWP, use a find and replace
	 * to change 'ifchor' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ifchor', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		[
			'main-menu'   => esc_html__( 'Main Menu', 'ifchor' ),
			'nav-menu'    => esc_html__( 'Nav Menu', 'ifchor' ),
			'footer_menu' => esc_html__( 'Footer Menu', 'ifchor' ),
			'footer_offcanvas' => esc_html__( 'Footer OffCanvas', 'ifchor' ),
		]
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		[
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		]
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'ifchor_custom_background_args',
			[
				'default-color' => 'ffffff',
				'default-image' => '',
			]
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		[
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		]
	);

	add_image_size( 'ifchor_thumbnail_425_300', 425, 300, true );
	add_image_size( 'ifchor_thumbnail_600_900', 600, 900, true );
	add_image_size( 'ifchor_thumbnail_1320_788', 1320, 788, true );
	//add_image_size( 'ifchor_contact_329_282', 329, 282, true );
}

add_action( 'after_setup_theme', 'ifchor_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ifchor_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ifchor_content_width', 640 );
}

add_action( 'after_setup_theme', 'ifchor_content_width', 0 );