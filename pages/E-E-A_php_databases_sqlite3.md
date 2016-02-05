---
layout   : page
title    : SQLite3
permalink: php/databases/sqlite3/
published: true
tags     :
---

> ##### **Do's** :thumbsup:
> ---
> Gebruik [PHP Data Objects](../pdo/) om een SQLite3 database aan te spreken!
{:.alert .alert-success}

Sinds versie 5 heeft PHP standaard een ingebouwde database (Embedded RDBMS) ter beschikking, nl. [SQLite][sqlite], zowel versie 2 als versie 3. SQLite [wordt gebruikt][sqlite-users] door o.m. Apple, Microsoft, Mozilla  en Google. Deze piepkleine – slechts iets meer dan 250 kB grote – ‘serverless’ database zonder configuratie is niet zo krachtig als de meeste RDBMS’en van het client/server-type, maar ze is wel krachtig genoeg voor bepaalde taken zoals o.a.:

 - Database met lage belasting voor kleine tot middelgrote websites met beperkte trafiek (er kan niet tegelijkertijd van en naar de database gelezen of geschreven worden, zodat één proces dat leest de andere processen het schrijven belet en omgekeerd);
 - Tijdelijke opslag van gegevens;
 - Stand-in voor productie database, want SQLite gebruikt in tegenstelling tot bepaalde andere RDBMS’en zeer weinig systeembronnen;
 - Ter vervanging van een bestandsformaat (bijv. XML-bestanden), want elke database bestaat uit één bestand dat makkelijk gekopieerd kan worden, ook naar andere platformen zolang daarop ook SQLite gebruikt wordt.
 - Omdat de databases gewoon in een bestand opgeslagen worden moet de applicatie wel schrijfrechten hebben en moeten er ook veiligheidsmaatregelen genomen worden om te vermijden dat die bestanden gedownload zouden kunnen worden.

Versie
------

{% highlight php %}
databases/sqlite3/versie.php
{% include_relative _code/php/databases/sqlite3/versie.php %}
{% endhighlight %}
 
Objectgeoriënteerd
------------------

Vanaf PHP 5.3 kan SQLite3 via een object aangesproken worden.

{% highlight php %}
databases/sqlite3/sqlite3.php
{% include_relative _code/php/databases/sqlite3/sqlite3.php %}
{% endhighlight %}

Prepared statements
-------------------

Om waarden aan je SQL-statements toe te voegen kun je karakterstrings of variabelen gebruiken, maar deze laatste zijn onveilig voor webtoepassingen omdat ze kwetsbaar zijn voor SQL-injectieaanvallen.

Om deze te vermijden moeten bepaalde tekens – zoals apostroffen (`'`) – voorafgegaan worden door een backslash zodat ze als deel van de karakterstring geïnterpreteerd worden in plaats van als een ander deel van het SQL-statement.

Een andere manier is werken met **prepared statements** waarbij dit probleem zich niet kan voordoen. Een bijkomend voordeel is dat deze ook iets sneller zijn (de winst is echter miniem), omdat die statements al naar virtuele machinetaal zijn omgezet en omdat ze telkens hergebruikt kunnen worden.

Prepared statements kunnen op twee manieren werken.

| Methode       | Waarde gebonden aan het Prepared Statement                                          |
|---------------|-------------------------------------------------------------------------------------|
| `bindParam()` | Waarde van de variabele op het **moment van uitvoeren** van het Prepared Statement. |
| `bindValue()` | Waarde van de variabele op het **moment van binden** aan het Prepared Statement.    |
{:.table}

Voor de meeste situaties zal `bindValue()` volstaan.

{% highlight php %}
databases/sqlite3/prepstat.php
{% include_relative _code/php/databases/sqlite3/prepstat.php %}
{% endhighlight %}


{% comment %}
<!-- ⚓ Afkortingen -->
{% endcomment %}
*[RDBMS]:                   Relational Database Management System

{% comment %}
<!-- ⚓ Hyperlinks -->
{% endcomment %}
[sqlite]:                   http://www.sqlite.org
[sqlite-users]:             http://www.sqlite.org/famous.html
