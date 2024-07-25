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
                            <a class="nav-link" id="<?php echo $tabId; ?>" data-bs-toggle="tab"
                                href="#<?php echo $tabId; ?>-panel" role="tab"
                                aria-controls="<?php echo $tabId; ?>-panel">
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
                    <div class="default-message">
                        <h2>Choose a menu</h2>
                    </div>
                    <?php
                    $custom_query->rewind_posts();
                    $tabIndex = 0;

                    while ($custom_query->have_posts()) : $custom_query->the_post();
                        $tabId = 'simple-tab-' . get_the_ID();
                    ?>
                    <div class="tab-pane fade" id="<?php echo $tabId; ?>-panel" role="tabpanel"
                        aria-labelledby="<?php echo $tabId; ?>">
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
    const tabPaneContainer = document.querySelector('.tab-content');
    const defaultMessage = document.querySelector('.default-message');

    const calculateHeightWithPadding = (element) => {
        return element.scrollHeight * 1.2;
    };

    const showTabContent = (tab) => {
        const target = tab.getAttribute('href');
        const targetContent = document.querySelector(target);

        // Temporarily set the target content to display block to measure its height
        targetContent.style.display = 'block';
        const targetHeight = calculateHeightWithPadding(targetContent);
        targetContent.style.display = '';

        // Remove active class from all tabs
        tabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');

        // Hide all tab content with animation
        tabContent.forEach(content => {
            if (content.classList.contains('show')) {
                content.classList.remove('show', 'fade-in');
                content.classList.add('fade-out');
                setTimeout(() => {
                    content.style.display = 'none';
                }, 500); // Match the CSS transition duration
            }
        });

        // Hide the default message
        defaultMessage.style.display = 'none';

        // Set the height of the container to the target height
        tabPaneContainer.style.height = `${targetHeight}px`;

        // Show the target tab content with animation
        setTimeout(() => {
            targetContent.style.display = 'block';
            targetContent.classList.remove('fade-out');
            targetContent.classList.add('show', 'fade-in');
        }, 500); // Small delay to trigger the transition after the fade-out
    };

    tabs.forEach(tab => {
        tab.addEventListener('click', (event) => {
            event.preventDefault();
            showTabContent(tab);
        });
    });

    // Initial state: show the default message
    tabPaneContainer.style.height = `${calculateHeightWithPadding(defaultMessage)}px`;
});
</script>

<?php
get_footer();
?>