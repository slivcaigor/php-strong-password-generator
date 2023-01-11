<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Strong Password Generator</title>
</head>

<body>
    <?php
    // riprende una sessione esistente
    session_start();
    // verifica se la sessione contiene la variabile 'password'
    if (isset($_SESSION['password'])) {
        // se esiste, il suo valore viene assegnato alla variabile $password
        $password = $_SESSION['password'];
        // stampato a schermo il messaggio seguito dal valore della password
        echo "<h1 class='ms_result'</h1>Ecco la password generata: " . $password . "</h1>";
    }
    ?>
</body>

</html>