<?php
get_header();
?>
    <div id="main-content-wrapper" class="main-content-wrapper py-110">
        <div class="container">

            <?php

            /*$args = array(
	            'hide_empty' => true,
	            'taxonomy'   => 'ig-cateory',
            );

            $categories = get_terms( $args );

			if (!is_wp_error($categories) && ! empty( $categories )) { */?><!--
                <div class="category-list">
                    <div class="category-list__description">
                        <ul class="blog-category-lists">
							<?php /*foreach ( $categories as $category ) {
								$category_name = $category->name;
								$category_link = get_term_link($category);
								*/?>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11.865" height="15.9" viewBox="0 0 11.865 15.9">
                                        <g id="Group_6" data-name="Group 6" transform="translate(1.066 0.5)">
                                            <g id="Group_5" data-name="Group 5">
                                                <path id="Path_25" data-name="Path 25" d="M0-66l6.192,7.45L0-51.1H3.955l6.193-7.45L3.956-66Z" transform="translate(0.001 66)" fill="none" stroke="#fec10d" stroke-width="1"/>
                                            </g>
                                        </g>
                                    </svg>

                                    <a href="<?php /*echo esc_url( $category_link ); */?>"><?php /*echo esc_html($category_name); */?></a>
                                </li>
								<?php
/*							}
							*/?>
                        </ul>
                    </div>
                </div>
				--><?php
/*			}*/

			if ( have_posts() ) : ?>

                <div class="post-grid-container row g-5">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
                        echo '<div class="col-md-6 col-lg-4">';
						get_template_part( 'template-parts/content', get_post_type() );
                        echo '</div>';

					endwhile;
					?>
                </div>

			<?php else : ?>
                <div class="row">
                    <div class="col-lg-6">
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
                    </div>
                </div>
			<?php endif; ?>
            <div class="pagination-wrapper mt-50 d-flex justify-content-center">
				<?php

				$icon = '<svg xmlns="http://www.w3.org/2000/svg" width="15.032" height="22.069" viewBox="0 0 15.032 22.069">
                              <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                                <g id="Group_5" data-name="Group 5">
                                  <path id="Path_25" data-name="Path 25" d="M0-66,9.171-54.966,0-43.932h5.86l9.172-11.034L5.859-66Z" transform="translate(0.001 66)" fill="#fff"/>
                                </g>
                              </g>
                            </svg>';

				global $wp_query; // you can remove this line if everything works for you

				// don't display the button if there are not enough posts
				if ( $wp_query->max_num_pages > 1 ) {
					echo '<div class="ifchor_loadmore">' . $icon . '<span class="button-text">' . esc_html__( 'Load More', 'ifchor' ) . '</span></div>';
				} // you can use <a> as well
				?>
            </div>
        </div>
    </div>
<?php
get_footer();
