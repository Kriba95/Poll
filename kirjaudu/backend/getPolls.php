<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {

  }

?>





<?php
//Pieni muutos koodissa. koska minulla ei ole "User_id" nimellistä kantaa mysqlissä yritän hakea nimeä sessionista joka on yläpuolella, 
//sessiion on tallenettu käyttäjän username =  "käyttäjänimi". ja näin saan nimen tallenettua localiin, en ole varma onko oikea tapa,  
//mutta se toimii // näin kun kopion rivi riviltä opin debuggaamalla itse koodin ja sen eri vaiheet minkä itse nään parhaana oppimiskeinona.
// Huomaan jo tässä että adminiin pitää kehitellä jotain erikoista että se muuttuu ns.superkäyttäjäksi, voin ehkä sallia 
// $sessionissa pelkästään "admin" nimisen käyttäjän muokkaamaan koko tietokantaa. Tätä mietin tässä vaiheessa. 
//eiku itse asiassa kokeilen if username = admin" niin silloin annan hänen muokata. Eli tarvitaan 3 statementtiä/conditionia=false, admin ja rekisteröityneet

if (!isset($_SESSION['username'])){ //jos ei ole kirajutunut
    $username = false;
} else { 
    $username = $_SESSION['username']; //jos kirjautunut
}


include '../pollconnect.php';











try { 

    if ($username == false) {
        $stmt = $conn->prepare("SELECT id, aihe, aloitus, lopetus, username FROM poll");
    } else {
        $stmt = $conn->prepare("SELECT id, aihe, aloitus, lopetus, username FROM poll WHERE username = :username");
        $stmt->bindParam(':username', $username);
    }



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

