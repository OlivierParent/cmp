---
layout   : page
title    : Syntaxis
permalink: db/sql/syntaxis/
published: true
tags     :
---

SQL-code is **niet-hoofdlettergevoelig**, maar sleutelwoorden schrijft men bij voorkeur in **kapitalen**.

SQL-code heeft een **vrije vorm**. Dit wil zeggen dat regeleinden, extra spaties of tabtekens geen invloed hebben.

Elke regel SQL-code wordt begrensd door een **puntkomma** (`;`). Dit is bij de meeste RDBMS'en verplicht, maar soms is het niet nodig als er maar één regel per keer uitgevoerd kan worden.

**Commentaar** begint met twee koppeltekens en een spatie (`-- `), maar niet elk RDBMS laat commentaar toe. Zo laat Microsoft Access laat dit bijvoorbeeld niet toe.

CRUD
----

Met SQL-statements kunnen de **vier bewerkingen** op databasegegevens uitgevoerd worden:

| Bewerking             | Betekenis         |
|:----------------------|:------------------|
| **Create**		    | aanmaken/invoeren |
| **Read**		        | uitlezen          |
| **Update**		    | wijzigen          |
| **Delete**/**Drop** 	| verwijderen       |
{:.table}

SQL-subtalen
------------

### DDL

*Data Definition Language* beschrijft de structuur van de database. Wordt gebruikt door de **DBD** *(Database Designer)* en softwareontwerpers.

> **SQL-sleutelwoorden:**
> 
> *   `ALTER`
> *   `CREATE`
> *   `DROP`
> *   `RENAME`
> *   `TRUNCATE`
> *   …

### DML

*Data Manipulation Language* bewerkt de gegevens in de database verwerkt. Wordt gebruikt door softwareontwerpers en softwareontwikkelaars.

> **SQL-sleutelwoorden:**
>
> *   `INSERT`
> *   `SELECT`
> *   `UPDATE`
> *   `REPLACE`
> *   …

### Speciale statements

De speciale statements:

-   **Administration Statements**
-   **Utility Statements**: hebben een speciaal nut.

Deze statements gebruikt je normaal gezien enkel via de *Command-Line Interface* van het DBMS, en nooit bij het programmeren van gewone webapps.

#### Administration Statements

Deze statements gebruikt een **DBA** *(Database Administrator)* om het DBMS te beheren (o.a. databasegebruikers en databases aanmaken).

> **SQL-sleutelwoorden:**
>
> *   `CREATE USER`
> *   `DROP USER`
> *   `GRANT`
> *   `REVOKE`
> *   `SHOW DATABASES`
> *   `SHOW SCHEMAS`
> *   …

#### Utility Statements

Deze statements hebben een speciaal nut.

> **SQL-sleutelwoorden:**
>
> *   `DESCRIBE`
> *   `EXPLAIN`
> *   `USE`
> *   …


{% comment %}
<!-- ⚓ Afkortingen -->
{% endcomment %}
*[DDL]:                     Data Definition Language
*[DML]:                     Data Manipulation Language
*[RDBMS]:                   Relationeel Databasemanagementsysteem
*[SQL]:                     Structured Query Language


{% comment %}
<!-- ⚓ Hyperlinks -->
{% endcomment %}
[mariadb]:                  https://mariadb.org
[mysql]:                    http://www.mysql.com
[mysql-doc]:                http://dev.mysql.com/doc/refman/5.6/en/
[oracle]:                   http://www.oracle.com/be/index.html
