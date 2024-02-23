<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Cloudsdale_Theme
 */

get_header();
?>

<main id="" class="bg-craft highlight-overlay">





    <section class="row bg-craft navy-overlay">
        <div class="page-head-img"
            style="background-image: url(<?php the_post_thumbnail_url(); ?>); background-repeat: no-repeat; background-position: center; background-size: cover;">

        </div>
        <div class="devide-line bg-craft highlight-overlay"></div>
        <div class="col-12 wide-block">
            <div class="wide-block-inner">
                <?php
						the_title( '<h1 class="entry-title pb-5">', '</h1>');
						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cloudsdale-master' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post( get_the_title() )
							)
						);

	
		?>



            </div>

        </div>

    </section>



</main><!-- #main -->

</header><!-- .entry-header -->




</article><!-- #post-<?php the_ID(); ?> -->

<?php
get_footer();