---
layout    : page
title     : Installatie
permalink : wp/installatie/
published : true
tags      :
---

> ##### **Voorbeeld** *:package:*{:.pull-left .m-r}
> ---
> Het voorbeeldproject vind je op [*&nbsp;*{:.fa .fa-github-square}GitHub](https://github.com/olivierparent/cmp.arteveldehogeschool.local)
{:.alert .alert-success}

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

Verwijder de commentaartekens (`#`) in de regels onder **Crossmedia Publishing (CMP)** zodat je dit resultaat krijgt:

{% highlight yaml %}
{% include_relative _code/wp/installatie/Homestead.00.yaml %}
{% endhighlight %}

> ##### **Opgelet** *:warning:*{:.pull-left .m-r}
> ---
> In YAML-bestanden heeft de insprong invloed op de betekenis. Geen spaties toevoegen of verwijderen!
{:.alert .alert-warning}

### Opstarten

Start de Vagrant Box op.

De eerste keer moet je dit met de optie `--provision` doen, zodat de domeinnaam `www.cmp.arteveldehogeschool.local` en de map met de broncode aan elkaar gekoppeld worden. Eens die koppeling gebeurd is, mag je de optie `--provision` weglaten.

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

Na het aanmelden op de Vagrant Box maken we de map `www` voor ons project aan met met de opdracht `mkdir` *(Make Directory)* en de optie `-p` *(parents),* zodat ook de bovenliggende mappen *(Parent Directories)* `Code` en `cmp.arteveldehogeschool.be` aangemaakt worden als die nog niet bestaan.

{% highlight bash %}
vagrant@homestead$ mkdir -p ~/Code/cmp.arteveldehogeschool.local/www/
{% endhighlight %}

Daarna gaan we naar de map met de opdracht `cd` *(Change Directory)*. De **tilde** (`~`) stelt de thuismap voor. Als je al in deze map bent mag je `~/` weglaten. 

Vervolgens maken we de mappen `data` en `scripts` aan.

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/
vagrant@homestead$ mkdir data/
vagrant@homestead$ mkdir scripts/
{% endhighlight %}

Vervolgens gaan we naar de root van ons project en maken een nieuw bestand `README.md` aan met de opdracht `touch`.
In het nieuwe bestand kunnen we informatie over het project schrijven, zoals bijvoorbeeld wie de auteur is, wat de bedoeling van dit project is en welek stappen we moeten doorlopen om dit project te hosten.

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/
vagrant@homestead$ touch README.md
{% endhighlight %}

> ##### **Tip** *:bulb:*{:.pull-left .m-r}
> ---
> Gebruik de <kbd>tab</kbd> toets om (bestaande) mapnamen automatisch aan te vullen en de pijltjestoetsen <kbd>up</kbd> of <kbd>down</kbd> om doorheen de CLI-history te gaan!
{:.alert .alert-info}

De **boomstructuur** van mappen en bestanden kan je bekijken met de opdracht `tree`, maar die moet je dan wel eerst installeren met `apt-get` *(Advanced Package Tool)* die via `sudo` *(Super User Do)* uitgevoerd moet worden.

{% highlight bash %}
vagrant@homestead$ sudo apt-get install tree
{% endhighlight %}

{% highlight bash %}
vagrant@homestead$ vagrant@homestead$ tree -d ~/Code
{% endhighlight %}

> ##### Mappen & Bestanden *:open_file_folder:*{:.pull-left .m-r}
> ---
>```
> cmp.arteveldehogeschool.local/
> ├── www/
> │   ├── data/
> │   └── scripts/
> └── README.md
>```
{:.card .card-block}

Database
--------

WordPress gebruikt een **MySQL**-database. We gaan met behulp van een aantal Bash-scripts een databasegebruiker en een database aanmaken op de MySQL-server.

### Scripts en instellingen

> ##### Mappen & Bestanden *:open_file_folder:*{:.pull-left .m-r}
> ---
>```
> cmp.arteveldehogeschool.local/
> ├── www/
> │   ├── data/
> │   └── scripts/
> │       ├── db_backup.sh
> │       ├── db_drop.sh
> │       ├── db_init.sh
> │       ├── db_reset.sh
> │       ├── db_restore.sh
> │       └── settings
> └── README.md
>```
{:.card .card-block}

#### Instellingenbestand

In de map `scripts` maken we een nieuwe bestand `settings` waarin de instellingen komen. Op die manier kunnen de scripts voor andere projecten gebruikt worden, en moet enkel dit bestand aangepast worden. 

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/scripts/
vagrant@homestead$ touch settings
{% endhighlight %}

In het bestand `settings` zetten we de basisgegevens voor de databasegebruiker en de database.

{% highlight bash %}
{% include_relative _code/wp/scripts/settings %}
{% endhighlight %}

| Databasegebruiker | Databasewachtwoord | Database                     |
|-------------------|--------------------|------------------------------|
| `cmp_db_user`     | `cmp_db_password`  | `cmp_arteveldehogeschool_be` |
{:.table}

#### Initialiseren en verwijderen

##### Initialisatiescript

Dit script maakt een gebruiker en een database in MySQL.

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/scripts/
vagrant@homestead$ touch db_init.sh && chmod +x db_init.sh
{% endhighlight %}

In het bestand `db_init.sh`:

{% highlight bash %}
{% include_relative _code/wp/scripts/db_init.sh %}
{% endhighlight %}

##### Verwijderscript

Dit script verwijdert de database en alle gegevens.

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/scripts/
vagrant@homestead$ touch db_drop.sh && chmod +x db_drop.sh
{% endhighlight %}

In het bestand `db_drop.sh`:

{% highlight bash %}
{% include_relative _code/wp/scripts/db_drop.sh %}
{% endhighlight %}

##### Resetscript

Dit script voert eerst het verwijderscript uit en daarna het initialisatiescript.

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/scripts/
vagrant@homestead$ touch db_reset.sh && chmod +x db_reset.sh
{% endhighlight %}

In het bestand `db_reset.sh`:

{% highlight bash %}
{% include_relative _code/wp/scripts/db_reset.sh %}
{% endhighlight %}

#### Backuppen en terugzetten

##### Backupscript

Dit script maakt een backup van de database in de map `scripts/dumps/`.

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/scripts/
vagrant@homestead$ touch db_backup.sh && chmod +x db_backup.sh
{% endhighlight %}

In het bestand `db_backup.sh`:

{% highlight bash %}
{% include_relative _code/wp/scripts/db_backup.sh %}
{% endhighlight %}

##### Restorescript

Dit script herstelt de database op basis van de laatste backup in de map `scripts/dumps/`.

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/scripts/
vagrant@homestead$ touch db_restore.sh && chmod +x db_restore.sh
{% endhighlight %}

In het bestand `db_restore.sh`:

{% highlight bash %}
{% include_relative _code/wp/scripts/db_restore.sh %}
{% endhighlight %}

### Installatie voorbereiden

Voor we WordPress kunnen installeren moet er een databasegebruiker en een database aangemaakt worden. Dit doen we met het intialisatiescript dat we eerder gemaakt hebben.

#### Windows

> ##### **Opgelet** *:warning:*{:.pull-left .m-r}
> ---
> Als de scripts op *&nbsp;*{:.fa .fa-windows}Windows bewerkt werden, moet er mogelijk eerst nog eenmalig een `dos2unix` op de bestanden uitgevoerd worden. Dit zal de Windows-regeleinden vervangen door Unix-regeleinden. Windows-regeleiden zorgen voor fouten bij de uitvoering van het script.
{:.alert .alert-warning}

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/scripts/
vagrant@homestead$ dos2unix *
{% endhighlight %}

#### Database initialiseren

Voor we gaan installeren gaan we de database initialiseren:

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/scripts/
vagrant@homestead$ ./db_init.sh
{% endhighlight %}

Broncode
--------

We gaan laatste versie van WordPress installeren in de map `~/Code/cmp.arteveldehogeschool.local/www/wordpress/`

Deze map is in [Artestead][artestead] al automatisch gekoppeld aan de domeinnaam [www.cmp.arteveldehogeschool.local](http://www.cmp.arteveldehogeschool.local)

> ##### Mappen & Bestanden *:open_file_folder:*{:.pull-left .m-r}
> ---
>```
> cmp.arteveldehogeschool.local/
> ├── www/
> │   ├── data/
> │   ├── scripts/
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

![Configuratie in de browser]({{ site.baseurl }}/images/installatie/configuratie.00.png "Configuratie in de browser"){:.screenshot}

![Configuratie in de browser]({{ site.baseurl }}/images/installatie/configuratie.01.png "Configuratie in de browser"){:.screenshot}

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

![Installatieproces in de browser 00]({{ site.baseurl }}/images/installatie/installatieproces.00.png "Installatieproces in de browser"){:.screenshot}

![Installatieproces in de browser 01]({{ site.baseurl }}/images/installatie/installatieproces.01.png "Installatieproces in de browser"){:.screenshot}

![Installatieproces in de browser 02]({{ site.baseurl }}/images/installatie/installatieproces.02.png "Installatieproces in de browser"){:.screenshot}

### Manier 2 (via WP-CLI) 

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/wordpress/
vagrant@homestead$ wp core install --url=www.cmp.arteveldehogeschool.local --title='Crossmedia Publishing' --admin_user=cmp_gebruiker --admin_password=cmp_wachtwoord --admin_email=cmp@arteveldehs.be
{% endhighlight %}

Inloggen
--------

Na de installatie ziet de **frontoffice** (wat bezoekers te zien krijgen) website er zo uit:

![Website]({{ site.baseurl }}/images/installatie/website.png "Website"){:.screenshot}

We kunnen inloggen op de **backoffice** (wat beheerders te zien krijgen) met de WP-gebruikersgegevens.

|               Veld | Waarde           |
|-------------------:|------------------|
| **Gebruikersnaam** | `cmp_gebruiker`  |
|     **Wachtwoord** | `cmp_wachtwoord` |
{:.table .table-striped}

Ga naar [www.cmp.arteveldehogeschool.local/wp-admin/](http://www.cmp.arteveldehogeschool.local/wp-admin/).

![Inlogformulier]({{ site.baseurl }}/images/installatie/inloggen.00.png "Inlogformulier"){:.screenshot}

![WordPress Dashboard]({{ site.baseurl }}/images/installatie/inloggen.01.png "WordPress Dashboard"){:.screenshot}

{% comment %}
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

![Netwerk Instellen]({{ site.baseurl }}/images/installatie/netwerk_instellen.png "Netwerk Instellen"){:.screenshot}

{% endcomment %}


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