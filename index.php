<?php

    // include './app/includes/autoloader.inc.php';
    // autoloadclass(0);
    include 'app/classes/Page.class.php'; 
    // Save the current URI in Session
    $_SESSION['prev_uri'] = Page::getCurrentURI();
    include 'app/resources/views/layouts/app/header.layout.php';    

    // Save the current URI in Session
    $_SESSION['prev_uri'] = Page::getCurrentURI();
?>
<style>
 .colors {
   position: absolute;
   width: 100%;
   height: 500px;
   left: 0;
   background: rgb(99,102,241);
background: linear-gradient(90deg, rgba(99,102,241,1) 0%, rgba(236,72,153,1) 100%, rgba(0,212,255,1) 100%);   
 }
 .centered {
   position: relative;
   top: 100px;
   padding-left: 10%;
   padding-right: 10%;
 }
</style>
<div class="container-fluid colors">
  <div class="row centered">
    <div class="col-sm-6">
      <h1 class="my-4 text-5xl font-bold leading-tight">RFID Based Student<br/> 
        Gate Pass With SMS<br/> 
        Notification And Web<br/> 
        Based Monitoring
      </h1>
    </div>

    <div class="col-sm-6">
      <img src="public\dist\img\landingpage2.png" style="width:80%">
    </div>
  </div>
</div>
<?php
    include 'app/resources/views/layouts/app/footer.layout.php';
?>