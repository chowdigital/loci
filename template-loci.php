<?php /* Template Name: loci */ get_header(); ?>

<!-- Full Page Intro -->

<div class="comtaner-fluid bg-craft" style="min-height: 100vh; ">
    <div class="container loci-container">
        <div class="col-12 text-center loci-logo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/logos/loci.png" alt="Cifton Logo" style>
        </div>
        <div class="intro-loci">
            <h2>Lovingly Restored Local Pubs</h2>
            <p>

                Loci Pubs was founded by brothers Ben and Ed Robson, and their childhood friend Adam Gostyn. After years
                spent working at the heart of London hospitality, they aspired to find once-loved pubs and transform
                them into proper locals, with exceptional food.</p>
        </div>
        <div class="loci-pubs">


            <a href="<?php echo get_home_url()?>/william">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logos/TheWilliam_horizontalLogo&Tagline_1a.png"
                    alt="Cifton Logo" style>
            </a>
            <a href="https://thedukeofhamiltonnw3.com/" class="">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logos/TheDuke_HorizontalLogo&Tagline_1a.png"
                    alt="Cifton Logo" style>
            </a>
            <a href="https://thealliancenw6.com/" class="">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logos/TheAlliance_HorizontalLogo&Tagline_1a.png"
                    alt="Cifton Logo" style>
            </a>
            <a href="https://thecliftonnw8.com/" class="clifton-link">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logos/TheClifton_HorizontalLogo&Tagline_1a.png"
                    alt="Cifton Logo" style>
            </a>
        </div>
    </div>
</div>

</main>
<?php get_footer(); ?>