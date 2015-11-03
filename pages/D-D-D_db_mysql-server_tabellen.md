---
layout   : page
title    : Tabellen
permalink: db/mysql-server/tabellen/
published: true
tags     :
---

Een database bevat **Tabellen** *(Tables)*. Elke tabel bestaat uit **Kolommen** *(Columns)* en kan **Rijen** *(Rows)* bevatten. Een rij heeft voor elke kolom een overeenkomstig **Veld** *(Field)* waarin de **Gegevens** *(Data)* opgeslagen worden. De eigenschappen van een veld worden door de kolom bepaald.

Tabellen **Tonen**
------------------

Met `SHOW TABLES` kan je alle tabellen in een database of schema opvragen.

{% highlight sql %}
SHOW TABLES;
{% endhighlight %}

Bijvoorbeeld:

{% highlight bash %}
mysql>USE database_arteveldehogeschool_be;
mysql>SHOW TABLES;
Empty set (0.00 sec)

mysql> _
{% endhighlight %}

Tabel **Maken**
---------------

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [MySQL / MySQL 5.6 Reference Manual / CREATE TABLE Syntax](http://dev.mysql.com/doc/refman/5.6/en/create-table.html)
{:.card .card-block}

{% highlight sql %}
-- Tabel met kolommen maken
CREATE TABLE [IF NOT EXISTS] {tabel} (
    {kolom_1} {DATATYPE}[,
    {kolom_2} {DATATYPE}…]
);
{% endhighlight %}

Bijvoorbeeld:

{% highlight bash %}
mysql> CREATE TABLE IF NOT EXISTS `users` (
    -> id INT,
    -> first_name VARCHAR(255),
    -> last_name VARCHAR(255),
    -> username VARCHAR(255),
    -> password CHAR(60),
    -> created_at TIMESTAMP
    -> );
{% endhighlight %}

> ##### **Tip** *:bulb:*{:.pull-left .m-r}
> ---
> Vraag het  `CREATE`-statement van de tabel op met  `SHOW CREATE TABLE`.
> Hiermee kan je:
>
> - een backup van de structuur maken;
> - gedetailleerde informatie over de structuur van een tabel te zien.
{:.alert .alert-info}

{% highlight sql %}
-- CREATE-statement tonen
SHOW CREATE TABLE {tabel};
{% endhighlight %}

Tabel **Omschrijven**
---------------------

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [MySQL / MySQL 5.6 Reference Manual / EXPLAIN Syntax](http://dev.mysql.com/doc/refman/5.6/en/explain.html)
{:.card .card-block}

`EXPLAIN` (of `DESCRIBE`) is een *Utility Statement* waarmee de eigenschappen van de kolommen omschreven worden:

1. Field;
2. Type;
3. Null;
4. Key;
5. Default;
6. Extra.

{% highlight sql %}
-- Eigenschappen van de kolommen
EXPLAIN|DESCRIBE {tabel};
{% endhighlight %}

Bijvoorbeeld:

{% highlight bash %}
mysql> EXPLAIN users;
{% endhighlight %}

Tabel **Wijzigen**
------------------

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [MySQL / MySQL 5.6 Reference Manual / ALTER TABLE Syntax](http://dev.mysql.com/doc/refman/5.6/en/alter-table.html)
{:.card .card-block} 

Met `ALTER TABLE` kan je een bestaande tabel wijzigen.

### Kolom **Toevoegen**

 - `ADD`
   - Voeg een kolom toe.
   - `COLUMN` is optioneel.


{% highlight sql %}
-- Kolom toevoegen
ALTER TABLE {tabel}
    ADD [COLUMN] {kolom} {DATATYPE};

-- Meerdere kolommen toevoegen
ALTER TABLE {tabel}
    ADD [COLUMN] (
        {kolom_1} {DATATYPE}[,
        {kolom_2} {DATATYPE}…]
    );
{% endhighlight %}

### Kolom **Wijzigen**

Met `CHANGE` (of `CHANGE COLUMN`) wijzig je de naam van de kolom. Je moet ook het datatype meegeven, zodat je er bovendien ook het het datatype mee kan wijzigen.

{% highlight sql %}
-- Kolom nieuwe naam geven, en eventueel ook een ander datatype
ALTER TABLE {tabelnaam}
    CHANGE [COLUMN] {kolomnaam_oud}
    {kolomnaam_nieuw} {DATATYPE};
{% endhighlight %}

Met `MODIFY` (of `MODIFY COLUMN`) kan je enkel het datatype van de kolom wijzigen.

{% highlight sql %}
-- De kolom een ander datatype geven
ALTER TABLE {tabelnaam}
    MODIFY [COLUMN] {kolom} {DATATYPE};
{% endhighlight %}

 - `UNSIGNED`
   - Enkel positieve getallen.
   - Verdubbelt de toegelaten maximumwaarde.
   - Gebruik dit bijvoorbeeld samen met de beperkingen `PRIMARY KEY` en `AUTO_INCREMENT`.
 - `SIGNED`
   - Positieve en negatieve getallen.
   - Standaardinstelling, maar kan gebruikt worden om `UNSIGNED` te verwijderen.

{% highlight sql %}
-- Kolom wijzigen naar enkel positieve getallen
ALTER TABLE {tabelnaam}
    MODIFY [COLUMN] {kolomnaam} {DATATYPE} UNSIGNED;

-- Kolom terigzetten naar standaardinstelling voor getallen
ALTER TABLE {tabelnaam}
    MODIFY [COLUMN] {kolomnaam} {DATATYPE} SIGNED;
{% endhighlight %}

Een kolom kan je een aantal **randvoorwaarden** *(constraints)* opleggen:

 - `PRIMARY KEY`: **PK**, primaire sleutel van de tabel.
 - `NOT NULL`: de waarde moet ingevuld worden.
 - `NULL`: de waarde mag leeggelaten worden.
 - `UNIQUE`: elke rij moet een unieke waarde hebben in deze kolom van de tabel.
 - `AUTO_INCREMENT`: bij elke nieuwe rij wordt de waarde van de **integer** met 1 verhoogd (geïncrementeerd). De kolom is een sleutel. Wordt vaak wordt vaak gebruikt om een **surrogaatsleutel** te maken.

{% highlight sql %}
-- Kolom wijzigen naar PK
ALTER TABLE {tabelnaam}
    MODIFY [COLUMN] {kolomnaam} {DATATYPE} PRIMARY KEY;

-- PK verwijderen
ALTER TABLE {tabelnaam}
    DROP PRIMARY KEY;

-- Kolom wijzigen naar AUTO_INCREMENT
ALTER TABLE {tabelnaam}
    MODIFY [COLUMN] {kolomnaam} {DATATYPE} AUTO_INCREMENT;
{% endhighlight %}

 - `NOT NULL`
   - Dit attribuut mag geen null-waarde (ontbrekende waarde) hebben.
   - Verwijder de beperking met `NULL`

{% highlight sql %}
-- Kolom wijzigen zodat er een waarde ingevuld moet worden
ALTER TABLE {tabelnaam}
    MODIFY [COLUMN] {kolomnaam} {DATATYPE} NOT NULL;

-- De beperking ongedaan maken
ALTER TABLE {tabelnaam}
    MODIFY [COLUMN] {kolomnaam} {DATATYPE} NULL;
{% endhighlight %}

 - `UNIQUE`
   - Elke rij moet een unieke waarde hebben in deze kolom van de tabel.

{% highlight sql %}
-- Kolom wijzigen naar unieke waarden
ALTER TABLE {tabelnaam}
    MODIFY [COLUMN] {kolomnaam} {DATATYPE} UNIQUE;
{% endhighlight %}

### Standaardwaarde voor een kolom

Met `DEFAULT` kan je een standaardwaarde voorzien voor een kolom. Telkens een nieuwe rij wordt ingevoegd zonder een waarde op te geven voor die kolom, wordt deze standaardwaarde gebruikt.

{% highlight sql %}
-- Standaardwaarde voor de kolom
ALTER TABLE {tabel}
    MODIFY [COLUMN] {kolom} {DATATYPE} DEFAULT {waarde};
{% endhighlight %}

### Commentaar bij een kolom 

Met `COMMENT` kan je commentaar toevoegen aan een kolom. Dit is handig voor  DBA's (databasebeheerders) of developers zodat die weten welk soort gegevens in de kolom staan.

{% highlight sql %}
-- Commentaar voor de kolom
ALTER TABLE {tabel}
    MODIFY [COLUMN] {kolom} {DATATYPE} COMMENT {waarde};
{% endhighlight %}

Voorgaande wijzigingen kunnen in één statement gecombineerd worden.
De volgorde is niet van belang.

{% highlight sql %}
-- Kolom wijzigen
ALTER TABLE {tabel}
    MODIFY {kolom} {DATATYPE} PRIMARY KEY NOT NULL UNSIGNED;
{% endhighlight %}

Randvoorwaarden **Opleggen** 
----------------------------

### Primaire Sleutel *(Primary Key)*

`CONSTRAINT PRIMARY KEY` 

{% highlight sql %}
-- PK toevoegen
ALTER TABLE {tabel}
    ADD CONSTRAINT PRIMARY KEY ({kolom});

-- Samengestelde PK toevoegen
ALTER TABLE {tabel}
    ADD CONSTRAINT PRIMARY KEY ({kolom_1}[, {kolom_2}…]);
{% endhighlight %}

### Externe Sleutel *(Foreign Key)*

 - `FOREIGN KEY`
   - Externe Sleutel(s).
   - Hebben een naam.
   - Kunnen verwijderd worden aan de hand van die naam.
 - `REFERENCES`
   - De tabel en de PK waarnaar verwezen wordt.
   - De tabel moet reeds bestaan!


{% highlight sql %}
-- FK toevoegen
ALTER TABLE {tabel_A}
    ADD CONSTRAINT fk_{tabel_A}_{tabel_B}{0}
       FOREIGN KEY ({kolom_A1})
           REFERENCES {tabel_B} ({kolom_B1});

-- FK en PK toevoegen
ALTER TABLE {tabel_A}
    ADD CONSTRAINT PRIMARY KEY ({kolom_A1}),
    ADD CONSTRAINT fk_{tabel_A}_{tabel_B}{0}
       FOREIGN KEY ({kolom_A1})
           REFERENCES {tabel_B} ({kolom_B1});
{% endhighlight %}

### Controle

 - `CONSTRAINT CHECK`
   - Expressie waaraan voldaan moet worden.

> ##### **Opgelet** *:warning:*{:.pull-left .m-r}
> ---
> Voorlopig in nog geen enkele storage engine van MySQL geïmplementeerd. Gebruik een `TRIGGER` om hetzelfde effect te bereiken.
{:.alert .alert-warning}

{% highlight sql %}
-- Controle toevoegen
ALTER TABLE {tabel}
    ADD CONSTRAINT CHECK ({expressie});

-- Gebruiker moet minstens 18 jaar zijn
-- WERKT NIET IN MySQL!
ALTER TABLE users
    ADD CONSTRAINT CHECK (user_age >= 18);
{% endhighlight %}

Tabel **Leegmaken**
-------------------

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [MySQL / MySQL 5.6 Reference Manual / TRUNCATE TABLE Syntax](http://dev.mysql.com/doc/refman/5.6/en/truncate-table.html)
{:.card .card-block}

Met `TRUNCATE TABLE` kan je een tabel leegmaken. In feite is dit hetzelfde als de tabel verwijderen en daarna opnieuw aanmaken (*to truncate* betekent afknotten).

{% highlight sql %}
-- Tabel leegmaken
TRUNCATE TABLE {tabel};
{% endhighlight %}

Tabel **Hernoemen**
-------------------

Met `RENAME TABLE` kan je een tabel een nieuwe naam geven.

{% highlight sql %}
-- Tabel nieuwe naam geven
RENAME TABLE
    {tabelnaam_oud} TO {tabelnaam_nieuw};

-- Meerdere tabellen een nieuwe naam geven
RENAME TABLE
    {tabelnaam_A_oud} TO {tabelnaam_A_nieuw}[,
    {tabelnaam_B_oud} TO {tabelnaam_B_nieuw}…];
{% endhighlight %}

Kolommen en sleutels verwijderen
--------------------------------

 - `DROP COLUMN`: Kolom verwijderen.
 - `DROP PRIMARY KEY`: Primaire Sleutel verwijderen.
 - `DROP FOREIGN KEY`: Externe Sleutel verwijderen.
 - `DROP KEY` Sleutel verwijderen. Na het verwijderen van een Externe Sleutel blijft er nog een gewone Sleutel over.

{% highlight sql %}
-- Kolom verwijderen
ALTER TABLE {tabel}
DROP COLUMN {kolom};

-- PK (Primaire Sleutel) verwijderen
ALTER TABLE {tabel}
DROP PRIMARY KEY;

-- FK (Externe Sleutel) verwijderen
ALTER TABLE {tabel_A}
DROP FOREIGN KEY fk_{tabel_A}_{tabel_B}{0},
DROP KEY fk_{tabel_A}_{tabel_B}{0};
{% endhighlight %}