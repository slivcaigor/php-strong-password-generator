<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strong Password Generator</title>
</head>

<body>

    <?php
    session_start();
    if (isset($_SESSION['password'])) {
        $password = $_SESSION['password'];
        echo "Ecco la password generata: " . $password;
    }
    ?>



</body>

</html>