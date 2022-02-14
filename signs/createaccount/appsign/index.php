<?PHP
if (isset($_POST['em'])) {
    $em=$_POST['em'];
    if (!strcmp($em, "") == 0) {    
    if (isset($_POST['pa'])) {
        $pa=$_POST['pa'];
            if (!strcmp($pa, "") == 0) {
                $folder=str_replace("@toremetal.com","-10101",str_replace("@gmail.com","-00000",str_replace("@outlook.com","-11111",str_replace("@live.com","-22222",str_replace("@yahoo.com","-33333",str_replace("@hotmail.com","-44444",str_replace("@aol.com","-55555",str_replace("office.com","-66666",str_replace("@","_a-t-",str_replace(".com","_dot-",$em))))))))));
                $email=str_replace("-10101","@toremetal.com",str_replace("-00000","@gmail.com",str_replace("-11111","@outlook.com",str_replace("-22222","@live.com",str_replace("-33333","@yahoo.com",str_replace("-44444","@hotmail.com",str_replace("-55555","@aol.com",str_replace("-66666","office.com",str_replace("_a-t-","@",str_replace("_dot-",".com",$folder))))))))));
                $accname=str_replace("_a-t-","",str_replace("_dot-","",str_replace("-10101","",str_replace("-00000","",str_replace("-11111","",str_replace("-22222","",str_replace("-33333","",str_replace("-44444","",str_replace("-55555","",$folder)))))))));
                $password=str_replace("a", "'1",str_replace( "b", "'2",str_replace("c", "'3",str_replace("d", "'4",str_replace("e", "'5",str_replace("f", "'6",str_replace("g", "'7",str_replace("h", "'8",str_replace("i", "'9",str_replace("j", "'0",str_replace("k", "'-",str_replace("r", "'_",str_replace("l", "',",str_replace("m", "'^",str_replace("n", "';",str_replace("o", "'[",str_replace("p", "']",str_replace("q", "',",str_replace("s", "'(",str_replace("t", "'=",str_replace("u", "'@",str_replace("v", "'#",str_replace("w", "'$",str_replace("x", "'!",str_replace("y", "'}",str_replace("z", "'{",str_replace("1", ".^}.",str_replace("2", ".^].",str_replace("3", ".^;.",str_replace("4", ".^_.",str_replace("5", ".^-.",str_replace("6", ".^[.",str_replace("7", ".^{.",str_replace("8", ".^$.",str_replace("9", ".^*.",str_replace("0", ".$.", $pa))))))))))))))))))))))))))))))))))));
                if (test(sq($email,"0"), $email)) {
                    $conn = new PDO("mysql:host=localhost;dbname=u509817757_items", "u509817757_lu", "|)@zz3weRjX)Cdk");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $ad = "n/a";
                    $sql = 'INSERT INTO `items`(`id`, `name`, `description`, `sidestack`, `jhook`, `ga`) VALUES (DEFAULT,"'.$accname.'","'.$email.'","'.$password.'","'.$folder.'","'.$ad.'")';
                    $result = $conn->query($sql);
                    mkdir('../../'.$folder);
                    mkdir('../../'.$folder.'/photos');
                    $file = '../udefault.config';
                    $myfile = '../../'.$folder.'/photos/index.php';
                    copy($file, $myfile);
                    $file = '../udefault1.config';
                    $myfile = '../../'.$folder.'/photos/php.ini';
                    copy($file, $myfile);
                    $file = '../udefault2.config';
                    $myfile = '../../'.$folder.'/photos/photo.config';
                    copy($file, $myfile);
                        setcookie('account', $folder, [
                            'expires' => 0,
                            'path' => '/',
                            'domain' => $_SERVER['HTTP_HOST'],
                            'secure' => false,
                            'httponly' => false,
                            'samesite' => 'Strict',
                        ]);
                    echo 'true'.$folder;
                } else {
                    $spassword = "";
                    $conn = new PDO("mysql:host=localhost;dbname=u509817757_items", "u509817757_lu", "|)@zz3weRjX)Cdk");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM items WHERE description = '$email'";
                    $result = $conn->query($sql);
                    $folder = "false";
                    $name = "N/A";
                    foreach ($result as $row) {
                        $spassword = (String)$row[3];
                        $folder = (String)$row[4];
                    }
                    if (strcmp($password, $spassword) == 0) {
                        setcookie('account', $folder, [
                            'expires' => 0,
                            'path' => '/',
                            'domain' => $_SERVER['HTTP_HOST'],
                            'secure' => false,
                            'httponly' => false,
                            'samesite' => 'Strict',
                        ]);
                        echo 'true'.$folder;
                    } else {
                        echo 'false';
                    }
                }
            }
        }
    }
} else if (isset($_GET['em'])) {
    $em=$_GET['em'];
    if (!strcmp($em, "") == 0) {    
        if (isset($_GET['pa'])) {
            $pa=$_GET['pa'];
            if (!strcmp($pa, "") == 0) {
                $folder=str_replace("@toremetal.com","-10101",str_replace("@gmail.com","-00000",str_replace("@outlook.com","-11111",str_replace("@live.com","-22222",str_replace("@yahoo.com","-33333",str_replace("@hotmail.com","-44444",str_replace("@aol.com","-55555",str_replace("office.com","-66666",str_replace("@","_a-t-",str_replace(".com","_dot-",$em))))))))));
                $email=str_replace("-10101","@toremetal.com",str_replace("-00000","@gmail.com",str_replace("-11111","@outlook.com",str_replace("-22222","@live.com",str_replace("-33333","@yahoo.com",str_replace("-44444","@hotmail.com",str_replace("-55555","@aol.com",str_replace("-66666","office.com",str_replace("_a-t-","@",str_replace("_dot-",".com",$folder))))))))));
                $accname=str_replace("_a-t-","",str_replace("_dot-","",str_replace("-10101","",str_replace("-00000","",str_replace("-11111","",str_replace("-22222","",str_replace("-33333","",str_replace("-44444","",str_replace("-55555","",$folder)))))))));
                $password=str_replace("a", "'1",str_replace( "b", "'2",str_replace("c", "'3",str_replace("d", "'4",str_replace("e", "'5",str_replace("f", "'6",str_replace("g", "'7",str_replace("h", "'8",str_replace("i", "'9",str_replace("j", "'0",str_replace("k", "'-",str_replace("r", "'_",str_replace("l", "',",str_replace("m", "'^",str_replace("n", "';",str_replace("o", "'[",str_replace("p", "']",str_replace("q", "',",str_replace("s", "'(",str_replace("t", "'=",str_replace("u", "'@",str_replace("v", "'#",str_replace("w", "'$",str_replace("x", "'!",str_replace("y", "'}",str_replace("z", "'{",str_replace("1", ".^}.",str_replace("2", ".^].",str_replace("3", ".^;.",str_replace("4", ".^_.",str_replace("5", ".^-.",str_replace("6", ".^[.",str_replace("7", ".^{.",str_replace("8", ".^$.",str_replace("9", ".^*.",str_replace("0", ".$.", $pa))))))))))))))))))))))))))))))))))));
                if (test(sq($email,"0"), $email)) {
                    $conn = new PDO("mysql:host=localhost;dbname=u509817757_items", "u509817757_lu", "|)@zz3weRjX)Cdk");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $ad = "n/a";
                    $sql = 'INSERT INTO `items`(`id`, `name`, `description`, `sidestack`, `jhook`, `ga`) VALUES (DEFAULT,"'.$accname.'","'.$email.'","'.$password.'","'.$folder.'","'.$ad.'")';
                    $result = $conn->query($sql);
                    mkdir('../../'.$folder);
                    mkdir('../../'.$folder.'/photos');
                    $file = '../udefault.config';
                    $myfile = '../../'.$folder.'/photos/index.php';
                    copy($file, $myfile);
                    $file = '../udefault1.config';
                    $myfile = '../../'.$folder.'/photos/php.ini';
                    copy($file, $myfile);
                    $file = '../udefault2.config';
                    $myfile = '../../'.$folder.'/photos/photo.config';
                    copy($file, $myfile);
                        setcookie('account', $folder, [
                            'expires' => 0,
                            'path' => '/',
                            'domain' => $_SERVER['HTTP_HOST'],
                            'secure' => false,
                            'httponly' => false,
                            'samesite' => 'Strict',
                        ]);
                    echo 'true'.$folder;
                } else {
                    $spassword = "";
                    $conn = new PDO("mysql:host=localhost;dbname=u509817757_items", "u509817757_lu", "|)@zz3weRjX)Cdk");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM items WHERE description = '$email'";
                    $result = $conn->query($sql);
                    $folder = "false";
                    $name = "N/A";
                    foreach ($result as $row) {
                        $spassword = (String)$row[3];
                        $folder = (String)$row[4];
                    }
                    if (strcmp($password, $spassword) == 0) {
                        setcookie('account', $folder, [
                            'expires' => 0,
                            'path' => '/',
                            'domain' => $_SERVER['HTTP_HOST'],
                            'secure' => false,
                            'httponly' => false,
                            'samesite' => 'Strict',
                        ]);
                        echo 'true'.$folder;
                    } else {
                        echo 'false';
                    }
                }
            }
        }
    }
}
function test(String $s, String $t) {
    return strcmp($s, $t) == 0;
}
function sq(String $mail,String $num) :String {
    $conn = new PDO("mysql:host=localhost;dbname=u509817757_items", "u509817757_lu", "|)@zz3weRjX)Cdk");
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
?>