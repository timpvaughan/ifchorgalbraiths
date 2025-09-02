<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package CrossOriginWP
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param  array  $classes  Classes for the body element.
 *
 * @return array
 */
function ifchor_body_classes($classes)
{
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = "hfeed";
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar("sidebar-1")) {
		$classes[] = "no-sidebar";
	}

	return $classes;
}

add_filter("body_class", "ifchor_body_classes");

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ifchor_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo("pingback_url")));
	}
}

add_action("wp_head", "ifchor_pingback_header");

/**
 * organize comment form
 */
function ifchor_move_comment_field_below($fields)
{
	$comment_field = $fields["comment"];
	$comment_cookies = $fields["cookies"];
	unset($fields["comment"]);
	unset($fields["cookies"]);
	unset($fields["url"]);
	$fields["comment"] = $comment_field;

	return $fields;
}

add_filter("comment_form_fields", "ifchor_move_comment_field_below");

/**
 * add theme options page using acf pro
 */
if (function_exists("acf_add_options_page")) {
	acf_add_options_page([
		"page_title" => "Theme Settings",
		"menu_title" => "Theme Settings",
		"menu_slug" => "ifchor_theme_settings",
		"capability" => "manage_options",
		"redirect" => false,
	]);
}

/**
 * @return void
 * Breadcrumb function for the theme
 * @since 1.0.0
 */
function ifchor_breadcrumb()
{
	global $post;
	$ifchor_opt = get_option("ifchor_opt");
	$brseparator = '<span class="separator">/</span>';
	if (!is_home()) {
		echo '<div class="breadcrumbs">';
		echo '<a href="';
		echo esc_url(home_url("/"));
		echo '">';
		echo esc_html__("Home", "ifchor");
		echo "</a>" . $brseparator;
		if (is_category() || is_single()) {
			if (is_singular("ifchor-research")) {
				echo '<a href="' . get_post_type_archive_link("ifchor-research") . '">' . esc_html__("Research & Insights", "ifchor") . "</a>";
				echo '<span class="separator">/</span>';

				the_title();
			} elseif (is_single()) {
				$categories = get_the_category();
				if (count($categories) > 0) {
					echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . "</a>";
				}
				if (count($categories) > 0) {
					echo "" . $brseparator;
				}
				the_title();
			}
		} elseif (is_page()) {
			if ($post->post_parent) {
				$anc = get_post_ancestors($post->ID);
				$title = get_the_title();
				foreach ($anc as $ancestor) {
					$output = '<a href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . "</a>" . $brseparator;
				}
				echo wp_kses($output, [
					"a" => [
						"href" => [],
						"title" => [],
					],
					"span" => [
						"class" => [],
					],
				]);
				echo '<span title="' . $title . '">' . $title . "</span>";
			} else {
				echo "<span>" . get_the_title() . "</span>";
			}
		} elseif (is_tag()) {
			single_tag_title();
		} elseif (is_day()) {
			printf(esc_html__("Archive for: %s", "ifchor"), "<span>" . get_the_date() . "</span>");
		} elseif (is_month()) {
			printf(esc_html__("Archive for: %s", "ifchor"), "<span>" . get_the_date(_x("F Y", "monthly archives date format", "ifchor")) . "</span>");
		} elseif (is_year()) {
			printf(esc_html__("Archive for: %s", "ifchor"), "<span>" . get_the_date(_x("Y", "yearly archives date format", "ifchor")) . "</span>");
		} elseif (is_author()) {
			echo "<span>" . esc_html__("Archive for", "ifchor");
			echo "</span>";
		} elseif (isset($_GET["paged"]) && !empty($_GET["paged"])) {
			echo "<span>" . esc_html__("Blog Archives", "ifchor");
			echo "</span>";
		} elseif (is_search()) {
			echo "<span>" . esc_html__("Search Results", "ifchor");
			echo "</span>";
		} elseif (is_post_type_archive("tribe_events")) {
			echo "<span>" . esc_html__("Events", "ifchor");
			echo "</span>";
		}
		echo "</div>";
	} else {
		echo '<div class="breadcrumbs">';
		echo '<a href="';
		echo esc_url(home_url("/"));
		echo '">';
		echo esc_html__("Home", "ifchor");
		echo "</a>" . $brseparator;
		echo esc_html__("News", "ifchor");

		echo "</div>";
	}
}

/**
 * Social share function for the theme
 * @return void
 * @since 1.0.0
 */
function ifchor_social_share()
{
	?>
<div class="post-share">
  <ul class="post-share-link">
    <li>
      <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
        <i class="fab fa-facebook-f"></i>
      </a>
    </li>
    <li>
      <a href="https://twitter.com/home?status=<?php the_permalink(); ?>" target="_blank">
        <i class="fab fa-twitter"></i>
      </a>
    </li>
    <li>
      <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=&source=" target="_blank">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </li>

    <!--		--><?php //if ( get_field( 'custom_share_button', 'option' ) ):
	?>
    <!--			<a href="-->
			<?php //the_field( 'custom_share_button', 'option' );
	?><!--" target="_blank"><i-->
    <!--						class="fas fa-share-alt"></i></a>-->
    <!--		--><?php //endif;
	?>
    <!---->
    <!--		--><?php //if ( get_field( 'custom_share_email', 'option' ) ):
	?>
    <!--			<a href="mailto:?subject=--><?php //the_title();
	?><!--&body=-->
			<?php //the_permalink();
	?><!--"-->
    <!--			   target="_blank"><i class="fas fa-envelope"></i></a>-->
    <!--		--><?php //endif;
	?>
  </ul>
  <h3 class="share-title"><?php esc_html_e("Share This Article", "ifchor"); ?></h3>
</div>
<?php
}

/**
 * Load more post
 *
 * @return void
 * @since 1.0.0
 */
function ichor_post_load_more()
{
	$nonce = $_REQUEST["nonce"];
	if (!wp_verify_nonce($nonce, "ifchor-nonce")) {
		die(__("Security check", "ifchor"));
	} else {
		// Do stuff here.
	}

	$args = json_decode(stripslashes($_POST["query"]), true);
	$args["paged"] = isset($_POST["page"]) ? intval($_POST["page"]) + 1 : 1;
	$args["post_status"] = "publish";

	query_posts($args);

	if (have_posts()):
		while (have_posts()):
			the_post();
			get_template_part("template-parts/content", get_post_type());
		endwhile;
	endif;
	die();
} //end function ichor_post_load_more() {

add_action("wp_ajax_ifchor_load_more", "ichor_post_load_more");
add_action("wp_ajax_nopriv_ifchor_load_more", "ichor_post_load_more");

/**
 * Add custom field to user profile
 *
 * @param $user_contact
 *
 * @return mixed
 */
function ifchore_add_author_designation_field($user_contact)
{
	$user_contact["designation"] = __("Designation", "ifchor");

	return $user_contact;
}

add_filter("user_contactmethods", "ifchore_add_author_designation_field");

function ifchor_contacts_archive($query)
{
	if ($query->is_main_query() && is_post_type_archive("ig-contact")) {
		// Display 50 posts for a custom post type called 'ifchor-contact'

		$contact_city = isset($_REQUEST["contact_city"]) ? wp_unslash($_REQUEST["contact_city"]) : "";
		$contact_department = isset($_REQUEST["contact_department"]) ? wp_unslash($_REQUEST["contact_department"]) : "";
		$contact_name = isset($_REQUEST["contact_name"]) ? wp_unslash($_REQUEST["contact_name"]) : "";

		$meta_query = [];

		if ($contact_city != "") {
			$meta_query[] = [
				"key" => "_contact_city",
				"value" => $contact_city,
				"compare" => "=",
			];
		}

		if ($contact_department !== "") {
			$meta_query[] = [
				"key" => "_contact_department",
				"value" => $contact_department,
				"compare" => "=",
			];
		}

		if ($contact_name !== "") {
			$query->set("s", $contact_name);
			/*$meta_query[] = array(
                'key'     => '_contact_name',
                'value'   => $contact_name,
                'compare' => '=',
            );*/
		}

		$meta = [];

		if (sizeof($meta_query) > 1) {
			$meta = [
				"relation" => "AND",
			];

			$meta = array_merge($meta, $meta_query);
		} else {
			$meta = array_merge($meta, $meta_query);
		}

		if (sizeof($meta_query) > 0) {
			$query->set("meta_query", $meta);
		}

		return;
	}
}

add_action("pre_get_posts", "ifchor_contacts_archive", 1);

add_action("admin_menu", "ifchor_admin_menus");

function ifchor_admin_menus()
{
	add_submenu_page("edit.php?post_type=ig-contact", __("Import Contacts", "ifchor"), __("Import Contacts", "ifchor"), "manage_options", "contacts-import", "ifchor_contacts_import");
} //end function ifchor_admin_menus

function ifchor_contacts_import()
{
	$nonce = wp_create_nonce("ifchor-nonce"); ?>
<div class="wrap">
  <h2><?php esc_html_e("Import Contacts", "ifchor"); ?></h2>
  <div id="poststuff">
    <div id="post-body" class="metabox-holder columns-2">
      <div id="post-body-content">
        <div class="meta-box-sortables ui-sortable">
          <div class="postbox">
            <div class="inside">
              <form action="#" method="post" enctype="multipart/form-data">
                <p><?php esc_html_e(".xls,.xlsx file types only", "ifchor"); ?></p>
                <input type="file" name="ifchor_contacts" id="ifchor_contacts_file" accept=".xls,.xlsx" />
                <input type="hidden" name="ifchor_security" value="<?php echo $nonce; ?>" />
                <button type="submit" id="submit" name="ifchor_contacts_import" class="button primary"><?php esc_attr_e("Import", "ifchor"); ?></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="clear clearfix"></div>
  </div>
</div>
<?php
}

add_action("admin_init", "ifchor_contact_import_process");
function ifchor_contact_import_process()
{
	if (isset($_REQUEST["ifchor_contacts_import"])) {
		$nonce = $_REQUEST["ifchor_security"];
		if (!wp_verify_nonce($nonce, "ifchor-nonce")) {
			die(__("Security check", "ifchor"));
		} else {
			// Do stuff here.

			//echo 'Import process started';

			if (defined("CBXPHPSPREADSHEET_PLUGIN_NAME") && file_exists(CBXPHPSPREADSHEET_ROOT_PATH . "lib/vendor/autoload.php")) {
				//Include PHPExcel
				require_once CBXPHPSPREADSHEET_ROOT_PATH . "lib/vendor/autoload.php";

				$allowedFileType = ["application/vnd.ms-excel", "text/xls", "text/xlsx", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"];

				if (isset($_FILES["ifchor_contacts"]["name"]) && in_array($_FILES["ifchor_contacts"]["type"], $allowedFileType)) {
					$Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

					$spreadSheet = $Reader->load($_FILES["ifchor_contacts"]["tmp_name"]);
					$sheetCount = $spreadSheet->getSheetCount();

					$contacts = [];

					for ($i = 0; $i < $sheetCount; $i++) {
						$sheet = $spreadSheet->getSheet($i);
						$sheetData = $sheet->toArray(null, true, true, true);
						$sheetDataSize = sizeof($sheetData);

						if ($i == 0) {
							//offices(City, Country, Flag, Address, Telephone Number,)

							$offices = [];
							$offices_by_city = [];

							for ($j = 3; $j <= $sheetDataSize; $j++) {
								$data = $sheetData[$j];

								$office_id = intval(trim($data["E"]));
								$city = trim($data["A"]);

								if ($city != "") {
									$office_data = [
										"country" => trim($data["B"]),
										"address" => trim($data["C"]),
										"telephone_number" => trim($data["D"]),
										"office_id" => $office_id,
										"area" => trim($data["F"]),
										"map_url" => esc_url($data["G"]),
										"dir_url" => esc_url($data["H"]),
									];

									$offices[$city . "---" . $office_id] = $office_data;

									//alternate data that holds multiple city based office info
									$office_data["city"] = $city;
									$offices_by_city[$office_id] = $office_data;
								}
							}

							update_option("ifchor_offices", $offices);
							update_option("ifchor_offices_by_city", $offices_by_city);
						} elseif ($i == 1) {
							//departments
							$departments = [];
							$departments_unique = [];
							$departments_by_city = [];

							for ($j = 3; $j <= $sheetDataSize; $j++) {
								$data = $sheetData[$j];

								if (trim($data["A"]) != "") {
									$department = trim($data["A"]);
									$city = trim($data["B"]);

									$departments[$department . "---" . $city] = [
										"city" => $city,
										"country" => trim($data["C"]),
										"telephone_number" => trim($data["D"]),
										"email" => trim($data["E"]),
									];

									$departments_unique[] = trim($data["A"]);

									$department_c = strtoupper($department);

									if (isset($departments_by_city[$department_c])) {
										$cities_by_dept = $departments_by_city[$department_c];
										$cities_by_dept[] = $city;
										$departments_by_city[$department_c] = $cities_by_dept;
									} else {
										$departments_by_city[$department_c] = [$city];
									}
								}
							}

							update_option("ifchor_departments_by_city", $departments_by_city);
							update_option("ifchor_departments", $departments);
							update_option("ifchor_departments_unique", array_unique(array_filter($departments_unique)));
						} elseif ($i == 2 || $i == 3) {
							//contacts tab

							for ($j = 2; $j <= $sheetDataSize; $j++) {
								$data = $sheetData[$j];

								if (trim($data["A"]) != "") {
									$contacts[] = [
										"name" => trim($data["A"]),
										"department" => trim($data["B"]),
										"mobile" => trim($data["C"]),
										"telephone" => trim($data["D"]),
										"email" => trim($data["E"]),
										"city" => trim($data["F"]),
										"country" => trim($data["G"]),
										"id" => intval($data["H"]),
										"show_dept" => intval(trim($data["I"])),
										"office_id" => intval(trim($data["J"])),
										"show_phone" => intval(trim($data["K"])),
									];
								}
							}
						}
					}

					if (sizeof($contacts) > 0) {
						//delete all existing contacts
						$existing_contacts = get_posts(["post_type" => "ig-contact", "numberposts" => -1]);
						foreach ($existing_contacts as $eachpost) {
							delete_post_thumbnail($eachpost->ID);
							wp_delete_post($eachpost->ID, true);
						}

						foreach ($contacts as $contact) {
							$my_post = [
								"post_title" => wp_strip_all_tags($contact["name"]),
								"post_content" => "",
								"post_status" => "publish",
								"post_type" => "ig-contact",
							];

							// Insert the post into the database
							$post_id = wp_insert_post($my_post);

							if (!is_wp_error($post_id)) {
								//the post is valid

								update_post_meta($post_id, "_contact_city", $contact["city"]);
								update_post_meta($post_id, "_contact_department", $contact["department"]);

								$contact_others = [];
								$contact_others["_contact_country"] = $contact["country"];
								$contact_others["_contact_email"] = $contact["email"];
								$contact_others["_contact_telephone_number"] = $contact["telephone"];
								$contact_others["_contact_mobile_number"] = $contact["mobile"];
								$contact_others["_contact_id"] = $contact["id"];
								$contact_others["_contact_show_dept"] = $contact["show_dept"];
								$contact_others["_contact_show_phone"] = $contact["show_phone"];
								$contact_others["_contact_office_id"] = $contact["office_id"];

								update_post_meta($post_id, "_contact_others", $contact_others);
							} else {
								//there was an error in the post insertion,
								//echo $post_id->get_error_message();
							}
						}
					}

					update_option("ifchor_contact_imported", 1);
					wp_safe_redirect(admin_url("edit.php?post_type=ig-contact"));
				}
			} else {
				echo "Seems - CBX PhpSpreadSheet Library plugin is not not installed or activated. Please activate the plugin or download & install from this repo https://github.com/codeboxrcodehub/cbxphpspreadsheet .";
			}

			exit();
		}
	}
}

function ifchor_contacts_import_notice()
{
	global $pagenow;

	if ($pagenow == "edit.php" && isset($_REQUEST["post_type"]) && $_REQUEST["post_type"] == "ifchor-contact") {
		$import = intval(get_option("ifchor_contact_imported", 0));
		if ($import) {
			echo '<div class="notice notice-info is-dismissible">
          <p>' .
				esc_html__("Contacts imported successfully.", "ifchor") .
				'</p>
         </div>';

			delete_option("ifchor_contact_imported");
		}
	}
}

add_action("admin_notices", "ifchor_contacts_import_notice");

/**
 * @return void
 * WooCommerce support
 */
function ifchor_add_woocommerce_support()
{
	add_theme_support("woocommerce");
}

add_action("after_setup_theme", "ifchor_add_woocommerce_support");

//codes transformed from old theme
// For all products except variable product

add_filter("woocommerce_product_single_add_to_cart_text", "product_single_add_to_cart_text_filter_callback", 20, 2);
function product_single_add_to_cart_text_filter_callback($button_text, $product)
{
	if (!$product->is_in_stock() && !$product->is_type("variable")) {
		$button_text = __("Out of stock", "woocommerce");
	}

	return $button_text;
}

/**
 * @param $button_text
 * @param $product
 *
 * @return string
 * For all product variations (on a variable product)
 */
add_filter("woocommerce_product_add_to_cart_text", "product_variation_add_to_cart_text_filter_callback", 20, 2);
function product_variation_add_to_cart_text_filter_callback($button_text, $product)
{
	if (!$product->is_in_stock() && $product->is_type("variation")) {
		$button_text = __("Out of stock", "woocommerce");
	}

	return $button_text;
}

/**
 * @param $variation_id
 * @param $variation
 * @param $variation_attributes
 * @param $variation_data
 * For all product variations (on a variable product)
 */
add_action("woocommerce_after_add_to_cart_button", "after_add_to_cart_button_action_callback", 0);
function after_add_to_cart_button_action_callback()
{
	global $product;

	if ($product->is_type("variable")):

		$data = [];

		// Loop through variation Ids
		foreach ($product->get_visible_children() as $variation_id) {
			$variation = wc_get_product($variation_id);
			$data[$variation_id] = $variation->is_in_stock();
		}

		$outofstock_text = __("Out of Stock", "woocommerce");
		?>
<script type="text/javascript">
  jQuery(function($) {
    var b = 'button.single_add_to_cart_button',
      t = $(b).text();

    $('form.variations_form').on('show_variation hide_variation found_variation', function() {
      $.each(<?php echo json_encode($data); ?>, function(j, r) {
        var i = $('input[name="variation_id"]').val();
        if (j == i && i != 0 && !r) {
          $(b).html('<?php echo $outofstock_text; ?>');
          return false;
        } else {
          $(b).html(t);
        }
      });
    });
  });
</script>
<?php
	endif;
}

//remove related product
remove_action("woocommerce_after_single_product_summary", "woocommerce_output_related_products", 20);
add_filter("woocommerce_product_related_posts_query", "__return_empty_array", 100);

/**
 * @snippet       Remove Additional Information Tab @ WooCommerce Single Product Page
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.8
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

add_filter("woocommerce_product_tabs", "galbraiths_remove_product_tabs", 9999);

function galbraiths_remove_product_tabs($tabs)
{
	unset($tabs["additional_information"]);

	return $tabs;
}

/**
 * @snippet       Remove "Description" Title @ WooCommerce Single Product Tabs
 * @how-to        Get CustomizeWoo.com FREE
 * @sourcecode    https://businessbloomer.com/?p=97716
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.5.3
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
add_filter("woocommerce_product_description_heading", "__return_null");

/*add_action('woocommerce_payment_complete', 'woocommerce_payment_complete_logout', 10, 1);

function custom_process_order() {
    wp_logout();
}*/

// Logout after checkout and redirect to shop
add_action("template_redirect", "galbraiths_order_received_logout_redirect");

/**
 * Re-Redirect user to order received page as guest user
 */
function galbraiths_order_received_logout_redirect()
{
	// Only on "Order received" page
	if (function_exists("is_wc_endpoint_url") && is_wc_endpoint_url("order-received")) {
		$cbxwcflo = isset($_REQUEST["cbxwcflo"]) ? absint($_REQUEST["cbxwcflo"]) : 0;

		if (is_user_logged_in() && in_array("pending", wp_get_current_user()->roles) && $cbxwcflo == 0) {
			wp_logout(); // Logout

			global $wp;

			// Get the order ID
			$order_id = absint($wp->query_vars["order-received"]);

			$key = isset($_REQUEST["key"]) ? wp_unslash($_REQUEST["key"]) : "";

			$order_received_url = wc_get_endpoint_url("order-received", $order_id, wc_get_checkout_url());
			$order_received_url = add_query_arg("key", $key, $order_received_url);
			$order_received_url = add_query_arg("cbxwcflo", 1, $order_received_url);

			if ($order_id > 0 && $key != "") {
				wp_redirect(apply_filters("codeboxr_order_received_logout_redirect_url", $order_received_url, $order_id, $key)); // Redirect to order received page
			} else {
				// Shop redirection url
				$shop_url = get_permalink(get_option("woocommerce_shop_page_id"));
				wp_redirect(apply_filters("codeboxr_order_received_logout_redirect_url", $shop_url, $order_id, $key)); // Redirect to shop
			}

			exit(); // Always exit
		} //end if
	} //end if order received page
}

//display payment gateway based on location/endpoint
/**
 * @snippet
 * WooCommerce: Hide Payment Gateway for Specific Product Category
 */
add_filter("woocommerce_available_payment_gateways", "galbraiths_switch_gateways_by_context");
function galbraiths_switch_gateways_by_context($available_gateways)
{
	global $woocommerce;

	$endpoint = $woocommerce->query->get_current_endpoint();

	if ($endpoint == "order-pay") {
		if (isset($available_gateways["cod"])) {
			unset($available_gateways["cod"]);
		}

		if (isset($available_gateways["invoice"])) {
			unset($available_gateways["invoice"]);
		}
	} else {
		if (isset($available_gateways["stripe"])) {
			unset($available_gateways["stripe"]);
		}
	}

	return $available_gateways;
}

/**
 * Page Preloader Function for all pages
 * @return void
 * @since 1.0.0
 */
function ifchor_page_loader()
{
	?>
<div class="page-preloader">
  <div class="skills-graph-circle">
    <span class="skills-graph-circle__count" data-skills-graph-perc="100">0</span>
    <svg width="200" height="200">
      <circle class="skills-graph-circle__backg" r="80" cx="100" cy="100" stroke-width="10" fill="none"></circle>
      <circle class="skills-graph-circle__bar" r="80" cx="100" cy="100" stroke-dasharray="502.4" stroke-dashoffset="502.4" stroke-width="10" fill="none" transform="rotate(-90 100 100)"></circle>
    </svg>
  </div>
</div>
<?php
} // end ifchor_page_loader

//add_action( 'wp_footer', 'ifchor_page_loader' );

add_action("pre_get_posts", "if_contact_sort_order");
function if_contact_sort_order($query)
{
	if (is_post_type_archive("ig-contact")):
		//If you wanted it for the archive of a custom post type use: is_post_type_archive( $post_type )
		//Set the order ASC or DESC
		$query->set("order", "ASC");
		//Set the orderby
		$query->set("orderby", "title");
	endif;
}

// remove clickable prodcut image
function e12_remove_product_image_link($html, $post_id)
{
	return preg_replace("!<(a|/a).*?>!", "", $html);
}

add_filter("woocommerce_single_product_image_thumbnail_html", "e12_remove_product_image_link", 10, 2);

add_action("wp_lazy_loading_enabled", "ifchor_wp_lazy_loading_enabled_avatar", 10, 3);
function ifchor_wp_lazy_loading_enabled_avatar($default, $tag_name, $context)
{
	if ($tag_name == "img" && $context == "get_avatar") {
		return false;
	}

	return $default;
}

function office_items_filter_link($loc = "")
{
	if ($loc == "") {
		return get_the_permalink();
	}

	$loc = trim(strtoupper($loc));

	$link = get_the_permalink();

	return add_query_arg("loc", $loc, $link);
}

function office_items_filter_active_class($loc = "", $current = "")
{
	if ($loc == "") {
		return "";
	}

	$loc = trim(strtoupper($loc));

	return $loc === $current ? "active" : "";
}

function office_items_dept_filter_link($dept = "")
{
	if ($dept == "") {
		return get_the_permalink();
	}

	$dept = trim(strtoupper($dept));

	$link = get_the_permalink();

	return add_query_arg("dept", $dept, $link);
} //end function office_items_dept_filter_link

function office_items_dept_filter_active_class($dept = "", $current = "")
{
	if ($dept == "") {
		return "";
	}

	$dept = trim(strtoupper($dept));

	return $dept === $current ? "active" : "";
} //end function office_items_dept_filter_active_class

/**
 * Font Awesome Kit Setup
 *
 * This will add your Font Awesome Kit to the front-end, the admin back-end,
 * and the login screen area.
 */
if (!function_exists("fa_custom_setup_kit")) {
	function fa_custom_setup_kit($kit_url = "")
	{
		foreach (["wp_enqueue_scripts", "admin_enqueue_scripts", "login_enqueue_scripts"] as $action) {
			add_action($action, function () use ($kit_url) {
				wp_enqueue_script("font-awesome-kit", $kit_url, [], null);
			});
		}
	}
}

fa_custom_setup_kit("https://kit.fontawesome.com/1a1ededcb4.js");

/*add_filter( 'nav_menu_css_class', 'special_nav_class', 10, 2 );

function special_nav_class( $classes, $item ) {
write_log($item);

return $classes;
}*/

function addDataAttr($items, $args)
{
	$dom = new DOMDocument();
	$dom->loadHTML($items);
	$find = $dom->getElementsByTagName("li");

	foreach ($find as $item):
		$item->setAttribute("data-menuanchor", "s1");
	endforeach;

	return $dom->saveHTML();
}

//add_filter('wp_nav_menu_items', 'addDataAttr', 10, 2);

add_filter("wp_nav_menu_objects", "ifchor_menu_class");
function ifchor_menu_class($menu)
{
	$level = 0;
	$stack = ["0"];
	foreach ($menu as $key => $item) {
		while ($item->menu_item_parent != array_pop($stack)) {
			$level--;
		}
		$level++;
		$stack[] = $item->menu_item_parent;
		$stack[] = $item->ID;
		$menu[$key]->classes[] = "level-" . ($level - 1);
	}

	return $menu;
} //end method ifchor_menu_class

/**
 * Returns the permalink for a page based on the incoming slug.
 *
 * @param string $slug The slug of the page to which we're going to link.
 * @return string The permalink of the page
 * @since 1.0
 */
function ifchor_get_permalink_by_slug($slug, $post_type = "")
{
	// Initialize the permalink value
	$permalink = null;

	// Build the arguments for WP_Query
	$args = [
		"name" => $slug,
		"max_num_posts" => 1,
	];

	// If the optional argument is set, add it to the arguments array
	if ("" != $post_type) {
		$args = array_merge($args, ["post_type" => $post_type]);
	}

	// Run the query (and reset it)
	$query = new WP_Query($args);
	if ($query->have_posts()) {
		$query->the_post();
		$permalink = get_permalink(get_the_ID());
		wp_reset_postdata();
	}
	return $permalink;
}
