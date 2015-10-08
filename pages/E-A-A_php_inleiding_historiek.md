---
layout   : page
title    : Korte Historiek
permalink: php/inleiding/historiek/
published: true
tags     :
---

Ontstaan van het World Wide Web
-------------------------------

### Internet

Eind jaren 80 beginnen twee wetenschappers &mdash; de Brit [Tim Berners-Lee][berners-lee-twitter] bijgestaan door onder meer de Vlaamse ingenieur [Robert Cailliau][cailliau] &mdash; met de ontwikkeling van een systeem dat het potentieel van het Internet definitief zal ontsluiten. Op dat ogenblik bestond het Internet al ongeveer een paar decennia, zij het in een rudimentaire vorm. Beide wetenschappers zijn verbonden aan het CERN op de Frans-Zwitserse grens.

### World Wide Web

Dit pan-Europees instituut werkt aan verschillende onderzoeksprojecten in verband met deeltjesfysica, vaak met partners van over gans de wereld. Om de kennisuitwisseling tijdens de projecten, zowel intern als tussen projecten onderling, te bevorderen komt Berners-Lee met het concept van **hypertext** op de proppen. Uiteindelijk zal dit leiden tot het **World Wide Web** *(W3)* zoals we dat nu kennen. Berners-Lee ontwikkelt in 1991 ook de allereerste webbrowser: *WorldWideWeb,* die al snel een nieuwe naam Nexus[^1] krijgt om verwarring met W3 te vermijden.

### Mosaic

In 1993 stelt CERN het W3 open voor iedereen. In datzelfde jaar lanceert het Amerikaanse NCSA de webbrowser **Mosaic**. Doordat deze browser op verschillende besturingssystemen draait, wordt het de eerste populaire webbrowser. Hierdoor wordt het W3 ook in de praktijk voor het grote publiek toegankelijk. Mosaic heeft het uitzicht van de webbrowser sterk zeer bepaald.

De eerste websites
------------------

Met websites die bestaan uit HTML en een gebruiksvriendelijke browser die die HTML kan lezen duurt het niet lang vooraleer softwareontwikkelaars de volgende evolutionaire stap zetten: dynamische websites. In tegenstelling tot statische webpagina’s wordt de pagina gegenereerd door de webserver op het moment dat de gebruiker de pagina opvraagt. Dit laat toe dat een webpagina zich aanpast aan de gebruiker.

Onder die pionieers is er de (Groenlandse) Deen [Rasmus Lerdorf][lerdorf-twitter]. In 1994 begint hij met de ontwikkeling van een aantal tools om zijn eigen persoonlijke homepagina dynamisch te maken. Vandaar de oorspronkelijke betekenis van de afkorting PHP: *Personal Home Page.* Veel opties wat betreft programmeertalen heeft hij daarvoor nog niet: Java staat nog in de kinderschoenen en van ASP of ColdFusion is nog lang geen sprake. Zoals vele anderen, gebruikt hij de scripttaal Perl en de programmeertaal C, die via een CGI aangesproken worden. Tot op vandaag is de invloed van die beide talen nog duidelijk merkbaar, o.a. in de naamgeving van sommige functies. Deze ad hoc oorsprong van PHP heeft geleid tot een ietwat rommelige naamgeving en inconsistente volgorde van functieparameters.

Een scripttaal, zoals Perl, moet eerst geparset worden. Dat zorgde in die tijd nog voor te veel overhead op de server, zodat Lerdorf al snel volledig overschakelt naar de programmeertaal C die rechtstreeks naar machinetaal gecompileerd wordt. Door die overschakeling zit hij ook niet meer met het probleem van overlappende functionaliteit tussen zijn Perl- en zijn C-code.

### PHP/FI

In 1995 maakt Lerdorf zijn collectie C-functies openbaar onder de naam PHP/FI. Deze verzameling is eigenlijk de combinatie van delen van zijn **Personal Home Page Tools** en zijn nieuwe tool **Forms Interpreter**. Deze laatste ontstond uit diezelfde Personal Home Page Tools.

### PHP/FI version 2.0

Meer dan twee jaar later wordt een verbeterde versie van PHP/FI onder de naam PHP/FI version 2.0 uitgebracht. Informeel wordt de naam al snel vereenvoudigd tot **PHP 2.0**, want de grappig bedoelde verwijzing naar het internetprotocol TCP/IP had zijn houdbaarheidsdatum ruim overschreden.

Van hobbyproject naar professionele tool
----------------------------------------

### PHP 3.0

In 1997 stellen twee Israëlische gebruikers van PHP/FI, [Zeev Suraski][suraski-twitter] en [Andi Gutmans][gutmans-twitter], aan Lerdorf voor om de parser te herschrijven voor de volgende versie. Hij stemt hiermee in en samen met nog een paar andere softwareontwikkelaars die verbeteringen geschreven hadden brengen ze halfweg 1998 **PHP 3.0** uit. Met deze release wordt ook de naam veranderd in PHP: Hypertext Preprocessor[^2]. Dit was een belangrijke &mdash; zo niet de belangrijkste &mdash; mijlpaal in de geschiedenis van PHP, want als eenmansproject was het waarschijnlijk een stille dood gestorven.

Met versie 3 werden ook de eerste stappen richting OOP gezet. De release valt ook samen met de eerste dot-com bubble (toen heette dat nog naïef de ‘dot-com boom’) die de vraag naar scripttalen voor het web explosief doet groeien. PHP verstoot al snel Perl van de troon als meest populaire scripttaal voor het web.

Geïnspireerd door de vlotte samenwerking slaan Suraski en Gutmans de handen opnieuw in elkaar, dit keer richten ze de firma **Zend Technologies Ltd.**, of kortweg Zend[^3], met als strapline: ‘The PHP Company’.

### PHP 4.0

Met de release van een nog maar eens volledig herwerkte parser in 2000 &mdash; net na het barsten van de *dot-com bubble* &mdash; is de machtsgreep over het PHP-project door Suraski en Gutmans compleet. De parser zal voortaan Zend Engine heten (maar nog altijd open source blijven) waarvan versie 1.0 de kern vormt van **PHP 4.0**. Vanaf deze release gaat de groei van PHP steil omhoog. Met versie 4 is ook de interesse van de bedrijfswereld voor de taal gewekt en Zend biedt de eerste officiële certificatie voor PHP-ontwikkelaars aan.

### PHP 5.0

Vier jaar later, in 2004, wordt **PHP 5.0** uitgebracht. Deze versie is gebaseerd op de **Zend Engine 2.0**, een gevoelig snellere en meer stabiele versie van de voorgaande versie. Waar versie 4 nog beperkte ondersteuning voor OOP bood, biedt versie 5 volledige ondersteuning.

### PHP 5.1

In november 2005 wordt **PHP 5.1** uitgebracht. Pas vanaf dan schakelt men van versie 4 vlot over naar versie 5.

### PHP 5.2

In november 2006 wordt **PHP 5.2** uitgebracht.

### Ruby on Rails

Rond 2005-2006 ziet het er eventjes heel slecht uit voor PHP wanneer [Ruby on Rails][ror] (RoR) gereleaset wordt. Rails is een eenvoudig maar krachtig framework voor de volledig objectgeoriënteerde programmeertaal [Ruby][ruby] en maakt gebruik van het toen zeer gehypte Ajax via vergaande integratie met het JavaScript-framework [Prototype.js][prototype].

Heel wat PHP-developers lopen over, waardoor PHP zelfs tijdelijk een negatieve groei kent, maar Rails is niet het enige framework dat het MVC *architectural pattern* volgt, en onder die andere frameworks zijn er ook heel wat die op PHP gebaseerd zijn.

De noodzaak om een nieuwe en compleet andere programmeertaal te leren &mdash; waardoor het aantal beschikbare, ervaren developers ook gering is &mdash; en het beperkt aantal hostingproviders die Ruby ondersteunen, plus het feit dat het grote voordeel dat Rails levert ook bij talrijke PHP-frameworks gevonden kan worden doen veel developers (en met hen ook websites) terugkeren naar het vertrouwde PHP.

### Microsoft

Ook nog in 2006 kondigt Microsoft aan dat het PHP zal ondersteunen, en dit ondanks het feit dat Microsofts eigen ASP.NET een gelijkaardige, maar concurrerende technologie is.

PHP vandaag
-----------

### PHP 5.3

In juni 2009 komt een flink vernieuwde versie **PHP 5.3**. De overgang van 5.2 naar 5.3 is veel groter dan men zou kunnen vermoeden op basis van het versienummer. Doordat de ontwikkeling van **PHP 6.0** serieuze vertraging opliep besluit men een aantal belangrijke nieuwe features waaronder namespaces en bijkomende foutmeldingen door te schuiven naar PHP 5. Men hoopt ook dat de nieuwe onderversie sneller in productieomgevingen geaccepteerd zal worden dan een nieuwe hoofdversie. Het duurde een jaar vooraleer de overschakeling van versie 4 naar 5 op gang kwam).

### HHVM

In december 2011 brengt Facebook **[HHVM][hhvm]** uit als alternatief voor Zend Engine. HHVM is sneller is dan de **Zend Engine**, maar niet 100 % compatibel met gewone PHP. Heel wat belangrijke projecten die in PHP geschreven zijn, werden ondertussen wel compatibel gemaakt met HHVM.

### PHP 5.4

In maart 2012 komt PHP 5.4 uit. De opmerkelijkste veranderingen zijn de uitbreiding van de OOP mogelijkheden met traits, een kortere notatie van arrays en een ingebouwde server.

### PHP 5.5

In juni 2013 wordt **PHP 5.5** uitgebracht.

### Hack

In maart 2014 brengt Facebook met **[Hack][hack]** een eigen versie van de PHP-taal uit, die speciaal gemaakt is voor HHVM.  

### PHP 5.6

In augustus 2014 wordt **PHP 5.6** uitgebracht.

### PHP 7.0

In november 2015 komt na 11 jaar nog eens een grote release uit. De grootste veranderingen zijn de enorme snelheidswinst van de nieuwe **Zend Engine 3.0** en de extra mogelijkheid om *type declarations* toe te voegen aan functiereturns en functieparameters.

{% comment %}
<!-- ⚓ Voetnoten -->
{% endcomment %}
[^1]: 'Nexus' is een verwijzing naar het besturingssysteem NeXTSTEP waarop de browser draait. 
[^2]: Naar analogie met de recursief acroniem van het *Gnu’s Not Unix*-project
[^3]: 'Zend' is een samentrekking van de voornamen van de ontwikkelaars: **Ze**ev en A**nd**i.

{% comment %}
<!-- ⚓ Afkortingen -->
{% endcomment %}
*[Ajax]:                    Asynchronous JavaScript and XML
*[ASP]:                     Active Server Pages
*[CERN]:                    Organisation européenne pour la recherche nucléaire
*[CGI]:                     Common Gateway Interface
*[HHVM]:                    HipHop Virtual Machine
*[Ltd.]:                    Limited
*[MVC]:                     Model-View-Controller
*[NCSA]:                    National Center for Supercomputing Applications
*[OOP]:                     Objectgeoriënteerd Programmeren
*[PHP/FI]:                  Personal Home Page Tools / Forms Interpreter
*[TCP/IP]:                  Transmission Control Protocol / Internet Protocol
*[W3]:                      World Wide Web

{% comment %}
<!-- ⚓ Hyperlinks -->
{% endcomment %}
[berners-lee-twitter]:      https://twitter.com/timberners_lee
[cailliau]:                 http://www.robertcailliau.eu
[gutmans-twitter]:          https://twitter.com/andigutmans
[hack]:                     http://hacklang.org
[hhvm]:                     http://hhvm.com
[lerdorf-twitter]:          https://twitter.com/rasmus
[prototype]:                http://prototypejs.org
[ror]:                      http://rubyonrails.org
[ruby]:                     https://www.ruby-lang.org/en
[suraski-twitter]:          https://twitter.com/zeevs
[zend]:                     http://www.zend.com