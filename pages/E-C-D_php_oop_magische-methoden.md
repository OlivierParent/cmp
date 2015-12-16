---
layout    : page
title     : Magisch
title_long: Magische Methoden
permalink : php/oop/magische-methoden/
published : true
tags      :
---

Magische methoden zijn speciale methoden waarvan de naam begint met een dubbele underscore (`__`).

Constructors en destructors 
---------------------------

### Constructor-methode

Een constructor-methode wordt opgeroepen telkens een instantieobject van een klasse gemaakt wordt. In PHP zijn er twee manieren om die methode te maken. De klassieke manier (omwille van compatibiliteit met PHP 4) door een methode te maken met exact dezelfde naam als de klasse, wat als nadeel heeft dat als de klassenaam wijzigt ook de naam van de constructor mee moet wijzigen.

Om dit nadeel weg te werken en ook om het verwijzen naar de constructor van een parent-klasse (die niet automatisch opgeroepen wordt) te vergemakkelijken, bestaat er sinds PHP 5 een universele constructor-methode: `__construct()`. Om argumenten mee te leveren met de constructor moet men haakjes gebruiken bij het instantiëren, anders volstaat enkel de klassenaam.

### Destructor-methode
Een destructor-methode `__destruct()` bestaat ook en werkt exact hetzelfde, maar wordt uitgevoerd wanneer een object vernietigd wordt. Hoewel objecten vanzelf opgeruimd worden nadat het script uitgevoerd is, kan een destructor handig zijn om bijvoorbeeld databaseconnectie netjes af te sluiten en zo de connectie terug vrij te geven. Zo kunnen andere scripts die connectie al hergebruiken terwijl het script nog bezig is met bijvoorbeeld de pagina te renderen.

{% highlight php %}
oop/magisch/constructor_destructor.php
{% include_relative _code/php/oop/magisch/constructor_destructor.php %}
{% endhighlight %}

Object naar string converteren
------------------------------

Wanneer impliciete of expliciete typeconversie naar een string op een object uitgevoerd wordt, dan wordt de magische methode `__toString()` automatisch aangeroepen.

{% highlight php %}
oop/magisch/tostring.php
{% include_relative _code/php/oop/magisch/tostring.php %}
{% endhighlight %}

Klonen
------

De magische methode `__clone()` wordt aangeroepen als een object gekloond wordt met het sleutelwoord `clone`.

{% highlight php %}
<!-- oop/magisch/klonen.php -->
{% include_relative _code/php/oop/magisch/klonen.php %}
{% endhighlight %}

Getters en setters
------------------

Het pricipe van **encapsulatie** uit OOD bepaalt dat de interne werking van een object verborgen moet blijven. Zo mogen de gegevens in het object niet rechtstreeks aangesproken worden, maar wel via getters en setters. In PHP moet een ontwikkelaar zelf methoden schrijven hiervoor, maar er is wel de mogelijkheid om een generieke getter en generieke setter te implementeren via magische methoden.

### Generieke getter-methode

Een getter zal de gegevens uit een `private` of `protected` member-variable opvragen. Via de magische methode `__get($variabelenaam)` kan een generieke getter gemaakt worden voor niet-statische member-variabelen.

### Generieke setter-methode

Een setter zal de gegevens aan een `private` of `protected` member-variable toekennen. Via de magische methode `__set($variabelenaam, $waarde)` kan een generieke setter gemaakt worden voor niet-statische member-variabelen.

{% highlight php %}
<!-- oop/magisch/getter_setter.php -->
{% include_relative _code/php/oop/magisch/getter_setter.php %}
{% endhighlight %}


{% comment %}
<!-- ⚓ Afkortingen -->
{% endcomment %}
*[OOD]:                     Objectgeoriënteerd Design