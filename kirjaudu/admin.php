<?php 
  session_start(); 

 
  if (!isset($_SESSION['username'] == "admin")) {
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
YOU ARE NOW ALLOWED TO BE HERE!!



<div class="">
    <div class="container">
        <div class="row">

            <div class="col-xs-12">
               <img class="img-responsive" src="../assets/images/img-01.jpg">
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

                      <?php  if (isset($_SESSION['admin'])) : ?>
                      <p>Tervetuloa, tehtövä14 <strong><?php echo $_SESSION['admin']; ?>!</strong></p>
                      <?php endif ?>

                    </h1>
                     </div>   
                        <p class="section-container-spacer">
                        
                        
                        
                        <?php $sql = "SELECT * FROM user";
                          $result = $con->query($sql);
                              if ($result->num_rows > 0) {
                                  while($row = $result->fetch_assoc()) {
                                      echo "<p>". $row["nimi"]."</p>";
                                      } 
                              } $con->close(); 
                        ?>                          
                        
                        
                        
                            Auctor augue mauris augue neque. Posuere lorem ipsum dolor sit amet consectetur adipiscing. Porta
                            non pulvinar neque laoreet. Viverra ipsum nunc aliquet bibendum. Iaculis urna id volutpat lacus.
                            Turpis egestas pretium aenean pharetra magna ac. Id cursus metus aliquam eleifend mi. Odio tempor
                            orci dapibus ultrices in iaculis. Lacus luctus accumsan tortor posuere ac ut consequat semper.
                            Tincidunt ornare massa eget egestas purus viverra accumsan. Odio euismod lacinia at quis. Sit
                            amet nulla facilisi morbi. At varius vel pharetra vel turpis nunc eget lorem dolor. Feugiat vivamus
                            at augue eget. Feugiat nisl pretium fusce id velit ut. Venenatis tellus in metus vulputate eu
                            scelerisque felis imperdiet. Ut placerat orci nulla pellentesque. Laoreet suspendisse interdum
                            consectetur libero id.
                        </p>

                    <div class="row section-container-spacer">
                        <div class="col-md-6">
                            <img class="img-responsive" src="../assets/images/img-03.jpg">
                        </div>
                        <div class="col-md-6">
                            <img class="img-responsive" src="../assets/images/img-02.jpg">
                        </div>
                    </div>

               </div>
                          
                <div class="col-xs-12 col-md-8 col-md-offset-2">
              
                    <h2>Omat äänestys kohteet</h2>
                    <button class="btn btn-info" onclick="showPolls(data,'current')">Nykyiset</button>
                    <button class="btn btn-info" onclick="showPolls(data,'old')">Vanhat</button>
                    <button class="btn btn-info" onclick="showPolls(data,'future')">Tulevat</button>
                    <ul id="votesUl" class="list-group">
                    </ul>
                </div>

                <div class="col-xs-12 col-md-8 col-md-offset-2">
              
              <h2>Omat äänet</h2>
              <button class="btn btn-info" onclick="showMypoll(mydata,'current')">Nykyiset</button>
              <button class="btn btn-info" onclick="showMypoll(mydata,'old')">Vanhat</button>
              <button class="btn btn-info" onclick="showMypoll(mydata,'future')">Tulevat</button>
              <ul id="votesMyUl" class="list-group-my">
              </ul>
          </div>  





            </div>
           
      </div>



        </div>

    </div>



</div>




<script src="../js/admin.js"></script>
<script src="../js/getMypolls.js"></script>




<?php 
    include_once('footer.php');
?>