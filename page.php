<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();
?>
<div class="bg-craft blue-overlay">
<div class="page-img-header" style="background-image: url('<?php the_post_thumbnail_url(); ?>'); background-repeat: no-repeat; background-position: center; background-size: cover;">

</div>

	<main id="page-main" class="bg-dot">
	
		<section class="page-container bg-craft container">
			<div class="page-content">
			<?php the_title( '<h1 class="">', '</h1>' ); ?>
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

			</div>
		</section>
	
	</main><!-- #main -->
	</div>
<?php
get_footer();
