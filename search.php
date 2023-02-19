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
    <?= var_dump(get_post_type()); ?>
    <header class="page-header">
        <?php if ( have_posts() ) : ?>
            <h1 class="page-title">
            <?php
            /* translators: Search query. */
            printf( __( 'Search Results for: %s', 'larissa' ), '<span>' . get_search_query() . '</span>' );
            ?>
            </h1>
        <?php else : ?>
            <h1 class="page-title"><?php _e( 'Nothing Found', 'larissa' ); ?></h1>
        <?php endif; ?>
    </header><!-- .page-header -->
    <div id="primary" class="content-area">
        <?php
        if ( have_posts() ) :
            // Start the Loop.
            while ( have_posts() ) :
                the_post();
                /**
                 * Run the loop for the search to output the results.
                 * If you want to overload this in a child theme then include a file
                 * called content-search.php and that will be used instead.
                 */
                get_template_part( 'template-parts/post/content', 'excerpt' );
            endwhile; // End the loop.
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
    </div>
</main>
<aside class="col-12 col-lg-3 ps-lg-4">
    <?php get_sidebar(); ?>
</aside>

<?php
get_footer();
