---
layout   : page
title    : Werkstuk
permalink: opdracht/werkstuk/
published: true
tags     :
---

Subsystemen
-----------

### Mobile Hybrid App

Met de app kunnen burgers zwerfvuil melden aan de milieuambtenaar van de gemeentelijke milieudienst.

### API

Via een API staat de app in verbinding met de back-end van het softwaresysteem.

### Backoffice

Via het webgebaseerde backoffice van het softwaresysteem kan de milieuambtenaar de zwerfvuilmeldingen zien en acties ondernemen.

Specificaties
-------------

### Technische Specificaties

> ##### **Opgelet** *:warning:*{:.pull-left .m-r}
> ---
>
> - Onderstaande technologieën **moeten** toegepast worden om te kunnen slagen voor dit opleidingsonderdeel.
> - Indien andere technologieën nodig zijn, dan mogen die gebruikt worden. Op voorwaarde dat de nieuwe technologie niet als vervanging voor een van de onderstaande technologieën gebruikt wordt.  
>   Bijvoorbeeld: jQuery mag niet gebruikt worden als hetzelfde met AngularJS bereikt kan worden. 
> - Uitzonderingen kunnen enkel met toestemming van de docent.
{:.alert .alert-warning}

#### Ontwikkelomgeving

 - [Oracle VM Virtualbox][virtualbox]
 - [Vagrant][vagrant]
 - [Artevelde Laravel Homestead][artestead]
   - [PHP][php]
   - [MySQL][mysql]
 - [Git][git]
 - [Firefox Developer Edition][firefox]

> ##### **Tip** *:bulb:*{:.pull-left .m-r}
> ---
> IDE's, editors en GUI-tools zijn vrij te kiezen. Enkele suggesties:
>
> - [Atom][atom]
> - [Brackets][brackets]
> - [MySQL Workbench][mysql-workbench]
> - [PhpStorm][phpstorm] (licentie is te vinden op [Chamilo][chamilo-docs])
> - [Sequel Pro][sequelpro]
> - [SourceTree][sourcetree]
> - [Visual Studio Code][vscode]
{:.alert .alert-info}

#### Automatisatie

 - [Composer][composer]
 - [Node.js][node]
   - [Bower][bower]
   - [gulp.js][gulp]

#### Server-side

 - [Symfony 2.7 LTS][sf]
   - [Console][sf-console]
   - [DoctrineFixturesBundle][sf-doctrine-fixtures]
   - [DoctrineMigrationsBundle][sf-doctrine-migrations]
   - [FOSRestBundle][sf-fos-rest]
   - [NelmioApiDocBundle][sf-nelmio-apidoc]
   - [NelmioCorsBundle][sf-nelmio-cors]
 - [Behat][behat] en [Gherkin][behat-gherkin] voor BDD.
 - [Carbon][carbon]
 - [Doctrine ORM][doctrine-orm]
 - [PHPUnit][phpunit]
 - [Twig][twig]
 
#### Client-side

 - [Bootstrap][bootstrap] met [Sass][sass]
 - [HTML5][html5]
 - [Ionic SDK][ionic-sdk]
   - [AngularJS][angular-js]
   - [Corodova][cordova]
   - [ngCordova][cordova-ng-cordova]
 - [Sass (SCSS)][sass]

{% comment %}
#### Documentatie

 - [GitHub Flavored Markdown][gfm]
 - [phpDocumentor][phpdocumentor] voor de PHP DocBlocks
{% endcomment %}

### Functionele Specificaties

> ##### **Opgelet** *:warning:*{:.pull-left .m-r}
> ---
> De onderstaande specificaties zijn de minimumspecificaties. Vul ze aan met zelfbedachte functionaliteiten. 
{:.alert .alert-warning}

#### App

 - Rollen
   - Bezoeker (niet-aangemelde gebruiker)
   - Burger (aangemelde gebruiker)
 - Account
   - Aanmaken op de back-end via de API
   - Gegevens wijzigen
   - Verwijderen
 - Zwerfvuil
   - Melding: foto, datum, beschrijving, geolocatie, type
   - Status van de melding tonen
     - Gemeld door burger
     - Melding verwerkt door milieuambtenaar,
     - Opgeruimd door milieudienst
     - Opruimen geverifieerd door gebruiker
 - Gamification
   - Stimuleer de gebruiker om meer meldingen te doen
   - Leaderboard
 - Datasynchronisatie via de RESTful API.

#### API

De API is een RESTful API waarlangs de Mobile Hybrid App communiceert met de back-end.

De functionaliteit is afhankelijk van de functionaliteit van de Mobile Hybrid App, maar moet minstens 1 voorbeeld van elk van de onderdelen van CRUD bevatten. 

#### Backoffice

 - Rollen
   - Bezoeker (niet-aangemelde gebruiker)
   - Milieuambtenaar (aangemelde gebruiker);
 - Dashboard
   - Kaart met zwerfvuilmeldingen
 - Zwerfvuilmeldingen
   - Status veranderen
 - Gebruikersbeheer
   - Verwijderen (soft delete) 
   - Bannen als Gebruikers bannen die verkeerde 

### Niet-functionele Specificaties

 - Pas de **Behaviour-Driven Development**-methodologie toe.
 - Documenteer alle PHP en JavaScript code met docblocks.
 - Grafisch verantwoord, esthetisch verzord en gebruiksvriendelijk.  
   Zoals van elk product van een student Grafische en digitale media verwacht mag worden!

{% comment %}
    ⚓ Afkortingen
{% endcomment %}

*[API]:                     Application Programming Interface
*[BDD]:                     Behaviour-Driven Development
*[CRUD]:                    Create, Read, Update, Delete
*[GUI]:                     Graphical User Interface
*[IDE]:                     Integrated Development Environment
*[LTS]:                     Long Term Support

{% comment %}
    ⚓ Hyperlinks
{% endcomment %}

[chamilo-docs]:             http://chamilo.arteveldehs.be/index.php?application=weblcms&course=7641&tool=document&go=course_viewer

{% comment %}
    ⚓ Hyperlinks: technologie en software
{% endcomment %}

[angular-js]:               https://angularjs.org
[angular-material]:         https://material.angularjs.org
[angular-ngdoc]:            https://github.com/angular/angular.js/wiki/Writing-AngularJS-Documentation
[artestead]:                https://github.com/OlivierParent/homestead
[behat]:                    http://docs.behat.org/en/v3.0/
[behat-gherkin]:            http://docs.behat.org/en/v3.0/guides/1.gherkin.html
[bootstrap]:                http://getbootstrap.com
[bower]:                    http://bower.io
[carbon]:                   http://carbon.nesbot.com
[chart]:                    http://www.chartjs.org
[composer]:                 https://getcomposer.org
[cordova]:                  http://cordova.apache.org
[cordova-ng-cordova]:       http://ngcordova.com
[doctrine-orm]:             http://www.doctrine-project.org/projects/orm.html
[faker]:                    https://github.com/fzaninotto/Faker
[git]:                      http://git-scm.com
[gfm]:                      https://help.github.com/articles/github-flavored-markdown
[gulp]:                     http://gulpjs.com
[geojson]:                  http://geojson.org
[google-maps]:              https://developers.google.com/maps
[html5]:                    http://www.w3.org/TR/html5
[html5-geolocation]:        https://developer.mozilla.org/en-US/docs/Web/API/Geolocation
[html5-localstorage]:       https://developer.mozilla.org/en-US/docs/Web/API/Window/localStorage
[ionic-sdk]:                http://ionicframework.com
[node]:                     http://nodejs.org
[mysql]:                    http://www.mysql.com/products/community
[mysql-manual]:             http://dev.mysql.com/doc/refman/5.6/en
[php]:                      http://php.net
[phpunit]:                  https://phpunit.de
[phpdocumentor]:            http://www.phpdoc.org
[psr]:                      http://www.php-fig.org
[psr2]:                     http://www.php-fig.org/psr/psr-2
[psr7]:                     http://www.php-fig.org/psr/psr-7
[sass]:                     http://sass-lang.com
[sqlite]:                   https://www.sqlite.org
[sf]:                       http://symfony.com
[sf-console]:               http://symfony.com/doc/current/components/console/introduction.html
[sf-doctrine-fixtures]:     https://github.com/doctrine/DoctrineFixturesBundle
[sf-doctrine-migrations]:   https://github.com/doctrine/DoctrineMigrationsBundle
[sf-fos-rest]:              https://github.com/FriendsOfSymfony/FOSRestBundle
[sf-nelmio-apidoc]:         https://github.com/nelmio/NelmioApiDocBundle
[sf-nelmio-cors]:           https://github.com/nelmio/NelmioCorsBundle
[twig]:                     http://twig.sensiolabs.org
[vagrant]:                  https://www.vagrantup.com

{% comment %}
    ⚓ Hyperlinks: desktop software
{% endcomment %}

[atom]:                     https://atom.io
[brackets]:                 http://brackets.io
[firefox]:                  https://www.mozilla.org/nl/firefox/developer
[mysql-workbench]:          http://dev.mysql.com/downloads/workbench
[phpstorm]:                 https://www.jetbrains.com/phpstorm
[sequelpro]:                http://www.sequelpro.com
[shotcut]:                  http://www.shotcut.org
[sourcetree]:               http://www.sourcetreeapp.com
[virtualbox]:               https://www.virtualbox.org
[vscode]:                   https://www.visualstudio.com/en-us/products/code-vs.aspx