---
layout    : page
title     : Overerving
title_long: Overerving en Scope
permalink : php/oop/overerving-en-scope/
published : true
tags      :
---

Overerving en bereik
--------------------

De scope — of het bereik — van members en methoden wordt gedeclareerd met 3 sleutelwoorden: `public`[^1], `protected` en `private`.

| Sleutelwoord | Bereik                                                       |
|:------------:|:-------------------------------------------------------------|
| `public`     | Overal.                                                      |
| `protected`  | In definiërende klasse en ook alle child- en parent-klassen. |
| `private`    | Enkel in de definiërende klasse.                             |
{:.table}

Voor members moet het bereik altijd gedeclareerd zijn. Bij een methode is het aangeraden maar niet verplicht, als er geen bereik gedeclareerd is de methode sowieso `public`.

Scope resolution operator
-------------------------

Als een member of methode buiten de huidige scope aangeroepn wordt, dan moet de **scope resolution operator** (`::`)[^2] gebruikt worden.

### Instantiemethoden

Om een instantiemethode (een niet-statische methode) uit een andere klasse aan te roepen gebruikt men de **naam van de klasse** of één van de sleutelwoorden die een klasse voorstellen.

| Sleutelwoord | Overervingscontext                           |
|:------------:|:---------------------------------------------|
| `self`       | De klasse waarin de methode gedefinieerd is. |
| `parent`     | De parent-klasse van de instantie.           |
| `static`     | De klasse van de instantie.                  |
{:.table}

{% highlight php %}
oop/overerving_scope.php
{% include_relative _code/php/oop/overerving_scope.php %}
{% endhighlight %}
 
### Constanten, statische member-variabelen en statische methoden

Zie hoofdstuk over Statische Members en Methoden.

{% comment %}
<!-- ⚓ Voetnoten -->
{% endcomment %}
[^1]: Omdat member-variabelen niet zonder bereik gedeclareerd kunnen worden, bestond er in PHP 4 het sleutelwoord var, maar dit is in PHP 5 vervangen door `public`. (`public var $mijnMember;` is twee keer hetzelfde, en bijgevolg te vermijden.)
[^2]: De scope resolution operator heet in PHP-speak *Paamayim Nekudotayim,* wat Hebreeuws is voor **dubbele dubbelepunt**.