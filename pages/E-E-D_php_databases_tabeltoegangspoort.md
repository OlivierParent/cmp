---
layout   : page
title    : Tabeltoegangspoort
permalink: php/databases/tabeltoegangspoort/
published: true
tags     :
---

PHP-code en SQL-code mixen leidt vaak tot onoverzichtelijke code. Soms wordt SQL-code ook door databasespecialisten geschreven in plaats van de webontwikkelaar. Om alles een beetje overzichtelijk te houden bestaan er een aantal ontwerppatronen, waaronder DAO en *Table Data Gateway.*

Onderstaand voorbeeld ligt een beetje in dezelfde lijn. Er is één object per tabel en alle SQL-code is opgeslagen in member-constanten. Alle communicatie van en naar de tabel verloopt via dat ene object. De twee objecten `$db` en `$gebruikers `zijn beiden de enige instantie van hun klasse, zodat ze in principe het **Singleton**-ontwerppatroon[^1] volgen.

{% highlight php %}
databases/tabeltoegangspoort.php
{% include_relative _code/php/databases/tabeltoegangspoort.php %}
{% endhighlight %}


{% comment %}
<!-- ⚓ Voetnoten -->
{% endcomment %} 
[^1]: Code die ervoor moet zorgen dat er nooit meer dan één instantie kan bestaan, is weggelaten uit het voorbeeld. 

{% comment %}
<!-- ⚓ Afkortingen -->
{% endcomment %}
*[DAO]:                     Data Access Object
*[SQL]:                     Structured Query Language