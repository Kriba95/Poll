<?php
// Lähettää äänen tietokantaan
if (!isset($_GET['id'])){
    header('Location: ../index.php');
  }
  
  $commentid = $_GET['id'];


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
        FROM comments 
        WHERE id = :commentid
        );");

    $stmt->bindParam(':commentid', $commentid);
    
    if ($stmt->execute() == false){
        $data[] = 'error';
    } else {

        $poll = $stmt->fetch(PDO::FETCH_ASSOC);
        //Hakee äänestyksen id
        $pollid = $poll ['id'];



        

        // Selvittää onko äänestänyt

        $cookie_name = "commentid_$commentid";

        if (isset($_COOKIE[$cookie_name])){
            $data['comment'] = 'Olet jo äänestänyt!';
        }



    }

    

 


    // Jos ei ole varoitusta jatkaa normaalisti
    if (!array_key_exists('comment',$data)){
        $stmt = $conn->prepare("UPDATE comments 
                                SET votes = votes + 1 
                                WHERE (id = :commentid);");

        $stmt->bindParam(':commentid', $commentid);
    
        if ($stmt->execute() == false){
            $data['error'] = 'virhee';
        } else {
            $data['voteonnistui'] = '';

            $cookie_name = "commentid_$commentid";
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
