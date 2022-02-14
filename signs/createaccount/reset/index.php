<?php
if (isset($_GET['rc'])) {
    $rc=$_GET['rc'];
    if (isset($_GET['ua'])) {
        $ua = $_GET['ua'];
        if (isset($_GET['pa'])) {
            $pa = $_GET['pa'];
            $ex=time();
            if ($rc>$ex) {
                if (cs(gv($ua, 6),$rc)){
                    up($ua,$pa);
                }
            } else {echo "link Expired.";}
        } else {
        date_default_timezone_set("America/New_York");
        $expi = "expires at ".date("h:i:sa", (int)$rc)."(New_York), ";
        date_default_timezone_set("America/Los_Angeles");
        $expir = date("h:i:sa", (int)$rc)."(Los_Angeles).";
        $expires=$expi.$expir;
        echo '<!DOCTYPE html><html><head><link rel="canonical" href="https://toremetal.com/signs" /><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1" /><meta name="HandheldFriendly" content="true" /><title>™T©ReMeTaL - Reset Password</title><link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous"><style>html, body {display: flex;justify-content: center;height: 100%;}body, div, h1, form, input, p { padding: 0;margin: 0;outline: none;font-family: Roboto, Arial, sans-serif;font-size: 16px;color: #666;}h1 {padding: 10px 0;font-size: 32px;font-weight: 300;text-align: center;}p {font-size: 12px;}hr {color: #a9a9a9;opacity: 0.3;}.main-block {max-width: 340px; min-height: 440px; padding: 10px 0;margin: auto;border-radius: 5px; border: solid 1px #ccc;box-shadow: 1px 2px 5px rgba(0,0,0,.31); background: #ebebeb; }form {margin: 0 30px;}.account-type, .gender {margin: 15px 0;}input[type=radio] {display: none;}label#icon {margin: 0;border-radius: 5px 0 0 5px;}label.radio {position: relative;display: inline-block;padding-top: 4px;margin-right: 20px;text-indent: 30px;overflow: visible;cursor: pointer;}label.radio:before {content: "";position: absolute;top: 2px;left: 0;width: 20px;height: 20px;border-radius: 50%;background: #1c87c9;}label.radio:after {content: "";position: absolute;width: 9px;height: 4px;top: 8px;left: 4px;border: 3px solid #fff;border-top: none;border-right: none;transform: rotate(-45deg);opacity: 0;}input[type=radio]:checked + label:after {opacity: 1;}input[type=text], input[type=password], input[type=file], input[type=email] {width: calc(100% - 57px);height: 36px;margin: 13px 0 0 -5px;padding-left: 10px; border-radius: 0 5px 5px 0;border: solid 1px #cbc9c9; box-shadow: 1px 2px 5px rgba(0,0,0,.09); background: #fff; }input[type=password] {margin-bottom: 15px;}#icon {display: inline-block;padding: 9.3px 15px;box-shadow: 1px 2px 5px rgba(0,0,0,.09); background: #1c87c9;color: #fff;text-align: center;}.btn-block {margin-top: 10px;text-align: center;}button {width: 100%;padding: 10px 0;margin: 10px auto;border-radius: 5px; border: none;background: #1c87c9; font-size: 14px;font-weight: 600;color: #fff;}button:hover {background: #26a9e0;}.button1:hover {background: #26a9e0;}.button1 {width: 100%;padding: 10px 0;margin: 10px auto;border-radius: 5px; border: none;background: #1c87c9; font-size: 14px;font-weight: 600;color: #fff;</style></head><body><div class="main-block" align="center"><h1>™T©ReMeTaL<br><small>Signs A-Z</small></h1><form enctype="multipart/form-data"><hr /><p>Hello we received a request to change your password.<br/>This link '.$expires.'</p><label id="icon" for="pa"><i class="fas fa-unlock-alt"></i></label><input type="password" name="pa" id="pa" placeholder="New Password" required/><div class="btn-block"><button type="button" name="sc" id="sc" onclick="sendCode()" style="height:20px;width:150px;padding:0px">Update Password</button><br /><iframe id="log" align="center" style="border:none;overflow:hidden;height:25px;width:100%;padding:0px;align:center;" scrolling="no" frameborder="0"></iframe><hr /><p align="center">By use of this service you agree to the terms, conditions, and policies of ™T©ReMeTaL.</p><p><b>UNDER NO CIRCUMSTANCE SHALL ™T©ReMeTaL HAVE ANY LIABILITY TO YOU OR ANY OWNER OF ANY IMAGE FOR ANY LOSS OR ANY DAMAGE OF ANY KIND INCURRED OR OTHERWISE IN RELATION TO ™T©ReMeTaL AS A RESULT OF THE USE OF ANY IMAGE, ANY INFORMATION, ANY SERVICE, OR ANY APPLICATION PROVIDED BY ™T©ReMeTaL OR RELIANCE ON ANY INFORMATION, ANY SERVICE, OR ANY APPLICATION PROVIDED BY ™T©ReMeTaL. YOUR USE OF ™T©ReMeTaL SITES, SERVICES, PRODUCTS, INFORMATION AND YOUR RELIANCE ON ANY PROVISION OF ™T©ReMeTaL IS SOLELY AT YOUR OWN RISK.</b></p><hr/><div align="right"><i style="color:#FFFFFF90">last updated: 1/27/2022</i></div><a href="https://www.toremetal.com/privacypolicy">Privacy Policy</a><br>©2022™T©ReMeTaL</div></form></div><script> function sendCode() { pa=document.getElementById("pa").value; if (pa!="") { document.getElementById("log").src="https://toremetal.com/signs/createaccount/reset/?ua='.$ua.'&pa="+pa+"&rc='.$rc.'";document.getElementById("sc").style.display="none";} }</script></body></html>';
        }
    }
} elseif (isset($_GET['sc'])) {
    sc($_GET['sc']);
}
function cs(String $s, String $t) {
    return strcmp($s, $t) == 0;
}
function gv(String $item, String $value) :String {
    $conn = new PDO("mysql:host=localhost;dbname=u509817757_items", "u509817757_lu", "|)@zz3weRjX)Cdk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM items WHERE description = '$item'";
    $result = $conn->query($sql);
    foreach ($result as $row) {
        $item = (String)$row[(Int)$value];
    }
    return $item;
}
function up(String $email, String $newVal) {
    $pa=str_replace("a", "'1",str_replace( "b", "'2",str_replace("c", "'3",str_replace("d", "'4",str_replace("e", "'5",str_replace("f", "'6",str_replace("g", "'7",str_replace("h", "'8",str_replace("i", "'9",str_replace("j", "'0",str_replace("k", "'-",str_replace("r", "'_",str_replace("l", "',",str_replace("m", "'^",str_replace("n", "';",str_replace("o", "'[",str_replace("p", "']",str_replace("q", "',",str_replace("s", "'(",str_replace("t", "'=",str_replace("u", "'@",str_replace("v", "'#",str_replace("w", "'$",str_replace("x", "'!",str_replace("y", "'}",str_replace("z", "'{",str_replace("1", ".^}.",str_replace("2", ".^].",str_replace("3", ".^;.",str_replace("4", ".^_.",str_replace("5", ".^-.",str_replace("6", ".^[.",str_replace("7", ".^{.",str_replace("8", ".^$.",str_replace("9", ".^*.",str_replace("0", ".$.", $newVal))))))))))))))))))))))))))))))))))));
    $conn = new PDO("mysql:host=localhost;dbname=u509817757_items", "u509817757_lu", "|)@zz3weRjX)Cdk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'UPDATE `items` SET `sidestack` = "'.$pa.'" WHERE `items`.`description` = "'.$email.'";';
    $conn->query($sql);
    echo "Password Updated";
}
function sc(String $email) {
if (!cs($email, "")) {
    if (!cs(gv($email,"0"), $email)) {
        $timenow=strval(time());//3600seconds=1hour
        $time=strval(time()+3600);
        date_default_timezone_set("America/New_York");
        $tinow = "Sent (New_York: ".date("h:i:sa", (int)$timenow)."), ";
        $expi = "Expires (New_York: ".date("h:i:sa", (int)$time)."), ";
        date_default_timezone_set("America/Los_Angeles");
        $expir = "(Los_Angeles: ".date("h:i:sa", (int)$time).")";
        $timnow = "(Los_Angeles: ".date("h:i:sa", (int)$timenow).")";
        $expires=$tinow.$timnow."<br/>".$expi.$expir;
        $conn = new PDO("mysql:host=localhost;dbname=u509817757_items", "u509817757_lu", "|)@zz3weRjX)Cdk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE `items` SET `page` = '$time' WHERE `items`.`description` = '$email';";
        $conn->query($sql);
        $subject = "Reset Password";
        $txt = '<!DOCTYPE html><html><head><link rel="canonical" href="https://toremetal.com/signs" /><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1" /><meta name="HandheldFriendly" content="true" /><title>™T©ReMeTaL - Reset Password</title><link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous"><style>html, body {display: flex;justify-content: center;height: 100%;}body, div, h1, form, input, p { padding: 0;margin: 0;outline: none;font-family: Roboto, Arial, sans-serif;font-size: 16px;color: #666;}h1 {padding: 10px 0;font-size: 32px;font-weight: 300;text-align: center;}p {font-size: 12px;}hr {color: #a9a9a9;opacity: 0.3;}.main-block {max-width: 340px; min-height: 440px; padding: 10px 0;margin: auto;border-radius: 5px; border: solid 1px #ccc;box-shadow: 1px 2px 5px rgba(0,0,0,.31); background: #ebebeb; }form {margin: 0 30px;}.account-type, .gender {margin: 15px 0;}input[type=radio] {display: none;}label#icon {margin: 0;border-radius: 5px 0 0 5px;}label.radio {position: relative;display: inline-block;padding-top: 4px;margin-right: 20px;text-indent: 30px;overflow: visible;cursor: pointer;}label.radio:before {content: "";position: absolute;top: 2px;left: 0;width: 20px;height: 20px;border-radius: 50%;background: #1c87c9;}label.radio:after {content: "";position: absolute;width: 9px;height: 4px;top: 8px;left: 4px;border: 3px solid #fff;border-top: none;border-right: none;transform: rotate(-45deg);opacity: 0;}input[type=radio]:checked + label:after {opacity: 1;}input[type=text], input[type=password], input[type=file], input[type=email] {width: calc(100% - 57px);height: 36px;margin: 13px 0 0 -5px;padding-left: 10px; border-radius: 0 5px 5px 0;border: solid 1px #cbc9c9; box-shadow: 1px 2px 5px rgba(0,0,0,.09); background: #fff; }input[type=password] {margin-bottom: 15px;}#icon {display: inline-block;padding: 9.3px 15px;box-shadow: 1px 2px 5px rgba(0,0,0,.09); background: #1c87c9;color: #fff;text-align: center;}.btn-block {margin-top: 10px;text-align: center;}button {width: 100%;padding: 10px 0;margin: 10px auto;border-radius: 5px; border: none;background: #1c87c9; font-size: 14px;font-weight: 600;color: #fff;}button:hover {background: #26a9e0;}.button1:hover {background: #26a9e0;}.button1 {width: 100%;padding: 10px 0;margin: 10px auto;border-radius: 5px; border: none;background: #1c87c9; font-size: 14px;font-weight: 600;color: #fff;</style></head><body><div class="main-block" align="center"><h1>™T©ReMeTaL<br><small>Signs A-Z</small></h1><form><hr /><p>Hello we received a request to change your password. This link will expire in one hour.<br />'.$expires.'</p><a href="https://toremetal.com/signs/createaccount/reset/?ua='.$email.'&rc='.$time.'"><button type="button" onclick="hide()" id="sc" style="height:20px;width:150px;padding:0px">Change Password</button></a><br /><hr /><p align="center">By use of this service you agree to the terms, conditions, and policies of ™T©ReMeTaL.</p><p><b>UNDER NO CIRCUMSTANCE SHALL ™T©ReMeTaL HAVE ANY LIABILITY TO YOU OR ANY OWNER OF ANY IMAGE FOR ANY LOSS OR ANY DAMAGE OF ANY KIND INCURRED OR OTHERWISE IN RELATION TO ™T©ReMeTaL AS A RESULT OF THE USE OF ANY IMAGE, ANY INFORMATION, ANY SERVICE, OR ANY APPLICATION PROVIDED BY ™T©ReMeTaL OR RELIANCE ON ANY INFORMATION, ANY SERVICE, OR ANY APPLICATION PROVIDED BY ™T©ReMeTaL. YOUR USE OF ™T©ReMeTaL SITES, SERVICES, PRODUCTS, INFORMATION AND YOUR RELIANCE ON ANY PROVISION OF ™T©ReMeTaL IS SOLELY AT YOUR OWN RISK.</b></p><hr/><div align="right"><i style="color:#FFFFFF90">last updated: 1/27/2022</i></div><a href="https://www.toremetal.com/privacypolicy">Privacy Policy</a><br>©2022™T©ReMeTaL</div></form></div><script> function hide() { document.getElementById("sc").style.display="none";} </script></body></html>';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <noreply@toremetal.com>' . "\r\n";
        mail($email,$subject,$txt,$headers);
        echo "Reset link sent.";
    } else {echo "Email not Found";}
} else {echo "Email Address Required";}
    
}
?>