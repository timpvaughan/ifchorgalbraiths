<article id="post-<?php the_ID(); ?>" <?php post_class( [ 'post-details-content' ] ); ?>>
    <header class="entry-header">
		<?php if ( has_excerpt() ) : ?>
            <div class="entry-excerpt">
				<?php the_excerpt(); ?>
            </div>
		<?php endif; ?>
    </header>

	<?php ifchor_post_thumbnail(); ?>

    <div class="entry-content">
		<?php
		$job_sec_content  = get_field( '_job_contents' );
		$job_sec_title    = isset( $job_sec_content['career_section_title'] ) ? $job_sec_content['career_section_title'] : '';
		$job_sec_subtitle = isset( $job_sec_content['section_subtitle'] ) ? $job_sec_content['section_subtitle'] : '';

		//$job_title       = get_the_title();
		//$job_description = get_the_content();

		$job_content = get_field( '_job-contnets', get_the_ID() );

		$job_location   = isset( $job_content['location'] ) ? $job_content['location'] : '';
		$job_department = isset( $job_content['department'] ) ? $job_content['department'] : '';

		$job_subtitle    = isset( $job_content['subtitle'] ) ? $job_content['subtitle'] : '';
		$job_apply_link  = isset( $job_content['linkedin_url'] ) ? $job_content['linkedin_url'] : '';
		$job_apply_email = isset( $job_content['email_id'] ) ? $job_content['email_id'] : '';

        ?>
        <div class="job_meta_info">
            <?php if($job_department != ''): ?>
                <!--img class="job_meta_info_dept" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/<?php echo esc_attr($job_department); ?>.png" alt="<?php echo esc_attr($job_department); ?>" /-->
            <?php endif; ?>
	        <?php if($job_location != ''): ?>
                <span class="job_meta_info_loc"><?php echo esc_html($job_location); ?></span>
	        <?php endif; ?>
        </div>

        <?php

		the_content(
			sprintf(
				wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ifchor' ),
					[
						'span' => [
							'class' => [],
						],
					]
				),
				wp_kses_post( get_the_title() )
			)
		);
		?>

        <div class="job-item__footer">
			<?php if ( $job_subtitle ) : ?>
                <h4 class=""><?php echo esc_html( $job_subtitle ); ?></h4>
			<?php endif; ?>

            <div class="d-flex align-items-center flex-wrap">
				<?php if ( $job_apply_link ) : ?>
                    <a href="<?php echo esc_url( $job_apply_link['url'] ); ?>" class="job-item__apply-btn" target="_blank" style="color: #33367B;">
                    <span class="info-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21.123" height="21.084"
                             viewBox="0 0 21.123 21.084">
                            <g id="Group_6525" data-name="Group 6525" transform="translate(-379.203 -4689.605)">
                                <path id="Path_27" data-name="Path 27"
                                      d="M24.294,30.995h4.378V45.078H24.294Zm2.189-7a2.538,2.538,0,1,1-2.537,2.54,2.54,2.54,0,0,1,2.537-2.54"
                                      transform="translate(355.256 4665.611)" fill="#33367b"/>
                                <path id="Path_28" data-name="Path 28"
                                      d="M42.608,40.961h4.2v1.927h.06a4.6,4.6,0,0,1,4.141-2.275c4.433,0,5.251,2.916,5.251,6.707v7.724H51.884V48.2c0-1.633-.028-3.735-2.275-3.735-2.277,0-2.625,1.781-2.625,3.618v6.966H42.608Z"
                                      transform="translate(344.066 4655.645)" fill="#33367b"/>
                            </g>
                        </svg>
                    </span>

						<?php echo esc_html( $job_apply_link['title'] ); ?>
                    </a>
				<?php endif; ?>

				<?php if ( $job_apply_email ) : ?>
                    <a href="mailto:<?php echo esc_attr( $job_apply_email ); ?>" class="job-item__apply-btn" style="color: #33367B;">
                    <span class="info-icon">
                        <svg id="Group_6256" data-name="Group 6256" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" width="20.584" height="14.244"
                             viewBox="0 0 20.584 14.244">
                            <defs>
                                <clipPath id="clip-path">
                                    <rect id="Rectangle_193" data-name="Rectangle 193" width="20.584" height="14.245"
                                          fill="#33367b"/>
                                </clipPath>
                            </defs>
                            <g id="Group_6175" data-name="Group 6175" clip-path="url(#clip-path)">
                                <path id="Path_5708" data-name="Path 5708"
                                      d="M11.566,8.635,21.341.267A1.114,1.114,0,0,0,20.629,0H2.5A1.114,1.114,0,0,0,1.79.267Z"
                                      transform="translate(-1.274 0)" fill="#33367b"/>
                                <path id="Path_5709" data-name="Path 5709"
                                      d="M56.9,17.082a1.589,1.589,0,0,0,.039-.336V5.495L51.09,10.506Z"
                                      transform="translate(-36.36 -3.911)" fill="#33367b"/>
                                <path id="Path_5710" data-name="Path 5710"
                                      d="M15.975,25.862,12.543,28.8,9.111,25.862,3.163,32.6a1.061,1.061,0,0,0,.317.054H21.606a1.064,1.064,0,0,0,.317-.054Z"
                                      transform="translate(-2.251 -18.406)" fill="#33367b"/>
                                <path id="Path_5711" data-name="Path 5711"
                                      d="M5.854,10.506,0,5.495V16.746a1.587,1.587,0,0,0,.039.336Z"
                                      transform="translate(0 -3.911)" fill="#33367b"/>
                            </g>
                        </svg>
                    </span>

						<?php echo esc_html( $job_apply_email ); ?>
                    </a>
				<?php endif; ?>
            </div>
        </div>
    </div>
</article>