<?php
$myfile = fopen("../log/posa.txt", "r") or die("ERROR!");
$txt = fgets($myfile);
fclose($myfile);
$myfile = fopen("../log/posa.txt", "w") or die("ERROR!");
fwrite($myfile, 1+(int)$txt);
fclose($myfile);
?>