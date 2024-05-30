<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "dbteatro";

    $connessione = new mysqli($host, $user, $password, $database);

    if(!$connessione)
    {
        die("Errore! : " . $connessione->connection_error);
    }