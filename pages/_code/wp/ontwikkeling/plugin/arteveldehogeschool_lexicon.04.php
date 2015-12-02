<?php

# …

/**
 * Functie om de meta box van het Custom Post Type 'graphic_term' te tonen.
 *
 * @param $graphic_term
 */
function display_graphic_term_meta_box( $graphic_term ) {

    $text_domain = 'graphic_term';

    $graphic_term_translation = array(
      'fr' => esc_html( get_post_meta( $graphic_term->ID, 'graphic_term_fr', true ) ),
      'en' => esc_html( get_post_meta( $graphic_term->ID, 'graphic_term_en', true ) ),
      'de' => esc_html( get_post_meta( $graphic_term->ID, 'graphic_term_de', true ) ),
    );

    ?>
    <table width="100%">
        <tr>
            <th><?php _e( 'Language', $text_domain ); ?></th>
            <th style="text-align: left"><?php _e( 'Translation', $text_domain ); ?></th>
        </tr>
        <tr>
            <td>français</td>
            <td><input type="text" name="graphic_term_fr" value="<?php echo $graphic_term_translation['fr']; ?>" /></td>
        </tr>
        <tr>
            <td>English</td>
            <td width="100%"><input type="text" name="graphic_term_en" value="<?php echo $graphic_term_translation['en']; ?>" /></td>
        </tr>
        <tr>
            <td>Deutsch</td>
            <td width="100%"><input type="text" name="graphic_term_de" value="<?php echo $graphic_term_translation['de']; ?>" /></td>
        </tr>
    </table>
<?php

}