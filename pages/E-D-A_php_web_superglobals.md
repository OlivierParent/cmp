---
layout   : page
title    : Superglobals
permalink: php/web/superglobals/
published: true
tags     :
---

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [PHP Manual / Language Reference / Predefined Variables / Superglobals](http://php.net/manual/en/language.variables.superglobals.php)
{:.card .card-block}

Wat zijn Superglobals?
----------------------

Superglobals zijn globale variabelen die in elk variabelenbereik zonder meer beschikbaar zijn.

| Variabele   | Waarde                                                                                            |
|:------------|:--------------------------------------------------------------------------------------------------|
| `$_GET`     | Array met alle variabelen uit een HTTP-request met de methode `GET`.                              |
| `$_POST`    | Array met alle variabelen uit een HTTP-request met de methode `POST`.                             |
| `$_COOKIE`  | Array met alle variabelen uit cookies.                                                            |
| `$_REQUEST` | Array met alle variabelen uit de superglobals `$_COOKIE`, `$_POST` en `$_GET` (in deze volgorde). |
| `$_FILES`   | Array met alle bestanden die geüpload weden via een HTTP-request met de methode `POST`.           |
| `$_SESSION` |	Array met alle sessievariabelen.                                                                  |
{:.table}

Opmerkingen
-----------

### `$_REQUEST`

Gebruik `$_REQUEST` enkel indien echt nodig. De specifieke arrays zijn te verkiezen. De prioriteit van de variabelen hangt af van `variables_order` in het bestand `php.ini`. De standaard prioriteit is cookie, post en dan get.

De waarden in de arrays zijn onafhankelijk van elkaar, zodat wijzigingen in `$_REQUEST` geen invloed hebben op de andere arrays en omgekeerd.

### `GET`- en `POST`-variabelen

`GET`- en `POST`-variabelen worden na het verzenden van een formulier opgeslagen met de naam van het name-attribuut van het inputveld. Om geldige HTML-code te hebben moet de waarde van het id- en het name-attribuut exact overeenkomen.

Afhankelijk van de foutmeldingsinstellingen geven niet gedefinieerde variabelen een foutmelding. Om de waarden in een formulier na het verzenden automatisch in te vullen kan de **foutonderdrukkingsoperator** (`@`) gebruikt worden, zodat geen afzonderlijke code geschreven moet worden om te checken of een variabele al bestaat.
