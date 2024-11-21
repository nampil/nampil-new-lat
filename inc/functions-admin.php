<?php

/**
 * Admin Page - Theme Options
 *
 * @package understrap
 */

function nampil_add_admin_page()
{
    // Admin Page
    add_menu_page('LAT318 Theme Options', esc_html__('Theme Options'), 'manage_options', 'nampil_lat', 'nampil_theme_create_page', 'dashicons-admin-generic', 4);

    //Sub Admin Page
    add_submenu_page('nampil_lat', 'LAT318 Theme Options', esc_html__('Settings'), 'manage_options', 'nampil_lat', 'nampil_theme_create_page');


    //Custom setting
    add_action('admin_init', 'nampil_custom_settings');
}
add_action('admin_menu', 'nampil_add_admin_page');


function nampil_custom_settings()
{
    register_setting('nampil-settings-group', 'lat_hero_video');
    register_setting('nampil-settings-group', 'lat_hero_video_cover');
    register_setting('nampil-settings-group', 'lat_hero_img');
    register_setting('nampil-settings-group', 'lat_hero_img_vid_check');
    register_setting('nampil-settings-group', 'lat_hero_title');
    register_setting('nampil-settings-group', 'lat_hero_cta');
    register_setting('nampil-settings-group', 'lat_hero_cta_link');
    register_setting('nampil-settings-group', 'lat_hero_img_layer1');

    add_settings_section('nampil-lat-options', esc_html__('Hero Section'), 'nampil_lat_options', 'nampil_lat');

    add_settings_field('lat_hero_img_vid_check', 'Video for Hero Section', 'lat_hero_img_vid_check', 'nampil_lat', 'nampil-lat-options');
    add_settings_field('lat-hero-img', 'Hero Image', 'lat_hero_img', 'nampil_lat', 'nampil-lat-options');
    add_settings_field('lat-hero-video', 'Hero Video', 'lat_hero_video', 'nampil_lat', 'nampil-lat-options');
    add_settings_field('lat-hero-video-cover', 'Hero Cover', 'lat_hero_video_cover', 'nampil_lat', 'nampil-lat-options');
    add_settings_field('lat-hero-title', 'Hero Title', 'lat_hero_title', 'nampil_lat', 'nampil-lat-options');
    add_settings_field('lat-hero-cta', 'Hero CTA', 'lat_hero_cta', 'nampil_lat', 'nampil-lat-options');
    add_settings_field('lat-hero-cta-link', 'Hero CTA Link', 'lat_hero_cta_link', 'nampil_lat', 'nampil-lat-options');
    add_settings_field('lat-hero-img-layer1', 'Hero IMG Layer 1', 'lat_hero_img_layer1', 'nampil_lat', 'nampil-lat-options');
}

function nampil_lat_options()
{ }

function lat_hero_img_vid_check()
{
    $video_check = esc_attr(get_option('lat_hero_img_vid_check'));
    echo '<input ' . checked(1, $video_check, '') . '  type="checkbox" name="lat_hero_img_vid_check"  id="check-video" value="1"/><input type="hidden" id="hero-video-check" name="lat_hero_img" value="' . $video_check . '"/>';
}
function lat_hero_img()
{
    $hero_image = esc_attr(get_option('lat_hero_img'));
    echo '<input type="button" class="toggle-disabled" value="Upload Hero Image" id="upload-button" /> <input type="hidden" id="hero-image" name="lat_hero_img" value="' . $hero_image . '"/>';
}
function lat_hero_title()
{
    $lat_hero_title = esc_attr(get_option('lat_hero_title'));
    echo '<input type="text" class="" name="lat_hero_title" value="' . esc_attr(get_option('lat_hero_title')) . '" id="hero-title" />';
}
function lat_hero_cta()
{
    $lat_hero_cta = esc_attr(get_option('lat_hero_cta'));
    echo '<input type="text" class="" name="lat_hero_cta" value="' . esc_attr(get_option('lat_hero_cta')) . '" id="hero-cta" />';
}
function lat_hero_cta_link()
{
    $lat_hero_cta_link = esc_attr(get_option('lat_hero_cta_link'));
    echo '<input type="text" class="" name="lat_hero_cta_link" value="' . esc_attr(get_option('lat_hero_cta_link')) . '" id="hero-cta-link" />';
}
function lat_hero_img_layer1()
{
    $lat_hero_img_layer1 = esc_attr(get_option('lat_hero_img_layer1'));
    echo '<input type="button" class="toggle-disabled" value="Upload IMG Layer 1" id="upload-hero-img-layer1-button" /> <input type="hidden" id="hero-img-layer1" name="lat_hero_img_layer1" value="' . $lat_hero_img_layer1 . '"/> <input type="button" class="toggle-disabled" value="X" id="reset-hero-img-layer1-button" />';
    
}


function lat_hero_video_cover()
{
    $hero_video_cover = esc_attr(get_option('lat_hero_video_cover'));
    echo '<input type="button" class="toggle-disabled" value="Upload Hero Video Cover" id="upload-video-cover-button" /> <input type="hidden" id="hero-video-cover" name="lat_hero_video_cover" value="' . $hero_video_cover . '"/>';
}
function lat_hero_video()
{
    $hero_video = esc_attr(get_option('lat_hero_video'));
    echo '<input type="button" class="toggle-disabled" value="Upload Hero Video" id="upload-video-button" /> <input type="hidden" id="hero-video" name="lat_hero_video" value="' . $hero_video . '"/>';
}
function nampil_theme_create_page()
{
    require_once(get_template_directory() . '/inc/templates/nampil-admin.php');
}