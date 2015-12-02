<?php

# …

/**
 * Functie om een metabox 'graphic_term_meta_box' toe te voegen aan de Custom Post Type pagina voor 'graphic_term'.
 */
function add_graphic_term_meta_box() {

    $text_domain = 'graphic_term';

    $id       = 'graphic_term_meta_box';          // Id van de meta box.
    $title    = __('Translations', $text_domain); // Titel van de meta box.
    $callback = 'display_graphic_term_meta_box';  // Roept de functie display_graphic_concept_meta_box() aan.
    $screen   = 'graphic_term'; // Toon de meta box op het scherm voor het Custom Post Type 'graphic_term'.
    $context  = 'normal'; // Context waarin de meta box getoond moet worden. Keuze uit 'normal', 'side' of 'advanced'.

    add_meta_box( $id, $title, $callback, $screen, $context );

}