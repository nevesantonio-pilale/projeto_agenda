<?php

    session_start();
    include_once("conection.php");
    include_once("url.php");

    $data = $_POST;
    /* MODIFICAÇÕES NO BANCO */
    if(!empty($data)) {

        print_r($data);

        // CRIAR CONTACTO
        if($data["type"] === "create") {
            
            $name = $data["name"];
            $contacto = $data["phone"];
            $observacao = $data["descriptions"];

            $query = "INSERT INTO contactes (nome, Phone, observations) VALUES (:name, :contacto, :observacao)";

            $stmt = $conn->prepare($query);
            
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":contacto", $contacto);
            $stmt->bindParam(":observacao", $observacao);

            try {

                $stmt->execute();
                $_SESSION["msg"] = "contacto criado com sucesso"; 
        
            }catch (PDOException $e) {
                //erro na conexão
                $erro = $e->getMessage();
                echo "Erro: $erro";
            }
        }

        // SELEÇÃO DE BANCO
    }else {

        $id;
        if(!empty($_GET)) {
            $id= $_GET["id"];
        }
        // RETORNA OS DADOS DE UM CONTACTO
        if (!empty($id)) {
            $query = "SELECT * FROM contactes WHERE id= :id ";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $contact = $stmt->fetch();

        }else {
            // RETORNA OS DADOS DE TODOS OS CONTACTOS
            $query = "SELECT * FROM contactes";

            $contacts = [];

            $stmt = $conn->prepare($query);
            $stmt->execute();

            $contacts = $stmt->fetchALL();
        }
    }

    // FECHAMENTO DE BANCO DE DADOS 
    $conn=null;