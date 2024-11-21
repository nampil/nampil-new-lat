<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod('understrap_container_type');
?>

<?php get_template_part('sidebar-templates/sidebar', 'footerfull'); ?>

<div class="wrapper wrapper-footer" id="wrapper-footer">

    <div class="<?php echo esc_attr($container); ?>">
        <footer class="site-footer" id="colophon">

            <div class="container footer-container">
                <div class="row foter-row">

                    <div class="col-md-4 footer-col d-flex justify-content-start">
                        <div class="footer-logo">
                            <?php if (!has_custom_logo()) { ?>

                            <?php if (is_front_page() && is_home()) : ?>

                            <h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url(home_url('/')); ?>"
                                    title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" itemprop="url">
                                    <?php bloginfo('name'); ?></a></h1>

                            <?php else : ?>

                            <a class="navbar-brand" rel="home" href="<?php echo esc_url(home_url('/')); ?>"
                                title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" itemprop="url">
                                <?php bloginfo('name'); ?></a>

                            <?php endif; ?>


                            <?php 
                        } else {
                            the_custom_logo();
                        } ?>
                            <!-- end custom logo -->

                        </div>



                        <div class="site-info">
                            <!-- <p>LAT 318, Inc<br>
                                P.O Box #1213 <br>
                                Pooler, GA 31322<br>
                                Tel: +1 (912) 346-5327</p> -->
                            <?php
                            if (dynamic_sidebar('footer_1_widget_area')) : else : endif;

                            ?>


                        </div>
                        <!-- .site-info -->

                    </div>
                    <div class="col-md-4 footer-col">
                        <div class="footer-social d-flex justify-content-between">
                            <i class="fa fa-facebook"></i>
                            <i class="fa fa-twitter"></i>
                            <i class="fa fa-instagram"></i>

                        </div>
                        <div class="footer-site-copy">
                            <p>LAT 3:18 INC &copy; 2018</p>
                            <p><small>Design and Development: <a href="http://nohelmadrid.com.ve">Nampil</a></small></p>
                        </div>




                    </div>
                    <div class="col-md-4 footer-col">

                        <?php if (dynamic_sidebar('footer_2_widget_area')) : else : endif;

                    ?>

                    </div>

                    <!--col end -->

                </div><!-- row end -->
            </div><!-- inner container end -->
        </footer><!-- #colophon -->

    </div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>