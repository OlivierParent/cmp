---
layout   : page
title    : Filosofie
permalink: php/inleiding/filosofie/
published: true
tags     :
---

Webgeoriënteerd
---------------
PHP is ontstaan door en voor het web en is daardoor nauw verweven met HTML. Het biedt eenvoudige oplossingen voor webspecifieke problemen. Typische webfunctionaliteit is al in de taal ingebouwd, zodat de softwareontwikkelaar zich daar niet mee moet bezighouden.

Function-over-form
------------------
Bij de ontwikkeling van de taal is uitgegaan van het principe function-over-form, m.a.w. er zijn weinig eisen wat betreft de structuur van de code. Het laat de softwareontwikkelaar toe om zelf de code te structureren zoals het hem/haar het beste uitkomt. Uiteraard brengt dit een grote verantwoordelijkheid met zich mee.

Programmeerparadigma’s
----------------------
Een opmaaktaal zoals HTML volgt het paradigma[^1] van **declaratief programmeren**. De taal geeft betekenis en beschrijft enkel maar wat er moet gebeuren &mdash; bijv. maak de tekst op als paragraaf &mdash;, maar niet hoe dat uiteindelijk moet gebeuren.

### Imperatief programmeren

In tegenstelling tot HTML volgt PHP het paradigma van imperatief programmeren. Stap voor stap wordt bepaald hoe van de ene toestand naar de andere overgegaan moet worden.

Daarnaast ondersteunt PHP ook nog een paar specifieke, afgeleide paradigma’s. Naast zuiver imperatief programmeren kun je ook procedureel programmeren en objectgeoriënteerd programmeren. Omdat alle paradigma’s naast en door elkaar gebruikt kunnen worden is het een multiparadigmaprogrammeertaal.

### Procedureel Programmeren

Procedureel programmeren zorgt voor compactere code doordat stukken code in een procedure (functie of ook wel subroutine genoemd) opgeslagen kunnen worden en daarna één of meerdere malen opgeroepen kunnen worden. Dit bevordert de leesbaarheid en onderhoudbaarheid van de code, wat uiteindelijk ook de kwaliteit ten goede komt.

### Objectgeoriënteerd Programmeren (OOP)

OOP gaat daarin nog een stap verder door een programma op te bouwen uit objecten. Die objecten kunnen met elkaar communiceren door middel van vooraf vastgelegde attributen en methoden. Voor de objecten is het enkel van belang dat de attributen en methoden altijd op dezelfde manier aangesproken kunnen worden (inkapseling), de interne werking van het object kan probleemloos gewijzigd worden zonder dat de volledige toepassing daardoor aangepast moet worden. OOP zorgt voor een nog betere kwaliteit, maar ook voor een zekere overhead. Dit heeft een langere ontwikkeltijd en meer lijnen code tot gevolg. In concrete situaties is dit niet altijd wenselijk, maar gelukkig is er voldoende flexibiliteit in de taal aanwezig.

{% comment %}
<!-- ⚓ Voetnoten -->
{% endcomment %}
[^1]: **Programmeerparadigma:** een stijl van programmeren met specifieke concepten (bijvoorbeeld: variabelen, functies, klassen, objecten, methoden, enz.) en daaraan gekoppeld een bepaald denkpatroon.

{% comment %}
<!-- ⚓ Afkortingen -->
{% endcomment %}
*[HTML]:                    Hypertext Markup Language
*[OOP]:                     Objectgeoriënteerd Programmeren