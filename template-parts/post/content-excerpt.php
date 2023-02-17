<?php

/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Larissa
 * @since Larissa 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" class="post-summary">
    <span class="post-category"><a href="#" title="Categoria"><?= get_the_category(); ?></a></span>
    <pre>
        <?php
        print_r(get_the_category());
        ?>
    </pre>
    <?php
    // if ( is_front_page() && ! is_home() ) {
    //     the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
    // } else {
    //     the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
    // }
    the_title( sprintf( '<h2 class="post-title" title="Título da publicação"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
    ?>
    <?php if ( 'post' === get_post_type() ) : ?>
        <?= larissa_post_author(); ?>
        <?= larissa_post_date(); ?>
        <?php larissa_edit_link();?>
    <?php elseif ( 'page' === get_post_type() && get_edit_post_link() ) : ?>
        <?php larissa_edit_link(); ?>
    <?php endif; ?>

    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->

</article><!-- #post-<?php the_ID(); ?> -->
