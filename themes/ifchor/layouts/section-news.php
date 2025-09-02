<?php
$args = [
	'post_type'      => [ 'post' ],
	'post_status'    => [ 'publish' ],
	'posts_per_page' => '-1',
	'meta_key'       => '_display_in_news_slider',
	'meta_value'     => true,
	'order'          => 'DESC',
	'orderby'        => 'date',
];

$news_query = new WP_Query( $args );

if ( $news_query->have_posts() ):
	?>
    <div id="news-section" class="news-section py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div id="keen-news" class="keen-slider news" style="max-width: 100%;">
						<?php
						while ( $news_query->have_posts() ):
							$news_query->the_post();
							$post_id   = get_the_ID();
							$image_url = get_the_post_thumbnail_url( $post_id, 'ifchor_thumbnail_600_900' );
							?>
                            <div class="keen-slider__slide number-slide">
                                <div class="news__item">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" />
                                        <div class="news__overlay">
                                            <h2>
                                                <a href="<?php echo get_permalink(); ?>"><?php echo esc_html( get_the_title() ); ?></a>
                                            </h2>
                                            <div class="blank">
                                                <a href="<?php echo get_permalink(); ?>" class="btn read-more-btn"><span><?php echo __( 'Read more', 'ifchor' ); ?></span></a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
						<?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
	<?php
	wp_reset_postdata();
endif;
?>