
<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: kirjaudu_error.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: kirjaudu_error.php");
  }
?>

<?php


if (!isset($_SESSION['username'])){ //jos ei ole kirajutunut
  $username = false;
} else { 
  $username = $_SESSION['username']; //jos kirjautunut 
} 
$nimi = $_POST['nimi'];

include_once 'connection.php';

try {
    $stmt = $conn->prepare("INSERT INTO user (nimi, username) 
                        VALUES(:nimi, :username );");

    $stmt->bindParam(':nimi', $nimi);
    $stmt->bindParam(':username', $username);

    if($stmt->execute() == false){
        $com = array(
            'errroe' => ' erere lisätty'
        );
    } else {
        $com = array(
          header('Location: ./aviesti.php')
        );
    } 
}   catch (PDOException $e) {
    $com = array(
        'ONNISTUIIIIIIIIIIIII' => $e->getMessage()
    );
}