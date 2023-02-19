<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Larissa
 * @since Larissa 1.0
 * @version 1.0
 */

get_header();
?>

<main class="col-12 col-lg-9">
    <div class="alert alert-primary" role="alert">search.php</div>
    <?php
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
        ?>
        <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'larissa' ); ?></p>
        <?php
            get_search_form();
    endif;
    ?>
</main>
<aside class="col-12 col-lg-3 ps-lg-4">
    <?php get_sidebar(); ?>
</aside>

<?php
get_footer();
