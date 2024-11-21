<?php

/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<div class="article-container py-4">

    <article <?php post_class(); ?> id="post-
        <?php the_ID(); ?>">

        <header class="nampil-blog mb-3 entry-header">

            <?php the_title(
                sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())),
                '</a></h2>'
            ); ?>

            <?php if ('post' == get_post_type()) : ?>

            <div class="nampil-blog entry-meta">
                <?php nampil_understrap_posted_on(); ?>
            </div><!-- .entry-meta -->

            <?php endif; ?>

        </header><!-- .entry-header -->



        <div class="entry-content">
            <?php echo get_the_post_thumbnail($post->ID, 'medium', array(
                'class' => 'float-left img-fluid blogImg',
                'alt' => get_the_title()
            )); ?>
            <?php
            the_excerpt();
            ?>

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

</div><!-- article-container -->