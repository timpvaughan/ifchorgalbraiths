<?php
get_header();

?>
    <div id="main-content-wrapper" class="blog-details">
        <div class="container">
            <div class="row">
               
                <div class="col-lg-9">
					<?php
					while ( have_posts() ):
						the_post();

						get_template_part( 'template-parts/content', 'jobs' );

					endwhile; // End of the loop.
					?>
                </div>
            </div>

        </div>
    </div>
<?php
get_footer();
