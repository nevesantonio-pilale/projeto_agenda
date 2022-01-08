<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "agenda";

    try {

        //conexão
        $conn = new PDO ("mysql:host=$host; dbname=$db", $user, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch (PDOException $e) {
        //erro na conexão
        $erro = $e->getMessage();
        echo "Erro: $erro";
    }