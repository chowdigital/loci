<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package  cloudsdale-theme
 */

get_header();
?>

<main id="primary" class="site-main pt-6 pb-6 bg-craft blue-overlay">
<div class="container pt-5">
		



 

	
	<div class="row">

		<div class="col-12 col-lg-6">
		<h1 class="H! pb-5 pt-5 mt-5" style="color: #dfc797;" >Oh no, page not found</h1>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/404-bot.png" alt="404 Robot" class="img-fluid">
		
		</div>	
		<div class="col-12 col-lg-6"> 
		<h4 class="mt-5 pt-5" style="color: #dfc797;">Which Page were you looking for?</h4>
					<a style="color: #dfc797;" href="<?php get_home_url() ?>">Home</a><br>
					<a style="color: #dfc797;" href="<?php get_home_url() ?>/about-us/">About</a><br>
					<a style="color: #dfc797;" href="<?php get_home_url() ?>/whats-on">What's On</a><br>
					<a style="color: #dfc797;" href="https://resy.com/cities/ldn/the-clifton-nw8">Book</a>
			
		
		</div>	
	</div>

	



	</div>

	</main><!-- #main -->

<?php
get_footer();
