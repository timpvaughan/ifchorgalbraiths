<?php
/**
 * Template Name: Dry Bulk Copy
 */
get_header();

$capesize        = get_field( '_capesize_content' );
$cap_title       = isset( $capesize['title'] ) ? $capesize['title'] : '';
$cap_description = isset( $capesize['description'] ) ? $capesize['description'] : '';
$cap_button_text      = isset( $capesize['button_text'] ) ? $capesize['button_text'] : '';
$cap_button      = isset( $capesize['button'] ) ? $capesize['button'] : '';
$cap_info_slider = isset( $capesize['info_slider'] ) ? $capesize['info_slider'] : '';


$allowed_html = [
	'p' => [
		'class' => [],
	],
	'a' => [
		'href'  => [],
		'class' => [],
	],
	'br' => [],
]

?>
<section class="dry-bulk left-circle--bg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="dry-bulk__content">
                    <svg xmlns="http://www.w3.org/2000/svg" class="arrow-bottom-icon" width="30.995" height="21.112"
                         viewBox="0 0 30.995 21.112">
                        <g id="Group_6107" data-name="Group 6107" transform="translate(-35.006 0.001) rotate(90)">
                            <g id="Group_6" data-name="Group 6" transform="translate(-0.001 -66)">
                                <g id="Group_5" data-name="Group 5">
                                    <path id="Path_25" data-name="Path 25" d="M0-66,12.881-50.5,0-35.006h8.23L21.111-50.5,8.229-66Z" transform="translate(0.001 66)" fill="#33367b" />
                                </g>
                            </g>
                        </g>
                    </svg>

                    <?php if ( ! empty( $cap_title ) ): ?>
                        <h2 class="dry-bulk__title"><?php echo esc_html( $cap_title ); ?></h2>
                    <?php endif; ?>

                    <?php if ( ! empty( $cap_description ) ): ?>
                        <div class="dry-bulk__description">
                            <?php echo wp_kses( $cap_description, $allowed_html ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( ! empty( $cap_button ) ): ?>
                        <a href="<?php echo $cap_button; ?>" class="ifchor_btn btn-outline">
                            <svg id="Group_6131" data-name="Group 6131" xmlns="http://www.w3.org/2000/svg" width="15.032" height="22.069" viewBox="0 0 15.032 22.069">
                                <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                    <g id="Group_5" data-name="Group 5">
                                        <path id="Path_25" data-name="Path 25" d="M0-66,9.171-54.966,0-43.932h5.86l9.172-11.034L5.859-66Z" transform="translate(0.001 66)" fill="#fec10d" />
                                    </g>
                                </g>
                            </svg>

                            <?php echo esc_html( $cap_button_text ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="swiper-container capsize-slider pagination-style">
                    <div class="swiper-wrapper">
                        <?php if ( $cap_info_slider ) : ?>
                            <?php foreach ( $cap_info_slider as $slide ) : ?>
                                <div class="swiper-slide">
                                    <div class="info-slider-content">
                                        <?php if ( ! empty( $slide['info_count'] ) ) : ?>
                                            <div class="info-number-circle">
                                                <span><?php echo esc_html( $slide['info_count'] ); ?></span>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ( ! empty( $slide['info_title'] ) ) : ?>
                                            <h3 class="info-slider-content__title">
                                                <?php echo esc_html( $slide['info_title'] ); ?>
                                            </h3>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <div class="slider-controls">
                        <div class="capsize-prev slider-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13.255" height="19.461" viewBox="0 0 13.255 19.461">
                                <g id="Group_6284" data-name="Group 6284" transform="translate(0)">
                                    <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                        <g id="Group_5" data-name="Group 5">
                                            <path id="Path_25" data-name="Path 25" d="M13.254-66,5.166-56.27l8.088,9.73H8.087L0-56.27,8.087-66Z" transform="translate(0.001 66)" fill="#fec10d" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="capsize-pagination"></div>
                        <div class="capsize-next slider-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13.256" height="19.461" viewBox="0 0 13.256 19.461">
                                <g id="Group_6283" data-name="Group 6283" transform="translate(0.001 66)">
                                    <g id="Group_6" data-name="Group 6" transform="translate(-0.001 -66)">
                                        <g id="Group_5" data-name="Group 5">
                                            <path id="Path_25" data-name="Path 25" d="M0-66l8.088,9.73L0-46.54H5.166l8.088-9.731L5.167-66Z" transform="translate(0.001 66)" fill="#fec10d" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.dry-bulk -->
<?php

$panamaxe        = get_field( '_panamaxe_content' );
$pan_title       = isset( $panamaxe['title'] ) ? $panamaxe['title'] : '';
$pan_description = isset( $panamaxe['description'] ) ? $panamaxe['description'] : '';
$pan_button_text = isset( $panamaxe['button_text'] ) ? $panamaxe['button_text'] : '';
$pan_button      = isset( $panamaxe['button'] ) ? $panamaxe['button'] : '';
$pan_info_slider = isset( $panamaxe['info_slider'] ) ? $panamaxe['info_slider'] : '';


?>
<section class="dry-bulk bg--secondary">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="dry-bulk__content">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30.995" height="21.112" viewBox="0 0 30.995 21.112">
                        <g id="Group_6107" data-name="Group 6107" transform="translate(-35.006 0.001) rotate(90)">
                            <g id="Group_6" data-name="Group 6" transform="translate(-0.001 -66)">
                                <g id="Group_5" data-name="Group 5">
                                    <path id="Path_25" data-name="Path 25" d="M0-66,12.881-50.5,0-35.006h8.23L21.111-50.5,8.229-66Z" transform="translate(0.001 66)" fill="#33367b" />
                                </g>
                            </g>
                        </g>
                    </svg>

                    <?php if ( ! empty( $pan_title ) ): ?>
                        <h2 class="dry-bulk__title"><?php echo esc_html( $pan_title ); ?></h2>
                    <?php endif; ?>

                    <?php if ( ! empty( $pan_description ) ): ?>
                        <div class="dry-bulk__description">
                            <?php echo wp_kses( $pan_description, $allowed_html ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( ! empty( $pan_button ) ): ?>
                        <a href="<?php echo esc_url( $pan_button ); ?>" class="ifchor_btn btn-outline-light">
                            <span class="btn-icon">
                                <svg id="Group_6130" data-name="Group 6130" xmlns="http://www.w3.org/2000/svg" width="15.032" height="22.068" viewBox="0 0 15.032 22.068">
                                  <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                    <g id="Group_5" data-name="Group 5">
                                      <path id="Path_25" data-name="Path 25" d="M0-66,9.171-54.966,0-43.932h5.86l9.172-11.034L5.859-66Z" transform="translate(0.001 66)" fill="#fec10d" />
                                    </g>
                                  </g>
                                </svg>
                            </span>
                            <?php echo esc_html( $pan_button_text ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="swiper-container panamax-slider pagination-style">
                    <div class="swiper-wrapper">
                        <?php if ( $pan_info_slider ) : ?>
                            <?php foreach ( $pan_info_slider as $slide ) : ?>
                                <div class="swiper-slide">
                                    <div class="info-slider-content">
                                        <?php if ( ! empty( $slide['info_count'] ) ) : ?>
                                            <div class="info-number-circle">
                                                <span><?php echo esc_html( $slide['info_count'] ); ?></span>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ( ! empty( $slide['info_title'] ) ) : ?>
                                            <h3 class="info-slider-content__title">
                                                <?php echo esc_html( $slide['info_title'] ); ?>
                                            </h3>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        <?php endif; ?>
                    </div>

                    <div class="slider-controls">
                        <div class="panamax-prev slider-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13.255" height="19.461" viewBox="0 0 13.255 19.461">
                                <g id="Group_6284" data-name="Group 6284" transform="translate(0)">
                                    <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                        <g id="Group_5" data-name="Group 5">
                                            <path id="Path_25" data-name="Path 25" d="M13.254-66,5.166-56.27l8.088,9.73H8.087L0-56.27,8.087-66Z" transform="translate(0.001 66)" fill="#fec10d" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="panamax-pagination"></div>
                        <div class="panamax-next slider-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13.256" height="19.461" viewBox="0 0 13.256 19.461">
                                <g id="Group_6283" data-name="Group 6283" transform="translate(0.001 66)">
                                    <g id="Group_6" data-name="Group 6" transform="translate(-0.001 -66)">
                                        <g id="Group_5" data-name="Group 5">
                                            <path id="Path_25" data-name="Path 25" d="M0-66l8.088,9.73L0-46.54H5.166l8.088-9.731L5.167-66Z" transform="translate(0.001 66)" fill="#fec10d" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.dry-bulk -->
<?php
$handysize        = get_field( '_handysize_content' );
$hand_title       = isset( $handysize['title'] ) ? $handysize['title'] : '';
$hand_description = isset( $handysize['description'] ) ? $handysize['description'] : '';
$hand_button_text = isset( $handysize['button_text'] ) ? $handysize['button_text'] : '';
$hand_button      = isset( $handysize['button'] ) ? $handysize['button'] : '';
$hand_info_slider = isset( $handysize['info_slider'] ) ? $handysize['info_slider'] : '';

?>
<section class="dry-bulk pagination-style">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="dry-bulk__content">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30.995" height="21.112"
                         viewBox="0 0 30.995 21.112">
                        <g id="Group_6107" data-name="Group 6107" transform="translate(-35.006 0.001) rotate(90)">
                            <g id="Group_6" data-name="Group 6" transform="translate(-0.001 -66)">
                                <g id="Group_5" data-name="Group 5">
                                    <path id="Path_25" data-name="Path 25" d="M0-66,12.881-50.5,0-35.006h8.23L21.111-50.5,8.229-66Z" transform="translate(0.001 66)" fill="#33367b" />
                                </g>
                            </g>
                        </g>
                    </svg>

                    <?php if ( ! empty( $hand_title ) ): ?>
                        <h2 class="dry-bulk__title"><?php echo esc_html( $hand_title ); ?></h2>
                    <?php endif; ?>

                    <?php if ( ! empty( $hand_description ) ): ?>
                        <div class="dry-bulk__description">
                            <?php echo wp_kses( $hand_description, $allowed_html ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( ! empty( $hand_button ) ): ?>
                        <a href="<?php echo $hand_button; ?>" class="ifchor_btn btn-outline">
                            <svg id="Group_6131" data-name="Group 6131" xmlns="http://www.w3.org/2000/svg" width="15.032" height="22.069" viewBox="0 0 15.032 22.069">
                                <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                    <g id="Group_5" data-name="Group 5">
                                        <path id="Path_25" data-name="Path 25" d="M0-66,9.171-54.966,0-43.932h5.86l9.172-11.034L5.859-66Z" transform="translate(0.001 66)" fill="#fec10d" />
                                    </g>
                                </g>
                            </svg>
                            <?php echo esc_html( $hand_button_text ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-lg-5 mt-5">
                <div class="swiper-container ultramax-slider">
                    <div class="swiper-wrapper">
                        <?php if ( $hand_info_slider ) : ?>
                            <?php foreach ( $hand_info_slider as $slide ) : ?>
                                <div class="swiper-slide">
                                    <div class="info-slider-content">
                                        <?php if ( ! empty( $slide['info_count'] ) ) : ?>
                                            <div class="info-number-circle">
                                                <span><?php echo esc_html( $slide['info_count'] ); ?></span>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ( ! empty( $slide['info_title'] ) ) : ?>
                                            <h3 class="info-slider-content__title">
                                                <?php echo esc_html( $slide['info_title'] ); ?>
                                            </h3>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <div class="slider-controls">
                        <div class="ultramax-prev slider-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13.255" height="19.461" viewBox="0 0 13.255 19.461">
                                <g id="Group_6284" data-name="Group 6284" transform="translate(0)">
                                    <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                        <g id="Group_5" data-name="Group 5">
                                            <path id="Path_25" data-name="Path 25" d="M13.254-66,5.166-56.27l8.088,9.73H8.087L0-56.27,8.087-66Z" transform="translate(0.001 66)" fill="#fec10d" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="ultramax-pagination"></div>
                        <div class="ultramax-next slider-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13.256" height="19.461" viewBox="0 0 13.256 19.461">
                                <g id="Group_6283" data-name="Group 6283" transform="translate(0.001 66)">
                                    <g id="Group_6" data-name="Group 6" transform="translate(-0.001 -66)">
                                        <g id="Group_5" data-name="Group 5">
                                            <path id="Path_25" data-name="Path 25" d="M0-66l8.088,9.73L0-46.54H5.166l8.088-9.731L5.167-66Z" transform="translate(0.001 66)" fill="#fec10d" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.dry-bulk -->

<?php
$broking             = get_field( '_broking_content' );
$broking_title       = isset( $broking['title'] ) ? $broking['title'] : '';
$broking_description = isset( $broking['description'] ) ? $broking['description'] : '';
$broking_lead_title  = isset( $broking['lead_title'] ) ? $broking['lead_title'] : '';
$broking_button_text      = isset( $broking['button_text'] ) ? $broking['button_text'] : '';
$broking_button      = isset( $broking['button'] ) ? $broking['button'] : '';
$broking_lists       = isset( $broking['service_list'] ) ? $broking['service_list'] : '';

?>
<section class="dry-bulk bg--secondary">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="dry-bulk__content">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30.995" height="21.112"
                         viewBox="0 0 30.995 21.112">
                        <g id="Group_6107" data-name="Group 6107" transform="translate(-35.006 0.001) rotate(90)">
                            <g id="Group_6" data-name="Group 6" transform="translate(-0.001 -66)">
                                <g id="Group_5" data-name="Group 5">
                                    <path id="Path_25" data-name="Path 25" d="M0-66,12.881-50.5,0-35.006h8.23L21.111-50.5,8.229-66Z" transform="translate(0.001 66)" fill="#33367b" />
                                </g>
                            </g>
                        </g>
                    </svg>

                    <?php if ( ! empty( $broking_title ) ): ?>
                        <h2 class="dry-bulk__title"><?php echo esc_html( $broking_title ); ?></h2>
                    <?php endif; ?>

                    <?php if ( ! empty( $broking_description || $broking_lead_title ) ): ?>
                        <div class="dry-bulk__description">
                            <?php if ( ! empty( $broking_lead_title ) ) : ?>
                                <h3 class="lead"> <?php echo esc_html( $broking_lead_title ); ?></h3>
                            <?php endif; ?>
                            <?php echo wp_kses( $broking_description, $allowed_html ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( ! empty( $broking_button ) ): ?>
                        <a href="<?php echo esc_url( $broking_button ); ?>" class="ifchor_btn btn-outline-light">
                            <span class="btn-icon">
                                <svg id="Group_6130" data-name="Group 6130" xmlns="http://www.w3.org/2000/svg" width="15.032" height="22.068" viewBox="0 0 15.032 22.068">
                                    <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                        <g id="Group_5" data-name="Group 5">
                                            <path id="Path_25" data-name="Path 25"  d="M0-66,9.171-54.966,0-43.932h5.86l9.172-11.034L5.859-66Z" transform="translate(0.001 66)" fill="#fec10d" />
                                        </g>
                                    </g>
                                </svg>
                            </span>
                            <?php echo esc_html( $broking_button_text ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-lg-5 mt-5">
                <ul class="service-list">
                    <?php if ( $broking_lists ) : ?>
                        <?php foreach ( $broking_lists as $item ) : ?>
                            <?php if ( ! empty( $item['list_title'] ) ) : ?>
                                <li class="info-slider-content__title">
                                    <span class="list-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12.372" height="18.163" viewBox="0 0 12.372 18.163">
                                          <g id="Group_6117" data-name="Group 6117" transform="translate(0.001 66)">
                                            <g id="Group_6" data-name="Group 6" transform="translate(-0.001 -66)">
                                              <g id="Group_5" data-name="Group 5">
                                                <path id="Path_25" data-name="Path 25" d="M0-66l7.549,9.082L0-47.837H4.822l7.549-9.082L4.822-66Z" transform="translate(0.001 66)" fill="#fec10d" />
                                              </g>
                                            </g>
                                          </g>
                                        </svg>
                                    </span>
                                    <?php echo esc_html( $item['list_title'] ); ?>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- /.dry-bulk -->

<?php
$advices          = get_field( '_advisors_contents' );
$advices_title    = isset( $advices['title'] ) ? $advices['title'] : '';
$advices_subtitle = isset( $advices['subtitle'] ) ? $advices['subtitle'] : '';
$advices_buttons  = isset( $advices['buttons'] ) ? $advices['buttons'] : '';

?>
<section class="advisors">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="advisors__content">
                    <?php if ( ! empty( $advices_subtitle ) ) : ?>
                        <h3 class="advisors__subtitle"><?php echo esc_html( $advices_subtitle ); ?></h3>
                    <?php endif; ?>

                    <?php if ( ! empty( $advices_title ) ) : ?>
                        <h2 class="advisors__title"><?php echo esc_html( $advices_title ); ?></h2>
                    <?php endif; ?>

                    <div class="advisors__button-container">
                        <?php foreach ( $advices_buttons as $key => $button ) : ?>
                            <a href="<?php echo esc_url( $button['button_items'] ); ?>" class="ifchor_btn btn-outline-light">
                                <span class="btn-icon">
                                    <svg id="Group_6130" data-name="Group 6130" xmlns="http://www.w3.org/2000/svg" width="15.032" height="22.068" viewBox="0 0 15.032 22.068">
                                      <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                        <g id="Group_5" data-name="Group 5">
                                          <path id="Path_25" data-name="Path 25" d="M0-66,9.171-54.966,0-43.932h5.86l9.172-11.034L5.859-66Z" transform="translate(0.001 66)" fill="#fec10d" />
                                        </g>
                                      </g>
                                    </svg>
                                </span>
                                <?php echo esc_html( $button['button_text']); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php

get_footer();