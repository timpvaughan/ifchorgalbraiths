<?php
/**
 * Template Name: IG Sustainability
 */
get_header();

$banner_content  = get_field('_ig_banner_contents');
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
                <img src="<?php echo esc_url($banner_logo['url']); ?>"
                    alt="<?php echo esc_attr($banner_logo['title']); ?>">
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
                                <path id="Path_25" data-name="Path 25"
                                    d="M0-66,12.881-50.5,0-35.006h8.23L21.111-50.5,8.229-66Z"
                                    transform="translate(0.001 66)" fill="#fec10d" />
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
$info_logo             = isset($info_contents['logo']) ? $info_contents['logo'] : '';
$info_button_text      = isset($info_contents['button_text']) ? $info_contents['button_text'] : '';
$info_button_type      = isset($info_contents['button_url_type']) ? $info_contents['button_url_type'] : '';
$info_button_url       = isset($info_contents['button_url']) ? $info_contents['button_url'] : '';
$info_button_url_ext   = isset($info_contents['button_url_ext']) ? $info_contents['button_url_ext'] : '';

$btn_url = '';

if ($info_button_type == 'internal') {
    $btn_url = $info_button_url;
} else {
    $btn_url = $info_button_url_ext['url'];
}

$target = '';
if ( ! empty($info_button_url_ext['target'])) {
    $target = 'target="'.$info_button_url_ext['target'].'"';
}

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
                <div class="info-description__content" data-aos="fade-right">
                    <?php if ( ! empty($info_description)): ?>
                    <?php echo wp_kses($info_description, $allowed_html); ?>
                    <?php endif; ?>

                    <?php if ( ! empty($info_lead_description)): ?>
                    <p class="info-description__lead"><?php echo wp_kses($info_lead_description, $allowed_html); ?></p>
                    <?php endif; ?>

                    <?php if ( ! empty($info_logo)): ?>
                    <img src="<?php echo esc_url($info_logo['url']); ?>"
                        alt="<?php echo esc_attr($info_logo['alt']); ?>">
                    <?php endif; ?>

                    <?php if ( ! empty($info_button_text)): ?>
                    <a href="<?php echo esc_url($btn_url); ?>" class="ifchor_btn btn-outline-light"
                        <?php echo $target ?>>
                        <svg id="Group_6465" data-name="Group 6465" xmlns="http://www.w3.org/2000/svg" width="15.032"
                            height="22.069" viewBox="0 0 15.032 22.069">
                            <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                <g id="Group_5" data-name="Group 5">
                                    <path id="Path_25" data-name="Path 25"
                                        d="M0-66,9.171-54.966,0-43.932h5.86l9.172-11.034L5.859-66Z"
                                        transform="translate(0.001 66)" fill="#fec10d" />
                                </g>
                            </g>
                        </svg>

                        <?php echo esc_html($info_button_text); ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
</section>
<!-- /.about-area -->
<?php

$info_content_two         = get_field('_info_section_two_content');
$info_content_description = isset($info_content_two['description']) ? $info_content_two['description'] : '';
?>

<section class="info-description-two">
    <div class="container">
        <div class="row">

            <div class="banner-bottom-icon" data-aos="fade-down">
                <svg xmlns="http://www.w3.org/2000/svg" width="30.995" height="21.112" viewBox="0 0 30.995 21.112">
                    <g id="Group_6458" data-name="Group 6458" transform="translate(-35.006 0.001) rotate(90)">
                        <g id="Group_6" data-name="Group 6" transform="translate(-0.001 -66)">
                            <g id="Group_5" data-name="Group 5">
                                <path id="Path_25" data-name="Path 25"
                                    d="M0-66,12.881-50.5,0-35.006h8.23L21.111-50.5,8.229-66Z"
                                    transform="translate(0.001 66)" fill="#fec10d" />
                            </g>
                        </g>
                    </g>
                </svg>
            </div>

            <div class="col-lg-8">
                <div class="info-description-two__content" data-aos="fade-right">
                    <?php if ( ! empty($info_description)): ?>
                    <?php echo wp_kses($info_content_description, $allowed_html); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
</section>
<!-- /.about-area -->


<?php
$contact_content        = get_field('_ig_contact_contents');
$contact_title          = isset($contact_content['title']) ? $contact_content['title'] : '';
$contact_subtitle       = isset($contact_content['subtitle']) ? $contact_content['subtitle'] : '';
$contact_button_text    = isset($contact_content['button_text']) ? $contact_content['button_text'] : '';
$contact_button_type    = isset($contact_content['button_url_type']) ? $contact_content['button_url_type'] : '';
$contact_button_url     = isset($contact_content['button_url']) ? $contact_content['button_url'] : '';
$contact_button_url_ext = isset($contact_content['button_url_ext']) ? $contact_content['button_url_ext'] : '';
$contact_bg_image       = isset($contact_content['background_image']) ? $contact_content['background_image'] : [];

$contact_btn_url = '';

if ($contact_button_type == 'internal') {
    $contact_btn_url = $contact_button_url;
} else {
    $contact_btn_url = $contact_button_url_ext['url'];
}

// Contact Background Image

$contact_bg_image_url = isset($contact_bg_image['url']) ? $contact_bg_image['url'] : '';

$ig_contact_bg_image = '';

if ($contact_bg_image_url != '') {
    $ig_contact_bg_image = 'style="background-image: url('.esc_url($contact_bg_image_url).')"';
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
                    <a href="<?php echo esc_url($contact_btn_url); ?>" class="ifchor_btn btn-outline-light">
                        <svg id="Group_6465" data-name="Group 6465" xmlns="http://www.w3.org/2000/svg" width="15.032"
                            height="22.069" viewBox="0 0 15.032 22.069">
                            <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                <g id="Group_5" data-name="Group 5">
                                    <path id="Path_25" data-name="Path 25"
                                        d="M0-66,9.171-54.966,0-43.932h5.86l9.172-11.034L5.859-66Z"
                                        transform="translate(0.001 66)" fill="#fec10d" />
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
                                    <path id="Path_25" data-name="Path 25"
                                        d="M0-66,12.881-50.5,0-35.006h8.23L21.111-50.5,8.229-66Z"
                                        transform="translate(0.001 66)" fill="#fec10d" />
                                </g>
                            </g>
                        </g>
                    </svg>

                    <?php echo esc_html($page_link_left_title); ?>
                </a>
                <a href="<?php echo esc_url($page_link_right_url); ?>" class="pagination-page-link">
                    <?php echo esc_html($page_link_right_title); ?>
                    <svg id="Group_6465" data-name="Group 6465" xmlns="http://www.w3.org/2000/svg" width="15.032"
                        height="22.069" viewBox="0 0 15.032 22.069">
                        <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                            <g id="Group_5" data-name="Group 5">
                                <path id="Path_25" data-name="Path 25"
                                    d="M0-66,9.171-54.966,0-43.932h5.86l9.172-11.034L5.859-66Z"
                                    transform="translate(0.001 66)" fill="#fec10d" />
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
$blog_post_per_page = isset($blog_content['post_per_page']) ? $blog_content['post_per_page'] : '3';
$post_per_column    = isset($blog_content['post_per_column']) ? $blog_content['post_per_column'] : '4';

$button_url = isset($blog_content['button_url']) ? $blog_content['button_url'] : [];

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
            <div class="col-lg-<?php echo esc_attr($post_per_column); ?> col-md-6 col-sm-6">
                <?php get_template_part('template-parts/content'); ?>
            </div>
            <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>

        </div>
        <?php
            if (is_array($button_url) && sizeof($button_url) > 0) :
                $button_url_url = isset($button_url['url']) ? $button_url['url'] : '';
                $button_url_text = isset($button_url['title']) ? $button_url['title'] : esc_html__('Learn more', 'ifchor');
                $button_url_target = isset($button_url['target']) ? $button_url['target'] : '_self';
                if ($button_url_url != ''):
                    ?>
        <div class="button-container text-center mt-40">
            <a target="<?php echo esc_attr($button_url_target); ?>" href="<?php echo esc_url($button_url_url); ?>"
                class="ifchor_btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="15.032" height="22.069" viewBox="0 0 15.032 22.069">
                    <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                        <g id="Group_5" data-name="Group 5">
                            <path id="Path_25" data-name="Path 25"
                                d="M0-66,9.171-54.966,0-43.932h5.86l9.172-11.034L5.859-66Z"
                                transform="translate(0.001 66)" fill="#fff"></path>
                        </g>
                    </g>
                </svg><?php echo esc_html($button_url_text); ?>
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