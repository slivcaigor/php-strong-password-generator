<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strong Password Generator</title>

    <?php
    session_start();
    require_once __DIR__ . './libs/helper.php';
    ?>



</head>

<body>
    <!-- form per definire la lunghezza della password da generare -->
    <form method="get">
        <label for="password_length">Lunghezza Password:</label>
        <input type="number" name="password">
        <input type="submit" value="Invia">
    </form>

    <?php
    // se esiste la variabile "password" nell'array $_GET allora viene eseguito il blocco if
    if (isset($_GET['password'])) {
        // assume come valore la lunghezza specificata nel form dall'utente
        $password_length = $_GET['password'];
        // chiama la funzione "generateRandomPassword" passando come parametro la lunghezza della password data dal utente per generate una password casuale
        $password = generateRandomPassword($password_length);
        $_SESSION['password'] = $password;
        header("Location: ShowPassword.php");
        // stampa la password generata
        echo "Ecco la password generata: $password";
    }
    ?>

</body>

</html>