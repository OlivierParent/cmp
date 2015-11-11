---
layout    : page
title     : Gebruik
permalink : wp/gebruik/
published : true
tags      :
---

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [WordPress.org / Codex / First Steps With WordPress](http://codex.wordpress.org/First_Steps_With_WordPress)
> - [WordPress.org / Codex / WordPress Lessons](http://codex.wordpress.org/WordPress_Lessons)
{:.card .card-block}

Instellingen
------------

### Algemeen

**Instellingen** → **Algemeen**

| Instelling        | Waarde                |
|-------------------|-----------------------|
| **Website-titel** | Crossmedia Publishing |
| **Ondertitel**    | Grafimediabeleid      |
| **Tijdzone**      | Europa → Brussel      |
| **Taal**          | Nederlands            |
{:.table}

Klik op **Wijzigingen opslaan**

### Schrijven

**Instellingen** → **Schrijven**

| Instelling                     | Waarde         |
|--------------------------------|----------------|
| **Standaard berichtcategorie** | Geen categorie | 
| **Standaard berichtformaat**   | Standaard      |
{:.table}

Klik op **Wijzigingen opslaan**

### Lezen

**Instellingen** → **Lezen**

| Instelling                     | Waarde         |
|--------------------------------|----------------|
| **Startpagina toont**          | -              |
{:.table}

Klik op **Wijzigingen opslaan**

### Reacties

**Instellingen** → **Reacties**

### Media

**Instellingen** → **Media**

### Permalinks

De standaard-URL's van WP tonen enkel het nummer van de pagina. Dat is niet gebruiksvriendelijk, noch <abbr title="Search Engine Optimization">SEO</abbr>-vriendelijk.

**Instellingen** → **Permalinks**

| Instelling                | Waarde      |
|---------------------------|-------------|
| **Algemene instellingen** | Berichtnaam |
{:.table}

Klik op **Wijzigingen opslaan**

Gebruikers
----------

### Rollen

Binnen een WP-site heeft een gebruiker een bepaalde **Rol** *(Role):* 

| Niveau | Nederlands     | Engels        | Rechten                                            |
|-------:|----------------|---------------|----------------------------------------------------|
|     5. | **Abonnee**    | *Subscriber*  | Lezen                                              |
|     4. | **Schrijver**  |	*Contributor* | Berichten bewerken en verwijderen                  |
|     3. | **Auteur**	  |	*Author*      | Berichten bewerken, verwijderen en publiceren      |
|     2. | **Redacteur**  |	*Editor*      | Alle Berichten bewerken, verwijderen en publiceren |
|     1. | **Beheerder**  |	*Admin*       | Alles                                              |
{:.table}

Voor een multisite WP-installatie is er nog de bijkomende rol van **Superbeheerder** *(Super Admin).* Deze rol is nog een niveau hoger dan Beheerder. Een Superbeheerder kan een netwerk van sites beheren en is bovendien ook automatisch Beheerder van elke site in het netwerk. De Superbeheerder kan bepaalde dingen zoals bijvoorbeeld Thema's en Plugins op netwerkniveau beheren.

### Gebruiker Toevoegen

**Dashboard** → **Gebruikers**

Content types
-------------

### Bericht *(Post)*

#### Algemeen

Berichten staan in **antichronologische** volgorde op de **Berichtenpagina**. Deze pagina is standaard als startpagina ingesteld.

Elk bericht heeft:

 - **Titel** *(Title)*
 - **Inhoud** *(Content)* die zowel tekst als media kan zijn.

Optioneel kan een Bericht ook nog een **Samenvatting** *(Exerp)* hebben.

#### Notatie *(Format)*

Een Bericht heeft een bepaalde Notatie:

 - Standaard *(Standard)*
 - Aside
 - Afbeelding *(Image)*
 - Video
 - Audio
 - Quote
 - Link
 - Gallerij *(Gallery)*

#### Taxonomie *(Taxonomy)*

Aan een Bericht kan je Categorieën en/of Tags toekennen.

 - **Categorieën** *(Categories)*
	Een Categorie maakt deel uit van een hiërarchische structuur.

 - **Tags** *(Tags)*
	Een Tag maakt geen deel uit van een structuur, maar bestaat op zichzelf.

### Media

Soorten mediabestanden:

 - Afbeeldingen
 - Audio
 - Video
 - Niet gekoppeld

### Pagina *(Page)*

Een pagina die door de gebruiker handmatig aangepast moet worden, noemt men in WP een **statische pagina**. Dit in tegenstelling tot de **berichtenpagina** die automatisch aangepast wordt van zodra er een nieuw bericht gepubliceerd wordt.

Je kan er geen categorieën of tags aan een pagina toekennen, maar je kan wel een pagina een subpagina maken van een andere pagina.

### Reacties *(Comments)*

Pagina's Beheren
----------------

### Pagina Toevoegen

**Pagina's** → **Nieuwe pagina**

### Pagina Bewerken

### Pagina Instellen als Voorpagina

 - **Instellingen** → **Lezen**
   - Je kan wel een pagina instellen als voorpagina die dan in de plaats van de standaard startpagina komt.
   - Een pagina kan ook dienst doen als …, dan worden de berichten getoond in plaats van de inhoud van die pagina.

### Pagina Verplaatsen

### Pagina Verwijderen

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