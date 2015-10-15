---
layout   : page
title    : Operatoren
permalink: php/syntaxis/operatoren/
published: true
tags     :
---

Operatorsoorten
---------------

Om bewerkingen uit te voeren op **operanden** (waarden) gebruikt men **operatoren**.

In PHP kunnen de operatoren opgedeeld worden volgens het aantal operanden:

 - **Unaire** operatoren: met 1 operand;
 - **Binaire**[^1] operatoren: met 2 operanden;
 - **Ternaire** operator: met 3 operanden.

### Unaire operatoren

{% highlight php %}
<!-- basis/operator/unair.php -->
{% include_relative _code/php/basis/operator/unair.php %}
{% endhighlight %}

> ##### **Tip** *:bulb:*{:.pull-left .m-r}
> ---
> Een pre-operator is (in PHP) sneller dan een post-operator. Gebruik daarom bij voorkeur de pre-operator.
{:.alert .alert-info}

### Binaire operatoren

{% highlight php %}
<!-- basis/operator/binair.php -->
{% include_relative _code/php/basis/operator/binair.php %}
{% endhighlight %}

### Ternaire operator

De enige ternaire operator is de conditionele operator. Deze zeer vaak toegepaste operator is eigenlijk een verkorte versie van een `if` … `else` … lus.

{% highlight php %}
<!-- basis/operator/ternair.php -->
{% include_relative _code/php/basis/operator/ternair.php %}
{% endhighlight %}

Operatorprioriteit
------------------

In onderstaande tabel zijn de operatoren opgelijst volgens prioriteit. De eerste rijen hebben voorrang op de volgende rijen.

| Evaluatierichting | Operatoren                 | Beschrijving                                               | Operanden |
|:-----------------:|:---------------------------|:-----------------------------------------------------------|:---------:|
|         —         | `new`, `clone`             | objecten maken en klonen                                   |     1     |
|         ←         | `**`                       | exponent                                                   |     2     |
|         —         | `++`, `--`                 | increment, decrement                                       |     1     |
|         —         | `~`, `-`, `@`, `(type)`    | bitsgewijze not, negatief, foutonderdrukking, cast         |     1     |
|         —         | `instanceOf`               | objecten                                                   |     1     |
|         ←         | `!`                        | logische `NOT`                                             |     1     |
|         →         | `*`, `/`, `%`              | product, quotiënt, rest                                    |     2     |
|         →         | `+`, `-`, `.`              | som, verschil, concatenatie                                |     2     | 
|         →         | `<<`, `>>`                 | bitsgewijze shift                                          |     2     | 
|         —         | `<`, `<=`, `>`, `>=`, `<>` | vergelijking                                               |     2     | 
|         —         | `==`, `!=`, `===`, `!==`   | vergelijking: gelijk, niet-gelijk, identiek, niet-identiek |     2     | 
|         →         | `&`                        | bitsgewijze `AND`                                          |     2     | 
|         →         | `^`                        | bitsgewijze `XOR`                                          |     2     | 
|         →         | `|`                        | bitsgewijze `OR`                                           |     2     | 
|         →         | `&&`                       | logische `AND`                                             |     2     | 
|         →         | `||`                       | logische `OR`                                              |     2     | 
|         →         | `? :`                      | conditionele operator                                      |     3     | 
|         ←         | `=`, `+=`, `-=`, enz.      | toekenning, samengestelde toekenningen                     |     2     | 
|         →         | `and`                      | logische `AND`                                             |     2     | 
|         →         | `xor`                      | logische `XOR`                                             |     2     | 
|         →         | `or`                       | logische `OR`                                              |     2     |
{:.table .table-striped}

> ##### Zie ook *:books:*{:.pull-left .m-r}
> ---
> - [PHP Manual / Language Reference / Operators](http://php.net/manual/en/language.operators.precedence.php)
{:.card .card-block}


{% comment %}
<!-- ⚓ Voetnoten -->
{% endcomment %}
[^1]: **Opmerking:** Niet verwarren met bitsgewijs! Binair slaat hier op het aantal (2) operanden en niet het datatype ervan.

