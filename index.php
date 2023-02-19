<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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

<main class="col-12 col-lg-9 mb-0">
    <?php
    if ( is_active_sidebar( 'anuncio-superior' ) ) dynamic_sidebar( 'anuncio-superior' );
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/post/content', 'excerpt' );
        endwhile;
        the_posts_pagination(
            array(
                'prev_text'          => '«<span class="screen-reader-text">' . __( 'Previous page', 'larissa' ) . '</span>',
                'next_text'          => '»<span class="screen-reader-text">' . __( 'Next page', 'larissa' ) . '</span>',
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'larissa' ) . ' </span>',
            )
        );
    else :
        get_template_part( 'template-parts/post/content', 'none' );
    endif;
    if ( is_active_sidebar( 'anuncio-inferior' ) ) dynamic_sidebar( 'anuncio-inferior' );
    ?>
</main>
<aside class="col-12 col-lg-3 ps-lg-4">
    <?php get_sidebar(); ?>
</aside>

<?php
get_footer();
