<?php

/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-
    <?php the_ID(); ?>">

    <header class="entry-header">

        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

        <div class="entry-meta">

            <?php nampil_understrap_posted_on(); ?>

        </div><!-- .entry-meta -->

    </header><!-- .entry-header -->
    <div class="entry-content mt-3">

        <img class="float-left pr-3 pb-3" src="<?php echo get_the_post_thumbnail_url($post->ID, 'medium'); ?>" />
        <p>
            <?php echo get_the_content(); ?>

        </p>






        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . __('Pages:', 'understrap'),
            'after' => '</div>',
        ));
        ?>

    </div><!-- .entry-content -->

    <footer class="entry-footer">

        <?php understrap_entry_footer(); ?>

    </footer><!-- .entry-footer -->

</article><!-- #post-## -->