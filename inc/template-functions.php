<?php

/**
 * Additional features to allow styling of the templates
 *
 * @package WordPress
 * @subpackage Larissa
 * @since Larissa 1.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function larissa_body_classes( $classes ) {
    $classes[] = 'bg-light';
    // // Add class of group-blog to blogs with more than 1 published author.
    // if ( is_multi_author() ) {
    //     $classes[] = 'group-blog';
    // }

    // // Add class of hfeed to non-singular pages.
    // if ( ! is_singular() ) {
    //     $classes[] = 'hfeed';
    // }

    // // Add class if we're viewing the Customizer for easier styling of theme options.
    // if ( is_customize_preview() ) {
    //     $classes[] = 'larissa-customizer';
    // }

    // // Add class on front page.
    // if ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
    //     $classes[] = 'larissa-front-page';
    // }

    // // Add a class if there is a custom header.
    // if ( has_header_image() ) {
    //     $classes[] = 'has-header-image';
    // }

    // // Add class if sidebar is used.
    // if ( is_active_sidebar( 'sidebar-1' ) && ! is_page() ) {
    //     $classes[] = 'has-sidebar';
    // }

    // // Add class for one or two column page layouts.
    // if ( is_page() || is_archive() ) {
    //     if ( 'one-column' === get_theme_mod( 'page_layout' ) ) {
    //         $classes[] = 'page-one-column';
    //     } else {
    //         $classes[] = 'page-two-column';
    //     }
    // }

    // // Add class if the site title and tagline is hidden.
    // if ( 'blank' === get_header_textcolor() ) {
    //     $classes[] = 'title-tagline-hidden';
    // }

    return $classes;
}
add_filter( 'body_class', 'larissa_body_classes' );

/**
 * Count our number of active panels.
 *
 * Primarily used to see if we have any panels active, duh.
 */
function larissa_panel_count() {

    $panel_count = 0;

    /**
     * Filters the number of front page sections in Larissa.
     *
     * @since Larissa 1.0
     *
     * @param int $num_sections Number of front page sections.
     */
    $num_sections = apply_filters( 'larissa_front_page_sections', 4 );

    // Create a setting and control for each of the sections available in the theme.
    for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
        if ( get_theme_mod( 'panel_' . $i ) ) {
            $panel_count++;
        }
    }

    return $panel_count;
}
