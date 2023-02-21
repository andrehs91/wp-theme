<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Larissa
 * @since Larissa 1.0
 * @version 1.0
 */

get_header();
?>

<main class="col-12 col-lg-9 content">
    <?php if ( is_active_sidebar( 'anuncio-superior' ) ) : ?>
        <div class="mb-3 mb-md-4">
        <?php dynamic_sidebar( 'anuncio-superior' ); ?>
        </div>
    <?php endif; ?>
    <?php
    while ( have_posts() ) :
        the_post();
        get_template_part( 'template-parts/page/content', 'page' );
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
    endwhile;
    ?>
    <?php if ( is_active_sidebar( 'anuncio-inferior' ) ) : ?>
        <div class="mt-3 mt-md-4">
        <?php dynamic_sidebar( 'anuncio-inferior' ); ?>
        </div>
    <?php endif; ?>
</main>
<aside class="col-12 col-lg-3 ps-lg-4">
    <?php get_sidebar(); ?>
</aside>

<?php
get_footer();
