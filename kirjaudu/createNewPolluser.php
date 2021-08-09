<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "Sinun tätyy kirjautua ensin!";
  	header('location: kirjaudu_error.php');
      echo ($_SESSION);
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: kirjaudu_error.php");
  };
  ?>

<?php

if (!isset($POST['aihe']) || !isset($_POST['vaihtoehto1']))

//MUUTTUJAT
$aihe = $_POST['aihe'];
$aloitus = $_POST['aloitus'];
$lopetus = $_POST['lopetus'];
$viesti = $_POST['viesti'];
$username = $_SESSION['username'];



include_once 'pollconnect.php';






try {
    $stmt = $conn->prepare("INSERT INTO poll (aihe, aloitus, lopetus, username) 
                        VALUES(:aihe, :aloitus, :lopetus, :username);");


    $stmt->bindParam(':aihe', $aihe);
    $stmt->bindParam(':aloitus', $aloitus);
    $stmt->bindParam(':lopetus', $lopetus);
    $stmt->bindParam(':username', $username);

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

// vaihtoehdot

//etsii Vaihtoehdot riviltä 10+ merkkiset vaihtoehdosta eteenpäin
$vaihtoehdot = array();

foreach ($_POST as $key => $value) {
    if (substr($key, 0, 10) == 'vaihtoehto') {
        $vaihtoehdot[] = $value;
    }
}


// $poll_id = username viimesimmän sarakkeen id
$poll_id = $conn->lastInsertId();
try {
    
     foreach($vaihtoehdot as $vaihtoehto){
        $stmt = $conn->prepare("INSERT INTO vaihtoehto (name, poll_id) VALUES (:name, :poll_id);");
        $stmt->bindParam(':name', $vaihtoehto); // siirtä arrayn nimi kantaan. yksitellen
        $stmt->bindParam(':poll_id', $poll_id);

        if($stmt->execute() == false){
            $data = array(
                'errroe' => ' erere lisätty'
            );
        } else {
            $data = array(
                'onnistui' => $poll_id
            );
        }
    }
}  catch (PDOException $e) {
    $data = array(
        'onnistui' => $e->getMessage()
    );
}











header('Content-Type', 'application/x-www-form-urlencoded');
//header("Content-type: application/json;charset=utf-8");

echo json_encode($data);