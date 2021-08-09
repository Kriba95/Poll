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
require('connection.php');
$con = new mysqli($servername, $username, $password, $dbname);

// Jos yheteys epäonnistuu printtaa \n Yhteyttä
if ($con->connect_error) {
    die("Yhteys epäonnistui, tarkista: \n" . $con->connect_error);
} ?>

<?php 
    include_once('header.php');
?>




<div class="">
    <div class="container">
        <div class="row">

            <div class="col-xs-12">
            </div>
        </div>
    </div>
</div>

<div class="section-container">
    <div class="container">
        <div class="row">
               <div class="col-xs-12 col-md-8 col-md-offset-2">
                    <div class="text-center">
                    <h1>    

                      <?php  if (isset($_SESSION['username'])) : ?>
                      <p>Welcome, <strong><?php echo $_SESSION['username']; ?>!</strong></p>
                      <?php endif ?>

                    </h1>
                     </div>   
                        <p class="section-container-spacer">
                        
                        
                        
                        
                        
                        
                        

<hr>

                    <section Poll>
                        <form name="editPoll">
                        <fieldset>
                        <h4>Modify poll</h4>

                            <div class="inputgroup">
                                <label>Topic:</label>
                                <div class="msgtwo error"></div>                                
                            <input type="hidden" name="id">
                                <input id="aihe" style="width: 80%;" style="width: 80%;" class="inputgroup" type="text" name="aihe" placeholder="Topic">
                            </div>
                            <div class="inputgroup">
                                <label for="viesti">Description:</label>
                                <div class="msgtwoviesti error"></div>                           
                                <textarea id="viesti" style="width: 80%; border-radius: 5px;" class="inputgroup" type="textarea" name="viesti" placeholder="Event details (optional)"></textarea>
                            </div>
                            <div class="inputgroup">
                                <label for="start">Start:</label>
                                <div class="msgdate error"></div>

                                <input style="width: 45%;" type="datetime-local" class="inputgroup" name="aloitus">
                            </div>
                            <div class="inputgroup">

                                <label for="stop">End:</label>
                                <div class="msgend error"></div>

                                <input style="width: 45%;" type="datetime-local" class="inputgroup" name="lopetus" >
                            </div>
        
                            <h4>Options</h4> 
                            
                            <button class="btn-info" id="addOptioon">Add option</button>
                            <button id="poista" class="btn-info">Delete</button>
                            <div class="msg error"></div>




                        
                        </fieldset>

                        
                        <div class="inputgroup">
                            <button type="submit" class="btn-primary" name="newPoll">Continue</button>
                        </div>

                    </form>
                    </section Poll>




        </div>

    </div>



</div>
<script src="../js/editPoll.js"></script>





<?php 
    include_once('footer.php');
?>