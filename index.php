<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strong Password Generator</title>


</head>

<body>
    <!-- form per definire la lunghezza della password da generare -->
    <form method="get">
        <label for="password_length">Lunghezza Password:</label>
        <input type="number" name="password">
        <input type="submit" value="Invia">
    </form>

    <?php
    // funzione con un parametro di lunghezza
    function generateRandomPassword($length)
    {
        // variabile "$letters" che contiene i caratteri utilizzati per generare la password casuale
        $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=';
        // variabile vuota, verrà utilizzata per costruire la password casuale
        $password = '';
        // ciclo per generare la password fino a quando la condizione $i < $length è vera
        for ($i = 0; $i < $length; $i++) {
            // funzione "rand" per generare un numero casuale compreso tra 0 e la lunghezza della stringa $letters, il carattere viene poi concatenato alla variabile $password utilizzando l'operatore di concatenazione "."
            $password .= $letters[rand(0, strlen($letters) - 1)];
        }
        // restituisce la password generata, memorizzata nella variabile $password
        return $password;
    }
    // se esiste la variabile "passwoed" nell'array $_GET allora viene eseguito il blocco if
    if (isset($_GET['password'])) {
        // assume come valore la lunghezza specificata nel form dall'utente
        $password_length = $_GET['password'];
        // chiama la funzione "generateRandomPassword" passando come parametro la lunghezza della password data dal utente per generate una password casuale
        $password = generateRandomPassword($password_length);
        // stampa la password generata
        echo "Ecco la password generata: $password";
    }
    ?>

</body>

</html>