<?php
/**
 * Displays the page header.
 *
 * @package CodeBoxr
 * @subpackage Ifchor
 * @since 1.0.0
 */
?>
<div id="page-header" class="site-page-header">
    <div class="container pr">
        <div class="row">
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
                        echo sprintf( '<p class="banner__description">%1$s</p>', esc_html__( 'What’s new at IG? Stay up to date with the latest corporate and sustainability news from across our network.', 'ifchor' ) );
                    } elseif ( get_post_type() == 'ifchor-research') {
                        echo sprintf( '<p class="banner__description">%1$s</p>', esc_html__( 'Tanker and dry bulk market insights from our research desks.', 'ifchor' ) );
                    }


					?>

                    <?php

                        $banner_button = get_field( '_page_header_button' );

                        if (is_array($banner_button) && sizeof($banner_button) > 0) :
                            $button_url_url = isset($banner_button['url']) ? $banner_button['url'] : '';
                            $button_url_text = isset($banner_button['title']) ? $banner_button['title'] : esc_html__('Learn more', 'ifchor');
                            $button_url_target = isset($banner_button['target']) ? $banner_button['target'] : '_self';
                            if ($button_url_url != ''):
                                ?>
                    <a target="<?php echo esc_attr($button_url_target); ?>"
                        href="<?php echo esc_url($button_url_url); ?>" class="ifchor_btn btn-outline-light header-btn">
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
                        <?php echo esc_html($button_url_text); ?>
                    </a>
                    <?php
                            endif;
                        endif;
                        ?>

                </div>
            </div>
        </div>


        <svg xmlns="http://www.w3.org/2000/svg" class="bottom-icon" width="30.995" height="21.112"
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

    </div>
</div>
<!-- #page-header -->