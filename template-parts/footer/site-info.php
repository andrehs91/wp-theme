<?php

/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage Larissa
 * @since Larissa 1.0
 * @version 1.0
 */

?>
<div class="site-info">
    <?php
    if ( function_exists( 'the_privacy_policy_link' ) ) {
        the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
    }
    ?>
    <a href="<?= esc_url( __( 'https://wordpress.org/', 'larissa' ) ); ?>" class="imprint">
        <?php
            /* translators: %s: WordPress */
        printf( __( 'Proudly powered by %s', 'larissa' ), 'WordPress' );
        ?>
    </a>
</div><!-- .site-info -->
