<article id="post-<?php the_ID(); ?>" <?php post_class( [ 'post-details-content' ] ); ?>>
    <header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <?php if ( has_excerpt() ) : ?>
            <div class="entry-excerpt">
                <?php the_excerpt(); ?>
            </div>
        <?php endif; ?>
    </header>

	<!--?php ifchor_post_thumbnail(); ?-->

	<?php
        // Get the value of the ACF toggle field, default to true if not set
        $show_feature_image = get_field('show_feature_image');
        
        // If the field is not set, we assume it should be shown
        if ($show_feature_image === null) {
            $show_feature_image = true; // Default value
        }

        // Check if the feature image should be displayed
        if ($show_feature_image) {
            // Display the feature image
            if (has_post_thumbnail()) {
                the_post_thumbnail('full');
            }
        }
        ?>

    <div class="entry-content pt-5">
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
    </div>
</article>
