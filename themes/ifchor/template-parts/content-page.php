<article id="post-<?php the_ID(); ?>" <?php post_class( [ 'post-details' ] ); ?>>

    <div class="entry-content">
		<?php
		the_content();
		wp_link_pages(
			[
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ifchor' ),
				'after'  => '</div>',
			]
		);
		?>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->