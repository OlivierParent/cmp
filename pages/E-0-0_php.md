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

[*&nbsp;*{:.fa .fa-download}Artevelde Laravel Homestead][artestead]{:.btn .btn-{{ site.colour }}}

PHP-informatie
--------------

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [`phpinfo()`](http://php.net/phpinfo)
{:.card .card-block}

### Map maken

> ##### Mappen & Bestanden *:open_file_folder:*{:.pull-left .m-r}
> ---
>```
> cmp.arteveldehogeschool.local/
> └── php/
>     └── info/
>         └── index.php
>```
{:.card .card-block}

Maak de map `~/Code/cmp.arteveldehogeschool.local/php/info/` aan.

{% highlight bash %}
$ mkdir -p ~/Code/cmp.arteveldehogeschool.local/php/info/
$ cd ~/Code/cmp.arteveldehogeschool.local/php/info/
$ touch index.php
{% endhighlight %}

Om informatie over een specifieke PHP-installatie op te vragen, gebruik je de functie `phpinfo()`. Deze functie maakt een HTML-pagina aan met informatie over o.m. de versie van PHP en welke modules er geïnstalleerd zijn.

In het bestand `index.php` plaats je onderstaande code.

{% highlight php %}
{% include_relative _code/php/info/index.php %}
{% endhighlight %}

Ingebouwde server
-----------------

In de map waar de code staat, kan je de ingebouwde PHP-server (Een HTTP-server die PHP kan verwerken) starten.

### Server starten

{% highlight bash %}
$ cd ~/Code/cmp.arteveldehogeschool.local/php/
$ php -S localhost:8000
{% endhighlight %}

De pagina `index.php` uit het voorgaande punt is dan beschikbaar via [http://localhost:8000/info/](http://localhost:8000/info/) (`index.php` hoeft er niet bij omdat dit de standaardpagina is). 

### Server stoppen

Met <kbd>Ctrl</kbd>+<kbd>C</kbd> stop je de server.

Read-Eval-Print Loop
--------------------

[PsySH][psysh] *(Psy Shell)* is een REPL voor PHP. De getypte code wordt ingelezen *(Read),* uitgevoerd *(Eval)* en tenslotte wordt het resultaat op het scherm getoond *(Print).* En dit telkens opnieuw in een lus *(Loop).* 

### Installatie

{% highlight bash %}
$ composer g require psy/psysh
{% endhighlight %}

### Gebruik

{% highlight bash %}
$ psysh
Psy Shell
>>> echo 'Hallo Wereld!'
Hallo Wereld!
=> null
>>> exit
Exit: Goodbye.
$ _
{% endhighlight %}


{% comment %}
<!-- ⚓ Afkortingen -->
{% endcomment %}
*[REPL]:                    Read-Eval-Print Loop

{% comment %}
<!-- ⚓ Hyperlinks -->
{% endcomment %}
[artestead]:                http://www.olivierparent.be/artestead/installation/
[psysh]:                    http://psysh.org