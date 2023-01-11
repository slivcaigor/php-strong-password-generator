<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../assets/favicon.png" type="image/png">
    <title>Strong Password Generator</title>

    <?php
    // riprende una sessione esistente
    session_start();
    // include solo una volta ed esegue il codice in un altro file
    require_once __DIR__ . './libs/helper.php';
    ?>

</head>

<body>
    <div class="ms_title">
        <img src="../assets/logo.png" alt="Logo Image">
        <h1>Genera una password sicura</h1>
    </div>

    <?php
    // verifica se è stato impostato il parametro "password" nell'URL
    if (isset($_GET['password'])) {
        // viene assegnato il valore del parametro alla variabile $passwordLength
        $passwordLength = $_GET['password'];
        // if verifica se almeno uno dei parametri "numeri", "lettere" o "simboli" è stato impostato nell'URL
        if (!isset($_GET['numeri']) && !isset($_GET['lettere']) && !isset($_GET['simboli'])) {
            // Se nessuno dei parametri è stato impostato, viene visualizzato il messaggio
            echo '<div class="ms_error"> <h6>Nessun parametro valido inserito</h6> </div>';
        } else {
            // Se almeno uno dei parametri è stato impostato, la funzione generateRandomPassword() viene chiamata con i parametri elencati
            $password = generateRandomPassword($passwordLength, $_GET['duplicati'], isset($_GET['numeri']), isset($_GET['lettere']), isset($_GET['simboli']));
            // Il valore restituito dalla funzione viene assegnato alla variabile $password.
            // $password viene quindi impostata come una variabile di sessione
            $_SESSION['password'] = $password;
            // e si esegue un redirect verso un'altra pagina chiamata ShowPassword.php
            header("Location: ShowPassword.php");
        }
    }
    ?>

    <div class="ms_wrapper">
        <!-- form per definire la lunghezza della password da generare, insieme alle scelte per l'utente-->
        <form method="get">
            <div class="ms_length">
                <label id="passLength" for="passwordLength">Lunghezza Password:</label>
                <select name="password">
                    <?php
                    for ($i = 8; $i <= 35; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
            </div>
            <div id="ms_duplicates">
                <label for="duplicati">Consenti ripetizioni di uno o piu caratteri:</label>
                <div id="answers">
                    <input type="radio" name="duplicati" value="si" checked>Si
                    <input type="radio" name="duplicati" value="no">No
                </div>
            </div>
            <div id="ms_selections">
                <div>
                    <label for="numeri">Numeri</label>
                    <input type="checkbox" name="numeri" value="numeri">
                </div>
                <div>
                    <label for="lettere">Lettere</label>
                    <input type="checkbox" name="lettere" value="lettere">
                </div>
                <div>
                    <label for="simboli">Simboli</label>
                    <input type="checkbox" name="simboli" value="simboli">
                </div>
            </div>
            <div id="btn">
                <input type="submit" value="Genera Password">
            </div>
        </form>
    </div>
</body>

</html>