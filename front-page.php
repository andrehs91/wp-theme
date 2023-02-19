<?php

/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Larissa
 * @since Larissa 1.0
 * @version 1.0
 */

get_header();
?>

<div id="primary" class="content-area">
    <div class="alert alert-primary" role="alert">front-page.php</div>
    <main id="main" class="site-main">
        <?php
        // Show the selected front page content.
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/page/content', 'front-page' );
            endwhile;
        else :
            get_template_part( 'template-parts/post/content', 'none' );
        endif;
        // Get each of our panels and show the post data.
        if ( 0 !== larissa_panel_count() || is_customize_preview() ) : // If we have pages to show.
            /**
             * Filters the number of front page sections in Larissa.
             *
             * @since Larissa 1.0
             *
             * @param int $num_sections Number of front page sections.
             */
            $num_sections = apply_filters( 'larissa_front_page_sections', 4 );
            global $larissacounter;
            // Create a setting and control for each of the sections available in the theme.
            for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
                $larissacounter = $i;
                larissa_front_page_section( null, $i );
            }
        endif; // The if ( 0 !== larissa_panel_count() ) ends here.
        ?>
    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
