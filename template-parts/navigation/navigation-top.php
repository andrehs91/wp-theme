<?php

/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Larissa
 * @since Larissa 1.0
 * @version 1.0
 */

?>
<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Menu Superior', 'larissa' ); ?>">
    <button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
        <?php
        echo larissa_get_svg( array( 'icon' => 'bars' ) );
        echo larissa_get_svg( array( 'icon' => 'close' ) );
        _e( 'Menu', 'larissa' );
        ?>
    </button>

    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'top',
            'menu_id'        => 'top-menu',
        )
    );
    ?>

    <?php if ( ( larissa_is_frontpage() || ( is_home() && is_front_page() ) ) && has_custom_header() ) : ?>
        <a href="#content" class="menu-scroll-down"><?= larissa_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="screen-reader-text"><?php _e( 'Scroll down to content', 'larissa' ); ?></span></a>
    <?php endif; ?>
</nav><!-- #site-navigation -->
