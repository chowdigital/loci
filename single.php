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

<main id="blog-main" class="bg-craft pink-overlay">
	<section class="blog-container bg-craft container pt-6 pb-6">



		<div class="post-thumb " style="background-image: url(<?php the_post_thumbnail_url(); ?>); background-repeat: no-repeat; background-position: center; background-size: cover;"></div>



		
			
			<div class="blog-content">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				

				

			endwhile; // End of the loop.
			?>
			
			

		</div>

	</section>
		
	</main><!-- #main -->

<?php
get_footer();
