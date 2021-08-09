<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: kirjaudu_error.php');
      $data = array(
          'error' => 'et ole kirjautunut'
      );

    header('Content-Type', 'application/x-www-form-urlencoded');
    //header("Content-type: application/json;charset=utf-8");
    

    echo json_encode($data);

      die();


  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: kirjaudu_error.php");
  }
?>


<?php 
$json = file_get_contents('php://input');
$pollData = json_decode($json);
$data = array();

try {
    $conn=new PDO('mysql:dbname=votedb;host=localhost','root',''); 

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// päivittää muokkaukset
try {
    $stmt = $conn->prepare("UPDATE poll SET aihe = :aihe, aloitus = :aloitus, lopetus = :lopetus, viesti = :viesti 
                            WHERE id = :id ;");
    $stmt->bindParam(":aihe", $pollData->aihe);
    $stmt->bindParam(":aloitus", $pollData->aloitus);
    $stmt->bindParam(":lopetus", $pollData->lopetus);
    $stmt->bindParam(":viesti", $pollData->viesti);
    $stmt->bindParam(":id", $pollData->id);

    if($stmt->execute() == false){
        $data['error'] = 'error modifypoll';
    } else {
        $data['succesc'] = 'Jees lähetetty';
    }

} catch (PDOException $e){
    $data['error'] = $e->getMessage();
}

// päivittää vaihtoehdot
try {

    foreach ($pollData->vaihtoehdot as $vaihtoehto){
        if(isset($vaihtoehto->id)){
            $stmt = $conn->prepare("UPDATE vaihtoehto SET name = :name
                                    WHERE id = :id;");
            $stmt->bindParam(":name", $vaihtoehto->name);
            $stmt->bindParam(":id", $vaihtoehto->id);
        } else {
            $stmt = $conn->prepare("INSERT INTO vaihtoehto (name, poll_id)
                                    VALUES (:name, :pollid)");
            $stmt->bindParam(":name", $vaihtoehto->name);
            $stmt->bindParam(":pollid", $pollData->id);

        } if ($stmt->execute() == false){
            $data['error'] = 'error modifypoll';
        } else {
            $data['succesc'] = ' vaihtoehto lähetetty jees';
        }


    }
} catch (PDOException $e){
    $data['error'] = $e->getMessage();
}


// poisto ominaisuus

try {

    foreach ($pollData->todelete as $vaihtoehto){
            $stmt = $conn->prepare("DELETE FROM vaihtoehto WHERE id = :id;");
            $stmt->bindParam(":id", $vaihtoehto->id);
         if ($stmt->execute() == false){
            $data['error'] = 'error poistossa';
        } else {
            $data['succesc'] = ' vaihtoehto poistettu jees';
        }
    }
}   catch (PDOException $e){
    $data['error'] = $e->getMessage();
    }






header("Content-type: application/json;charset=utf-8");
echo json_encode($data);

