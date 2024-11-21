<h1><?php esc_html_e('Theme options') ?></h1>

<?php settings_errors(); ?>

<?php
$hero_img = esc_attr(get_option('lat_hero_img'));
$hero_video = esc_attr(get_option('lat_hero_video'));
$hero_video_cover = esc_attr(get_option('lat_hero_video_cover'));
?>


<form method="post" action="options.php" id="admin-form">
    <?php settings_fields('nampil-settings-group') ?>
    <?php do_settings_sections('nampil_lat') ?>
    <h3>Hero Section Preview</h3>
    <div class="video-header-preview">
        
        <div class="hero-content">
         
                <img id="lat-hero-img-layer1-preview"
                    class="img-fluid hero-img-layer1"
                    src="<?php echo esc_attr(get_option('lat_hero_img_layer1')); ?>" />
         



            <h2 id="hero-title-preview" class="hero-title"><?php echo esc_attr(get_option('lat_hero_title')) ?></h2>
               
            <a id="lat-hero-cta" href="<?php echo home_url() . esc_attr(get_option('lat_hero_cta_link')) ?>"
                class="btn btn-primary btn-sm 
                <?php echo (1 != get_option('lat_hero_img_vid_check'))  ? '' : 'hide' ?>">
                <?php echo esc_attr(get_option('lat_hero_cta')) ?>
            </a>


               
        </div>


        <img id="lat-video-cover-preview"
            class="img-fluid video-cover <?php echo (1 == get_option('lat_hero_img_vid_check')) ? '' : 'hide'; ?>"
            src="<?php echo esc_attr(get_option('lat_hero_video_cover')); ?>" />
        <video autoplay muted loop id="lat-video"
            class="video-header <?php echo (1 == get_option('lat_hero_img_vid_check')) ? '' : 'hide'; ?>">
            <source src="<?php echo esc_attr(get_option('lat_hero_video')) ?>" type="video/mp4">
        </video>


        <img id="lat-hero-img-preview"
            class="img-fluid hero-img <?php echo (1 == get_option('lat_hero_img_vid_check')) ? 'hide' : ''; ?>"
            src="<?php echo esc_attr(get_option('lat_hero_img')); ?>" />



    </div>

    <?php submit_button(); ?>

</form>