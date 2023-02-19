<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Larissa
 * @since Larissa 1.0
 * @version 1.0
 */

get_header();
?>

<main class="col-12 col-lg-9 content">
    <div class="mb-3 mb-md-4">
        <?php if ( is_active_sidebar( 'anuncio-superior' ) ) dynamic_sidebar( 'anuncio-superior' ); ?>
    </div>
    <?php
    while ( have_posts() ) :
        the_post();
        get_template_part( 'template-parts/post/content', get_post_format() );
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
        the_post_navigation(
            array(
                'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'larissa' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'larissa' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . larissa_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
                'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'larissa' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'larissa' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . larissa_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
            )
        );
    endwhile;
    ?>
    <div class="mt-3 mt-md-4">
        <?php if ( is_active_sidebar( 'anuncio-inferior' ) ) dynamic_sidebar( 'anuncio-inferior' ); ?>
    </div>
</main>
<aside class="col-12 col-lg-3 ps-lg-4">
    <?php get_sidebar(); ?>
</aside>

<?php
get_footer();
