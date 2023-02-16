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

<div class="row g-0">
    <div class="col-12 col-lg-9">
        <?php
        if ( have_posts() ) :
            // Start the Loop.
            while ( have_posts() ) :
                the_post();
                /*
                    * Include the Post-Format-specific template for the content.
                    * If you want to override this in a child theme, then include a file
                    * called content-___.php (where ___ is the Post Format name) and that
                    * will be used instead.
                    */
                get_template_part( 'template-parts/post/content', get_post_format() );
            endwhile;
            the_posts_pagination(
                array(
                    'prev_text'          => larissa_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'larissa' ) . '</span>',
                    'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'larissa' ) . '</span>' . larissa_get_svg( array( 'icon' => 'arrow-right' ) ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'larissa' ) . ' </span>',
                )
            );
        else :
            get_template_part( 'template-parts/post/content', 'none' );
        endif;
        ?>
    </div>
    <div class="col-12 col-lg-3 ps-4">
        <?php get_sidebar(); ?>
    </div>
<?php
get_footer();
