<?php

/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();

$container = get_theme_mod('understrap_container_type');
?>

<?php if (is_front_page() && is_home()) : ?>
<?php get_template_part('global-templates/hero'); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

    <div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

        <div class="row">

            <!-- Do the left sidebar check and opens the primary div -->
            <?php get_template_part('global-templates/left-sidebar-check'); ?>

            <main class="site-main" id="main">







                <?php 
                $eolArgs = array(
                    'post_type' => 'post',
                    'posts_per_page' => 4
                );
                $eolArgs['paged'] = get_query_var('paged') ? get_query_var('paged') : 1;


                $eolPost = new WP_Query($eolArgs);
                // Pagination fix
                $temp_query = $wp_query;
                $wp_query = null;
                $wp_query = $eolPost;
                ?>
                <?php if ($eolPost->have_posts()) : ?>

                <?php /* Start the Loop */ ?>

                <?php while ($eolPost->have_posts()) : $eolPost->the_post(); ?>
                <?php if (0 === $wp_query->current_post) {
                    get_template_part('loop-templates/content', 'firstPost');

                } else {

                    get_template_part('loop-templates/content', 'blog');

                }




                ?>

                <?php endwhile; ?>

                <?php else : ?>

                <?php get_template_part('loop-templates/content', 'none'); ?>

                <?php endif; ?>

            </main><!-- #main -->

            <!-- The pagination component -->
            <?php wp_reset_postdata();

            understrap_pagination();
            $wp_query = null;
            $wp_query = $temp_query;
            ?>

            <!-- Do the right sidebar check -->
            <?php get_template_part('global-templates/right-sidebar-check'); ?>


        </div><!-- .row -->

    </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>