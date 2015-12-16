---
layout   : page
title    : Naamruimten
permalink: php/oop/naamruimten/
published: true
tags     :
---

Bij grote projecten kan het voorkomen dat de naam van een klasse of methode al in gebruik is, daarom is het handig om delen van het project in naamruimtes in te kapselen. Klasse- en methodenamen hoeven enkel binnen een naamruimte uniek te zijn.

Een naamruimte wordt gedefinieerd met het sleutelwoord `namespace`. Vanaf die definitie wordt de naamruimte actief voor de rest van het bestand. Een nieuwe naamruimtedefinitie zal de actieve naamruimte veranderen voor het vervolg van het bestand. Het is aangeraden niet meer dan één naamruimte per document te definiëren.

Bij het importeren van een bestand heeft de naamruimte enkel betrekking op de code in het bestand, niet op de code van het importerende bestand.

Om het werken met naamruimten eenvoudiger te maken, kunnen er aliassen gemaakt worden voor de naamruimten of voor de klassenaam via het sleutelwoord `use`. Standaard wordt de laatste deel van de volledig gespecificeerde naam als alias gebruikt, maar met het sleutelwoord `as` kan ook zelf de aliasnaam gespecificeerd worden. Meerdere aliassen kunnen tegelijk gedefinieerd worden, telkens gescheiden door een komma.

{% highlight php %}
oop/naamruimten.php
{% include_relative _code/php/oop/naamruimten.php %}
{% endhighlight %}
