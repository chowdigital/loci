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

        <h1>food & drink</h1>

    </div>



    <section id="menuBlocks" class="image-content-blocks">

        <div class="menu-content-block">

            <div class="content-block bg-craft navy-overlay block-left">
                <div class="inner-content-block sticky ">
                    <?php 
// Setup the query for the 'menus' custom post type
$custom_query = new WP_Query(array(
  'post_type' => 'menus', // Corrected to match the registered post type name
  'post_status' => 'publish',
  'orderby' => 'date',
  'order' => 'ASC',
  'posts_per_page' => -1, // Load all posts
));

// Check if the query returns any posts
if ($custom_query->have_posts()) : 
    // Initialize tab index
    $tabIndex = 0;
    ?>
                    <ul class="nav nav-tabs" role="tablist">
                        <?php
    // Loop through the posts to create tabs
    while ($custom_query->have_posts()) : $custom_query->the_post();
        // Use the post ID to create a unique tab ID
        $tabId = 'simple-tab-' . get_the_ID();
        ?>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?php echo ($tabIndex === 0) ? 'active' : ''; ?>"
                                id="<?php echo $tabId; ?>" data-bs-toggle="tab" href="#<?php echo $tabId; ?>-panel"
                                role="tab" aria-controls="<?php echo $tabId; ?>-panel"
                                aria-selected="<?php echo ($tabIndex === 0) ? 'true' : 'false'; ?>">
                                <h2><?php the_title(); ?></h2>
                            </a>
                        </li>
                        <?php 
        $tabIndex++;
    endwhile;
    ?>
                    </ul>
                </div>
            </div>
            <div class="content-block bg-craft block-right">


                <div class="inner-content-block tab-content menu-tab">
                    <?php
    // Reset post data and tab index for creating tab panels
    $custom_query->rewind_posts();
    $tabIndex = 0;

    // Loop through the posts again to create tab panels
    while ($custom_query->have_posts()) : $custom_query->the_post();
        $tabId = 'simple-tab-' . get_the_ID();
        ?>
                    <div class="tab-pane fade <?php echo ($tabIndex === 0) ? 'show active' : ''; ?>"
                        id="<?php echo $tabId; ?>-panel" role="tabpanel" aria-labelledby="<?php echo $tabId; ?>">
                        <h1><?php the_title(); ?></h1>
                        <div><?php the_content(); ?></div>
                    </div>
                    <?php
        $tabIndex++;
    endwhile;
    ?>
                </div>
                <?php
endif; 
?>


            </div>
        </div>




    </section>

</main><!-- #main -->

<?php
get_footer();