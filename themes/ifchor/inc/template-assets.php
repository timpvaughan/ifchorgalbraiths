<?php

function ifchor_styles()
{
	$version = IFCHOR_VERSION;

	// Dependency styles
	wp_enqueue_style("font", "//use.typekit.net/dlz0zsf.css", [], $version);
	wp_enqueue_style("bootstrap", IFCHOR_ASSETS_URI . "vendors/bootstrap/css/bootstrap.min.css", [], $version);
	wp_enqueue_style("fontawesome", IFCHOR_ASSETS_URI . "vendors/fontawesome/css/all.min.css", [], $version);
	wp_enqueue_style("swiper", IFCHOR_ASSETS_URI . "vendors/swiperjs/css/swiper-bundle.min.css", [], $version);
	wp_enqueue_style("select2", IFCHOR_ASSETS_URI . "vendors/select2/css/select2.min.css", [], $version);
	wp_enqueue_style("aos", "https://unpkg.com/aos@2.3.1/dist/aos.css", [], $version);

	// Custom theme style
	wp_enqueue_style("ifchor", IFCHOR_ASSETS_URI . "css/app.css", ["font", "fontawesome", "swiper", "aos"], $version);
}
add_action("wp_enqueue_scripts", "ifchor_styles");

function ifchor_scripts()
{
	$version = IFCHOR_VERSION;

	// Common scripts
	wp_enqueue_script("jquery");
	wp_enqueue_script("bootstrap", IFCHOR_ASSETS_URI . "vendors/bootstrap/js/bootstrap.bundle.min.js", ["jquery"], $version, true);
	wp_enqueue_script("swiper", IFCHOR_ASSETS_URI . "vendors/swiperjs/js/swiper-bundle.min.js", [], $version, true);
	wp_enqueue_script("aos", "https://unpkg.com/aos@2.3.1/dist/aos.js", [], $version, true);
	wp_enqueue_script("select2", IFCHOR_ASSETS_URI . "vendors/select2/js/select2.full.min.js", [], $version, true);
	wp_enqueue_script("simple-parallax", "https://cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js", [], $version, true);

	if (is_home() || is_front_page()) {
		wp_enqueue_script("vimeo", "https://player.vimeo.com/api/player.js", ["bootstrap", "jquery"], $version, true);
	}

	// GSAP only for tpl-history.php
	if (is_page_template("tpl-history.php")) {
		wp_enqueue_script("gsap", "https://unpkg.com/gsap@3/dist/gsap.min.js", [], null, true);
		wp_enqueue_script("scrolltrigger", "https://unpkg.com/gsap@3/dist/ScrollTrigger.min.js", ["gsap"], null, true);
		wp_enqueue_script("timeline-gsap", get_template_directory_uri() . "/assets/js/timeline-gsap.js", ["scrolltrigger"], null, true);
	}

	// Main app script
	$deps = ["jquery", "bootstrap", "swiper", "aos", "simple-parallax"];
	if (is_home() || is_front_page()) {
		$deps[] = "vimeo";
	}
	wp_enqueue_script("ifchor", IFCHOR_ASSETS_URI . "js/app.js", $deps, $version, true);

	global $wp_query;
	wp_add_inline_script(
		"ifchor",
		"const ifchor_vars = " .
			wp_json_encode([
				"ajaxurl" => admin_url("admin-ajax.php"),
				"posts" => $wp_query->query_vars,
				"current_page" => get_query_var("paged") ?: 1,
				"max_page" => $wp_query->max_num_pages,
				"nonce" => wp_create_nonce("ifchor-nonce"),
				"loading" => __("Loading...", "ifchor"),
				"load_more" => __("Load more", "ifchor"),
				"contacts_url" => get_post_type_archive_link("ig-contact"),
				"offices_url" => get_page_link(get_page_by_path("our-offices")),
				"home_url" => trailingslashit(home_url()),
			]) .
			";",
		"before",
	);

	// Threaded comments
	if (is_singular() && comments_open() && get_option("thread_comments")) {
		wp_enqueue_script("comment-reply");
	}
}
add_action("wp_enqueue_scripts", "ifchor_scripts");
