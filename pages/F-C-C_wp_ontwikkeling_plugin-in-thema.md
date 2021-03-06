---
layout    : page
title     : Plugin in thema
title_long: Plugin in thema gebruiken
permalink : wp/ontwikkeling/plugin-in-thema/
published : true
tags      :
---

Met de plugin hebben we 440 grafische termen aan de database toegevoegd. Deze grafische termen kunnen we nu gaan tonen op speciale pagina's.

Eerst moeten we een sjablonen maken voor dergelijke pagina's:

 - Een sjabloon voor een overzichtspagina: `page-graphic_terms.php`
 - Een sjabloon voor een detailpagina: `single-graphic_term.php`

> ##### Mappen & Bestanden :open_file_folder:
> ---
>```
> cmp.local/
> ├── www/
> │   ├── data/
> │   ├── scripts/
> │   └── wordpress/
> │       └── wp-content/
> │           ├── plugins/
> │           │   └── arteveldehogeschool_lexicon/
> │           └── themes/
> │               └── arteveldehogeschool/
> │                   ├── page-graphic_terms.php
> │                   └── single-graphic_term.php
> └── README.md
>```
{:.card .card-block}

{% highlight php %}
page-graphic_terms.php
{% include_relative _code/wp/ontwikkeling/plugin-in-thema/page-graphic_terms.php %}
{% endhighlight %}

{% highlight php %}
{% include_relative _code/wp/ontwikkeling/plugin-in-thema/single-graphic_term.php %}
{% endhighlight %}

{% comment %}
<!-- ⚓ Afkortingen -->
{% endcomment %}
*[WP]:                      WordPress