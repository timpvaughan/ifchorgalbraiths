<?php
/**
 * Template Name: Home Page
 */
get_header();

$banner_content       = get_field( '_home_banner' );
$banner_title         = isset( $banner_content['title'] ) ? $banner_content['title'] : '';
$banner_subtitle      = isset( $banner_content['subtitle'] ) ? $banner_content['subtitle'] : '';
$banner_btn_text      = isset( $banner_content['button_text'] ) ? $banner_content['button_text'] : '';
$banner_btn_video_url = isset( $banner_content['video_url'] ) ? $banner_content['video_url'] : '';
$banner_image         = isset( $banner_content['banner_background_image'] ) ? $banner_content['banner_background_image'] : [];
$banner_video         = isset( $banner_content['background_video'] ) ? $banner_content['background_video'] : '';
$banner_video_alt     = isset( $banner_content['background_video_alt'] ) ? $banner_content['background_video_alt'] : '';

$allowed_html = [
	'span' => [
		'class' => []
	],
    'br'   => [],
]

?>

<section class="banner">
    <div class="banner__video">
        <video class="jquery-background-video" autoplay muted loop playsinline muted id="banner_video_bg">
            <source src="<?php echo esc_url( $banner_video ); ?>" type="video/mp4" />
            <source src="<?php echo esc_url( $banner_video_alt ); ?>" type="video/webm" />
        </video>
    </div>

    <div class="banner__content">
        <div class="container" data-aos="fade-in">
            <?php if ( $banner_title ) : ?>
            <h1 class="banner__title"><?php echo wp_kses($banner_title, $allowed_html); ?></h1>
            <?php endif; ?>

            <div class="banner__button-wrapper">
                <?php if ( $banner_subtitle ) : ?>
                <p class="banner__btn-title"><?php echo esc_html( $banner_subtitle ); ?></p>
                <?php endif; ?>

                <?php if ( $banner_btn_video_url ) : ?>
                <a href="<?php echo esc_url( $banner_btn_video_url ); ?>" class="ifchor_btn banner__button"
                    id="video-popup">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15.032" height="22.069" viewBox="0 0 15.032 22.069">
                        <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                            <g id="Group_5" data-name="Group 5">
                                <path id="Path_25" data-name="Path 25"
                                    d="M0-66,9.171-54.966,0-43.932h5.86l9.172-11.034L5.859-66Z"
                                    transform="translate(0.001 66)" fill="#fff" />
                            </g>
                        </g>
                    </svg>
                    <?php echo esc_html( $banner_btn_text ); ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- Modal -->
    <div class="modal modal-xl fade" id="homevideoModal" tabindex="-1" aria-labelledby="homevideoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close ifchor-close-btn" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <div class="modal-body">
                    <div class="ratio ratio-16x9">
                        <iframe id="homevideoiframe" class="responsive-iframe homevideo-iframe"
                            data-link="<?php echo esc_url( $banner_btn_video_url ); ?>" src="" allow="autoplay"
                            allowfullscreen=""></iframe>
                    </div>
                </div>
                <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
            </div>
        </div>
    </div>
    <!-- /.banner__content -->



    <svg xmlns="http://www.w3.org/2000/svg" width="30.995" height="21.112" class="bottom-icon"
        viewBox="0 0 30.995 21.112">
        <g id="Group_8" data-name="Group 8" transform="translate(-35.006 0.001) rotate(90)">
            <g id="Group_6" data-name="Group 6" transform="translate(-0.001 -66)">
                <g id="Group_5" data-name="Group 5">
                    <path id="Path_25" data-name="Path 25" d="M0-66,12.881-50.5,0-35.006h8.23L21.111-50.5,8.229-66Z"
                        transform="translate(0.001 66)" fill="#fff" />
                </g>
            </g>
        </g>
    </svg>
</section>
<!-- /.banner -->


<?php
$about_content  = get_field( '_about_contents' );
$about_title    = isset( $about_content['title'] ) ? $about_content['title'] : '';
$about_subtitle = isset( $about_content['subtitle'] ) ? $about_content['subtitle'] : '';
$about_desc     = isset( $about_content['description'] ) ? $about_content['description'] : '';
$about_image    = isset( $about_content['image'] ) ? $about_content['image'] : '';
$about_btn_text = isset( $about_content['button_text'] ) ? $about_content['button_text'] : '';
$about_btn_link = isset( $about_content['button_link'] ) ? $about_content['button_link'] : '';

?>

<section class="about">
    <div class="container height-full d-flex">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about__content" data-aos="fade-right">
                    <?php if ( $about_subtitle ) : ?>
                    <h3 class="about__subtitle"><?php echo esc_html( $about_subtitle ); ?></h3>
                    <?php endif; ?>

                    <?php if ( $about_title ) : ?>
                    <h2 class="about__title"><?php echo esc_html( $about_title ); ?></h2>
                    <?php endif; ?>

                    <?php if ( $about_desc ) : ?>
                    <p class="about__desc"><?php echo esc_html( $about_desc ); ?></p>
                    <?php endif; ?>

                    <?php if ( $about_btn_link ) : ?>
                    <a href="<?php echo esc_url( $about_btn_link ); ?>" class="ifchor-more_btn about__button">
                        <span class="btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="9.403" height="13.805"
                                viewBox="0 0 9.403 13.805">
                                <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                    <g id="Group_5" data-name="Group 5">
                                        <path id="Path_25" data-name="Path 25"
                                            d="M0-66l5.737,6.9L0-52.2H3.665L9.4-59.1,3.665-66Z"
                                            transform="translate(0.001 66)" fill="#FEC10D" />
                                    </g>
                                </g>
                            </svg>
                        </span><?php echo esc_html( $about_btn_text ); ?>
                    </a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <div class="about__image">
        <img src="<?php echo esc_url( $about_image['url'] ); ?>" alt="<?php echo esc_attr($about_image['alt']); ?>" />
    </div>
</section>
<!-- /.about-area -->

<?php

$services_content = get_field( '_service_content' );
$service_items    = isset( $services_content['service_items'] ) ? $services_content['service_items'] : '';

?>
<section id="our-services" class="services">
    <div class="row g-0">
        <?php if ( $service_items ) :
            $color = [ 'bg--primary', 'bg--secondary', 'bg--white' ];
            $index = 0;
            ?>
        <?php foreach ( $service_items as $key => $item ) :
            $bg_color = $color[ $index ];

            $content_bg = $item['content_bg_color'];
            ?>
        <?php if ( ! empty( $item['title'] ) || ! empty( $item['sub_title'] ) || ! empty( $item['button_link']['url'] ) ) : ?>
        <div class="col-lg-4 col-md-6 service-item d-flex align-items-center <?php echo esc_attr( $content_bg ); ?>">
            <div class="service-item__content" data-aos="fade-in">
                <div class="service-item__text">
                    <?php if ( $item['title'] ) : ?>
                    <h4 class="service-item__subtitle"><?php echo $item['sub_title']; ?></h4>
                    <?php endif; ?>
                    <h3 class="service-item__title"><?php echo $item['title']; ?></h3>

                    <?php if ( $item['button_link'] ) : ?>
                    <a href="<?php echo esc_url( $item['button_link'] ); ?>"
                        class="ifchor-more_btn service-item__button">
                        <span class="btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="9.403" height="13.805"
                                viewBox="0 0 9.403 13.805">
                                <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                    <g id="Group_5" data-name="Group 5">
                                        <path id="Path_25" data-name="Path 25"
                                            d="M0-66l5.737,6.9L0-52.2H3.665L9.4-59.1,3.665-66Z"
                                            transform="translate(0.001 66)" fill="#33367b" />
                                    </g>
                                </g>
                            </svg>
                        </span><?php echo esc_html( $item['button_text'] ); ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if ( ! empty( $item['service_image']['url'] ) ) : ?>
        <div class="col-lg-4 col-md-6">
            <div class="service-item__image">
                <img src="<?php echo esc_url( $item['service_image']['url'] ); ?>"
                    alt="<?php esc_attr_e('Service Image', 'ifchor'); ?>" />
            </div>
        </div>
        <?php endif; ?>
        <?php if ( $index == 2 ) {
                $index = 0;
            } else {
                $index ++;
            }
            endforeach; ?>
        <?php endif; ?>
    </div>
</section>
<!-- /.services -->

<?php
$image_right_contents    = get_field( '_image_right_contents' );
$image_right_title       = isset( $image_right_contents['image_right_title'] ) ? $image_right_contents['image_right_title'] : '';
$image_right_subtitle    = isset( $image_right_contents['image_right_subtitle'] ) ? $image_right_contents['image_right_subtitle'] : '';
$image_right_desc        = isset( $image_right_contents['image_right_desc'] ) ? $image_right_contents['image_right_desc'] : '';
$image_right_button_text = isset( $image_right_contents['button_text'] ) ? $image_right_contents['button_text'] : '';
$image_right_button      = isset( $image_right_contents['image_right_button'] ) ? $image_right_contents['image_right_button'] : '';
$image_right_image       = isset( $image_right_contents['image_right'] ) ? $image_right_contents['image_right'] : '';
?>
<section class="about bg--primary">
    <div class="container height-full d-flex">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about__content" data-aos="fade-right">
                    <?php if ( $image_right_subtitle ) : ?>
                    <h3 class="about__subtitle"><?php echo esc_html( $image_right_subtitle ); ?></h3>
                    <?php endif; ?>

                    <?php if ( $image_right_title ) : ?>
                    <h2 class="about__title"><?php echo esc_html( $image_right_title ); ?></h2>
                    <?php endif; ?>

                    <?php if ( $image_right_desc ) : ?>
                    <p class="about__desc"><?php echo esc_html( $image_right_desc ); ?></p>
                    <?php endif; ?>

                    <?php if ( $image_right_button ) : ?>
                    <a href="<?php echo esc_url( $image_right_button ); ?>" class="ifchor-more_btn about__button">
                        <span class="btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="9.403" height="13.805"
                                viewBox="0 0 9.403 13.805">
                                <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                    <g id="Group_5" data-name="Group 5">
                                        <path id="Path_25" data-name="Path 25"
                                            d="M0-66l5.737,6.9L0-52.2H3.665L9.4-59.1,3.665-66Z"
                                            transform="translate(0.001 66)" fill="#33367b" />
                                    </g>
                                </g>
                            </svg>
                        </span><?php echo esc_html( $image_right_button_text ); ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <?php if ( ! empty( $image_right_image['url'] ) ) : ?>
    <div class="about__image">
        <img src="<?php echo esc_html( $image_right_image['url'] ); ?>"
            alt="<?php echo esc_attr( $image_right_image['alt'] ); ?>" />
    </div>
    <?php endif; ?>
</section>
<!-- /.about-area -->

<?php
$image_left_contents    = get_field( '_image_left_contents' );
$image_left_title       = isset( $image_left_contents['image_left_title'] ) ? $image_left_contents['image_left_title'] : '';
$image_left_subtitle    = isset( $image_left_contents['image_left_subtitle'] ) ? $image_left_contents['image_left_subtitle'] : '';
$image_left_desc        = isset( $image_left_contents['image_left_desc'] ) ? $image_left_contents['image_left_desc'] : '';
$image_left_button_text = isset( $image_left_contents['button_text'] ) ? $image_left_contents['button_text'] : '';
$image_left_button      = isset( $image_left_contents['image_left_button'] ) ? $image_left_contents['image_left_button'] : '';
$image_left_image       = isset( $image_left_contents['image_left'] ) ? $image_left_contents['image_left'] : '';

?>
<section class="about right-image">
    <div class="container height-full d-flex">
        <div class="row align-items-center">
            <div class="col-lg-7 offset-lg-6 offset-xl-6 offset-xxl-7">
                <div class="about__content" data-aos="fade-left">
                    <?php if ( $image_left_subtitle ) : ?>
                    <h3 class="about__subtitle"><?php echo esc_html( $image_left_subtitle ); ?></h3>
                    <?php endif; ?>

                    <?php if ( $image_left_title ) : ?>
                    <h2 class="about__title"><?php echo esc_html( $image_left_title ); ?></h2>
                    <?php endif; ?>

                    <?php if ( $image_left_desc ) : ?>
                    <p class="about__desc"><?php echo esc_html( $image_left_desc ); ?></p>
                    <?php endif; ?>

                    <?php if ( $image_left_button ) : ?>
                    <a href="<?php echo esc_url( $image_left_button ); ?>" class="ifchor-more_btn about__button">
                        <span class="btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="9.403" height="13.805"
                                viewBox="0 0 9.403 13.805">
                                <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                    <g id="Group_5" data-name="Group 5">
                                        <path id="Path_25" data-name="Path 25"
                                            d="M0-66l5.737,6.9L0-52.2H3.665L9.4-59.1,3.665-66Z"
                                            transform="translate(0.001 66)" fill="#FEC10D" />
                                    </g>
                                </g>
                            </svg>
                        </span><?php echo esc_html( $image_left_button_text ); ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <?php if ( ! empty( $image_left_image['url'] ) ) : ?>
    <div class="about__image">
        <img src="<?php echo esc_url( $image_left_image['url'] ); ?>"
            alt="<?php echo esc_attr( $image_left_image['alt'] ); ?>" />
    </div>
    <?php endif; ?>
</section>
<!-- /.about-area -->

<?php
$blog_content    = get_field( '_blog_contents' );
$blog_title      = isset( $blog_content['blog_title'] ) ? $blog_content['blog_title'] : '';
$blog_subtitle   = isset( $blog_content['blog_subtitle'] ) ? $blog_content['blog_subtitle'] : '';
$blog_btn_text   = isset( $blog_content['button_text'] ) ? $blog_content['button_text'] : '';
$blog_btn_link   = isset( $blog_content['blog_btn_link'] ) ? $blog_content['blog_btn_link'] : '';
$blog_categories = isset( $blog_content['categories'] ) ? $blog_content['categories'] : '';
$post_per_page   = isset( $blog_content['post_per_page'] ) ? $blog_content['post_per_page'] : '';
$post_per_column = isset( $blog_content['post_per_column'] ) ? $blog_content['post_per_column'] : '';

?>
<section class="blog-area" data-aos="fade-up" data-aos-delay="500">
    <div class="container">
        <?php if ( ! empty( $blog_title ) || ! empty( $blog_subtitle ) ) : ?>
        <div class="section-heading text-center">
            <?php if ( $blog_subtitle ) : ?>
            <h5 class="section-subtitle"><?php echo esc_html( $blog_subtitle ); ?></h5>
            <?php endif; ?>
            <?php if ( $blog_title ) : ?>
            <h2 class="section-title"><?php echo esc_html( $blog_title ); ?></h2>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <div class="post-grid row justify-content-center g-5">
            <?php
            $args = [
                'post_type'      => 'post',
                'post_status'    => 'publish',
            ];

            if( ! empty( $post_per_page ) ) {
                $args['posts_per_page'] = $post_per_page;
            }

            // Category
            if ( ! empty( $blog_categories ) ) {
                $args['tax_query'] = [
                    [
                        'taxonomy' => 'category',
                        'field'    => 'term_id',
                        'terms'    => $blog_categories,
                    ],
                ];
            }

            $query = new WP_Query( $args );

            if ( $query->have_posts() ) :
                while ( $query->have_posts() ) :
                    $query->the_post();
                    ?>
            <div class="col-lg-<?php echo esc_attr( $post_per_column ); ?> col-md-6 col-sm-6">
                <?php get_template_part( 'template-parts/content' ); ?>
            </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>

        </div>

        <?php if ( is_array( $blog_btn_link ) && ! empty( $blog_btn_link ) ) :
    $btn_url     = '';
    $btn_text    = isset( $blog_btn_link['title'] ) ? $blog_btn_link['title'] : 'Learn more';
    $btn_target  = isset( $blog_btn_link['target'] ) ? $blog_btn_link['target'] : '_self';

    // Handle post link
    if ( isset( $blog_btn_link['type'] ) && $blog_btn_link['type'] === 'post' && isset( $blog_btn_link['post_id'] ) ) {
        $btn_url = get_permalink( $blog_btn_link['post_id'] );
    }
    // Handle term link
    elseif ( isset( $blog_btn_link['type'] ) && $blog_btn_link['type'] === 'term' && isset( $blog_btn_link['term_id'], $blog_btn_link['taxonomy'] ) ) {
        $btn_url = get_term_link( $blog_btn_link['term_id'], $blog_btn_link['taxonomy'] );
    }
    // Handle raw URL
    elseif ( isset( $blog_btn_link['url'] ) ) {
        $btn_url = $blog_btn_link['url'];
    }

    if ( ! empty( $btn_url ) ) : ?>
        <div class="button-container text-center mt-40">
            <a href="<?php echo esc_url( $btn_url ); ?>" target="<?php echo esc_attr( $btn_target ); ?>"
                class="ifchor_btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="15.032" height="22.069" viewBox="0 0 15.032 22.069">
                    <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                        <g id="Group_5" data-name="Group 5">
                            <path id="Path_25" data-name="Path 25"
                                d="M0-66,9.171-54.966,0-43.932h5.86l9.172-11.034L5.859-66Z"
                                transform="translate(0.001 66)" fill="#fff"></path>
                        </g>
                    </g>
                </svg><?php echo esc_html( $btn_text ); ?>
            </a>
        </div>
        <?php endif;
endif; ?>

        <!-- /.button-container -->
    </div>
    <!-- /.container -->
</section>
<!-- /.blog-area -->
<?php
get_footer();
