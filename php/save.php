<!DOCTYPE php>
<?php
$filename = '../vc.txt';
if (!file_exists($filename)) {
    $filename = 'vc.txt';
} 
if (file_exists($filename)) {
    $myfile = fopen($filename, "r");
    $session = fgets($myfile);
    fclose($myfile);
}
if(isset($_COOKIE["_ga"])) {
    $ID = $_COOKIE["_ga"];
} else if(isset($_COOKIE["analytics_ga"])) {
    $ID = $_COOKIE["analytics_ga"];
} else {
    $ID = 'TM1.1.' . 1000*(int)$session . '.' . 1000*(int)$session;
}
//if (isset($_SERVER['HTTP_COOKIE'])) {
//    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
//    foreach($cookies as $cookie) {
        //$parts = explode('=', $cookie);
        //$name = trim($parts[0]);
        //$value = trim($parts[1]);
        //$domain = $cookie;
//        $txt = "{$cookie}" . ", ";
//        fwrite($myfile, $txt);
        //if (substr($name, 0, 4) == '_ga_') {};
//    }
//}
$cookie_name = "cookieControlPrefs";
if(isset($_COOKIE[$cookie_name])) {
    $prefs = $_COOKIE[$cookie_name];
} else {
    $prefs = "null";
}

$filename = '/Cookie.log';
if (!file_exists($filename)) {
    $filename = '../../Cookie.log';
} 
if (!file_exists($filename)) {
    $filename = '../Cookie.log';
} 
if (!file_exists($filename)) {
    $filename = '/Cookie.log';
} 
if (!file_exists($filename)) {
    fopen($filename, "w") or die("ERROR!");
    $txt = "DATE, TIME, ID, SID, PREFS, \n";
    fwrite($filename, $txt);
    fclose($filename);
} 

$myfile = fopen($filename, "a") or die("ERROR!");
$txt = "Date: " . date("Y/m/d") . ", ";
fwrite($myfile, $txt);
$txt = "Time: " . date("h:i:sa") . ", ";
fwrite($myfile, $txt);
$txt = "Id: {$ID}" . ", ";
fwrite($myfile, $txt);
$txt = "Sid: {$session}" . ", ";
fwrite($myfile, $txt);
$txt = "Prefs: {$prefs}" . ", ";
fwrite($myfile, $txt);
if (isset($_SERVER['HTTP_COOKIE'])) {
$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $txt = "{$cookie}" . ", ";
        fwrite($myfile, $txt);
    }
}
if (isset($_SERVER['HTTPS_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $txt = "{$cookie}" . ", ";
        fwrite($myfile, $txt);
    }
}
$txt = "\n";
fwrite($myfile, $txt);
fclose($myfile);
?>