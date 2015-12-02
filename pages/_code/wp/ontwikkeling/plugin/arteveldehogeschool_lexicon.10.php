<?php

# …

/**
 * Voegt menu-item toe voor de uploadpagina.
 */
function add_upload_graphic_terms_submenu_page() {

    $text_domain = 'graphic_term';

    $parent_slug = 'edit.php?post_type=graphic_term';
    $page_title  = __('Upload Graphic Terms', $text_domain ); // Titel van de pagina (<title>-element)
    $menu_title  = __('Upload Graphic Terms', $text_domain );
    $capability  = 'publish_posts'; // @link http://codex.wordpress.org/Roles_and_Capabilities
    $menu_slug   = 'upload-graphic-terms';
    $callback    = 'upload_graphic_terms_page';
    $icon_url    = 'dashicons-media-spreadsheet'; // @link https://developer.wordpress.org/resource/dashicons/
    $position    = 27; // @link https://developer.wordpress.org/reference/functions/add_menu_page/

    add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $callback );
    add_menu_page (                 $page_title, $menu_title, $capability, $menu_slug, $callback, $icon_url, $position );
}