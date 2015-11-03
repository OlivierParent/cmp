---
layout   : page
title    : Queryvariabelen
permalink: db/mysql-server/queryvariabelen/
published: true
tags     :
---

Soms kan het nodig zijn om variabelen te definiëren op databaseniveau. Je kan een variabele definiëren met `SET`. De variabelenaam begint met een `@`.

{% highlight sql %}
-- Variabele definiëren
SET @{variabele} = {waarde_of_expressie};
{% endhighlight %}

Bijvoorbeeld:

{% highlight bash %}
mysql> SET @id = (SELECT user_id FROM users WHERE first_name = 'Olivier' LIMIT 1);
{% endhighlight %}