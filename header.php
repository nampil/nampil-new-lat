<?php

/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod('understrap_container_type');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php if (is_front_page() && is_home()) : ?>

    <div class="hfeed site" id="page">

        <?php else : ?>

        <div class="hfeed site no-home" id="page">

            <?php endif; ?>



            <!-- ******************* The Navbar Area ******************* -->
            <div id="wrapper-navbar" class="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

                <a class="skip-link screen-reader-text sr-only" href="#content">
                    <?php esc_html_e('Skip to content', 'understrap'); ?></a>


                <?php if (is_front_page() && is_home()) : ?>

                <nav class="navbar navbar-expand-md navbar-dark barra-navbar">

                    <?php else : ?>

                    <nav class="navbar navbar-expand-md navbar-dark bg-primary barra-navbar">

                        <?php endif; ?>

                        <?php if ('container' == $container) : ?>
                        <div class="container">
                            <?php endif; ?>

                            <!-- Your site title as branding in the menu -->
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

                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <!-- The WordPress Menu goes here -->
                            <?php wp_nav_menu(
                                array(
                                    'theme_location' => 'primary',
                                    'container_class' => 'collapse navbar-collapse',
                                    'container_id' => 'navbarNavDropdown',
                                    'menu_class' => 'navbar-nav ml-auto',
                                    'fallback_cb' => '',
                                    'menu_id' => 'main-menu',
                                    'depth' => 2,
                                    'walker' => new Understrap_WP_Bootstrap_Navwalker(),
                                )
                            ); ?>
                            <?php if ('container' == $container) : ?>
                        </div><!-- .container -->
                        <?php endif; ?>

                    </nav><!-- .site-navigation -->

            </div><!-- #wrapper-navbar end -->
            <?php if (is_front_page() && is_home()) : ?>

            <div id="header" class="header">

                <div class="video-header-container">
                    <div class="content">
                        
                    <?php if (esc_attr(get_option('lat_hero_img_layer1')) != '') { ?>
                        <img id="hero-img-layer-1" class="hero-img-layer-1 | img-fluid" src="<?php echo esc_attr(get_option('lat_hero_img_layer1')) ?>" />
                    <?php }; ?>
                        
                        <h2><?php echo esc_attr(get_option('lat_hero_title')) ?></h2>
                        <?php if (esc_attr(get_option('lat_hero_cta')) != '') { ?>
                        <a href="<?php echo home_url() . esc_attr(get_option('lat_hero_cta_link')) ?>"
                            class="btn btn-primary "><?php echo esc_attr(get_option('lat_hero_cta')) ?></a>
                        <?php }; ?>
                    </div>
                    <img id="lat-video-cover" class="img-fluid video-cover"
                    src="<?php echo (1 == get_option('lat_hero_img_vid_check')) ? esc_attr(get_option('lat_hero_video_cover')) : esc_attr(get_option('lat_hero_img')); ?>" />
                    <?php if (1 == get_option('lat_hero_img_vid_check')) { ?>
                        <video autoplay muted loop id="lat-video" class="video-header">
                            <source src="<?php echo esc_attr(get_option('lat_hero_video')) ?>" type="video/mp4">
                        </video>
                        
                        <?php }; ?>


                    <?php if (1 != get_option('lat_hero_img_vid_check')) { ?>
                        <div class="overlay"></div>
                        <?php }; ?>
                </div>
                <?php endif; ?>