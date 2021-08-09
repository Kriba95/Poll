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
    include_once('header.php');
?>




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
                        
                        
                        
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>

                        
                      
               <div class="container">
                   <div class="row">
                        <div class="col-">
                            <h2>My polls</h2>
                            <button class="btn btn-info" onclick="showPoll(dataM,'all')">All</button>
                            <button class="btn btn-info" onclick="showPoll(dataM,'current')">Current</button>
                            <button class="btn btn-info" onclick="showPoll(dataM,'old')">Old</button>
                            <button class="btn btn-info" onclick="showPoll(dataM,'future')">Future</button>
                            <ul id="voteUl" class="list-group">
                        </ul>
                        <div id="non">
                        <p class="list-group-item-dark"><b>Looks empty.</b> <a href="./newPoll.php">Create new</a> poll or browse for others. <a href="./list.php">Here</a></p>

                        <br>
                        <br>
                        <br>
                        <br>                          
                        </div>
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
