<?php
require_once('services/Database.php');

$db = new Database;
//Link identifier by mysqli
$mysqliLink = new mysqli("localhost:3306", "talha", "talha", "intake");

session_start();
session_unset();

//TODO: Handle failure gracefully

if (isset($_POST['login']) && isset($_POST['password'])) {
    //Protecting the database against SQL injections using MySQLi by making protected variables and inserting them into the databse
    $login = mysqli_real_escape_string($mysqliLink, $_POST['login']);

//TODO: Gebruik SHA256 instead of md5 for securing the password
    $password = md5(mysqli_real_escape_string($mysqliLink, $_POST['password']));


    $users = $db->getAllRows(sprintf('SELECT *
                                FROM user
                                WHERE login = \'%s\'
                                AND password = \'%s\';', $login, $password));

    if (count($users) > 0) {
        $_SESSION['logged_in'] = true;
        header("Location: overview.php");
        die;
    }
}
header("Location: login.php?login_failed=1");