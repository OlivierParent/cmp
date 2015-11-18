---
layout    : page
title     : Plugin
title_long: Pluginontwikkeling
permalink : wp/ontwikkeling/plugin/
published : false
tags      :
---

Wat is een Plugin?
------------------

Een plugin is een stuk(je) software waarmee je de **functionaliteiten** toevoegt aan WP.  Het grote aantal [beschikbare plugins](https://wordpress.org/plugins/) die door een levendige community gemaakt wordt, is één van de reden dat WP zo populair is.

Plugins Beheren
---------------

### Plugin Updaten

**Dashboard** → **Updates**, vink de nodige de Plugins aan en klik op **Plugins Bijwerken**. 

![Dashboard Updates 00](http://olivierparent.byethost18.com/_assets/CMP/Dashboard_Updates_00.png "Dashboard Updates 00")

Als de Plugins bijgewerkt zijn, kan je naar een andere pagina gaan.

![Dashboard Updates 01](http://olivierparent.byethost18.com/_assets/CMP/Dashboard_Updates_00.png "Dashboard Updates 01")

Plugin Ontwikkelen
------------------

> **Zie ook**
>
> - [WordPress / Developer Resources / Plugin Handbook](https://developer.wordpress.org/plugins/)

We gaan een nieuwe plugin maken om lijsten met woordvertalingen te maken van **Grafische Termen**. Deze plugin gaan we gebruiken om een *Custom Post Type* voor deze grafische termen toe te voegen aan WP.

### Wat zijn *Custom Post Types?*

Je hebt een aantal **standaard** Post Types *(Default Post Types):*

 - Berichten
 - Media
 - Pagina's
 - Reacties
 - Menu's

Maar je kan ook je **eigen** Post Types *(Custom Post Types)* maken.

### *Custom Post Type* definiëren

Het is mogelijk om een *Custom Post Type* te definiëren in een Thema, maar aangezien het uitbreidingen zijn op de functionaliteiten van WordPress betreft en niet rechtstreeks met het uitzicht te maken heeft, is het logischer om er een **Plugin** voor te maken.

We gaan een *Custom Post Type* maken voor een **Grafische term**. Een grafische term heeft deze eigenschappen:

 - Naam (de Titel)
 - Beschrijving (de Content)
 - Vertalingen:
	 - Frans
	 - Engels
	 - Duits

#### Plugin Maken

We maken een nieuwe Plugin met de naam `arteveldehogeschool_lexicon`. Dit doen we door een nieuwe **map** met deze naam te maken in de map `wordpress/wp-content/plugins/` en een **PHP-bestand** met dezelfde naam erin te zetten. 

> **Mappen en bestanden**
>
>     ~/Code/cmp.arteveldehogeschool.local/
>     └── www/
>         ├── scripts/
>         └── wordpress/
>             └── wp-content/
>                 └── plugins/
>                     └── arteveldehogeschool_lexicon/
>                         ├── arteveldehogeschool_lexicon.php
>                         └── languages/

Het PHP-bestand `arteveldehogeschool_lexicon.php` moet deze code bevatten:

```php
<?php
/*
Plugin Name: Artveldehogeschool Grafisch Lexicon Vertalingen
Plugin URI: http://www.arteveldehogeschool.be/
Description: Plugin voor Vertalingen van vaktermen in het Grafisch Lexicon.
Version: 1.0.0
Author: Olivier Parent
Author URI: http://www.olivierparent.be/
Text Domain: arteveldehogeschool
License: GPLv2
*/
```

Bovenstaande code bevat de **metagegevens** van de Plugin.

#### Plugin Activeren

Nu de plugin bestaat, moeten we deze activeren in **Sitebeheer**:

**Plugins** → **Geïnstalleerde plugins**

Zoek in de lijst plugins naar **Artveldehogeschool Grafisch Lexicon Vertalingen** en klik op **Activeren**.

#### Plugin Vertalen

WP is geschreven in het Engels en daarna vertaald naar verschillende talen waaronder het Nederlands. Wij gaan onze Plugin ook in het Engels schrijven en een Nederlandse vertaling toevoegen.

> Een stuk software vertalen duidt men vaak aan met de termen `l10n` of `i18n`.
>
> | Term   | Betekenis                | Verklaring                          |
> |--------|--------------------------|-------------------------------------|
> | `i18n` | **Internationalization** | `18` tekens tussen de `i` en `n`).  |
> | `l10n` | **Localization**         | `10` tekens tussenn de `l` en `n`). |

##### Vertaalbestanden

WP gebruikt het opensource [Gettext](https://www.gnu.org/software/gettext/)-systeem voor vertalingen.  De vertalingen worden in `.po`-bestanden geschreven die daarna naar `.mo`-bestanden gecompileerd worden.

| Extensie | Type bestand             | Inhoud                                      |
|----------|--------------------------|---------------------------------------------|
| `.pot`   | Portable Object Template | Vertaalbare tekenstrings (voor alle talen). |
| `.po`    | Portable Object          | Vertaalde tekenstrings (voor één taal).     |
| `.mo`    | Machine Object           | Gecompileerde versie van het `.po`-bestand. |

> **Tip:** Je kan [Poedit](http://poedit.net/) gebruiken om `.po`-bestanden te bewerken en te compileren naar `.mo` bestanden.
> **Bestand** → **Naar MO Compileren…**

We maken in de map `languages` van onze Plugin een nieuw vertaalbestand voor het *Custom Post Type* met de naam `graphic_term`.  De naam van ons vertaalbestand moet bestaan uit de naam van het *Text Domain* (hiervoor nemen we dezelfde naam als die van het *Custom Post Type:* `graphic_term`) gevolgd door de taalcode die bestaat uit de **ISO 639-1**-code voor de taal (`nl`) plus de **ISO 3166-1 alpha-2**-code voor het land (`NL`) voor de variant van de taal:

Maak met een teksteditor het bestand `graphic_term-nl_NL.po` en geeft het deze inhoud:
```po
msgid ""
msgstr ""
"Project-Id-Version: ArteveldehogeschoolLexicon\n"
"POT-Creation-Date: 2014-09-01 12:45+0100\n"
"PO-Revision-Date: 2014-09-01 12:45+0100\n"
"Last-Translator: Olivier Parent\n"
"Language-Team: Arteveldehogeschool\n"
"Language: nl_NL\n"
"MIME-Version: 1.0\n"
"Content-Type: text/plain; charset=UTF-8\n"
"Content-Transfer-Encoding: 8bit\n"
"X-Generator: Poedit 1.7.1\n"
"X-Poedit-Basepath: ..\n"
"X-Poedit-SourceCharset: UTF-8\n"
"X-Poedit-KeywordsList: __;_e;_n:1,2;_x:1,2c;_ex:1,2c;_nx:4c,1,2;esc_attr__;"
"esc_attr_e;esc_attr_x:1,2c;esc_html__;esc_html_e;esc_html_x:1,2c;_n_noop:1,2;"
"_nx_noop:3c,1,2;__ngettext_noop:1,2\n"
"Plural-Forms: nplurals=2; plural=(n != 1);\n"
"X-Poedit-SearchPath-0: .\n"

#: arteveldehogeschool_lexicon.php:30
msgid "Graphic Terms"
msgstr "Grafische termen"

#: arteveldehogeschool_lexicon.php:31
msgid "Graphic Term"
msgstr "Grafische term"

#: arteveldehogeschool_lexicon.php:32
msgid "Add new"
msgstr "Nieuwe grafische term"

#: arteveldehogeschool_lexicon.php:33
msgid "Add new Graphic Term"
msgstr "Nieuwe grafische term toevoegen"

#: arteveldehogeschool_lexicon.php:34
msgid "Edit Graphic Term"
msgstr "Grafische term bewerken"

#: arteveldehogeschool_lexicon.php:35
msgid "View Graphic Term"
msgstr "Grafische term bekijken"

#: arteveldehogeschool_lexicon.php:36
msgid "Search Graphic Terms"
msgstr "Zoek grafische termen"

#: arteveldehogeschool_lexicon.php:37
msgid "No Graphic Terms found"
msgstr "Geen grafische termen gevonden"

#: arteveldehogeschool_lexicon.php:38
msgid "No Graphic Terms found in Trash"
msgstr "Geen grafische termen gevonden in de Prullenbak"

#: arteveldehogeschool_lexicon.php:103
msgid "Translations"
msgstr "Vertalingen"
```

##### Vertaalbestanden Inladen

> **Zie ook**
>
> - [WordPress.org / Code Reference / Functions / `load_plugin_textdomain()`](https://developer.wordpress.org/reference/functions/load_plugin_textdomain/)
> - [PHP / Manual / Function Reference / `dirname()`](http://php.net/manual/en/function.dirname.php)
> - [PHP / Manual / Function Reference / `basename()`](http://php.net/manual/en/function.basename.php)

Bovenaan in `arteveldehogeschool_lexicon.php` gaan we de vertalingen inladen met de functie `load_plugin_textdomain()`.  Het eerste argument van de functie is de naam van het *Text Domain* (`graphic_term`, dit komt ook voor in de naam van het vertaalbestand) en het laatste argument is de locatie van de map met vertaalbestanden relatief ten opzichte van de map `plugins` van WP. Deze locatie is `arteveldehogeschool_lexicon/languages`, maar het is beter om deze naam met functies te bepalen zodat je de plugin kan hernoemen of verplaatsen zonder dat de code aangepast moet worden. 

```php
load_plugin_textdomain('graphic_term', false, basename( dirname( __FILE__ ) ) . '/languages' );
```

##### Vertalingen Toepassen

> **Zie ook**
>
> - [WordPress.org / Code Reference / Functions / `__()`](https://developer.wordpress.org/reference/functions/__/)
> - [WordPress.org / Code Reference / Functions / `_x()`](https://developer.wordpress.org/reference/functions/_x/)
> - [WordPress.org / Code Reference / Functions / `_n()`](https://developer.wordpress.org/reference/functions/_n/)
> - [WordPress.org / Code Reference / Functions / `_nx()`](https://developer.wordpress.org/reference/functions/_nx/)

In de Plugin gebruik je de functie `__()` om tekst te vertalen. Het eerste argument is tekenstring die vertaald moet worden en de tweede is het *Text Domain* waaruit de vertaling gehaald moet worden. Indien geen vertaling gevonden wordt, dan wordt de tekenstring die vertaald moet worden teruggegeven.

Bijvoorbeeld:
```
__('Graphic Terms', 'graphic_term')
```

#### *Custom Post Type* Registreren

##### Functie

We maken nieuwe functie om de Custom Post Type voor een 'grafische term' te registreren. Deze Custom Post Type heeft als naam `graphic_term`. We noemen de  functie `register_graphic_term_post_type()`:

```php
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
```

##### Hook

> **Zie ook**
>
> - [WordPress.org / Code Reference / Functions / `add_action()`](https://developer.wordpress.org/reference/functions/add_action/)
> - [WordPress.org / Code Reference / Hooks / `init`](https://developer.wordpress.org/reference/hooks/init/)

Deze functie moeten we nu ook nog laten uitvoeren op het juiste ogenblik. WP voert een aantal **Acties** bij het opbouwen van een pagina. Aan elk van deze acties kunnen we eigen functies *vasthaken* aan een **Hook.**

We gaan onze functie `register_graphic_term_post_type()` vasthaken aan de Hook `init`, zodat onze functie uitgevoerd wordt tijdens de Actie `init`.

```php
add_action( 'init', 'register_graphic_term_post_type' );
```

Vanaf nu verschijnt er een nieuw menu in Sitebeheer.

#### *Meta Box* Tonen

##### Functie om Meta Box te tonen en toevoegen

> **Zie ook**
>
> - [WordPress.org / Code Reference / Functions / `get_post_meta()`](https://developer.wordpress.org/reference/functions/get_post_meta/)
> - [WordPress.org / Code Reference / Functions / `esc_html()`](https://developer.wordpress.org/reference/functions/esc_html/)
> - [WordPress.org / Code Reference / Functions / `_e()`](https://developer.wordpress.org/reference/functions/_e/)

Als een nieuwe Grafische term aangemaakt wordt, dan moet onder het tekstgebied voor de inhoud nog 3 inputvelden getoond worden in een **Meta Box**. In de standaard WP-lay-out moeten we hiervoor helaas een tabel gebruiken.

```php
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
```

##### Functie om Meta Box toe te voegen

> **Zie ook**
>
> - [WordPress.org / Code Reference / Functions / `add_meta_box()`](https://developer.wordpress.org/reference/functions/add_meta_box/)

Nu we een functie `display_graphic_term_meta_box()` hebben om de Meta Box te tonen op de beheerpagina van het *Custom Post Type* `graphic_term` , kunnen we deze aanroepen in een nieuwe functie `add_graphic_term_meta_box()` waarmee we de Meta Box toevoegen aan de pagina.

We geven de Meta Box de titel 'Translations' die naar het Nederlands vertaald wordt als 'Vertalingen'.

```php
function add_graphic_term_meta_box() {

    $text_domain = 'graphic_term';

    $id       = 'graphic_term_meta_box';          // Id van de meta box.
    $title    = __('Translations', $text_domain); // Titel van de meta box.
    $callback = 'display_graphic_term_meta_box';  // Roept de functie display_graphic_concept_meta_box() aan.
    $screen   = 'graphic_term'; // Toon de meta box op het scherm voor het Custom Post Type 'graphic_term'.
    $context  = 'normal'; // Context waarin de meta box getoond moet worden. Keuze uit 'normal', 'side' of 'advanced'.

    add_meta_box( $id, $title, $callback, $screen, $context );

}
```

##### Hook

> **Zie ook**
>
> - [WordPress.org / Code Reference / Functions / `add_action()`](https://developer.wordpress.org/reference/functions/add_action/)
> - [WordPress.org / Code Reference / Hooks / `admin_init`](https://developer.wordpress.org/reference/hooks/admin_init/)

We gaan onze functie `add_graphic_term_meta_box()` vasthaken aan de Hook `admin_init`, zodat onze functie uitgevoerd wordt tijdens de Actie `admin_init`.

```php
add_action( 'admin_init', 'add_graphic_term_meta_box' );
```

#### *Meta Box*-gegevens opslaan

##### Functie

> **Zie ook**
>
> - [PHP / Manual / Function Reference / `isset()`](http://php.net/manual/en/function.isset.php)
> - [PHP / Manual / Function Reference / `empty()`](http://php.net/manual/en/function.empty.php)
> - [WordPress.org / Code Reference / Functions / `sanitize_text_field()`](https://developer.wordpress.org/reference/functions/sanitize_text_field/)
> - [WordPress.org / Code Reference / Functions / `update_post_meta()`](https://developer.wordpress.org/reference/functions/update_post_meta/)

De gegevens in de Meta Box worden niet automatisch opgeslagen. Daarom moeten we hier zelf een functie voor maken. We moeten van elke vertaling controleren of er een POST-variabele (`$_POST`) **bestaat** (`isset`) en zo ja, moeten we nagaan of deze **niet** (`!`) **leeg** (`empty()`) is.

Voordat de gegevens opgeslagen kan worden moeten we vermijden dat schadelijke code de database of de website kan beschadigen door de functie `sanitize_text_field()` op de gegevens toe te passen. Tenslotte kunnen we de gegevens opslaan met de functie `update_post_meta()`.

```php
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
```

##### Hook

> **Zie ook**
>
> - [WordPress.org / Code Reference / Functions / `add_action()`](https://developer.wordpress.org/reference/functions/add_action/)
> - [WordPress.org / Code Reference / Hooks / `save_post`](https://developer.wordpress.org/reference/hooks/save_post/)

De functie `save_graphic_term_post_meta_data()` moet uitgevoerd worden nadat de *Custom Post Type* opgeslagen wordt. Daarom haken we ze vast aan de Hook `save_post`.

De functie heeft 2 parameters (`$graphic_term_id` en `$graphic_term`) die elk als argument meegegeven moeten worden, daarom moeten we als vierde argument het cijfer `2` meegeven aan de functie. Hierdoor moeten we ook argument drie meegeven dat de prioriteit (volgorde van uitvoeren) bepaalt. Deze willen we niet wijzigen, daarom geven we `null` mee (wat eigenlijk 'geen waarde' betekent) zodat de functie de voorafgedefinieerde standaardwaarde (`10`) gebruikt.

```php
add_action( 'save_post', 'save_graphic_term_post_meta_data', null , 2);
```

#### Pagina maken om de Custom Post Types te uploaden

##### Functie voor uploadpagina

Deze functie maakt een uploadpagina met formulier en verwerkt het formulier waneer het verstuurd is. Er wordt enkel een nieuwe grafische term toegevoegd als die nog niet in de database bestaat. De controle gebeurt met de functie `post_graphic_term_exists()` (zie D).

> **Zie ook**
>
> - [PHP / Manual / Function Reference / `isset()`](http://php.net/manual/en/function.isset.php)
> - [PHP / Manual / Function Reference / `ini_set()`](http://php.net/manual/en/function.ini-set.php)
> - [PHP / Manual / Function Reference / `fopen()`](http://php.net/manual/en/function.fopen.php)
> - [PHP / Manual / Function Reference / `fgetcsv()`](http://php.net/manual/en/function.fgetcsv.php)
> - [PHP / Manual / Function Reference / `fclose()`](http://php.net/manual/en/function.fclose.php)
> - [PHP / Manual / Function Reference / `count()`](http://php.net/manual/en/function.count.php)
> - [WordPress.org / Code Reference / Functions / `get_current_user_id()`](https://developer.wordpress.org/reference/functions/get_current_user_id/)
> - [WordPress.org / Code Reference / Functions / `wp_insert_post()`](https://developer.wordpress.org/reference/functions/wp_insert_post/)

```php
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
```

##### Functie om een menu-item toe te voegen

> **Zie ook**
>
> - [WordPress.org / Code Reference / Functions / `add_menu_page()`](https://developer.wordpress.org/reference/functions/add_menu_page/)
> - [WordPress.org / Code Reference / Functions / `add_submenu_page()`](https://developer.wordpress.org/reference/functions/add_submenu_page/)

Deze functie voegt een menu-item voor de uploadpagina toe aan het menu. De functie doet dit twee maal: een keer als submenu en een keer als menu. Dit is enkel om het verschil te demonstreren, normaal kies je maar een van de twee.

```php
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
```

##### Hook

> **Zie ook**
>
> - [WordPress.org / Code Reference / Functions / `add_action()`](https://developer.wordpress.org/reference/functions/add_action/)
> - [WordPress.org / Code Reference / Hooks / `admin_menu`](https://developer.wordpress.org/reference/hooks/admin_menu/)


We gaan onze functie `add_upload_graphic_terms_submenu_page()` vasthaken aan de Hook `admin_init`, zodat onze functie uitgevoerd wordt tijdens de Actie `admin_init`.


```php
add_action( 'admin_menu', 'add_upload_graphic_terms_submenu_page' );
```

###### d. Functie om te controleren of een grafische  term al bestaat in de 

> **Zie ook**
>
> - [WordPress.org / Code Reference / Functions / `post_exists()`](https://developer.wordpress.org/reference/functions/post_exists/)
> - [WordPress.org / Code Reference / Functions / `sanitize_post_field()`](https://developer.wordpress.org/reference/functions/sanitize_post_field/)
> - [WordPress.org / Code Reference / Functions / `wp_unslash()`](https://developer.wordpress.org/reference/functions/wp_unslash/)
> - [WordPress.org / Code Reference / Classes / `wpdb`](https://developer.wordpress.org/reference/classes/wpdb/)
> - [WordPress.org / Code Reference / Classes / `wpdb` / `get_var()`](https://developer.wordpress.org/reference/classes/wpdb/get_var/)
> - [WordPress.org / Code Reference / Classes / `wpdb` / `prepare()`](https://developer.wordpress.org/reference/classes/wpdb/prepare/)

De onderstaande functie is gebaseerd op de standaard WP-functie [`post_exists()`](https://developer.wordpress.org/reference/functions/post_exists/#source-code), maar dan aangepast zodat enkel posts van het type *Custom Post Type* `graphic_term` gecontroleerd worden. Deze functie gebruikt een normale MySQL-query.

```php
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

```



{% comment %}
<!-- ⚓ Afkortingen -->
{% endcomment %}
*[WP]:                      WordPress

{% comment %}
<!-- ⚓ Hyperlinks -->
{% endcomment %}
[artestead]:                http://www.olivierparent.be/artestead
[automattic]:               http://automattic.com
[semver]:                   http://semver.org
[wp-com]:                   https://wordpress.com
[wp-org]:                   https://wordpress.org
[wp-svn]:                   http://core.svn.wordpress.org