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

<article id="post-<?php the_ID(); ?>" class="post-excerpt">
    <span class="post-category">
        <?php
            $categories = get_the_category();
            foreach ($categories as $category) {
                $category_link = get_category_link($category);
                echo '<a href="' . esc_url($category_link) . '" title="Categoria ' . esc_attr($category->name) . '">' . esc_html($category->name) . '</a>';
            }
        ?>
    </span>
    <?php the_title( sprintf( '<h2 class="post-title" title="Título da publicação"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    <?php if ( 'post' === get_post_type() ) : ?>
        <div>
            <?= larissa_post_author(); ?>
            <?= larissa_post_date(); ?>
        </div>
        <?php larissa_edit_link();?>
    <?php elseif ( 'page' === get_post_type() && get_edit_post_link() ) : ?>
        <?php larissa_edit_link(); ?>
    <?php endif; ?>
    <div class="post-content">
        <?php the_excerpt(); ?>
    </div>
    <div class="post-tags" title="Marcações">
        <?php
            $tags = get_the_tags();
            foreach ($tags as $tag) {
                $tag_link = get_the_tags($tag);
                echo '<a href="' . esc_url($tag_link) . '" title="Marcação ' . esc_attr($tag->name) . '">#' . esc_html($tag->name) . '</a>';
            }
        ?>
    </div>
    <div class="post-button">
        <a class="btn btn-outline-primary" href="<?= esc_url( get_permalink( get_the_ID() ) ) ?>">Continuar Lendo</a>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
