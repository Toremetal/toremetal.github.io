<?php
$usfiles="";
$hst = $_SERVER['HTTP_HOST'];
$req = $_SERVER['REQUEST_URI'];
if (isset($_GET['ret'])) {
    $ret=$_GET['ret'];
} else {
    $ret="signssubmission";
}
if (isset($_COOKIE['account'])) {
    if (strcmp($_COOKIE['account'], "null") == 0) {
        header('Location: https://toremetal.com/signs/createaccount/?ret='.$ret);
    } else {
        $usfiles=strtolower($_COOKIE['account']);
    }
} else {
    header('Location: https://toremetal.com/signs/createaccount/?ret='.$ret);
}
try {
    // Request Log
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
} catch(Exception $e) {}
try {
    // page view count
    $myfile = fopen("vc.txt", "r");
    $txt = fgets($myfile);
    fclose($myfile);
    $myfile = fopen("vc.txt", "w");
    fwrite($myfile, 1+(int)$txt);
    fclose($myfile);
    $myfile = fopen("vc.txt", "r");
    $session = fgets($myfile);
    fclose($myfile);
} catch(Exception $e) {}
$showForm="0";
if (strcmp($ret, "signssubmission") == 0) {
    $showForm="1";
} else if (strcmp($ret, "uploadform") == 0) {
    // file upload form
    echo '<!DOCTYPE html><html><head><link rel="canonical" href="https://toremetal.com/signs" /><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1" /><meta name="HandheldFriendly" content="true" /><title>Signs Upload Form</title><link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous"><style> html, body { display: flex; justify-content: center; height: 100%; } body, div, h1, form, input, p { padding: 0; margin: 0; outline: none; font-family: Roboto, Arial, sans-serif; font-size: 16px; color: #666; } h1 { padding: 10px 0; font-size: 32px; font-weight: 300; text-align: center; } p { font-size: 12px; } hr { color: #a9a9a9; opacity: 0.3; } .main-block { max-width: 340px; min-height: 440px; padding: 10px 0; margin: auto; border-radius: 5px; border: solid 1px #ccc; box-shadow: 1px 2px 5px rgba(0,0,0,.31); background: #ebebeb; } form { margin: 0 30px; } label#icon { margin: 0; border-radius: 5px 0 0 5px; } input[type=text], input[type=password], input[type=url] { width: calc(100% - 57px); height: 36px; margin: 13px 0 0 -5px; padding-left: 10px; border-radius: 0 5px 5px 0; border: solid 1px #cbc9c9; box-shadow: 1px 2px 5px rgba(0,0,0,.09); background: #fff; } input[type=password] { margin-bottom: 15px; } #icon { display: inline-block; padding: 9.3px 15px; box-shadow: 1px 2px 5px rgba(0,0,0,.09); background: #1c87c9; color: #fff; text-align: center; } .btn-block { margin-top: 10px; text-align: center; } button { width: 100px; padding: 1px 0; margin: 1px auto; margin-left: 40px; border-radius: 1px; height: 11px; border: 0 none transparent; background: #1c87c9; font-size: 8px; font-weight: 600; color: #fff; } button:hover { background: #26a9e0; } .button1:hover { background: #26a9e0; } .button1 { width: 100%; padding: 10px 0; margin: 10px auto; border-radius: 5px; border: none; background: #1c87c9; font-size: 14px; font-weight: 600; color: #fff; } .auto_height { width: 100%; }</style></head><body><div class="main-block" align="center"><h1>™T©ReMeTaL<br><small>Signs A-Z</small></h1><form id="myForm" action="https://toremetal.com/signs/?ret=upload1" method="post" enctype="multipart/form-data"><a title="Edit your personal image library" style="margin-right: 10px; margin-left: 10px;" href="?ret=editfile">Edit Library</a><a title="Save image link (Url)" style="margin-right: 10px; margin-left: 10px;" href="?ret=signssubmission">Save Link</a><hr /><div class="account-type"><input type="radio" value="Personal" id="radioOne" name="library" style="margin: 10px; margin-top: 0px;" checked/><label for="radioOne" class="radio">Personal Image Library</label><!--<input type="radio" value="Public" id="radioTwo" name="library" style="margin: 10px; margin-top: 0px;" /><label for="radioTwo" class="radio">Public</label>--></div><input type="file" name="fileToUpload" id="fileToUpload" placeholder="Select image to upload:" required/><div class="btn-block"><h6 style="padding: 0px 0; margin: 0px auto;" align="center">Filename used as image display name</h6><input type="submit" value="Submit" name="submit" id="submit" class="button1"><hr></div><p align="center"><b>By Submission[Submit] You Agree:</b><br>To the terms, conditions, and policies of ™T©ReMeTaL. Submission is (www.)web/general public appropriate for all ages and does not contain anything that is in any way considered harmful, threatening, derogatory, or offensive by any legal definition or declaration. Submission of the image does not infringe upon or violate any Copyrights pertaining to the image. You understand that non-appropriate use of this service is Forbidden and will be Punished to the full extent of applicable laws.</p><p align="center"><b>UNDER NO CIRCUMSTANCE SHALL ™T©ReMeTaL HAVE ANY LIABILITY TO YOU OR ANY OWNER OF ANY IMAGE FOR ANY LOSS OR ANY DAMAGE OF ANY KIND INCURRED OR OTHERWISE IN RELATION TO ™T©ReMeTaL AS A RESULT OF THE USE OF ANY IMAGE, ANY INFORMATION, ANY SERVICE, OR ANY APPLICATION PROVIDED BY ™T©ReMeTaL OR RELIANCE ON ANY INFORMATION, ANY SERVICE, OR ANY APPLICATION PROVIDED BY ™T©ReMeTaL. YOUR USE OF ™T©ReMeTaL SITES, SERVICES, PRODUCTS, INFORMATION AND YOUR RELIANCE ON ANY PROVISION OF ™T©ReMeTaL IS SOLELY AT YOUR OWN RISK.</b></p><hr/><div align="right"><i style="color:#FFFFFF90">last updated: 1/27/2022</i></div><a href="https://www.toremetal.com/privacypolicy">Privacy Policy</a><br>©2022™T©ReMeTaL</form></div></body></html>';
} else if (strcmp($ret, "editfile") == 0) {
    if (isset($_POST['save'])) {
        $file="";
        if (!strcmp($usfiles,"")==0) {
            $file = $usfiles.'/photos/photo.config';
        }
        if (file_exists($file)) {
            $fileText=$_POST['save'];
            try {
                $myfile = fopen($file, "w");
                fwrite($myfile, $fileText);
                fclose($myfile);
            }//catch exception
            catch(Exception $e) {
                //$accType="Error Not saved"; 
            }
        }
    } else {
        $file="";
        $fileText="";
        if (!strcmp($usfiles,"")==0) {
            $file = $usfiles.'/photos/photo.config';
        }
        if (file_exists($file)) {
            try {
                $myfile = fopen($file, "r");
                $fileText=fread($myfile,filesize($file));
                fclose($myfile);
            }//catch exception
            catch(Exception $e) {
                //$accType="Error Not saved"; 
            }
        }
    }// Edit file form.
        echo '<!DOCTYPE html><html><head><link rel="canonical" href="https://toremetal.com/signs" /><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1" /><meta name="HandheldFriendly" content="true" /><title>™T©ReMeTaL - Library Editor</title><link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous"><style>html, body {display: flex;justify-content: center;height: 100%;}body, div, h1, form, input, p { padding: 0;margin: 0;outline: none;font-family: Roboto, Arial, sans-serif;font-size: 16px;color: #666;}h1 {padding: 10px 0;font-size: 32px;font-weight: 300;text-align: center;}p {font-size: 12px;}hr {color: #a9a9a9;opacity: 0.3;}.main-block {max-width: 340px; min-height: 440px; padding: 10px 0;margin: auto;border-radius: 5px; border: solid 1px #ccc;box-shadow: 1px 2px 5px rgba(0,0,0,.31); background: #ebebeb; }form {margin: 0 30px;}.account-type, .gender {margin: 15px 0;}input[type=radio] {display: none;}label#icon {margin: 0;border-radius: 5px 0 0 5px;}label.radio {position: relative;display: inline-block;padding-top: 4px;margin-right: 20px;text-indent: 30px;overflow: visible;cursor: pointer;}label.radio:before {content: "";position: absolute;top: 2px;left: 0;width: 20px;height: 20px;border-radius: 50%;background: #1c87c9;}label.radio:after {content: "";position: absolute;width: 9px;height: 4px;top: 8px;left: 4px;border: 3px solid #fff;border-top: none;border-right: none;transform: rotate(-45deg);opacity: 0;}input[type=radio]:checked + label:after {opacity: 1;}input[type=text], input[type=password], input[type=file] {width: calc(100% - 57px);height: 36px;margin: 13px 0 0 -5px;padding-left: 10px; border-radius: 0 5px 5px 0;border: solid 1px #cbc9c9; box-shadow: 1px 2px 5px rgba(0,0,0,.09); background: #fff; }input[type=password] {margin-bottom: 15px;}#icon {display: inline-block;padding: 9.3px 15px;box-shadow: 1px 2px 5px rgba(0,0,0,.09); background: #1c87c9;color: #fff;text-align: center;}.btn-block {margin-top: 10px;text-align: center;}button {width: 100%;padding: 10px 0;margin: 10px auto;border-radius: 5px; border: none;background: #1c87c9; font-size: 14px;font-weight: 600;color: #fff;}button:hover {background: #26a9e0;}.button1:hover {background: #26a9e0;}.button1 {width: 100%;padding: 10px 0;margin: 10px auto;border-radius: 5px; border: none;background: #1c87c9; font-size: 14px;font-weight: 600;color: #fff;}.auto_height { width: 100%; }</style></head><body><div class="main-block" align="center" ><h1>™T©ReMeTaL<br /><small>Signs A-Z</small></h1><form onsubmit="handleFormSubmit()" method="post" action="?ret=editfile" enctype="multipart/form-data"><a title="Add an image" style="margin-right: 10px; margin-left: 10px;" href="?ret=uploadform">Upload file</a><a title="Save image link (Url)" style="margin-right: 10px; margin-left: 10px;" href="?ret=signssubmission">Save Link</a><hr /><h4 style="padding: 0px 0;margin: 2px;" align="center">Personal Library Editor</h4><h6 style="padding: 0px 0;margin: 0px">Directions: <small>The file name must be on the line below the file link and every link must have a name. Remove any blank lines.</small></h6><!--<label id="icon" for="save"><i class="fas fa-unlock-alt"></i></label>--><textarea id="save" name="save" rows="4" cols="40" class="auto_height" oninput="auto_height(this)" wrap="off" required>'.$fileText.'</textarea><div class="btn-block"><input type="submit" name="submit" id="submit" value="Save Changes" class="button1"/><hr /><p align="center">By use of this service you agree to the terms, conditions, and policies of ™T©ReMeTaL.</p><p><b>UNDER NO CIRCUMSTANCE SHALL ™T©ReMeTaL HAVE ANY LIABILITY TO YOU OR ANY OWNER OF ANY IMAGE FOR ANY LOSS OR ANY DAMAGE OF ANY KIND INCURRED OR OTHERWISE IN RELATION TO ™T©ReMeTaL AS A RESULT OF THE USE OF ANY IMAGE, ANY INFORMATION, ANY SERVICE, OR ANY APPLICATION PROVIDED BY ™T©ReMeTaL OR RELIANCE ON ANY INFORMATION, ANY SERVICE, OR ANY APPLICATION PROVIDED BY ™T©ReMeTaL. YOUR USE OF ™T©ReMeTaL SITES, SERVICES, PRODUCTS, INFORMATION AND YOUR RELIANCE ON ANY PROVISION OF ™T©ReMeTaL IS SOLELY AT YOUR OWN RISK.</b></p><hr/><div align="right"><i style="color:#FFFFFF90">last updated: 1/27/2022</i></div><a href="https://www.toremetal.com/privacypolicy">Privacy Policy</a><br />©2022™T©ReMeTaL</div></form></div><script> function handleFormSubmit() { document.getElementById("myForm").reset(); }</script><script> function auto_height(elem) { elem.style.height = "1px"; elem.style.height = (elem.scrollHeight)+"px"; }</script></body></html>';
} else if (strcmp($ret, "upload1") == 0) {
    $erval = "";
    $file = 'photos_public/photo.config';
    $target_dir = "photos_public/";
    if (isset($_POST['library'])) {
        $accType=$_POST['library'];
        if (strcmp($accType, "Personal") == 0) {
            if (!strcmp($usfiles, "") == 0) {
                $file = $usfiles.'/photos/photo.config';
                $target_dir = $usfiles.'/photos/';
            }
        }
    }
    $nmm = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $name = str_replace(".jpeg","",str_replace(".gif","",str_replace(".png","",str_replace(".jpg","",str_replace(".webp","",$nmm)))));
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $erval = "Sorry, your file was not uploaded, File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $erval = "Sorry, your file was not uploaded, file already exists.";
        $uploadOk = 0;
    }

// Check file size
/*if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}*/

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "webp" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
        $erval = "Sorry, your file was not uploaded, only WEBP, JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        if (strcmp($erval, "") == 0) {
            $erval = "Sorry, there was an error uploading your file.";
        };
        $buttonText="Try Again?";
        $showForm="e";
    } else {// if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            if (file_exists($file)) {
                $myfile = fopen($file, "a");
                $txt = "\nhttps://toremetal.com/signs/" . $target_file . "\n" . $name;
                fwrite($myfile, $txt);
                fclose($myfile);
            } else {
                $myfile = fopen($file, "w");
                $txt = "https://toremetal.com/signs/" . $target_file . "\n" . $name;
                fwrite($myfile, $txt);
                fclose($myfile);
            }
            // Submission Log
            $myfile = fopen("createaccount/u.t", "a");
            date_default_timezone_set("America/Los_Angeles");
            $txt = "Date: " . date("Y/m/d") . " Time: " . date("h:i:sa") . "\n";
            fwrite($myfile, $txt);
            $txt1=$_COOKIE['account'];
            $txt = "User Submission: $txt1"."\nImage:". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])).  "\n";
            fwrite($myfile, $txt);
            $txt = "______________ \n";
            fwrite($myfile, $txt);
            fclose($myfile);
            $buttonText="Submit another?";
            $erval='The file '.htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])).' has been uploaded.';
            $showForm="e";
        } else {
            if (strcmp($erval, "") == 0) {
                $erval = "Sorry, there was an error uploading your file.";
            };
            $buttonText="Try Again?";
            $showForm="e";
        }
    }

    
} else if(isset($_POST["submit"])) {
    if (!isset($_COOKIE['account'])) {
        header('Location: https://toremetal.com/signs/createaccount/');
    } else {
        $name=$_POST['name'];
        $url1=$_POST['url'];
        if (!strcmp($url1,"")==0) {
        if (!strcmp($name,"")==0) {
            $accType=$_POST['account'];
        $url=str_replace("/view?usp=sharing","",str_replace("https://drive.google.com/file/d/","https://drive.google.com/uc?id=",str_replace("https://drive.google.com/open?id=","https://drive.google.com/uc?id=",str_replace("&usp=drive_fs","",$url1))));
            $file = 'photos_public/photo.config';
            if (!strcmp($accType,"Public")==0) {
                if (!strcmp($usfiles,"")==0) {
                    $file = $usfiles.'/photos/photo.config';
                }
            }
        if (file_exists($file)) {
            try {
                $myfile = fopen($file, "a");
                $txt = "\n" . $url . "\n" . $name;
                fwrite($myfile, $txt);
                fclose($myfile);
            }//catch exception
            catch(Exception $e) {
                $accType="Error Not saved"; 
            }
        } else {
            try {
                $myfile = fopen($file, "w");
                $txt = $url . "\n" . $name;
                fwrite($myfile, $txt);
                fclose($myfile);
                }//catch exception
            catch(Exception $e) {
                $accType="Error Not saved"; 
            }
        }
            try {
        // Submission Log
        $myfile = fopen("createaccount/u.t", "a");
        date_default_timezone_set("America/Los_Angeles");
        $txt = "Date: " . date("Y/m/d") . " Time: " . date("h:i:sa") . "\n";
        fwrite($myfile, $txt);
        $txt1=$_COOKIE['account'];
        $txt = "User Submission: $txt1\nImage: $url\n";
        fwrite($myfile, $txt);
        $txt = "______________ \n";
        fwrite($myfile, $txt);
        fclose($myfile);
            } catch(Exception $e) {
                $accType="Error Not saved"; 
            }
            
        $buttonText="Submit another?";
        $erval="The Image '.$url.' has been saved ('.$accType.').";
        $showForm="e";
        } else {
            $showForm="1";
        }
        } else {
            $showForm="1";
        }
    }
} else {
    header('Location: https://www.toremetal.com/android/signs/');
}
if (strcmp($showForm,"1")==0) {
    /*$servername = "localhost";
    $username = "u509817757_lu";
    $password = "|)@zz3weRjX)Cdk";
    $database = "u509817757_items";
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT `page` FROM `pages` WHERE id = '".$showForm."'";
    $result = $conn->query($sql);
    foreach ($result as $row) {
        echo $row[0];
    }*/
    // link form
    echo '<!DOCTYPE html><html><head><link rel="canonical" href="https://toremetal.com/signs" /><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1" /><meta name="HandheldFriendly" content="true" /><title>Sign Submission Form</title><link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous"><style> html, body { display: flex; justify-content: center; height: 100%; } body, div, h1, form, input, p { padding: 0; margin: 0; outline: none; font-family: Roboto, Arial, sans-serif; font-size: 16px; color: #666; } h1 { padding: 10px 0; font-size: 32px; font-weight: 300; text-align: center; } p { font-size: 12px; } hr { color: #a9a9a9; opacity: 0.3; } .main-block { max-width: 340px; min-height: 440px; padding: 10px 0; margin: auto; border-radius: 5px; border: solid 1px #ccc; box-shadow: 1px 2px 5px rgba(0,0,0,.31); background: #ebebeb; } form { margin: 0 30px; } label#icon { margin: 0; border-radius: 5px 0 0 5px; } input[type=text], input[type=password], input[type=url] { width: calc(100% - 57px); height: 36px; margin: 13px 0 0 -5px; padding-left: 10px; border-radius: 0 5px 5px 0; border: solid 1px #cbc9c9; box-shadow: 1px 2px 5px rgba(0,0,0,.09); background: #fff; } input[type=password] { margin-bottom: 15px; } #icon { display: inline-block; padding: 9.3px 15px; box-shadow: 1px 2px 5px rgba(0,0,0,.09); background: #1c87c9; color: #fff; text-align: center; } .btn-block { margin-top: 10px; text-align: center; } button { width: 100px; padding: 1px 0; margin: 1px auto; margin-left: 40px; border-radius: 1px; height: 11px; border: 0 none transparent; background: #1c87c9; font-size: 8px; font-weight: 600; color: #fff; } button:hover { background: #26a9e0; } .button1:hover { background: #26a9e0; } .button1 { width: 100%; padding: 10px 0; margin: 10px auto; border-radius: 5px; border: none; background: #1c87c9; font-size: 14px; font-weight: 600; color: #fff; } </style></head><body><div class="main-block" align="center"><h1>™T©ReMeTaL<br /><small>Signs A-Z</small></h1><form id="myForm" action="https://toremetal.com/signs/?submit" method="post" enctype="multipart/form-data"><div class="account-type" align="center"><a title="Add an image" style="margin-right: 10px; margin-left: 10px;" href="?ret=uploadform">Upload file</a><a title="Edit your personal image library" style="margin-right: 10px; margin-left: 10px;" href="?ret=editfile">Edit Library</a><a href="createaccount/"><input formaction="" style="margin-right: 10px; margin-left: 10px;" type="button" onclick="setBCookie('."'account', 'null'".')" id="id" value="Log Out" name="reset" class="button"/></a><hr><input type="radio" value="Personal" id="radioOne" name="account" checked/><label style="margin-right: 30px;" for="radioOne" class="radio">Personal</label><input type="radio" value="Public" id="radioTwo" name="account" /><label for="radioTwo" class="radio">Public</label></div><label id="icon" for="name"><i class="fas fa-image"></i></label><input id="name" placeholder="Image name" type="text" name="name" required><label id="icon" for="url"><i class="fas fa-link"></i></label><input id="url" placeholder="Image Link" type="url" name="url" required><hr /><div class="btn-block"><input type="submit" value="Submit" name="submit" id="submit" class="button1"><p align="center"><b>By Submission[Submit] You Agree:</b><br />To the terms, conditions, and policies of ™T©ReMeTaL. Submission is (www.)web/general public appropriate for all ages and does not contain anything that is in any way considered harmful, threatening, derogatory, or offensive by any legal definition or declaration. Submission of the image does not infringe upon or violate any Copyrights pertaining to the image. You understand that non-appropriate use of this service is Forbidden and will be Punished to the full extent of applicable laws.</p><p align="center"><b>UNDER NO CIRCUMSTANCE SHALL ™T©ReMeTaL HAVE ANY LIABILITY TO YOU OR ANY OWNER OF ANY IMAGE FOR ANY LOSS OR ANY DAMAGE OF ANY KIND INCURRED OR OTHERWISE IN RELATION TO ™T©ReMeTaL AS A RESULT OF THE USE OF ANY IMAGE, ANY INFORMATION, ANY SERVICE, OR ANY APPLICATION PROVIDED BY ™T©ReMeTaL OR RELIANCE ON ANY INFORMATION, ANY SERVICE, OR ANY APPLICATION PROVIDED BY ™T©ReMeTaL. YOUR USE OF ™T©ReMeTaL SITES, SERVICES, PRODUCTS, INFORMATION AND YOUR RELIANCE ON ANY PROVISION OF ™T©ReMeTaL IS SOLELY AT YOUR OWN RISK.</b></p><hr/><div align="right"><i style="color:#FFFFFF90">last updated: 1/27/2022</i></div><a href="https://www.toremetal.com/privacypolicy">Privacy Policy</a><br />©2022™T©ReMeTaL</div></form></div><script> function setBCookie(name, value) { let myvalue=value; var date = new Date(); date.setTime(date.getTime() + 500); expire = "; expires=" + date.toUTCString(); document.cookie = name + "=" + (value || "") + expire + ";path=/;domain=.toremetal.com;SameSite=Strict"; Android.showToast(myvalue); history.back(); }</script></body></html>';
} else if (strcmp($showForm,"e")==0) {
    // result form
    echo '<!DOCTYPE html><html><head><link rel="canonical" href="https://toremetal.com/signs" /><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1" /><meta name="HandheldFriendly" content="true" /><title>Sign Submission Form</title><link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous"><style>html, body {display: flex;justify-content: center;height: 100%;}body, div, h1, form, input, p { padding: 0;margin: 0;outline: none;font-family: Roboto, Arial, sans-serif;font-size: 16px;color: #666;}h1 {padding: 10px 0;font-size: 32px;font-weight: 300;text-align: center;}p {font-size: 12px;}hr {color: #a9a9a9;opacity: 0.3;}.main-block {max-width: 340px; min-height: 440px; padding: 10px 0;margin: auto;border-radius: 5px; border: solid 1px #ccc;box-shadow: 1px 2px 5px rgba(0,0,0,.31); background: #ebebeb; }form {margin: 0 30px;}.account-type, .gender {margin: 15px 0;}input[type=radio] {display: none;}label#icon {margin: 0;border-radius: 5px 0 0 5px;}label.radio{position: relative;display: inline-block;padding-top: 4px;margin-right: 20px;text-indent: 30px;overflow: visible;cursor: pointer;}label.radio:before {content: "";position: absolute;top: 2px;left: 0;width: 20px;height: 20px;border-radius: 50%;background: #1c87c9;}label.radio:after {content: "";position: absolute;width: 9px;height: 4px;top: 8px;left: 4px;border: 3px solid #fff;border-top: none;border-right: none;transform: rotate(-45deg);opacity: 0;}input[type=radio]:checked + label:after {opacity: 1;}input[type=text], input[type=password], input[type=file] {width: calc(100% - 57px);height: 36px;margin: 13px 0 0 -5px;padding-left: 10px; border-radius: 0 5px 5px 0;border: solid 1px #cbc9c9; box-shadow: 1px 2px 5px rgba(0,0,0,.09); background: #fff; } input[type=password] { margin-bottom: 15px;} #icon {display: inline-block;padding: 9.3px 15px;box-shadow: 1px 2px 5px rgba(0,0,0,.09);background: #1c87c9;color: #fff;text-align: center;}.btn-block { margin-top: 10px; text-align: center; } button { width: 100%; padding: 10px 0; margin: 10px auto; border-radius: 5px; border: none; background: #1c87c9; font-size: 14px; font-weight: 600; color: #fff;} button:hover {background: #26a9e0;} .button1:hover {background: #26a9e0;} .button1 { width: 100%; padding: 10px 0; margin: 10px auto; border-radius: 5px; border: none; background: #1c87c9; font-size: 14px; font-weight: 600; color: #fff;}</style></head><body><div class="main-block" align="center"><h1>™T©ReMeTaL<br><small>Signs A-Z</small></h1><form><hr /><p>'.$erval.'</p><br /><a class="button1" style="padding: 5px" href="?ret=signssubmission">'.$buttonText.'</a><br><div class="btn-block"><p><b>By Submission[Submit] You Agree:</b><br />To the terms, conditions, and policies of ™T©ReMeTaL. Submission is (www.)web/general public appropriate for all ages and does not contain anything that is in any way considered harmful, threatening, derogatory, or offensive by any legal definition or declaration. Submission of the image does not infringe upon or violate any Copyrights pertaining to the image. You understand that non-appropriate use of this service is Forbidden and will be Punished to the full extent of applicable laws.</p><p align="center"><b>UNDER NO CIRCUMSTANCE SHALL ™T©ReMeTaL HAVE ANY LIABILITY TO YOU OR ANY OWNER OF ANY IMAGE FOR ANY LOSS OR ANY DAMAGE OF ANY KIND INCURRED OR OTHERWISE IN RELATION TO ™T©ReMeTaL AS A RESULT OF THE USE OF ANY IMAGE, ANY INFORMATION, ANY SERVICE, OR ANY APPLICATION PROVIDED BY ™T©ReMeTaL OR RELIANCE ON ANY INFORMATION, ANY SERVICE, OR ANY APPLICATION PROVIDED BY ™T©ReMeTaL. YOUR USE OF ™T©ReMeTaL SITES, SERVICES, PRODUCTS, INFORMATION AND YOUR RELIANCE ON ANY PROVISION OF ™T©ReMeTaL IS SOLELY AT YOUR OWN RISK.</b></p><div align="right"><i style="color:#FFFFFF90">last updated: 1/27/2022</i></div><hr/></form><a href="https://www.toremetal.com/privacypolicy">Privacy Policy</a><br />©2022™T©ReMeTaL</div></div></body></html>';
}
?>