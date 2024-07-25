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
            <img src="<?php echo get_template_directory_uri(); ?>/assets/william/TheWilliam_SwingSign_2a.png"
                alt="The William Logo" style>
        </div>
    </div>
    <?php endif;  ?>


    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="#primary"><?php esc_html_e( 'Skip to content', 'cloudsdale-master' ); ?></a>



        <header id="masthead" class="site-header" <?php if ( is_page_template( 'template-loci.php' ) ) : ?>>
            <nav id="site-navigation" class="d-none">
                <?php else : ?>
                <nav id="site-navigation" class="main-navigation fixed-top">
                    <?php endif;  ?>
                    <div id="navbar" class="cm-nav bg-craft navy-overlay shadow container-fluid">
                        <a id="menuToggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasNav">
                            <div id="menuIcon"></div>
                        </a>
                        <a id="navbrand" class="navbar-brand navbrand d-none d-md-block"
                            href="<?php echo esc_url( home_url( '' ) ); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/logos/TheWilliam_horizontalLogo_1b.png"
                                alt="Cifton Logo" style>
                        </a>
                        <div id="bookBtn" class="nav-btn">
                            <a target="blank" href="https://beds24.com/booking2.php?propid=54979" class="main-nav-link"
                                role="button"><span class="d-none d-lg-inline">Book </span>Rooms</a>
                            <a class="main-nav-link" role="button" id="openModal"><span
                                    class="d-none d-lg-inline">Book</span> Food</a>
                        </div>

                        <!-- The Modal -->
                        <div id="myModal" class="modal">
                            <div class="modal-content">
                                <span class="close" id="closeModal" style="margin-bottom:5px;">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="12" fill="currentColor" />
                                        <path d="M15 9L9 15" stroke="#285a5b" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M9 9L15 15" stroke="#285a5b" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <script type='text/javascript'
                                    src='//www.opentable.co.uk/widget/reservation/loader?rid=166533&type=standard&theme=tall&color=1&dark=false&iframe=false&domain=couk&lang=en-GB&newtab=true&ot_source=Restaurant%20website&cfe=true'>
                                </script>
                            </div>
                        </div>
                    </div>


    </div>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNav" aria-labelledby="offcanvasNavLabel"
        data-bs-scroll="true">
        <div class="close-box">
            <a class="menu-toggle" data-bs-dismiss="offcanvas" aria-label="Close">
                <div id="menuIconClose"></div>
            </a>
        </div>

        <div class="offcanvas-body bg-craft">

            <a id="pub-logo" href="<?php echo esc_url( home_url( '/william' ) ); ?>">
                <img class="d-none d-md-inline"
                    src="<?php echo get_template_directory_uri(); ?>/assets/william/TheWilliam_horizontalLogo_2b.png"
                    alt="The William Logo" style="">
                <img class="d-md-none"
                    src="<?php echo get_template_directory_uri(); ?>/assets/william/TheWilliam_verticalLogo_2b.png"
                    alt="The William Logo" style=""></a>
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

            <a id="pub-crest" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img
                    src="<?php echo get_template_directory_uri(); ?>/assets/william/TheWilliam_Crest_2b.png"
                    alt="The William Logo" style="width:200px;"></a>
        </div>

    </div>
    </nav><!-- #site-navigation -->

    </header><!-- #masthead -->

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var navLinks = document.querySelectorAll('.nav-link');
        var offcanvasNav = document.getElementById('offcanvasNav');

        navLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                var offcanvasInstance = bootstrap.Offcanvas.getInstance(offcanvasNav);
                if (offcanvasInstance) {
                    offcanvasInstance.hide();
                }
            });
        });
    });
    </script>