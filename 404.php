<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Larissa
 * @since Larissa 1.0
 * @version 1.0
 */

get_header();
?>

<main class="col-12 col-lg-9">
    <div class="alert alert-primary" role="alert">404.php</div>
    <div class="alert alert-primary m-0" role="alert">Parece que nada foi encontrado neste local. Que tal fazer uma pesquisa?</div>
</main>
<aside class="col-12 col-lg-3 ps-lg-4">
    <?php get_sidebar(); ?>
</aside>

<?php
get_footer();
