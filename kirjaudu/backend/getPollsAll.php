<?php
//Hakee dabasesta 


include_once '../pollconnect.php';

try { 
    $stmt = $conn->prepare("SELECT id, aihe, aloitus, lopetus, username FROM poll");

    if ($stmt->execute() == false){
        die("Yhteys epäonnistui, tarkista: \n" . $conn->connect_error);
    } else {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $data = $result;
    }
} catch (PDOException $e) {
    $data = array(
        'error' => 'virhee'
    );
}

header('Content-Type', 'application/x-www-form-urlencoded');
//header("Content-type: application/json;charset=utf-8");
echo json_encode($data);

