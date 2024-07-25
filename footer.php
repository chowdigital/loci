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



<?php if ( is_page_template( 'template-loci.php' ) ) : ?>
<footer class="d-none">
    <?php else : ?>
    <footer class="bg-craft"> <?php endif;  ?>
        <section class="bg-craft highlight-overlay">

            <div class="news-signup text-center p-2 pt-5 pb-5 col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <h2>NEWSLETTER SIGN UP</h2>
                <p>Be the first to hear about upcoming news, events and offers.</p>
                <?php get_template_part( 'template-parts/mail-chimp', get_post_type() ); ?>

            </div>

        </section>

        <section class="footer container-fluid">

            <div class="row p-3 p-md-5 pb-0">
                <div class="col-12 col-sm-6 col-lg-3 mb-5">
                    <?php
							$days_of_week = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
							$contact_info_fields = array('address', 'map','phone', 'email', 'instagram');

							?>

                    <ul class="opening-times-list">
                        <li>
                            <h3>Opening Times</h3>

                        </li>

                        <?php foreach ($days_of_week as $day) : ?>
                        <?php $opening_time = get_theme_mod('opening_times_' . $day, 'Closed'); ?>
                        <li><?php echo strtoupper(substr($day, 0, 1)) . ': ' . esc_html($opening_time); ?></li>
                        <?php endforeach; ?>

                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 mb-5">
                    <ul class="opening-times-list">
                        <li>
                            <h3>Kitchen Times</h3>


                        </li>


                        <?php foreach ($days_of_week as $day) : ?>
                        <?php $opening_time_kitchen = get_theme_mod('opening_times_kitchen_' . $day, 'Closed'); ?>
                        <li><?php echo strtoupper(substr($day, 0, 1)) . ': ' . esc_html($opening_time_kitchen); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 mb-5">
                    <ul class="opening-times-list">
                        <li>
                            <h3>Contact</h3>
                        </li>

                        <?php
                            $phone_value = get_theme_mod('contact_info_phone');
                            $email_value = get_theme_mod('contact_info_email');
                            $instagram_value = get_theme_mod('contact_info_instagram');
                            ?>

                        <li><a
                                href="<?php if ($phone_value) : echo 'tel:' . esc_html($phone_value); endif; ?>"><?php if ($phone_value) : echo esc_html($phone_value); endif; ?></a>
                        </li>
                        <li><a
                                href="<?php if ($email_value) : echo 'mailto:' . esc_html($email_value); endif; ?>"><?php if ($email_value) : echo esc_html($email_value); endif; ?></a>
                        </li>
                        <li><a target="_blank"
                                href="<?php if ($instagram_value) : echo esc_html($instagram_value); endif; ?>">Instagram</a>
                        </li>


                    </ul>
                </div>


                <div class="col-12 col-sm-6 col-lg-3 mb-5">
                    <ul class="opening-times-list">
                        <li>
                            <h3>Location</h3>
                        </li>

                        <?php
                           $address_value = get_theme_mod('contact_info_address');
                            $map_value = get_theme_mod('contact_info_map');
                            ?>
                        <li><?php  if ($address_value) : echo 'Address: <br> ' . esc_html($address_value); endif; ?>
                        <li><a target="blank" href="<?php if ($map_value) : echo esc_html($map_value); endif; ?>">Open
                                in Google
                                Maps</a>
                        </li>
                    </ul>
                </div>






                <div class="col-12 col-xs-3 col-md-2 v-center pb-2 text-center pb-3">

                    <a id="loci-logo" href="<?php echo network_home_url('/'); ?>"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/logos/loci.png" alt=""></a>
                </div>
                <div class="col-12 col-xs-6 col-md-8 ">
                    <div class="row" style="height: 100%;">
                        <div class="col-12 col-lg-4 text-center v-center pb-2"><a
                                href="<?php echo network_home_url(); ?>/privacy-policy/">Privacy Policy</a></div>
                        <div class="col-12 col-lg-4 text-center v-center pb-2"><a
                                href="<?php echo network_home_url(); ?>/cookie-policy/">Cookie Policy</a></div>
                        <div class="col-12 col-lg-4 text-center v-center pb-2"><a
                                href="<?php echo network_home_url(); ?>/work-with-us/">Work with us</a></div>
                    </div>
                </div>
                <div class="col-12 col-xs-3 col-md-2 text-center v-center pb-2">
                    <h4>loci pubs 2023</h4>
                </div>
        </section>
        <!-- Cloudsdale -->
        <div class="text-center" style="background: #000;">
            <a href="https://cloudsdale.co.uk/"> Resteraunt web design by Sean Cloudsdale <img class="m-2"
                    src="https://cloudsdale.co.uk/wp-content/themes/Cloudsdale_2.0/assets/img/cloudsdale_logo.svg"
                    alt="Cloudsdale" style="height:20px">
        </div></a>
        </div>

    </footer>
    </div><!-- #page -->

    <?php wp_footer(); ?>


    </body>

    </html>