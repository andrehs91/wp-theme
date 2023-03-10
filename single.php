<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Larissa
 * @since Larissa 1.0
 * @version 1.0
 */

get_header();
?>

<main class="col-12 col-lg-9 content">
    <?php
    while ( have_posts() ) :
        the_post();
        get_template_part( 'template-parts/post/content', get_post_format() );
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
        the_post_navigation(
            array(
                'screen_reader_text' => 'Navegação entre postagens',
                'prev_text'          => '<span class="nav-title">« Postagem Anterior<br>%title</span>',
                'next_text'          => '<span class="nav-title">Próxima Postagem »<br>%title</span>',
            )
        );
    endwhile;
    ?>
</main>
<aside class="col-12 col-lg-3 ps-lg-4">
    <?php get_sidebar(); ?>
</aside>

<?php
get_footer();
