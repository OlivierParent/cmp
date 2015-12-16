---
layout    : page
title     : Abstract
title_long: Abstracte Klassen en Methoden
permalink : php/oop/abstracte-klassen-en-methoden/
published : true
tags      :
---

Een abstracte klasse is een klasse waarvan geen instantie gemaakt kan worden. Een abstracte methode is een methode die wel gedeclareerd is, maar niet geïmplementeerd. Deze methoden kunnen niet bestaan in een instantie, zodat ook de klasse als abstract gedeclareerd moet worden.

In een abstracte klasse zijn alle geïmplementeerd methoden de facto statische methoden, omdat ze enkel op klasseniveau kunnen bestaan. In afgeleide klassen is dit enkel het geval als ze effectief statisch gedeclareerd worden in de abstracte klasse.

Abstracte klassen zijn van nut bij overerving, een child-klassen **moet** namelijk de abstracte methodes implementeren.

{% highlight php %}
oop/abstracte_klasse.php
{% include_relative _code/php/oop/abstracte_klasse.php %}
{% endhighlight %}
