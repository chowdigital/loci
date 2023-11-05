<?php /* Template Name: Gallery */ get_header(); ?>


<main id="gallery-main" class="bg-dot">
<section class="page-container container">
<div class="light-header text-center">
        <h2>Gallery</h2>
      </div>

      <?php
                the_content(
                    sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cloudsdale-theme' ),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        wp_kses_post( get_the_title() )
                    )
                );

                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cloudsdale-theme' ),
                        'after'  => '</div>',
                    )
                );
                ?>



            </section>
</main>
 
<?php get_footer(); ?>


