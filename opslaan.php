<?php
require(__DIR__ . '/services/Database.php');
$db = new Database;
$type = $_POST['save_type'];


//Link identifier by mysqli
$mysqliLink = new mysqli("localhost:3306", "talha", "talha", "intake");

//Making protected variables
$firstName = mysqli_real_escape_string($mysqliLink, $_POST['first_name']);
$lastname = mysqli_real_escape_string($mysqliLink, $_POST['last_name']);
$age = mysqli_real_escape_string($mysqliLink, $_POST['leeftijd']);
$brand = mysqli_real_escape_string($mysqliLink, $_POST['brand']);
$type = mysqli_real_escape_string($mysqliLink, $_POST['type']);
$task = mysqli_real_escape_string($mysqliLink,$_POST['task']);

// TODO: Splits deze file op naar meerdere losse scripts. Eentje voor customer, eentje voor auto, eentje voor klussen.

switch ($type) {
    case 'klant':
        // Inserting the protected variables into the database
        $db->execQuery("INSERT INTO `customer`(`first_name`, `last_name`, `age`) VALUES ('" . $firstName . "', '" . $lastname . "', " . $age . ")");

        $maxId = (int)$db->getAllRows('SELECT max(ID) as id From customer')[0]['id'];

        $db->execQuery("INSERT INTO `car`(`customer_id`, `brand`, `type`)  VALUES (" . $maxId . ", '" . $brand . "', '" . $type . "')");

        break;

    case 'task':

        try {
            $db->execQuery(" INSERT INTO `task`(`car_id`, `task`, `status`) VALUES (" . (int)$_POST['car'] . ", '" . $task . "', 0)");

        } catch (Exception $e) {
            echo $e->getMessage();
        }

        break;
}
header('Location: overview.php');
