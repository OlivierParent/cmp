---
layout    : page
title     : MySQL
title_long: Oracle MySQL
permalink : php/databases/mysql/
published : true
tags      :
---

> ##### **Do's** :thumbsup:
> ---
> Gebruik [PHP Data Objects](../pdo/) om een MySQL database aan te spreken!
{:.alert .alert-success}

MySQL wordt vaak in één adem vernoemd met PHP. Deze tandem is nog steeds de populairste combinatie. Door de overname van Sun Microsystems door Oracle is deze opensource database in handen van één van de grootste commerciële databasebedrijven. De oorspronkelijke ontwikkelaar van MySQL en de oprichter van het bedrijf [MySQL AB][mysql] is de Zweed **Michael ‘Monty’ Widenius**. Hij werkt ondertussen aan een alternatieve doorontwikkeling van MySQL: [MariaDB][mariadb]. Leuk detail: beide databases zijn vernoemd naar Widenius’ dochters My[^1] en Maria.

Sinds PHP 5.3 kan er van het systeemeigen stuurprogramma voor MySQL gebruik gemaakt worden.

In het volgende voorbeeld wordt de OOP manier gebruikt, de procedurele manier bestaat ook maar de voorkeur gaat uit naar de OOP versie.

{% highlight php %}
databases/mysql/mysql.php
{% include_relative _code/php/databases/mysql/mysql.php %}
{% endhighlight %}


{% comment %}
<!-- ⚓ Voetnoten -->
{% endcomment %}
[^1]: My is een Zweedse bijnaam voor Maria en wordt uitgesproken als ‘Muu’.

{% comment %}
<!-- ⚓ Afkortingen -->
{% endcomment %}
*[OOP]:                     Objectgeoriënteerd Programmeren

{% comment %}
<!-- ⚓ Hyperlinks -->
{% endcomment %}
[mysql]:                    https://www.mysql.com
[mariadb]:                  https://mariadb.org