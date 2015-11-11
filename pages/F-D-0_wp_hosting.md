---
layout    : page
title     : Hosting
title_long: WordPress-site Hosten
permalink : wp/hosting/
published : false
tags      :
---

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [WordPress.org / About / Requirements](https://wordpress.org/about/requirements/)
> - [WordPress.org / Support / Codex / Moving WordPress](http://codex.wordpress.org/Moving_WordPress)
{:.card .card-block}

Hosting
-------

### Vereisten

De meeste PHP/MySQL-webhosting pakketen ondersteunen WordPress, maar controleer eerst of hosting aan de aanbevolen [vereisten][wp-requirements] voldoet:  

 - **PHP 5.4+** (minimum 5.2.4)
 - **MySQL 5.5+** (minimum 5.0)
 - **Apache HTTP Server** met `mod_rewrite`

### Gratis Hosting

Op [Byethost Free Webhosting][byethost] kan je gratis je website hosten.

#### Registratie en Gegevens

Na registratie krijg je een e-mail met een link om je account te activeren. Daarna krijg je een e-mail met daarin deze gegevens:

 - Byethost [cPanel][byethost-cp]
   - Username: `b18_00000000`
   - Password: `mijn_wachtwoord`
 - Your URL: ``
 - Byethost [FTP][byethost-cp-ftp]
  - Server: `ftp.byethost18.com`
  - Login:  `b18_00000000`
  - Password: `mijn_wachtwoord`
 - Byethost [MySQL][byethost-cp-mysql] 
    - Database Name: database moet in [cPanel][byethost-cp-mysql] aangemaakt worden.
    - Username: `b18_00000000`
    - Password: `mijn_wachtwoord`
    - Server: zie [cPanel][byethost-cp-mysql]

#### subdomein

Je kan eventueel een subdomein aanmaken voor je website via [cPanel][byethost-cp-subdomain]. Je kan kiezen uit een aantal domeinnamen, maar het gevraagde subdomein moet uiteraard nog beschikbaar zijn op het domein.

Voor elk subdomein wordt een nieuwe map gemaakt op de server, met als naam de volledige domeinnaam. De submap `htdocs` is de map waarin je alle (publieke) bestanden moet plaatsen. Dus alles wat in je lokale omgeving in de map `~/Code/cmp.arteveldehogeschool.local/www/wordpress/` staat.

> Ga nog niet onmiddellijk uploaden via FTP, want eerst moeten er nog een aantal aanpassingen gebeuren aan de database en de WP-configuratie zodat WordPress overweg kan met de (nieuwe) domeinnaam.

#### Database

##### Database aanmaken

Het eerste wat je moet doen is een database aanmaken via [cPanel][byethost-cp-mysql]

De database geef je dezelfde naam als je lokaal project (`cmp_arteveldehogeschool_be`). Byethost zal de naam automatisch met je gebruikersnaam prefixen. Het databasewachtwoord zal hetzelfde wachtwoord zijn als dat van je Byethost account.

Uiteindelijk zullen de gegevens er bijvoorbeeld zo uitzien:

 - Byethost [MySQL][byethost-cp-mysql] 
    - Database Name: `b00_00000000_cmp_arteveldehogeschool_be`
    - Username: `b00_00000000`
    - Password: `mijn_wachtwoord`

##### Database migreren

**Makkelijke manier**  
De eenvoudigste manier is gewoon een nieuwe installatie uitvoeren. Daarna kan je de gegevens in **Extra** → **Exporteren** exporteren naar een XML-bestand (bijv. `crossmedia-publishing.wordpress.2015-12-31.xml`).

Daarna kan je de gegevens terug importeren in een andere WordPress-installatie. In deze installatie zal je eerst de WordPress **Importer** moeten installeren via **Extra** → **Importeren**: **WordPress** en de plugin activeren.

Daarna opnieuw **Extra** → **Importeren**: **WordPress** en het XML-bestand selecteren.

**Moeilijke manier**  
Een moeilijkere en omslachtigere manier bestaat eruit de databasetabellen te importeren met [PhpMyAdmin][byethost-cp-pma] en dan onderstaande tabellen te doorzoeken naar de oude domeinnaam (`www.cmp.arteveldhogeschool.local`) en die een voor een te vervangen door de nieuwe (bijv. `cmp.byethost00.com`).

 - `wp_site`
 - `wp_sitemeta`
 - `wp_blogs`
 - `wp_options`
 - `wp_usermeta`

#### Uploaden via FTP

Gebruik bij voorkeur [Filezilla Client][filezilla], omdat je met dit gratis FTP-programma zowel de lokale map op je eigen computer als de remote map op de FTP-server kan zien, inclusief alle verborgen bestanden.

 - Lokale site: `~/Code/cmp.arteveldehogeschool.local/www/wordpress/`
 - Externe site: `/cmp.byethost00.com/htdocs`

#### Configuratie aanpassen

Je kan een aangepaste versie van `wp-config.php` uploaden, maar het is iets eenvoudiger om via de Byethost [cPanel][byethost-cp] **Online File Manager** de aanpassing rechtstreeks op de server te doen.

 - `b00_00000000_cmp_arteveldehogeschool_be`
 - Username: `b00_00000000`
 - Password: `mijn_wachtwoord`
 - Server: zie [cPanel][byethost-cp-mysql]


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