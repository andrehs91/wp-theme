<?php

/**
 * The template for displaying archive pages
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

<main class="col-12 col-lg-9">
    <div class="alert alert-primary" role="alert">archive.php</div>
    <?php if ( have_posts() ) : ?>
    <header class="page-header">
        <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="taxonomy-description">', '</div>' );
        ?>
    </header><!-- .page-header -->
    <?php endif; ?>
    <div id="primary" class="content-area">
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
                    'prev_text'          => '«<span class="screen-reader-text">' . __( 'Previous page', 'larissa' ) . '</span>',
                    'next_text'          => '»<span class="screen-reader-text">' . __( 'Next page', 'larissa' ) . '</span>',
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'larissa' ) . ' </span>',
                )
            );
        else :
            get_template_part( 'template-parts/post/content', 'none' );
        endif;
        ?>
    </div>
</main>
<aside class="col-12 col-lg-3 ps-lg-4">
    <?php get_sidebar(); ?>
</aside>

<?php
get_footer();
