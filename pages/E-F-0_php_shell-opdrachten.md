---
layout    : page
title     : Shell-opdrachten
permalink : php/shell-opdrachten/
published : true
tags      :
---

Het is mogelijk om opdrachten aan het besturingssysteem te geven via de functie `shell_exec()` en het resultaat op te vangen. Het spreekt voor zich dat de opdrachten zelf afhankelijk zijn van het besturingssysteem van de server.

Windows
-------

{% highlight php %}
<!-- shell/win.php -->
{% include_relative _code/php/shell/win.php %}
{% endhighlight %}

Linux, Unix & Mac OS X
----------------------

{% highlight php %}
<!-- shell/nix.php -->
{% include_relative _code/php/shell/nix.php %}
{% endhighlight %}
