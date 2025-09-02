<?php

/**
 * Displays the header
 *
 * @package WordPress
 * @subpackage Ifchor
 * @since Ifchor 1.0
 */

?>
<header id="masterheader" class="header site-header">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="brand-logo-wrap">
			<?php
			if ( has_custom_logo() ) {
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$custom_logo    = wp_get_attachment_image_src( $custom_logo_id, 'full' );

				echo sprintf( '<a class="desktop-navbar-brand" href="%s"><img class="img-fluid" src="%s" alt="logo" /></a>', esc_url( home_url( '/' ) ), esc_url( $custom_logo[0] ) );
			} else {
				echo sprintf( '<a class="desktop-navbar-brand" href="%s"><img class="img-fluid" src="%s" alt="logo" /></a>', esc_url( home_url( '/' ) ), esc_url( IFCHOR_ASSETS_URI . 'images/logo.svg' ) );
			}
			?>
        </div>

        <div class="site-header-social-links">

			<?php

			if ( has_nav_menu( 'nav-menu' ) ) {
				wp_nav_menu( [
					'theme_location' => 'nav-menu',
					'container'      => false,
					'menu_class'     => 'nav-extranal-link',
					'fallback_cb'    => '__return_false',
					'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'          => 1,
					'walker'         => new bootstrap_5_wp_nav_menu_walker()
				] );
			}

			$social_links = get_field( 'social_links', 'option' );
			$linkedin     = $social_links['linkedin'];
			$facebook     = $social_links['facebook'];
			$twitter      = $social_links['twitter'];
			$instagram    = $social_links['instagram'];

			?>
            <ul class="social-links">
				<?php if ( $linkedin ): ?>
                    <li>
                        <a href="<?php echo esc_url( $linkedin ); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </li>
				<?php endif; ?>

				<?php if ( $facebook ): ?>
                    <li>
                        <a href="<?php echo esc_url( $facebook ); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    </li>
				<?php endif; ?>

				<?php if ( $twitter ): ?>
                    <li>
                        <a href="<?php echo esc_url( $twitter ); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                    </li>
				<?php endif; ?>

				<?php if ( $instagram ): ?>
                    <li>
                        <a href="<?php echo esc_url( $instagram ); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                    </li>
				<?php endif; ?>
            </ul>
        </div>
    </div>
</header>

<div class="site-canvas-menu">
    <div class="burger-menu">
        <div class="burger-menu__icon">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="burger-menu__arrow">
            <svg id="Group_6088" data-name="Group 6088" xmlns="http://www.w3.org/2000/svg" width="21.076"
                 height="30.942" viewBox="0 0 21.076 30.942">
                <g id="Group_6" data-name="Group 6">
                    <g id="Group_5" data-name="Group 5">
                        <path id="Path_25" data-name="Path 25"
                              d="M0-66l12.86,15.471L0-35.058H8.215l12.86-15.471L8.215-66Z"
                              transform="translate(0.001 66)" fill="#fec10d"></path>
                    </g>
                </g>
            </svg>
        </div>
    </div>

    <div class="burger-menu-wrap">

        <div class="burger-menu_toggle arrow-menu">
            <svg id="Group_6088" data-name="Group 6088" xmlns="http://www.w3.org/2000/svg" width="21.076"
                 height="30.942" viewBox="0 0 21.076 30.942">
                <g id="Group_6" data-name="Group 6">
                    <g id="Group_5" data-name="Group 5">
                        <path id="Path_25" data-name="Path 25"
                              d="M0-66l12.86,15.471L0-35.058H8.215l12.86-15.471L8.215-66Z"
                              transform="translate(0.001 66)" fill="#fec10d"/>
                    </g>
                </g>
            </svg>
        </div>

        <div class="side-panel__nav">
			<?php
			if ( has_nav_menu( 'main-menu' ) ) {
				wp_nav_menu( [
					'theme_location' => 'main-menu',
					'menu_class'     => 'offcanvas-nav',
                    'depth' => 2
				] );
			}

			if ( has_nav_menu( 'footer_offcanvas' ) ) {
				wp_nav_menu( [
					'theme_location' => 'footer_offcanvas',
					'container'      => false,
					'menu_class'     => 'footer-menu-lists',
					'depth'          => 1,
				] );
			}
			?>
        </div>
    </div>
</div>