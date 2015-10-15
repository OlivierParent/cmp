---
layout    : page
title     : PDO
title_long: PHP Data Objects
permalink : php/databases/pdo/
published : true
tags      :
---

Waarom PDO?
-----------

PDO is de standaardmanier om met een database te werken in PHP. Zowat alle frameworks, CMS‘en en ORM-systemen maken gebruik van PDO.

SQLite3 is zeer handig om in een developmentomgeving te gebruiken, omdat er geen databaseserver nodig is. Voor echt grote websites is deze database te licht en heb je een zwaardere database nodig, zoals MySQL. Je hebt misschien al gemerkt dat er toch een paar verschillen zijn tussen de manier waarop PHP met SQLite3 en MySQLi samenwerkt.

Om die verschillen zoveel mogelijk weg te werken kan er gebruik gemaakt worden van een abstractielaag. Eén van de vier abstractielagen in PHP is PDO. Met een abstractielaag kunnen verschillende databases op een generieke manier aangesproken worden. Dit maakt het (relatief) eenvoudig om je code compatibel te maken met verschillende databases.

Nadelen en beperkingen
----------------------

Doordat PDO zo generiek mogelijk moet zijn, kunnen sommige specifieke features van een bepaalde database niet gebruikt worden. Soms zijn die toch beschikbaar via het [PDO-stuurprogramma](http://php.net/pdo.drivers) voor een bepaalde database.

Bovendien moet je nog altijd aandacht besteden aan het specifieke **SQL-dialect** dat elke database gebruikt.

PDO ondersteunt onder meer volgende databases:

 - Microsoft SQL Server
 - MySQL
 - Oracle
 - DB2
 - PostgreSQL
 - SQLite3

Ondersteuning hangt ook af van de serverconfiguratie. Om te weten welke databases de server ondersteunt, kan je de statische methode `getAvailableDrivers()` van de PDO-klasse aanroepen.

{% highlight php %}
<!-- databases/pdo/ondersteuning.php -->
{% include_relative _code/php/databases/pdo/ondersteuning.php %}
{% endhighlight %}

Voordelen
---------

### Prepared Statements

PDO ondersteunt ook **prepared statements** *(voorbereide statements).* In deze statements kan je parameters gebruiken.

| Parameter	| Betekenis                            |
|-----------|--------------------------------------|
| `?`       | Anonieme parameter.                  |
| `:naam`   | Parameter met een bepaalde naam.[^1] |
{:.table}

Gebruik anonieme parameters liever niet, want ze maken de query moeilijker leesbaar voor mensen, want kan leiden tot fouten. Je kan ze wel gebruiken als je een query dynamisch samenstelt en bijvoorbeeld vooraf niet weet hoeveel parameters er nodig zijn.

Voorbeeld
---------

### Verbinding met databaseserver

Met PDO volstaan enkele minieme wijziging aan je code om een andere soortdatabaseserver te gebruiken. Dit laat toe om bijvoorbeeld SQLite3 gebruiken in je developmentomgeving en MySQL in je productieomgeving op relatief eenvoudige wijze. In je SQL-statements moet je wel nog rekening houden met eventuele verschillen in SQL-dialect.

#### Connectie openen

In onderstaand voorbeeld gebruiken we een tijdelijke SQLite3 database in het RAM-geheugen van de databaseserver. Door de boolean `$isSQLite` te wijzigen in `false`, wordt er een MySQL database gebruikt (zorg er wel voor dat de naam van het database schema en de gegevens van de databasegebruiker kloppen met je eigen serveropstelling).

{% highlight php %}
<!-- databases/pdo/connectie_openen.php -->
{% include_relative _code/php/databases/pdo/connectie_openen.php %}
{% endhighlight %}

#### Connectie sluiten

De connectie wordt automatisch gesloten na het einde van het PHP-script. Soms zit er een behoorlijke tijd tussen het einde van het script en laatste keer dat de databaseconnectie gebruikt wordt. Bijvoorbeeld wanneer een grote HTML-tabel met php gegenereerd wordt.

> ##### **Opmerking** *:point_up:*{:.pull-left .m-r}
> ---
> Er is slechts een beperkt aantal databaseconnecties per databaseserver beschikbaar. Daarom is het belangrijk om een connectie zo snel mogelijk te sluiten, zodat die connectie door andere websitebezoekers opnieuw gebruikt kunnen worden.
{:.alert .alert-info}

{% highlight php %}
<!-- databases/pdo/connectie_sluiten.php -->
{% include_relative _code/php/databases/pdo/connectie_sluiten.php %}
{% endhighlight %}

### Een SQL-statement uitvoeren, zonder result set

In onderstaande voorbeelden gaan we SQL-statements uitvoeren waarvan we geen result set terugverwachten. Daarvoor kunnen we de methode `exec()` van het databaseconnectieobject gebruiken om het SQL-statement uit te voeren.

#### Een tabel verwijderen

Voor je een nieuwe tabel maakt moet je eerst de tabellen met dezelfde naam verwijderen.

> ##### **Opmerking** *:point_up:*{:.pull-left .m-r}
> ---
> In de gebruikte voorbeelden zal deze situatie nooit voorkomen. Onderstaand voorbeeld is dus ter illustratie.
{:.alert .alert-info}

{% highlight php %}
<!-- databases/pdo/drop_table.php -->
{% include_relative _code/php/databases/pdo/drop_table.php %}
{% endhighlight %}

#### Een tabel maken

Om te vermijden dat de databaseserver een foutmeldiging zal geven als er al een tabel bestaat met dezelfde naam, kan je IF NOT EXISTS gebruiken in je SQL-statement.

{% highlight php %}
<!-- databases/pdo/create_table.php -->
{% include_relative _code/php/databases/pdo/create_table.php %}
{% endhighlight %}

### Gegevens invoeren *(Create)*

#### Met een Prepared Statement

> ##### **Do's** *:thumbsup:*{:.pull-left .m-r}
> ---
> Maak zoveel mogelijk gebruik van prepared statements, want de uitvoering zal meestal iets sneller zijn en het biedt bescherming tegen SQL Injection-aanvallen.
{:.alert .alert-success}


Nadat een SQL-statement voorbereid is met de methode `prepare()`, kunnen er variabelen aan de parameters van het Prepared Statement gebonden worden. Een variabele kan met twee methodes gebonden worden aan de parameter.

| Methode       | Waarde gebonden aan het Prepared Statement                                          |
|---------------|-------------------------------------------------------------------------------------|
| `bindParam()` | Waarde van de variabele op het **moment van uitvoeren** van het Prepared Statement. |
| `bindValue()` | Waarde van de variabele op het **moment van binden** aan het Prepared Statement.    |
{:.table}

Voor de meeste situaties zal `bindValue()` volstaan.

Het prepared statement wordt pas effectief uitgevoerd als de methode `execute()` aangeroepen wordt.

> ##### **Opgelet** *:warning:*{:.pull-left .m-r}
> ---
> Verwar `execute()` niet met de methode `exec()` van het databaseconnectieobject!
{:.alert .alert-warning}

{% highlight php %}
<!-- databases/pdo/create_insert.php -->
{% include_relative _code/php/databases/pdo/create_insert.php %}
{% endhighlight %}

### Gegevens inlezen *(Read)*

{% highlight php %}
<!-- databases/pdo/read_select.php -->
{% include_relative _code/php/databases/pdo/read_select.php %}
{% endhighlight %}

{% highlight php %}
<!-- databases/pdo/read_select_where.php -->
{% include_relative _code/php/databases/pdo/read_select_where.php %}
{% endhighlight %}

### Gegevens bijwerken *(Update)*

{% highlight php %}
<!-- databases/pdo/update.php -->
{% include_relative _code/php/databases/pdo/update.php %}
{% endhighlight %}
 
### Gegevens verwijderen *(Delete/Drop)*

{% highlight php %}
<!-- databases/pdo/drop_delete.php -->
{% include_relative _code/php/databases/pdo/drop_delete.php %}
{% endhighlight %}
 
Meer informatie
---------------

 - [PHP Data Objects](http://php.net/pdo)
 - [PDO-stuurprogramma’s](http://php.net/pdo.drivers)
 - [`PDO::exec`](http://php.net/pdo.exec)
 - [`PDO::prepare`](http://php.net/pdo.prepare)
 - [`PDO::lastinsertid`](http://php.net/pdo.lastinsertid)
 - [`PDOStatement::bindvalue`](http://php.net/pdostatement.bindvalue)
 - [`PDOStatement::bindparam`](http://php.net/pdostatement.bindparam)
 - [`PDOStatement::bindcolumn`](http://php.net/pdostatement.bindcolumn)
 - [`PDOStatement::execute`](http://php.net/pdostatement.execute)
 - [`PDOStatement::fetch`](http://php.net/pdostatement.fetch)
 - [`PDOStatement::fetchAll`](http://php.net/pdostatement.fetchAll)


{% comment %}
<!-- ⚓ Voetnoten -->
{% endcomment %}
[^1]: Je mag de parameter meerdere keren laten voorkomen in je SQL-statement, maar de waarde zal telkens dezelfde zijn.

{% comment %}
<!-- ⚓ Afkortingen -->
{% endcomment %}
*[CMS]:                     Content Management System
*[ORM]:                     Object Relational Mapping
*[PDO]:                     PHP Data Objects

{% comment %}
<!-- ⚓ Hyperlinks -->
{% endcomment %}
[mysql]:                    https://www.mysql.com
[mariadb]:                  https://mariadb.org