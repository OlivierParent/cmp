---
layout   : page
title    : Bijlagen
permalink: db/mysql-server/bijlagen/
published: true
tags     :
---

{% include mathjax.html %}

Datatypes
---------

De database slaat gegevens op volgens een bepaald **datatype** dat vooraf bepaald moet worden. Dit datatype heeft gevolgen voor de snelheid waarmee de gegevens opgezocht kunnen worden en de grootte van de nodige opslagruimte.

Probeer een datatype te kiezen dat zo goed mogelijk past bij het soort gegevens:

 - Kleinst mogelijke opslagruimte.
 - Voldoet aan de vereisten: snelheid, precisie, doorzoekbaarheid …
 - Houd er ook rekening mee dat vereisten in de toekomst kunnen wijzigen.
 - Een database wijzigen die reeds miljoenen rijen bevat is tijdrovend en bovendien is wijzigingen uitvoeren misschien te riskant.

### Numeriek

#### Integers

##### Gehele getallen

[Gehele getallen](http://dev.mysql.com/doc/refman/5.6/en/integer-types.html) *(Integers)* stellen een exacte waarde voor.

De integerdatatypes van klein naar groot:

 - `TINYINT`;
 - `SMALLINT`;
 - `MEDIUMINT`;
 - `INT` (of `INTEGER`);
 - `BIGINT`.

Tussen ronde haakjes kan `({n})` het minimum aantal getoonde tekens opgegeven worden. Dit heeft **geen invloed op de maximumwaarde** van het bereik, maar heeft enkel invloed in combinatie met `ZEROFILL`, waarbij de niet gebruikte plaatsen tot het n-de teken met een `0` opgevuld worden.

{% highlight sql %}
-- Integers
{DATATYPE}
{DATATYPE}({n})
{DATATYPE}({n}) ZEROFILL
{DATATYPE}({n}) UNSIGNED
{DATATYPE}({n}) UNSIGNED ZEROFILL
{% endhighlight %}

##### Booleaanse waarden

Voor MySQL is een booleaanse waarde de kleinste integer (`TINYINT`) die slechts 1 teken toont.

 - **ONWAAR:** `0`
 - **WAAR:** alle waarden die niet `0` zijn, bijv. `1`, `-3` of `9`

{% highlight sql %}
-- Synoniemen booleaanse waarde
-- opslag: 1 byte (8 bits!)
BOOL
BOOLEAN
TINYINT(1)
{% endhighlight %}


##### Overzicht integerdatatypes

| Datatype    | Signed     | Opslagruimte |          Minimumwaarde |          Maximumwaarde | 
|------------:|-----------:|-------------:|-----------------------:|-----------------------:|
| `TINYINT`   |            |       1 byte |                 `-128` |                  `127` |
| `TINYINT`   | `UNSIGNED` |       1 byte |                    `0` |                  `255` |
|=============|============|==============|========================|========================|
| `SMALLINT`  |            |      2 bytes |               `-32768` |                `32767` |
| `SMALLINT`  | `UNSIGNED` |      2 bytes |                    `0` |                `65535` |
|=============|============|==============|========================|========================|
| `MEDIUMINT` |            |      3 bytes |             `-8388608` |              `8388607` |
| `MEDIUMINT` | `UNSIGNED` |      3 bytes |                    `0` |             `16777215` |
|=============|============|==============|========================|========================|
| `INT`       |            |      4 bytes |          `-2147483648` |           `2147483647` |
| `INT    `   | `UNSIGNED` |      4 bytes |                    `0` |           `4294967295` |
|=============|============|==============|========================|========================|
| `BIGINT`    |            |      8 bytes | `-9223372036854775808` |  `9223372036854775807` |
| `BIGINT`    | `UNSIGNED` |      8 bytes |                    `0` | `18446744073709551615` |
{:.table}

#### Floating-point

[Zwevendekommagetallen](http://dev.mysql.com/doc/refman/5.6/en/floating-point-types.html) *(floating-point values)* hebben een waarde bij benadering.

`FLOAT({p})`

 - `{p}`: Precisie

`FOAT({m},{d})`

 - `{m}`: Mantisse (totaal aantal cijfers)
 - `{d}`: Decimaal (**maximaal** aantal cijfers na de komma)

{% highlight sql %}
-- enkele-precisiewaarde
-- {p}: 0 t.e.m. 23
-- 4 bytes opslagruimte
FLOAT
FLOAT({p})
FLOAT({m},{d})

-- 0.00 tot 9999.99
FLOAT(6,2)

-- dubbele-precisiewaarde
-- {p}: 24 t.e.m. 53
-- 8 bytes opslagruimte
DOUBLE
DOUBLE PRECISION
FLOAT({p})
{% endhighlight %}

#### Decimal values

[Vastekommagetallen](http://dev.mysql.com/doc/refman/5.6/en/precision-math-decimal-characteristics.html) *(Decimal values)* Hebben een exacte waarde. 

> ##### **Tip** *:bulb:*{:.pull-left .m-r}
> ---
> Gebruik vastekommagetallen voor  valuta, want bij geldtransacties mogen geen afrondingsfouten ontstaan.
{:.alert .alert-info}

`DECIMAL({m},{d})`

 - `{m}`: Mantisse (totaal aantal cijfers)
 - `{d}`: Decimaal (**exact** aantal cijfers na de komma)

{% highlight sql %}
-- {m}: 1 tot 65
-- {d}: 0 tot m
-- standaardwaarde {m} is 10
DECIMAL
DECIMAL({m}) -- = DECIMAL({m},0) 
DECIMAL({m},{d})
{% endhighlight %}

### Strings

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [MySQL / MySQL 5.6 Reference Manual / String Types](http://dev.mysql.com/doc/refman/5.6/en/string-types.html)
{:.card .card-block}

#### Tekenstrings

Wordt gebruikt voor tekst.

{% highlight sql %}
-- Vaste lengte
-- {n}: van 0 tot 255
-- opslagruimte: {n} bytes
CHAR({n})

-- Variabele lengte
-- {n}: van 0 tot 65535 
-- opslagruimte:
-- (lengte + 1) bytes als {n} <= 255
-- (lengte + 2) bytes als 255 < {n}
-- lengte <= {n}
VARCHAR({n})
TINYTEXT
TEXT
MEDIUMTEXT
LONGTEXT
{% endhighlight %}

| Datatype         |  Alternatief |       Opslagruimte | Maximumlengte |
|:-----------------|-------------:|-------------------:|--------------:|
| `CHAR(1)`        |              |            1 byte  |            `1`|
| `CHAR(255)`      |              | (lengte)     bytes |          `255`|
|==================|==============|====================|===============|
| `VARCHAR(255)`   |   `TINYTEXT` | (lengte + 1) bytes |          `255`|
| `VARCHAR(65535)` |       `TEXT` | (lengte + 2) bytes |        `65535`|
|                  | `MEDIUMTEXT` | (lengte + 3) bytes |     `16777215`|
|                  |   `LONGTEXT` | (lengte + 4) bytes |   `4294967295`|
{:.table}

#### Bytestrings

Wordt gebruikt om binaire (niet-tekstuele) gegevens op te slaan.

 - Geen tekenset.
 - Alfabetische sorteringen en vergelijkingen gebeuren op basis van de numerieke waarden van de bytes.
 - Voor binaire (niet-tekstuele) gegevens. Bijvoorbeeld foto- of andere bestanden.

> **BLOB:** Binary Large Object

{% highlight sql %}
-- Vaste lengte
-- {n}: 0 tot 255 opslagruimte: {n} bytes
BINARY({n})

-- Variabele lengte
-- {n}: van 0 tot 65535 
-- opslagruimte:
-- (lengte + 1) bytes als {n} <= 255
-- (lengte + 2) bytes als 255 < {n}
-- lengte <= {n}
VARBINARY({n})
TINYBLOB
BLOB
MEDIUMBLOB
LONGBLOB
{% endhighlight %}

| Datatype           |  Alternatief |       Opslagruimte | Maximumlengte |
|:-------------------|-------------:|-------------------:|--------------:|
| `BINARY(1)`        |              |            1 byte  |            `1`|
| `BINARY(255)`      |              | (lengte)     bytes |          `255`|
|====================|==============|====================|===============|
| `VARBINARY(255)`   |   `TINYBLOB` | (lengte + 1) bytes |          `255`|
| `VARBINARY(65535)` |       `BLOB` | (lengte + 2) bytes |        `65535`|
|                    | `MEDIUMBLOB` | (lengte + 3) bytes |     `16777215`|
|                    |   `LONGBLOB` | (lengte + 4) bytes |   `4294967295`|
{:.table}

Operatoren
----------

### SQL-92 Operatoren

SQL-92 was de derde revisie en meteen ook een grote. Deze standaard uit 1992 wordt soms SQL2 genoemd. Nog veel RDBMS’en gebruiken op deze standaard geïnspireerde SQL.

| Operator |  Betekenis            | SQL-92 |
|:---------|:----------------------|:------:|
| `… =  …` | gelijk aan/toekenning | Ja     |
| `… <  …` | kleiner dan           | Ja     |
| `… >  …` | groter dan            | Ja     |
| `… <= …` | kleiner of gelijk aan | Ja     |
| `… >= …` | groter of gelijk aan  | Ja     |
| `… <> …` | niet gelijk aan       | Ja     |
| `… != …` | niet gelijk aan       | Nee    |
{:.table}

| Booleaanse waarde | Betekenis |
|:------------------|:------------|
| `UNKOWN`          | nullwaarde
| `FALSE`           | 0
| `TRUE`            | 1
{:.table}

{% highlight sql %}
-- Boolaanse waarden
… IS [NOT] {bool}

-- Is nullwaarde?
… IS [NOT] NULL

-- In een bereik van getallen
… [NOT] BETWEEN min AND max

-- In een lijst van waarden
… [NOT] IN(waarde1[, waarde2…]) 
{% endhighlight %}

### Patroonherkenning

#### Eenvoudige patroonherkenning

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [MySQL / MySQL 5.6 Reference Manual / String Comparison Functions](http://dev.mysql.com/doc/refman/5.6/en/string-comparison-functions.html)
{:.card .card-block}

Eenvoudige patroonherkenning gebeurt met `LIKE` of `NOT LIKE`.

{% highlight sql %}
-- Eenvoudige patroonherkenning
… [NOT] LIKE '{patroon}'

-- Patronen
%			-- 0 of meer tekens
_			-- Exact 1 teken

-- Selecteer zowel Tim, Timoty, Tom als Tomas.
SELECT
    'Tanya'  LIKE 'T_m%',
    'Tim'    LIKE 'T_m%',
    'Timoty' LIKE 'T_m%',
    'Tom'    LIKE 'T_m%',
    'Tomas'  LIKE 'T_m%';
{% endhighlight %}

Bijvoorbeeld:

{% highlight bash %}
mysql> SELECT * 
    -> FROM users 
    -> WHERE first_name LIKE 'T_m%';
{% endhighlight %}

#### Reguliere expressies.

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [MySQL / MySQL 5.6 Reference Manual / Regular Expressions](http://dev.mysql.com/doc/refman/5.6/en/regexp.html)
{:.card .card-block}

Patroonherkenning met reguliere expressies gebeurt met `REGEXP` of `NOT REGEXP`.

{% highlight sql %}
-- Patroonherkenning met reguliere expressies
… [NOT] REGEXP '{reguliere_expressie}'

-- Reguliere expressies
[{tekenset}]	-- Exact 1 teken uit de tekenset
[^{tekenset}]	-- Exact 1 teken niet uit de tekenset

-- Selecteer zowel Tim en Tom.
SELECT
    'Tam' REGEXP 'T[^io]m',
    'Tam' REGEXP 'T[io]m',
    'Tim' REGEXP 'T[io]m',
    'Tom' REGEXP 'T[io]m';
{% endhighlight %}

Bijvoorbeeld:

{% highlight bash %}
mysql> SELECT * 
    -> FROM users 
    -> WHERE first_name REGEXP 'T[io]m';
{% endhighlight %}

### Logische operatoren

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [MySQL / MySQL 5.6 Reference Manual /  Logical Operators](http://dev.mysql.com/doc/refman/5.6/en/logical-operators.html)
{:.card .card-block}

Logische operatoren hebben als resultaat **WAAR** (`1` of `TRUE`), **ONWAAR** (`0` of `FALSE`) of **nullwaarde** (`NULL`) en worden van **links naar rechts** geëvalueerd.

 - `{expressie_1} AND {expressie_2}`
 - `{expressie_1}  OR {expressie_2}`
 - `{expressie_1} XOR {expressie_2}`

#### Logische EN-operator

In de Booleaanse algebra geldt:

| $ p $ | $ q $ | $ (p \land q) $ |
|:-----:|:-----:|:---------------:|
| $ 0 $ | $ 0 $ |      $ 0 $      |
| $ 0 $ | $ 1 $ |      $ 0 $      |
| $ 1 $ | $ 0 $ |      $ 0 $      |
| $ 1 $ | $ 1 $ |      $ 1 $      |
{:.table}

Beide termen moeten WAAR zijn.

{% highlight sql %}
-- Beide expressies moeten WAAR zijn
{expressie_1} AND {expressie_2}
{% endhighlight %}

Bijvoorbeeld:

{% highlight bash %}
mysql> SELECT
    -> 0 AND 0,
    -> 0 AND 1,
    -> 1 AND 0,
    -> 1 AND 1;
{% endhighlight %}

| Expressie | Resultaat |
|-----------|:---------:|
| `0 AND 0` |       `0` |
| `0 AND 1` |       `0` |
| `1 AND 0` |       `0` |
| `1 AND 1` |       `1` |
{:.table}

#### Logische OF-operator

In de Booleaanse algebra geldt:

| $ p $ | $ q $ | $ (p \lor q) $ |
|:-----:|:-----:|:--------------:|
| $ 0 $ | $ 0 $ |      $ 0 $     |
| $ 0 $ | $ 1 $ |      $ 1 $     |
| $ 1 $ | $ 0 $ |      $ 1 $     |
| $ 1 $ | $ 1 $ |      $ 1 $     |
{:.table}

Minstens één van de termen moet WAAR zijn.

{% highlight sql %}
-- Minstens één van de expressies moet waar zijn
{expressie_1} OR {expressie_2}
{% endhighlight %}

Bijvoorbeeld:

{% highlight bash %}
mysql> SELECT
    -> 0 OR 0,
    -> 0 OR 1,
    -> 1 OR 0,
    -> 1 OR 1;
{% endhighlight %}

| Expressie | Resultaat |
|-----------|:---------:|
| `0 OR 0`  |       `0` |
| `0 OR 1`  |       `1` |
| `1 OR 0`  |       `1` |
| `1 OR 1`  |       `1` |
{:.table}

#### Logische Exclusieve OF-operator

In de Booleaanse algebra geldt:

| $ p $ | $ q $ | $ (p \oplus q) $ |
|:-----:|:-----:|:----------------:|
| $ 0 $ | $ 0 $ |       $ 0 $      |
| $ 0 $ | $ 1 $ |       $ 1 $      |
| $ 1 $ | $ 0 $ |       $ 1 $      |
| $ 1 $ | $ 1 $ |       $ 0 $      |
{:.table}

Beide termen moeten verschillend zijn.

{% highlight sql %}
-- Beide expressies moeten een verschillende logische uitkomst hebben
{expressie_1} XOR {expressie_2}
{% endhighlight %}

Bijvoorbeeld:

{% highlight bash %}
mysql> SELECT
    -> 0 XOR 0,
    -> 0 XOR 1,
    -> 1 XOR 0,
    -> 1 XOR 1;
{% endhighlight %}

| Expressie | Resultaat |
|-----------|:---------:|
| `0 XOR 0` |       `0` |
| `0 XOR 1` |       `1` |
| `1 XOR 0` |       `1` |
| `1 XOR 1` |       `0` |
{:.table}


Functies
--------

### Statistische functies

Aggregate functions

Te gebruiken met een `GROUP BY` met zowel:
`SELECT`-clausule
`HAVING`-clausule

{% highlight sql %}
AVG()		    -- Gemiddelde
COUNT()	        -- Aantal
COUNT(DISTINCT) -- Aantal unieke
MAX()		    -- Grootste
MIN()		    -- Kleinste
SUM()		    -- Som
…
{% endhighlight %}

### Numerieke functies
Deze functies mag je overal toepassen.

{% highlight sql %}
-- Afronden
ROUND({getal}) -- afronden
CEIL({getal})  -- naar boven afronden
FLOOR({getal}) -- naar beneden afronden

-- Aantal decimalen ({d})
TRUNCATE({getal},{d})
…
{% endhighlight %}

### Datum- en tijdfuncties

Deze functies mag je overal toepassen.

{% highlight sql %}
CURDATE()     -- Datum nu
CURTIME()     -- Tijd nu
NOW()         -- Datum+tijd nu
YEAR({datum}) -- Jaartal

-- Datum formatteren
DATE_FORMAT({datum}, {formaat})
…

-- Huidige dag, datum en tijd
SELECT DATE_FORMAT(NOW(), '%a %d/%m/%Y %H:%i:%S');
{% endhighlight %}

### Stringfuncties
Deze functies mag je overal toepassen.

{% highlight sql %}
CONCAT({tekenstring_1}[, {tekenstring_2}…]) -- Concateneren (samenvoegen)
LCASE({tekenstring})                        -- Onderkast
LENGTH({tekenstring})                       -- Stringlengte
UCASE({tekenstring})                        -- Kapitalen
TRIM({tekenstring})                         -- Spaties trimmen
SUBSTR({tekenstring},{positie})             -- Substring
…
{% endhighlight %}

Storage Engines
---------------

MySQL Server gebruikt **Storage Engines** om tabellen op te slaan. Een storage engine bepaalt het **Tabeltype**. 

 - Per tabel kan een andere engine gebruikt worden.
 - Elke Storage Engine of Tabeltype heeft voor- en nadelen.
 - De beschikbare engines zijn afhankelijk van de MySQL-installatie!

**Tabeltypes:**

 - **NTST** *(Non-Transaction-Safe Tables)*
   - Sneller;
   - Kleiner opslaggeheugen nodig;
   - Kleiner werkgeheugen nodig. 
 - **TST** *(Transaction-Safe Tables)* 
   - Ondersteunt **Transacties**;
   - Veiliger: crashbestendig.

| Engine   | Tabeltype |
|:---------|:----------|
| `InnoDB` | TST       |
| `Memory` | NTST      |
| `MyISAM` | NTST      |
{:.table}

Naast de bovenstaande engines, zijn er nog vele andere:

 - `Archive`
 - `BerkeleyDB` 
 - `CSV`
 - `IBMDB2I`
 - `Merge`
 - …

{% highlight sql %}
-- Tabel maken met bepaalde storage engine
CREATE TABLE users (id)
ENGINE = MyISAM;

-- Storage engine wijzigen
ALTER TABLE users
ENGINE = InnoDB;

-- Tabel in het werkgeheugen tot de server herstart.
ALTER TABLE users
ENGINE = Memory;
{% endhighlight %}

Optimalizeren van Query's
-------------------------

Met `EXPLAIN` kun je nagaan hoe MySQL de query's uitvoert:

 - Welke kolommen komen in aanmerking voor een `INDEX`.
 - Hoe verloopt een `JOIN`.

Met `EXPLAIN EXTENDED` krijg je meer uitgebreide informatie.

{% highlight sql %}
-- Informatie over de query 
EXPLAIN [EXTENDED] {query};

-- Voorbeeld
EXPLAIN
    SELECT * FROM users
    ORDER BY last_name;
{% endhighlight %}
