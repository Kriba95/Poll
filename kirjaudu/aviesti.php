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
require('maincomment.php');
$con = new mysqli($servername, $username, $password, $dbname);

// Jos yheteys epäonnistuu printtaa \n Yhteyttä
if ($con->connect_error) {
    die("Yhteys epäonnistui, tarkista: \n" . $con->connect_error);
} ?>

<?php 
    include_once('header.php');
?>




<div class="section-container">
    <div class="container">
        <div class="row">
               <div class="col-xs-12 col-md-8 col-md-offset-2">
                    <div class="text-center">
                    <h1>    

                    </h1>
                     </div>   
                        <p class="section-container-spacer">
                        
                        
                        
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>

                        







<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <h2>My polls</h2>
            <button class="btn btn-info" onclick="showPoll(dataM,'all')">All</button>
            <button class="btn btn-info" onclick="showPoll(dataM,'current')">Current</button>
            <button class="btn btn-info" onclick="showPoll(dataM,'old')">Old</button>
            <button class="btn btn-info" onclick="showPoll(dataM,'future')">Future</button>
            <ul id="voteUl" class="list-group"></ul>

            <div id="non">
                <p class="list-group-item-dark"><b>Looks empty.</b> <a href="./newPoll.php">Create new</a> poll or browse for others. <a href="./list.php">Here</a></p>
                <br><br><br><br>                          
            </div>  
        </div>


        <div class="col-xs-12 col-md-6">
        
<div class="container">
  <div class="row">
    <div class="col-">
          <ul id="" class="list-group"></ul>
          <form name="komment">
          <fieldset>
          <h4>Comment</h4>

              <div class="inputgroup">
                  <div class="msgtwo error"></div>                                

                  <input id="teksti" style="width: 100%; float: left;" class="inputgroup" type="text" name="teksti" placeholder="Comment">
                  <button style="float: right;" type="submit" class="btn btn-primary" name="komment">Comment</button>
                  <a href="../kirjaudu/" style="float: left;" class="btn btn-primary navbar-btn" title="">Go back</a>


              </div>
              <div class="row">
</div>

            
<div class="container wow pulse">
    <div class="teksti">
     
      <div id="maincomment" class="js-boksi">
        <h1 style="text-align: left;">Lisää nimi</h1>
        <form id="myForm" action="kukkuuhei.php" method="post">
        <span id="result"></span>        
        <input type="text" name="nimi" id="tekstin-lisays" placeholder="Nimi... Kiitos!">
        <button id="sub" class="Btn" pattern="[a-zA-Z0-9]*">Lähetä</button>
        </form> <!-- name="nimi" lähettää viestin/tallentaa arvon -->

      </div> 
      <ul id="kaverit">
      <!--  SELECT * FROM valitsee taulun mitä näyttää-->
              
      </ul>
    </div>
  </div>
    <br>




        </div>
    </div>
</div>
                        
              
                 
         

              
  
 



            </div>
           
      </div>



        </div>

    </div>



</div>




<script src="../js/omat.js"></script>








<?php 
    include_once('footer.php');
?>
