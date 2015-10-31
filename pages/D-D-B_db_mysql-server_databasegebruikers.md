---
layout   : page
title    : Databasegebruikers
permalink: db/mysql-server/databasegebruikers/
published: true
tags     :
---

Soorten databasegebruikers
--------------------------

### Databasebeheerder

Enkel de **Databasebeheerder**, beter bekend als **DBA**, wordt verondersteld zich aan te melden de **Credentials** van de **rootgebruiker**. Deze rootgebruiker die meestal `root` als databasegebruikersnaam heeft, heeft alle mogelijke rechten.

| Credentials                | Waarde in Artestead |
|----------------------------|---------------------|
| Database**gebruikersnaam** | `root`              |
| Database**wachtwoord**     | `secret`            |
{:.table}

### Developers

**Developers** mogen in principe enkel databaseaccounts met beperkte(re) rechten gebruiken.

| Credentials                | Waarde in Artestead |
|----------------------------|---------------------|
| Database**gebruikersnaam** | `homestead`         |
| Database**wachtwoord**     | `secret`            |
{:.table}

### Applicaties

Het is erg aangewezen om per applicatie een aparte databasegebruiker aan te maken die enkel rechten heeft op de door de applicatie gebruikte databases. Zo voorkom je dat een applicatie  per ongeluk (of moedwillig na een hack) databases van een andere applicatie kan beschadigen.

Databasegebruikerbeheer
-----------------------

### Databasegebruikers **Oplijsten**

Alle databasegebruikers staan in de tabel `user` van de database `mysql`. Je kan ze eenvoudig oplijsten met een `SELECT`-statement. 

Bijvoorbeeld:

{% highlight bash %}
mysql> SELECT * FROM `mysql`.`user`;
{% endhighlight %}

> **Opmerking:** De **asterisk** (`*`) betekent alle **kolommen** van de tabel, niet alle rijen!

Om het overzicht te bewaren kan je enkel bepaalde kolommen laten tonen:

{% highlight bash %}
mysql> SELECT Host, User, Password
    -> FROM `mysql`.`user`;
{% endhighlight %}


### Databasegebruiker **Toevoegen**

Een databasegebruiker toevoegen:

{% highlight sql %}
-- Databasegebruiker aanmaken
CREATE USER '{db_gebruikersnaam}'
IDENTIFIED BY '{db_wachtwoord}';
{% endhighlight %}

> **OPGELET:** **MySQL** laat **maximaal 16 tekens** toe in de databasegebruikersnaam!

Bijvoorbeeld:

{% highlight bash %}
mysql> CREATE USER 'Olivier'
    -> IDENTIFIED BY 'GeheimWachtwoord';
{% endhighlight %}

> **Tip:** Je kan aan de databasegebruikersnaam ook een **host** of **IP-adres** toevoegen, zodat de databasegebruiker enkel vanaf die host of dat IP-adres kan aanmelden.
>
> Bijvoorbeeld: 
>
> * `'Olivier'@'%'`
> * `'Olivier'@'127.0.0.1'`
> * `'Olivier'@'localhost'`
>
> De standaardwaarde is `%` en wil zeggen: om het even welke host of welk IP-adres. Net omdat het de standaardwaarde is,  mag `@'%'` weggelaten worden.

#### Databasewachtwoorden

Om wachtwoorden te hashen gebruikt MySQL de functie `PASSWORD()`.

Bijvoorbeeld:

{% highlight bash %}
mysql> SELECT PASSWORD('GeheimWachtwoord') AS `Password Hashcode`;
+-------------------------------------------+
| Password Hashcode                         |
+-------------------------------------------+
| *3D79C803D354D9E2929EEE4F6FE9C151728C2801 |
+-------------------------------------------+
1 row in set (0.00 sec)
{% endhighlight %}

> ##### **Opgelet** *:warning:*{:.pull-left .m-r}
> ---
> De `PASSWORD()`-functie mag enkel gebruikt worden om de wachtwoorden van databasegebruikers te hashen. De toegang tot databaseservers is meestal zo goed beveiligd dat een hacker al fysieke toegang tot de server moet hebben om te kunnen inbreken. Voor bijvoorbeeld de wachtwoorden van websitegebruikers is de functie onvoldoende. Met **Rainbow Tables** (tabellen met hashcodes en de oorspronkelijke tekst) kan een hacker snel en makkelijk het oorspronkelijk wachtwoord achterhalen. Rainbow Tables maken hackers zelf, maar ze zijn ook gratis te vinden op websites zoals [Free Rainbow Tables](https://www.freerainbowtables.com)
{:.alert .alert-warning}

Met onderstaand `SELECT`-statement kan je een overzicht krijgen van alle databasegebruikers, en zien wie als  wachtwoord `GeheimWachtwoord` heeft:

{% highlight bash %}
mysql> SELECT Host, User, Password,
    -> Password = PASSWORD('GeheimWachtwoord')
    -> AS `Is het wachtwoord 'GeheimWachtwoord'?`
    -> FROM `mysql`.`user`;
{% endhighlight %}

Je kan de functie `PASSWORD()` gebruiken om het wachtwoord van databasegebruikers te wijzigen met behulp van een `UPDATE`-statement. Bijvoorbeeld:

{% highlight bash %}
mysql> UPDATE `mysql`.`user`
    -> SET Password = PASSWORD('AnderWachtwoord')
    -> WHERE User = 'Olivier';
{% endhighlight %}

### Databasegebruiker **Verwijderen**

Een databasegebruiker verwijderen doe je met een `DROP USER`-statement.

{% highlight sql %}
-- Databasegebruiker verwijderen
DROP USER '{db_gebruikersnaam}';
{% endhighlight %}

Bijvoorbeeld:

{% highlight bash %}
mysql> DROP USER 'Olivier';
{% endhighlight %}
 
### Rechten **Oplijsten**

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [MySQL / MySQL 5.6 Reference Manual / SHOW PRIVILEGES Syntax](http://dev.mysql.com/doc/refman/5.6/en/show-privileges.html)
> - [MySQL / MySQL 5.6 Reference Manual / SHOW GRANTS Syntax](http://dev.mysql.com/doc/refman/5.6/en/show-grants.html)
{:.card .card-block}

Een databasegebruiker heeft een aantal **Rechten** *(Privileges)* om dingen te doen met of in een database. Je kan een lijst alle **mogelijke rechten** die de server ondersteunt opvragen met:

{% highlight sql %}
-- Alle mogelijke rechten oplijsten (voor deze databaseserver)
SHOW PRIVILEGES;
{% endhighlight %}

Bijvoorbeeld:

{% highlight bash %}
mysql> SHOW PRIVILEGES;
{% endhighlight %}

Om de rechten van een bepaalde databasegebruiker op te vragen:

{% highlight sql %}
-- Alle toegekende rechten voor een databasegebruiker
SHOW GRANTS FOR '{db_gebruiker}';
{% endhighlight %}

Bijvoorbeeld:

{% highlight bash %}
mysql> SHOW GRANTS FOR 'Olivier';
{% endhighlight %}

### Rechten **Toekennen**

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [MySQL / MySQL 5.6 Reference Manual / GRANT Syntax](http://dev.mysql.com/doc/refman/5.6/en/grant.html)
{:.card .card-block}

Een databasegebruiker alle rechten (`ALL PRIVILEGES`) op alle tabellen (`*`) van een bepaalde database geven (`GRANT` … `TO`):

{% highlight sql %}
-- Alle rechten toekennen aan een databasegebruiker
GRANT ALL PRIVILEGES
ON `{databasenaam}`.*
TO '{db_gebruikersnaam}';
{% endhighlight %}

Het bovenstaande SQL-statement geeft de gebruiker alle rechten behalve `GRANT OPTION` (zelf rechten kunnen geven en ontnemen).

> ##### **Opmerking** *:point_up:*{:.pull-left .m-r}
> ---
> De **backtick** (`` ` ``) is meestal optioneel tenzij de naam een teken bevat die een speciale betekenis heeft in SQL, zoals bijvoorbeeld een koppelteken (`-`).
{:.alert .alert-info}

Bijvoorbeeld:

{% highlight bash %}
mysql> GRANT ALL PRIVILEGES
    -> ON `database_arteveldehogeschool_be`.*
    -> TO 'Olivier';
{% endhighlight %}

De database hoeft zelfs niet te bestaan, want de databasegebruiker heeft ook rechten om de database aan te maken.

> ##### **Tip** *:bulb:*{:.pull-left .m-r}
> ---
> Bij een `GRANT` … `TO` met `IDENTIFIED BY` zal de databasegebruiker automatisch aangemaakt worden als die niet bestaat.
{:.alert .alert-info}

{% highlight sql %}
-- Alle rechten toekennen aan nog niet bestaande databasegebruiker
GRANT ALL PRIVILEGES
ON `{databasenaam}`.`{tabel}`
TO '{db_gebruikersnaam}' IDENTIFIED BY '{db_wachtwoord}';
{% endhighlight %}

Bijvoorbeeld:

{% highlight bash %}
mysql> GRANT ALL PRIVILEGES
    -> ON `database_arteveldehogeschool_be`.*
    -> TO 'Olivier' IDENTIFIED BY 'GeheimWachtwoord';
{% endhighlight %}

In bovenstaand voorbeeld gelden de rechten op alle tabellen (`*`) van de database.

Rechten kunnen ook meer specifiek toegekend worden.

{% highlight bash %}
mysql> GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER
    -> ON `database_arteveldehogeschool_be`.*
    -> TO 'Olivier';
{% endhighlight %}

### Rechten **Ontnemen**

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [MySQL / MySQL 5.6 Reference Manual / REVOKE Syntax](http://dev.mysql.com/doc/refman/5.6/en/revoke.html)
{:.card .card-block}

Een databasegebruiker alle rechten (`ALL PRIVILEGES`) op alle tabellen (`*`) van een bepaalde database ontnemen (`REVOKE … FROM`):

{% highlight sql %}
-- Alle rechten ontnemen van een databasegebruiker
REVOKE ALL PRIVILEGES
ON `{databasenaam}`.*
FROM '{db_gebruikersnaam}';
{% endhighlight %}

Bijvoorbeeld:

{% highlight bash %}
mysql> REVOKE ALL PRIVILEGES
    -> ON `database_arteveldehogeschool_be`.*
    -> FROM 'Olivier';
{% endhighlight %}


{% comment %}
<!-- ⚓ Afkortingen -->
{% endcomment %}
*[CLI]:                     Command-Line Interface
*[DBA]:                     Database Administrator
