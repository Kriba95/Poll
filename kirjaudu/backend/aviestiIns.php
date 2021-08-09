<?php

//MUUTTUJAT
$username = $_POST['username'];
$milloin = $_POST['milloin'];
$viesti = $_POST['viesti'];



include_once 'pollconnect.php';






try {
    $stmt = $conn->prepare("INSERT INTO viestitb (username, milloin, viesti) 
                        VALUES(:username, :milloin, :viesti);");


    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':milloin', $milloin);
    $stmt->bindParam(':viesti', $viesti);



    if($stmt->execute() == false){
        $data = array(
            'errroe' => ' erere lisätty'
        );
    } else {
        $data = array(
            'onnistui' => 'hello'
        );
    } 
}   catch (PDOException $e) {
    $data = array(
        'onnistui' => $e->getMessage()
    );
}



header("Content-type: application/json;charset=utf-8");

echo json_encode($data);