---
layout   : page
title    : Sessies
permalink: php/web/sessies/
published: true
tags     :
---

Om gegevens gedurende een browsersessie op te slaan worden sessievariabelen gebruikt. Om deze te kunnen gebruiken moet een nieuwe sessie gestart worden of een oude verdergezet. Dat kan met de functie `session_start()`, waarna alle sessievariabelen opgeslagen kunnen worden in de array `$_SESSION` die ook een superglobal is.

Een sessie onmiddellijk leegmaken moet[^1] met `$_SESSION = []` of als de sessie pas na het beëindigen van het script leegmaken kan met `session_destroy()` (`$_SESSION` blijft ondertussen bestaan zodat dit gebruikt kan worden voor bijvoorbeeld een gepersonaliseerde pagina met 'U bent nu afgemeld').

{% highlight php %}
web/formulier/sessies.php
{% include_relative _code/php/web/formulier/sessies.php %}
{% endhighlight %}


{% comment %}
<!-- ⚓ Voetnoten -->
{% endcomment %}
[^1]: `session_unset()` mag niet meer gebruikt worden met de superglobal `$_SESSION`. Wat zeker nooit gebruikt mag worden is `unset($_SESSION)`, maar `unset()` mag wel gebruikt worden op gegevens in die array.