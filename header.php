<!DOCTYPE html>
<html lang="en">
  <!--Created by Kriba, 2021. VoteApp, 1.3v All rights rightsreserved -->
<head>
  <meta charset="UTF-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width,initial-scale=1" name="viewport">
  <meta content="description" name="description">
  <meta name="google" content="notranslate" />
  <!-- Disable tap highlight on IE -->
  <meta name="msapplication-tap-highlight" content="no">
  <link href="./assets/apple-touch-icon.png" rel="apple-touch-icon">

  <title>Online Poll App</title>  

<link href="./css/main.css" rel="stylesheet"></head>

<body>
<header>

<div class="topnav" style="margin-top: -80px;" id="myTopnav">
  <a href="newPoll.php" class="active">Create new</a>
  <a href="./kirjaudu/kirjaudu.php" style="font-size: 17px; right: 108px;" class="bractive">Login</a>
  <div style="float: left;">
    <a> </a>
    <a href="newPoll.php">Create New Poll</a>
    <a href="listed.php">Listed Polls</a>
    <a href="index.php">Options Poll</a>

    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
    </a>
  </div>    
</div>

<script>
  function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
</script>

</header>