<?php 
    include_once('header.php');
?>

<section>
<div class="container">
  
  <h1>Which is better drink (example)</h1>
  <h2 style="display:inline;">
      <b><span>Start:</span></b> 
      <span id="aloitus">01.06.2021</span>
      <br>
      <b><span>End:</span></b> 
      <span id="lopetus">28.06.2021  <b>Time:</b> 14.25</span>
  </h2>
  <br>
  <br>
<p id="Description">Fanta, Sprite, Coce, Jaffa, Pepsi?</p> 

  <div id="msg" class="alert alert-dismissible alert-warning d-none wow bounce" style="display: none;">
    <button id="sulje" type="button" class="close large" style="" data-dissmiss="alert">×</button>
    <h4 class="alert-heading"></h4>
    <p class="mb-0"></p>
  </div>
</section>

<section>
<div class="container wow pulse">
    <div class="row">
      <div id="vasenikkuna" class="col-xs-12 col-md-6">
        <ul id="vaihtoehdotUl" class="list-group"><p class="list-group-item" data-vaihtoehtoid="18" style="cursor: pointer; padding-top: 7px; padding-bottom: 7px; border-block-color: black; background-color: #333; color: #fff; margin-bottom: 5px; margin-top: 5px; padding-right: 6px; font-size: 20px; padding-left: 10px;">Fanta<button class="btn-primary" style="float: right; margin-top: -4px;" data-vaihtoehtoid="18">Vote</button></p><p class="list-group-item" data-vaihtoehtoid="19" style="cursor: pointer; padding-top: 7px; padding-bottom: 7px; border-block-color: black; background-color: #333; color: #fff; margin-bottom: 5px; margin-top: 5px; padding-right: 6px; font-size: 20px; padding-left: 10px;">Coca-cola<button class="btn-primary" style="float: right; margin-top: -4px;" data-vaihtoehtoid="19">Vote</button></p><p class="list-group-item" data-vaihtoehtoid="20" style="cursor: pointer; padding-top: 7px; padding-bottom: 7px; border-block-color: black; background-color: #333; color: #fff; margin-bottom: 5px; margin-top: 5px; padding-right: 6px; font-size: 20px; padding-left: 10px;">Pepsi<button class="btn-primary" style="float: right; margin-top: -4px;" data-vaihtoehtoid="20">Vote</button></p><p class="list-group-item" data-vaihtoehtoid="21" style="cursor: pointer; padding-top: 7px; padding-bottom: 7px; border-block-color: black; background-color: #333; color: #fff; margin-bottom: 5px; margin-top: 5px; padding-right: 6px; font-size: 20px; padding-left: 10px;">Jaffa<button class="btn-primary" style="float: right; margin-top: -4px;" data-vaihtoehtoid="21">Vote</button></p></ul>
<br>
<br>

        <h4>Current situation</h4>
        <ul id="aanetUl" class="list-group"><li class="list-group-item">Fanta : 1<span class="badge-primary"></span></li><li class="list-group-item">Coca-cola : 4<span class="badge-primary"></span></li><li class="list-group-item">Pepsi : 1<span class="badge-primary"></span></li><li class="list-group-item">Jaffa : 0<span class="badge-primary"></span></li></ul>



      </div>
      <div id="chartti" class="col-xs-12 col-md-6" style="display: block;">
        <img class="example" src="./assets/images/example.png" alt="">




      </div>

    </div>
    <div class="inputgroup">
    </div>

</div>
</section>

<section>
<div class="container">
  <div class="row">
    <div class="col-">
          <ul id="kommentUl" class="list-group"><div class="d-flex justify-content-center py-2"><div class="second py-2 px-2" style="border-style: solid; border-color: rgb(234 234 234);"><div class="d-flex justify-content-between py-1 pt-2"><div class="div"><img src="./assets/images/question.png" width="70px" style="padding-top: 5px; padding-left: 5px;"><span style="margin-top: 30px; margin-left: 10px;">I like Sprite more...</span></div><hr style="border-top: 1px solid #eeeeee; margin-top: 0px; margin-bottom: 0px; max-width: 95%;"><span style="margin-right:10px; margin-left: 38px;">Anonymous | </span><span style="margin-left: -5px; cursor: pointer;" tabindex="1" class="voted" data-commentid="15">Upvote  </span><i class="fa fa-thumbs-o-up voted" style="" data-commentid="15"></i>3</div></div></div><div class="d-flex justify-content-center py-2"><div class="second py-2 px-2" style="border-style: solid; border-color: rgb(234 234 234);"><div class="d-flex justify-content-between py-1 pt-2"><div class="div"><img src="./assets/images/question.png" width="70px" style="padding-top: 5px; padding-left: 5px;"><span style="margin-top: 30px; margin-left: 10px;">😁😁</span></div><hr style="border-top: 1px solid #eeeeee; margin-top: 0px; margin-bottom: 0px; max-width: 95%;"><span style="margin-right:10px; margin-left: 38px;">Anonymous | </span><span style="margin-left: -5px; cursor: pointer;" tabindex="1" class="voted" data-commentid="16">Upvote  </span><i class="fa fa-thumbs-o-up voted" style="" data-commentid="16"></i>1</div></div></div></ul>
          <form name="komment">
          <fieldset>
          <h4>Comment</h4>

              <div class="inputgroup">
                  <div class="msgtwo error"></div>                                

                  <input id="teksti" style="width: 100%; float: left;" class="inputgroup" type="text" name="teksti" placeholder="Comment">
                  <a style="float: right;" type="submit" class="btn btn-primary" name="komment">Comment</a>


              </div>
              <div class="row">
</div>

              </fieldset>




    </form></div>
  </div>
</div>
</section>

<?php 
    include_once('footer.php');
?>
