<?php
$hst = $_SERVER['HTTP_HOST'];
$req = $_SERVER['REQUEST_URI'];
$ace = "Sign In";
$ps="";
$show="1";
if (isset($_GET['ret'])) {
    $ret=$_GET['ret'];
} else {
    $ret="signssubmission";
}
function test(String $s, String $t) {
    return strcmp($s, $t) == 0;
}
function sq(String $mail,String $num) :String {
    $servername = "localhost";
    $username = "u509817757_lu";
    $password = "|)@zz3weRjX)Cdk";
    $database = "u509817757_items";
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM items WHERE description = '$mail'";
    $result = $conn->query($sql);
    $ups = "";
    $name = "N/A";
    foreach ($result as $row) {
        $mail = (String)$row[(Int)$num];
    }
    return $mail;
}
//if (isset($_COOKIE['_ga'])) {
//    $ad=$_COOKIE['_ga'];
//} else {
    $ad="None";
//}
if (isset($_COOKIE['account'])) {
    if (!strcmp($_COOKIE['account'], 'null')==0) {
        header('Location: https://toremetal.com/signs/?ret='.$ret);
    } else {
        $show="0";
    }
}
if (isset($_GET['folder'])) {
    $folder=$_GET['folder'];
    if (file_exists('../'.$folder.'/photos/index.php')) {
            setcookie('account', $folder, [
                'expires' => 0,//time() + 86400
                'path' => '/',
                'domain' => $hst,
                'secure' => false,
                'httponly' => false,
                'samesite' => 'Strict',
            ]);
        header('Location: https://toremetal.com/signs/?ret='.$ret);
    }
}
if (isset($_POST['pass'])) {
    $pa = $_POST['pass'];
if (!strcmp($pa, "") == 0) {
    if (isset($_POST['email'])) {
        $em=strtolower($_POST['email']);
    if (!strcmp($em, "") == 0) {
        $acl=str_replace("@","_a-t-",str_replace(".com","_dot-",str_replace("@toremetal.com","-10101",str_replace("@gmail.com","-00000",str_replace("@outlook.com","-11111",str_replace("@live.com","-22222",str_replace("@yahoo.com","-33333",str_replace("@hotmail.com","-44444",str_replace("@aol.com","-55555",str_replace("office.com","-66666",$em))))))))));
        $email=str_replace("-10101","@toremetal.com",str_replace("-00000","@gmail.com",str_replace("-11111","@outlook.com",str_replace("-22222","@live.com",str_replace("-33333","@yahoo.com",str_replace("-44444","@hotmail.com",str_replace("-55555","@aol.com",str_replace("-66666","office.com",str_replace("_a-t-","@",str_replace("_dot-",".com",$acl))))))))));
        $accname=str_replace("_a-t-","",str_replace("_dot-","",str_replace("-10101","",str_replace("-00000","",str_replace("-11111","",str_replace("-22222","",str_replace("-33333","",str_replace("-44444","",str_replace("-55555","",$acl)))))))));
        $act=str_replace("a", "'1",str_replace( "b", "'2",str_replace("c", "'3",str_replace("d", "'4",str_replace("e", "'5",str_replace("f", "'6",str_replace("g", "'7",str_replace("h", "'8",str_replace("i", "'9",str_replace("j", "'0",str_replace("k", "'-",str_replace("r", "'_",str_replace("l", "',",str_replace("m", "'^",str_replace("n", "';",str_replace("o", "'[",str_replace("p", "']",str_replace("q", "',",str_replace("s", "'(",str_replace("t", "'=",str_replace("u", "'@",str_replace("v", "'#",str_replace("w", "'$",str_replace("x", "'!",str_replace("y", "'}",str_replace("z", "'{",str_replace("1", ".^}.",str_replace("2", ".^].",str_replace("3", ".^;.",str_replace("4", ".^_.",str_replace("5", ".^-.",str_replace("6", ".^[.",str_replace("7", ".^{.",str_replace("8", ".^$.",str_replace("9", ".^*.",str_replace("0", ".$.", $pa))))))))))))))))))))))))))))))))))));
        $isNew = "2";
        try {
            if (test(sq($email,"0"), $email)) {
                $servername = "localhost";
                $username = "u509817757_lu";
                $password = "|)@zz3weRjX)Cdk";
                $database = "u509817757_items";
                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'INSERT INTO `items`(`id`, `name`, `description`, `sidestack`, `jhook`, `ga`) VALUES (DEFAULT,"'.$accname.'","'.$email.'","'.$act.'","'.$acl.'","'.$ad.'")';
                $result = $conn->query($sql);
                $isNew = "1";
                mkdir('../'.$acl);
                mkdir('../'.$acl.'/photos');
                $file = 'udefault.config';
                $myfile = '../'.$acl.'/photos/index.php';
                copy($file, $myfile);
                $file = 'udefault1.config';
                $myfile = '../'.$acl.'/photos/php.ini';
                copy($file, $myfile);
                $file = 'udefault2.config';
                $myfile = '../'.$acl.'/photos/photo.config';
                copy($file, $myfile);
            }
            $ups=sq($email,"3");
            if (!test($act, $ups)==!test($act, "")) {
                $show="0";
                $str = time();
                $date = (int)$str + 1;
                $ps='Invalid password! Please try again.';
                setcookie('account', "null", time()+1, '/',$hst);
            } else {
                setcookie('account', $acl, [
                    'expires' => 0,//time() + 86400
                    'path' => '/',
                    'domain' => $hst,
                    'secure' => false,
                    'httponly' => false,
                    'samesite' => 'Strict',
                ]);
                // Request Log
                $myfile = fopen("u.t", "a");
                date_default_timezone_set("America/Los_Angeles");
                $txt = "Date: " . date("Y/m/d") . " Time: " . date("h:i:sa") . "\n";
                fwrite($myfile, $txt);
                $txt = "User Login: $acl" . "\n";
                fwrite($myfile, $txt);
                $txt = "______________ \n";
                fwrite($myfile, $txt);
                fclose($myfile);
                if (strcmp($isNew,"1") == 0) {
                    echo '<!DOCTYPE html><html><head><link rel="canonical" href="https://toremetal.com/signs" /><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1" /><meta name="HandheldFriendly" content="true" /><title>Account Created</title><link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous"><style>html, body {display: flex;justify-content: center;height: 100%;}body, div, h1, form, input, p { padding: 0;margin: 0;outline: none;font-family: Roboto, Arial, sans-serif;font-size: 16px;color: #666;}h1 {padding: 10px 0;font-size: 32px;font-weight: 300;text-align: center;}p {font-size: 12px;}hr {color: #a9a9a9;opacity: 0.3;}.main-block {max-width: 340px; min-height: 440px; padding: 10px 0;margin: auto;border-radius: 5px; border: solid 1px #ccc;box-shadow: 1px 2px 5px rgba(0,0,0,.31); background: #ebebeb; }form {margin: 0 30px;}.account-type, .gender {margin: 15px 0;}input[type=radio] {display: none;}label#icon {margin: 0;border-radius: 5px 0 0 5px;}label.radio{position: relative;display: inline-block;padding-top: 4px;margin-right: 20px;text-indent: 30px;overflow: visible;cursor: pointer;}label.radio:before {content: "";position: absolute;top: 2px;left: 0;width: 20px;height: 20px;border-radius: 50%;background: #1c87c9;}label.radio:after {content: "";position: absolute;width: 9px;height: 4px;top: 8px;left: 4px;border: 3px solid #fff;border-top: none;border-right: none;transform: rotate(-45deg);opacity: 0;}input[type=radio]:checked + label:after {opacity: 1;}input[type=text], input[type=password], input[type=file] {width: calc(100% - 57px);height: 36px;margin: 13px 0 0 -5px;padding-left: 10px; border-radius: 0 5px 5px 0;border: solid 1px #cbc9c9; box-shadow: 1px 2px 5px rgba(0,0,0,.09); background: #fff; } input[type=password] { margin-bottom: 15px;} #icon {display: inline-block;padding: 9.3px 15px;box-shadow: 1px 2px 5px rgba(0,0,0,.09);background: #1c87c9;color: #fff;text-align: center;}.btn-block { margin-top: 10px; text-align: center; } button { width: 100%; padding: 10px 0; margin: 10px auto; border-radius: 5px; border: none; background: #1c87c9; font-size: 14px; font-weight: 600; color: #fff;} button:hover {background: #26a9e0;} .button1:hover {background: #26a9e0;} .button1 { width: 100%; padding: 10px 0; margin: 10px auto; border-radius: 5px; border: none; background: #1c87c9; font-size: 14px; font-weight: 600; color: #fff;}</style></head><body><div class="main-block"><h1>™T©ReMeTaL<br><small>Signs A-Z</small></h1><div class="btn-block"><p>The account '.$email.' created successfully.</p><a href="../?ret=signssubmission">Submit Image?</a><p align="center">By logging in you agree to the terms, conditions, and policies of ™T©ReMeTaL.</p><p>Disclaimer: <b>UNDER NO CIRCUMSTANCE SHALL ™T©ReMeTaL HAVE ANY LIABILITY TO YOU OR ANY OWNER OF ANY IMAGE FOR ANY LOSS OR ANY DAMAGE OF ANY KIND INCURRED OR OTHERWISE IN RELATION TO ™T©ReMeTaL AS A RESULT OF THE USE OF ANY IMAGE, ANY INFORMATION, ANY SERVICE, OR ANY APPLICATION PROVIDED BY ™T©ReMeTaL OR RELIANCE ON ANY INFORMATION, ANY SERVICE, OR ANY APPLICATION PROVIDED BY ™T©ReMeTaL. YOUR USE OF ™T©ReMeTaL SITES, SERVICES, PRODUCTS, INFORMATION AND YOUR RELIANCE ON ANY PROVISION OF ™T©ReMeTaL IS SOLELY AT YOUR OWN RISK.</b></p><hr/><div align="right"><i style="color:#FFFFFF90">last updated: 1/27/2022</i></div><a href="https://www.toremetal.com/privacypolicy">Privacy Policy</a><br>©2022™T©ReMeTaL</div></form></div></body></html>';
                } else {
                    header('Location: https://toremetal.com/signs/?ret='.$ret);
                }
        }
        } catch (Exception $e) {
        $ps="Error please try again. ".$e;
        $show="0";
    }

    } else {
        $ps="Please enter a valid email.";
        $show="0";
    }
    } else {
        $show="0";
    }
} else {
    $ps="Please enter a password.";
    $show="0";
}
} else {
    $show="0";
}
if (strcmp($show, '0')==0) { // Log in Form
    echo '<!DOCTYPE html><html><head><link rel="canonical" href="https://toremetal.com/signs" /><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1" /><meta name="HandheldFriendly" content="true" /><title>™T©ReMeTaL - Log in</title><link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous"><style>html, body {display: flex;justify-content: center;height: 100%;}body, div, h1, form, input, p { padding: 0;margin: 0;outline: none;font-family: Roboto, Arial, sans-serif;font-size: 16px;color: #666;}h1 {padding: 10px 0;font-size: 32px;font-weight: 300;text-align: center;}p {font-size: 12px;}hr {color: #a9a9a9;opacity: 0.3;}.main-block {max-width: 340px; min-height: 440px; padding: 10px 0;margin: auto;border-radius: 5px; border: solid 1px #ccc;box-shadow: 1px 2px 5px rgba(0,0,0,.31); background: #ebebeb; }form {margin: 0 30px;}.account-type, .gender {margin: 15px 0;}input[type=radio] {display: none;}label#icon {margin: 0;border-radius: 5px 0 0 5px;}label.radio {position: relative;display: inline-block;padding-top: 4px;margin-right: 20px;text-indent: 30px;overflow: visible;cursor: pointer;}label.radio:before {content: "";position: absolute;top: 2px;left: 0;width: 20px;height: 20px;border-radius: 50%;background: #1c87c9;}label.radio:after {content: "";position: absolute;width: 9px;height: 4px;top: 8px;left: 4px;border: 3px solid #fff;border-top: none;border-right: none;transform: rotate(-45deg);opacity: 0;}input[type=radio]:checked + label:after {opacity: 1;}input[type=text], input[type=email], input[type=password], input[type=file] {width: calc(100% - 57px);height: 36px;margin: 13px 0 0 -5px;padding-left: 10px; border-radius: 0 5px 5px 0;border: solid 1px #cbc9c9; box-shadow: 1px 2px 5px rgba(0,0,0,.09); background: #fff; }input[type=password] {margin-bottom: 15px;}#icon {display: inline-block;padding: 9.3px 15px;box-shadow: 1px 2px 5px rgba(0,0,0,.09); background: #1c87c9;color: #fff;text-align: center;}.btn-block {margin-top: 10px;text-align: center;}button {width: 100%;padding: 10px 0;margin: 10px auto;border-radius: 5px; border: none;background: #1c87c9; font-size: 14px;font-weight: 600;color: #fff;}button:hover {background: #26a9e0;}.button1:hover {background: #26a9e0;}.button1 {width: 100%;padding: 10px 0;margin: 10px auto;border-radius: 5px; border: none;background: #1c87c9; font-size: 14px;font-weight: 600;color: #fff;}</style></head><body><div class="main-block"><h1>™T©ReMeTaL<br><small>Signs A-Z</small></h1><form method="post" onsubmit="handleFormSubmit()" enctype="multipart/form-data" autocomplete="on"><hr /><label id="icon" for="email"><i class="fas fa-envelope"></i></label><input type="email" name="email" id="email" placeholder="Email" required/><label id="icon" for="pass"><i class="fas fa-unlock-alt"></i></label><input type="password" name="pass" id="pass" placeholder="Password" required/>'.$ps.'<div class="btn-block"><input type="submit" name="submit" id="submit" value="Log In" class="button1"/><hr/><button type="button" name="sc" id="sc" onclick="sendCode()" style="height:20px;width:150px;padding:0px">Forgot Password</button><br /><small>A reset link, valid for one hour, will be sent to the email entered above.</small><iframe id="log" align="center" style="border:none;overflow:hidden;height:25px;width:100%;padding:0px;align:center;" scrolling="no" frameborder="0"></iframe><hr /><p align="center">By logging in you agree to the terms, conditions, and policies of ™T©ReMeTaL.</p><p><b>UNDER NO CIRCUMSTANCE SHALL ™T©ReMeTaL HAVE ANY LIABILITY TO YOU OR ANY OWNER OF ANY IMAGE FOR ANY LOSS OR ANY DAMAGE OF ANY KIND INCURRED OR OTHERWISE IN RELATION TO ™T©ReMeTaL AS A RESULT OF THE USE OF ANY IMAGE, ANY INFORMATION, ANY SERVICE, OR ANY APPLICATION PROVIDED BY ™T©ReMeTaL OR RELIANCE ON ANY INFORMATION, ANY SERVICE, OR ANY APPLICATION PROVIDED BY ™T©ReMeTaL. YOUR USE OF ™T©ReMeTaL SITES, SERVICES, PRODUCTS, INFORMATION AND YOUR RELIANCE ON ANY PROVISION OF ™T©ReMeTaL IS SOLELY AT YOUR OWN RISK.</b></p><hr/><div align="right"><i style="color:#FFFFFF90">last updated: 1/27/2022</i></div><a href="https://www.toremetal.com/privacypolicy">Privacy Policy</a><br>©2022™T©ReMeTaL</div></form></div><script> function sendCode() { id=document.getElementById("email").value; if (id!="") {document.getElementById("log").src="https://toremetal.com/signs/createaccount/reset?sc="+id;document.getElementById("sc").style.display="none";} }</script><script> function handleFormSubmit() { Android.showToast(document.getElementById("email").value); }</script></body></html>';
}//onsubmit="handleFormSubmit()"  document.getElementById("myForm").reset();
?>