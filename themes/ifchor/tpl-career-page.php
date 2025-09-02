<?php
/**
 * Template Name: Careers Page
 */
get_header();

$banner_content       = get_field('_career_banner_contents');
$banner_title         = isset($banner_content['title']) ? $banner_content['title'] : '';
// $banner_btn_text      = isset($banner_content['button_text']) ? $banner_content['button_text'] : '';
// $banner_btn_url       = isset($banner_content['button_url']) ? $banner_content['button_url'] : '';
$banner_bg_image      = isset($banner_content['banner_bg_image']) ? $banner_content['banner_bg_image'] : '';
$banner_contact_title = isset($banner_content['email_title']) ? $banner_content['email_title'] : '';
$banner_info_email    = isset($banner_content['email_id']) ? $banner_content['email_id'] : '';

$button_url = isset($banner_content['button_url']) ? $banner_content['button_url'] : [];
$button_url_2 = isset($banner_content['button_url_2']) ? $banner_content['button_url_2'] : [];


$allowed_html = [
    'span' => [
        'class' => []
    ],
    'br'   => [],
];

// Banner Background Image
$banner_bg_image_url = '';
if ($banner_bg_image) {
    $banner_bg_image_url = $banner_bg_image['url'];
}

$bg_image = '';
if ($banner_bg_image_url) {
    $bg_image = 'style="background-image: url('.esc_url($banner_bg_image_url).')"';
}

?>

    <section class="career-banner" <?php echo $bg_image; ?>>
        <div class="container career-banner__content-wrapper">
            <div class="career-banner__content" data-aos="fade-right">
                <div class="banner-bottom-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30.995" height="21.112" viewBox="0 0 30.995 21.112">
                        <g id="Group_6458" data-name="Group 6458" transform="translate(-35.006 0.001) rotate(90)">
                            <g id="Group_6" data-name="Group 6" transform="translate(-0.001 -66)">
                                <g id="Group_5" data-name="Group 5">
                                    <path id="Path_25" data-name="Path 25" d="M0-66,12.881-50.5,0-35.006h8.23L21.111-50.5,8.229-66Z" transform="translate(0.001 66)" fill="#fec10d"/>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>

                <?php if ($banner_title) : ?>
                    <h1 class="career-banner__title"><?php echo wp_kses($banner_title, $allowed_html); ?></h1>
                <?php endif; ?>

                <div class="career-banner__button-wrapper">
                <?php
                    if (is_array($button_url) && sizeof($button_url) > 0) :
                        $button_url_url = isset($button_url['url']) ? $button_url['url'] : '';
                        $button_url_text = isset($button_url['title']) ? $button_url['title'] : esc_html__('Learn more', 'ifchor');
                        $button_url_target = isset($button_url['target']) ? $button_url['target'] : '_self';
                        if ($button_url_url != ''):
                            ?>
                                    <div class="button-container">
                                        <a target="<?php echo esc_attr($button_url_target); ?>" href="<?php echo esc_url($button_url_url); ?>" class="ifchor_btn btn-outline-light">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15.032" height="22.069" viewBox="0 0 15.032 22.069">
                                                <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                                    <g id="Group_5" data-name="Group 5">
                                                        <path id="Path_25" data-name="Path 25" d="M0-66,9.171-54.966,0-43.932h5.86l9.172-11.034L5.859-66Z" transform="translate(0.001 66)" fill="#fff"></path>
                                                    </g>
                                                </g>
                                            </svg><?php echo esc_html($button_url_text); ?>
                                        </a>
                                    </div>
                        <?php
                        endif;
                    endif;
                    ?>

                <?php
                    if (is_array($button_url_2) && sizeof($button_url_2) > 0) :
                        $button_url_2_url = isset($button_url_2['url']) ? $button_url_2['url'] : '';
                        $button_url_2_text = isset($button_url_2['title']) ? $button_url_2['title'] : esc_html__('Learn more', 'ifchor');
                        $button_url_2_target = isset($button_url_2['target']) ? $button_url_2['target'] : '_self';
                        if ($button_url_2_url != ''):
                            ?>
                                    <div class="button-container">
                                        <a target="<?php echo esc_attr($button_url_2_target); ?>" href="<?php echo esc_url($button_url_2_url); ?>" class="ifchor_btn btn-outline-light">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15.032" height="22.069" viewBox="0 0 15.032 22.069">
                                                <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                                    <g id="Group_5" data-name="Group 5">
                                                        <path id="Path_25" data-name="Path 25" d="M0-66,9.171-54.966,0-43.932h5.86l9.172-11.034L5.859-66Z" transform="translate(0.001 66)" fill="#fff"></path>
                                                    </g>
                                                </g>
                                            </svg><?php echo esc_html($button_url_2_text); ?>
                                        </a>
                                    </div>
                        <?php
                        endif;
                    endif;
                    ?>


                </div>
           </div>

            <div class="career-banner__contact-info" data-aos="fade-up">
                <?php if ( ! empty($banner_contact_title)): ?>
                    <h3 class="banner-contact-info__title"><?php echo esc_html($banner_contact_title); ?></h3>
                <?php endif; ?>

                <?php if ( ! empty($banner_info_email)): ?>
                    <a href="mailto:<?php echo esc_attr($banner_info_email); ?>" class="banner-contact-info__email">
                    <span class="email-icon">
                        <svg id="Group_6256" data-name="Group 6256" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" width="20.584" height="14.244"
                             viewBox="0 0 20.584 14.244">
                            <defs>
                                <clipPath id="clip-path">
                                  <rect id="Rectangle_193" data-name="Rectangle 193" width="20.584" height="14.245"
                                        fill="#fff"/>
                                </clipPath>
                            </defs>
                            <g id="Group_6175" data-name="Group 6175" clip-path="url(#clip-path)">
                                <path id="Path_5708" data-name="Path 5708"
                                      d="M11.566,8.635,21.341.267A1.114,1.114,0,0,0,20.629,0H2.5A1.114,1.114,0,0,0,1.79.267Z"
                                      transform="translate(-1.274 0)" fill="#fff"/>
                                <path id="Path_5709" data-name="Path 5709"
                                      d="M56.9,17.082a1.589,1.589,0,0,0,.039-.336V5.495L51.09,10.506Z"
                                      transform="translate(-36.36 -3.911)" fill="#fff"/>
                                <path id="Path_5710" data-name="Path 5710"
                                      d="M15.975,25.862,12.543,28.8,9.111,25.862,3.163,32.6a1.061,1.061,0,0,0,.317.054H21.606a1.064,1.064,0,0,0,.317-.054Z"
                                      transform="translate(-2.251 -18.406)" fill="#fff"/>
                                <path id="Path_5711" data-name="Path 5711"
                                      d="M5.854,10.506,0,5.495V16.746a1.587,1.587,0,0,0,.039.336Z"
                                      transform="translate(0 -3.911)" fill="#fff"/>
                            </g>
                        </svg>

                    </span>
                        <?php echo esc_html($banner_info_email); ?>
                    </a>
                <?php endif; ?>
            </div>

        </div>
        <!-- /.career-banner__content -->
    </section>
    <!-- /.banner -->




<?php
$career_igtp_content                = get_field( '_career_igtp_content' );
$career_igtp_content_title          = isset( $career_igtp_content['title'] ) ? $career_igtp_content['title'] : '';
$career_igtp_content_description    = isset( $career_igtp_content['description'] ) ? $career_igtp_content['description'] : '';

$allowed_html = [
    'br'     => [],
    'em'     => [],
    'strong' => [],
    'a'      => [
        'href'   => [],
        'title'  => [],
        'target' => []
    ]
];

?>

<section class="call-to-action" id="igtp">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-8">
                <div class="call-to-action__content" data-aos="fade-right">
                    <div class="top-arrow-icon">
                        <svg id="Group_6051" data-name="Group 6051" xmlns="http://www.w3.org/2000/svg"
                             width="35.479" height="52.087" viewBox="0 0 35.479 52.087">
                            <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                <g id="Group_5" data-name="Group 5">
                                    <path id="Path_25" data-name="Path 25" d="M0,52.087,21.648,26.044,0,0H13.83L35.479,26.044,13.831,52.087Z" fill="#fff" />
                                </g>
                            </g>
                        </svg>

                    </div>

                    <?php if ( ! empty( $career_igtp_content_title ) ) : ?>
                        <h2 class="call-to-action__title"><?php echo esc_html( $career_igtp_content_title ); ?></h2>
                    <?php endif; ?>

                    <?php if ( ! empty( $career_igtp_content_description ) ) : ?>
                        <?php echo wp_kses_post( $career_igtp_content_description ); ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.call-to-action -->



<?php
$career_contents = get_field('_career_about_contents');

$career_title       = isset($career_contents['title']) ? $career_contents['title'] : '';
$career_description = isset($career_contents['description']) ? $career_contents['description'] : '';
$career_image       = isset($career_contents['career_image']) ? $career_contents['career_image'] : '';

//$career_button_text = isset( $career_contents['button_text'] ) ? $career_contents['button_text'] : '';
$button_url = isset($career_contents['button_url']) ? $career_contents['button_url'] : [];

$allowed_html = [
    'span' => [
        'class' => []
    ],
    'br'   => [],
    'a'    => [
        'href'   => [],
        'class'  => [],
        'target' => []
    ],
    'p'    => [
        'class' => []
    ],
];

?>
    <section class="about about__careers right-image">
        <div class="container height-full d-flex">
            <div class="row align-items-center">
                <div class="col-lg-7 offset-lg-6">
                    <div class="about__content pr-60" data-aos="fade-left">
                        <?php if ($career_title) : ?>
                            <h2 class="about__title"><?php echo esc_html($career_title); ?></h2>
                        <?php endif; ?>

                        <?php if ($career_description) : ?>
                            <div class="about__desc"><?php echo wp_kses($career_description, $allowed_html); ?></div>
                        <?php endif; ?>

                        <?php

                        if (is_array($button_url) && sizeof($button_url) > 0) :
                            $button_url_url = isset($button_url['url']) ? $button_url['url'] : '';
                            $button_url_text = isset($button_url['title']) ? $button_url['title'] : esc_html__('Learn more', 'ifchor');
                            $button_url_target = isset($button_url['target']) ? $button_url['target'] : '_self';

                            if ($button_url_url != ''):

                                ?>
                                <a target="<?php echo esc_attr($button_url_target); ?>" href="<?php echo esc_url($button_url_url); ?>"
                                   class="ifchor-more_btn about__button">
                            <span class="btn-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.403" height="13.805"
                                     viewBox="0 0 9.403 13.805">
                                  <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                    <g id="Group_5" data-name="Group 5">
                                      <path id="Path_25" data-name="Path 25"
                                            d="M0-66l5.737,6.9L0-52.2H3.665L9.4-59.1,3.665-66Z"
                                            transform="translate(0.001 66)" fill="#33367b"></path>
                                    </g>
                                  </g>
                                </svg>
                            </span>
                                    <?php echo esc_html($button_url_text); ?>
                                </a>
                            <?php
                            endif;
                        endif;

                        ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->

        <div class="about__image">
            <img src="<?php echo esc_url($career_image['url']); ?>"
                 alt="<?php esc_attr_e('About Image', 'ifchor'); ?>"/>
        </div>
    </section>
    <!-- /.about-area -->
<?php
$slider_contents = get_field('_slider_contents');
$sliders         = isset($slider_contents['slider_item_contens']) ? $slider_contents['slider_item_contens'] : '';


?>

    <div class="career-slider-section">
        <div class="swiper-container career-slider">
            <div class="swiper-wrapper">

                <?php if ($sliders) : ?>
                    <?php foreach ($sliders as $kay => $slider) :
                        $button_url = isset($slider['button_url']) ? $slider['button_url'] : [];
                        $index = $kay + 1;
                        ?>
                        <div class="swiper-slide slider-item-<?php echo esc_attr($index); ?>">
                            <?php if ( ! empty($slider['slider_image'])) : ?>
                                <img src="<?php echo esc_url($slider['slider_image']['url']); ?>" alt="<?php echo esc_attr__('slider image', 'ifchor'); ?>">
                            <?php endif; ?>

                            <div class="container">
                                <div class="career-slider-content">
                                    <?php if ( ! empty($slider['title'])) : ?>
                                        <h2 class="career-slider-title">
                                            <?php echo esc_html($slider['title']); ?>
                                        </h2>
                                    <?php endif; ?>

                                    <?php

                                    if (is_array($button_url) && sizeof($button_url) > 0) :
                                        $button_url_url = isset($button_url['url']) ? $button_url['url'] : '';
                                        $button_url_text = isset($button_url['title']) ? $button_url['title'] : esc_html__('Learn more', 'ifchor');
                                        $button_url_target = isset($button_url['target']) ? $button_url['target'] : '_self';

                                        if ($button_url_url != ''): ?>
                                            <a target="<?php echo esc_attr($button_url_target); ?>" href="<?php echo esc_url($button_url_url); ?>"
                                               class="career-slider-btn ifchor_btn btn-outline-light">
                                                <svg id="Group_6485" data-name="Group 6485" xmlns="http://www.w3.org/2000/svg" width="15.033" height="22.068" viewBox="0 0 15.033 22.068">
                                                    <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                                        <g id="Group_5" data-name="Group 5">
                                                            <path id="Path_25" data-name="Path 25" d="M0-66,9.171-54.966,0-43.932h5.86l9.172-11.034L5.859-66Z" transform="translate(0.001 66)" fill="#fec10d"/>
                                                        </g>
                                                    </g>
                                                </svg>

                                                <?php echo esc_html($button_url_text); ?>
                                            </a>
                                        <?php
                                        endif;
                                    endif; ?>
                                </div>
                            </div>

                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <!-- /.swiper-wrapper -->

            <div class="container">
                <div class="career-slider-control">
                    <div class="car-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="33.996" viewBox="0 0 34 33.996">
                            <path id="Subtraction_8" data-name="Subtraction 8" d="M17,0A16.993,16.993,0,0,0,4.98,29.017,17,17,0,1,0,23.618,1.336,16.9,16.9,0,0,0,17,0ZM12.165,25.689h0L19.393,17l-7.228-8.69h4.616L24,17l-7.224,8.691Z" transform="translate(34 33.996) rotate(180)" fill="#fec10d"/>
                        </svg>
                    </div>
                    <div class="career-pagination"></div>
                    <div class="car-next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="33.439" viewBox="0 0 34 33.439">
                            <path id="Subtraction_7" data-name="Subtraction 7"
                                  d="M-16655,16518.439a17.137,17.137,0,0,1-6.617-1.312,17,17,0,0,1-5.406-3.584,16.6,16.6,0,0,1-3.641-5.314,16.322,16.322,0,0,1-1.338-6.508,16.322,16.322,0,0,1,1.338-6.508,16.625,16.625,0,0,1,3.641-5.314,16.94,16.94,0,0,1,5.406-3.582A17.1,17.1,0,0,1-16655,16485a17.111,17.111,0,0,1,6.617,1.316,16.934,16.934,0,0,1,5.4,3.582,16.711,16.711,0,0,1,3.645,5.314,16.393,16.393,0,0,1,1.334,6.508,16.393,16.393,0,0,1-1.334,6.508,16.69,16.69,0,0,1-3.645,5.314,16.983,16.983,0,0,1-5.4,3.584A17.151,17.151,0,0,1-16655,16518.439Zm-4.836-25.268h0l7.227,8.549-7.227,8.549h4.613l7.227-8.549-7.227-8.549Z"
                                  transform="translate(16672 -16485)" fill="#fec10d"/>
                        </svg>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

$commi_content = get_field('_committed_contents');
$heading       = isset($commi_content['section_title']) ? $commi_content['section_title'] : '';
$subtitle      = isset($commi_content['subtitle']) ? $commi_content['subtitle'] : '';
$commi_items   = isset($commi_content['box_items']) ? $commi_content['box_items'] : '';
?>
    <section class="committed-section">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 committed-item" data-aos="fade-up">
                    <?php if ( ! empty($heading) || ! empty($subtitle)) : ?>
                        <div class="committed-section__content">
                            <?php if ( ! empty($subtitle)) : ?>
                                <h3 class="committed-section__subtitle"><?php echo esc_html($subtitle); ?></h3>
                            <?php endif; ?>

                            <?php if ( ! empty($heading)) : ?>
                                <h2 class="committed-section__title"><?php echo esc_html($heading); ?></h2>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if ($commi_items) :
                    foreach ($commi_items as $item) : ?>
                        <div class="col-lg-4 col-md-6 committed-item" data-aos="fade-up">
                            <div class="committed-item__content">
                                <?php if ( ! empty($item['icon_image']['url'])) : ?>
                                    <div class="committed-item__icon">
                                        <img src="<?php echo esc_url($item['icon_image']['url']); ?>"
                                             alt="<?php esc_attr_e('Service Icon', 'ifchor'); ?>"/>
                                    </div>
                                <?php endif; ?>

                                <?php if ($item['title']) : ?>
                                    <h4 class="committed-item__title"><?php echo $item['title']; ?></h4>
                                <?php endif; ?>
                                <?php if ($item['title']) : ?>
                                    <p class="committed-item__description"><?php echo $item['description']; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- /.committed-section -->
<?php

$job_sec_content  = get_field('_job_contents');
$job_sec_title    = isset($job_sec_content['career_section_title']) ? $job_sec_content['career_section_title'] : '';
$job_sec_subtitle = isset($job_sec_content['section_subtitle']) ? $job_sec_content['section_subtitle'] : '';

$job_args = [
    'post_type'      => 'ifchor-job',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'order'          => 'DESC',
];

$job_query = new WP_Query($job_args);

?>

    <section id="careers-link" class="career-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="career-section__content text-center" data-aos="fade-in">
                        <?php if ( ! empty($job_sec_subtitle)) : ?>
                            <h3 class="career-section__subtitle"><?php echo esc_html($job_sec_subtitle); ?></h3>
                        <?php endif; ?>

                        <?php if ( ! empty($job_sec_title)) : ?>
                            <h2 class="career-section__title"><?php echo esc_html($job_sec_title); ?></h2>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="row g-5 justify-content-center">
                <?php
                if ($job_query->have_posts()) :
                    while ($job_query->have_posts()) :
                        $job_query->the_post();
                        $job_title       = get_the_title();
                        $job_description = get_the_content();
                        $job_content     = get_field('_job-contnets', get_the_ID());
                        $job_location    = isset($job_content['location']) ? $job_content['location'] : '';
                        $job_subtitle    = isset($job_content['subtitle']) ? $job_content['subtitle'] : '';
                        $job_apply_link  = isset($job_content['linkedin_url']) ? $job_content['linkedin_url'] : '';
                        $job_apply_email = isset($job_content['email_id']) ? $job_content['email_id'] : '';
                        $job_department  = isset($job_content['department']) ? $job_content['department'] : '';


                        ?>
                        <div class="col-xl-4 col-lg-6 col-md-6 display-grid" data-aos="fade-up">
                            <div class="job-item">

                                <?php if ( ! empty($job_department['url'])) : ?>
                                    <div class="job-item__department-logo text-end">
                                        <img src="<?php echo esc_url($job_department['url']); ?>" alt="<?php echo esc_attr__('Department Logo', 'ifchor'); ?>"/>
                                    </div>
                                <?php endif; ?>


                                <div class="job-item__content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23.467" height="15.984"
                                         viewBox="0 0 23.467 15.984">
                                        <g id="Group_6540" data-name="Group 6540"
                                           transform="translate(-42.533 0.001) rotate(90)">
                                            <g id="Group_6" data-name="Group 6" transform="translate(-0.001 -66)">
                                                <g id="Group_5" data-name="Group 5">
                                                    <path id="Path_25" data-name="Path 25"
                                                          d="M0-66,9.752-54.267,0-42.533H6.23l9.753-11.734L6.23-66Z"
                                                          transform="translate(0.001 66)" fill="#fec10d"/>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>

                                    <?php if ($job_title) : ?>
                                        <h4 class="job-item__title"><?php echo esc_html($job_title); ?></h4>
                                    <?php endif; ?>

                                    <?php if ($job_location) : ?>
                                        <h6 class="job-item__location"><?php echo esc_html($job_location); ?></h6>
                                    <?php endif; ?>


                                    <?php if ($job_description) : ?>
                                        <div class="job-item__desc"><?php echo $job_description; ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="job-item__footer">
                                    <?php if ($job_subtitle) : ?>
                                        <h4 class="job-item__subtitle"><?php echo esc_html($job_subtitle); ?></h4>
                                    <?php endif; ?>

                                    <div class="d-flex align-items-center flex-wrap">
                                        <?php if ($job_apply_link) : ?>
                                            <a href="<?php echo esc_url($job_apply_link['url']); ?>" class="job-item__apply-btn" target="_blank">
                                               <span class="info-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21.123" height="21.084" viewBox="0 0 21.123 21.084">
                                                        <g id="Group_6525" data-name="Group 6525" transform="translate(-379.203 -4689.605)">
                                                        <path id="Path_27" data-name="Path 27" d="M24.294,30.995h4.378V45.078H24.294Zm2.189-7a2.538,2.538,0,1,1-2.537,2.54,2.54,2.54,0,0,1,2.537-2.54"
                                                              transform="translate(355.256 4665.611)" fill="#33367b"/>
                                                        <path id="Path_28" data-name="Path 28" d="M42.608,40.961h4.2v1.927h.06a4.6,4.6,0,0,1,4.141-2.275c4.433,0,5.251,2.916,5.251,6.707v7.724H51.884V48.2c0-1.633-.028-3.735-2.275-3.735-2.277,0-2.625,1.781-2.625,3.618v6.966H42.608Z"
                                                              transform="translate(344.066 4655.645)" fill="#33367b"/>
                                                    </g>
                                                </svg>
                                               </span>

                                                <?php echo esc_html($job_apply_link['title']); ?>
                                            </a>
                                        <?php endif; ?>

                                        <?php if ($job_apply_email) : ?>
                                            <a href="mailto:<?php echo esc_attr($job_apply_email); ?>"
                                               class="job-item__apply-btn">
                                       <span class="info-icon">
                                           <svg id="Group_6256" data-name="Group 6256"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="20.584"
                                                height="14.244" viewBox="0 0 20.584 14.244">
                                                <defs>
                                                    <clipPath id="clip-path">
                                                        <rect id="Rectangle_193" data-name="Rectangle 193"
                                                              width="20.584" height="14.245" fill="#33367b"/>
                                                    </clipPath>
                                                </defs>
                                               <g id="Group_6175" data-name="Group 6175" clip-path="url(#clip-path)">
                                                   <path id="Path_5708" data-name="Path 5708"
                                                         d="M11.566,8.635,21.341.267A1.114,1.114,0,0,0,20.629,0H2.5A1.114,1.114,0,0,0,1.79.267Z"
                                                         transform="translate(-1.274 0)" fill="#33367b"/>
                                                   <path id="Path_5709" data-name="Path 5709"
                                                         d="M56.9,17.082a1.589,1.589,0,0,0,.039-.336V5.495L51.09,10.506Z"
                                                         transform="translate(-36.36 -3.911)" fill="#33367b"/>
                                                   <path id="Path_5710" data-name="Path 5710"
                                                         d="M15.975,25.862,12.543,28.8,9.111,25.862,3.163,32.6a1.061,1.061,0,0,0,.317.054H21.606a1.064,1.064,0,0,0,.317-.054Z"
                                                         transform="translate(-2.251 -18.406)" fill="#33367b"/>
                                                   <path id="Path_5711" data-name="Path 5711"
                                                         d="M5.854,10.506,0,5.495V16.746a1.587,1.587,0,0,0,.039.336Z"
                                                         transform="translate(0 -3.911)" fill="#33367b"/>
                                                </g>
                                           </svg>
                                       </span>

                                                <?php echo esc_html($job_apply_email); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>

            </div>
        </div>
    </section>
    <!-- /.career-section -->
<?php
get_footer();