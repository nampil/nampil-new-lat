<?php

/**
 * The front-page template file.
 *
 *
 * @package understrap
 */

get_header();

$container = 'container-fluid';

if (is_front_page() && is_home()): ?>

</div>
<!--fin del header-->

<?php endif; ?>


<?php if (is_front_page() && is_home()): ?>
<?php get_template_part('global-templates/hero'); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

    <div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

        <div class="row">
            <div class="col content-area" id="primary">

                <main class="site-main" id="main">

                    <section id="home-about" class="home-about">
                        <div class="container">

                            <h1 class="titulo-de-seccion">Help for those in need</h1>
                            <p class="home-about-description">LAT 318 is a Christian organization providing assistance
                                to those in need during times of distress thru the love of Christ. 1 John 3:18.</p>
                            <a href="<?php echo esc_url(home_url('/about/')); ?>" class="btn btn-primary">More about
                                Lat 318</a>
                        </div>
                    </section>

                     <?php

                    $show_annual_report = get_option('lat_show_annual_report');



                    if ($show_annual_report) {

                        $args_annual_report = array(

                            'post_type' => 'annual_report',
                            'numberposts' => 1


                        );
                        $annual_report_query = new WP_Query($args_annual_report);

                        while ($annual_report_query->have_posts()) : $annual_report_query->the_post();

                    ?>

                            <section class="home-annual-report" id="home-annual-report">
                                <div class="container pt-4">

                                    <h1 class="titulo-de-seccion"><?php echo get_the_title(); ?></h1>
                                    <?php
                                    $subtitle = get_post_meta(get_the_ID(), 'subtitle');
                                    if ($subtitle) {
                                    ?>



                                    <?php
                                    }

                                    ?>

                                    <div class="row home-annual-report-row">
                                        <div class="col-md-6 pt-4  d-flex flex-column justify-content-center text-center order-1 order-md-0">
                                            <h2 class="subtitle-de-section"><?php echo $subtitle[0] ?></h2>
                                            <p class="mb-5">
                                                <?php echo get_the_excerpt(); ?>
                                            </p>
                                        </div>

                                        <div class="col-md-6 d-flex align-items-center order-0 order-md-1 ">
                                            <img class=" img-fluid" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>" srcset="">
                                        </div>

                                    </div>

                                </div>
                            </section>


                    <?php
                        endwhile;
                    };
                    ?>

                    <section class="home-annual-report" id="home-instagram-feed">
                        <div class="container pt-4">
                            <h1 class="titulo-de-seccion">Love in Action 2023</h1>
                            <div class="row home-instagram-feed-row">
                                <div class="col-12 pt-4  d-flex flex-column justify-content-center text-center order-1 order-md-0">
                                    <?php

                                    echo do_shortcode("[instagram-feed feed=1]");
                                    ?>

                                </div>



                            </div>
                        </div>

                    </section>

                    <section id="home-experiences-of-love" class="home-experiences-of-love">
                        <div class="container pt-4 mt-4">
                            <h1 class="titulo-de-seccion">Experiences of Love</h1>


                            <div class="row eol-post-row">
                                <?php if (have_posts()) : ?>

                                    <?php  /* Start the Loop */ ?>


                                    <?php while (have_posts()) : the_post(); ?>

                                        <div class="col-md-4 pb-4">
                                            <div class="eol-post-container">

                                                <div class="eol-post-img-wrapper" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)">

                                                </div>

                                        
                                                <div class="eol-post-info">

                                                    <a class="eol-post-title-link" href="<?php echo get_the_permalink() ?>">
                                                        <h5 class="eol-post-title">
                                                            <?php echo get_the_title(); ?>
                                                        </h5>
                                                    </a>
                                                    <p class="eol-post-date">
                                                        <small>
                                                            <?php echo get_the_date(); ?>
                                                        </small>
                                                    </p>
                                                    <p class="eol-post-excerpt">
                                                        <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                                    </p>
                                                    <a class="btn btn-secondary btn-sm d-md-none" href="<?php echo get_the_permalink() ?>">Read
                                                        More</a>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endwhile; ?>

                                <?php else : ?>

                                    <?php get_template_part('loop-templates/content', 'none'); ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    </section>


                    <section id="home-programs" class="home-programs">
                        <div class="container home-programs-container">

                            <?php
                            $args = array(
                                'post_parent' => 22,
                                'post_type' => 'page',
                                'orderby' => 'menu_order'
                            );

                            $child_query = new WP_Query($args);
                            ?>


                            <?php while ($child_query->have_posts()): $child_query->the_post(); ?>
                            <div class="row home-programs-row">

                                <div class="col-md-6 home-programs-img-col d-flex align-items-center">
                                    <img class=" img-fluid home-programs-img"
                                        src="<?php echo get_the_post_thumbnail_url(); ?>"
                                        alt="<?php echo get_the_title(); ?>" srcset="">
                                </div>
                                <div
                                    class="col-md-6 home-programs-content-col d-flex flex-column justify-content-center text-center text-light">
                                    <h2 class="home-programs-title">
                                        <?php echo get_the_title(); ?>
                                    </h2>
                                    <p class="home-programs-excerpt">
                                        <?php echo get_the_excerpt(); ?>
                                    </p>
                                </div>
                            </div>




                            <?php endwhile; ?>


                            <?php
                            wp_reset_postdata(); ?>

                        </div>

                    </section>

                    <section id="home-help" class="home-help">
                        <div class="container">

                            <?php
                            $home_help_args = array(
                                'name' => 'do-you-want-to-help?',
                                'post_type' => 'page',
                                'numberposts' => 1
                            );

                            $home_help_query = new WP_Query($home_help_args);
                            ?>

                            <?php while ($home_help_query->have_posts()): $home_help_query->the_post(); ?>

                            <h1 class="home-help-titulo titulo-de-seccion">
                                <?php echo get_the_title(); ?>
                            </h1>
                            <div class="row help-description-row">
                                <div class="col-md-4">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>"
                                        alt="<?php echo get_the_title(); ?>" class="help-img">
                                </div>
                                <div class="col-md-8 help-description-col">
                                    <p class="help-description">
                                        <?php the_content(); ?>
                                    </p>
                                </div>
                            </div>
                            <a href="<?php echo esc_url(home_url('/donate/')); ?>" class="btn btn-primary">Contact</a>
                            <a href="<?php echo esc_url(home_url('/donate/')); ?>" class="btn btn-primary">Donate</a>

                            <?php endwhile; ?>


                            <?php
                            wp_reset_postdata(); ?>


                        </div>

                    </section>




                </main>
                <!-- #main -->
            </div><!-- .col -->


        </div><!-- .row -->

    </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>