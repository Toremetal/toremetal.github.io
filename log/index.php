<?php
if (isset($_POST['error'])) {
    $err=$_POST['error'];
    if (isset($_POST['app'])) {
        $app=$_POST['app']."-error.t";
    } else {
        $app='apperror.t';
    }
    $filename = $app;
    $myfile = fopen($filename, "a");
    $txt = "Date: " . date("Y/m/d") . ",Time: " . date("h:i:sa") . ",Error: {$err}" . "\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    echo 'Logged';
} else if (strcmp(substr($_SERVER['REQUEST_URI'], 0, 12), "/log/?error=") == 0) {
    $err=$_GET['error'];
    if (isset($_GET['app'])) {
        $app=$_GET['app']."-error.t";
    } else {
        $app='apperror.t';
    }
    $filename = $app;
    if (file_exists($filename)) {
    $myfile = fopen($filename, "a");
    $txt = "Date: " . date("Y/m/d") . ",Time: " . date("h:i:sa") . ",Error: {$err}" . "\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    } else {
    $myfile = fopen($filename, "w");
    $txt = "Date: " . date("Y/m/d") . ",Time: " . date("h:i:sa") . ",Error: {$err}" . "\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    }
    echo 'Logged';
} else {
    header('Location: https://toremetal.com/'); 
}
?>