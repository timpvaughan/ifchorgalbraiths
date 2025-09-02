<?php

class WoocommerceInit {

	public function __construct() {
		add_action( 'woocommerce_before_main_content', array( $this, 'ifchor_remove_sidebar_from_product' ) );

		// Add Div wrapper to WooCommerce pages
		add_action( 'woocommerce_before_main_content', array( $this, 'ifchor_add_div_wrapper_start' ), 10 );
		add_action( 'woocommerce_after_main_content', array( $this, 'ifchor_add_div_wrapper_end' ), 10 );

	}

	public function ifchor_widgets_init() {
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

	public function ifchor_remove_sidebar_from_product() {
		if ( is_product() || is_shop() || is_product_category() || is_product_tag() ) {
			remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
		}
	}

	public function ifchor_add_div_wrapper_start() {
		echo '<div class="container">';
	}

	public function ifchor_add_div_wrapper_end() {
		echo '</div>';
	}


}

$obj = new WoocommerceInit();