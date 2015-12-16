---
layout   : page
title    : Controlestructuren
permalink: php/syntaxis/controlestructuren/
published: true
tags     :
---

Controlestructuren worden gebruikt om code uit te voeren als aan een bepaalde **conditie** voldaan wordt. Een conditie is een expressie die geëvalueerd wordt naar een eindresultaat dat WAAR (`true`) of ONWAAR (`false`) is. Als het eindresultaat geen booleaanse waarde is, dan wordt het automatisch naar een booleaanse waarde geconverteerd.

Conditionele statements
-----------------------

### `if` … [`elseif` …] [`else` …]

Het `if`-statement kan optioneel uitgebreid worden één of meerdere elseif-statements waarvan de condities enkel geëvalueerd worden als de conditie van het voorgaande statement ONWAAR is. Tenslotte kunnen de `if`- en `elseif`-statements uitgebreid worden met één `else`-statement dat uitgevoerd wordt als alle voorgaande `if`- en `elseif`-statements als ONWAAR geëvalueerd werden.

Structureer de statements en expressies zodanig dat de code makkelijk te interpreteren is. Dat bevordert de onderhoudbaarheid van de code, tenzij de expressies impact hebben op de performantie. In dat geval is het best om de meest waarschijnlijke expressie eerst uit te voeren, zodat zo weinig mogelijk expressies geëvalueerd moeten worden vooraleer de conditie gevonden is.

#### Normale syntaxis

{% highlight php %}
basis/controlestructuren/conditioneel/if_else.php
{% include_relative _code/php/basis/controlestructuren/conditioneel/if_else.php %}
{% endhighlight %}

#### Alternatieve syntaxis[^alt]

{% highlight php %}
basis/controlestructuren/conditioneel/if_else_alternatief.php
{% include_relative _code/php/basis/controlestructuren/conditioneel/if_else_alternatief.php %}
{% endhighlight %}

### `switch` … `case` …

Dit statement komt overeen met een **losse vergelijking**[^1]. Een `default` op het einde is niet altijd nodig, maar het is toch aangeraden om dit altijd toe te voegen om zo de onderhoudbaarheid en fouttolerantie van de code te bevorderen. Als een overeenkomst gevonden wordt, dan wordt alle volgende code tot aan de eerstvolgende `break` uitgevoerd.

#### Normale syntaxis

{% highlight php %}
basis/controlestructuren/conditioneel/switch_case.php
{% include_relative _code/php/basis/controlestructuren/conditioneel/switch_case.php %}
{% endhighlight %}

#### Alternatieve syntaxis[^alt]

{% highlight php %}
basis/controlestructuren/conditioneel/switch_case_alternatief.php
{% include_relative _code/php/basis/controlestructuren/conditioneel/switch_case_alternatief.php %}
{% endhighlight %}

Lussen
------

### `while` …

Voert een lus uit zolang aan een bepaalde conditie voldaan wordt.

#### Normale syntaxis

{% highlight php %}
basis/controlestructuren/lus/while.php
{% include_relative _code/php/basis/controlestructuren/lus/while.php %}
{% endhighlight %}

#### Alternatieve syntaxis[^alt]

{% highlight php %}
basis/controlestructuren/lus/while_alternatief.php
{% include_relative _code/php/basis/controlestructuren/lus/while_alternatief.php %}
{% endhighlight %}

### `for` …

Dit is eigenlijk een compactere versie van een speciale `while`-lus.

> ##### **Tip** *:bulb:*{:.pull-left .m-r}
> ---
> Gebruik bij voorkeur de **pre-incrementoperator** (`++$i`) want deze is (in PHP) sneller dan de post-incrementoperator (`$i++`).
{:.alert .alert-info}

#### Normale syntaxis

{% highlight php %}
basis/controlestructuren/lus/for.php
{% include_relative _code/php/basis/controlestructuren/lus/for.php %}
{% endhighlight %}

#### Alternatieve syntaxis[^alt]

{% highlight php %}
basis/controlestructuren/lus/for_alternatief.php
{% include_relative _code/php/basis/controlestructuren/lus/for_alternatief.php %}
{% endhighlight %}

### `foreach` … `as` [`$sleutel =>`] `$waarde` …

Deze `for`-lus is speciaal gemaakt om over arrays en objecten (enkel member-variabelen van het object die publiek toegankelijk zijn) te itereren. De `foreach`-lus bestaat in twee varianten.

In volgend voorbeeld gebruiken we zowel een array als een object op basis van onderstaande klasse.

{% highlight php %}
basis/controlestructuren/lus/MijnObject.php
{% include_relative _code/php/basis/controlestructuren/lus/MijnObject.php %}
{% endhighlight %}

#### Normale syntaxis

{% highlight php %}
basis/controlestructuren/lus/foreach.php
{% include_relative _code/php/basis/controlestructuren/lus/foreach.php %}
{% endhighlight %}

#### Alternatieve syntaxis[^alt]

{% highlight php %}
basis/controlestructuren/lus/foreach_alternatief.php
{% include_relative _code/php/basis/controlestructuren/lus/foreach_alternatief.php %}
{% endhighlight %}

### `do` … `while` …

Deze lus is vergelijkbaar met de `while`-lus, alleen wordt de expressie pas op het einde geëvalueerd. De lus wordt dus altijd minstens één keer uitgevoerd, ook als de conditie ONWAAR is.

{% highlight php %}
basis/controlestructuren/lus/do_while.php
{% include_relative _code/php/basis/controlestructuren/lus/do_while.php %}
{% endhighlight %}

{% comment %}
<!-- ⚓ Voetnoten -->
{% endcomment %}
[^alt]: Gebruik deze syntaxis als PHP en HTML door elkaar gebruikt worden, omdat het einde van het conditioneel statement of lus makkelijker te herkennen is.
[^1]: Vergelijkingen zijn er in de **losse** (`==`) en **strikte** (`===`) variant. Bij de strikte vergelijking wordt ook het gegevenstype gecontroleerd.