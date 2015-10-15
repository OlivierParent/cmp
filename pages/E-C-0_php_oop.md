---
layout    : page
title     : OOP
title_long: Objectgeoriënteerd Programmeren (OOP)
permalink : php/oop/
published : true
tags      :
---

PHP is van oorsprong een taal voor **procedureel programmeren**. Tegenwoordig hebben professionele ontwikkelaars de voorkeur voor OOP. PHP heeft sinds versie 3 ondersteuning voor OOP en sinds PHP 5 is de ondersteuning zo goed dat dit ook de gebruikelijke manier van programmeren geworden is.

Bij OOP worden programma’s opgebouwd uit objecten, die met elkaar kunnen communiceren.

Klassen
-------

Een klasse is een blauwdruk voor objecten, en wordt gedefinieerd met het sleutelwoord `class`. Klassen bevatten de definities voor attributen en methoden.

### Members

Een object bevat gegevens in de vorm van **attributen**. Deze attributen zijn te vergelijken met de variabelen en constanten die gebruikt worden bij procedureel programmeren. In de wereld van PHP worden attributen **members** genoemd. Meer specifiek: **member-variabelen** (soms ook properties) en **member-constanten**.

### Methoden

Functies die in een klasse gedefinieerd worden, noemt men **methoden**. Via (bepaalde) methoden kunnen objecten met elkaar communiceren.

Pseudovariabele `$this`
-----------------------

Binnen de klasse kan men naar de instantie (het object) verwijzen met de **pseudovariabele** `$this`, members en methodes worden via de operator `->`[^1] aangesproken.

{% highlight php %}
<!-- oop/oop.php -->
{% include_relative _code/php/oop/oop.php %}
{% endhighlight %}


{% comment %}
<!-- ⚓ Voetnoten -->
{% endcomment %}
[^1]: In andere programmeertalen is die operator meestal `.` (dot-operator), maar omdat PHP van oorsprong geen OOP-taal was en losse typering gebruikt waardoor + niet voor zowel optellen als concatenatie gebruikt kan worden, heeft men de dot-operator geleend van Perl – de scripttaal waarop PHP zich sterk geïnspireerd heeft. Als gevolg had men iets anders nodig en heeft men ook de overeenkomende operator van Perl gebruikt.

{% comment %}
<!-- ⚓ Afkortingen -->
{% endcomment %}
*[OOP]:                     Objectgeoriënteerd Programmeren