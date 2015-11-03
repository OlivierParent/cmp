---
layout   : page
title    : Subquery's
permalink: db/mysql-server/subquerys/
published: true
tags     :
---

Een subquery is een query in een query.

{% highlight sql %}
-- Eenvoudige subquery
SELECT {kolom(mem)}
FROM {tabel}
WHERE
    {kolom} {OPERATOR} {subquery};
{% endhighlight %}

Bijvoorbeeld:

{% highlight bash %}
mysql> SELECT *
    -> FROM emails
    -> WHERE
    ->    id = (SELECT user_id FROM users WHERE first_name = 'Olivier' LIMIT 1);
{% endhighlight %}