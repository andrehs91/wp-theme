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

<nav class="header-nav navbar navbar-dark navbar-expand-lg">
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
                'items_wrap'      => '<ul id="%1$s" class="nav-link %2$s">%3$s</ul>',
                'theme_location'  => 'top'
            )
        );
    ?>
</nav>
<?php if ( is_front_page() ) : ?>
    <div class="header-title">
        <h1><a href="<?= esc_url( home_url( '/' ) ); ?>" rel="home">Início</a></h1>
        <span><?= get_bloginfo( 'description', 'display' ); ?></span>
    </div>
<?php elseif ( is_page() ) : ?>
    <h1>Página</h1>
<?php elseif ( is_archive() ) : ?>
    <h1>Arquivo</h1>
<?php else : ?>
<?php endif; ?>
