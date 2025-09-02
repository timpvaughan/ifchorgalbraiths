<?php
/**
 * Template Name: Research
 */
get_header();


$left_contents    = get_field('_research_left_contents');
$left_title       = isset($left_contents['left_title']) ? $left_contents['left_title'] : '';
$left_subtitle    = isset($left_contents['left_subtitle']) ? $left_contents['left_subtitle'] : '';
$left_desc        = isset($left_contents['left_desc']) ? $left_contents['left_desc'] : '';
$left_button_text = isset($left_contents['button_text']) ? $left_contents['button_text'] : '';
$left_button      = isset($left_contents['left_button']) ? $left_contents['left_button'] : '';

$left_image = isset($left_contents['left_image']) ? $left_contents['left_image'] : '';
?>

    <section class="about right-image bg--white">
        <div class="container height-full d-flex">
            <div class="row align-items-center">
                <div class="col-lg-6 offset-lg-6">
                    <div class="about__content" data-aos="fade-left">

                        <?php if ($left_subtitle) : ?>
                            <h3 class="about__subtitle"><?php echo esc_html($left_subtitle); ?></h3>
                        <?php endif; ?>

                        <?php if ($left_title) : ?>
                            <h2 class="about__title"><?php echo esc_html($left_title); ?></h2>
                        <?php endif; ?>

                        <?php if ($left_desc) : ?>
                            <p class="about__desc"><?php echo esc_html($left_desc); ?></p>
                        <?php endif; ?>

                        <?php if ($left_button) : ?>
                            <a href="<?php echo esc_url($left_button); ?>"
                               class="ifchor-more_btn about__button">
                            <span class="btn-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.403" height="13.805"
                                     viewBox="0 0 9.403 13.805">
                                  <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                    <g id="Group_5" data-name="Group 5">
                                      <path id="Path_25" data-name="Path 25" d="M0-66l5.737,6.9L0-52.2H3.665L9.4-59.1,3.665-66Z" transform="translate(0.001 66)" fill="#33367b"/>
                                    </g>
                                  </g>
                                </svg>
                            </span>
                                <?php echo esc_html($left_button_text); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->

        <?php if ( ! empty($left_image['url'])) : ?>
            <div class="about__image">
                <img src="<?php echo esc_url($left_image['url']); ?>" alt="<?php echo esc_attr($left_image['alt']); ?>"/>
            </div>
        <?php endif; ?>
    </section>
    <!-- /.about-area -->

<?php
$right_contents    = get_field('_research_right_contents');
$right_title       = isset($right_contents['right_title']) ? $right_contents['right_title'] : '';
$right_subtitle    = isset($right_contents['right_subtitle']) ? $right_contents['right_subtitle'] : '';
$right_desc        = isset($right_contents['right_desc']) ? $right_contents['right_desc'] : '';
$right_button_text = isset($right_contents['button_text']) ? $right_contents['button_text'] : '';
$right_button_type = isset($right_contents['button_type']) ? $right_contents['button_type'] : '';
$right_button      = isset($right_contents['right_button']) ? $right_contents['right_button'] : '';
$right_button_ext  = isset($right_contents['button_url_ext']) ? $right_contents['button_url_ext'] : '';
$right_image       = isset($right_contents['right_image']) ? $right_contents['right_image'] : '';

//$overlay_title     = isset( $right_contents['image_overlay_title'] ) ? $right_contents['image_overlay_title'] : '';
//$overlay_subtitle  = isset( $right_contents['image_overlay_subtitle'] ) ? $right_contents['image_overlay_subtitle'] : '';
//$button_one_text   = isset( $right_contents['overlay_button_one_text'] ) ? $right_contents['overlay_button_one_text'] : '';
//$button_one        = isset( $right_contents['overlay_button_one'] ) ? $right_contents['overlay_button_one'] : '';
//$button_two_text   = isset( $right_contents['overlay_button_two_text'] ) ? $right_contents['overlay_button_two_text'] : '';
//$button_two        = isset( $right_contents['overlay_button_two'] ) ? $right_contents['overlay_button_two'] : '';

$right_btn_url = '';
if ($right_button_type == 'internal') {
    $right_btn_url = $right_button;
} else {
    $right_btn_url = $right_button_ext['url'];
}

?>

    <section class="about bg--secondary">
        <div class="container height-full d-flex">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about__content" data-aos="fade-right">
                        <?php if ($right_subtitle) : ?>
                            <h3 class="about__subtitle"><?php echo esc_html($right_subtitle); ?></h3>
                        <?php endif; ?>

                        <?php if ($right_title) : ?>
                            <h2 class="about__title"><?php echo esc_html($right_title); ?></h2>
                        <?php endif; ?>

                        <?php if ($right_desc) : ?>
                            <p class="about__desc"><?php echo esc_html($right_desc); ?></p>
                        <?php endif; ?>

                        <?php if ($right_btn_url) : ?>
                            <a href="<?php echo esc_url($right_btn_url); ?>"
                               class="ifchor_btn btn-outline-light about__button">
                            <span class="btn-icon">
                                <svg id="Group_6122" data-name="Group 6122" xmlns="http://www.w3.org/2000/svg" width="15.032" height="22.068" viewBox="0 0 15.032 22.068">
                                  <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                    <g id="Group_5" data-name="Group 5">
                                      <path id="Path_25" data-name="Path 25" d="M0-66,9.171-54.966,0-43.932h5.86l9.172-11.034L5.859-66Z" transform="translate(0.001 66)" fill="#fec10d"/>
                                    </g>
                                  </g>
                                </svg>

                            </span>
                                <?php echo esc_html($right_button_text); ?>
                            </a>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->

        <?php if ( ! empty($right_image['url'])) : ?>
            <div class="about__image overlay-content--image">
                <img src="<?php echo esc_url($right_image['url']); ?>" alt="<?php echo esc_attr($right_image['alt']); ?>"/>

            </div>
        <?php endif; ?>
    </section>
    <!-- /.about-area -->

<?php
$blog_content  = get_field('_research_blog_contents');
$blog_title    = isset($blog_content['blog_title']) ? $blog_content['blog_title'] : '';
$blog_subtitle = isset($blog_content['blog_subtitle']) ? $blog_content['blog_subtitle'] : '';

//$blog_btn_text        = isset( $blog_content['button_text'] ) ? $blog_content['button_text'] : '';
//$blog_btn_link        = isset( $blog_content['blog_btn_link'] ) ? $blog_content['blog_btn_link'] : '';
$button_url = isset($blog_content['button_url']) ? $blog_content['button_url'] : [];

$blog_categories      = isset($blog_content['categories']) ? $blog_content['categories'] : '';
$blog_post_per_page   = isset($blog_content['post_per_page']) ? $blog_content['post_per_page'] : '3';
$blog_post_per_column = isset($blog_content['post_per_column']) ? $blog_content['post_per_column'] : '4';
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
                    'post_type'   => 'ifchor-research',
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
                            'taxonomy' => 'ig-category',
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

            if (is_array($button_url) && sizeof($button_url) > 0) :
                $button_url_url = isset($button_url['url']) ? $button_url['url'] : '';
                $button_url_text = isset($button_url['title']) ? $button_url['title'] : esc_html__('Learn more', 'ifchor');
                $button_url_target = isset($button_url['target']) ? $button_url['target'] : '_self';
                if ($button_url_url != ''):
                    ?>
                    <div class="button-container text-center mt-40">
                        <a target="<?php echo esc_attr($button_url_target); ?>" href="<?php echo esc_url($button_url_url); ?>" class="ifchor_btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15.032" height="22.069"
                                 viewBox="0 0 15.032 22.069">
                                <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                    <g id="Group_5" data-name="Group 5">
                                        <path id="Path_25" data-name="Path 25" d="M0-66,9.171-54.966,0-43.932h5.86l9.172-11.034L5.859-66Z" transform="translate(0.001 66)" fill="#fff"></path>
                                    </g>
                                </g>
                            </svg>
                            <?php echo esc_html($button_url_text); ?>
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