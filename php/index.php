<?php
//header('Location: https://toremetal.000webhostapp.com/'); 

$servername = "localhost";
$username = "u509817757_lu";
$password = "|)@zz3weRjX)Cdk";
$database = "u509817757_items";
$action = $_GET['action'];

if ($action == "view") {
    $id = $_GET['id'];
$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM items WHERE id = '$id'";
    $result = $conn->query($sql);
/*echo "Reverse order...\n";
for ($row_no = $result->num_rows - 1; $row_no >= 0; $row_no--) {
    $result->data_seek($row_no);
    $row = $result->fetch_assoc();
    echo " id = " . $row['id'] . "\n";
}*/

    foreach ($result as $row) {
        echo " id = " . $row['id'] . "<br> name = " . $row['name'] . "<br> description = " . $row['description'] . "<br> sidestack = " . $row['sidestack'] . "<br> jhook = " . $row['jhook'] . "<br>\n";
        /*$dat = " id = " . $row['id'] . " name = " . $row['name'] . " description = " . $row['description'] . " sidestack = " . $row['sidestack'] . " jhook = " . $row['jhook'];
        $_POST["$dat"];*/
    }
} elseif ($action == "update") {
    try {
        $id = $_GET['id'];
        $name = $_GET['name'];
        $des = $_GET['des'];
        $ss = $_GET['ss'];
        $jhk = $_GET['jhk'];
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE items SET name = '$name', description = '$des', sidestack = '$ss', jhook = '$jhk' WHERE id = '$id'";
            $conn->exec($sql);
         echo "Record updated successfully";
        } catch(PDOException $e) {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO items (id, name, description, sidestack, jhook)
            VALUES ('$id', '$name', '$des', '$ss', '$jhk')";
            $conn->exec($sql);
          echo "New record created successfully";
        }
    } catch(PDOException $e) {
        echo "Update failed: " . $e->getMessage();
    }
} elseif ($action == "delete") {
    try {
        $id = $_GET['id'];
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM items WHERE id=$id";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Record Deleted successfully";
    } catch(PDOException $e) {
        echo "Record Deletion failed: " . $e->getMessage();
    }
} elseif ($action == "createtable") {
    try {
        $id = $_GET['id'];
        $name = $_GET['name'];
        $des = $_GET['des'];
        $ss = $_GET['ss'];
        $jhk = $_GET['jhk'];
        $AUTO_INCREMENT = $_GET['ai'];

        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // sql to create table
$sql = "CREATE TABLE $id (
id INT(50) UNSIGNED $AUTO_INCREMENT PRIMARY KEY,
$name VARCHAR(50) NOT NULL,
$des VARCHAR(50) NOT NULL,
$ss VARCHAR(50),
$jhk VARCHAR(50)
)";
if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}
        //$conn->exec($sql);
        //echo "Record Deleted successfully";
    } catch(PDOException $e) {
        echo "Table creation error: " . $e->getMessage();
    }
} elseif ($action == "custom") {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $_GET['sql'];
    $id = $_GET['row'];
    $result = $conn->query("$sql");
    foreach ($result as $row) {
        echo $row[$id] . "\r\n";
        /*echo " id = " . $row[0] . "<br> name = " . $row[1] . "<br> description = " . $row[2] . "<br> sidestack = " . $row[3] . "<br> jhook = " . $row[4] . "<br>\n";*/
    }
}


/*try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    } catch(PDOException $e) {    
    echo "Connection failed: " . $e->getMessage();
    }*/
?>