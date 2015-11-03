---
layout   : page
title    : Views
permalink: db/mysql-server/views/
published: true
tags     :
---

Een view is een query die als **virtuele tabel** opgeslagen wordt. Views worden automatisch geüpdatet op de achtergrond. Views zijn vooral geschikt voor complexe query's die vaak uitgevoerd worden of heel lang duren om uit te voeren.

View **Maken**
--------------

Begin de naam van de view met `vw_` zodat je ze makkelijk kan onderscheiden van gewone tabellen. 

{% highlight sql %}
-- Eenvoudige view maken
CREATE VIEW vw_{view}
AS {query};
{% endhighlight %}

Bijvoorbeeld:

{% highlight bash %}
mysql> CREATE VIEW vw_user_addresses
    -> AS SELECT *
    -> FROM users NATURAL JOIN addresses
    -> ORDER BY last_name, first_name;
{% endhighlight %}
