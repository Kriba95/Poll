

<?php
// Lähettää äänen tietokantaan
if (!isset($_GET['id'])){
    header('Location: ../index.php');
  }
  
  $vaihtoehtoid = $_GET['id'];

  include_once '../pollconnect.php';
  



  
  try {         
    $stmt = $conn->prepare("UPDATE vaihtoehto SET votes = votes + 1 WHERE (id = :vaihtoehtoid);");

    $stmt->bindParam(':vaihtoehtoid', $vaihtoehtoid);

    if ($stmt->execute() == false){
        $data = array(
            'error' => 'virhee'
        );
    } else {
        $data = array(
            'Onnistui' => 'Ääni listätty'
        );
        
    }
} catch (PDOException $e) {
    $data = array(
        'onnistui' => 'virhee'
    );
}

header('Content-Type', 'application/x-www-form-urlencoded');
//header("Content-type: application/json;charset=utf-8");

echo json_encode($data);


