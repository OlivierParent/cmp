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

shell_win.php

<?php
$res = shell_exec('dir'); // Lijst alle bestanden op
echo "<pre>{$res}";
 
Linux, Unix & Mac OS X
----------------------

shell_nix.php

<?php
$res = shell_exec('ls -l'); // Lijst alle bestanden op
echo "<pre>{$res}";
