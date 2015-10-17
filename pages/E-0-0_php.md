---
layout    : page
title     : PHP
title_long: "PHP: Hypertext Processor 5.6"
permalink : php/
published : true
tags      :
---

Ontwikkelingsomgeving
---------------------

Installeer:

[[*&nbsp;*{:.fa .fa-download}Artevelde Laravel Homestead][artestead]{:.btn .btn-{{ site.colour }}}

PHP-informatie
--------------

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [`phpinfo()`](http://php.net/phpinfo)
{:.card .card-block}

Om informatie over een specifieke PHP-installatie op te vragen, gebruik je de functie `phpinfo()`. Deze functie maakt een HTML-pagina aan met informatie over o.m. de versie van PHP en welke modules er geïnstalleerd zijn.

{% highlight php %}
<!-- info/index.php -->
{% include_relative _code/php/info/index.php %}
{% endhighlight %}


{% comment %}
<!-- ⚓ Hyperlinks -->
{% endcomment %}
[artestead]:                http://www.olivierparent.be/artestead/installation/