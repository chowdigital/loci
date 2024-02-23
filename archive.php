<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cloudsdale_Theme
 */

get_header();
?>

<main id="primary" class="bg-craft highlight-overlay">
    <?php
$whats_on_image = get_theme_mod('whats_on_page_image');
if ($whats_on_image) {
    // Use the image URL as a background image
    echo '<div style="background-image: url(\'' . esc_url($whats_on_image) . '\'); background-repeat: no-repeat; background-position: center center; background-size: cover;" class="page-head-img">';
    echo '<h1>What\'s On</h1>';
    echo '</div>';
}
?>





    <section id="whatsOnBlocks" class="image-content-blocks">


        <!--- my loop with Pagenation -->
        <?php 
$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;

$custom_query = new WP_Query(array(
  'post_status' => 'publish',
  'orderby' => 'menu_order', 
  'cat' => 1,
  'posts_per_page' => 8,
  'paged' => $paged,
));

if ($custom_query->have_posts()) : 
  while ($custom_query->have_posts()) : $custom_query->the_post();
?>
        <div class="image-content-block">
            <div class="image-block"
                style="background-image:  url('<?php the_post_thumbnail_url(); ?>'); background-repeat: no-repeat; background-position: center; background-size: cover;">


            </div>
            <div class="content-block bg-craft navy-overlay">
                <div class="inner-content-block">
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_excerpt(); ?></p>

                    <div class="text-center">
                        <a class="text-link" href="<?php echo get_permalink() ?>">
                            Read More</a>
                    </div>

                </div>
            </div>
        </div>
        <?php 
  endwhile; 
 
  // Custom Pagination Output
  if ($custom_query->max_num_pages > 1) : // Check if there's more than one page 
  ?>
        <div class="paginate-links">
            <div class="alignleft"><?php previous_posts_link('← Previous Page', $custom_query->max_num_pages); ?></div>
            <div class="alignright"><?php next_posts_link('Next Page  →', $custom_query->max_num_pages); ?></div>
        </div>
        <?php 
  endif; 
  ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </section>

</main><!-- #main -->

<?php
get_footer();