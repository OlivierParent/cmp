---
layout    : page
title     : Statisch
title_long: Statische Members en Methoden
permalink : php/oop/statische-members-en-methoden/
published : true
tags      :
---

Het sleutelwoord `static` wordt gebruikt om member-variabelen en methoden rechtstreeks op klasseniveau te definiëren, en bijgevolg bestaan ze niet op instantieniveau.

> ##### **Opgelet** :warning:
> ---
> Member-constanten zijn altijd **klasseconstanten** en dus per definitie statisch — en publiek — zodat dit sleutelwoord niet voor constanten gebruikt mag worden.
{:.alert .alert-warning}

| Sleutelwoord | Overervingscontext                                          |
|:------------:|:------------------------------------------------------------|
| `self`       | De klasse waarin de member of methode gedefinieerd is.      |
| `parent`     | De parent-klasse van de klasse op het moment van uitvoeren. |
| `static`     | De klasse op het moment van uitvoeren.                      |
{:.table}

Tenslotte is er ook nog een magische constante `__CLASS__` die hetzelfde resultaat geeft als `self`.

{% highlight php %}
oop/statisch.php
{% include_relative _code/php/oop/statisch.php %}
{% endhighlight %}