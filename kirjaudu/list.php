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
                      <p>Welcome,  <strong><?php echo $_SESSION['username']; ?>!</strong></p>
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
              
                    <h2>Listed polls</h2>
                    <button class="btn btn-info" onclick="showPolls(data,'current')">Current</button>
                    <button class="btn btn-info" onclick="showPolls(data,'old')">Old</button>
                    <button class="btn btn-info" onclick="showPolls(data,'future')">Future</button>
                    <ul id="votesUl" class="list-group">
                    </ul>
                </div>

              
  
           
           
          </div>
               </div>



            </div>
           
      </div>



        </div>

    </div>



</div>







<script src="../js/getpolls.js"></script>




<?php 
    include_once('footer.php');
?>
