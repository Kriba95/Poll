<?php 
    include_once('header.php');
?>

<div class="container">
    <div class="row">                 
        <h2>All listed polls</h2>
        <button class="btn btn-info" onclick="showPolls(data,'current')">Current</button>
        <button class="btn btn-info" onclick="showPolls(data,'old')">Old</button>
        <button class="btn btn-info" onclick="showPolls(data,'future')">Future</button>
        <ul id="votesUl" class="list-group">
        </ul>
    </div>
</div>        

<script src="./js/getpollAll.js"></script>

<?php 
    include_once('footer.php');
?>
