<?php

# …

/**
 * Functie om een nieuwe Custom Post Type te registreren met de naam 'graphic_term' in WordPress.
 */
function register_graphic_term_post_type() {

    $text_domain = 'graphic_term';

    // Labels voor op de menuknoppen.
    $labels = array(
        'name'               => __( 'Graphic Terms'                  , $text_domain ),
        'singular_name'      => __( 'Graphic Term'                   , $text_domain ),
        'add_new'            => __( 'Add new'                        , $text_domain ),
        'add_new_item'       => __( 'Add new Graphic Term'           , $text_domain ),
        'edit_item'          => __( 'Edit Graphic Term'              , $text_domain ),
        'view_item'          => __( 'View Graphic Term'              , $text_domain ),
        'search_items'       => __( 'Search Graphic Terms'           , $text_domain ),
        'not_found'          => __( 'No Graphic Terms found'         , $text_domain ),
        'not_found_in_trash' => __( 'No Graphic Terms found in Trash', $text_domain ),
    );

    $args = array(
        'labels' => $labels,
        'menu_position' => 25, // @link http://codex.wordpress.org/Function_Reference/register_post_type
        'menu_icon' => 'dashicons-media-default', // @link https://developer.wordpress.org/resource/dashicons/
        'public' => true,
        'supports' => array( 'title', 'editor'/*, 'custom-fields'*/ ),
    );

    register_post_type( 'graphic_term', $args );

}