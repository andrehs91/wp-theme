<?php

/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Larissa
 * @since Larissa 1.0
 * @version 1.0
 */

?>

        </div><!-- .row .g-0 -->
    </div><!-- #main-container -->
    <footer class="bg-secondary">
        <div class="wrap">
            <?php
            get_template_part( 'template-parts/footer/footer', 'widgets' );
            if ( has_nav_menu( 'social' ) ) :
                ?>
                <nav class="social-navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'larissa' ); ?>">
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'social',
                                'menu_class'     => 'social-links-menu',
                                'depth'          => 1,
                                'link_before'    => '<span class="screen-reader-text">',
                                'link_after'     => '</span>' . larissa_get_svg( array( 'icon' => 'chain' ) ),
                            )
                        );
                    ?>
                </nav><!-- .social-navigation -->
                <?php
            endif;
            get_template_part( 'template-parts/footer/site', 'info' );
            ?>
        </div><!-- .wrap -->
    </footer>
<?php wp_footer(); ?>
<script src="<?= get_theme_file_uri( '/assets/js/bootstrap.js' ); ?>"></script>
</body>
</html>
