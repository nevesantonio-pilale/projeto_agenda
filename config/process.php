<?php

    session_start();
    include_once("conection.php");
    include_once("url.php");

    $query = "SELECT * FROM contactes";

    $contacts = [];

    $stmt = $conn->prepare($query);
    $stmt->execute();

    $contacts = $stmt->fetchALL();
