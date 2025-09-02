<div id="banner-section" class="banner-section py-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner">
					<?php
					$tag          = ( 'post' == get_post_type() && is_single() ) ? 'h2' : 'h1';
					$banner_title = __( 'Latest News', 'ifchor' );
					if ( is_page() && is_singular() ) {
						$banner_title = get_the_title();
					}
					if ( is_search() ) {
						$banner_title = __( 'Search', 'ifchor' );
					}
					if ( is_archive() ) {
						$banner_title = __( 'Archive', 'ifchor' );
					}

					if ( 'management-team' == get_post_type() ) {
						$banner_title = __( 'Management Team', 'ifchor' );
					}

                    echo sprintf( '<%1$s class="banner__title">%2$s</$1$s>', $tag, esc_html( $banner_title ) );
					?>
                </div>
            </div>
        </div>
    </div>
</div>