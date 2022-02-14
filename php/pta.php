<?php
$myfile = fopen("../log/pta.txt", "r") or die("ERROR!");
$txt = fgets($myfile);
fclose($myfile);
$myfile = fopen("../log/pta.txt", "w") or die("ERROR!");
fwrite($myfile, 1+(int)$txt);
fclose($myfile);
?>