<?php

// REGOLE password:
// 1. lunga almeno 8 caratteri
// 2. contenere almeno un numero
// 3. contenere almeno un carattere maiuscolo
// 4. contenere almenoun carattere speciale

function check_password($password) {
    // Verifica se la lunghezza è di almeno 8 caratteri
    if (strlen($password) < 8) {
        return "La password deve essere lunga almeno 8 caratteri.";
    }

    // Verifica se contiene almeno un numero
    if (!preg_match('/\d/', $password)) {
        return "La password deve contenere almeno un numero.";
    }

    // Verifica se contiene almeno una lettera maiuscola
    if (!preg_match('/[A-Z]/', $password)) {
        return "La password deve contenere almeno una lettera maiuscola.";
    }

    // Verifica se contiene almeno un carattere speciale
    if (!preg_match('/[^\w\s]/', $password)) {
        return "La password deve contenere almeno un carattere speciale.";
    }

    // Se tutti i controlli sono passati
    return true;
}

// Uso un ciclo do/while per far si che ogni volta che l'utente sbaglia la password gli venga dato l'errore specifico e gli sia data la possibilità di inserire nuovamente la password
do {
    $password = readline('Inserisci qui la password:' . "\n");

    $result = check_password($password);

    if ($result !== true) {
        echo $result . "\n"; // Stampa l'errore e richiede la password
    }

} while ($result !== true);

echo "Password inserita correttamente.";