---
layout   : page
title    : Lazy Loading
permalink: php/oop/lazy-loading/
published: true
tags     :
---

Omdat PHP de ontwikkelaar volledig de keuze laat hoe de bestandsstructuur van de toepassing eruit ziet is het onmogelijk om een universele manier te voorzien om klassen automatisch in te laden. Maar er is de mogelijkheid om dit zelf te programmeren.

De **globale functie** `__autoload()` wordt aangeroepen telkens een niet gedeclareerde klasse gebruikt wordt. Deze globale functie kan dus gebruikt worden om het bestand waarin de klasse gedeclareerd wordt automatisch in te laden. Dit is eigenlijk een **design pattern** (ontwerppatroon) dat **lazy loading** heet: de klasse wordt pas gedeclareerd (het bestand met de klassedefinitie laden) op het moment dat de klasse gebruikt wordt — bijvoorbeeld bij het instantiëren van de klasse om een object te maken.

{% highlight php %}
<!-- oop/DemoKlasse.php -->
{% include_relative _code/php/oop/DemoKlasse.php %}
{% endhighlight %}

{% highlight php %}
<!-- oop/autoload.php -->
{% include_relative _code/php/oop/autoload.php %}
{% endhighlight %}