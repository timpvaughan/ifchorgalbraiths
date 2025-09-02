<?php
get_header();

?>
    <div id="main-content-wrapper" class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="sidebar-wrap">
						<?php
						$categories = get_the_category();
						if ( ! empty( $categories ) ) {
							echo '<div class="categories-wrapper">';
							echo '<ul class="category-lists">';
							foreach ( $categories as $category ) {
								echo '<li>
                                               <svg id="Group_6" data-name="Group 6" xmlns="http://www.w3.org/2000/svg" width="10.149" height="14.9" viewBox="0 0 10.149 14.9">
                                                  <g id="Group_5" data-name="Group 5">
                                                    <path id="Path_25" data-name="Path 25" d="M0-66l6.192,7.45L0-51.1H3.955l6.193-7.45L3.956-66Z" transform="translate(0.001 66)" fill="#fec10d"/>
                                                  </g>
                                               </svg>
                                                <a href="' . esc_url( get_term_link( $category ) ) . '">' . esc_html( $category->name ) . '</a>
                                            </li>';
							}
							echo '</ul>';
							echo '</div>';
						}

						// Post on
						$post_on = get_the_date( 'j F, Y' );
						if ( ! empty( $post_on ) ) {
							echo '<div class="post-on-wrapper">';
							echo '<span class="post-date">' . esc_html( $post_on ) . '</span>';
							echo '</div>';
						}

						// Post author
						// Get Author ID

						while ( have_posts() ) : the_post();
							$user_email       = get_the_author_meta( 'user_email' );

                            $user_avatar      = get_avatar( $user_email, 272, '', 'author');


                            //write_log($user_avatar);

                            //$user_avatar = preg_replace( '/(srcset|sizes)="[^"]*"/', '', $user_avatar );
                            //$user_avatar = preg_replace( '/(srcset)=[\'\'](?:\S+)*[\'\']\s?/i', '', $user_avatar );
                            //write_log($user_avatar);
                            //$user_avatar      = '<img alt="author" src="'.esc_url(get_avatar_url($user_email, [ 'size' => 272])).'"  class="avatar avatar-272 photo" height="272" width="272" />';

                            $user_first       = get_the_author_meta( 'first_name' );
							$user_last        = get_the_author_meta( 'last_name' );
							$user_description = get_the_author_meta( 'description' );
							$display_name     = get_the_author_meta( 'display_name' );
							$designation      = get_the_author_meta( 'designation' );
							$contact_title    = esc_html__( 'Contact', 'ifchor' );

							$email_icon = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="27.061" height="18.727" viewBox="0 0 27.061 18.727">
                                          <defs>
                                            <clipPath id="clip-path">
                                              <rect id="Rectangle_193" data-name="Rectangle 193" width="27.061" height="18.727" fill="#fff"/>
                                            </clipPath>
                                          </defs>
                                          <g id="Group_6176" data-name="Group 6176" transform="translate(0 0)">
                                            <g id="Group_6175" data-name="Group 6175" transform="translate(0 0)" clip-path="url(#clip-path)">
                                              <path id="Path_5708" data-name="Path 5708" d="M14.642,11.352l12.852-11A1.465,1.465,0,0,0,26.556,0H2.727A1.465,1.465,0,0,0,1.79.351Z" transform="translate(-1.112 0)" fill="#fff"/>
                                              <path id="Path_5709" data-name="Path 5709" d="M58.734,20.728a2.089,2.089,0,0,0,.052-.442V5.495l-7.7,6.588Z" transform="translate(-31.726 -3.412)" fill="#fff"/>
                                              <path id="Path_5710" data-name="Path 5710" d="M20.006,25.862l-4.512,3.862-4.512-3.862-7.82,8.853a1.394,1.394,0,0,0,.417.071H27.409a1.4,1.4,0,0,0,.417-.071Z" transform="translate(-1.964 -16.06)" fill="#fff"/>
                                              <path id="Path_5711" data-name="Path 5711" d="M7.7,12.083,0,5.495V20.286a2.086,2.086,0,0,0,.052.442Z" transform="translate(0 -3.412)" fill="#fff"/>
                                            </g>
                                          </g>
                                        </svg>
                                        ';

							$email_html = ! empty( $user_email ) ? '<a class="author-email" href="mailto:' . $user_email . '">' . $email_icon . esc_html__( 'Email Us', 'ifchor' ) . '</a>' : '';


							$avatar_html = ! empty( $user_avatar ) ? '<div class="author-info_avatar">' . $user_avatar . '</div>' : '';
							$name_html   = ! empty( $display_name ) ? '<span>' . $contact_title . '</span><h5 class="author-info_name">' . $display_name . '</h5><p>' . $designation . '</p>' . $email_html : '';

							echo '<div class="author-info_wrapper">' . $avatar_html . '<div class="author-info_content">' . $name_html . '</div></div>';
						endwhile;


						// Post share
						if ( function_exists( 'ifchor_social_share' ) ) {
							ifchor_social_share();
						}

						?>
                    </div>
                </div>

                <div class="col-lg-9">
					<?php
					while ( have_posts() ):
						the_post();

						get_template_part( 'template-parts/content', 'details' );

					endwhile; // End of the loop.
					?>
                </div>
            </div>

        </div>
    </div>
<?php
get_footer();
