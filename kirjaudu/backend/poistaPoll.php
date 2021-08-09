<?php
// Tarkista Functiot ja muut debug systeemit lisää session based "poisto tsydeemi" eli poistaa tietokannasta username.
if (!isset($_GET['id'])){
    header('Location: ../index.php');
  }

  $poll_id = $_GET['id'];


  include_once '../pollconnect.php';

  try {         
    $stmt = $conn->prepare("DELETE FROM vaihtoehto WHERE poll_id = :pollid;");
    $stmt->bindParam(':pollid', $poll_id);

    
    if ($stmt->execute() == false){
        $data = array(
            'error' => 'virhee'
        );
    } else {
        $data = array(
            'succes' => 'jees, all good'
        );
        
    }

    $stmt = $conn->prepare("DELETE FROM poll WHERE id = :pollid;");
    $stmt->bindParam(':pollid', $poll_id);

    if ($stmt->execute() == false){
        $data = array(
            'error' => 'virhee'
        );
    } else {
        $data = array(
            'succes' => 'Onnistui'
        );
        
    }

} catch (PDOException $e) {
    $data = array(
        'virhereaes' => 'virhee'
    );
}

header('Content-Type', 'application/x-www-form-urlencoded');

echo json_encode($data);



  
