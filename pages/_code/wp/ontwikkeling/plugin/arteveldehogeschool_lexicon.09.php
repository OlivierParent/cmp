<?php

# …

/**
 * Nieuwe pagina om een CSV-bestand (Comma Separated Values) met Grafische termen te uploaden.
 */
function upload_graphic_terms_page() {

    $text_domain = 'graphic_term';

    ?>
    <h2><?php echo __('Upload Graphic Terms', $text_domain); ?></h2>
    <form action="" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
        <input type="file" name="csv-graphic-terms">
        <button type="submit" class="button"><?php echo __('Upload', $text_domain); ?></button>
    </form>
<?php
    if (isset($_FILES['csv-graphic-terms']) && !$_FILES['csv-graphic-terms']['error']) {
        $graphic_terms = array();

        // Bestand inlezen, regel per regel
        $file_name = $_FILES['csv-graphic-terms']['tmp_name'];

        ini_set('auto_detect_line_endings', '1'); // In het geval deze optie in php.ini niet aan zou staan.

        $file = fopen($file_name, 'r');

        if ($file) {
            $i = 0;
            while ($line = fgetcsv($file, null, ';')) {
                if ($i++ > 0) {
                    if ($i % 2 === 0) {
                        $graphic_terms[] = array(
                            'title'   => $line[0],
                            'content' => null,
                            'fr'      => $line[1],
                            'en'      => $line[2],
                            'de'      => $line[3],
                        );
                    } else {
                        $previous_item = count($graphic_terms) - 1;
                        $graphic_terms[$previous_item]['content'] = $line[0];
                    }
                }
            }
            fclose($file);
        }

        $user_ID = get_current_user_id();

        $added_count = 0;

        // Ingelezen gegevens verwerken
        foreach ($graphic_terms as $graphic_term) {

            $post = array(
                'post_title'   => $graphic_term['title'],
                'post_content' => $graphic_term['content'],
                'post_status'  => 'publish',
                'post_type'    => 'graphic_term',
                'post_author'  => $user_ID,
            );

            // Voer de ingesloten code enkel uit als de grafische term nog NIET bestaat.
            if ( !post_graphic_term_exists( $post['post_title'] ) ) {
                // Grafische term toevoegen aan de databasetabel 'wp_post'.
                $graphic_term_id = wp_insert_post($post);

                // Metagegevens (vertalingen) toevoegen voor de nieuwe grafische term aan de databasetabel 'wp_postmeta'.
                if ($graphic_term_id) {
                    $added_count++;
                    foreach (array('en', 'fr', 'de') as $lang) {
                        $key = 'graphic_term_' . $lang;
                        update_post_meta( $graphic_term_id, $key, $graphic_term[$lang] );
                    }
                }
            }

        }

        echo "<p>{$added_count} grafische termen toegevoegd!</p>";
    }

}