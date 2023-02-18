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

if ( ! is_active_sidebar( 'menu-lateral' ) ) {
    return;
} else {
    dynamic_sidebar( 'menu-lateral' );
}
