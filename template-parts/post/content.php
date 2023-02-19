<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Larissa
 * @since Larissa 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    if ( is_sticky() && is_home() ) :
        echo larissa_get_svg( array( 'icon' => 'thumb-tack' ) );
    endif;
    ?>
    <div class="post-header">
        <?php the_title( '<h1 class="post-title text-primary" title="Título da publicação">', '</h1>' ); ?>
        <div class="post-author-date">
            <?= larissa_post_author(); ?>
            <?= larissa_post_date(); ?>
        </div>
    </div><!-- .post-header -->

    <div class="my-3 my-md-4">
        <?php if ( is_active_sidebar( 'anuncio-superior' ) ) dynamic_sidebar( 'anuncio-superior' ); ?>
    </div>

    <?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'larissa-featured-image' ); ?>
            </a>
        </div><!-- .post-thumbnail -->
    <?php endif; ?>

    <div class="entry-content">
        <?php
        the_content(
            sprintf(
                /* translators: %s: Post title. Only visible to screen readers. */
                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'larissa' ),
                get_the_title()
            )
        );

        wp_link_pages(
            array(
                'before'      => '<div class="page-links">' . __( 'Pages:', 'larissa' ),
                'after'       => '</div>',
                'link_before' => '<span class="page-number">',
                'link_after'  => '</span>',
            )
        );
        ?>
    </div><!-- .entry-content -->

    <?php
    if ( is_single() ) {
        larissa_entry_footer();
    }
    ?>

    <div class="my-3 my-md-4">
        <?php if ( is_active_sidebar( 'anuncio-inferior' ) ) dynamic_sidebar( 'anuncio-inferior' ); ?>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->
