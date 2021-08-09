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
                      <p>Welcome, <strong><?php echo $_SESSION['username']; ?>!</strong></p><hr>
                      <?php endif ?>

                    </h1>
                     </div>   
                        <p class="section-container-spacer">
                        
                        
                                              
                        
                        
                        



                    <section Poll>
                        <form name="newPoll">
                        <fieldset>
                        <h4>Create vote</h4>

                            <div class="inputgroup">
                                <div class="msgtwo error"></div>                                
                                <label for="aihe">Topic</label>
                                <input id="aihe" style="width: 80%;" class="inputgroup" type="text" name="aihe" placeholder="Topic">
                            </div>
                            <div class="inputgroup">
                                <label for="viesti">Description</label>
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
                            
                            <button class="btn-info" id="addOptioon">Add Option</button>
                            <button id="poista" class="btn-info ">Delete</button>


                            <div class="inputgroup">
                            <div class="msg error"></div>
                            <label for="option1">Voting options:</label>
                                <input style="width: 80%;" type="text" class="inputgroup" name="vaihtoehto1" placeholder="Voting option 1">
                            </div> 

                            <div class="inputgroup">
                                <label for="option2">Voting option:</label>
                                <input  style="width: 80%;" type="text" class="inputgroup" name="vaihtoehto2" placeholder="Voting option 2">
                            </div> 
                            

                        
                        </fieldset>
                        <div class="inputgroup">
                                <button type="submit" class="btn btn-primary" name="newPoll">Continue</button>
                        </div>

                    </form>
                    </section Poll>


        </div>

    </div>



</div>
<script src="../js/uusaani.js"></script>




<?php 
    include_once('footer.php');
?>