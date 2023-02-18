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
    </div><!-- .container -->
    <footer class="bg-secondary">
        <?php if ( is_active_sidebar( 'rodape' ) ) dynamic_sidebar( 'rodape' ); ?>
    </footer>
<?php wp_footer(); ?>
<script src="<?= get_theme_file_uri( '/assets/js/bootstrap.js' ); ?>"></script>
</body>
</html>
