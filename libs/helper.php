<?php
/* la funzione accetta 5 parametri: 
$length : lunghezza della password desiderata; 
$duplicati : indica se i caratteri ripetuti sono permessi o meno; 
$includeNumeri, $includeLettere, $includeSimboli : questi parametri indicano se includere numeri, lettere o simboli nella password.*/
function generateRandomPassword($length, $duplicati, $includeNumeri = false, $includeLettere = false, $includeSimboli = false)
{
    // numeri, lettere e simboli per la generazione della password
    $numeri = "0123456789";
    $lettere = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $simboli = "!@#$%^&*()_+-=";

    // stringa $caratteri viene creata concatenando $numeri, $lettere e $simboli in base ai parametri di input
    $caratteri = ($includeNumeri ? $numeri : "") . ($includeLettere ? $lettere : "") . ($includeSimboli ? $simboli : "");

    $password = "";
    // si fa un check se $caratteri è vuota o meno
    if (empty($caratteri)) {
        // se è vuota, la funzione restituisce il messaggio
        return "Nessun parametro valido inserito";
    } else {
        // se $duplicati è 'si', vengono generati caratteri casuali utilizzando la funzione rand() e concatenati alla stringa $password
        if ($duplicati == 'si') {
            for ($i = 0; $i < $length; $i++) {
                $password .= $caratteri[rand(0, strlen($caratteri) - 1)];
            }
            // se $duplicati è 'no'
        } else {
            // divide la stringa $caratteri in un array di caratteri
            $lettereArray = str_split($caratteri);
            // array_unique rimuove tutti i caratteri duplicati presenti in $lettereArray e si genera una password con caratteri unici
            $lettereArray = array_unique($lettereArray);
            // mescola in maniera casuale gli elementi
            shuffle($lettereArray);
            for ($i = 0; $i < $length; $i++) {
                $password .= $lettereArray[$i];
            }
        }
        // restituisce la password generata
        return $password;
    }
}
?>