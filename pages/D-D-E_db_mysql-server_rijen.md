---
layout   : page
title    : Rijen
permalink: db/mysql-server/rijen/
published: true
tags     :
---

De vier basisbewerkingen die je op rijen kan uitvoeren zijn **CRUD**: 

 - Create
 - Read
 - Update
 - Delete (Drop)

Rijen **Toevoegen** [CRUD: Create]
----------------------------------

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [MySQL / MySQL 5.6 Reference Manual / INSERT Syntax](http://dev.mysql.com/doc/refman/5.6/en/insert.html)
{:.card .card-block}

Om waardes van het type string toe te voegen gebruikt men enkele aanhalingstekens (`'`).
De set van waarden staan tussen ronde haakjes.

{% highlight sql %}
-- Rij toevoegen aan tabel
INSERT INTO {tabel} (
    {kolom_1}[,
    {kolom_2}…]
)
VALUES (
    {waarde_1}[,
    {waarde_2}…]
);
{% endhighlight %}

Bijvoorbeeld:

{% highlight bash %}
mysql> INSERT INTO addresses (
    -> street,
    -> number
    -> )
    -> VALUES (
    -> 'Industrieweg',
    -> 232
    -> );
{% endhighlight %}

In bovenstaand voorbeeld gaan we ervan uit dat:

 - er een kolom `id` bestaat die de PK is en als datatype `INTEGER AUTO_INCREMENT` heeft, zodat elke nieuwe rij automatisch een veld `id` krijgt met een waarde die 1 hoger is dan die van de vorige rij;
 - `number` een **integer** (geheel getal) is, zodat we de waarde zonder rechte aanhalingstekens schrijven. 

Meerdere rijen toevoegen kan ook. De sets van waarden worden door een **komma** (`,`) gescheiden.

{% highlight sql %}
INSERT [INTO] {tabel} (
    {kolom_1}[,
    {kolom_2}…]
)
VALUES (
    {waarde_1a}[,
    {waarde_2a}…]
)[, (
    {waarde_1b}[,
    {waarde_2b}…]
)…];
{% endhighlight %}

Bijvoorbeeld:

{% highlight bash %}
mysql> INSERT INTO addresses
    -> (street, number)
    -> VALUES
    -> ('Industrieweg', 232),
    -> ('Hoogpoort', 15);
{% endhighlight %}

Rijen **Selecteren** [CRUD: Read]
---------------------------------

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [MySQL / MySQL 5.6 Reference Manual / SELECT Syntax](http://dev.mysql.com/doc/refman/5.6/en/select.html)
{:.card .card-block}

### Rijen Selecteren

De **asterisk** (`*`) is een jokerteken waarmee je **alle kolommen** selecteert, niet alle rijen!

Als er uit meerdere tabellen tegelijk geselecteerd wordt, moet de tabelnaam gespecificeerd worden.

{% highlight sql %}
-- Toon de rijen met alle kolommen (*) van de tabel
SELECT * FROM {tabel};

--
SELECT
    {kolom_1}[,
    {kolom_2}…]
FROM {tabel};

--
SELECT
    {tabel}.{kolom_1}[,
    {tabel}.{kolom_2}…]
FROM {tabel};
{% endhighlight %}

> ##### **Tip** *:bulb:*{:.pull-left .m-r}
> ---
> Gebruik een **alias** (`AS`) om query's in te korten of beter leesbaar te maken. Een alias kan dan doorheen de query gebruikt worden.
> Er zijn twee soorten:
> 
> - kolomalias
> - tabelalias
>
> Voor tabelaliassen is het sleutelwoord `AS` optioneel. Laat het daarom bij voorkeur weg.
{:.alert .alert-info}

{% highlight sql %}
-- Alias voor de tabelnaam
SELECT
	{tabelalias}.{kolom_1}[,
	{tabelalias}.{kolom_2}…]
FROM {tabel} [AS] {tabelalias};
{% endhighlight %}

Bijvoorbeeld:

{% highlight bash %}
mysql> SELECT u.first_name
    -> FROM users AS u;
{% endhighlight %}

of beter en korter:

{% highlight bash %}
mysql> SELECT u.first_name
    -> FROM users u;
{% endhighlight %}

{% highlight sql %}
-- Aliassen voor de tabelnaam en de kolomnaam
SELECT
	{tabelalias}.{kolom_1} AS {kolomalias_1} [,
	{tabelalias}.{kolom_2} AS {kolomalias_2}…]
FROM {tabel} [AS] {tabelalias};
{% endhighlight %}

> ##### **Tip** *:bulb:*{:.pull-left .m-r}
> ---
> Gebruik **back ticks** (`` ` ``) als de alias een spatie of een gereserveerd teken of woord bevat.
{:.alert .alert-info}

{% highlight bash %}
mysql> SELECT
    -> u.first_name AS `De gebruikersnaam`
    -> FROM users u;
{% endhighlight %}

### Rijen uit het resultaat **Beperken**

Met het sleutelwoord `LIMIT` kan het aantal rijen uit het queryresultaat beperkt worden.

Om `{n}` rijen te tonen.
Met een optionele **offset** kan de selectierij opgegeven worden vanaf waar de `{n}` volgende rijen getoond moeten worden.

> ##### **Opgelet** *:warning:*{:.pull-left .m-r}
> ---
> *Microsoft SQL Server* gebruikt hiervoor `TOP`, maar de syntaxis is volledig anders.
{:.alert .alert-warning}

{% highlight sql %}
-- {n} rijen tonen
SELECT {kolom(men)}
FROM {tabel}
LIMIT [{offset},]{n};
{% endhighlight %}

Voorbeeld 1: de 4 eerste rijen tonen uit het queryresultaat.

{% highlight bash %}
mysql> SELECT *
    -> FROM users
    -> LIMIT 4;
{% endhighlight %}

Voorbeeld 2: eerst 5 rijen overslaan uit het queryresultaat en dan de eerste 4 resterende rijen tonen.

{% highlight bash %}
mysql> SELECT *
    -> FROM users
    -> LIMIT 5,4;
{% endhighlight %}

{% highlight sql %}
-- Alternatieve manier
SELECT {kolom(men)}
FROM {tabel}
LIMIT {n} [OFFSET {offset}];
{% endhighlight %}

Voorbeeld 3: eerst 5 rijen overslaan uit het queryresultaat en dan de eerste 4 resterende rijen tonen.

{% highlight bash %}
mysql> SELECT *
    -> FROM users
    -> LIMIT 4 OFFSET 5;
{% endhighlight %}

Standaard worden alle selectierijen getoond, ook selectierijen die er identiek uitzien (hoewel de eigenlijke rij altijd uniek is). Omdat `ALL` de standaard is, wordt dit eigenlijk nooit geschreven.

Met `DISTINCT` (of `DISTINCTROW`) worden enkel de onderscheiden rijen getoond. De duplicaten worden uit de selectie gefilterd.

{% highlight sql %}
-- Selecteer alle rijen
SELECT [ALL] {kolom(mem)}
FROM {tabel};

-- Filter duplicaten uit de selectie
SELECT DISTINCT {kolom(mem)}
FROM {tabel};

-- Synoniem voor DISTINCT
SELECT DISTINCTROW {kolom(mem)}
FROM {tabel};
{% endhighlight %}

### Uit meerdere tabellen tegelijk selecteren

Er kan uit meerdere tabellen tegelijk geselecteerd worden. 

#### Combineren

Hierbij wordt elke rij van de ene tabel met elke rij van de andere tabellen gecombineerd.

> ##### **Opgelet** *:warning:*{:.pull-left .m-r}
> ---
> Deze manier van tabellen combineren wordt **afgeraden!**
{:.alert .alert-warning}

{% highlight sql %}
-- Selectie uit meerdere tabellen
SELECT {kolom(mem)}
FROM tabel_A [, tabel_B…];
{% endhighlight %}

#### Combineren met `NATURAL JOIN`

Tabellen kunnen in een selectie gecombineerd worden met een `NATURAL JOIN`. Kolommen met dezelfde kolomnaam in beide tabellen worden samengevoegd. Toont enkel de rijen waarvan de waarde in de gemeenschappelijke kolom overeenkomt.

{% highlight sql %}
-- Selectie uit meerderetabellen
SELECT {kolom(mem)}
FROM
    {tabel_A} {tabelalias_A}
    NATURAL JOIN {tabel_B} {tabelalias_B};
{% endhighlight %}

Met de optionele sleutelwoorden `LEFT` en `RIGHT` wordt de selectie uitgebreid, zodat respectievelijk alle rijen van de linker of alle rijen van de rechter tabel getoond worden.

{% highlight sql %}
-- Alle rijen uit {tabel_A} plus
-- overeenkomstige rijen uit {tabel_B}
SELECT *
FROM {tabel_A} {tabelalias_A}
    NATURAL LEFT JOIN {tabel_B} {tabelalias_B};

-- Alle rijen uit {tabel_B} plus
-- overeenkomstige rijen uit {tabel_A}
SELECT *
FROM {tabel_A} {tabelalias_A}
    NATURAL RIGHT JOIN {tabel_B} {tabelalias_B};
{% endhighlight %}

#### Combineren met `INNER JOIN … USING|ON`

De `INNER JOIN … USING|ON` is een alternatief voor een gewone `NATURAL JOIN`.

 - `LEFT JOIN` is een alternatief voor een `NATURAL LEFT JOIN`.
 - `RIGHT JOIN` is een alternatief voor een `NATURAL RIGHT JOIN`.

`INNER JOIN … USING ` 

Met `USING (…)` geef je de kolomnaam of -namen op waarop de tabellen samengevoegd moeten worden.

{% highlight sql %}
-- INNER JOIN … USING (…)
SELECT {kolom(mem)}
FROM {tabel_A} {tabelalias_A}
    INNER JOIN {tabel_B} {tabelalias_B}
    USING ({kolom_1}[, {kolom_2}…]);
{% endhighlight %}

`INNER JOIN … ON ` 

Met `ON …` gebruik je een expressie, bijvoorbeeld:
`linker_tabel.id = rechter_tabel.id`

{% highlight sql %}
-- INNER JOIN … ON vergelijking
SELECT {kolom(mem)}
FROM {tabel_A} {tabelalias_A}
    INNER JOIN {tabel_B} {tabelalias_B}}
    ON {tabelalias_A}.{kolom_A1} = {tabelalias_B}.{kolom_B1};
{% endhighlight %}

<!-- Voorbeeld met kleuren

http://www.w3.org/TR/css3-color/


kleuren
-------
id  name

1   red
2   yellow
3   green
4   cyan
5   blue
6   magenta

tinten
------
id  name       kleur_id
1   firebrick   1
2   
3

-->

#### Combineren met `LEFT|RIGHT JOIN … USING|ON`

`LEFT|RIGHT JOIN … USING` 

{% highlight sql %}
-- LEFT JOIN … USING (…)
SELECT {kolom(mem)}
FROM {tabel_A} {tabelalias_A}
    LEFT|RIGHT JOIN {tabel_B} {tabelalias_B}
    USING ({kolom_1}[, {kolom_2}…]);
{% endhighlight %}

`LEFT|RIGHT JOIN … ON` 

{% highlight sql %}
-- LEFT JOIN … ON vergelijking
SELECT {kolom(mem)}
FROM {tabel_A} {tabelalias_A}
    LEFT|RIGHT JOIN {tabel_B} {tabelalias_B}
    ON {tabelalias_A}.{kolom} = {tabelalias_B}.{kolom};
{% endhighlight %}

### Conditioneel selecteren

#### De `WHERE`-clausule

 - Werkt met expressies.
 - De evaluatievolgorde hangt af van de gebruikte logische operator 
 - Gebruik `(` en `)` om de evaluatievolgorde te bepalen.

{% highlight sql %}
-- selectie van rijen met een WHERE-clausule
SELECT {kolom(mem)}
FROM {tabel}
WHERE
    {kolom_1} {OPERATOR} {waarde_1}
    [AND|OR|XOR
    {kolom_2} {OPERATOR} {waarde_2}…];
{% endhighlight %}

#### Patroonherkenning

`LIKE` werkt met patronen.

{% highlight sql %}
-- Selectie van rijen met een
-- WHERE-clausule
SELECT {kolom(mem)}
FROM {tabel}
WHERE
    {kolom} [NOT] LIKE {patroon};

-- Voorbeeld
-- Selecteer zowel Tim, Timoty, Tom als Tomas
SELECT first_name
FROM users
WHERE first_name LIKE 'T[io]m%';
{% endhighlight %}

#### Waarde tussen minimum en maximum

 - `BETWEEN {min} AND {max}`
 - `NOT BETWEEN {min} AND {max}`

> ##### **Opgelet** *:warning:*{:.pull-left .m-r}
> ---
> Zowel de minimum- als maximumwaarde zijn inbegrepen in de selectie!
{:.alert .alert-warning}

{% highlight sql %}
SELECT {kolom(men)}
FROM {tabel}
WHERE
    {kolom} [NOT] BETWEEN {min} AND {max};

-- Bovenstaande query is de iets kortere versie van dit:
SELECT {kolom(men)}
FROM {tabel}
WHERE
    [NOT] ({min} <= {kolom} AND {kolom} <= {max});
{% endhighlight %}

#### Waarden in een reeks

 - `IN`: waarde moet in de reeks staan
 - `NOT IN`:  waarde mag niet in de reeks staan

{% highlight sql %}
SELECT {kolom(men)}
FROM {tabel}
WHERE
    {kolom} [NOT] IN ({waarde_1}[, {waarde_2}…]);
{% endhighlight %}

#### Nullwaarde

Controleren op nullwaarde:

 - `IS NULL`
 - `IS NOT NULL`

{% highlight sql %}
SELECT {kolom(men)}
FROM {tabel}
WHERE
    {kolom} IS [NOT] NULL;
{% endhighlight %}

### Rijen groeperen 

Rijen kan je groeperen met een `GROUP BY`-voorwaarde.

{% highlight sql %}
-- Selectie van rijen, gegroepeerd volgens de waarde van een kolom
SELECT {kolom(men)}
FROM {tabel}
WHERE {expressie}
GROUP BY
    {kolom_1}[,
    {kolom_2}…];
{% endhighlight %}

Het is te vergelijken met een `WHERE`-voorwaarde, maar laat wel het gebruik van statistische functies toe in de expressie.

{% highlight sql %}
-- HAVING in plaats van WHERE 
SELECT {STATISTISCHE_FUNCTIE}(*)
FROM {tabel}
GROUP BY
    {kolom_1}[,
    {kolom_2}…]
    HAVING {expressie};
{% endhighlight %}

### Rijen sorteren

Sorteren doe je met een `ORDER BY`-voorwaarde. Deze moet na een `WHERE`- of `GROUP BY`-voorwaarde, maar voor een `LIMIT`-voorwaarde.

Sorteren gebeurt:

 - `ASC` *(ascending):* oplopend (0-9 en A-Z).
 - `DESC` *(descending):* aflopend (9-0 en Z-A ).

Standaard wordt oplopend gesorteerd, daarom mag je `ASC` weglaten.

{% highlight sql %}
-- Sorteren
SELECT {kolom(men)}
FROM {tabel}
ORDER BY kolomnaamX [ASC|DESC];

-- Met meerdere kolommen
SELECT {kolom(men)}
FROM {tabel}
ORDER BY {kolom_1} [DESC][, {kolom_2} [DESC]…];
{% endhighlight %}

Voorbeeld:

{% highlight bash %}
mysql> SELECT *
    -> FROM users
    -> WHERE first_name LIKE 'A%'
    -> ORDER BY first_name DESC, last_name
    -> LIMIT 10;
{% endhighlight %}

### Resultaten samenvoegen

Met `UNION` voeg je de resultaten van 2 of meer `SELECT`-query’s samen.
Duplicaten worden uit de resultaten gefilterd. Gebruik `UNION DISTINCT` indien dit niet vanzelf gebeurt.
De kolommen uit de andere query(’s) moeten wel gelijkaardig zijn aan die uit de eerste query.

{% highlight sql %}
-- 2 query’s samenvoegen
({query_1}) UNION [DISTINCT|ALL] ({query_2})
ORDER BY …
LIMIT …

-- Voorbeeld
(SELECT user_familyname `name` FROM users)
UNION
(SELECT admin_familyname `name` FROM admins)
ORDER BY name DESC;
{% endhighlight %}

Rijen **Bijwerken** [CRUD: Update]
----------------------------------

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [MySQL / MySQL 5.6 Reference Manual / UPDATE Syntax](http://dev.mysql.com/doc/refman/5.6/en/update.html)
{:.card .card-block}

 - `UPDATE`
   - Expressies in `SET` en `WHERE`
   - Dubbele gelijkheidstekens worden **nooit** gebruikt.
   - Zowel vergelijking als toekenning gebeurt met een enkel gelijkheidsteken.

{% highlight sql %}
-- Rij(en) updaten in een tabel
UPDATE {tabel}
SET
    {kolom_1} = {waarde_1}[,
    {kolom_2} = {waarde_2}…]
WHERE
    {kolom_8} {OPERATOR} {waarde_8}
    [AND|OR
    {kolom_9} {OPERATOR} {waarde_9}…];
{% endhighlight %}

Bijvoorbeeld:

{% highlight bash %}
mysql> UPDATE users
    -> SET first_name = 'Jane'
    -> WHERE user_id = 1;
{% endhighlight %}

Rijen **Verwijderen** [CRUD: Delete]
------------------------------------

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [MySQL / MySQL 5.6 Reference Manual / DELETE Syntax](http://dev.mysql.com/doc/refman/5.6/en/delete.html)
{:.card .card-block}

{% highlight sql %}
DELETE FROM {tabel}
WHERE {expressie(s)};
{% endhighlight %}

Bijvoorbeeld:

{% highlight bash %}
mysql> DELETE FROM users
    -> WHERE user_id = 1;
{% endhighlight %}

{% comment %}
<!-- ⚓ Afkortingen -->
{% endcomment %}
*[CRUD]:                    Create, Read, Update, and Delete
