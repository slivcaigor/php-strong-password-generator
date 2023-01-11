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
?>