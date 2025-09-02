<?php
get_header();

?>
<div id="main-content-wrapper" class="main-content-wrapper py-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php if ( have_posts() ) : ?>
                <main id="primary" class="site-main">
                    <div class="post-grid grid-col-3">
                        <?php
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();

									get_template_part( 'template-parts/content', get_post_type() );

								endwhile;
								?>
                    </div>
                </main><!-- #main -->
                <?php else : ?>
                <div class="row">
                    <div class="col-lg-6">
                        <?php get_template_part( 'template-parts/content', 'none' ); ?>
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pagination-wrap d-flex justify-content-center">
                            <?php
								$paginate_args = [
									'prev_text' => __( 'Prev', 'ifchor' ),
									'next_text' => __( 'Next', 'ifchor' ),
								];
								echo paginate_links( $paginate_args );
								?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
