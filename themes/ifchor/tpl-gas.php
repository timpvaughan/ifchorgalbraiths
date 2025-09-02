<?php
/**
 * Template Name: Gas
 */
get_header();

$capesize        = get_field( '_insights_content' );
$cap_title       = isset( $capesize['title'] ) ? $capesize['title'] : '';
$bg_image        = isset( $capesize['background_image'] ) ? $capesize['background_image'] : [];
$bg_image_url    = isset( $bg_image['url'] ) ? $bg_image['url'] : '';

$bg = '';
if ( $bg_image_url != '' ) {
    $bg = 'style="background-image: url(' . esc_url( $bg_image_url ) . ')"';
}


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
<section class="insight-section" <?php echo $bg;?>>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="insight__content" data-aos="fade-right">
                    <?php if ( ! empty( $cap_title ) ): ?>
                        <h2 class="insight__title"><?php echo esc_html( $cap_title ); ?></h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.dry-bulk -->


<?php

$content  = get_field( '_info_contents' );
$lead_title = isset( $content['lead_title'] ) ? $content['lead_title'] : '';
$description = isset( $content['description'] ) ? $content['description'] : '';
?>

<section class="lead-section bg--secondary">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="lead__content" data-aos="fade-right">

                    <div class="section-arrow-icon">
                        <svg id="Group_6428" data-name="Group 6428" xmlns="http://www.w3.org/2000/svg" width="35.479" height="52.087" viewBox="0 0 35.479 52.087">
                            <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                <g id="Group_5" data-name="Group 5">
                                    <path id="Path_25" data-name="Path 25" d="M0,52.087,21.648,26.044,0,0H13.83L35.479,26.044,13.831,52.087Z" fill="#fff"/>
                                </g>
                            </g>
                        </svg>

                    </div>

                    <?php if ( ! empty( $lead_title ) ): ?>
                        <h2 class="lead__title"><?php echo esc_html( $lead_title ); ?></h2>
                    <?php endif; ?>

                    <?php if ( ! empty( $description ) ): ?>
                        <div class="lead__description">
                            <?php echo wp_kses( $description, $allowed_html ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.lead-section -->

<?php
$advices          = get_field( '_advisors_contents' );
$advices_title    = isset( $advices['title'] ) ? $advices['title'] : '';
$advices_subtitle = isset( $advices['subtitle'] ) ? $advices['subtitle'] : '';
$advices_buttons  = isset( $advices['buttons'] ) ? $advices['buttons'] : [];
$advices_bg_image = isset( $advices['background_image'] ) ? $advices['background_image'] : [];

$advices_bg_image_url = isset( $advices_bg_image['url'] ) ? $advices_bg_image['url'] : '';
$adv_bg_url = '';

if ( ! empty( $advices_bg_image_url ) ) {
    $adv_bg_url = 'style="background-image: url(' . esc_url( $advices_bg_image_url ) . ')"';
}

if(!is_array($advices_buttons)) $advices_buttons  = [];

?>
<section class="advisors" <?php echo $adv_bg_url; ?>>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="advisors__content" data-aos="fade-up">
                    <?php if ( ! empty( $advices_subtitle ) ) : ?>
                        <h3 class="advisors__subtitle"><?php echo esc_html( $advices_subtitle ); ?></h3>
                    <?php endif; ?>

                    <?php if ( ! empty( $advices_title ) ) : ?>
                        <h2 class="advisors__title" data-aos="fade-up"><?php echo esc_html( $advices_title ); ?></h2>
                    <?php endif; ?>

                    <div class="advisors__button-container" data-aos="fade-up">
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
$pagelinks        = get_field( '_page_links' );
$section_title    = isset( $pagelinks['section_title'] ) ? $pagelinks['section_title'] : '';
$section_subtitle = isset( $pagelinks['section_subtitle'] ) ? $pagelinks['section_subtitle'] : '';
$link             = isset( $pagelinks['check_the_display_link'] ) ? $pagelinks['check_the_display_link'] : '';

// Dry Bulk
$drybulk_content = get_field( 'dry_bulk', 'option' );
$dry_subtitle    = isset( $drybulk_content['subtitle'] ) ? $drybulk_content['subtitle'] : '';
$dry_title       = isset( $drybulk_content['title'] ) ? $drybulk_content['title'] : '';
$dry_button_text = isset( $drybulk_content['button_text'] ) ? $drybulk_content['button_text'] : '';
$dry_button_url  = isset( $drybulk_content['button_url'] ) ? $drybulk_content['button_url'] : '';

// Tankers
$tankers_content     = get_field( 'tankers', 'option' );
$tankers_subtitle    = isset( $tankers_content['subtitle'] ) ? $tankers_content['subtitle'] : '';
$tankers_title       = isset( $tankers_content['title'] ) ? $tankers_content['title'] : '';
$tankers_button_text = isset( $tankers_content['button_text'] ) ? $tankers_content['button_text'] : '';
$tankers_button_url  = isset( $tankers_content['button_url'] ) ? $tankers_content['button_url'] : '';

// Sale & Purchase
$sale_purchase_content     = get_field( 'sale_purchase', 'option' );
$sale_purchase_subtitle    = isset( $sale_purchase_content['subtitle'] ) ? $sale_purchase_content['subtitle'] : '';
$sale_purchase_title       = isset( $sale_purchase_content['title'] ) ? $sale_purchase_content['title'] : '';
$sale_purchase_button_text = isset( $sale_purchase_content['button_text'] ) ? $sale_purchase_content['button_text'] : '';
$sale_purchase_button_url  = isset( $sale_purchase_content['button_url'] ) ? $sale_purchase_content['button_url'] : '';

// Offshore
$offshore_content     = get_field( 'offshore', 'option' );
$offshore_subtitle    = isset( $offshore_content['subtitle'] ) ? $offshore_content['subtitle'] : '';
$offshore_title       = isset( $offshore_content['title'] ) ? $offshore_content['title'] : '';
$offshore_button_text = isset( $offshore_content['button_text'] ) ? $offshore_content['button_text'] : '';
$offshore_button_url  = isset( $offshore_content['button_url'] ) ? $offshore_content['button_url'] : '';

// Gas
$gas_content     = get_field( 'gas', 'option' );
$gas_subtitle    = isset( $gas_content['subtitle'] ) ? $gas_content['subtitle'] : '';
$gas_title       = isset( $gas_content['title'] ) ? $gas_content['title'] : '';
$gas_button_text = isset( $gas_content['button_text'] ) ? $gas_content['button_text'] : '';
$gas_button_url  = isset( $gas_content['button_url'] ) ? $gas_content['button_url'] : '';


?>

    <section class="sustain-pagelink">
        <div class="container-fluid">

            <div class="container">
		        <?php if ( ! empty( $section_title ) || ! empty( $section_subtitle ) ) : ?>
                    <div class="section-heading text-center">
				        <?php if ( $section_subtitle ) : ?>
                            <h5 class="section-subtitle"><?php echo esc_html( $section_subtitle ); ?></h5>
				        <?php endif; ?>
				        <?php if ( $section_title ) : ?>
                            <h2 class="section-title"><?php echo esc_html( $section_title ); ?></h2>
				        <?php endif; ?>
                    </div>
		        <?php endif; ?>
            </div>

            <div class="row">
				<?php  if( $link && in_array('dry', $link) ) : ?>
                    <div class="col-md-6 col-lg-3 d-flex align-items-center bg--primary">
                        <div class="service-item__content pd-50">
							<?php if ( ! empty( $dry_subtitle ) || ! empty( $dry_title ) ) : ?>
                                <div class="service-item__text">
									<?php if ( $dry_subtitle ) : ?>
                                        <h5 class="service-item__subtitle"><?php echo esc_html( $dry_subtitle ); ?></h5>
									<?php endif; ?>

									<?php if ( $dry_title ) : ?>
                                        <h2 class="service-item__title w-auto"><?php echo esc_html( $dry_title ); ?></h2>
									<?php endif; ?>

									<?php if ( ! empty( $dry_button_url ) ) : ?>
                                        <a href="<?php echo esc_url( $dry_button_url ); ?>" class="ifchor-more_btn service-item__button">
                                    <span class="btn-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="9.403" height="13.805" viewBox="0 0 9.403 13.805">
                                         <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                           <g id="Group_5" data-name="Group 5">
                                              <path id="Path_25" data-name="Path 25" d="M0-66l5.737,6.9L0-52.2H3.665L9.4-59.1,3.665-66Z" transform="translate(0.001 66)" fill="#33367b"></path>
                                           </g>
                                         </g>
                                      </svg>
                                     </span>
											<?php echo esc_html( $dry_button_text ); ?>
                                        </a>
									<?php endif; ?>
                                </div>
							<?php endif; ?>
                        </div>
                    </div>
				<?php endif; ?>

				<?php if ( $link && in_array( 'tankers', $link )) : ?>
                    <div class="col-md-6 col-lg-3 d-flex align-items-center bg--secondary">
                        <div class="service-item__content pd-50">
							<?php if ( ! empty( $tankers_subtitle ) || ! empty( $tankers_title ) ) : ?>
                                <div class="service-item__text">
									<?php if ( $tankers_subtitle ) : ?>
                                        <h5 class="service-item__subtitle"><?php echo esc_html( $tankers_subtitle ); ?></h5>
									<?php endif; ?>

									<?php if ( $tankers_title ) : ?>
                                        <h2 class="service-item__title w-auto"><?php echo esc_html( $tankers_title ); ?></h2>
									<?php endif; ?>

									<?php if ( ! empty( $tankers_button_url ) ) : ?>
                                        <a href="<?php echo esc_url( $tankers_button_url ); ?>" class="ifchor-more_btn service-item__button">
                                    <span class="btn-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="9.403" height="13.805" viewBox="0 0 9.403 13.805">
                                         <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                           <g id="Group_5" data-name="Group 5">
                                              <path id="Path_25" data-name="Path 25" d="M0-66l5.737,6.9L0-52.2H3.665L9.4-59.1,3.665-66Z" transform="translate(0.001 66)" fill="#33367b"></path>
                                           </g>
                                         </g>
                                      </svg>
                                     </span>
											<?php echo esc_html( $tankers_button_text ); ?>
                                        </a>
									<?php endif; ?>
                                </div>
							<?php endif; ?>
                        </div>
                    </div>
				<?php endif; ?>

				<?php if ( $link && in_array( 'sale', $link )) : ?>
                    <div class="col-md-6 col-lg-3 d-flex align-items-center bg--white">
                        <div class="service-item__content pd-50">
							<?php if ( ! empty( $sale_purchase_subtitle ) || ! empty( $sale_purchase_title ) ) : ?>
                                <div class="service-item__text">
									<?php if ( $sale_purchase_subtitle ) : ?>
                                        <h5 class="service-item__subtitle"><?php echo esc_html( $sale_purchase_subtitle ); ?></h5>
									<?php endif; ?>

									<?php if ( $sale_purchase_title ) : ?>
                                        <h2 class="service-item__title w-auto"><?php echo esc_html( $sale_purchase_title ); ?></h2>
									<?php endif; ?>

									<?php if ( ! empty( $sale_purchase_button_url ) ) : ?>
                                        <a href="<?php echo esc_url( $sale_purchase_button_url ); ?>" class="ifchor-more_btn service-item__button">
                                    <span class="btn-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="9.403" height="13.805" viewBox="0 0 9.403 13.805">
                                         <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                           <g id="Group_5" data-name="Group 5">
                                              <path id="Path_25" data-name="Path 25" d="M0-66l5.737,6.9L0-52.2H3.665L9.4-59.1,3.665-66Z" transform="translate(0.001 66)" fill="#33367b"></path>
                                           </g>
                                         </g>
                                      </svg>
                                     </span>
											<?php echo esc_html( $sale_purchase_button_text ); ?>
                                        </a>
									<?php endif; ?>
                                </div>
							<?php endif; ?>
                        </div>
                    </div>
				<?php endif; ?>

				<?php if ( $link && in_array( 'offshore', $link )) : ?>
                    <div class="col-md-6 col-lg-3 d-flex align-items-center bg--primary">
                         <div class="service-item__content pd-50">
								<?php if ( ! empty( $offshore_subtitle ) || ! empty( $dry_title ) ) : ?>
                                    <div class="service-item__text">
										<?php if ( $offshore_subtitle ) : ?>
                                            <h5 class="service-item__subtitle"><?php echo esc_html( $offshore_subtitle ); ?></h5>
										<?php endif; ?>

										<?php if ( $offshore_title ) : ?>
                                            <h2 class="service-item__title w-auto"><?php echo esc_html( $offshore_title ); ?></h2>
										<?php endif; ?>

										<?php if ( ! empty( $offshore_button_url ) ) : ?>
                                            <a href="<?php echo esc_url( $offshore_button_url ); ?>" class="ifchor-more_btn service-item__button">
                                    <span class="btn-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="9.403" height="13.805" viewBox="0 0 9.403 13.805">
                                         <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                           <g id="Group_5" data-name="Group 5">
                                              <path id="Path_25" data-name="Path 25" d="M0-66l5.737,6.9L0-52.2H3.665L9.4-59.1,3.665-66Z" transform="translate(0.001 66)" fill="#33367b"></path>
                                           </g>
                                         </g>
                                      </svg>
                                     </span>
												<?php echo esc_html( $offshore_button_text ); ?>
                                            </a>
										<?php endif; ?>
                                    </div>
								<?php endif; ?>
                            </div>
                    </div>
				<?php endif; ?>

				<?php if ( $link && in_array( 'gas', $link )) : ?>
                    <div class="col-md-6 col-lg-3 d-flex align-items-center bg--secondary">
                        <div class="service-item__content pd-50">
							<?php if ( ! empty( $gas_subtitle ) || ! empty( $tankers_title ) ) : ?>
                                <div class="service-item__text">
									<?php if ( $gas_subtitle ) : ?>
                                        <h5 class="service-item__subtitle"><?php echo esc_html( $gas_subtitle ); ?></h5>
									<?php endif; ?>

									<?php if ( $gas_title ) : ?>
                                        <h2 class="service-item__title w-auto"><?php echo esc_html( $gas_title ); ?></h2>
									<?php endif; ?>

									<?php if ( ! empty( $gas_button_url ) ) : ?>
                                        <a href="<?php echo esc_url( $gas_button_url ); ?>" class="ifchor-more_btn service-item__button">
                                <span class="btn-icon">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="9.403" height="13.805" viewBox="0 0 9.403 13.805">
                                     <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                       <g id="Group_5" data-name="Group 5">
                                          <path id="Path_25" data-name="Path 25" d="M0-66l5.737,6.9L0-52.2H3.665L9.4-59.1,3.665-66Z" transform="translate(0.001 66)" fill="#33367b"></path>
                                       </g>
                                     </g>
                                  </svg>
                                 </span>
											<?php echo esc_html( $gas_button_text ); ?>
                                        </a>
									<?php endif; ?>
                                </div>
							<?php endif; ?>
                        </div>
                    </div>
				<?php endif; ?>
            </div>
        </div>
    </section>
    <!-- /.sustain-pagelink -->

<?php

get_footer();