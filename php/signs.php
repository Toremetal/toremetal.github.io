<?php
$myfile = fopen("../log/signs.txt", "r") or die("ERROR!");
$txt = fgets($myfile);
fclose($myfile);
$myfile = fopen("../log/signs.txt", "w") or die("ERROR!");
fwrite($myfile, 1+(int)$txt);
fclose($myfile);
?>