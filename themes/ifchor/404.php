<?php
get_header();
?>
    <div id="error-page" class="error-page py-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <main id="primary" class="site-main">

                        <section class="error-404 not-found">
                            <header class="page-header">
                                <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'ifchor' ); ?></h1>
                            </header><!-- .page-header -->

                            <div class="page-content">
                                <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'ifchor' ); ?></p>

								<?php get_search_form(); ?>
                            </div><!-- .page-content -->
                        </section><!-- .error-404 -->

                    </main><!-- #main -->

                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
