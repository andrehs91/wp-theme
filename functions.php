<?php

/**
 * Larissa functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Larissa
 * @since Larissa 1.0
 */

/**
 * Larissa only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
    require get_template_directory() . '/inc/back-compat.php';
    return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function larissa_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/larissa
     * If you're building a theme based on Larissa, use a find and replace
     * to change 'larissa' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'larissa' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enables custom line height for blocks
     */
    add_theme_support( 'custom-line-height' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    add_image_size( 'larissa-featured-image', 2000, 1200, true );

    add_image_size( 'larissa-thumbnail-avatar', 100, 100, true );

    // Set the default content width.
    $GLOBALS['content_width'] = 525;

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'top'    => __( 'Menu Superior', 'larissa' )
        )
    );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
        'html5',
        array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
            'navigation-widgets',
        )
    );

    /*
     * Enable support for Post Formats.
     *
     * See: https://wordpress.org/support/article/post-formats/
     */
    add_theme_support(
        'post-formats',
        array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'audio',
        )
    );

    // Add theme support for Custom Logo.
    add_theme_support(
        'custom-logo',
        array(
            'width'      => 250,
            'height'     => 250,
            'flex-width' => true,
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // /*
    //  * This theme styles the visual editor to resemble the theme style,
    //  * specifically font, colors, and column width.
    //   */
    // add_editor_style( array( 'assets/css/editor-style.css', larissa_fonts_url() ) );

    // Load regular editor styles into the new block-based editor.
    add_theme_support( 'editor-styles' );

    // Load default block styles.
    add_theme_support( 'wp-block-styles' );

    // Add support for responsive embeds.
    add_theme_support( 'responsive-embeds' );

    // Define and register starter content to showcase the theme on new sites.
    $starter_content = array(
        'widgets'     => array(
            // Place three core-defined widgets in the sidebar area.
            'menu-lateral' => array(
                'text_business_info',
                'search',
                'text_about',
            )
        ),

        // Specify the core-defined pages to create and add custom thumbnails to some of them.
        'posts'       => array(
            'home',
            'about'            => array(
                'thumbnail' => '{{image-sandwich}}',
            ),
            'contact'          => array(
                'thumbnail' => '{{image-espresso}}',
            ),
            'blog'             => array(
                'thumbnail' => '{{image-coffee}}',
            ),
            'homepage-section' => array(
                'thumbnail' => '{{image-espresso}}',
            ),
        ),

        // Create the custom image attachments used as post thumbnails for pages.
        'attachments' => array(
            'image-espresso' => array(
                'post_title' => _x( 'Espresso', 'Theme starter content', 'larissa' ),
                'file'       => 'assets/images/espresso.jpg', // URL relative to the template directory.
            ),
            'image-sandwich' => array(
                'post_title' => _x( 'Sandwich', 'Theme starter content', 'larissa' ),
                'file'       => 'assets/images/sandwich.jpg',
            ),
            'image-coffee'   => array(
                'post_title' => _x( 'Coffee', 'Theme starter content', 'larissa' ),
                'file'       => 'assets/images/coffee.jpg',
            ),
        ),

        // Default to a static front page and assign the front and posts pages.
        'options'     => array(
            'show_on_front'  => 'page',
            'page_on_front'  => '{{home}}',
            'page_for_posts' => '{{blog}}',
        ),

        // Set the front page section theme mods to the IDs of the core-registered pages.
        'theme_mods'  => array(
            'panel_1' => '{{homepage-section}}',
            'panel_2' => '{{about}}',
            'panel_3' => '{{blog}}',
            'panel_4' => '{{contact}}',
        ),

        // Set up nav menus for each of the two areas registered in the theme.
        'nav_menus'   => array(
            // Assign a menu to the "top" location.
            'top'    => array(
                'name'  => __( 'Menu Superior', 'larissa' ),
                'items' => array(
                    'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
                    'page_about',
                    'page_blog',
                    'page_contact',
                ),
            ),

            // Assign a menu to the "social" location.
            'social' => array(
                'name'  => __( 'Social Links Menu', 'larissa' ),
                'items' => array(
                    'link_yelp',
                    'link_facebook',
                    'link_twitter',
                    'link_instagram',
                    'link_email',
                ),
            ),
        ),
    );

    /**
     * Filters Larissa array of starter content.
     *
     * @since Larissa 1.1
     *
     * @param array $starter_content Array of starter content.
     */
    $starter_content = apply_filters( 'larissa_starter_content', $starter_content );

    add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'larissa_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function larissa_content_width() {

    $content_width = $GLOBALS['content_width'];

    // Get layout.
    $page_layout = get_theme_mod( 'page_layout' );

    // Check if is single post and there is no sidebar.
    if ( is_single() && ! is_active_sidebar( 'menu-lateral' ) ) {
        $content_width = 740;
    }

    /**
     * Filters Larissa content width of the theme.
     *
     * @since Larissa 1.0
     *
     * @param int $content_width Content width in pixels.
     */
    $GLOBALS['content_width'] = apply_filters( 'larissa_content_width', $content_width );
}
add_action( 'template_redirect', 'larissa_content_width', 0 );

// /**
//  * Register custom fonts.
//  */
// function larissa_fonts_url() {
//     $fonts_url = '';

//     /*
//      * translators: If there are characters in your language that are not supported
//      * by Libre Franklin, translate this to 'off'. Do not translate into your own language.
//      */
//     $libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'larissa' );

//     if ( 'off' !== $libre_franklin ) {
//         $font_families = array();

//         $font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

//         $query_args = array(
//             'family'  => urlencode( implode( '|', $font_families ) ),
//             'subset'  => urlencode( 'latin,latin-ext' ),
//             'display' => urlencode( 'fallback' ),
//         );

//         $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
//     }

//     return esc_url_raw( $fonts_url );
// }

/**
 * Add preconnect for Google Fonts.
 *
 * @since Larissa 1.0
 *
 * @param array  $urls          URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */
function larissa_resource_hints( $urls, $relation_type ) {
    if ( wp_style_is( 'larissa-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }

    return $urls;
}
add_filter( 'wp_resource_hints', 'larissa_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function larissa_widgets_init() {
    register_sidebar(
        array(
            'name'          => __( 'Menu Lateral', 'larissa' ),
            'id'            => 'menu-lateral',
            'description'   => __( 'Menu lateral.', 'larissa' ),
            'before_widget' => '<div id="%1$s" class="aside-menu-item">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="title-decoration fw-bold">',
            'after_title'   => '</h3>'
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'An??ncio Superior', 'larissa' ),
            'id'            => 'anuncio-superior',
            'description'   => __( 'An??ncio antes do conte??do.', 'larissa' ),
            'before_widget' => '<div class="googleads-container">',
            'after_widget'  => '</div>'
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'An??ncio Inferior', 'larissa' ),
            'id'            => 'anuncio-inferior',
            'description'   => __( 'An??ncio depois do conte??do.', 'larissa' ),
            'before_widget' => '<div class="googleads-container">',
            'after_widget'  => '</div>'
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Rodap??', 'larissa' ),
            'id'            => 'rodape',
            'description'   => __( 'Rodap??.', 'larissa' ),
            'before_widget' => '<div class="container">',
            'after_widget'  => '</div>'
        )
    );
}
add_action( 'widgets_init', 'larissa_widgets_init' );

function larissa_excerpt_more( $link ) {
    return '';
}
add_filter( 'excerpt_more', 'larissa_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Larissa 1.0
 */
function larissa_javascript_detection() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'larissa_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function larissa_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'larissa_pingback_header' );

/**
 * Display custom color CSS.
 */
function larissa_colors_css_wrap() {
    if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
        return;
    }

    require_once get_parent_theme_file_path( '/inc/color-patterns.php' );
    $hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );

    $customize_preview_data_hue = '';
    if ( is_customize_preview() ) {
        $customize_preview_data_hue = 'data-hue="' . $hue . '"';
    }
    ?>
    <style type="text/css" id="custom-theme-colors" <?= $customize_preview_data_hue; ?>>
        <?= larissa_custom_colors_css(); ?>
    </style>
    <?php
}
add_action( 'wp_head', 'larissa_colors_css_wrap' );

/**
 * Enqueues scripts and styles.
 */
function larissa_scripts() {
    // // Add custom fonts, used in the main stylesheet.
    // wp_enqueue_style( 'larissa-fonts', larissa_fonts_url(), array(), null );

    // Theme stylesheet.
    wp_enqueue_style( 'larissa-style', get_stylesheet_uri(), array(), '20221101' );

    // Theme block stylesheet.
    wp_enqueue_style( 'larissa-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'larissa-style' ), '20220912' );

    // Load the dark colorscheme.
    if ( 'dark' === get_theme_mod( 'colorscheme', 'light' ) || is_customize_preview() ) {
        wp_enqueue_style( 'larissa-colors-dark', get_theme_file_uri( '/assets/css/colors-dark.css' ), array( 'larissa-style' ), '20191025' );
    }

    wp_enqueue_script( 'larissa-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '20211130', true );

    wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.3', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'larissa_scripts' );

/**
 * Enqueues styles for the block-based editor.
 *
 * @since Larissa 1.8
 */
function larissa_block_editor_styles() {
    // Block styles.
    wp_enqueue_style( 'larissa-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks.css' ), array(), '20220912' );
    // // Add custom fonts.
    // wp_enqueue_style( 'larissa-fonts', larissa_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'larissa_block_editor_styles' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Larissa 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function larissa_content_image_sizes_attr( $sizes, $size ) {
    $width = $size[0];

    if ( 740 <= $width ) {
        $sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
    }

    if ( is_active_sidebar( 'menu-lateral' ) || is_archive() || is_search() || is_home() || is_page() ) {
        if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
            $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
        }
    }

    return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'larissa_content_image_sizes_attr', 10, 2 );

/**
 * Filters the `sizes` value in the header image markup.
 *
 * @since Larissa 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function larissa_header_image_tag( $html, $header, $attr ) {
    if ( isset( $attr['sizes'] ) ) {
        $html = str_replace( $attr['sizes'], '100vw', $html );
    }
    return $html;
}
add_filter( 'get_header_image_tag', 'larissa_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Larissa 1.0
 *
 * @param string[]     $attr       Array of attribute values for the image markup, keyed by attribute name.
 *                                 See wp_get_attachment_image().
 * @param WP_Post      $attachment Image attachment post.
 * @param string|int[] $size       Requested image size. Can be any registered image size name, or
 *                                 an array of width and height values in pixels (in that order).
 * @return string[] The filtered attributes for the image markup.
 */
function larissa_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
    if ( is_archive() || is_search() || is_home() ) {
        $attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
    } else {
        $attr['sizes'] = '100vw';
    }

    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'larissa_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Larissa 1.0
 *
 * @param string $template front-page.php.
 * @return string The template to be used: blank if is_home() is true (defaults to index.php),
 *                otherwise $template.
 */
function larissa_front_page_template( $template ) {
    return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'larissa_front_page_template' );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Larissa 1.4
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function larissa_widget_tag_cloud_args( $args ) {
    $args['largest']  = 1;
    $args['smallest'] = 1;
    $args['unit']     = 'em';
    $args['format']   = 'list';

    return $args;
}
add_filter( 'widget_tag_cloud_args', 'larissa_widget_tag_cloud_args' );

/**
 * Customiza????o dos itens do menu de navega????o
 */
function li_nav_item( $classes, $item, $args, $depth ) {
    if( 'top' === $args->theme_location) {
        $classes[] = 'nav-item';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'li_nav_item', 10, 4 );

/**
 * Customiza????o dos links do menu de navega????o
 */
function li_nav_link( $atts, $item, $args ) {
    if( 'top' === $args->theme_location) {
        $atts['class'] = "nav-link";
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'li_nav_link', 10, 3 );

// /**
//  * Customiza????o do formul??rio de pesquisa
//  */
// function custom_search_form( $form ) {
//     $form = '<form class="d-flex mb-4" role="search" method="get" id="searchform" action="' . home_url( '/' ) . '">
//         <input type="search" class="form-control" placeholder="Pesquisar" value="' . get_search_query() . '" name="s" id="s" />
//         <button type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" class="btn btn-primary ms-2" title="Bot??o Pesquisar">
//             <i class="fa-solid fa-magnifying-glass"></i>
//         </button>
//     </form>';
//     return $form;
// }
// add_filter( 'get_search_form', 'custom_search_form', 10, 1);

/**
 * Gets unique ID.
 *
 * This is a PHP implementation of Underscore's uniqueId method. A static variable
 * contains an integer that is incremented with each call. This number is returned
 * with the optional prefix. As such the returned value is not universally unique,
 * but it is unique across the life of the PHP process.
 *
 * @since Larissa 2.0
 *
 * @see wp_unique_id() Themes requiring WordPress 5.0.3 and greater should use this instead.
 *
 * @param string $prefix Prefix for the returned ID.
 * @return string Unique ID.
 */
function larissa_unique_id( $prefix = '' ) {
    static $id_counter = 0;
    if ( function_exists( 'wp_unique_id' ) ) {
        return wp_unique_id( $prefix );
    }
    return $prefix . (string) ++$id_counter;
}

if ( ! function_exists( 'wp_get_list_item_separator' ) ) :
    /**
     * Retrieves the list item separator based on the locale.
     *
     * Added for backward compatibility to support pre-6.0.0 WordPress versions.
     *
     * @since 6.0.0
     */
    function wp_get_list_item_separator() {
        /* translators: Used between list items, there is a space after the comma. */
        return __( ', ', 'larissa' );
    }
endif;

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

/**
 * Block Patterns.
 */
require get_template_directory() . '/inc/block-patterns.php';
