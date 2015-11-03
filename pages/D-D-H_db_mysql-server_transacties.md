---
layout   : page
title    : Transacties
permalink: db/mysql-server/transacties/
published: true
tags     :
---

Een **Transactie** is een geheel van SQL-statements (voor **CRUD**) dat in zijn geheel wordt uitgevoerd of helemaal niet wordt uitgevoerd.

ACID
----

De **ACID**-eigenschappen van een Transactie:

 - **Atomiciteit** *(Atomicity)*  
   In zijn geheel uitgevoerd of totaal niet.  
   Verantwoordelijk: **DBMS**.
 - **Consistentie** *(Consistency)*  
   Van begin tot eind uitgevoerd zonder inmenging van andere transacties.  
   Verantwoordelijk: **developer**.
 - **Geïsoleerdheid** *(Isolation)*  
   Uitgevoerd alsof er geen andere transacties bestaan, ook al gebeuren die gelijktijdig.  
   Verantwoordelijk: **DBMS**.
 - **Duurzaamheid** *(Durablility)*  
   Wijzigingen mogen niet verloren gaan door een defect of fout.  
   Verantwoordelijk: **DBMS**.

Een typisch voorbeeld van een transactie is **Geld overschrijven**

 - Geld moet van de ene rekening naar de andere gaan.
 - Op geen enkel moment mag er geld uit het systeem verdwijnen.
 - Als iets misloopt, dan moet het systeem naar de oude toestand terugkeren.

Een transactie begint met `START TRANSACTION` en wordt ofwel ongedaan gemaakt met `ROLLBACK` of definitief uitgevoerd met `COMMIT`.

{% highlight sql %}
-- 1. Een transactie beginnen
START TRANSACTION;

-- 2. SQL-statements 
… 

-- 3.a Om de wijzigingen ongedaan te maken
ROLLBACK;

-- 3.b Om de wijzigigen definitief te maken
COMMIT;
{% endhighlight %}

> **OPGELET:** Of een tabel Transacties ondersteunt hangt af van de gebruikte **Storage Engine**. Zie het betreffende hoofdstuk hieronder.


{% comment %}
<!-- ⚓ Afkortingen -->
{% endcomment %}
*[ACID]:                    Atomicity, Consistency, Isolation, and Durablility
*[DBMS]:                    Databasemanagementsysteem