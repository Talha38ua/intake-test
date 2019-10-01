<?php
require_once('services/Database.php');

$db = new Database;
//Connection with the database with mysqli
$conn = new mysqli("localhost:3306", "talha", "talha", "intake");

session_start();
session_unset();

//TODO: Handle failure gracefully

if (isset($_POST['login']) && isset($_POST['password'])) {
    //Protecting the database against SQL injections using MySQLi by making protected variables.
    $login = mysqli_real_escape_string($conn, $_POST['login']);

//TODO: Gebruik SHA256 instead of md5 for securing the password
    $password = md5(mysqli_real_escape_string($conn, $_POST['password']));

// Selecting the protected variables.
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