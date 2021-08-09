<?php



if (!isset($_GET['id'])){
    header('Location: ../index.php');
  }
  
  $pollid = $_GET['id'];
  
  


include '../pollconnect.php';

try { 
    $stmt = $conn->prepare("SELECT id, aihe, aloitus, lopetus, viesti, username FROM poll WHERE id = :pollid");

    $stmt->bindParam(':pollid', $pollid);

    if ($stmt->execute() == false){
        $data = array(
            'error' => 'virhee'
        );
    } else {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $data = $result;
    }
} catch (PDOException $e) {
    $data = array(
        'error' => 'virhee'
    );
}

//Haetaan vaihtoehdot
try { 
    $stmt = $conn->prepare("SELECT id, name, votes FROM vaihtoehto WHERE poll_id = :pollid");
    $stmt->bindParam(':pollid', $pollid);

    if ($stmt->execute() == false){
        $data = array(
            'error' => 'virhee'
        );
    } else {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $vaihtoehdot = $result;
        $data['vaihtoehdot'] = $vaihtoehdot;
    }
} catch (PDOException $e) {
    $data = array(
        'error' => 'virhee'
    );
}


//Haetaan Kommentit
try { 
    $stmt = $conn->prepare("SELECT id, teksti, votes, kayttaja FROM comments WHERE poll_id = :pollid");
    $stmt->bindParam(':pollid', $pollid);

    if ($stmt->execute() == false){
        $data = array(
            'error' => 'virhee'
        );
    } else {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $comment = $result;
        $data['comments'] = $comment;
    }
} catch (PDOException $e) {
    $data = array(
        'error' => 'virhee'
    );
}

header('Content-Type', 'application/x-www-form-urlencoded');
//header("Content-type: application/json;charset=utf-8");
echo json_encode($data);
