<?php
/**
 * Template Name: History Page
 */
get_header();

$history_lists = get_field("_history_contents");
$list_items = isset($history_lists["history_lists"]) ? $history_lists["history_lists"] : "";
$histories = isset($history_lists["histories"]) ? $history_lists["histories"] : "";
$histories_description = isset($history_lists["bottom_description"]) ? $history_lists["bottom_description"] : "";

$allowed_html = [
	"p" => [],
	"br" => [],
	"strong" => [],
	"em" => [],
	"a" => [
		"href" => [],
		"title" => [],
		"target" => [],
	],
];
?>

<?php
// Get the main group
$history = get_field("history_contents");

if ($history): ?>
<section class="history-section">
  <div class="container">
    <div class="timeline-wrapper">
      <div class="timeline-scroll-container">
        <div class="pin-target">
          <div class="row history-items">
            <div class="col-xl-6 history-item-wrapper">

              <div class="history-item">
                <?php if (!empty($history["galbraiths_logo"])): ?>
                <div class="history-item__image">
                  <img src="<?php echo esc_url($history["galbraiths_logo"]["url"]); ?>" alt="<?php echo esc_attr($history["galbraiths_logo"]["alt"]); ?>" />
                </div>
                <?php endif; ?>
              </div>

            </div>
            <div class="col-xl-6 history-item-wrapper">

              <div class="history-item">
                <?php if (!empty($history["ifchor_logo"])): ?>
                <div class="history-item__image">
                  <img src="<?php echo esc_url($history["ifchor_logo"]["url"]); ?>" alt="<?php echo esc_attr($history["ifchor_logo"]["alt"]); ?>" />
                </div>
                <?php endif; ?>
              </div>

            </div>
          </div>
        </div>

        <div class="timeline" id="timeline">
          <div class="timeline-scroll-wrapper">
            <!-- LEFT COLUMN -->
            <div class="timeline-col-wrapper left">
              <div class="timeline-left-pin">
                <div class="timeline-column left">

                  <?php $timeline = $history["galbraiths_timeline"] ?? null; ?>
                  <?php if (is_array($timeline)): ?>
                  <div class="timeline-item-wrapper" data-year="<?php echo esc_attr($timeline["1845_date"] ?? ""); ?>">
                    <div class="timeline-item" data-year="<?php echo esc_attr($timeline["1845_date"] ?? ""); ?>">
                      <div class="circle"><?php echo esc_html($timeline["1845_date"] ?? ""); ?></div>
                      <div class="text-container">
                        <p><?php echo esc_html($timeline["1845_text"] ?? ""); ?></p>
                      </div>
                    </div>
                  </div>
                  <?php endif; ?>
                  <?php if (is_array($timeline)): ?>
                  <div class="timeline-item" data-year="<?php echo esc_attr($timeline["1869_date"] ?? ""); ?>">
                    <div class="circle"><?php echo esc_html($timeline["1869_date"] ?? ""); ?></div>
                    <div class="text-container">
                      <p><?php echo esc_html($timeline["1869_text"] ?? ""); ?></p>
                    </div>
                  </div>
                  <?php endif; ?>
                  <?php if (is_array($timeline)): ?>
                  <div class="timeline-item" data-year="<?php echo esc_attr($timeline["1968_date"] ?? ""); ?>">
                    <div class="circle"><?php echo esc_html($timeline["1968_date"] ?? ""); ?></div>
                    <div class="text-container">
                      <p><?php echo esc_html($timeline["1968_text"] ?? ""); ?></p>
                    </div>
                  </div>
                  <?php endif; ?>
                  <?php if (is_array($timeline)): ?>
                  <div class="timeline-item" data-year="<?php echo esc_attr($timeline["1970_date"] ?? ""); ?>">
                    <div class="circle"><?php echo esc_html($timeline["1970_date"] ?? ""); ?></div>
                    <div class="text-container">
                      <p><?php echo esc_html($timeline["1970_text"] ?? ""); ?></p>
                    </div>
                  </div>
                  <?php endif; ?>
                  <?php if (is_array($timeline)): ?>
                  <div class="timeline-item" data-year="<?php echo esc_attr($timeline["1980s_date"] ?? ""); ?>">
                    <div class="circle"><?php echo esc_html($timeline["1980s_date"] ?? ""); ?></div>
                    <div class="text-container">
                      <p><?php echo esc_html($timeline["1980s_text"] ?? ""); ?></p>
                    </div>
                  </div>
                  <?php endif; ?>
                </div> <!-- /.timeline-column.left -->
              </div> <!-- /.timeline-left-pin -->
              <div class="timeline-connector left"></div> <!-- NEW LINE -->

            </div> <!-- /.timeline-col-wrapper.left -->

            <!-- RIGHT COLUMN -->
            <div class="timeline-col-wrapper right">
              <div class="timeline-right-pin">
                <div class="timeline-column right">
                  <div class="timeline-item-wrapper" data-year="1970">
                    <div class="timeline-item" data-year="1970">
                      <div class="circle">1977</div>
                      <div class="text-container">
                        <p>The company was founded in Lausanne, Switzerland...</p>
                      </div>
                    </div>
                  </div>

                  <div class="timeline-item-wrapper" data-year="1980s">
                    <div class="timeline-item" data-year="1980s">
                      <div class="circle">1980s</div>
                      <div class="text-container">
                        <p>Various partners joined Mr. Ravano...</p>
                      </div>
                    </div>
                  </div>

                  <div class="timeline-item" data-year="1990s">
                    <div class="circle">1990s</div>
                    <div class="text-container">
                      <p>The company diversified into FFAs and Capesize brokerage.</p>
                    </div>
                  </div>

                  <div class="timeline-item" data-year="2010s">
                    <div class="circle">2010s</div>
                    <div class="text-container">
                      <p>IFCHOR started Research & Advisory services...</p>
                    </div>
                  </div>

                  <div class="timeline-item" data-year="2020s">
                    <div class="circle">2020s</div>
                    <div class="text-container">
                      <p>IFCHOR further expanded its offices worldwide...</p>
                    </div>
                  </div>
                  <div class="timeline-connector right"></div> <!-- NEW LINE -->

                </div> <!-- /.timeline-column.right -->
              </div> <!-- /.timeline-col-wrapper.right -->
            </div>

          </div> <!-- /.timeline-scroll-container -->
          <div class="timeline-spacer"></div>
          <div class="timeline-end">
            <div class="timeline-item">
              <div class="circle">2022</div>
              <div class="final-line"></div>

            </div>

            <div class="merger">
              <?php if (!empty($history["ig_logo"])): ?>
              <div class="history-logo">
                <img src="<?php echo esc_url($history["ig_logo"]["url"]); ?>" alt="<?php echo esc_attr($history["ig_logo"]["alt"]); ?>" />
              </div>
              <?php endif; ?>
              <?php if (!empty($history["bottom_description"])): ?>
              <div class="description__content">
                <?php echo wp_kses_post($history["bottom_description"]); ?>
              </div>
              <?php endif; ?>

            </div>
          </div>
        </div> <!-- /.timeline -->

      </div> <!-- /.timeline-wrapper -->
    </div>
</section>
<!-- /.history-section -->
<?php endif;
?>

<?php
$blog_content = get_field("_history-blog-contents");
$blog_title = isset($blog_content["title"]) ? $blog_content["title"] : "";
$blog_subtitle = isset($blog_content["subtitle"]) ? $blog_content["subtitle"] : "";
$blog_categories = isset($blog_content["categories"]) ? $blog_content["categories"] : "";
$blog_button_text = isset($blog_content["button_text"]) ? $blog_content["button_text"] : "";
$blog_button_url = isset($blog_content["button_url"]) ? $blog_content["button_url"] : "";
$blog_post_per_page = isset($blog_content["post_per_page"]) ? $blog_content["post_per_page"] : 3;
$blog_post_per_column = isset($blog_content["post_per_column"]) ? $blog_content["post_per_column"] : 4;
?>
<section class="blog-area">
  <div class="container">
    <?php if (!empty($blog_title) || !empty($blog_subtitle)): ?>
    <div class="section-heading text-center">
      <?php if ($blog_subtitle): ?>
      <h5 class="section-subtitle"><?php echo esc_html($blog_subtitle); ?></h5>
      <?php endif; ?>
      <?php if ($blog_title): ?>
      <h2 class="section-title"><?php echo esc_html($blog_title); ?></h2>
      <?php endif; ?>
    </div>
    <?php endif; ?>

    <div class="post-grid row g-5 justify-content-center">
      <?php
      $args = [
      	"post_type" => "post",
      	"post_status" => "publish",
      ];
      if ($blog_post_per_page) {
      	$args["posts_per_page"] = $blog_post_per_page;
      } // Category
      if (!empty($blog_categories)) {
      	$args["tax_query"] = [
      		[
      			"taxonomy" => "category",
      			"field" => "term_id",
      			"terms" => $blog_categories,
      		],
      	];
      }
      $query = new WP_Query($args);
      if ($query->have_posts()):
      	while ($query->have_posts()):
      		$query->the_post(); ?>
      <div class="col-lg-<?php echo esc_attr($blog_post_per_column); ?> col-md-6 col-sm-6">
        <?php get_template_part("template-parts/content"); ?>
      </div>
      <?php
      	endwhile;
      	wp_reset_postdata();
      endif;
      ?>
    </div>

  </div>

  <?php if (!empty($blog_button_url)): ?>
  <div class="button-container text-center mt-40">
    <a href="<?php echo esc_url($blog_button_url); ?>" class="ifchor_btn">
      <svg xmlns="http://www.w3.org/2000/svg" width="15.032" height="22.069" viewBox="0 0 15.032 22.069">
        <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
          <g id="Group_5" data-name="Group 5">
            <path id="Path_25" data-name="Path 25" d="M0-66,9.171-54.966,0-43.932h5.86l9.172-11.034L5.859-66Z" transform="translate(0.001 66)" fill="#fff"></path>
          </g>
        </g>
      </svg><?php echo esc_html($blog_button_text); ?>
    </a>
  </div>
  <?php endif; ?>
  <!-- /.button-container -->
  </div>
  <!-- /.container -->
</section>
<!-- /.blog-area -->

<?php get_footer();
