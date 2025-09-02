<?php
function ifchor_widgets_init() {
	register_sidebar(
		[
			'name'          => esc_html__( 'Sidebar', 'ifchor' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ifchor' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		]
	);
}

add_action( 'widgets_init', 'ifchor_widgets_init' );


/**
 * Remove sidebar from product page
 * @return void
 * @since 1.0.0
 */
function ifchor_remove_sidebar_from_product() {
	if ( is_product() || is_shop() || is_product_category() || is_product_tag() ) {
		remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
	}
}

// Product page sidebar hide
add_action( 'woocommerce_before_main_content', 'ifchor_remove_sidebar_from_product' );
