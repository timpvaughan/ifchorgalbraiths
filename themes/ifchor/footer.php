<footer id="site-footer" class="site-footer">

    <div class="footer-widgets-wrapper">
		<?php
		$footer_bg = get_field( 'footer_background', 'option' );

		if ( $footer_bg ) {
			echo '<div class="footer-overlay" style="background-image: url(' . $footer_bg . ')"></div>';
		}

		?>

        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 display-space" data-aos="fade-up">
					<?php
					$footer_logo = get_field( 'footer_logo', 'option' );
                    $logo = isset($footer_logo['url']) ? $footer_logo['url'] : get_template_directory_uri() . '/assets/images/logo.svg';

					if ( $logo ) {
						echo '<div class="footer-logo">';
						echo '<a href="' . get_home_url() . '"><img src="' . esc_url($logo) . '" alt="' . esc_attr__('Footer Logo', 'ifchor') . '" width="270" height="70" /></a>';
						echo '</div>';
					}
					?>

                    <div class="footer-menu">
						<?php
						if ( has_nav_menu( 'footer_menu' ) ) {
							wp_nav_menu( [
								'theme_location' => 'footer_menu',
								'container'      => false,
								'menu_class'     => 'footer-menu-lists',
								'depth'          => 1,
							] );
						}
						?>
                    </div>
                </div>

				<?php
				$footer_address_title = get_field( 'address_one', 'option' );

				$title_one   = $footer_address_title['title'];
				$address_one = $footer_address_title['address'];
				$phone_one   = $footer_address_title['phone_number'];

				// Address Two
				$footer_address_title_two = get_field( 'address_two', 'option' );

				$title_two   = $footer_address_title_two['title'];
				$address_two = $footer_address_title_two['address'];
				$phone_two   = $footer_address_title_two['phone_number'];

				$allowed_html = [
					'a'      => [
						'href'   => [],
						'title'  => [],
						'target' => [],
					],
					'br'     => [],
					'em'     => [],
					'strong' => [],
				];
				?>

                <div class="col-lg-6 col-md-12">
                    <div class="footer-address-wrapper">
                        <div class="footer-address">
                            <div class="footer-address__item" data-aos="fade-up" data-aos-delay="100"> 
								<?php if ( ! empty( $title_one ) ) : ?>
                                    <h3 class="footer-address__title">
										<?php echo esc_html( $title_one ); ?>
                                    </h3>
								<?php endif; ?>

								<?php if ( ! empty( $address_one ) ) : ?>
                                    <div class="footer-address__text">
                                        <p>
											<?php echo wp_kses( $address_one, $allowed_html ); ?>
                                        </p>
                                    </div>
								<?php endif; ?>

								<?php if ( ! empty( $phone_one ) ) : ?>
                                    <div class="footer-address__phone">
                                        <p>
                                            <a href="tel:<?php echo esc_attr( $phone_one ); ?>">
                                            <span class="phone-icon">
                                                <svg id="Group_25" data-name="Group 25" xmlns="http://www.w3.org/2000/svg" width="9.403" height="13.805" viewBox="0 0 9.403 13.805">
                                                    <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                                        <g id="Group_5" data-name="Group 5">
                                                            <path id="Path_25" data-name="Path 25" d="M0-66l5.737,6.9L0-52.2H3.665L9.4-59.1,3.665-66Z" transform="translate(0.001 66)" fill="#fff"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </span>
												<?php echo esc_html( $phone_one ); ?>
                                            </a>
                                        </p>
                                    </div>
								<?php endif; ?>
                            </div>

                            <div class="footer-address__item" data-aos="fade-up" data-aos-delay="200"> 
								<?php if ( ! empty( $title_two ) ) : ?>
                                    <h3 class="footer-address__title">
										<?php echo esc_html( $title_two ); ?>
                                    </h3>
								<?php endif; ?>

								<?php if ( ! empty( $address_two ) ) : ?>
                                    <div class="footer-address__text">
                                        <p>
											<?php echo wp_kses( $address_two, $allowed_html ); ?>
                                        </p>
                                    </div>
								<?php endif; ?>

								<?php if ( ! empty( $phone_two ) ) : ?>
                                    <div class="footer-address__phone">
                                        <p>
                                            <a href="tel:<?php echo esc_attr( $phone_two ); ?>">
                                            <span class="phone-icon">
                                                <svg id="Group_25" data-name="Group 25" xmlns="http://www.w3.org/2000/svg" width="9.403" height="13.805" viewBox="0 0 9.403 13.805">
                                                    <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                                        <g id="Group_5" data-name="Group 5">
                                                            <path id="Path_25" data-name="Path 25" d="M0-66l5.737,6.9L0-52.2H3.665L9.4-59.1,3.665-66Z" transform="translate(0.001 66)" fill="#fff"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </span>
												<?php echo esc_html( $phone_two ); ?>
                                            </a>
                                        </p>
                                    </div>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-copyright">
        <div class="container">
            <div class="row align-items-center">
				<?php

				$copy_right_text_left  = get_field( 'copyright_text_left', 'option' );
				$copy_right_text_right = get_field( 'copyright_text_right', 'option' );
				?>
				<?php if ( ! empty( $copy_right_text_left ) ): ?>
                    <div class="col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-start">
                        <div class="footer-copyright-wrapper">
                            <p class="copyright-text">
								<?php
								$allowed_html = [
									'a'      => [
										'href'   => [],
										'title'  => [],
										'target' => [],
									],
									'em'     => [],
									'strong' => [],
								];

								echo wp_kses( $copy_right_text_left, $allowed_html );

								?>
                            </p>
                        </div>
                    </div>
				<?php endif; ?>

				<?php if ( ! empty( $copy_right_text_right ) ): ?>
                    <div class="col-lg-6">
                        <div class="footer-copyright-wrapper d-flex justify-content-center justify-content-lg-end align-items-center">
                            <p class="copyright-text">
								<?php echo wp_kses( $copy_right_text_right, $allowed_html ); ?>
                            </p>
                            <div class="credit__logo">
                                <img src="<?php echo esc_attr( IFCHOR_ASSETS_URI . 'images/crossorigin-logo.svg' ); ?>" alt="cross-origin-logo" />
                            </div>
                        </div>
                    </div>
				<?php endif; ?>
            </div>
        </div>
    </div>
</footer>

</main><!-- #page -->
</div> <!--/.site-->

<?php wp_footer(); ?>

</body>
</html>