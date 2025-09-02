<?php

function ifchor_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			[
				'selector'        => '.site-title a',
				'render_callback' => 'ifchor_customize_partial_blogname',
			]
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			[
				'selector'        => '.site-description',
				'render_callback' => 'ifchor_customize_partial_blogdescription',
			]
		);
	}

}

add_action( 'customize_register', 'ifchor_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ifchor_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ifchor_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ifchor_customize_preview_js() {
	wp_enqueue_script( 'ifchor-customizer', IFCHOR_ASSETS_URI . 'js/customizer.js', [ 'customize-preview' ], IFCHOR_VERSION, true );
}

add_action( 'customize_preview_init', 'ifchor_customize_preview_js' );
