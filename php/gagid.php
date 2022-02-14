<?php
$cookie_name = "_ga";
if(isset($_COOKIE[$cookie_name])) {
    $user_ID = $_COOKIE[$cookie_name];
    //echo $user_NID;
} else {
    $cookie_name = "cookieControl";
    if(isset($_COOKIE[$cookie_name])) {
        $user_ID = $_COOKIE[$cookie_name];
    } else {
        $user_ID = 'TM1.1.' . 1000*(int)$session . '.' . 1000*(int)$session;
        //setcookie($cookie_name, $user_ID, time()+86400*30, '/');
    //setcookie($cookie_name, $user_ID, time()+86400*365*2, '/');
    }
}

$cookie_name = "_gid";
if(!isset($_COOKIE[$cookie_name])) {
    $sessionID = 'TM1.' . $session . '.' . $session;
    //echo $sessionID;
    //$cookie_name = "sessionID";
    //setcookie($cookie_name, $sessionID,'0','/'); // 0 for session cookie
} else {
    $sessionID = $_COOKIE[$cookie_name];
}
//header('Location: home/');
?>