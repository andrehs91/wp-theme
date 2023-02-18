<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Larissa
 * @since Larissa 1.0
 * @version 1.0
 */

if ( is_active_sidebar( 'menu-lateral' ) ) {
    dynamic_sidebar( 'menu-lateral' );
} else { ?>
    <div class="alert alert-secondary" role="alert">O menu lateral foi definido.</div>
<?php }
