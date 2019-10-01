<head>
    <title>Login</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link type="text/css" rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap-grid.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="stylesheet.css">
</head>
<body>
<div class="container d-flex justify-content-center vertical-center">
    <form action="authenticate.php" method="POST">
        <h3>Login</h3>
        <table>
            <tr>
                <td>Login:</td>
                <td><input name="login"></td>
            </tr>
            <tr>
                <td>Wachtwoord:</td>

                <!--            TODO: zorg ervoor dat bij password input wat je invult verborgen/niet zichtbaar is-->

                <td><input name="password"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Log in">
                </td>
            </tr>
        </table>
    </form>
    <br>
    <?php

    if (isset($_GET['login_failed'])) {
        ?>

        <div class="errormessage" style="color:red;">Kon niet inloggen: Login of wachtwoord incorrect</div>
        <?php
    }

    ?>
</div>
</body>

