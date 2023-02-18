<?php

/**
 * Template for displaying search forms in Larissa
 *
 * @package WordPress
 * @subpackage Larissa
 * @since Larissa 1.0
 * @version 1.0
 */

?>

<form role="search" method="get" class="d-flex" id="searchform" action="<?= esc_url( home_url( '/' ) ); ?>">
    <input type="search" class="form-control" placeholder="Pesquisar" value="<?= get_search_query(); ?>" name="s" id="s" />
    <button type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" class="btn btn-primary ms-2" title="Botão Pesquisar">
        <i class="fa-solid fa-magnifying-glass"></i>
    </button>
</form>
