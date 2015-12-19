---
layout    : page
title     : Plugin
title_long: Pluginontwikkeling
permalink : wp/ontwikkeling/plugin/
published : true
tags      :
---

Wat is een Plugin?
------------------

Een plugin is een stuk(je) software waarmee je de **functionaliteiten** toevoegt aan WP.  Het grote aantal [beschikbare plugins](https://wordpress.org/plugins/) die door een levendige community gemaakt wordt, is één van de reden dat WP zo populair is.

**Dashboard** → **Plugins**.

![Plugins]({{ site.baseurl }}/images/ontwikkeling/plugin/plugins.png "Plugins"){:.screenshot}

Plugins Beheren
---------------

### Plugin Updaten

**Dashboard** → **Plugins**, vink de nodige de Plugins aan en klik op **nu bijwerken**.

![Dashboard Updates 00]({{ site.baseurl }}/images/ontwikkeling/plugin/update.00.png "Dashboard Updates 00"){:.screenshot}

Als de Plugins bijgewerkt zijn, kan je naar een andere pagina gaan.

![Dashboard Updates 01]({{ site.baseurl }}/images/ontwikkeling/plugin/update.01.png "Dashboard Updates 01"){:.screenshot}

Plugin Ontwikkelen
------------------

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [WordPress / Developer Resources / Plugin Handbook](https://developer.wordpress.org/plugins/)
{:.card .card-block}

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

> ##### Mappen & Bestanden *:open_file_folder:*{:.pull-left .m-r}
> ---
>```
> cmp.arteveldehogeschool.local/
> ├── www/
> │   ├── data/
> │   │   └── graphic_terms.csv
> │   ├── scripts/
> │   └── wordpress/
> │       └── wp-content/
> │           ├── plugins/
> │           │   └── arteveldehogeschool_lexicon/
> │           │       ├── arteveldehogeschool_lexicon.php
> │           │       └── languages/
> │           │           ├── graphic_term-nl_NL.mo
> │           │           └── graphic_term-nl_NL.po
> │           └── themes/
> └── README.md
>```
{:.card .card-block}

Het PHP-bestand `arteveldehogeschool_lexicon.php` moet deze code bevatten:

{% highlight php %}
{% include_relative _code/wp/ontwikkeling/plugin/arteveldehogeschool_lexicon.00.php %}
{% endhighlight %}

Bovenstaande code bevat de **metagegevens** van de Plugin.

#### Plugin Activeren

Nu de plugin bestaat, moeten we deze activeren in **Sitebeheer**:

**Plugins** → **Geïnstalleerde plugins**

![Artveldehogeschool Grafisch Lexicon Vertalingen 00]({{ site.baseurl }}/images/ontwikkeling/plugin/arteveldehogeschool.00.png "Artveldehogeschool Grafisch Lexicon Vertalingen 00"){:.screenshot}

Zoek in de lijst plugins naar **Artveldehogeschool Grafisch Lexicon Vertalingen** en klik op **Activeren**.

![Artveldehogeschool Grafisch Lexicon Vertalingen 01]({{ site.baseurl }}/images/ontwikkeling/plugin/arteveldehogeschool.01.png "Artveldehogeschool Grafisch Lexicon Vertalingen 01"){:.screenshot}

#### Plugin Vertalen

WP is geschreven in het Engels en daarna vertaald naar verschillende talen waaronder het Nederlands. Wij gaan onze Plugin ook in het Engels schrijven en een Nederlandse vertaling toevoegen.

Een stuk software vertalen duidt men vaak aan met de termen `l10n` of `i18n`.

| Term   | Betekenis                | Verklaring                         |
|--------|--------------------------|------------------------------------|
| `i18n` | **Internationalization** | `18` tekens tussen de `i` en `n`). |
| `l10n` | **Localization**         | `10` tekens tussen de `l` en `n`). |
{:.table}

##### Vertaalbestanden

WP gebruikt het opensource [Gettext](https://www.gnu.org/software/gettext/)-systeem voor vertalingen.  De vertalingen worden in `.po`-bestanden geschreven die daarna naar `.mo`-bestanden gecompileerd worden.

| Extensie | Type bestand             | Inhoud                                      |
|----------|--------------------------|---------------------------------------------|
| `.pot`   | Portable Object Template | Vertaalbare tekenstrings (voor alle talen). |
| `.po`    | Portable Object          | Vertaalde tekenstrings (voor één taal).     |
| `.mo`    | Machine Object           | Gecompileerde versie van het `.po`-bestand. |
{:.table}

> ##### **Tip** *:bulb:*{:.pull-left .m-r}
> ---
> Je kan [Poedit](http://poedit.net/) gebruiken om `.po`-bestanden te bewerken en te compileren naar `.mo` bestanden.
> **Bestand** → **Naar MO Compileren…**
{:.alert .alert-info}

We maken in de map `languages` van onze Plugin een nieuw vertaalbestand voor het *Custom Post Type* met de naam `graphic_term`.  De naam van ons vertaalbestand moet bestaan uit de naam van het *Text Domain* (hiervoor nemen we dezelfde naam als die van het *Custom Post Type:* `graphic_term`) gevolgd door de taalcode die bestaat uit de **ISO 639-1**-code voor de taal (`nl`) plus de **ISO 3166-1 alpha-2**-code voor het land (`NL`) voor de variant van de taal:

Maak met een teksteditor het bestand `graphic_term-nl_NL.po` en geeft het deze inhoud:

{% highlight po %}
{% include_relative _code/wp/ontwikkeling/plugin/graphic_term-nl_NL.po %}
{% endhighlight %}

##### Vertaalbestanden Inladen

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [WordPress.org / Code Reference / Functions / `load_plugin_textdomain()`](https://developer.wordpress.org/reference/functions/load_plugin_textdomain/)
> - [PHP / Manual / Function Reference / `dirname()`](http://php.net/manual/en/function.dirname.php)
> - [PHP / Manual / Function Reference / `basename()`](http://php.net/manual/en/function.basename.php)
{:.card .card-block}

Bovenaan in `arteveldehogeschool_lexicon.php` gaan we de vertalingen inladen met de functie `load_plugin_textdomain()`.  Het eerste argument van de functie is de naam van het *Text Domain* (`graphic_term`, dit komt ook voor in de naam van het vertaalbestand) en het laatste argument is de locatie van de map met vertaalbestanden relatief ten opzichte van de map `plugins` van WP. Deze locatie is `arteveldehogeschool_lexicon/languages`, maar het is beter om deze naam met functies te bepalen zodat je de plugin kan hernoemen of verplaatsen zonder dat de code aangepast moet worden. 

{% highlight php %}
{% include_relative _code/wp/ontwikkeling/plugin/arteveldehogeschool_lexicon.01.php %}
{% endhighlight %}

##### Vertalingen Toepassen

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [WordPress.org / Code Reference / Functions / `__()`](https://developer.wordpress.org/reference/functions/__/)
> - [WordPress.org / Code Reference / Functions / `_x()`](https://developer.wordpress.org/reference/functions/_x/)
> - [WordPress.org / Code Reference / Functions / `_n()`](https://developer.wordpress.org/reference/functions/_n/)
> - [WordPress.org / Code Reference / Functions / `_nx()`](https://developer.wordpress.org/reference/functions/_nx/)
{:.card .card-block}

In de Plugin gebruik je de functie `__()` om tekst te vertalen. Het eerste argument is tekenstring die vertaald moet worden en de tweede is het *Text Domain* waaruit de vertaling gehaald moet worden. Indien geen vertaling gevonden wordt, dan wordt de tekenstring die vertaald moet worden teruggegeven.

Bijvoorbeeld: 

{% highlight php %}
__('Graphic Terms', 'graphic_term')
{% endhighlight %}

#### *Custom Post Type* Registreren

##### Functie

We maken nieuwe functie om de Custom Post Type voor een 'grafische term' te registreren. Deze Custom Post Type heeft als naam `graphic_term`. We noemen de  functie `register_graphic_term_post_type()`:

{% highlight php %}
{% include_relative _code/wp/ontwikkeling/plugin/arteveldehogeschool_lexicon.02.php %}
{% endhighlight %}

##### Hook

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [WordPress.org / Code Reference / Functions / `add_action()`](https://developer.wordpress.org/reference/functions/add_action/)
> - [WordPress.org / Code Reference / Hooks / `init`](https://developer.wordpress.org/reference/hooks/init/)
{:.card .card-block}

Deze functie moeten we nu ook nog laten uitvoeren op het juiste ogenblik. WP voert een aantal **Acties** bij het opbouwen van een pagina. Aan elk van deze acties kunnen we eigen functies *vasthaken* aan een **Hook.**

We gaan onze functie `register_graphic_term_post_type()` vasthaken aan de Hook `init`, zodat onze functie uitgevoerd wordt tijdens de Actie `init`.

{% highlight php %}
{% include_relative _code/wp/ontwikkeling/plugin/arteveldehogeschool_lexicon.03.php %}
{% endhighlight %}

Vanaf nu verschijnt er een nieuw menu-item 'Grafische termen' in het Dashboard.

![Artveldehogeschool Grafisch Lexicon Vertalingen 02]({{ site.baseurl }}/images/ontwikkeling/plugin/arteveldehogeschool.02.png "Artveldehogeschool Grafisch Lexicon Vertalingen 02"){:.screenshot}

#### *Meta Box* Tonen

##### Functie om Meta Box te tonen en toevoegen

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [WordPress.org / Code Reference / Functions / `get_post_meta()`](https://developer.wordpress.org/reference/functions/get_post_meta/)
> - [WordPress.org / Code Reference / Functions / `esc_html()`](https://developer.wordpress.org/reference/functions/esc_html/)
> - [WordPress.org / Code Reference / Functions / `_e()`](https://developer.wordpress.org/reference/functions/_e/)
{:.card .card-block}

Als we een **Nieuwe grafische term** willen aanmaken ziet het scherm er voorlopig zo uit:

![Artveldehogeschool Grafisch Lexicon Vertalingen 03]({{ site.baseurl }}/images/ontwikkeling/plugin/arteveldehogeschool.03.png "Artveldehogeschool Grafisch Lexicon Vertalingen 03"){:.screenshot}

Onder het tekstgebied voor de inhoud moeten nog 3 inputvelden getoond worden in een **Meta Box**. In de standaard WP-lay-out moeten we hiervoor helaas een tabel gebruiken.

{% highlight php %}
{% include_relative _code/wp/ontwikkeling/plugin/arteveldehogeschool_lexicon.04.php %}
{% endhighlight %}

##### Functie om Meta Box toe te voegen

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [WordPress.org / Code Reference / Functions / `add_meta_box()`](https://developer.wordpress.org/reference/functions/add_meta_box/)
{:.card .card-block}

Nu we een functie `display_graphic_term_meta_box()` hebben om de Meta Box te tonen op de beheerpagina van het *Custom Post Type* `graphic_term` , kunnen we deze aanroepen in een nieuwe functie `add_graphic_term_meta_box()` waarmee we de Meta Box toevoegen aan de pagina.

We geven de Meta Box de titel 'Translations' die naar het Nederlands vertaald wordt als 'Vertalingen'.

{% highlight php %}
{% include_relative _code/wp/ontwikkeling/plugin/arteveldehogeschool_lexicon.05.php %}
{% endhighlight %}

##### Hook

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [WordPress.org / Code Reference / Functions / `add_action()`](https://developer.wordpress.org/reference/functions/add_action/)
> - [WordPress.org / Code Reference / Hooks / `admin_init`](https://developer.wordpress.org/reference/hooks/admin_init/)
{:.card .card-block}

We gaan onze functie `add_graphic_term_meta_box()` vasthaken aan de Hook `admin_init`, zodat onze functie uitgevoerd wordt tijdens de Actie `admin_init`.

{% highlight php %}
{% include_relative _code/wp/ontwikkeling/plugin/arteveldehogeschool_lexicon.06.php %}
{% endhighlight %}


Vanaf nu verschijnt de metabox **Vertalingen**:

![Artveldehogeschool Grafisch Lexicon Vertalingen 04]({{ site.baseurl }}/images/ontwikkeling/plugin/arteveldehogeschool.04.png "Artveldehogeschool Grafisch Lexicon Vertalingen 04"){:.screenshot}

#### *Meta Box*-gegevens opslaan

##### Functie

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [PHP / Manual / Function Reference / `isset()`](http://php.net/manual/en/function.isset.php)
> - [PHP / Manual / Function Reference / `empty()`](http://php.net/manual/en/function.empty.php)
> - [WordPress.org / Code Reference / Functions / `sanitize_text_field()`](https://developer.wordpress.org/reference/functions/sanitize_text_field/)
> - [WordPress.org / Code Reference / Functions / `update_post_meta()`](https://developer.wordpress.org/reference/functions/update_post_meta/)
{:.card .card-block}

De gegevens in de Meta Box worden niet automatisch opgeslagen. Daarom moeten we hier zelf een functie voor maken. We moeten van elke vertaling controleren of er een POST-variabele (`$_POST`) **bestaat** (`isset`) en zo ja, moeten we nagaan of deze **niet** (`!`) **leeg** (`empty()`) is.

Voordat de gegevens opgeslagen kan worden moeten we vermijden dat schadelijke code de database of de website kan beschadigen door de functie `sanitize_text_field()` op de gegevens toe te passen. Tenslotte kunnen we de gegevens opslaan met de functie `update_post_meta()`.

{% highlight php %}
{% include_relative _code/wp/ontwikkeling/plugin/arteveldehogeschool_lexicon.07.php %}
{% endhighlight %}

##### Hook

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [WordPress.org / Code Reference / Functions / `add_action()`](https://developer.wordpress.org/reference/functions/add_action/)
> - [WordPress.org / Code Reference / Hooks / `save_post`](https://developer.wordpress.org/reference/hooks/save_post/)
{:.card .card-block}

De functie `save_graphic_term_post_meta_data()` moet uitgevoerd worden nadat de *Custom Post Type* opgeslagen wordt. Daarom haken we ze vast aan de Hook `save_post`.

De functie heeft 2 parameters (`$graphic_term_id` en `$graphic_term`) die elk als argument meegegeven moeten worden, daarom moeten we als vierde argument het cijfer `2` meegeven aan de functie. Hierdoor moeten we ook argument drie meegeven dat de prioriteit (volgorde van uitvoeren) bepaalt. Deze willen we niet wijzigen, daarom geven we `null` mee (wat eigenlijk 'geen waarde' betekent) zodat de functie de voorafgedefinieerde standaardwaarde (`10`) gebruikt.

{% highlight php %}
{% include_relative _code/wp/ontwikkeling/plugin/arteveldehogeschool_lexicon.08.php %}
{% endhighlight %}

#### Pagina maken om de Custom Post Types te uploaden

##### Functie voor uploadpagina

Deze functie maakt een uploadpagina met formulier en verwerkt het formulier waneer het verstuurd is. Er wordt enkel een nieuwe grafische term toegevoegd als die nog niet in de database bestaat. De controle gebeurt met de functie `post_graphic_term_exists()` (zie 2.7.4).

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [PHP / Manual / Function Reference / `isset()`](http://php.net/manual/en/function.isset.php)
> - [PHP / Manual / Function Reference / `ini_set()`](http://php.net/manual/en/function.ini-set.php)
> - [PHP / Manual / Function Reference / `fopen()`](http://php.net/manual/en/function.fopen.php)
> - [PHP / Manual / Function Reference / `fgetcsv()`](http://php.net/manual/en/function.fgetcsv.php)
> - [PHP / Manual / Function Reference / `fclose()`](http://php.net/manual/en/function.fclose.php)
> - [PHP / Manual / Function Reference / `count()`](http://php.net/manual/en/function.count.php)
> - [WordPress.org / Code Reference / Functions / `get_current_user_id()`](https://developer.wordpress.org/reference/functions/get_current_user_id/)
> - [WordPress.org / Code Reference / Functions / `wp_insert_post()`](https://developer.wordpress.org/reference/functions/wp_insert_post/)
{:.card .card-block}

{% highlight php %}
{% include_relative _code/wp/ontwikkeling/plugin/arteveldehogeschool_lexicon.09.php %}
{% endhighlight %}

##### Functie om een menu-item toe te voegen

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [WordPress.org / Code Reference / Functions / `add_menu_page()`](https://developer.wordpress.org/reference/functions/add_menu_page/)
> - [WordPress.org / Code Reference / Functions / `add_submenu_page()`](https://developer.wordpress.org/reference/functions/add_submenu_page/)
{:.card .card-block}

Deze functie voegt een menu-item voor de uploadpagina toe aan het menu. De functie doet dit twee maal: een keer als submenu en een keer als menu. Dit is enkel om het verschil te demonstreren, normaal kies je maar een van de twee.

{% highlight php %}
{% include_relative _code/wp/ontwikkeling/plugin/arteveldehogeschool_lexicon.10.php %}
{% endhighlight %}

##### Hook

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [WordPress.org / Code Reference / Functions / `add_action()`](https://developer.wordpress.org/reference/functions/add_action/)
> - [WordPress.org / Code Reference / Hooks / `admin_menu`](https://developer.wordpress.org/reference/hooks/admin_menu/)
{:.card .card-block}

We gaan onze functie `add_upload_graphic_terms_submenu_page()` vasthaken aan de Hook `admin_init`, zodat onze functie uitgevoerd wordt tijdens de Actie `admin_init`.

{% highlight php %}
{% include_relative _code/wp/ontwikkeling/plugin/arteveldehogeschool_lexicon.11.php %}
{% endhighlight %}

Nu verschijnt het menu-item **Grafische termen uploaden**:

![Artveldehogeschool Grafisch Lexicon Vertalingen 05]({{ site.baseurl }}/images/ontwikkeling/plugin/arteveldehogeschool.05.png "Artveldehogeschool Grafisch Lexicon Vertalingen 05"){:.screenshot}

##### Functie om te controleren of een grafische term al bestaat in de database

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [WordPress.org / Code Reference / Functions / `post_exists()`](https://developer.wordpress.org/reference/functions/post_exists/)
> - [WordPress.org / Code Reference / Functions / `sanitize_post_field()`](https://developer.wordpress.org/reference/functions/sanitize_post_field/)
> - [WordPress.org / Code Reference / Functions / `wp_unslash()`](https://developer.wordpress.org/reference/functions/wp_unslash/)
> - [WordPress.org / Code Reference / Classes / `wpdb`](https://developer.wordpress.org/reference/classes/wpdb/)
> - [WordPress.org / Code Reference / Classes / `wpdb` / `get_var()`](https://developer.wordpress.org/reference/classes/wpdb/get_var/)
> - [WordPress.org / Code Reference / Classes / `wpdb` / `prepare()`](https://developer.wordpress.org/reference/classes/wpdb/prepare/)
{:.card .card-block}

De onderstaande functie is gebaseerd op de standaard WP-functie [`post_exists()`](https://developer.wordpress.org/reference/functions/post_exists/#source-code), maar dan aangepast zodat enkel posts van het type *Custom Post Type* `graphic_term` gecontroleerd worden. Deze functie gebruikt een normale MySQL-query.

{% highlight php %}
{% include_relative _code/wp/ontwikkeling/plugin/arteveldehogeschool_lexicon.12.php %}
{% endhighlight %}

##### Grafische termen uploaden

In de map `data` staat het CSV-bestand `graphic_terms.csv` met daarin heel wat grafische termen die we gaan uploaden naar de database.

![Graphic Terms 00]({{ site.baseurl }}/images/ontwikkeling/plugin/graphic_terms.00.png "Graphic Terms 00"){:.screenshot}

Na het uploaden zie je hoeveel **nieuwe** termen er aan de database toegevoegd zijn.

![Graphic Terms 01]({{ site.baseurl }}/images/ontwikkeling/plugin/graphic_terms.01.png "Graphic Terms 01"){:.screenshot}


{% comment %}
<!-- ⚓ Afkortingen -->
{% endcomment %}
*[CSV]:                     Comma-Separated Values
*[WP]:                      WordPress