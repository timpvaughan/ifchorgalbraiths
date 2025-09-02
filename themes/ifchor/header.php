<!doctype html>
<html <?php language_attributes(); ?>>

<head>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NVRF5D5');</script>
<!-- End Google Tag Manager -->

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<?php if (has_post_thumbnail() ):
		$url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>
		<meta property="og:image" content="<?php echo $url ?>"/>
	<?php endif;?>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CX77JV6Q9P"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-CX77JV6Q9P');
    </script>

</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NVRF5D5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php wp_body_open(); ?>
<div id="ifchor-site" class="site">
    <a class="skip-link screen-reader-text" href="#primary">
		<?php esc_html_e( 'Skip to content', 'ifchor' ); ?>
    </a>

	<?php
	get_template_part( 'template-parts/header/site-header' );

	?>
    <main id="site-conrent" class="site-content">
        <?php

        if(is_front_page() || is_home()){

        }
        else if ( is_singular( 'post' ) || is_singular( 'ifchor-research' ) ) {
            get_template_part( 'template-parts/header/page-header-single' );
        }
        else if ( is_page( array( 'broking', 'sustainability', 'about-us', 'contact-us' ) ) ) {
            get_template_part( 'template-parts/header/page-header-landing' );
        }
        else{
            get_template_part( 'template-parts/header/page-header' );
        }
