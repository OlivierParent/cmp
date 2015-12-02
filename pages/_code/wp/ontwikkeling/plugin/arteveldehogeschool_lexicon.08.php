<?php

# …

/*
 * Haak de functie save_graphic_term_post_meta_data() vast aan de actie 'save_post'.
 */
add_action( 'save_post', 'save_graphic_term_post_meta_data', null , $accepted_args = 2 /* parameters: $graphic_term_id en $graphic_term) */ );
