<?php
/**

 *
 * @package CodeBoxr
 * @subpackage Ifchor
 * @since 1.0.0
 */

 /**
 * Template Name: Broking & Sus Landing Page
 */
get_header();

?>

<?php

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


<?php $thumb = get_the_post_thumbnail_url(); ?>
<section>
    <div id="page-header" class="site-page-header landing" style="background-image: url('<?php echo $thumb;?>')">
        <div class="container pr h-100">
            <div class="row align-items-center h-100">
                <div class="col-lg-12">
                    <div class="page-header-wrapper" data-aos="fade-in">

                        <?php
                            if(function_exists('bcn_display'))
                            {
                                echo '<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">';
                                bcn_display();
                                echo ' </div>';
                            }
                            else{
                                ifchor_breadcrumb();
                            }

                            ?>

                        <?php

                            $banner_title = __( 'News & Culture', 'ifchor' );
                            $page_description = get_field( '_page_header_description' );
                            $banner_title_show = get_field( '_page_title_showhide' );

                            if ( is_page() || is_singular() ) {
                            $banner_title = get_the_title();
                            }

                            if ( is_search() ) {
                            $banner_title = __( 'Search', 'ifchor' );
                            }

                            if ( is_archive() ) {

                            if(is_tax() || is_tag() || is_category()){
                                //$banner_title = get_the_archive_title();
                                $banner_title = single_term_title( '', false );
                            }else{
                                $banner_title = __( 'Archive', 'ifchor' );
                            }

                            }

                            if ( is_post_type_archive('ig-contact')) {
                            $banner_title = __( 'Our People', 'ifchor' );
                            }

                            if (is_post_type_archive('ifchor-research')) {
                            $banner_title = __( 'Research & Insights', 'ifchor' );
                            }

                            if ( is_404() ) {
                            $banner_title = __( '404', 'ifchor' );
                            }

                            echo sprintf( '<h1 class="banner__title">%1$s</h1>', esc_html( $banner_title ) );
                            if ( ! empty( $page_description ) ) {
                            echo sprintf( '<p class="banner__description">%1$s</p>', esc_html( $page_description ) );
                            } elseif ( is_post_type_archive('ig-contact') ) {
                            echo sprintf( '<p class="banner__description">%1$s</p>', esc_html__( 'Our ability to provide strategic insights is strengthened by the collective intelligence of our people working in our global networks', 'ifchor' ) );
                            } elseif ( get_post_type() == 'post' ) {
                            echo sprintf( '<p class="banner__description">%1$s</p>', esc_html__( 'Stay informed through news about our organization and our company culture', 'ifchor' ) );
                            } elseif ( get_post_type() == 'ifchor-research') {
                            echo sprintf( '<p class="banner__description">%1$s</p>', esc_html__( 'Stay informed with our latest Research news, industry insights and our recent participation in industry events', 'ifchor' ) );
                            }

                            ?>


                        <div class="banner__button-wrapper my-5">
                            <?php if ( $banner_subtitle ) : ?>
                            <p class="banner__btn-title"><?php echo esc_html( $banner_subtitle ); ?></p>
                            <?php endif; ?>

                            <?php if ( $banner_btn_video_url ) : ?>
                            <a href="<?php echo esc_url( $banner_btn_video_url ); ?>" class="ifchor_btn banner__button"
                                id="video-popup">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15.032" height="22.069"
                                    viewBox="0 0 15.032 22.069">
                                    <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                        <g id="Group_5" data-name="Group 5">
                                            <path id="Path_25" data-name="Path 25"
                                                d="M0-66,9.171-54.966,0-43.932h5.86l9.172-11.034L5.859-66Z"
                                                transform="translate(0.001 66)" fill="#fff" />
                                        </g>
                                    </g>
                                </svg>
                                <?php if ( $banner_btn_text ) : ?>
                                <?php echo esc_html( $banner_btn_text ); ?>
                                <?php endif; ?>
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
                                        data-link="<?php echo esc_url( $banner_btn_video_url ); ?>" src=""
                                        allow="autoplay" allowfullscreen=""></iframe>
                                </div>
                            </div>
                            <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
                        </div>
                    </div>
                </div>
                <!-- /.banner__content -->
            </div>


            <svg xmlns="http://www.w3.org/2000/svg" class="bottom-icon" width="30.995" height="21.112"
                viewBox="0 0 30.995 21.112">
                <g id="Group_8" data-name="Group 8" transform="translate(-35.006 0.001) rotate(90)">
                    <g id="Group_6" data-name="Group 6" transform="translate(-0.001 -66)">
                        <g id="Group_5" data-name="Group 5">
                            <path id="Path_25" data-name="Path 25"
                                d="M0-66,12.881-50.5,0-35.006h8.23L21.111-50.5,8.229-66Z"
                                transform="translate(0.001 66)" fill="#fff" />
                        </g>
                    </g>
                </g>
            </svg>

        </div>
    </div>
    <!-- #page-header -->
</section>
<!-- /.banner -->



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
$blog_content    = get_field('_blog_contents');
$blog_title      = isset($blog_content['blog_title']) ? $blog_content['blog_title'] : '';
$blog_subtitle   = isset($blog_content['blog_subtitle']) ? $blog_content['blog_subtitle'] : '';
$button_url      = isset($blog_content['button_url']) ? $blog_content['button_url'] : [];
$blog_btn_text   = isset($blog_content['button_text']) ? $blog_content['button_text'] : '';
$blog_categories = isset($blog_content['categories']) ? $blog_content['categories'] : '';
$post_per_page   = isset($blog_content['post_per_page']) ? $blog_content['post_per_page'] : 3;
$post_per_column = isset($blog_content['post_per_column']) ? $blog_content['post_per_column'] : 4;

// Determine post type and taxonomy
$is_custom_page = is_page('broking'); // <-- set to your custom post type page slug
$post_type = $is_custom_page ? 'ifchor-research' : 'post';
$taxonomy  = $is_custom_page ? 'ig-category' : 'category';

$args = [
    'post_type'      => $post_type,
    'post_status'    => 'publish',
    'posts_per_page' => $post_per_page,
];

// Taxonomy filter
if (!empty($blog_categories)) {
    $args['tax_query'] = [
        [
            'taxonomy' => $taxonomy,
            'field'    => 'term_id',
            'terms'    => $blog_categories,
        ],
    ];
}
?>

<section class="blog-area" data-aos="fade-up" data-aos-delay="500">
    <div class="container">
        <?php if (!empty($blog_title) || !empty($blog_subtitle)) : ?>
        <div class="section-heading text-center">
            <?php if ($blog_subtitle) : ?>
            <h5 class="section-subtitle"><?php echo esc_html($blog_subtitle); ?></h5>
            <?php endif; ?>
            <?php if ($blog_title) : ?>
            <h2 class="section-title"><?php echo esc_html($blog_title); ?></h2>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <div class="post-grid row justify-content-center g-5">
            <?php
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) :
                    $query->the_post(); ?>
            <div class="col-lg-<?php echo esc_attr($post_per_column); ?> col-md-6 col-sm-6">
                <?php get_template_part('template-parts/content'); ?>
            </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No posts found.</p>';
            endif;
            ?>
        </div>

        <?php
        // Handle acfe_advanced_link field
        if (is_array($button_url) && !empty($button_url)) :
            $button_url_url = '';
            $button_url_text = isset($button_url['title']) ? $button_url['title'] : 'Learn more';
            $button_url_target = isset($button_url['target']) ? $button_url['target'] : '_self';

            if (isset($button_url['type']) && $button_url['type'] === 'post' && isset($button_url['post_id'])) {
                $button_url_url = get_permalink($button_url['post_id']);
            } elseif (isset($button_url['type']) && $button_url['type'] === 'term' && isset($button_url['term_id'], $button_url['taxonomy'])) {
                $button_url_url = get_term_link((int)$button_url['term_id'], $button_url['taxonomy']);
            } elseif (isset($button_url['url'])) {
                $button_url_url = $button_url['url'];
            }

            if (!empty($button_url_url)) :
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
    </div>
</section>




<?php
get_footer();
