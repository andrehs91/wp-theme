<?php

/**
 * Template part for displaying page content in page.php
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
    <?php larissa_edit_link( get_the_ID() ); ?>
    <?php
        the_content();
        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'larissa' ),
                'after'  => '</div>',
            )
        );
    ?>
</article><!-- #post-<?php the_ID(); ?> -->
