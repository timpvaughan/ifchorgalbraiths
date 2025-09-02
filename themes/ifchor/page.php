<?php
get_header();

?>
    <div id="main-content-wrapper" class="main-content-wrapper py-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <main id="primary" class="site-main">

						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'page' );

						endwhile; // End of the loop.
						?>

                    </main><!-- #main -->
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
