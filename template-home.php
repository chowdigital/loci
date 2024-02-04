<?php /* Template Name: Home William */ get_header(); ?>

<!-- Full Page Intro -->

<div class="container-fluid"
    style="height: 100vh; background-image:  url(<?php the_post_thumbnail_url(); ?>); background-repeat: no-repeat; background-position: center; background-size: cover;">
    <div class="col-12 text-center clifton-crest row">

        <div class="col-12 col-md-10 col-lg-6 bg-craft p-3 border-primary">
            <h2>Full website coming soon</h2>
        </div>

    </div>


</div>



<main class="bg-craft highlight-overlay">

    <section class="image-content-blocks">
        <div class="image-content-block">
            <div class="image-block"
                style="background-image:  url('<?php the_field('hero_1_image'); ?>'); background-repeat: no-repeat; background-position: center; background-size: cover;">


            </div>
            <div class="content-block bg-craft navy-overlay">
                <div class="inner-content-block">
                    <h2><?php the_field('hero_1_title'); ?></h2>
                    <p><?php the_field('hero_1_body'); ?></p>

                    <div class="text-center">
                        <a class="text-link" href="<?php the_field('hero_1_button_link'); ?>">
                            <?php the_field('hero_1_btn_text'); ?></a>
                    </div>

                </div>
            </div>
        </div>
        <div class="image-content-block switch-block">
            <div class="image-block"
                style="background-image:  url('<?php the_field('hero_2_image'); ?>'); background-repeat: no-repeat; background-position: center; background-size: cover;">


            </div>
            <div class="content-block bg-craft navy-overlay">
                <div class="inner-content-block">
                    <h2><?php the_field('hero_2_title'); ?></h2>
                    <p><?php the_field('hero_2_body'); ?></p>
                    <div class="text-center pb-3">
                        <!-- <a class="text-link" href="<?php the_field('hero_2_button_link'); ?>">
                            <?php the_field('hero_2_btn_text'); ?></a> -->
                        <a target="blank" class="text-link"
                            href="http://locipubs.com/wp-content/uploads/2023/12/The-William_DinnerMenu_Sunday-3.12.23.pdf">
                            Sample Menu</a>
                    </div>
                    <div class="text-center pb-3">
                        <a target="blank" class="text-link"
                            href="http://locipubs.com/wp-content/uploads/2023/12/The-William_DinnerMenu_-27.11.23.pdf">
                            Sample Sunday Menu</a>
                    </div>

                </div>
            </div>
        </div>
        <div class="image-content-block">
            <div class="image-block"
                style="background-image:  url('<?php the_field('hero_3_image'); ?>'); background-repeat: no-repeat; background-position: center; background-size: cover;">


            </div>
            <div class="content-block bg-craft navy-overlay">
                <div class="inner-content-block">
                    <h2><?php the_field('hero_3_title'); ?></h2>
                    <p><?php the_field('hero_3_body'); ?></p>

                    <div class="text-center">
                        <a class="text-link" href="<?php the_field('hero_3_button_link'); ?>">
                            <?php the_field('hero_3_btn_text'); ?></a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- History -->
    <section class="row">
        <div class="col-12 history-block"
            style="background-image: url('<?php the_field('photo_1'); ?>'); background-repeat: no-repeat; background-position: center; background-size: cover;">
            <div class="history-block-inner">
                <h2>History</h2>
                <p><?php the_field('hero_3_body'); ?></p>
            </div>

        </div>

    </section>
    <!-- Gallery -->
    <section>
        <div class="row">
            <div class="col-6 col-md-3 square-img" style="background-image: url('<?php the_field('photo_1'); ?>');">
            </div>
            <div class="col-6 col-md-3 square-img" style="background-image: url('<?php the_field('photo_2'); ?>');">
            </div>
            <div class="col-6 col-md-3 square-img" style="background-image: url('<?php the_field('photo_3'); ?>');">
            </div>
            <div class="col-6 col-md-3 square-img" style="background-image: url('<?php the_field('photo_4'); ?>');">
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-md-3 square-img" style="background-image: url('<?php the_field('photo_5'); ?>');">
            </div>
            <div class="col-6 col-md-3 square-img" style="background-image: url('<?php the_field('photo_6'); ?>');">
            </div>
            <div class="col-6 col-md-3 square-img" style="background-image: url('<?php the_field('photo_7'); ?>');">
            </div>
            <div class="col-6 col-md-3 square-img" style="background-image: url('<?php the_field('photo_8'); ?>');">
            </div>
        </div>
    </section>


</main>
<?php get_footer(); ?>