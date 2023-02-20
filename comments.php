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

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php
    if ( have_comments() ) :
        ?>
        <h3 class="comments-title title-decoration">
            <?php if ( absint( get_comments_number() > 1 ) ) {
                echo absint( get_comments_number() ) . ' Comentários';
            } else {
                echo absint( get_comments_number() ) . ' Comentário';
            } ?>
        </h3>
        <ol class="comment-list">
            <?php
                wp_list_comments(
                    array(
                        'avatar_size' => 100,
                        'style'       => 'ol',
                        'short_ping'  => true,
                        'reply_text'  => 'Responder',
                    )
                );
            ?>
        </ol>
        <?php
        the_comments_pagination(
            array(
                'prev_text' => '«<span class="screen-reader-text">Anterior</span>',
                'next_text' => '»<span class="screen-reader-text">Próximo</span>'
            )
        );
    endif;
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
        ?>
        <p class="no-comments">Os comentários estão fechados.</p>
        <?php
    endif;
    comment_form();
    ?>
</div><!-- #comments -->
