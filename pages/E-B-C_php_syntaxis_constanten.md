---
layout   : page
title    : Constanten
permalink: php/syntaxis/constanten/
published: true
tags     :
---

De naam van een constante mag bestaan uit alfanumerieke tekens en liggende streepjes, maar mag nooit met een cijfer beginnen en is hoofdlettergevoelig.

Constanten kunnen enkel van het **scalaire** datatype zijn.

Per conventie wordt aangeraden om:

 - de naam met hoofdletters te schrijven;
 - liggende streepjes te gebruiken om woorden in de naam te scheiden en dit consequent toe te passen;
 - constanten als klasseconstante te definiëren (zie hoofdstuk Objectgeoriënteerd Programmeren).

{% highlight php %}
basis/constante.php
{% include_relative _code/php/basis/constante.php %}
{% endhighlight %}

Er zijn een aantal ingebouwde constanten zoals `PHP_EOL` *(End Of Line* teken: `\n`) en er zijn ook ‘Magische’ constanten die beginnen en eindigen met twee underscores, bijvoorbeeld `__FILE__`.

[Constants](http://www.php.net/manual/en/language.constants.php)
[Magic constants](http://www.php.net/manual/en/language.constants.predefined.php)