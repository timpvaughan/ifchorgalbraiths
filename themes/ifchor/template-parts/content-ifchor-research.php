
<article id="post-<?php the_ID(); ?>" <?php post_class( [ 'post-grid col-md-6 col-lg-4' ] ); ?> data-aos="fade-up">
	<?php ifchor_post_thumbnail(); ?>
    <header class="entry-header">
		<?php
        if( get_post_type() == 'ifchor-research' ) {
            $categories = get_the_terms( get_the_ID(), 'ig-category' );
        } else {
            $categories = get_the_terms(get_the_ID(), 'category');
        }

		if (!is_wp_error($categories) && is_array($categories) && sizeof($categories) > 0 ) {
			echo '<div class="entry-category">';
			echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '" class="entry-category">' . esc_html( $categories[0]->name ) . '</a>';
			echo '</div>';
		}
		?>
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <//?php
        $content = get_the_content();
        // Trim the content to a certain number of characters
        $trimmed_content = wp_trim_words( $content, 12, '' );

        echo $trimmed_content;
        ?//>

        <?php the_excerpt(); ?>

    </div><!-- .entry-content -->


    <a href="<?php the_permalink(); ?>" class="post-readmore">
        <span class="btn-icon">
            <svg id="Group_25" data-name="Group 25" xmlns="http://www.w3.org/2000/svg" width="9.403" height="13.805"
                 viewBox="0 0 9.403 13.805">
                <g id="Group_6" data-name="Group 6" transform="translate(0 0)">
                    <g id="Group_5" data-name="Group 5">
                        <path id="Path_25" data-name="Path 25" d="M0-66l5.737,6.9L0-52.2H3.665L9.4-59.1,3.665-66Z"
                              transform="translate(0.001 66)" fill="#fff"/>
                    </g>
                </g>
            </svg>
        </span>
        <span><?php echo __( 'Read more', 'ifchor' ); ?></span>
    </a>

</article><!-- #post-<?php the_ID(); ?> -->
