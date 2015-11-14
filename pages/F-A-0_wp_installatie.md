---
layout    : page
title     : Installatie
permalink : wp/installatie/
published : true
tags      :
---
{% comment %}
> ##### **Voorbeeld** *:package:*{:.pull-left .m-r}
> ---
> Het voorbeeldproject vind je op [*&nbsp;*{:.fa .fa-github-square}GitHub](https://github.com/olivierparent/cmp.arteveldehogeschool.local)
{:.alert .alert-success}
{% endcomment %}

Ontwikkelomgeving
-----------------

We gebruiken [Artevelde Laravel Homestead][artestead] als ontwikkelomgeving. Volg alle stappen zoals beschreven!

### Configuratie

> ##### **Opgelet** *:warning:*{:.pull-left .m-r}
> ---
> Zorg ervoor dat je een teksteditor geïnstalleerd hebt die YAML-bestanden kan openen, zoals bijvoorbeeld [Brackets](http://brackets.io).
{:.alert .alert-warning}

Open `Homestead.yaml` met onderstaande opdracht.

{% highlight bash %}
$ artestead edit
{% endhighlight %}

Verwijder het commentaar (`#`) in de regels onder **Crossmedia Publishing (CMP)**:

{% highlight yaml %}
{% include_relative _code/wp/installatie/Homestead.00.yaml %}
{% endhighlight %}

> ##### **Opgelet** *:warning:*{:.pull-left .m-r}
> ---
> In YAML-bestanden heeft de insprong invloed op de betekenis. Geen spaties toevoegen of verwijderen!
{:.alert .alert-warning}

### Opstarten

Start de Vagrant Box op. De eerste keer moet je dit met de optie `--provision` doen zodat de domeinnaam gekoppeld wordt aan de en de map gekoppeld worden

{% highlight bash %}
$ artestead up --provision
{% endhighlight %}

Meld je aan op de Virtual Machine.

{% highlight bash %}
$ artestead ssh
vagrant@homestead$ _
{% endhighlight %}

Mappen
------

Na het aanmelden op de Vagrant Box gaan we eerst naar de map `Code` die in de thuismap (`~`) staat (als je al in deze map bent mag je `~/` weglaten) met de opdracht `cd` *(Change Directory)*. 

{% highlight bash %}
vagrant@homestead$ cd ~/Code/
{% endhighlight %}

Daarna maken we de map `database` aan met de opdracht `mkdir` *(Make Directory)* en de optie `-p` *(parents),* zodat ook de bovenliggende mappen *(Parent Directories)* `www` en `cmp.arteveldehogeschool.be` zo nodig aangemaakt worden:

{% highlight bash %}
vagrant@homestead$ mkdir -p cmp.arteveldehogeschool.local/www/database/
{% endhighlight %}

Vervolgens gaan we naar de `www` map:

{% highlight bash %}
vagrant@homestead$ cd cmp.arteveldehogeschool.local/www/
{% endhighlight %}

> ##### **Tip** *:bulb:*{:.pull-left .m-r}
> ---
> Gebruik de <kbd>tab</kbd> toets om (bestaande) mapnamen automatisch aan te vullen en de pijltjestoetsen <kbd>up</kbd> of <kbd>down</kbd> om doorheen de CLI-history te gaan!
{:.alert .alert-info}

Het resultaat (Met het opdracht `vagrant@homestead$ tree -d Code`, maar daarvoor moet je eerst **Tree** installeren met `vagrant@homestead$ sudo apt-get install tree`):

> ##### Mappen & Bestanden *:open_file_folder:*{:.pull-left .m-r}
> ---
>```
> cmp.arteveldehogeschool.local/
> ├── www/
> │   ├── database/
> │   └── wordpress/
> └── README.md
>```
{:.card .card-block}

Database
--------

> ##### Mappen & Bestanden *:open_file_folder:*{:.pull-left .m-r}
> ---
>```
> cmp.arteveldehogeschool.local/
> ├── www/
> │   ├── database/
> │   │   ├── backup.sh
> │   │   ├── drop.sh
> │   │   ├── init.sh
> │   │   ├── reset.sh
> │   │   ├── restore.sh
> │   │   └── settings
> │   └── wordpress/
> └── README.md
>```
{:.card .card-block}

WordPress gebruikt een **MySQL**-database. We gaan met behulp van een aantal Bash-scripts een databasegebruiker en een database aanmaken op de MySQL-server.

### Instellingenbestand

In de map `database` maken we een nieuwe bestand `settings` waarin de instellingen komen. Op die manier kunnen de scripts voor andere projecten gebruikt worden, en moet enkel dit bestand aangepast worden. 

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/database/
vagrant@homestead$ touch settings
{% endhighlight %}

In het bestand zetten we de basisgegevens voor de databasegebruiker en de database.

{% highlight bash %}
{% include_relative _code/wp/database/settings %}
{% endhighlight %}

| Databasegebruiker | Databasewachtwoord | Database                     |
|-------------------|--------------------|------------------------------|
| `cmp_db_user`     | `cmp_db_password`  | `cmp_arteveldehogeschool_be` |
{:.table}

### Initialiseren en verwijderen

#### Initialisatiescript

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/database/
vagrant@homestead$ touch init.sh && chmod +x init.sh
{% endhighlight %}

Maakt een gebruiker en een database.

{% highlight bash %}
{% include_relative _code/wp/database/init.sh %}
{% endhighlight %}

> ##### **Opgelet** *:warning:*{:.pull-left .m-r}
> ---
> Als het script op *&nbsp;*{:.fa .fa-windows}Windows bewerkt werd, moet er mogelijk eerst nog een eenmalige `dos2unix` op het bestand uitgevoerd worden, voor het script correct uitgevoerd kan worden.
{:.alert .alert-warning}

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/database/
vagrant@homestead$ dos2unix init.sh
{% endhighlight %}

Uitvoeren:

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/database/
vagrant@homestead$ ./init.sh
{% endhighlight %}

#### Verwijderscript

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/database/
vagrant@homestead$ touch drop.sh && chmod +x drop.sh
{% endhighlight %}

Verwijdert de database.

{% highlight bash %}
{% include_relative _code/wp/database/drop.sh %}
{% endhighlight %}

> ##### **Opgelet** *:warning:*{:.pull-left .m-r}
> ---
> Als het script op *&nbsp;*{:.fa .fa-windows}Windows bewerkt werd, moet er mogelijk eerst nog een eenmalige `dos2unix` op het bestand uitgevoerd worden, voor het script correct uitgevoerd kan worden.
{:.alert .alert-warning}

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/database/
vagrant@homestead$ dos2unix drop.sh
{% endhighlight %}

Uitvoeren:

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/database/
vagrant@homestead$ ./drop.sh
{% endhighlight %}

#### Resetscript

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/database/
vagrant@homestead$ touch reset.sh && chmod +x reset.sh
{% endhighlight %}

Voert eerst het verwijderscript uit en daarna het initialisatiescript.

{% highlight bash %}
{% include_relative _code/wp/database/reset.sh %}
{% endhighlight %}

> ##### **Opgelet** *:warning:*{:.pull-left .m-r}
> ---
> Als het script op *&nbsp;*{:.fa .fa-windows}Windows bewerkt werd, moet er mogelijk eerst nog een eenmalige `dos2unix` op het bestand uitgevoerd worden, voor het script correct uitgevoerd kan worden.
{:.alert .alert-warning}

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/database/
vagrant@homestead$ dos2unix reset.sh
{% endhighlight %}

Uitvoeren:

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/database/
vagrant@homestead$ ./reset.sh
{% endhighlight %}

### Backuppen en terugzetten

#### Backupscript

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/database/
vagrant@homestead$ touch backup.sh && chmod +x backup.sh
{% endhighlight %}

{% highlight bash %}
{% include_relative _code/wp/database/backup.sh %}
{% endhighlight %}

> ##### **Opgelet** *:warning:*{:.pull-left .m-r}
> ---
> Als het script op *&nbsp;*{:.fa .fa-windows}Windows bewerkt werd, moet er mogelijk eerst nog een eenmalige `dos2unix` op het bestand uitgevoerd worden, voor het script correct uitgevoerd kan worden.
{:.alert .alert-warning}

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/database/
vagrant@homestead$ dos2unix backup.sh
{% endhighlight %}

Uitvoeren:

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/database/
vagrant@homestead$ ./backup.sh
{% endhighlight %}

#### Restorescript

De laatste backup terugzetten.

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/database/
vagrant@homestead$ touch restore.sh && chmod +x restore.sh
{% endhighlight %}

{% highlight bash %}
{% include_relative _code/wp/database/restore.sh %}
{% endhighlight %}

> ##### **Opgelet** *:warning:*{:.pull-left .m-r}
> ---
> Als het script op *&nbsp;*{:.fa .fa-windows}Windows bewerkt werd, moet er mogelijk eerst nog een eenmalige `dos2unix` op het bestand uitgevoerd worden, voor het script correct uitgevoerd kan worden.
{:.alert .alert-warning}

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/database/
vagrant@homestead$ dos2unix restore.sh
{% endhighlight %}

Uitvoeren:

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/database/
vagrant@homestead$ ./restore.sh
{% endhighlight %}

Broncode
--------

We gaan versie `4.3` installeren in de map `~/Code/cmp.arteveldehogeschool.local/www/wordpress/`

Deze map is in [Artestead][artestead] al automatisch gekoppeld aan de domeinnaam [www.cmp.arteveldehogeschool.local](http://www.cmp.arteveldehogeschool.local)

> ##### Mappen & Bestanden *:open_file_folder:*{:.pull-left .m-r}
> ---
>```
> cmp.arteveldehogeschool.local/
> ├── www/
> │   ├── database/
> │   └── wordpress/
> │       ├── wp-admin/
> │       ├── wp-content/
> │       ├── wp-includes/
> │       └── index.php
> └── README.md
>```
{:.card .card-block}

### Manier 1 (via Website)

Je kan de broncode (van de Nederlandstalige versie) downloaden van [nl.wordpress.org][wp-org-nl] en het bestand decomprimeren in de map `wordpress`.

### Manier 2 (via WP-CLI)

Je kan WordPress ook installeren met **WP-CLI**.

#### Installatie van WP-CLI

Eerst updaten we [Composer][composer], een *package manager* voor PHP.

{% highlight bash %}
vagrant@homestead$ sudo composer self-update
{% endhighlight %}

Daarna installeren we WP-CLI globaal.

{% highlight bash %}
vagrant@homestead$ composer global require wp-cli/wp-cli
{% endhighlight %}

Tenslotte testen we de installatie door het versienummer op te vragen.

{% highlight bash %}
vagrant@homestead$ wp --version
{% endhighlight %}

#### Downloaden van WordPress

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/
vagrant@homestead$ wp core download --path=wordpress --locale=nl_NL
{% endhighlight %}

Configuratie
------------

Nadat de broncode gedownload is, moet WordPress geconfigureerd worden.

|                        Veld | Waarde                       |
|----------------------------:|------------------------------|
|            **Databasenaam** | `cmp_arteveldehogeschool_be` |
| **Database-gebruikersnaam** | `cmp_db_user`                |
|     **Database-wachtwoord** | `cmp_db_password`            |
|           **Database-host** | `localhost`                  |
|             **Tabelprefix** | `wp_`                        |
{:.table .table-striped}


### Manier 1 (via browser)

De configuratie kan je ook via WP-CLI doen, 

Of je kan gewoon surfen naar [www.cmp.arteveldehogeschool.local](http://www.cmp.arteveldehogeschool.local) en de configuratieprocedure doorlopen

![Configuratie in de browser]({{ site.baseurl }}/images/configuratie.00.png "Configuratie in de browser")

![Configuratie in de browser]({{ site.baseurl }}/images/configuratie.01.png "Configuratie in de browser")

### Manier 2 (via WP-CLI) 

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/wordpress/
vagrant@homestead$ wp core config --dbname=cmp_arteveldehogeschool_be --dbuser=cmp_db_user --dbpass=cmp_db_password --dbhost=localhost --dbprefix=wp_
{% endhighlight %}

Installatie
------------

Nadat de configuratie voltooid is, kan de installatie beginnen.

|               Veld | Waarde                  |
|-------------------:|-------------------------|
|   **Websitetitel** | `Crossmedia Publishing` |
| **Gebruikersnaam** | `cmp_gebruiker`         |
|     **Wachtwoord** | `cmp_wachtwoord`        |
|    **E-mailadres** | `cmp@arteveldehs.be`    |
{:.table .table-striped}


### Manier 1 (via browser)

![Installatieproces in de browser 00]({{ site.baseurl }}/images/installatieproces.00.png "Installatieproces in de browser")

![Installatieproces in de browser 01]({{ site.baseurl }}/images/installatieproces.01.png "Installatieproces in de browser")

![Installatieproces in de browser 02]({{ site.baseurl }}/images/installatieproces.02.png "Installatieproces in de browser")


### Manier 2 (via WP-CLI) 

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/wordpress/
vagrant@homestead$ wp core install --url=www.cmp.arteveldehogeschool.local --title='Crossmedia Publishing' --admin_user=cmp_user --admin_password=cmp_wachtwoord --admin_email=cmp@arteveldehs.be
{% endhighlight %}

Inloggen
--------

En inloggen met de WP-gebruikersgegevens.

|               Veld | Waarde           |
|-------------------:|------------------|
| **Gebruikersnaam** | `cmp_gebruiker`  |
|     **Wachtwoord** | `cmp_wachtwoord` |
{:.table .table-striped}

Ga naar [www.cmp.arteveldehogeschool.local/wp-admin/](http://www.cmp.arteveldehogeschool.local/wp-admin/).

![Inlogformulier]({{ site.baseurl }}/images/inloggen.00.png "Inlogformulier")

![WordPress Dashboard]({{ site.baseurl }}/images/inloggen.01.png "WordPress Dashboard")

WordPress Netwerk van sites
---------------------------

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [WordPress.org / Support / Codex / Create A Network](http://codex.wordpress.org/Create_A_Network)
{:.card .card-block}

### Wat is een Netwerk?

Je kan meerdere websites maken met één installatie van WordPress, een zogenaamd **Netwerk** van sites. De huidige website wordt dan de hoofdwebsite en de bijkomende websites staan dan in een **subdomein** of een **submap**. 

### Netwerk activeren

> ##### **Opgelet** *:warning:*{:.pull-left .m-r}
> ---
> De webserver moet op poort `80` (http) of `443` (https) draaien. Alternatieve poorten (bijv. `8080`) zijn niet toegelaten. Hoewel het mogelijk is om de code aan te passen om deze alternatieve poorten toe te laten, is het beter om de serverinstellingen te wijzigen.
{:.alert .alert-warning}

Open `wp-config.php` en voeg volgende code toe:

{% highlight php %}
{% include_relative _code/wp/installatie/wp-config.00.php %}
{% endhighlight %}

Sla het bestand op en herlaadt Sitebeheer in de browser.

Onder **Extra** → **Netwerk instellen** kan je **submappen** inschakelen. Je krijgt de nodige aanpassingen te zien.

![Netwerk Instellen]({{ site.baseurl }}/images/netwerk_instellen.png "Netwerk Instellen")


{% comment %}
<!-- ⚓ Afkortingen -->
{% endcomment %}
*[WP]:                      WordPress
*[YAML]:                    YAML Ain't Markup Language

{% comment %}
<!-- ⚓ Hyperlinks -->
{% endcomment %}
[artestead]:                http://www.olivierparent.be/artestead
[automattic]:               http://automattic.com
[composer]:                 https://getcomposer.org
[semver]:                   http://semver.org
[wp-com]:                   https://wordpress.com
[wp-org]:                   https://wordpress.org
[wp-org-nl]:                https://nl.wordpress.org
[wp-svn]:                   http://core.svn.wordpress.org