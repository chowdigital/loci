<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cloudsdale_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php if ( is_page_template( 'template-loci.php' ) ) : ?>
    <div id="loading" class="bg-craft blue-overlay">
        <div class="col-12 text-center clifton-crest">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/logos/loci.png" alt="Loci Logo" style>
        </div>
    </div>
    <?php else : ?>
    <div id="loading" class="bg-craft navy-overlay">
        <div class="col-12 text-center clifton-crest">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/logos/TheWilliam_SwingSign_2a.png"
                alt="The William Logo" style>
        </div>
    </div>
    <?php endif;  ?>


    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="#primary"><?php esc_html_e( 'Skip to content', 'cloudsdale-master' ); ?></a>



        <header id="masthead" class="site-header">



            <?php if ( is_page_template( 'template-loci.php' ) ) : ?>
            <nav id="site-navigation" class="d-none">
                <?php else : ?>
                <nav id="site-navigation" class="main-navigation fixed-top">
                    <?php endif;  ?>
                    <nav id="site-navigation" class="main-navigation fixed-top">
                        <div id="navbar" class="cm-nav bg-craft navy-overlay shadow container-fluid">

                            <!--  <a id="menuToggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasNav">
                        <div id="menuIcon"></div>
                    </a> -->
                            <a id="navbrand" class="navbar-brand navbrand"
                                href="<?php echo esc_url( home_url( '/william' ) ); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/logos/TheWilliam_horizontalLogo_1b.png"
                                    alt="Cifton Logo" style>
                            </a>
                            <div id="bookBtn" class="nav-btn">
                                <a href="https://resy.com/cities/ldn/the-william" class="nav-link" role=" button"><span
                                        class="d-none d-lg-inline">
                                        Book </span>Rooms</a>
                            </div>
                            <!--   <div id="bookBtn2" style="top: 20px; transition-delay: 0.1s;">
                                    <a href="https://beds24.com/booking2.php?propid=54979"
                                        class="btn btn-primary a-hover" role="button"><span class="d-none d-lg-inline">
                                            Book a </span>Room</a>
                                </div> -->
                        </div>
                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNav"
                            aria-labelledby="offcanvasNavLabel">

                            <div class="offcanvas-header bg-craft blue-overlay">
                                <a id="clifton-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/logos/TheWilliam_horizontalLogo_1b.png"
                                        alt="Cifton Logo" style=""></a>
                                <a class="" data-bs-dismiss="offcanvas" aria-label="Close">
                                    <div id="menuIconClose"></div>
                                </a>
                            </div>
                            <div class="offcanvas-body bg-craft">
                                <?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'container'      => 'div',
									'menu_class'     => 'navbar-nav',
									
								)
							);
							?>
                            </div>
                            <div class="modal-footer-logo bg-craft">
                                <a id="loci-logo" href=""><img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/logos/loci.png"
                                        alt=""></a>
                            </div>
                        </div>
                    </nav><!-- #site-navigation -->

        </header><!-- #masthead -->