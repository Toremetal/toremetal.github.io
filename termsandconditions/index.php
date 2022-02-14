<?php
$filename = '/log/e.t';
if (!file_exists($filename)) {
    $filename = '../log/e.t';
} 
if (file_exists($filename)) {
    $myfile = fopen($filename, "a");
    date_default_timezone_set("America/Los_Angeles");
    $txt = "Date: " . date("Y/m/d") . ", Time: " . date("h:i:sa") . "\nURL: {$_SERVER['HTTP_HOST']}" . "\nRef: {$_SERVER['REQUEST_URI']}" . "\n______________ \n";
    fwrite($myfile, $txt);
    fclose($myfile);
}
header('Location: https://www.toremetal.com/termsandconditions');
?>