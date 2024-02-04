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
    <div class="page-head-img"
        style="background-image: url('http://locipubs.com/wp-content/uploads/2023/11/269105947.jpg'); background-repeat: no-repeat; background-position: center; background-size: cover;">

        <h1>What's On</h1>

    </div>



    <section id="whatsOnBlocks" class="image-content-blocks">


        <!--- my loop with Pagenation -->
        <?php 
$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;

$custom_query = new WP_Query(array(
  'post_status' => 'publish',
  'orderby' => 'date',
  'order' => 'ASC',
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