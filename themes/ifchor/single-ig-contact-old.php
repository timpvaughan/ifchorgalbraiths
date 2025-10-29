<?php
get_header();

$offices = get_option("ifchor_offices", []);
$departments = get_option("ifchor_departments", []);

$contacts_content_flags_url = content_url("/uploads/contacts/flags/");
$contacts_content_photos_url = content_url("/uploads/contacts/photos/");
$contacts_content_dept_url = content_url("/uploads/contacts/departments/");
$contacts_content_flags_dir = trailingslashit(WP_CONTENT_DIR) . "uploads/contacts/flags/";
$contacts_content_photos_dir = trailingslashit(WP_CONTENT_DIR) . "uploads/contacts/photos/";
$contacts_content_dept_dir = trailingslashit(WP_CONTENT_DIR) . "uploads/contacts/departments/";
?>

<div id="main-content-wrapper" class="blog-details">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="contact-items">

          <?php if (have_posts()):
          	the_post(); ?>

          <?php
          $title = get_the_title();
          $post_id = get_the_ID();
          $city = get_post_meta($post_id, "_contact_city", true);
          $department = get_post_meta($post_id, "_contact_department", true);
          $others = get_post_meta($post_id, "_contact_others", true);

          $country = $others["_contact_country"] ?? "";
          $email = $others["_contact_email"] ?? "";
          $telephone = $others["_contact_telephone_number"] ?? "";
          $id = intval($others["_contact_id"] ?? 0);
          $show_dept = intval($others["_show_dept"] ?? 1);

          $department_info = $departments[$department . "---" . $city] ?? [];
          $department_telephone = $department_info["telephone_number"] ?? "";
          $department_email = $department_info["email"] ?? "";

          $office_info = $offices[$city] ?? [];
          $office_country = $office_info["country"] ?? "";
          $office_address = $office_info["address"] ?? "";
          $office_telephone_number = $office_info["telephone_number"] ?? "";

          $office_flag = "";
          if ($office_country !== "") {
          	$office_country_sm = str_replace("-", "_", sanitize_title($office_country));
          	if (file_exists($contacts_content_flags_dir . $office_country_sm . ".png")) {
          		$office_flag = $contacts_content_flags_url . $office_country_sm . ".png";
          	}
          }

          $photo_url = "";
          $qr_url = "";
          if ($id > 0) {
          	$department_alt = sanitize_title($department);
          	$photo_url = $contacts_content_dept_url . "IG-" . $department_alt . ".svg";

          	if (file_exists($contacts_content_photos_dir . "qr_" . $id . ".svg")) {
          		$qr_url = $contacts_content_photos_url . "qr_" . $id . ".svg";
          	}
          }
          ?>

          <div class="contact-item" data-aos="fade-up">
            <div class="contact-image">
              <?php if ($photo_url): ?>
              <div class="contact-main-image">
                <img src="<?php echo esc_url($photo_url); ?>" title="<?php echo esc_attr($title); ?>" alt="<?php echo esc_attr($title); ?>" />
              </div>
              <?php endif; ?>
              <?php if ($qr_url): ?>
              <div class="contact-qrcode">
                <img src="<?php echo esc_url($qr_url); ?>" alt="<?php echo esc_attr($title); ?>" />
              </div>
              <?php endif; ?>
            </div>

            <div class="contact-info-wrapper">
              <div class="contact-info__left">
                <h3 class="contact-info__name"><?php echo esc_html($title); ?></h3>

                <?php if ($email): ?>
                <p class="contact-info__email"><span class="text-bold">E</span> <?php echo esc_html($email); ?></p>
                <?php endif; ?>

                <?php if ($show_dept && $department): ?>
                <div class="contact-info">
                  <p><?php echo esc_html($department); ?></p>

                  <?php if ($department_telephone): ?>
                  <p class="contact-info__phone"><span class="text-bold">T</span> <?php echo esc_html($department_telephone); ?></p>
                  <?php endif; ?>

                  <?php if ($department_email): ?>
                  <p class="contact-info__email"><span class="text-bold">E</span> <?php echo esc_html($department_email); ?></p>
                  <?php endif; ?>
                </div>
                <?php endif; ?>
              </div>

              <div class="contact-info__right">
                <?php if ($office_flag): ?>
                <div class="contact-info__flag">
                  <img src="<?php echo esc_url($office_flag); ?>" alt="<?php echo esc_attr($title); ?>" width="34" height="34" />
                </div>
                <?php endif; ?>

                <?php if ($city): ?>
                <h4 class="contact-info_title"><?php echo esc_html($city); ?></h4>
                <?php endif; ?>

                <?php if ($office_address): ?>
                <p class="contact-info__location"><?php echo esc_html($office_address); ?></p>
                <?php endif; ?>

                <?php if ($office_telephone_number): ?>
                <p class="contact-info__phone"><span class="text-bold">T</span> <?php echo esc_html($office_telephone_number); ?></p>
                <?php endif; ?>
              </div>
            </div>
          </div>

          <?php
          else:
          	 ?>
          <p class="text-center"><?php esc_html_e("Sorry, contact not found.", "ifchor"); ?></p>
          <?php
          endif; ?>

        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
