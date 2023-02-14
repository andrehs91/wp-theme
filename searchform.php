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

<?php $unique_id = esc_attr( larissa_unique_id( 'search-form-' ) ); ?>
<form role="search" method="get" class="search-form" action="<?= esc_url( home_url( '/' ) ); ?>">
    <label for="<?= $unique_id; ?>">
        <span class="screen-reader-text"><?= _x( 'Search for:', 'label', 'larissa' ); ?></span>
    </label>
    <input type="search" id="<?= $unique_id; ?>" class="search-field" placeholder="<?= esc_attr_x( 'Search &hellip;', 'placeholder', 'larissa' ); ?>" value="<?= get_search_query(); ?>" name="s" />
    <button type="submit" class="search-submit"><?= larissa_get_svg( array( 'icon' => 'search' ) ); ?><span class="screen-reader-text"><?= _x( 'Search', 'submit button', 'larissa' ); ?></span></button>
</form>
