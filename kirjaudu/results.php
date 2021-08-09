<?php 
    include_once('header.php');
?>


<?php session_start(); ?>
<?php 
if (!isset($_GET['id'])){
  header('');
}

$id = intval($_GET['id']);
?>

<div class="container">
  
  <h1></h1>

  <ul id="vaihtoehdotUl" class="list-group">
  <canvas id="myChart" width="400" height="400"></canvas>




  </ul>
<!--
    <li class="list-group-item" >Auto<button class="btn btn-info float-right">Äänestä</button></li>
    <li class="list-group-item" >Auto</li>
    <li class="list-group-item" >Auto</li>

  -->


</div>

<script src="../js/results.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.0/dist/chart.min.js"></script>

<?php 
    include_once('footer.php');
?>