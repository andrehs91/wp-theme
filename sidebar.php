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

if ( is_active_sidebar( 'sidebar-1' ) ) {
    dynamic_sidebar( 'sidebar-1' );
} else {
    echo '<div class="alert alert-tertiary" role="alert">Nenhum menu foi definido.</div>';
}
