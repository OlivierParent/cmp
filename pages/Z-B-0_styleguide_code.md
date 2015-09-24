---
layout   : page
title    : "Code"
permalink: styleguide/code/
published: true
tags     : styleguide
---

Code
----

### CSS

{% highlight css linenos %}
body {
    font-family: sans-serif;
}
{% endhighlight %}

### HTML

{% highlight html linenos %}
<!DOCTYPE html>
<html>
<head>
    <title>html</title>
    <link rel="stylesheet" href="main.css">
</head>
</html>
{% endhighlight %}

### Ini

{% highlight ini linenos %}
variables_order = "EGPCS"
{% endhighlight %}

### JavaScript

{% highlight js linenos %}
function logger(message) {
    console.log(message);
}
{% endhighlight %}

### PHP

{% highlight php linenos %}
<?php

phpinfo();
{% endhighlight %}

### SASS

{% highlight scss linenos %}
html {
    body {
        .home {
            color: red;
        }
    }
}
{% endhighlight %}

### TypeScript

{% highlight ts linenos %}
class {
    
}
{% endhighlight %}

### Twig

{% highlight jinja linenos %}{% raw %}
{% extends "layout.html" %}
{% block body %}
  <ul>
  {% for user in users %}
    <li><a href="{{ user.url }}">{{ user.username }}</a></li>
  {% endfor %}
  </ul>
{% endblock %}
{% endraw %}{% endhighlight %}

### YAML

{% highlight yaml linenos %}
 - X
   - X
{% endhighlight %}

---

Command Line
------------

### Bash

{% highlight bash %}
$ ls
{% endhighlight %}

### Batch

{% highlight bat %}
C:\> dir
{% endhighlight %}

### PowerShell

{% highlight powershell %}
PS> ls
{% endhighlight %}

Files
-----

>```
> nmdad3.arteveldehogeschool.local/
> ├── app/
> ├── docs/
> |   ├── academische_poster.pdf
> |   ├── checklist.md
> |   ├── presentatie.pdf
> |   ├── productiedossier.pdf
> |   └── timesheet.xslx
> ├── www/
> └── README.md
>```
{:.highlight}