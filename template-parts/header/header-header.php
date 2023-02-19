<?php

/**
 * Displays header media
 *
 * @package WordPress
 * @subpackage Larissa
 * @since Larissa 1.0
 * @version 1.0
 */

?>

<nav class="header-nav navbar navbar-dark navbar-expand-md">
    <div class="brand">
        <a href="<?= esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php
        wp_nav_menu(
            array(
                'container_class' => 'navbar-collapse collapse text-center',
                'container_id'    => 'navbarScroll',
                'menu_class'      => 'navbar-nav',
                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'theme_location'  => 'top'
            )
        );
    ?>
</nav>
<?php if ( is_front_page() ) : ?>
    <div class="header-title">
        <h1>Início</h1>
        <span><?= get_bloginfo( 'description', 'display' ); ?></span>
    </div>
<?php elseif ( is_page() ) : ?>
    <div class="header-title">
        <h1><?= get_the_title(); ?></h1>
    </div>
<?php elseif ( is_archive() ) : ?>
    <div class="header-title">
        <?php
            the_archive_title( '<h1>', '</h1>' );
            the_archive_description( '<span>', '</span>' );
        ?>
    </div>
<?php elseif ( is_search() ) : ?>
    <div class="header-title">
        <h1>Resultados da busca por: <?= get_search_query(); ?></h1>
    </div>
<?php elseif ( is_404() ) : ?>
    <div class="header-title">
        <h1>Ops! A página não pode ser encontrada.</h1>
    </div>
<?php endif; ?>
<div class="header-search container">
    <?php get_search_form(); ?>
</div>
