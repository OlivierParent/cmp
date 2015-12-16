---
layout   : page
title    : Beveliging
permalink: php/web/beveiliging/
published: true
tags     :
---

Wachtwoorden
------------

Wachtwoorden mogen **nooit als gewone tekst** opgeslagen worden. Er mag enkel een 'vingerafdruk' van de wachtwoorden bewaard worden, een zogenaamde hashcode. Je kan van een hashcode nooit de oorspronkelijke tekenstring achterhalen. Wat wel kan, is vooraf een lijst van hashcodes berekenen van allerlei tekencombinaties en dan hashcodes vergelijken om zo de oorspronkelijke tekenstring te achterhalen. Hoe langer een wachtwoord, hoe veiliger dus. Dergelijke lijsten noemt men **Rainbow Tables**. Hoewel het lang duurt om deze te berekenen, ligt het dankzij de toegenomen computerkracht (cloud computing, APU’s enz.) binnen het bereik van de hacker.

Om dit tegen te gaan, kan je een veiliger hashalgoritme gebruiken, dat langer duurt om te berekenen waardoor de hacker onpraktisch veel tijd/middelen nodig zal hebben om een Rainbow Table te berekenen.

Een efficientere methode is een salt te gebruiken. Dit is een unieke code die je gebruikt om een tekenstring te hashen. Hierdoor moet de hacker naast de hashcode ook de salt kunnen bemachtigen, en per mogelijke salt een Rainbow Table berekenen. Nog beter is voor elke hash berekening een uniek salt genereren. Dan heb je een Rainbow Table nodig per gehashte tekenstring.

Om een systeem veilig te houden is het nodig om af en toe de manier van hashen — het hashalgoritme — te verbeteren. Vandaar dat men het gebruikte hashalgoritme en salt samen met het wachtwoord opslaat. Zo kunnen verschillende algorimtes naast elkaar gebruikt worden, en kan een gebruiker die nog een minder veilige hashcode heeft, bij het inloggen automatisch een nieuwe, veiligere hashcode krijgen.

{% highlight php %}
web/beveiliging/wachtwoord_hashen.php
{% include_relative _code/php/web/beveiliging/wachtwoord_hashen.php %}
{% endhighlight %}

{% highlight php %}
web/beveiliging/wachtwoord_verifieren.php
{% include_relative _code/php/web/beveiliging/wachtwoord_verifieren.php %}
{% endhighlight %}


{% comment %}
<!-- ⚓ Afkortingen -->
{% endcomment %}
*[APU]:                     Accelerated Processing Unit
