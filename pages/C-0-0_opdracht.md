---
layout   : page
title    : Opdracht
permalink: opdracht/
published: false
tags     :
---

Probleemstelling
----------------

Hoe kan een softwaresysteem het ecologisch, economisch en sociaal probleem van zwerfvuil en sluikstorten helpen oplossen?

Werkstuk
--------

Ontwerp en ontwikkel **individueel** een databasegebaseerd softwaresysteem gemaakt met de technologieën die tijdens de colleges aan bod komen, en bestaat uit:

 1. *Mobile Hybrid App* 
 2. *Application Programming Interface*
 3. *Backoffice*

Deliverables
------------

### Repository

Het werkstuk wordt op een Bitbucket-repository gepubliceerd dat toegankelijk is voor:

 - [Olivier Parent][docent-opr-bitbucket]
 - [Philippe De Pauw - Waterschoot][docent-pdp-bitbucket]

### Mappen en bestanden

Bitbucket-repository:

```
nmdad3.arteveldehogeschool.local/
├── app/
├── docs/
|   ├── academische_poster.pdf
|   ├── checklist.md
|   ├── presentatie.pdf
|   ├── productiedossier.pdf
|   └── timesheet.xlsx
├── www/
└── README.md
```

 - De map `app/` is voor de *Mobile Hybrid App;*
 - De map `www/` is voor de website (Backoffice en API).
 - Het bestand `README.md` bevat:
   - Informatie:
     - Voornaam en familienaam
     - Opleidingsonderdeel: New Media Design & Development III
     - Academiejaar
     - Opleiding: Bachelor in de grafische en digitale media
     - Afstudeerrichting: Multimediaproductie
     - Keuzeoptie: proDEV
     - Opleidingsinstelling: Arteveldehogeschool
   - Alle nodige gegevens om het werkstuk te deployen.

Werkwijze
---------

### Projectmethodologie

Werk op een *Agile* manier. In deze context wil dit zeggen dat je de deelfunctionaliteiten prioritiseert en een voor een uitwerkt tot op een niveau dat het productieklaar is. De belangrijkste deelfunctionaliteiten worden eerst uitgewerkt.

Je doorloopt de volledige workflow per feature op een correcte en volledig manier:

> # **4D:** Define → Design → Develop → Deploy.
{:.card .card-block}

De opgeleverde functionaliteiten moeten productiewaardig zijn (geen visuele bugs en perfect volgens de vooraf bepaalde specificaties. Pas hiervoor **Behaviour-Driven Development** toe en zorg ervoor dat de code goed gedocumenteerd is.

### Milestones

> ##### **Tip** *:bulb:*{:.pull-left .m-r}
> ---
> Dit wil niet zeggen dat je moet wachten tot de voorgaande milestone voltooid is om aan de volgende te beginnen!
{:.alert .alert-info}

> ##### Milestone 1 *:triangular_flag_on_post:*{:.pull-left .m-r}
> ---
> Voorbereidingen **voorstellen**.
>
> - Academische Poster
>   - Opmaak en vormgeving klaar
>   - Inhoud aanwezig, maar moet nog aangevuld of geüpdatet worden.
> - Productiedossier
>   - Opmaak en vormgeving klaar
>   - Inhoud aanwezig, maar moet nog aangevuld of geüpdatet worden.
> - Presentatie
>   - Opmaak en vormgeving klaar
>   - Inhoud aanwezig, maar moet nog aangevuld of geüpdatet worden.
> - Timesheet
>   - Ingevuld tot op vandaag.
> - Eerste versie op repository:
>   - Academische Poster
>   - Checklist
>   - Productiedossier
>   - Presentatie
>   - Timesheet
{:#milestone-1 .card .card-block}

> ##### Milestone 2 *:round_pushpin:*{:.pull-left .m-r}
> ---
> *Alpha*-versie **voorstellen**.
>
> - Eerste functionaliteiten aanwezig en getest.
> - Ruwe versie gebruikersinterface.
> - Bijgewerkt versie op repository:
>   - Academische Poster
>   - Checklist
>   - Productiedossier
>   - Presentatie
>   - Timesheet
{:#milestone-2 .card .card-block}

> ##### Milestone 3 *:round_pushpin:*{:.pull-left .m-r}
> ---
> *Beta*-versie **voorstellen**.
>
> - Alle functionaliteiten aanwezig en getest.
> - Gebruikersinterface klaar om te testen.
> - Klaar om door gebruikers getest te woren.
> - Bijgewerkt versie op repository:
>   - Academische Poster
>   - Checklist
>   - Productiedossier
>   - Presentatie
>   - Timesheet
{:#milestone-3 .card .card-block}

> ##### Milestone 4 *:checkered_flag:*{:.pull-left .m-r}
> ---
> *Release Candidate*-versie **opleveren**.
>
> - Alle functionaliteiten aanwezig.
> - Gebruikersinterface opgepoetst.
> - Klaar voor *Acceptance Test* door klant.
> - Definitieve versie op repository:
>   - Academische Poster
>   - Checklist
>   - Productiedossier
>   - Presentatie
>   - Timesheet
> - Link naar Bitbucket-repository doorsturen naar docent (om deel te nemen aan examen)
{:#milestone-4 .card .card-block}

> ##### Mondeling Examen *:speech_balloon:*{:.pull-left .m-r}
> ---
> *Release Candidate*-versie **voorstellen** voor de jury.
>
> - Stel het werkstuk voor in maximaal 15 minuten:
>   - Live demonstraties
>   - Screencast
> - Afgedrukte versie:
>   - Academische Poster
{:#milestone-exam-oral .card .card-block}

### Source Code Management

#### Branches

Gebruik git met de [Feature Branch Workflow](https://www.atlassian.com/git/tutorials/comparing-workflows/feature-branch-workflow).

Nieuwe branch per functionaliteit, nadat de functionaliteit klaar is voor productie (nadat alle testen succesvol verlopen zijn), dan wordt de branch in de master branch gemerged.

Naast de `master` branch 

|  Postfix    | Omschrijving                                                           |
|-------------|------------------------------------------------------------------------|
| `-feature`  | Nieuwe functionaliteit                                                 |
| `-hotfix`   | Voor een bugfix die niet kan wachten op een volgende geplande release. |
{:.table}

#### Commits

Commits moeten voorafgegaan worden door een prefix.

|  Prefix     | Omschrijving                                                           |
|-------------|------------------------------------------------------------------------|
| `[FEATURE]` | Deelfunctionaliteit in een *feature branch.*                           |
| `[WIP]`     | Tussentijdse commits voor WIP, iets wat nog niet af is.                |
| `[FIX]`     | Bugfix                                                                 |
| `[TASK]`    | bijvoorbeeld refactoring (structuur, naamgeving aanpassen), updates van derden toepassen. |
{:.table}

> ##### **Voorbeeld** *:package:*{:.pull-left .m-r}
> ---
> Branch `account-feature`:
>
> - `[FEATURE]` Add user registration form and save data to db
> - `[TASK]` Rename field `lastname` to `familyname`
{:.alert .alert-success}


Tips
----

> ##### **Tip** *:bulb:*{:.pull-left .m-r}
> ---
> Schrijf nette code:
>
> - gebruik correct **Engels** voor code, naamgeving, commentaar, etc. Programmeren is een internationale aangelegenheid.   
> - volg een/de standaard, indien mogelijk.
> - let op insprongen en witruimte.
> - gebruik duidelijke naamgevingen (liever te lang dan te kort).
> - schrijf commentaar als de bedoeling van de code voor een developer niet meteen voor de hand ligt.
{:.alert .alert-info}

> ##### **Tip** *:bulb:*{:.pull-left .m-r}
> ---
> **Vragen, onduidelijkheden, problemen, opmerkingen of zit je compleet vast?**  
> Ga naar de [HipChat Room voor NMDAD III][hipchat]. Indien ook dit geen oplossing biedt, kan er een afspraak met de docent gemaakt worden voor een [TeamViewer][teamviewer]-sessie.
{:.alert .alert-info}

{% comment %}

AngularJS via Ionic Framework:

    Existing API's:
    
    - http://data.gent.be
    - http://appsforgent.be/api-tdt/
    - http://data.worldbank.org
    - https://developer.yahoo.com/yql


         Using $resource with JSOP http://www.bennadel.com/blog/2610-using-jsonp-with-resource-in-angularjs.htm


{% endcomment %}

{% comment %}
    ⚓ Afkortingen
{% endcomment %}

*[WIP]:                     Work in Progress

{% comment %}
    ⚓ Hyperlinks
{% endcomment %}

[artevelde]:                http://www.arteveldehogeschool.be
[bitbucket]:                https://bitbucket.org
[chamilo]:                  http://chamilo.arteveldehs.be
[docent-opr]:               http://www.olivierparent.be
[docent-opr-bitbucket]:     https://bitbucket.org/olivierparent
[docent-opr-mail]:          mailto:olivier.parent@arteveldehs.be?subject=NMDAD3
[docent-pdp]:               http://www.olivierparent.be
[docent-pdp-bitbucket]:     https://bitbucket.org/drdynscript
[docent-pdp-mail]:          mailto:philippe.depauw@arteveldehs.be?subject=NMDAD3
[ects]:                     http://ec.europa.eu/education/tools/ects_nl.htm
[ects-fiche]:				https://bamaflexweb.arteveldehs.be/BMFUIDetailxOLOD.aspx?a=47526&b=5&c=1
[hipchat]:                  https://www.hipchat.com/g0wZaWEvE
[teamviewer]:               https://www.teamviewer.com/nl/index.aspx