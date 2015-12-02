<?php

# …

/*
 * Haak de functie register_graphic_term() vast aan de actie 'init'.
 * De actie 'init' wordt uitgevoerd nadat WordPress ingeladen is, maar voordat de website getoond wordt.
 */
add_action( 'init', 'register_graphic_term_post_type' );