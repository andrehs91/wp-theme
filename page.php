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
    <div class="mb-2 mb-md-2">
        <?php
        if ( is_active_sidebar( 'anuncio-superior' ) ) dynamic_sidebar( 'anuncio-superior' );
        ?>
    </div>
    <?php
    while ( have_posts() ) :
        the_post();
        get_template_part( 'template-parts/page/content', 'page' );
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
    endwhile; // End the loop.
    ?>
    <div class="mt-2 mt-md-2">
        <?php
        if ( is_active_sidebar( 'anuncio-inferior' ) ) dynamic_sidebar( 'anuncio-inferior' );
        ?>
    </div>
</main>
<aside class="col-12 col-lg-3 ps-lg-4">
    <?php get_sidebar(); ?>
</aside>

<?php
get_footer();
