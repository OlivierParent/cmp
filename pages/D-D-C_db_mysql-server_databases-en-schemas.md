---
layout   : page
title    : Databases en Schema's
permalink: db/mysql-server/databases-en-schemas/
published: true
tags     :
---

Wat is een Database of Schema?
------------------------------

Een **database** is een verzameling van tabellen. Die tabellen kunnen daarenboven ook nog eens gegroepeerd worden in **schema's**.

> ##### **Opmerking** *:point_up:*{:.pull-left .m-r}
> ---
> **MySQL** maakt geen onderscheid tussen een database en een schema. Daarom zijn de de sleutelwoorden `DATABASE` en `SCHEMA` aliassen. Andere DBMS'en, zoals PostgreSQL, maken wel degelijk een onderscheid tussen de twee!
{:.alert .alert-info}

Databasebeheer
--------------

### Databases **Tonen**

{% highlight sql %}
-- Databases tonen
SHOW DATABASES;
{% endhighlight %}

Bijvoorbeeld:

{% highlight bash %}
mysql> SHOW DATABASES;
{% endhighlight %}

### Database **Aanmaken**

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [MySQL / MySQL 5.6 Reference Manual / CREATE DATABASE Syntax](http://dev.mysql.com/doc/refman/5.6/en/create-database.html)
{:.card .card-block}

Een database aanmaken doe je met een `CREATE`-statement

{% highlight sql %}
-- Database aanmaken
CREATE DATABASE `{databasenaam}`;
{% endhighlight %}

> ##### **Tip** *:bulb:*{:.pull-left .m-r}
> ---
> Voorkom foutmeldingen door **voorwaardelijke statements** te gebruiken. Hiervoor gebruik je `IF EXISTS` of `IF NOT EXISTS`.
{:.alert .alert-info}

Bijvoorbeeld:

{% highlight bash %}
mysql> CREATE DATABASE IF NOT EXISTS `database_arteveldehogeschool_be`;
{% endhighlight %}

In **MySQL** kan je exact hetzelfde bereiken met `SCHEMA` omdat dit een alias is voor `DATABASE`: 

{% highlight sql %}
-- Schema aanmaken
CREATE SCHEMA [IF NOT EXISTS] `{schemanaam}`;
{% endhighlight %}

Je kan ook een standaard **tekencodering** (`CHARACTER SET`) en **sorteervolgorde** (`COLLATE`) instellen.

{% highlight sql %}
-- Database aanmaken
CREATE DATABASE [IF NOT EXISTS] `{databasenaam}`
DEFAULT CHARACTER SET {tekencodering}
COLLATE {sorteervolgorde};
{% endhighlight %}

> ##### **Opmerking** *:point_up:*{:.pull-left .m-r}
> ---
> De **collatie** *(collation)* is de **sorteervolgorde** van de tekens. In bepaalde talen is dit heel belangrijk. Zo wordt bijvoorbeeld de Duitse letter 'Ä' als gewone 'A' aanzien bij het sorteren, terwijl de Zweedse letter 'Å' na de 'Z' komt in het alfabet. Bij een sorteervolgorde die **hoofdlettergevoelig** is komt bovenkast voor onderkast. Dus eerst 'A' tot en met 'Z' en dan pas 'a' tot en met 'z'.
{:.alert .alert-info}

Bijvoorbeeld:

{% highlight bash %}
mysql> CREATE DATABASE IF NOT EXISTS `database_arteveldehogeschool_be`
    -> DEFAULT CHARACTER SET utf8
    -> COLLATE utf8_general_ci;
{% endhighlight %}

Dit wil zeggen:

 - `IF NOT EXISTS`: Het create statement wordt enkel uitgevoerd als er nog geen database is met deze naam.
 - `CHARACTER SET utf8`: De standaardtekencodering van de tabellen is [UTF-8](http://tools.ietf.org/html/rfc3629) *(8-bit Unicode Transformation Format)*.
 - `COLLATE utf8_general_ci` wil zeggen dat de sorteervolgorde gebeurt volgens:
   - `utf8`: UTF-8-tekencodering
   - `general`: algemeen (niet-taalspecifiek)
   - `ci`: niet-hooflettergevoelig *(case insensitive)*

> ##### **Tip** *:bulb:*{:.pull-left .m-r}
> ---
> Je kan het `CREATE DATABASE`-statement van een bestaande database opvragen met `SHOW`.
{:.alert .alert-info}

{% highlight sql %}
SHOW CREATE DATABASE `{databasenaam}`
{% endhighlight %}

### Database **Selecteren** voor Gebruik

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [MySQL / MySQL 5.6 Reference Manual / USE Syntax](http://dev.mysql.com/doc/refman/5.6/en/use.html)
{:.card .card-block}

Met `USE` geef je aan op welke database de SQL-statements van toepassing zijn. Dit blijft zo voor de rest van de sessie.

{% highlight sql %}
-- Database (of schema) als standaard instellen
USE `{databasenaam}`;
{% endhighlight %}

Bijvoorbeeld:

{% highlight bash %}
mysql> USE `database_arteveldehogeschool_be`;
{% endhighlight %}

### Database **Verwijderen**

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [MySQL / MySQL 5.6 Reference Manual / DROP DATABASE Syntax](http://dev.mysql.com/doc/refman/5.6/en/drop-database.html)
{:.card .card-block}

Een database verwijderen doe je met een `DROP`-statement

{% highlight sql %}
-- Database verwijderen
DROP DATABASE [IF EXISTS] `{databasenaam}`;
{% endhighlight %}

Bijvoorbeeld:

{% highlight bash %}
mysql> DROP DATABASE IF EXISTS `database_arteveldehogeschool_be`;
{% endhighlight %}

Databasebackup
--------------

### Back-up **Maken**

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [MySQL / MySQL 5.6 Reference Manual / mysqldump — A Database Backup Program](http://dev.mysql.com/doc/refman/5.6/en/mysqldump.html)
{:.card .card-block}

Een backup maken van een database kan met het programma `mysqldump`. Je gebruikt dezelfde credentials als voor `mysql` (bijv. databasegebruiker `homestead` met als wachtwoord `secret`).

Hulp over het gebruik vraag je met de optie `--help` of `-?`:

{% highlight bash %}
vagrant@homestead$ mysqldump -?
{% endhighlight %}

Je kan de SQL-statements naar het scherm laten dumpen. Bijvoorbeeld:

{% highlight bash %}
vagrant@homestead$ mysqldump -uhomestead -p database_arteveldehogeschool_be
Enter password: _
{% endhighlight %}

Je kan de dump ook omleiden naar een bestand door de *redirect output to file*-operator (`>`) van de shell te gebruiken. Bijvoorbeeld:

{% highlight bash %}
vagrant@homestead$ mysqldump -uhomestead -p database_arteveldehogeschool_be > ~/Code/dump.sql
Enter password: _
{% endhighlight %}

Als je een historiek wil bijhouden kan je de dumps ook een **timestamp** geven met `$(date +"%Y-%m-%d_%H%M%S")`. Bijvoorbeeld:

{% highlight bash %}
vagrant@homestead$ mysqldump -uhomestead -p database_arteveldehogeschool_be > ~/Code/dump_$(date +"%Y-%m-%d_%H%M%S").sql
Enter password: _
{% endhighlight %}

Om de `CREATE DATABASE`-statements ook te laten generen moet je de optie `--databases` of `-B` toevoegen. Met deze optie kan je ook **meerdere databases** tegelijk back-uppen door de databasenamen na elkaar op te geven, telkens met een spatie ertussen.

{% highlight bash %}
vagrant@homestead$ mysqldump -uhomestead -p --databases database_arteveldehogeschool_be > ~/Code/dump.sql
Enter password: _
{% endhighlight %}

Je kan ook **alle databases** laten dumpen, (dus ook die databases die MySQL zelf gebruikt zoals `mysql`, door de optie `--all-databases` of `-A` te gebruiken.

{% highlight bash %}
vagrant@homestead$ mysqldump -uhomestead -p --all-databases > ~/Code/dump.sql
Enter password: _
{% endhighlight %}

Je kan de dumpbestanden ook **comprimeren** met `gzip` en de optie `-c` *(output to console)*:

{% highlight bash %}
vagrant@homestead$ mysqldump -uhomestead -p --databases database_arteveldehogeschool_be | gzip -c > dump.sql.gz
{% endhighlight %}

### Back-up **Terugzetten**

De dumpbestanden terugzetten doe je met `mysql`.

Een dumpbestand **zonder** `DATABASE CREATE`-statement terugzetten:

{% highlight bash %}
vagrant@homestead$ mysql -uhomestead -p database_arteveldehogeschool_be < ~/Code/dump.sql
Enter password: _
{% endhighlight %}

Een dumpbestand **met** `DATABASE CREATE`-statement terugzetten:

{% highlight bash %}
vagrant@homestead$ mysql -uhomestead -p < ~/Code/dump.sql
Enter password: _
{% endhighlight %}

Een gecomprimeerd dumpbestand terugzetten door het te decomprimeren met `gunzip` en de optie `-c` *(output to console)*: 

{% highlight bash %}
vagrant@homestead$ gunzip -c ~/Code/dump.sql.gz | mysql -uhomestead -p 
Enter password: _
{% endhighlight %}

### Back-up **Importeren**

> ##### Zie ook :books:
> ---
> - [MySQL / MySQL 5.6 Reference Manual / mysqlimport — A Data Import Program](http://dev.mysql.com/doc/refman/5.6/en/mysqlimport.html)
{:.card .card-block}


{% comment %}
<!-- ⚓ Afkortingen -->
{% endcomment %}
*[DBMS]:                    Databasemanagementsysteem
