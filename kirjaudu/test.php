


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
<div class="container justify-content-center mt-5 border-left border-right">
    <div class="d-flex justify-content-center pt-3 pb-2"> <input type="text" name="text" placeholder="+ Add a note" class="form-control addtxt"> </div>
    <div class="d-flex justify-content-center py-2">
        <div class="second py-2 px-2"> <span class="text1">Type your note, and hit enter to add it</span>
            <div class="d-flex justify-content-between py-1 pt-2">
                <div><img src="https://i.imgur.com/AgAC1Is.jpg" width="18"><span class="text2">Martha</span></div>
                <div><span class="text3">Upvote?</span><span class="thumbup"><i class="fa fa-thumbs-o-up"></i></span><span class="text4">3</span></div>
            </div>
        </div>
    </div>



    <div class="d-flex justify-content-center py-2">
        <div class="second py-2 px-2"> <span class="text1">Type your note, and hit enter to add it</span>
            
        <div class="d-flex justify-content-between py-1 pt-2">
        
                <div><img src="https://i.imgur.com/tPvlEdq.jpg" width="18"><span class="text2">Curtis</span></div>
                <div><span class="text3">Upvote?</span><span class="thumbup"><i class="fa fa-thumbs-o-up"></i></span><span class="text4">3</span></div>
            </div>
        </div>
    </div>



    <div class="d-flex justify-content-center py-2">
        <div class="second py-2 px-2"> <span class="text1">Type your note, and hit enter to add it</span>
            <div class="d-flex justify-content-between py-1 pt-2">
                <div><img src="https://i.imgur.com/gishFbz.png" width="18" height="18"><span class="text2">Beth</span></div>
                <div><span class="text3 text3o">Upvoted</span><span class="thumbup"><i class="fa fa-thumbs-up thumbupo"></i></span><span class="text4 text4i">1</span></div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center py-2 pb-3">
        <div class="second py-2 px-2"> <span class="text1">Type your note, and hit enter to add it</span>
            <div class="d-flex justify-content-between py-1 pt-2">
                <div><img src="https://i.imgur.com/tPvlEdq.jpg" width="18"><span class="text2">Curtis</span></div>
                <div><span class="text3">Upvote?</span><span class="thumbup"><i class="fa fa-thumbs-o-up"></i></span><span class="text4 text4o">1</span></div>
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
                      <p>Tervetuloa,  <strong><?php echo $_SESSION['username']; ?>!</strong></p>
                      <?php endif ?>

                    </h1>
                     </div>   
                        <p class="section-container-spacer">
                        
                        
                        
                                               
                        </div>
                        </div>
                        </div>
                        </div>
             lo           </div>
                        </div>
                        </div>

                        
                      
               <div class="container">
               <div class="container justify-content-center mt-5 border-left border-right">
    <div class="d-flex justify-content-center pt-3 pb-2"> <input type="text" name="text" placeholder="+ Add a note" class="form-control addtxt"> </div>
    <div class="d-flex justify-content-center py-2">
        <div class="second py-2 px-2"> <span class="text1">Type your note, and hit enter to add it</span>
            <div class="d-flex justify-content-between py-1 pt-2">
                <div><img src="https://i.imgur.com/AgAC1Is.jpg" width="18"><span class="text2">Martha</span></div>
                <div><span class="text3">Upvote?</span><span class="thumbup"><i class="fa fa-thumbs-o-up"></i></span><span class="text4">3</span></div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center py-2">
        <div class="second py-2 px-2"> <span class="text1">Type your note, and hit enter to add it</span>
            <div class="d-flex justify-content-between py-1 pt-2">
                <div><img src="https://i.imgur.com/tPvlEdq.jpg" width="18"><span class="text2">Curtis</span></div>
                <div><span class="text3">Upvote?</span><span class="thumbup"><i class="fa fa-thumbs-o-up"></i></span><span class="text4">3</span></div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center py-2">
        <div class="second py-2 px-2"> <span class="text1">Type your note, and hit enter to add it</span>
            <div class="d-flex justify-content-between py-1 pt-2">
                <div><img src="https://i.imgur.com/gishFbz.png" width="18" height="18"><span class="text2">Beth</span></div>
                <div><span class="text3 text3o">Upvoted</span><span class="thumbup"><i class="fa fa-thumbs-up thumbupo"></i></span><span class="text4 text4i">1</span></div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center py-2 pb-3">
        <div class="second py-2 px-2"> <span class="text1">Type your note, and hit enter to add it</span>
            <div class="d-flex justify-content-between py-1 pt-2">
                <div><img src="https://i.imgur.com/tPvlEdq.jpg" width="18"><span class="text2">Curtis</span></div>
                <div><span class="text3">Upvote?</span><span class="thumbup"><i class="fa fa-thumbs-o-up"></i></span><span class="text4 text4o">1</span></div>
            </div>
        </div>
    </div>
</div>
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
