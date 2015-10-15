---
layout   : page
title    : Cookies
permalink: php/web/cookies/
published: true
tags     :
---

Cookies worden met de functie `setcookie()` gezet. Door de cookie opnieuw te zetten, maar dan met de vervaldatum in het verleden, zal de browser de cookie verwijderen.

{% highlight php %}
<!-- web/formulier/cookies.php -->
{% include_relative _code/php/web/formulier/cookies.php %}
{% endhighlight %}

> ##### **Opmerking** *:point_up:*{:.pull-left .m-r}
> ---
> In URL’s moet voor bijvoorbeeld een ampersand HTML-entities (`&`) gebruikt worden, tenzij in de waarde van een get-variabele waarvoor URL-encoding (`%26`) gebruikt moet worden.
{:.alert .alert-info}

> ##### **Opmerking** *:point_up:*{:.pull-left .m-r}
> ---
> Cookies worden met de HTTP-header meegegeven, dit wil zeggen dat `setcookie()` altijd voor een `echo` uitgevoerd moet worden.
{:.alert .alert-info}
