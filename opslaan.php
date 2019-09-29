<?php
require(__DIR__ . '/services/Database.php');
$db = new Database;
$type = $_POST['save_type'];
// TODO: Splits deze file op naar meerdere losse scripts. Eentje voor customer, eentje voor auto, eentje voor klussen.

//SQL injection protection didn't work at opslaan.php for some reason.
//It would not insert the Strings with mysqli_real_escape_sting()
//Thats why I left it the way it was so it can still atleast insert.
//I will still leave the code in text.

//Link identifier by mysqli
//$conn = new mysqli("localhost:3306", "talha", "talha", "intake");

//Making protected variables
/*
$firstName = mysqli_real_escape_string($conn, $_POST['first_name']);
$lastname = mysqli_real_escape_string($conn, $_POST['last_name']);
$age = mysqli_real_escape_string($conn, $_POST['leeftijd']);
$brand = mysqli_real_escape_string($conn, $_POST['brand']);
$type = mysqli_real_escape_string($conn, $_POST['type']);
$task = mysqli_real_escape_string($conn, $_POST['task']);
*/

switch ($type) {
    case 'klant':
        $db->execQuery("INSERT INTO `customer`(`first_name`, `last_name`, `age`) VALUES ('" . $_POST['first_name'] . "', '" . $_POST['last_name'] . "', " . $_POST['leeftijd'] . ")");
        $maxId = (int)$db->getAllRows('SELECT max(ID) as id From customer')[0]['id'];
        $db->execQuery("INSERT INTO `car`(`customer_id`, `brand`, `type`)  VALUES (" . $maxId . ", '" . $_POST['brand'] . "', '" . $_POST['type'] . "')");
        break;
    case 'task':
        try {
            $db->execQuery(" INSERT INTO `task`(`car_id`, `task`, `status`) VALUES (" . (int)$_POST['car'] . ", '" . $_POST['task'] . "', 0)");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        break;
}
header('Location: overview.php');