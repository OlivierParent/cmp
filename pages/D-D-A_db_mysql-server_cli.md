---
layout    : page
title     : CLI
title_long: MySQL Server CLI
permalink : db/mysql-server/cli/
published : true
tags      :
---

Aanmelden
---------

Aanmelden op de MySQL Server vanaf de **CLI** doe je met de [MySQL Command-Line Tool](http://dev.mysql.com/doc/refman/5.6/en/mysql.html) `mysql`.

Hulp over het gebruik vraag je met de optie `--help` of `-?`.

{% highlight bash %}
vagrant@homestead$ mysql -?
{% endhighlight %}

Je kan de versie van MySQL controleren met de optie `--version`.

{% highlight bash %}
vagrant@homestead$ mysql --version
{% endhighlight %}

Laten we bijvoorbeeld aanmelden op de MySQL Server van Laravel Homestead. De databasegebruiker is `homestead` en het wachtwoord is `secret`.

> ##### **Opmerking** *:point_up:*{:.pull-left .m-r}
> ---
> Je wordt gevraagd om het wachtwoord in te typen, maar de cursor zal niet bewegen. Deze beveiligingsinstelling voorkomt dat de lengte van het wachtwoord zichtbaar is.
{:.alert .alert-info}

> ##### **Opgelet** *:warning:*{:.pull-left .m-r}
> ---
> Een <kbd>Backspace</kbd> wordt als nieuw teken beschouwd!
{:.alert .alert-warning}

{% highlight bash %}
vagrant@homestead$ mysql --user=homestead --password
password: _
mysql>
{% endhighlight %}

Je kan ook onmiddellijk inloggen met het wachtwoord. 

{% highlight bash %}
vagrant@homestead$ mysql --user=homestead --password=secret
{% endhighlight %}

Er bestaat ook een **verkorte vorm** van de opties:

{% highlight bash %}
vagrant@homestead$ mysql -uhomestead -psecret
{% endhighlight %}

> ##### **Opgelet** *:warning:*{:.pull-left .m-r}
> ---
> Als je het wachtwoord onmiddellijk invult, zal dit zichtbaar zijn met de shellopdracht `history`. Dit houdt een behoorlijk **veiligheidsrisico** in! Gebruik deze manier daarom **nooit** op een productieserver!
{:.alert .alert-warning}

Afmelden
--------

Afmelden doe je met `exit`:

{% highlight bash %}
mysql> exit
Bye
vagrant@homestead$ _
{% endhighlight %}

Shellopdrachten aanroepen 
-------------------------

Je kan met `\!` vanuit de MySQL Command-Line Tool shellopdrachten aanroepen. Om bijvoorbeeld het scherm te wissen met de shellopdracht `clear`:

{% highlight bash %}
mysql> \! clear
{% endhighlight %}

Dit heeft hetzelfde effect als:

{% highlight bash %}
vagrant@homestead$ clear
{% endhighlight %}


{% comment %}
<!-- ⚓ Afkortingen -->
{% endcomment %}
*[CLI]:                     Command-Line Interface
