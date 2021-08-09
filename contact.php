
<?php
require('connection.php');
$con = new mysqli($servername, $username, $password, $dbname);

// Jos yheteys epäonnistuu printtaa \n Yhteyttä
if ($con->connect_error) {
    die("Yhteys epäonnistui, tarkista: \n" . $con->connect_error);
} ?>
  
<?php 
    include_once('header.php');
?>




<div class="section-container no-padding">
    <div class="container">
        <div class="row">
           
            <div class="col-xs-12">

                <div class="row">
                    <div class="col-md-6">
                        <h2>Contact</h2>
                       
                        <form name="myform" action="mailer.php"  onsubmit="return validateForm()" method="POST">
                            <div class="form-group">
                                <input id="email" type="email" name="mail" class="form-control" placeholder="Email">
                                <div class="msg error"></div>
                            </div>
                            <div class="form-group">
                                <input id="nimi" type="text" name="nimi" class="form-control" placeholder="Name">
                                <div class="msgy error"></div>

                            </div>
                            <div class="form-group">
                                <input id="subject" type="text" name="subject" class="form-control" placeholder="Topic">
                                <div class="msgk error"></div>

                            </div>
                            <div class="form-group">
                                <textarea id="text" class="form-control" name="text" rows="3" placeholder="Message"></textarea>
                                <div class="msgn error"></div>

                                <br>
                                <button data-sitekey="6LfQ2tEaAAAAAJJg8SPjJfwQXxsnPh1JHAu4ZuCG" data-callback='onSubmit' data-action='submit' class="btn btn-primary g-recaptcha" type="submit">Send</button>
                            </div>       
                        </form>

                    </div>


                    <div class="col-md-5 col-md-offset-1">
                            
                
                    
                        <div>
                            <h3>Got Questions?</h3>
                        </div>
                        <div>
                            <p>
                            Send email to aspa@primocheck.com
                            </p>
                        </div>
                       
                    </div>
                </div>


            </div>

        </div>

    </div>
</div>



<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
   function onSubmit(token) {
     document.getElementById("myForm").submit();
   }
 </script>




<?php 
    include_once('footer.php');
?>