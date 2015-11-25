---
layout    : page
title     : Thema
title_long: Themaontwikkeling
permalink : wp/ontwikkeling/thema/
published : true
tags      :
---

Wat is een Thema?
-----------------
 
Een **Thema** *(Theme)* bepaalt de *look and feel* en ook een deel van de functionaliteiten van een WordPress-website. Je kan één van de bijna 3.000 thema's downloaden van [WordPress.org](https://wordpress.org/themes/) of je kan zelf een eigen thema maken.

Een goed thema is gemaakt volgens de principes van **Responsive Web Design**. <abbr title="Responsive Web Design">RWD</abbr> zorgt ervoor dat een website op verschillende toestellen goed functioneert. Zo kan dezelfde website zich optimaal aanpassen aan de elke schermresolutie (bijv. desktopscherm, smartphonescherm) en inputmanier (bijv. muis, trackpad of aanraakgevoelig scherm).

RWD vergt heel wat codeerwerk in HTML en vooral in CSS en JavaScript. Gelukkig bestaan er **responsive frameworks** die *out of the box* al heel wat functionaliteiten voor RWD bevatten en die je als basis voor je website kan gebruiken. Enkele van de populairste dergelijke frameworks zijn [Bootstrap](http://getbootstrap.com) (oorspronkelijk gemaakt door [Twitter](https://twitter.com) voor hun eigen website) en [ZURB Foundation](http://foundation.zurb.com).

Twitter Bootstrap integeren in een thema is op zich ook al heel wat werk, maar je kan je baseren op een basisthema dat Bootstrap al integreert en daarvan een **Childthema** *(Child Theme)* maken. Een Childthema is een thema dat enkel de wijzigingen aan het Parentthema bevat, en voor de rest gebruik maakt van het Parentthema. Beide moeten geïnstalleerd zijn.

Thema's Beheren
---------------

### Toevoegen

We gaan het Thema **DevDMBootstrap3** toevoegen.

**Weergave** → **Thema's** en klik op **Nieuwe toevoegen**.

![Thema Toevoegen 00]({{ site.baseurl }}/images/ontwikkeling/thema/devdmboostrap.00.png "Thema Toevoegen 00")

Typ "DevDMBootstrap3" in. 

![Thema Toevoegen 01]({{ site.baseurl }}/images/ontwikkeling/thema/devdmboostrap.01.png "Thema Toevoegen 01")

Hover over het Thema en klik op **Installeren**. 

![Thema Toevoegen 02]({{ site.baseurl }}/images/ontwikkeling/thema/devdmboostrap.02.png "Thema Toevoegen 02")

Eens het Thema geïnstalleerd is, kan je terugkeren naar **Thema's**.

![Thema Toevoegen 03]({{ site.baseurl }}/images/ontwikkeling/thema/devdmboostrap.03.png "Thema Toevoegen 03")

Het nieuwe Thema staat nu in de lijst. Het moet niet geactiveerd worden, want we gaan het niet rechtstreeks gebruiken, maar wel via een **Childthema**.

![Thema Toevoegen 04]({{ site.baseurl }}/images/ontwikkeling/thema/devdmboostrap.04.png "Thema Toevoegen 04")

Je kan wel een **Live voorbeeld** bekijken.

![Thema Toevoegen 05]({{ site.baseurl }}/images/ontwikkeling/thema/devdmboostrap.05.png "Thema Toevoegen 05")

Thema Ontwikkelen
-----------------

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [WordPress.org / Codex / Theme Development](http://codex.wordpress.org/Theme_Development)
> - [WordPress.org / Codex / Child Themes](http://codex.wordpress.org/Child_Themes)
> - [WordPress.org / Themes / DevDmBootstrap3](https://wordpress.org/themes/devdmbootstrap3)
> - [Danny Machal / DevDmBootstrap3](http://devdm.com/DevDmBootstrap3/)
> - [Bootstrap](http://getbootstrap.com)
> - [SitePoint / Understanding Bootstrap's Grid System](http://www.sitepoint.com/understanding-bootstrap-grid-system/)
> 
> **Nieuwe documentatie**
> 
> - [WordPress.org / Developer Resources](https://developer.wordpress.org/)
{:.card .card-block}

### Inleiding

Alle geïnstalleerde Thema's staan in de map `themes` 

> ##### Mappen & Bestanden *:open_file_folder:*{:.pull-left .m-r}
> ---
>```
> cmp.arteveldehogeschool.local/
> ├── www/
> │   ├── scripts/
> │   └── wordpress/
> │       └── wp-content/
> │           └── themes/
> │               ├── devdmbootstrap3/
> │               ├── twentyfifteen/
> │               ├── twentyfourteen/
> │               └── twentythirteen/
> └── README.md
>```
{:.card .card-block}

### Childthema

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [WordPress.org / Codex / Child Themes](http://codex.wordpress.org/Child_Themes)
> - [WordPress.org / Themes / DevDmBootstrap3](https://wordpress.org/themes/devdmbootstrap3)
> - [Danny Machal / DevDmBootstrap3](http://devdm.com/DevDmBootstrap3/)
> - [Danny Machal / DevDmBootstrap3 / Child Themes](http://devdm.com/DevDmBootstrap/child-themes/)
> - [Bootstrap](http://getbootstrap.com)
> - [SitePoint / Understanding Bootstrap's Grid System](http://www.sitepoint.com/understanding-bootstrap-grid-system/)
{:.card .card-block}

#### Waarom een Childthema?

Je kan een Thema volledig van nul zelf opbouwen, maar het is eenvoudiger om van een reeds bestaand thema te vertrekken. Als je van een bestaand thema vertrekt heb je een aantal mogelijkheden:

1.	Het Thema rechtstreeks aanpassen. Bij een automatische update zullen alle wijzigen verloren gaan.
2.	Een **kloon** maken van het Thema door het te kopiëren naar een nieuwe map. Dan moeten updates manueel doorgevoerd worden.
3.	Een **Childthema** maken. Zo kan het **Parentthema** nog altijd automatisch geüpdatet worden en dus ook je Childthema.

Een Childthema maken is dus meestal de beste oplossing.

#### Childthema Aanmaken

We gaan een **Childthema** maken op basis van **DevDmBootstrap3**. Dit Thema is gemaakt door [Danny Marchal](http://devdm.com) en is speciaal bedoeld om als basisthema gebruikt te worden. [Bootstrap](http://getbootstrap.com) is er reeds in geïntegreerd.

Een Thema moet verplicht een aantal bestanden bevatten:

| Bestand          | Beschrijving                                                |
|------------------|-------------------------------------------------------------|
| `screenshot.png` | Een **schermafbeelding** van het Thema.                     |
| `style.css`      | Bevat de **metagegevens** van het Thema en **stijlen**.     |
{:.table}

> ##### Mappen & Bestanden *:open_file_folder:*{:.pull-left .m-r}
> ---
>```
> cmp.arteveldehogeschool.local/
> ├── www/
> │   ├── scripts/
> │   └── wordpress/
> │       └── wp-content/
> │           └── themes/
> │               ├── arteveldehogeschool/
> │               │   ├── screenshot.png
> │               │   └── style.css
> │               ├── devdmbootstrap3/
> │               ├── twentyfifteen/
> │               ├── twentyfourteen/
> │               └── twentythirteen/
> └── README.md
>```
{:.card .card-block}

##### `arteveldehogeschool/`

We maken een nieuwe **map** `arteveldehogeschool/` in de map `wordpress/wp-content/themes/` waarin we de bestanden van ons nieuw Thema gaan zetten.

##### `screenshot.png`

en zetten er een **afbeelding** in met de naam `screenshot.png`. Deze afbeelding moet een verhouding `4:3` hebben en bij voorkeur een afmeting van `880×660 px`.

##### `style.css`

In de map zetten we ook een **stylesheet** met de naam `style.css`:

{% highlight css %}
{% include_relative _code/wp/ontwikkeling/thema/style.00.css %}
{% endhighlight %}

In de commentaar staan de **metagegevens** van het Thema.

Nadat je `style.css` opgeslagen hebt, zal het in de **Sitebeheer** onder Thema's is de lijst verschijnen.

![Childthema 00]({{ site.baseurl }}/images/ontwikkeling/thema/arteveldehogeschool.00.png "Childthema 00")

#### Childthema Activeren

Een Childthema kan je activeren zoals een gewoon Thema.

Voor je een thema activeert kan je een **Live voorbeeld** bekijken. Op dit ogenblik is het Child-thema nog identiek aan het Parent-thema.

![Childthema 01]({{ site.baseurl }}/images/ontwikkeling/thema/arteveldehogeschool.01.png "Childthema 01")
 
Ga terug naar **Thema's** door op de knop in de linker bovenhoek te klikken en klik daarna op op de knop **Activeren**.

![Childthema 02]({{ site.baseurl }}/images/ontwikkeling/thema/arteveldehogeschool.02.png "Childthema 02")

Het actieve Thema staat **eerst** in de lijst.

Je kan een aantal instellingen van het Thema aanpassen door op de knop **Customizer** te klikken, of je kan de details bekijken door op de afbeelding te klikken.

![Childthema 03]({{ site.baseurl }}/images/ontwikkeling/thema/arteveldehogeschool.03.png "Childthema 03")

De detailpagina toont de **metagegevens** die we in `styles.css` geplaatst hebben. 

Het actieve Thema kan je op de website zien. 




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