---
layout   : page
title    : Datatypes
permalink: php/syntaxis/datatypes/
published: true
tags     :
---

en programmeertaal dient in essentie om gegevens te manipuleren. In PHP bestaan gegevens uit slechts 8 datatypes. Het datatype van een gegeven bepaalt welke manipulaties er op uitgevoerd kunnen worden. De 8 datatypes zijn onder te verdelen in 3 soorten:

 - Scalaire datatypes: [Boolean](#boolean), [Integer][], [Float][] en [String][];
 - Samengestelde datatypes: [Array][] en [Object][];
 - Bijzondere datatypes: [Resource] en [`null`]. - 
 
Scalaire datatypes
------------------

Deze types kunnen slechts één waarde bevatten en kunnen als de elementaire datatypes beschouwd worden. 
 
### Boolean

De booleaanse waarde is ofwel waar of onwaar. Om die status aan te geven worden de sleutelwoorden `true` en `false` gebruikt.

basis/datatype/scalair/boolean.php

### Integer

Een geheel getal in PHP kan ofwel decimaal (10-delig), octaal (8-delig) of hexadecimaal (16-delig) zijn.

basis/datatype/scalair/integer.php

### Float

Een floating point of een drijvendekommagetal[^1] kan met een exponentiële notatie geschreven met een hoofdletterongevoelige `E`.

basis/datatype/scalair/float.php

### String

In PHP kan je een tekenstring met zowel een **apostrof** (`'`) als een **aanhalingsteken** (`"`) definiëren. Met een apostroffen maak je een tekenconstante (Eng: *string literal*), terwijl aanhalingstekens ook **variabeleninterpolatie** (**variabelensubstitutie**) ondersteunen.

basis/datatype/scalair/tekenstring.php

Omdat er in een tekenconstante nooit naar variabelen gezocht wordt, is dat net ietsje sneller en geniet het in de meeste gevallen dan ook de voorkeur[^2].

Het is niet altijd nodig om de te vervangen variabele tussen accolades (`{` en `}`) te schrijven, maar maak hier een gewoonte van. Het bevordert ook de leesbaarheid van je code.

#### Escape Characters

Nog een belangrijk verschil tussen **apostroffen** (`'`) en **aanhalingstekens** (`"`) is dat aanhalingstekens met meer escape characters overweg kunnen. Indien ze niet ondersteund worden, dan wordt de **backslash** (`\`) ook getoond.

| Escape Character | Betekenis	     | Ondersteund tussen `'` |	Ondersteund tussen `"` |
|:----------------:|:----------------|:----------------------:|:----------------------:|
| `\n`             | New line        |                        | •                      |
| `\r`             | Carriage return |                        | •                      |
| `\t`             | Horizontal tab  |                        | •                      |
| `\v`             | Vertical tab    |                        | •                      |
| `\f`             | Form feed       |                        | •                      |
| `\\`             | backslash       | •                      | •                      |
| `\$`             | Dollar sign     |                        | •                      |
| `\"`             | Double quote    |                        | •                      |
| `\'`             | Single quote    | •                      | •                      |
{:.table}

Samengestelde datatypes
-----------------------

### Array

In PHP is een array een geordende reeks van **sleutel-waardeparen** *(Eng: key-value pairs).* Een sleutel-waardepaar vormt een **element** van de array. De waarden kunnen bestaan uit om het even welk datatype.

Een lege array maak je door `[]` toe te wijzen aan een variabele.

#### Enumeratieve array

Bij een **enumeratieve array** worden de sleutels automatisch aangemaakt. De eerste sleutel wordt dan `0`, de volgende sleutel `1` enz.

basis/datatype/samengesteld/array/enumeratief.php

#### Associatieve array

Bij een **associatieve** array ken je zelf een sleutel toe. Sleutels in arrays zijn hoofdlettergevoelig, maar typeongevoelig. Bij het definiëren of opvragen van een sleutel wordt, indien mogelijk, ook een typeconversie naar integer gedaan. Indien dat niet lukt, wordt de sleutel een string.

basis/datatype/samengesteld/array/associatief.php

#### Combinatie van beide soorten arrays

Enumeratief en associatief kunnen ook samen gebruikt worden.

basis/datatype/samengesteld/array/combinatie.php

#### Multidimensionele array

De waarden in een array kunnen zelf ook een array zijn. In dat geval spreekt men over mutidimensionale arrays.

basis/datatype/samengesteld/array/multidimensioneel.php

#### Oude syntaxis

Sinds PHP 5.4 wordt een verkorte syntaxis voor arrays gebruikt. De oude syntaxis wordt nog vaak gebruikt om de code compatibel te houden met oudere versies van PHP. Ondertussen is PHP 5.3 end of life verklaard en zal in de nabije toekomst volledig verdwijnen.

### Object

Een object is een instantie van een klasse. Zie hoofdstuk [Objectgeoriënteerd Programmeren (OOP)].

Bijzondere datatypes
--------------------

### Resource

Een resource is een variabele met een referentie naar een externe gegevensbron . Voorbeelden van gegevensbrontypen zijn: bestand-stream, FTP-stream, PDF-bestand, MySQL-resultaat, XML-parser, enz. Met de functie `is_resource()` kan bepaald worden of een variabele een resource is en met de functie `get_resource_type()` welk datatype het exact is.

### `null`

Dit bijzondere type is het datatype van de waarde null. Een variabele met deze waarde is in feite een variabele waaraan nog geen waarde toegewezen is.


Typebepaling
------------

Het type van een variabele kan met behulp van functies getest worden, deze functies geven een booleaanse waarde terug. Er is ook een generieke functie `gettype()` die een string met het type teruggeeft. Maar opgelet: de waarden van die string kan in de toekomstige versies van PHP veranderen.

| Functie         | Test                                                             |
|:----------------|:-----------------------------------------------------------------|
| `is_bool()`     | Booleaanse waarde                                                |
| `is_int()`      | Integer                                                          |
| `is_float()`    | Float                                                            |
| `is_string()`   | String                                                           |
| `is_scalar()`   | Scalaire variabele (booleaanse waarde, integer, float of string) |
| `is_array()`    | Array                                                            |
| `is_object()`   | Object                                                           |
| `is_resource()` | Resource                                                         |
| `is_null()`     | `null`                                                           |
{:.table}

basis/datatype/typebepaling.php

Typeconversie *(Casting)*
-------------------------

### Impliciete typeconversie *(Implicit Cast)*

PHP is een taal met zwakke typering, het is zelfs niet mogelijk om een variabele te declareren als zijnde van een bepaald type. Welk type een bepaalde waarde heeft hangt af van de waarde en de context waarin deze waarde gebruikt wordt. Zo zal een string bij een optelling automatisch naar een integer of float geconverteerd worden.

basis/datatype/typeconversie/impliciet.php

### Expliciete typeconversie *(Explicit Cast)*

Soms is het nodig om variabelen van een specifiek datatype te hebben, daarom bestaan de castoperatoren waarmee expliciet naar een bepaald datatype geconverteerd kan worden.

| Castoperator | Conversie naar    |
|:-------------|:------------------|
| `(boolean)`  | Booleaanse waarde |
| `(int)`      | Integer           |
| `(float)`    | Float             |
| `(string)`   | String            |
| `(array)`    | Array             |
| `(object)`   | Object            |
| `(unset)`    | `null`            |
{:.table}

Opmerking: De `(unset)` operator heeft niet hetzelfde effect als de functie `unset()`. Bij de eerste blijft de variabele bestaan, maar is er geen waarde aan toegekend, terwijl bij de laatste de variabele ongedefinieerd is.

{% comment %}
<!-- ⚓ Voetnoten -->
{% endcomment %}
[^1]: Het decimaal teken in PHP is een punt (`.`).
[^2]: **Opmerking:** je code optimaliseren door achteraf op zoek te gaan naar aanhalingstekens die door apostroffen vervangen kunnen worden heeft weinig zin, omdat dergelijke micro-optimalisaties een verwaarloosbare snelheidswinst opleveren. Het heeft eerder te maken met beroepseer.

{% comment %}
<!-- ⚓ Hyperlinks -->
{% endcomment %}
[javadoc]:                http://courses.olivierparent.be/php/syntaxis/datatypes/#boolean
[perl]:                    http://www.perl.org
[phpdoc]:                  http://www.phpdoc.org
[phpdoc-tags]:             http://www.phpdoc.org/docs/latest/index.html
[zend-framwork]:           http://framework.zend.com
