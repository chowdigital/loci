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
    $food_drink_image = get_theme_mod('food_drink_page_image');
    if ($food_drink_image) {
        echo '<div style="background-image: url(\'' . esc_url($food_drink_image) . '\'); background-repeat: no-repeat; background-position: center center; background-size: cover;" class="page-head-img">';
        echo '<h1>Eat & Drink</h1>';
        echo '</div>';
    }
    ?>

    <section id="menuBlocks" class="image-content-blocks">
        <div class="menu-content-block">
            <div class="content-block bg-craft navy-overlay block-left">
                <div class="inner-content-block sticky">
                    <?php 
                    $custom_query = new WP_Query(array(
                        'post_type' => 'menus',
                        'post_status' => 'publish',
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                        'posts_per_page' => -1,
                    ));

                    if ($custom_query->have_posts()) : 
                        $tabIndex = 0;
                    ?>
                    <ul class="nav-tabs nav-tabs-menu" role="tablist">
                        <?php
                            while ($custom_query->have_posts()) : $custom_query->the_post();
                                $tabId = 'simple-tab-' . get_the_ID();
                            ?>
                        <li class="nav-item-menu" role="presentation">
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
                    $custom_query->rewind_posts();
                    $tabIndex = 0;

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
            </div>
            <?php
                endif; 
            ?>
        </div>
    </section>
</main>
<script>
document.addEventListener('DOMContentLoaded', (event) => {
    const tabs = document.querySelectorAll('.nav-link');
    const tabContent = document.querySelectorAll('.tab-pane');

    tabs.forEach(tab => {
        tab.addEventListener('click', (event) => {
            event.preventDefault();
            const target = tab.getAttribute('href');

            // Remove active class from all tabs
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');

            // Hide all tab content
            tabContent.forEach(content => {
                content.classList.remove('show', 'active');
                content.style.display = 'none';
            });

            // Show the target tab content
            const targetContent = document.querySelector(target);
            targetContent.classList.add('show', 'active');
            targetContent.style.display = 'block';
        });
    });

    // Initial active tab setup
    document.querySelector('.nav-link.active').click();
});
</script>
<?php
get_footer();