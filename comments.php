<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Larissa
 * @since Larissa 1.0
 * @version 1.0
 */

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php
    // You can start editing here -- including this comment!
    if ( have_comments() ) :
        ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ( '1' === $comments_number ) {
                /* translators: %s: Post title. */
                printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'larissa' ), get_the_title() );
            } else {
                printf(
                    /* translators: 1: Number of comments, 2: Post title. */
                    _nx(
                        '%1$s Reply to &ldquo;%2$s&rdquo;',
                        '%1$s Replies to &ldquo;%2$s&rdquo;',
                        $comments_number,
                        'comments title',
                        'larissa'
                    ),
                    number_format_i18n( $comments_number ),
                    get_the_title()
                );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
                wp_list_comments(
                    array(
                        'avatar_size' => 100,
                        'style'       => 'ol',
                        'short_ping'  => true,
                        'reply_text'  => larissa_get_svg( array( 'icon' => 'mail-reply' ) ) . __( 'Reply', 'larissa' ),
                    )
                );
            ?>
        </ol>

        <?php
        the_comments_pagination(
            array(
                'prev_text' => larissa_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous', 'larissa' ) . '</span>',
                'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'larissa' ) . '</span>' . larissa_get_svg( array( 'icon' => 'arrow-right' ) ),
            )
        );

    endif; // Check for have_comments().

    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
        ?>

        <p class="no-comments"><?php _e( 'Comments are closed.', 'larissa' ); ?></p>
        <?php
    endif;

    comment_form();
    ?>

</div><!-- #comments -->
