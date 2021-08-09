<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'primocheck.site';			  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'noreply@primocheck.site';                 // SMTP username
        $mail->Password = 'Julmasami1';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                           // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;
                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('noreply@primocheck.site');
	    $mail->addReplyTo("asiakaspalvelu@primocheck.site", "Vastaa viestiin");

       									  // Add a recipient
 	   
      
        $mail->addAddress($_POST['mail'], 'asiakaspalvelu@primocheck.site');
   
	//Variables
	
	$nimi = $_POST['nimi'];
	$puhnmr = $_POST['puhnmr'];
	$text = $_POST['text'];


        //Content
        $mail->isHTML(true);  
                               
        $mail->Subject = $_POST['subject'];
	    $mail->Body = "<h2>Kiitos viestistä, <b>".$nimi.".</h2></b><br>Puhelinnumerosi on <b>".$puhnmr."</b><br><br>Viestisi<br><br>.$text.<br><br><br><br><hr><br> <p>Otan mahdollisimman nopeasti yhteyttä.</p><p>Ystävällisin terveisin,<b> Kristian.</b></p>";


 	

        $mail->send();
    	echo 'Message has been sent';
     //header('Location: https://www.primocheck.site/viesti.php');
        exit();
    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
    ?>