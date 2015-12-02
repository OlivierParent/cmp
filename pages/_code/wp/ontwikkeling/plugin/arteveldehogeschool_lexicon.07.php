<?php

# …

/**
 * Functie om de metagegevens (de vertalingen) van de Custom Post Type 'graphic_term' op te slaan.
 *
 * @param $graphic_term_id
 * @param $graphic_term
 */
function save_graphic_term_post_meta_data( $graphic_term_id, $graphic_term ) {

    if ( 'graphic_term' == $graphic_term->post_type ) {

        // Frans
        if ( isset( $_POST['graphic_term_fr'] ) && !empty( $_POST['graphic_term_fr'] ) ) {

            $graphic_term_fr = sanitize_text_field( $_POST['graphic_term_fr'] );

            update_post_meta( $graphic_term_id, 'graphic_term_fr',  $graphic_term_fr);
        }

        // Engels
        if ( isset( $_POST['graphic_term_en'] ) && !empty( $_POST['graphic_term_en'] ) ) {

            $graphic_term_en = sanitize_text_field( $_POST['graphic_term_en'] );

            update_post_meta( $graphic_term_id, 'graphic_term_en', $graphic_term_en );
        }

        // Duits
        if ( isset( $_POST['graphic_term_de'] ) && !empty( $_POST['graphic_term_de'] ) ) {

            $graphic_term_de = sanitize_text_field( $_POST['graphic_term_de'] );

            update_post_meta( $graphic_term_id, 'graphic_term_de', $graphic_term_de );
        }

    }

}