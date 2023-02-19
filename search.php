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

<main class="col-12 col-lg-9 pb-0 pb-lg-4">
    <div class="alert alert-primary" role="alert">search.php</div>
    <?php
    if ( have_posts() ) :
    ?>
        <div class="mb-3 mb-md-4">
            <?php if ( is_active_sidebar( 'anuncio-superior' ) ) dynamic_sidebar( 'anuncio-superior' ); ?>
        </div>
    <?php
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
    ?>
        <div class="mt-3 mt-md-4">
            <?php if ( is_active_sidebar( 'anuncio-inferior' ) ) dynamic_sidebar( 'anuncio-inferior' ); ?>
        </div>
    <?php
    else :
        ?><div class="alert alert-primary m-0" role="alert">Desculpe, mas nada corresponde aos teus termos de pesquisa. Por favor, tente novamente com algumas palavras-chave diferentes.</div><?php
    endif;
    ?>
</main>
<aside class="col-12 col-lg-3 ps-lg-4">
    <?php get_sidebar(); ?>
</aside>

<?php
get_footer();
