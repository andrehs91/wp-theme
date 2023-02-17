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
    <span class="post-category">
        <?php
            $categories = get_the_category();
            foreach ($categories as $category) {
                $category_link = get_category_link($category->cat_ID);
                echo '<a href="' . esc_url($category_link) . '" title="Categoria ' . esc_attr($category->name) . '">' . esc_html($category->name) . '</a>';
            }
        ?>
    </span>
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

    <div class="post-tags" title="Marcações">
        <?php
            $tags = get_the_tags();
            foreach ($tags as $tag) {
                $tag_link = get_the_tags($tag->cat_ID);
                echo '<a href="' . esc_url($tag_link) . '" title="Categoria ' . esc_attr($tag->name) . '">' . esc_html($tag->name) . '</a>';
            }
        ?>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->
