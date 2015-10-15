---
layout   : page
title    : Functies
permalink: php/syntaxis/functies/
published: true
tags     :
---

Naast de talrijke ingebouwde functies van PHP, kunnen er ook eigen functies gedefinieerd worden. Voor functienamen gelden dezelfde conventies als voor variabele-identifiers. In de code mogen functies vroeger in de code aangeroepen worden dan dat ze gedefinieerd zijn.

{% highlight php %}
<!-- basis/functie/functie.php -->
{% include_relative _code/php/basis/functie/functie.php %}
{% endhighlight %}

Variabelenbereik *(Scope)*
-------------------------

Variabelen die in een functie gedeclareerd worden, bestaan enkel binnen de functie.

Binnen een functie kunnen variabelen die in de globale scope gedefinieerd zijn niet gezien worden, tenzij ze met het sleutelwoord `global` binnen de functie gedeclareerd worden.

{% highlight php %}
<!-- basis/functie/variabelenbereik.php -->
{% include_relative _code/php/basis/functie/variabelenbereik.php %}
{% endhighlight %}
 
Functies binnen functies
------------------------

Ook binnen een functie kunnen er nieuwe functies gedefinieerd worden. De childfuncties zullen gedefinieerd worden van zodra de parentfunctie uitgevoerd wordt. De parentfunctie kan daardoor maar één keer uitgevoerd worden omdat functies slechts 1 keer gedefinieerd mogen worden.

{% highlight php %}
<!-- basis/functie/functie_binnen_functie.php -->
{% include_relative _code/php/basis/functie/functie_binnen_functie.php %}
{% endhighlight %}

Anonieme functies
-----------------

Dit zijn naamloze functies die aan een variabele toegewezen kunnen worden, of als callbackfunctie gebruikt kunnen worden door ze als argument mee te geven met een andere functie.

{% highlight php %}
<!-- basis/functie/anoniem.php -->
{% include_relative _code/php/basis/functie/anoniem.php %}
{% endhighlight %}
