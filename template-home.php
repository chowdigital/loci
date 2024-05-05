<?php /* Template Name: Home */ get_header(); ?>

<!-- Full Page Intro -->

<div class="container-fluid"
    style="height: 100vh; background-image:  url(<?php the_post_thumbnail_url(); ?>); background-repeat: no-repeat; background-position: center; background-size: cover;">
    <div class="col-12 text-center clifton-crest row">


        <div class="col-12 text-center clifton-crest">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/william/TheWilliam_SwingSign_2a.png"
                alt="The William Logo" style>
        </div>


    </div>


</div>




<main class="bg-craft highlight-overlay">

    <section class="image-content-blocks">
        <div class="image-content-block">
            <div class="image-block"
                style="background-image:  url('<?php echo get_post_meta( $post->ID, 'hero_item_1_metabox_image_url', true ); ?>'); background-repeat: no-repeat; background-position: center; background-size: cover;">
            </div>
            <div class="content-block bg-craft navy-overlay">
                <div class="inner-content-block">
                    <h2><?php echo get_post_meta( $post->ID, 'hero_item_1_metabox_headline', true ); ?></h2>
                    <p><?php echo get_post_meta( $post->ID, 'hero_item_1_metabox_body_copy', true ); ?></p>
                    <div class="text-center">
                        <a class="text-link"
                            href="<?php echo get_post_meta( $post->ID, 'hero_item_1_metabox_button_link', true ); ?>">
                            <?php echo get_post_meta( $post->ID, 'hero_item_1_metabox_button_text', true ); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="image-content-block switch-block">
            <div class="image-block"
                style="background-image:  url('<?php echo get_post_meta( $post->ID, 'hero_item_2_metabox_image_url', true ); ?>'); background-repeat: no-repeat; background-position: center; background-size: cover;">
            </div>
            <div class="content-block bg-craft navy-overlay">
                <div class="inner-content-block">
                    <h2><?php echo get_post_meta( $post->ID, 'hero_item_2_metabox_headline', true ); ?></h2>
                    <p><?php echo get_post_meta( $post->ID, 'hero_item_2_metabox_body_copy', true ); ?></p>
                    <div class="text-center pb-3">
                        <a class="text-link"
                            href="<?php echo get_post_meta( $post->ID, 'hero_item_2_metabox_button_link', true ); ?>">
                            <?php echo get_post_meta( $post->ID, 'hero_item_2_metabox_button_text', true ); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="image-content-block">
            <div class="image-block"
                style="background-image:  url('<?php echo get_post_meta( $post->ID, 'hero_item_3_metabox_image_url', true ); ?>'); background-repeat: no-repeat; background-position: center; background-size: cover;">
            </div>
            <div class="content-block bg-craft navy-overlay">
                <div class="inner-content-block">
                    <h2><?php echo get_post_meta( $post->ID, 'hero_item_3_metabox_headline', true ); ?></h2>
                    <p><?php echo get_post_meta( $post->ID, 'hero_item_3_metabox_body_copy', true ); ?></p>
                    <div class="text-center">
                        <a class="text-link"
                            href="<?php echo get_post_meta( $post->ID, 'hero_item_3_metabox_button_link', true ); ?>">
                            <?php echo get_post_meta( $post->ID, 'hero_item_3_metabox_button_text', true ); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- History -->
    <section class="row">
        <div class="col-12 history-block"
            style="background-image: url('http://locipubs.com/wp-content/uploads/2024/02/JSP.LOC_.05.12.23-49-scaled-1.png'); background-repeat: no-repeat; background-position: center; background-size: cover;">
            <div class="history-block-inner" style="filter: none;">
                <h2>History</h2>
                <p><?php echo get_post_meta( $post->ID, 'history', true ); ?></p>
            </div>
        </div>
    </section>
    <!-- Gallery -->
    <section>
        <div class="row">
            <?php
            for ($i = 1; $i <= 8; $i++) {
                $image_url = get_post_meta( $post->ID, 'gallery_image_' . $i, true );
                if (!empty($image_url)) {
                    echo '<div class="col-6 col-md-3 square-img" style="background-image: url(\'' . $image_url . '\');"></div>';
                }
            }
        ?>
        </div>
    </section>

</main>
<?php get_footer(); ?>