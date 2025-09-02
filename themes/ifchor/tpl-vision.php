<?php
/**
 * Template name: Our Vision
 */
get_header();

$image_right_contents = get_field( '_vision_image_right_contents' );
$image_right_title    = isset( $image_right_contents['image_right_title'] ) ? $image_right_contents['image_right_title'] : '';
$image_right_desc     = isset( $image_right_contents['image_right_desc'] ) ? $image_right_contents['image_right_desc'] : '';
$about_image          = isset( $image_right_contents['vision_image_right'] ) ? $image_right_contents['vision_image_right'] : '';

$allowed_html = [
	'p'      => [],
	'br'     => [],
	'strong' => [],
	'em'     => [],
	'a'      => [
		'href'   => [],
		'title'  => [],
		'target' => []
	],
]

?>
<section class="about bg--primary">
    <div class="container height-full d-flex">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about__content pr-60" data-aos="fade-right">

                    <?php if ( $image_right_title ) : ?>
                        <h2 class="about__title"><?php echo esc_html( $image_right_title ); ?></h2>
                    <?php endif; ?>

                    <?php if ( $image_right_desc ) : ?>
                        <div class="about__desc"><?php echo wp_kses( $image_right_desc, $allowed_html ); ?></div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <div class="about__image">
        <img src="<?php echo esc_url( $about_image['url'] ); ?>" alt="<?php esc_attr_e( 'About Image', 'ifchor' ); ?>" />
    </div>
</section>
<!-- /.about-area -->

<?php
$image_left_contents = get_field( '_vision_image_left_contents' );
$image_left_title    = isset( $image_left_contents['image_left_title'] ) ? $image_left_contents['image_left_title'] : '';
$image_left_desc     = isset( $image_left_contents['image_left_desc'] ) ? $image_left_contents['image_left_desc'] : '';
$image_left_image    = isset( $image_left_contents['vision_image_left'] ) ? $image_left_contents['vision_image_left'] : '';
?>
<section class="about right-image bg--secondary">
    <div class="container height-full d-flex">
        <div class="row align-items-center">
            <div class="col-lg-7 offset-lg-6">
                <div class="about__content" data-aos="fade-left">
			        <?php if ( $image_left_title ) : ?>
                        <h2 class="about__title"><?php echo $image_left_title; ?></h2>
			        <?php endif; ?>

			        <?php if ( $image_left_desc ) : ?>
                        <div class="about__desc"><?php echo wp_kses( $image_left_desc, $allowed_html ); ?></div>
			        <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <div class="about__image">
        <img src="<?php echo esc_url( $image_left_image['url'] ); ?>" alt="<?php  esc_attr_e( 'About Image', 'ifchor' ); ?>" />
    </div>
</section>
<!-- /.about-area -->

<?php
$image_right_contents_3rd_panel = get_field( '_vision_image_right_contents_3rd_panel' );
$image_right_title    = isset( $image_right_contents_3rd_panel['image_right_title'] ) ? $image_right_contents_3rd_panel['image_right_title'] : '';
$image_right_desc     = isset( $image_right_contents_3rd_panel['image_right_desc'] ) ? $image_right_contents_3rd_panel['image_right_desc'] : '';
$about_image          = isset( $image_right_contents_3rd_panel['vision_image_right'] ) ? $image_right_contents_3rd_panel['vision_image_right'] : '';
?>

<section class="about bg--white">
    <div class="container height-full d-flex">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about__content pr-60" data-aos="fade-left">

                    <?php if ( $image_right_title ) : ?>
                        <h2 class="about__title"><?php echo esc_html( $image_right_title ); ?></h2>
                    <?php endif; ?>

                    <?php if ( $image_right_desc ) : ?>
                        <div class="about__desc"><?php echo wp_kses( $image_right_desc, $allowed_html ); ?></div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <div class="about__image">
        <img src="<?php echo esc_url( $about_image['url'] ); ?>" alt="<?php esc_attr_e( 'About Image', 'ifchor' ); ?>" />
    </div>
</section>
<!-- /.about-area -->

<?php
$call_to_action_contents = get_field( '_call_to_action_content' );

$call_to_action_title  = isset( $call_to_action_contents['title'] ) ? $call_to_action_contents['title'] : '';
$call_to_action_desc   = isset( $call_to_action_contents['description'] ) ? $call_to_action_contents['description'] : '';
$call_to_action_button = isset( $call_to_action_contents['button'] ) ? $call_to_action_contents['button'] : '';
$call_to_action_button_text = isset( $call_to_action_contents['button_text'] ) ? $call_to_action_contents['button_text'] : '';

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

<section class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
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

                    <?php if ( ! empty( $call_to_action_title ) ) : ?>
                        <h2 class="call-to-action__title"><?php echo esc_html( $call_to_action_title ); ?></h2>
                    <?php endif; ?>

                    <?php if ( ! empty( $call_to_action_desc ) ) : ?>
                        <p class="call-to-action__desc"><?php echo wp_kses( $call_to_action_desc, $allowed_html ); ?></p>
                    <?php endif; ?>

                    <!-- <?php if ( ! empty( $call_to_action_button ) ) : ?>
                        <a class="ifchor_btn btn-outline-light"
                           href="<?php echo esc_url( $call_to_action_button ); ?>">
                            <svg id="Group_6132" data-name="Group 6132" xmlns="http://www.w3.org/2000/svg"
                                 width="15.032" height="22.068" viewBox="0 0 15.032 22.068">
                                <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                    <g id="Group_5" data-name="Group 5">
                                        <path id="Path_25" data-name="Path 25" d="M0-66,9.171-54.966,0-43.932h5.86l9.172-11.034L5.859-66Z" transform="translate(0.001 66)" fill="#fec10d" />
                                    </g>
                                </g>
                            </svg>

                            <?php echo esc_html( $call_to_action_button_text ); ?>
                        </a>
                    <?php endif; ?> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.call-to-action -->

<?php
$blog_content         = get_field( '_vision_blog_contents' );
$blog_title           = isset( $blog_content['blog_title'] ) ? $blog_content['blog_title'] : '';
$blog_subtitle        = isset( $blog_content['blog_subtitle'] ) ? $blog_content['blog_subtitle'] : '';
$blog_btn_text        = isset( $blog_content['button_text'] ) ? $blog_content['button_text'] : '';
$blog_btn_link        = isset( $blog_content['blog_btn_link'] ) ? $blog_content['blog_btn_link'] : '';
$blog_categories      = isset( $blog_content['categories'] ) ? $blog_content['categories'] : '';
$blog_post_per_page   = isset( $blog_content['post_per_page'] ) ? $blog_content['post_per_page'] : '3';
$blog_post_per_column = isset( $blog_content['post_per_column'] ) ? $blog_content['post_per_column'] : '4';

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


        <div class="post-grid row g-5 justify-content-center">
            <?php
            $args = [
                'post_type'      => 'post',
                'post_status'    => 'publish',
            ];

            // Post per page
            if ( ! empty( $blog_post_per_page ) ) {
                $args['posts_per_page'] = $blog_post_per_page;
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
                    <div class="col-lg-<?php echo esc_attr( $blog_post_per_column); ?> col-md-6 col-sm-6">
                        <?php get_template_part( 'template-parts/content' ); ?>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <?php if ( ! empty( $blog_btn_link ) ) : ?>
            <div class="button-container text-center mt-40">
                <a href="<?php echo esc_url( $blog_btn_link ); ?>" class="ifchor_btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15.032" height="22.069"
                         viewBox="0 0 15.032 22.069">
                        <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                            <g id="Group_5" data-name="Group 5">
                                <path id="Path_25" data-name="Path 25" d="M0-66,9.171-54.966,0-43.932h5.86l9.172-11.034L5.859-66Z" transform="translate(0.001 66)" fill="#fff"></path>
                            </g>
                        </g>
                    </svg>
                    <?php echo esc_html( $blog_btn_text ); ?>
                </a>
            </div>
        <?php endif; ?>
        <!-- /.button-container -->
    </div>
    <!-- /.container -->
</section>
<!-- /.blog-area -->
<?php
get_footer();