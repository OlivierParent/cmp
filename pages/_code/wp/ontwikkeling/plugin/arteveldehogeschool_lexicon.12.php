<?php

# …

/**
 * Controleer of de grafische term al bestaat. Deze functie is gebaseerd op de functie 'post_exists()'.
 *
 * @param $title
 * @param string $content
 * @param string $date
 *
 * @return int
 */
function post_graphic_term_exists($title, $content = '', $date = '') {
    global $wpdb;

    $post_title   = wp_unslash( sanitize_post_field( 'post_title'  , $title  , 0, 'db' ) );
    $post_content = wp_unslash( sanitize_post_field( 'post_content', $content, 0, 'db' ) );
    $post_date    = wp_unslash( sanitize_post_field( 'post_date'   , $date   , 0, 'db' ) );

    $query = "SELECT ID FROM $wpdb->posts WHERE 1=1";
    $args = array();

    $query .= ' AND post_type = %s';
    $args[] = 'graphic_term';

    if ( !empty ( $date ) ) {
        $query .= ' AND post_date = %s';
        $args[] = $post_date;
    }

    if ( !empty ( $title ) ) {
        $query .= ' AND post_title = %s';
        $args[] = $post_title;
    }

    if ( !empty ( $content ) ) {
        $query .= 'AND post_content = %s';
        $args[] = $post_content;
    }

    if ( !empty ( $args ) )
        return (int) $wpdb->get_var( $wpdb->prepare($query, $args) );

    return 0;
}
