---
layout    : page
title     : Installatie
permalink : wp/installatie/
published : false
tags      :
---

> ##### **Voorbeeld** *:package:*{:.pull-left .m-r}
> ---
> Het voorbeeldproject vind je op [Bitbucket](https://bitbucket.org/olivierparent/cmp.arteveldehogeschool.local)
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

Verwijder het commentaar (`#`) in de regels onder **Crossmedia Publishing (CMP)**:

{% highlight yaml %}
{% include_relative _code/wp/installatie/Homestead.00.yaml %}
{% endhighlight %}

> ##### **Opgelet** *:warning:*{:.pull-left .m-r}
> ---
> In YAML-bestanden heeft de insprong invloed op de betekenis. Verwijder geen spaties!
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
> │       └── index.php
> └── README.md
>```
{:.card .card-block}

Database
--------

WordPress gebruikt een **MySQL** database. 

### Nieuwe Databasegebruiker

#### Aanmelden als Databasebeheerder

Meld je aan op de databaseserver als **databasebeheerder** met onderstaande gegevens.

| Databasebeheerder | Databasewachtwoord |
|-------------------|--------------------|
| `homestead`       | `secret`           |
{:.table}

Daarvoor gebruiken we deze opdracht:

{% highlight bash %}
vagrant@homestead$ mysql --user=homestead --password
password: _
mysql> _
{% endhighlight %}


> ##### **Tip** *:bulb:*{:.pull-left .m-r}
> ---
> Je kan onmiddellijk aanmelden door het wachtwoord op te geven. 
{:.alert .alert-info}

{% highlight bash %}
vagrant@homestead$ MYSQL_PWD=secret mysql --user=homestead
{% endhighlight %}

> ##### **Opgelet** *:warning:*{:.pull-left .m-r}
> ---
> Dit is een **veiligheidsrisico** want het wachtwoord is zichtbaar in de CLI-history!
{:.alert .alert-warning}

#### Nieuwe databasegebruiker aanmaken

> ##### **Opgelet** *:warning:*{:.pull-left .m-r}
> ---
> De **databasegebruiker** is de gebruiker waarmee WordPress een verbinding maakt met de database. Dit is geen WordPress-gebruiker!
{:.alert .alert-warning}

We maken een databasegebruiker aan met onderstaande gegevens.

| Databasegebruiker | Databasewachtwoord |
|-------------------|--------------------|
| `cmp_db_user`     | `cmp_db_password`  |
{:.table}

Daarvoor gebruiken we deze opdracht:

{% highlight bash %}
mysql> GRANT ALL PRIVILEGES ON `cmp_arteveldehogeschool_be`.*
    -> TO 'cmp_db_user' IDENTIFIED BY 'cmp_db_password';
{% endhighlight %}

> ##### **Tip** *:bulb:*{:.pull-left .m-r}
> ---
> Je kan ook een hostnaam of IP-adres toevoegen. 
{:.alert .alert-info}

Bijvoorbeeld:

 - `'cmp_db_user'@'%'`
 - `'cmp_db_user'@'127.0.0.1'`
 - `'cmp_db_user'@'localhost'`

De standaardwaarde is `%` en dat wil zeggen om het even welke host of om het even welk IP-adres. Omdat `@'%'` de standaard is, mag het weglaten worden.

#### Afmelden

Meld je af als databasebeheerder met:

{% highlight bash %}
mysql> exit
Bye
vagrant@homestead$ _
{% endhighlight %}

### Database Aanmaken

#### Aanmelden als Databasegebruiker

We melden ons aan als de databasegebruiker die we daarnet aangemaakt hebben.

{% highlight bash %}
vagrant@homestead$ mysql --user=cmp_db_user --password
password: _
mysql> _
{% endhighlight %}

#### Database Aanmaken

We gaan een database aanmaken met de naam `cmp_arteveldehogeschool_be`.

{% highlight bash %}
mysql> CREATE DATABASE IF NOT EXISTS `cmp_arteveldehogeschool_be`
    -> CHARACTER SET utf8
    -> COLLATE utf8_general_ci;
{% endhighlight %}

Bekijk alle databases met:

{% highlight bash %}
mysql> SHOW DATABASES;
{% endhighlight %}

#### Afmelden

Meld je af als databasegebruiker met:

{% highlight bash %}
mysql> exit
Bye
vagrant@homestead$ _
{% endhighlight %}

### Database Backuppen en Terugzetten

#### Database Backup

Meld je aan op de server en voer onderstaande opdracht uit:

{% highlight bash %}
vagrant@homestead$ MYSQL_PWD=cmp_db_password mysqldump --user=cmp_db_user --databases cmp_arteveldehogeschool_be > ~/Code/cmp.arteveldehogeschool.local/www/database/dump.sql
{% endhighlight %}

> **Tip**  
> Je kan databasedumps ook een timestamp geven, als je een historiek wil bijhouden:
>
>     vagrant@homestead$ MYSQL_PWD=cmp_db_password mysqldump --user=cmp_db_user --databases cmp_arteveldehogeschool_be > ~/Code/cmp.arteveldehogeschool.local/www/database/dump_$(date +"%Y-%m-%d_%H%M%S").sql
    
#### Database Terugzetten

{% highlight bash %}
vagrant@homestead$ MYSQL_PWD=cmp_db_password mysql --user=cmp_db_user cmp_arteveldehogeschool_be < ~/Code/cmp.arteveldehogeschool.local/www/database/dump.sql
{% endhighlight %}

Broncode
--------

We gaan versie `4.3` installeren in de map `~/Code/cmp.arteveldehogeschool.local/www/wordpress/`

Deze map is in [Artevelde Laravel Homestead](https://github.com/OlivierParent/artestead) al automatisch gekoppeld aan de domeinnaam http://www.cmp.arteveldehogeschool.local

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

### Eerste Manier: Downloaden

Je kan de broncode (van de Nederlandstalige versie) downloaden van [http://nl.wordpress.org/] en het bestand decomprimeren in de map `wordpress`.

### Tweede Manier: WP-CLI

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

#### Installatie van WordPress

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/
vagrant@homestead$ wp core download --path=wordpress --locale=nl_NL
{% endhighlight %}

### Configuratie

Nadat de broncode geïnstalleerd is, moet die ook geconfigureerd worden.

De configuratie kan je ook via WP-CLI doen, 

Of je kan gewoon naar de website surfen op
[www.cmp.arteveldehogeschool.local](http://www.cmp.arteveldehogeschool.local) en de configuratieprocedure doorlopen

#### Via WP-CLI 

{% highlight bash %}
vagrant@homestead$ cd ~/Code/cmp.arteveldehogeschool.local/www/wordpress/
vagrant@homestead$ wp core config --dbname=cmp_arteveldehogeschool_be --dbuser=cmp_db_user --dbpass=cmp_db_password --dbhost=localhost --dbprefix=wp_

wp core install --url=<url> --title=<site-title> --admin_user=<username> --admin_password=<password> --admin_email=<email>
vagrant@homestead$ wp core install --path=wordpress --locale=nl_NL
{% endhighlight %}


#### Via de configuratieprocedure

![Installatie in Browser 00](http://olivierparent.byethost18.com/_assets/CMP/Installatie_Browser_00.png "Installatie in Browser 00")

Kies **Nederlands** en klik daarna op [Continue](http://www.cmp.arteveldehogeschool.local/wp-admin/setup-config.php?step=0) en daarna op [Laten we starten!](http://www.cmp.arteveldehogeschool.local/wp-admin/setup-config.php?step=1&language=nl_NL)

![Installatie in Browser 01](http://olivierparent.byethost18.com/_assets/CMP/Installatie_Browser_01.png "Installatie in Browser 01")

| Veld                | Waarde                       |
|---------------------|------------------------------|
| **Databasenaam:**   | `cmp_arteveldehogeschool_be` |
| **Gebruikersnaam:** | `cmp_db_user`                |
| **Wachtwoord:**     | `cmp_db_password`            |
| **Database-host:**  | `localhost`                  |
| **Tabelprefix:**    | `wp_`                        |
{:.table}

En klik op **Verzenden**.

![Installatie in Browser 02](http://olivierparent.byethost18.com/_assets/CMP/Installatie_Browser_02.png "Installatie in Browser 02")

Daarna klikken we op [De installatie starten](http://www.cmp.arteveldehogeschool.local/wp-admin/install.php?language=nl_NL)

![Installatie in Browser 03](http://olivierparent.byethost18.com/_assets/CMP/Installatie_Browser_03.png "Installatie in Browser 03")

| Veld                      | Waarde                  |
|---------------------------|-------------------------|
| **Websitetitel:**         | `Crossmedia Publishing` |
| **Gebruikersnaam:**       | `cmp_gebruiker`         |
| **Wachtwoord:**           | `cmp_wachtwoord`        |
| **Wachtwoord, tweemaal:** | `cmp_wachtwoord`        |
| **Je e-mailadres:**       | `cmp@arteveldehs.be`    |
{:.table}

En klik op **WordPress installeren**.

![Installatie in Browser 04](http://olivierparent.byethost18.com/_assets/CMP/Installatie_Browser_04.png "Installatie in Browser 04")

Daarna klikken op [Inloggen](http://www.cmp.arteveldehogeschool.local/wp-login.php).

![Installatie in Browser 05](http://olivierparent.byethost18.com/_assets/CMP/Installatie_Browser_05.png "Installatie in Browser 05")

En inloggen met de WP-gebruikersgegevens.

| Veld                     | Waarde                  |
|--------------------------|-------------------------|
| **Gebruikersnaam**       | `cmp_gebruiker`         |
| **Wachtwoord**           | `cmp_wachtwoord`        |
{:.table}

![Installatie in Browser 06](http://olivierparent.byethost18.com/_assets/CMP/Installatie_Browser_06.png "Installatie in Browser 06")

Dan kom je op **Sitebeheer**, het beheerdersgedeelte van de WP-installatie. Je komt standaard binnen op het **Dashboard**.

![Installatie in Browser 07](http://olivierparent.byethost18.com/_assets/CMP/Installatie_Browser_07.png "Installatie in Browser 07")

Klik op **Crossmedia Publishing** om naar de startpagina van de site te gaan.

![Installatie in Browser 08](http://olivierparent.byethost18.com/_assets/CMP/Installatie_Browser_08.png "Installatie in Browser 08")

### WordPress Netwerk van sites

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [WordPress.org / Support / Codex / Create A Network](http://codex.wordpress.org/Create_A_Network)
{:.card .card-block}

#### Wat is een Netwerk?

Je kan meerdere websites maken met één installatie van WordPress, een zogenaamd **Netwerk** van sites. De huidige website wordt dan de hoofdwebsite en de bijkomende websites staan dan in een **subdomein** of een **submap**. 

#### Netwerk activeren

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

![Netwerk Instellen](http://olivierparent.byethost18.com/_assets/CMP/Netwerk_instellen.png "Netwerk Instellen")

{% comment %}
<!-- ⚓ Afkortingen -->
{% endcomment %}
*[WP]:                      WordPress

{% comment %}
<!-- ⚓ Hyperlinks -->
{% endcomment %}
[artestead]:                http://www.olivierparent.be/artestead
[automattic]:               http://automattic.com
[composer]:                 https://getcomposer.org
[semver]:                   http://semver.org
[wp-com]:                   https://wordpress.com
[wp-org]:                   https://wordpress.org
[wp-svn]:                   http://core.svn.wordpress.org