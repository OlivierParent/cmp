---
layout   : page
title    : Basis
permalink: php/syntaxis/basis/
published: true
tags     :
---

Codeafbakening
--------------
PHP wordt vaak in combinatie met HTML gebruikt. Om de PHP-parser het onderscheid tussen HTML- en PHP-code duidelijk te maken, wordt de code afgebakend met speciale tags. Alles wat buiten deze tags staat wordt door de parser genegeerd.

{% gist 71c2a32bcd663184ce77 basis_codeafbakening.php %}

Voor bestanden die enkel PHP bevatten (dus geen HTML of dergelijke) wordt aangeraden om geen eindtag te gebruiken (`?>`). PHP vereist dit niet, en het heeft als bijkomend voordeel dat er geen onnodige witruimte aan het serverantwoord toegevoegd wordt. Het is wel aangeraden om als laatste lijn een lege regel te hebben.

basis/codeafbakening/php.php

Er bestaan nog andere tags, waaronder de populaire **snelschriftversie** en ASP-stijl. Het gebruik ervan wordt echter afgeraden, omdat de ondersteuning ervoor afhankelijk is van de serverinstellingen en er dus voor kan zorgen dat je scripts niet op om het even welke server zullen werken.

<mark>De snelschriftversie wordt sinds **PHP versie 5.4** standaard ondersteund, zodat het niet langer afhankelijk is van de serverinstellingen.</mark>

basis/codeafbakening/snelschrift.php

Opdrachtbeëindiging
-------------------

Net zoals in andere op C-gebaseerde programmeertalen[^1], wordt elke opdracht (**statement**) beëindigd met een **puntkomma** (`;`). Je kan een opdracht dus over verschillende regels te spreiden.

basis/opdrachtbeëindiging.php

Commentaar
----------

PHP ondersteunt twee manieren van commentaar schrijven: de C-stijl en de Unix-shell-stijl. Deze laatste stijl is een overblijfsel uit de periode dat een deel van PHP bestond uit [Perl][perl]-scripts. De voorkeur gaat dus uit naar de C-stijl. De Unix-shell-stijl kan handig zijn om een lijn code tijdelijk in commentaar te zetten, zodat het onderscheid tussen permanente commentaar en tijdelijke commentaar duidelijk is.

basis/commentaar/commentaar.php

### Documentatietools

Bij grote projecten gebruikt men vaak een speciale tool om te helpen bij het opstellen van de documentatie voor het project. Zo gebruikt het [Zend Framework][zend-framework]-project [phpDocumentor][phpdoc]. Deze tool is sterk geïnspireerd door [Javadoc][javadoc] van Oracle en probeert dan ook die conventies voor het schrijven van commentaarblokken te volgen.

Enkele fequent gebruikte [tags][phpdoc-tags] voor PHPDocumentor 2:

 - `@autor`
 - `@copyright`
 - `@license`
 - `@package`
 - `@param`
 - `@return`
 - `@static`
 - `@throws`
 - `@todo`
 - `@var`
 - `@version`
 - …
 
Een voorbeeld van een fancy PhpDoc-blok

basis/commentaar/phpdoc.php

Code importeren
---------------

Om code te importeren kun je kiezen uit `include` en `require`. Het verschil zit hem in de ernst van de fout die je krijgt als het bestand niet gevonden kan worden.

| Import     | Foutmelding                             |
|------------|-----------------------------------------|
| `include`  | Waarschuwing, maar script loopt verder. |
| `require`  | Fatale foutmelding. Het script stopt.   |
{:.table}

Bij een modulair opgebouwde toepassing kan het zijn dat er meerdere keren dezelfde code geïmporteerd wordt, ook al mag die code maar één keer voorkomen (zoals bijvoorbeeld een klassedeclaratie). Hiervoor bestaan `include_once` en `require_once`.

basis/importeren/inhoud.php

basis/importeren/include.phpPHP

De geïmporteerde code erft het **variabelenbereik** van de lijn code waarop het aangeroepen wordt.


{% comment %}
<!-- ⚓ Voetnoten -->
{% endcomment %}
[^1]: C, C++, C# …

{% comment %}
<!-- ⚓ Hyperlinks -->
{% endcomment %}
[javadoc]:                 http://www.oracle.com/technetwork/java/javase/documentation/index-jsp-135444.html
[perl]:                    http://www.perl.org
[phpdoc]:                  http://www.phpdoc.org
[phpdoc-tags]:             http://www.phpdoc.org/docs/latest/index.html
[zend-framwork]:           http://framework.zend.com
