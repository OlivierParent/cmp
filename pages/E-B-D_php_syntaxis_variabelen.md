---
layout   : page
title    : Variabelen
permalink: php/syntaxis/variabelen/
published: true
tags     :
---

De naam van een variabele begint met een **dollarteken** (`$`) en vervolgens een identifier. Deze laatste mag bestaan uit alfanumerieke tekens en onderstrepingstekens (`_`), maar mag nooit met een cijfer beginnen en is **hoofdlettergevoelig**.

Naamgeving
----------

Per conventie wordt aangeraden om:

 - **geen onderstrepingsteken** (`_`) te gebruiken,
 - maar lowerCamelCase[^1];
 - cijfers te vermijden.

{% highlight php %}
basis/variabele/variabele.php
{% include_relative _code/php/basis/variabele/variabele.php %}
{% endhighlight %}

Lege variabelen
---------------

Met de functie `empty()` kun je bepalen of een variabele leeg is of een waarde heeft die daarmee overeenkomt. Om te bepalen of een variabele een waarde toegewezen heeft gekregen gebruik je de functie `isset()`.

{% highlight php %}
basis/variabele/leeg.php
{% include_relative _code/php/basis/variabele/leeg.php %}
{% endhighlight %}


{% comment %}
<!-- ⚓ Voetnoten -->
{% endcomment %}
[^1]: Naam in kleine letters maar vanaf het tweede woord de eerste letter van de woorden in hoofdletter, bijv. ditIsEenZinDieGeschrevenIsInLowerCamelCase.