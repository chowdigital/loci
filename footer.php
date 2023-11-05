<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cloudsdale_Theme
 */

?>
<footer class="container-fluid">
    <div class="footer bg-craft blue-overlay row">
        <div class="col-12 footer-logo text-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/logos/clifton_primary3.png" alt="Cifton Logo"
                style>
        </div>
        <div class="col-12">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xl-3 mb-5">
                        <h3>Join the Club</h3>
                        <?php get_template_part( 'template-parts/mail-chimp', get_post_type() ); ?>


                    </div>
                    <div class="col-12 col-md-4  col-lg-4 col-xl-3 mb-5">
                        <?php
							$days_of_week = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
							$contact_info_fields = array('address', 'phone', 'email', 'facebook', 'instagram');

							?>

                        <ul class="opening-times-list">
                            <li>
                                <h5>Opening Times</h5>
                            </li>

                            <?php foreach ($days_of_week as $day) : ?>
                            <?php $opening_time = get_theme_mod('opening_times_' . $day, 'Closed'); ?>
                            <li><strong><?php echo ucfirst($day) . ':</strong> <br> ' . esc_html($opening_time); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-12 col-md-8 col-lg-4 col-xl-3 mb-5">
                        <ul class="opening-times-list">
                            <li>
                                <h5>Kitchen Times</h5>
                            </li>

                            <?php foreach ($days_of_week as $day) : ?>
                            <?php $opening_time_kitchen = get_theme_mod('opening_times_kitchen_' . $day, 'Closed'); ?>
                            <li><strong><?php echo ucfirst($day) . ':</strong> <br> ' . esc_html($opening_time_kitchen); ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-4 col-xl-3 mb-5">
                        <ul class="opening-times-list">
                            <li>
                                <h5>Contact</h5>
                            </li>

                            <?php foreach ($contact_info_fields as $info_field) : ?>
                            <?php $info_value = get_theme_mod('contact_info_' . $info_field); ?>
                            <li><strong><?php echo ucfirst($info_field) . ':</strong> <br> ' . esc_html($info_value); ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="text-center bg-craft p-3">
            <a id="loci-logo" href=""><img src="<?php echo get_template_directory_uri(); ?>/assets/logos/loci.png"
                    alt=""></a>
        </div>
        <!-- Cloudsdale -->
        <div class="text-center" style="background: #000;">
            <a href="https://cloudsdale.co.uk/"> <img class="m-2"
                    src="https://cloudsdale.co.uk/wp-content/themes/Cloudsdale_2.0/assets/img/cloudsdale_logo.svg"
                    alt="Cloudsdale" style="height:20px">
        </div></a>
    </div>

</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>