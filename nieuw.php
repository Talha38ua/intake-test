<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link type="text/css" rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
<link type="text/css" rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap-grid.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link type="text/css" rel="stylesheet" href="stylesheet.css">

<?php
//This checks if the user is not logged in. If the user is not logged in the user will get sent back to the login page.
session_start();
if (!$_SESSION['logged_in']) {
    header("Location: login.php");
    exit();
}
$type = $_GET['type'];

// TODO: Splits deze file op naar meerdere losse scripts. Eentje voor customer, eentje voor auto, eentje voor klussen.

// TODO: Maak het mogelijk om een auto aan een bestaande klant toe te voegen

// TODO: Maak het mogelijk om autos, klanten en klussen te verwijderen

//Validation on input is done by giving almost every input a type and giving text type inputs a pattern.
//The pattern lets the user only type letters and a space inbetween the letters for surnames with multiple words.
//If the input doesn't match the type or pattern you will see a red bar as a sign of wrong input.

?>
<body>
<div class="nieuw">
    <form class="klant_nieuw" action="opslaan.php" method="POST">
        <?php
        switch ($type){
        case 'klant':
            ?>

            <h3 align="center">Persoon</h3>
            <table class="persoon_table" align="center">
                <tr>
                    <td>Voornaam:</td>
                    <td><input name="first_name" type="text" pattern="[a-zA-Z\s]+"></td>
                </tr>
                <tr>
                    <td>Achternaam:</td>
                    <td><input name="last_name" type="text" pattern="[a-zA-Z\s]+"></td>
                </tr>
                <tr>
                    <td>Leeftijd:</td>
                    <td><input name="leeftijd" type="number"></td>
                </tr>
            </table>

            <h3 align="center"> Auto</h3>
            <table class="auto_table" align="center">
                <tr>
                    <td>Merk:</td>
                    <td><input name="brand" type="text" pattern="[a-zA-Z\s]+"></td>
                </tr>
                <tr>
                    <td>Type:</td>
                    <td><input name="type"></td>
                </tr>
            </table>

            <?php break;
        case 'task':
        require(__DIR__ . '/services/Database.php');
        $db = new Database;

        $cars = $db->getAllRows('SELECT car.*, customer.first_name, customer.last_name from car JOIN customer on customer.id = car.customer_id;')

        ?>
        <form action="opslaan.php">

            <h3 align="center"> Auto</h3>
            <select name="car">
                <?php foreach ($cars

                as $car): ?>
                <option value="<?= $car['id'] ?>"><?= $car['first_name'] . ' ' . $car['last_name'] . '\'s ' . $car['brand'] . ' ' . $car['type'] ?>

                    <?php endforeach; ?>

            </select>
            <table>
                <tr>
                    <td>Klus:</td>
                    <td><input name="task" type="text" pattern="[a-zA-Z\s]+"></td>
                </tr>
            </table>
            <?php
            } ?>

            <input type="hidden" name="save_type" value="<?= $_GET['type'] ?>">
            <input type="submit" value="Invoeren"/>
        </form>
</div>
</body>