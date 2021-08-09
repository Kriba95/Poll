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



<?php 
if (!isset($_GET['id'])){
  header('');
}

$id = intval($_GET['id']);
?>

<div class="container">
  
  <h1></h1>
  <h2 style="display:inline;">
      <b><span>Start:</span></b> 
      <span id="aloitus"></span>
      <br>
      <b><span>End:</span></b> 
      <span id="lopetus"></span>
  </h2>
  <h4 id="Description">Description</h4>
  <p></p>

 

  <div id="msg" class="alert alert-dismissible alert-warning d-none wow bounce">
    <button id="sulje" type="button" class="close large" style="" data-dissmiss="alert">&times;</button>
    <h4 class="alert-heading"></h4>
    <p class="mb-0"></p>
  </div>





</div>

<div class="container wow pulse">
    <div class="row">
      <div id="vasenikkuna" class="col-xs-12 col-md-6">
        <ul id="vaihtoehdotUl" class="list-group"></ul>
<br>
<br>

        <h4>Current situation</h4>
        <ul id="aanetUl" class="list-group"></ul>



      </div>
      <div id="chartti" class="col-xs-12 col-md-6">
      <canvas id="myChart" ></canvas>





      </div>

    </div>
    <div class="inputgroup">
    </div>

</div>
<div class="container">
  <div class="row">
    <div class="col-">
          <ul id="kommentUl" class="list-group"></ul>
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

              </fieldset>




    </div>
  </div>
</div>





<script src="../js/vote.js"></script>
<script src="../js/common.js"></script>
<script src="../js/wow.min.js"></script>



<script src="../js/results.js"></script>
<script src="../js/comment.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.0/dist/chart.min.js"></script>

<?php 
    include_once('footer.php');
?>