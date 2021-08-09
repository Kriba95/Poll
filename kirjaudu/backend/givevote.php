<?php
// Lähettää äänen tietokantaan
if (!isset($_GET['id'])){
    header('Location: ../index.php');
  }
  
  $vaihtoehtoid = $_GET['id'];


  include_once '../pollconnect.php';
  


/*

tarkistaa onko äänestäjä äänestänyt
*/
$data = array();

  try {
    $stmt = $conn->prepare("SELECT id, aloitus, lopetus 
    FROM poll 
    WHERE id = (
        SELECT poll_id 
        FROM vaihtoehto 
        WHERE id = :vaihtoehtoid
        );");

    $stmt->bindParam(':vaihtoehtoid', $vaihtoehtoid);
    
    if ($stmt->execute() == false){
        $data[] = 'error';
    } else {

        $poll = $stmt->fetch(PDO::FETCH_ASSOC);
        //Hakee äänestyksen id
        $pollid = $poll ['id'];

        // aloitus ja lopetus timestamp
        $current_timestamp = time();
        $aloitus_timestamp = strtotime($poll['aloitus']);
        $lopetus_timestamp = strtotime($poll['lopetus']);


        

        // Selvittää onko äänestänyt

        $cookie_name = "poll_$pollid";

        if ($lopetus_timestamp < $current_timestamp) {
            $data['warning'] = 'The voting has expired.';
        } else if ($aloitus_timestamp > $current_timestamp) {
            $data['warning'] = 'Voting has not yet begun.';
        } else if (isset($_COOKIE[$cookie_name])){
            $data['warning'] = 'You have already voted!';
        }



    }

    

 


    // Jos ei ole varoitusta jatkaa normaalisti
    if (!array_key_exists('warning',$data)){
        $stmt = $conn->prepare("UPDATE vaihtoehto 
                                SET votes = votes + 1 
                                WHERE (id = :vaihtoehtoid);");

        $stmt->bindParam(':vaihtoehtoid', $vaihtoehtoid);
    
        if ($stmt->execute() == false){
            $data['error'] = 'virhee';
        } else {
            $data['onnistui'] = 'Vote added';

            $cookie_name = "poll_$pollid";
            $cookie_value = 1;

            setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");

            
        }

    }
    
} catch (PDOException $e) {
    $data = array(
        'onnistui' => 'virhee'
    );
} 




header('Content-Type', 'application/x-www-form-urlencoded');
//header("Content-type: application/json;charset=utf-8");

echo json_encode($data);
