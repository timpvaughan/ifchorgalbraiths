<?php
/**
 * Template Name: Beyond Freight
 */
get_header();

$banner_content  = get_field('_ig_beyond_banner_contents');
$banner_title    = isset($banner_content['banner_title']) ? $banner_content['banner_title'] : '';
$banner_logo     = isset($banner_content['banner_logo']) ? $banner_content['banner_logo'] : '';
$banner_bg_image = isset($banner_content['banner_bg_image']) ? $banner_content['banner_bg_image'] : '';

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

    <section class="ig-banner" <?php echo $bg_image; ?>>
        <div class="container ig-banner__content-wrapper">
            <div class="ig-banner__content" data-aos="fade-in">
                <div class="ig-banner__logo">
                    <?php if ($banner_logo) : ?>
                        <img src="<?php echo esc_url($banner_logo['url']); ?>" alt="<?php echo esc_attr($banner_logo['alt']); ?>">
                    <?php endif; ?>
                </div>

                <?php if ($banner_title) : ?>
                    <h1 class="ig-banner__title"><?php echo wp_kses($banner_title, $allowed_html); ?></h1>
                <?php endif; ?>

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

            </div>
            <!-- /.ig-banner__content -->
        </div>
        <!-- /.ig-banner__content -->
    </section>
    <!-- /.banner -->


<?php
$info_contents         = get_field('_info_contents');
$info_description      = isset($info_contents['description']) ? $info_contents['description'] : '';
$info_description      = isset($info_contents['description']) ? $info_contents['description'] : '';
$info_lead_description = isset($info_contents['lead_description']) ? $info_contents['lead_description'] : '';


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
    <section class="info-description">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="info-description__content info-description__content--two" data-aos="fade-right">

                        <?php if ( ! empty($info_lead_description)): ?>
                            <p class="info-description__lead"><?php echo wp_kses($info_lead_description, $allowed_html); ?></p>
                        <?php endif; ?>

                        <?php if ( ! empty($info_description)): ?>
                            <?php echo wp_kses($info_description, $allowed_html); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->
    </section>
    <!-- /.about-area -->
<?php
$about_content = get_field('_ig_solutions_contents');
$about_title   = isset($about_content['title']) ? $about_content['title'] : '';
$about_image   = isset($about_content['image']) ? $about_content['image'] : '';

//$about_btn_text            = isset( $about_content['button_text'] ) ? $about_content['button_text'] : '';
//$about_btn_type            = isset( $about_content['button_url_type'] ) ? $about_content['button_url_type'] : '';
//$about_btn_link            = isset( $about_content['button_url'] ) ? $about_content['button_url'] : '';
//$about_btn_link_ext        = isset( $about_content['button_url_ext'] ) ? $about_content['button_url_ext'] : '';

$about_image_overlay_title = isset($about_content['image_overlay_title']) ? $about_content['image_overlay_title'] : '';

$about_btn = isset($about_content['button_url']) ? $about_content['button_url'] : [];

?>

    <section class="about ig-about">
        <div class="container height-full d-flex">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="about__content" data-aos="fade-right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30.995" height="21.112" viewBox="0 0 30.995 21.112">
                            <g id="Group_6474" data-name="Group 6474" transform="translate(-35.006 0.001) rotate(90)">
                                <g id="Group_6" data-name="Group 6" transform="translate(-0.001 -66)">
                                    <g id="Group_5" data-name="Group 5">
                                        <path id="Path_25" data-name="Path 25" d="M0-66,12.881-50.5,0-35.006h8.23L21.111-50.5,8.229-66Z" transform="translate(0.001 66)" fill="#fec10d"/>
                                    </g>
                                </g>
                            </g>
                        </svg>

                        <?php if ($about_title) : ?>
                            <h2 class="about__title"><?php echo esc_html($about_title); ?></h2>
                        <?php endif; ?>

                        <?php

                        if (is_array($about_btn) && sizeof($about_btn) > 0) :
                            $about_btn_url = isset($about_btn['url']) ? $about_btn['url'] : '';
                            $about_btn_text = isset($about_btn['title']) ? $about_btn['title'] : esc_html__('Learn more', 'ifchor');
                            $about_btn_target = isset($about_btn['target']) ? $about_btn['target'] : '_self';
                            if ($about_btn_url != ''):
                                ?>
                                <a target="<?php echo esc_attr($about_btn_target); ?>" href="<?php echo esc_url($about_btn_url); ?>" class="ifchor_btn btn-outline about__button">
                            <span class="btn-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.403" height="13.805" viewBox="0 0 9.403 13.805">
                                  <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                    <g id="Group_5" data-name="Group 5">
                                      <path id="Path_25" data-name="Path 25" d="M0-66l5.737,6.9L0-52.2H3.665L9.4-59.1,3.665-66Z" transform="translate(0.001 66)" fill="#33367b"/>
                                    </g>
                                  </g>
                                </svg>
                            </span><?php echo esc_html($about_btn_text); ?>
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
            <img src="<?php echo esc_url($about_image['url']); ?>" alt="<?php echo esc_attr__('About Image', 'ifchor'); ?>"/>

            <?php if ($about_image_overlay_title) : ?>
                <div class="about__image-overlay">
                    <h3 class="about__image-title"><?php echo esc_html($about_image_overlay_title); ?></h3>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- /.about-area -->


<?php
$contact_content     = get_field('_ig_contact_contents');
$contact_title       = isset($contact_content['title']) ? $contact_content['title'] : '';
$contact_subtitle    = isset($contact_content['subtitle']) ? $contact_content['subtitle'] : '';
$contact_button_text = isset($contact_content['button_text']) ? $contact_content['button_text'] : '';
$contact_button_type = isset($contact_content['button_url_type']) ? $contact_content['button_url'] : '';
$contact_button_url  = isset($contact_content['button_url']) ? $contact_content['button_url'] : '';
$contact_button_ext  = isset($contact_content['button_url_ext']) ? $contact_content['button_url_ext'] : '';
$contact_bg_image    = isset($contact_content['background_image']) ? $contact_content['background_image'] : [];

$contact_bg_image_url = isset($contact_bg_image['url']) ? $contact_bg_image['url'] : '';

$ig_contact_bg_image = '';

if ($contact_bg_image_url != '') {
    $ig_contact_bg_image = 'style="background-image: url('.esc_url($contact_bg_image_url).')"';
}

$contact_btn_link = '';

if ($contact_button_type == 'internal') {
    $contact_btn_link = $contact_button_url;
} else {
    $contact_btn_link = $contact_button_ext['url'];
}


?>

    <section class="contact-section" <?php echo $ig_contact_bg_image ?>>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="contact-section__content" data-aos="fade-right">
                        <h5 class="section-subtitle"><?php echo esc_html($contact_subtitle); ?></h5>
                        <h2 class="section-title"><?php echo esc_html($contact_title); ?></h2>
                        <?php if ( ! empty($contact_button_text)): ?>
                            <a href="<?php echo esc_url($contact_btn_link); ?>" class="ifchor_btn btn-outline-light">
                                <svg id="Group_6465" data-name="Group 6465" xmlns="http://www.w3.org/2000/svg" width="15.032" height="22.069" viewBox="0 0 15.032 22.069">
                                    <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                        <g id="Group_5" data-name="Group 5">
                                            <path id="Path_25" data-name="Path 25" d="M0-66,9.171-54.966,0-43.932h5.86l9.172-11.034L5.859-66Z" transform="translate(0.001 66)" fill="#fec10d"/>
                                        </g>
                                    </g>
                                </svg>
                                <?php echo esc_html($contact_button_text); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.contact-section -->


<?php
$page_pagination       = get_field('_page_pagination_contents');
$page_pagination_title = isset($page_pagination['title']) ? $page_pagination['title'] : '';
$page_link_left_title  = isset($page_pagination['page_link_left_title']) ? $page_pagination['page_link_left_title'] : '';
$page_link_left_url    = isset($page_pagination['page_link_left_url']) ? $page_pagination['page_link_left_url'] : '';
$page_link_right_title = isset($page_pagination['page_link_right_title']) ? $page_pagination['page_link_right_title'] : '';
$page_link_right_url   = isset($page_pagination['page_link_right_url']) ? $page_pagination['page_link_right_url'] : '';

?>

    <section class="page-pagination-area" data-aos="fade-up">
        <div class="container">
            <div class="page-pagination-wrapper">
                <div class="page-pagination-title-wrapper">
                    <h3 class="page-pagination-title"><?php echo esc_html($page_pagination_title); ?></h3>
                </div>

                <div class="page-pagination-btns">
                    <a href="<?php echo esc_url($page_link_left_url); ?>" class="pagination-page-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21.112" height="30.995" viewBox="0 0 21.112 30.995">
                            <g id="Group_6463" data-name="Group 6463" transform="translate(21.111 -35.006) rotate(180)">
                                <g id="Group_6" data-name="Group 6" transform="translate(-0.001 -66)">
                                    <g id="Group_5" data-name="Group 5">
                                        <path id="Path_25" data-name="Path 25" d="M0-66,12.881-50.5,0-35.006h8.23L21.111-50.5,8.229-66Z" transform="translate(0.001 66)" fill="#fec10d"/>
                                    </g>
                                </g>
                            </g>
                        </svg>

                        <?php echo esc_html($page_link_left_title); ?>
                    </a>
                    <a href="<?php echo esc_url($page_link_right_url); ?>" class="pagination-page-link">
                        <?php echo esc_html($page_link_right_title); ?>
                        <svg id="Group_6465" data-name="Group 6465" xmlns="http://www.w3.org/2000/svg" width="15.032" height="22.069" viewBox="0 0 15.032 22.069">
                            <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                <g id="Group_5" data-name="Group 5">
                                    <path id="Path_25" data-name="Path 25" d="M0-66,9.171-54.966,0-43.932h5.86l9.172-11.034L5.859-66Z" transform="translate(0.001 66)" fill="#fec10d"/>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- /.page-pagination-area -->


<?php
$blog_content    = get_field('_ig_blog_contents');
$blog_title      = isset($blog_content['title']) ? $blog_content['title'] : '';
$blog_subtitle   = isset($blog_content['subtitle']) ? $blog_content['subtitle'] : '';
$blog_categories = isset($blog_content['categories']) ? $blog_content['categories'] : '';

$blog_post_per_page   = isset($blog_content['post_per_page']) ? $blog_content['post_per_page'] : '3';
$blog_post_per_column = isset($blog_content['post_per_column']) ? $blog_content['post_per_column'] : '3';

//$blog_button_text     = isset( $blog_content['button_text'] ) ? $blog_content['button_text'] : '';
$blog_button = isset($blog_content['button_url']) ? $blog_content['button_url'] : [];

/*echo '<pre>';
print_r($blog_button);
echo '</pre>';*/


?>
    <section class="blog-area" data-aos="fade-up" data-aos-delay="500">
        <div class="container">
            <?php if ( ! empty($blog_title) || ! empty($blog_subtitle)) : ?>
                <div class="section-heading text-center">
                    <?php if ($blog_subtitle) : ?>
                        <h5 class="section-subtitle"><?php echo esc_html($blog_subtitle); ?></h5>
                    <?php endif; ?>
                    <?php if ($blog_title) : ?>
                        <h2 class="section-title"><?php echo esc_html($blog_title); ?></h2>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="post-grid row g-5 justify-content-center">
                <?php
                $args = [
                    'post_type'   => 'post',
                    'post_status' => 'publish',
                ];

                // Post per page
                if ( ! empty($blog_post_per_page)) {
                    $args['posts_per_page'] = $blog_post_per_page;
                }

                // Category
                if ( ! empty($blog_categories)) {
                    $args['tax_query'] = [
                        [
                            'taxonomy' => 'category',
                            'field'    => 'term_id',
                            'terms'    => $blog_categories,
                        ],
                    ];
                }

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) :
                        $query->the_post();
                        ?>
                        <div class="col-lg-<?php echo esc_attr($blog_post_per_column); ?> col-md-6 col-sm-6">
                            <?php get_template_part('template-parts/content'); ?>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>

            </div>

            <?php
            if (is_array($blog_button) && sizeof($blog_button) > 0) :
                $blog_button_url = isset($blog_button['url']) ? $blog_button['url'] : '';
                $blog_button_text = isset($blog_button['title']) ? $blog_button['title'] : esc_html__('Read More', 'ifchor');
                $blog_button_target = isset($blog_button['target']) ? $blog_button['target'] : '_self';


                if ($blog_button_url != ''):

                    ?>
                    <div class="button-container text-center mt-40">
                        <a target="<?php echo esc_attr($blog_button_target); ?>" href="<?php echo esc_url($blog_button_url); ?>" class="ifchor_btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15.032" height="22.069" viewBox="0 0 15.032 22.069">
                                <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                    <g id="Group_5" data-name="Group 5">
                                        <path id="Path_25" data-name="Path 25" d="M0-66,9.171-54.966,0-43.932h5.86l9.172-11.034L5.859-66Z" transform="translate(0.001 66)" fill="#fff"></path>
                                    </g>
                                </g>
                            </svg><?php echo esc_html($blog_button_text); ?>
                        </a>
                    </div>
                <?php
                endif;
            endif;
            ?>
            <!-- /.button-container -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.blog-area -->
<?php
get_footer();