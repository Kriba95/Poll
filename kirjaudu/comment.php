
  <?php
$json = file_get_contents('php://input');
$pollData = json_decode($json);
$data = array();

//MUUTTUJAT

$teksti = $_POST['teksti'];
$id = $_POST['id'];




include_once 'pollconnect.php';






// $comment

try {
    $stmt = $conn->prepare("INSERT INTO comments (teksti, poll_id) 
                        VALUES(:teksti, :poll_id );");


    $stmt->bindParam(':teksti', $teksti);
    $stmt->bindParam(':poll_id', $id);

 


    if($stmt->execute() == false){
        $data = array(
            'errroe' => ' erere lisätty'
        );
    } else {
        $data = array(
            'onnistui' => 'JEES!!'
        );
    } 
}   catch (PDOException $e) {
    $data = array(
        'ONNISTUIIIIIIIIIIIII' => $e->getMessage()
    );
}










header('Content-Type', 'application/x-www-form-urlencoded');
//header("Content-type: application/json;charset=utf-8");

echo json_encode($data);