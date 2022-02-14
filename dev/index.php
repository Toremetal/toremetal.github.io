<?PHP
    $servername = "localhost";
    $username = "u509817757_lu";
    $password = "|)@zz3weRjX)Cdk";
    $database = "u509817757_items";
    $id = $_COOKIE['_ga'];//$_GET['id'];
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT `page` FROM `items` WHERE ga = '$id'";
    $result = $conn->query($sql);
    foreach ($result as $row) {
        echo $row[0];
    }
?>