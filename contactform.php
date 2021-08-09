<?php 
use PHPMailer\PHPMailer\PHPMailer;

    if(isset($_POST['nimi']) && isset($_POST['email'])){
       $name = $_POST['nimi'];
       $email = $_POST['email'];
       $aihe = $_POST['aihe'];
       $viesti = $_POST['viesti'];
       
       require_once "/PHPMailer/PHPMailer.php";
       require_once "/PHPMailer/SMTP.php";
       require_once "/PHPMailer/Exception.php";

        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = "primocheck.site";
        $mail->SMTPAuth = true;
        $mail->Username = "noreply@primocheck.site";
        $mail->Password = 'Julmasami1';
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        $mail->isHTML(true);
        $mail->setFrom($email, $nimi);
        $mail->addAddress("kristian@primocheck.site");
        $mail->aihe = ("$email ($subject)");
        $mail->viesti = $viesti;

        if($mail->send()){
            $status = "success";
            $response = "Email is sent!";
        }
        else
        {
            $status = "failed";
            $response "Not Send" . $mail->ErrorInfo;
        }

        exit(json_encode(array("status" => $status, "response" => $response)));

       
    }
   
?>