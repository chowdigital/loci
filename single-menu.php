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

<main id="menu-main" class="bg-craft pink-overlay">

	<section class="menu-container bg-craft container pt-6 pb-6">






		
			
			<div class="menu-content">

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
