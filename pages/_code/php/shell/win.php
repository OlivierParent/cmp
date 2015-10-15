<?php
$res = shell_exec('dir');  // Lijst alle bestanden op: Windows
echo "<pre>{$res}";
