<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>  ette </title>
  <!-- BOOTSRAP & STUFF-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Back to normie bs -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="Account.css">
  <meta charset="utf-8">
</head>

<body>




  <a href="Register.html" class="btn btn-info btnhead register"  role="button">
    Zarejestruj się! </a>



  <div class = "flexnav page-header">

      <div class =" logo">
        <a class="spanhelp" href="index.html" >
          <span style="color: #bc152b; ">e</span><!--
          --><span style="color: #6699cc; ">tt</span><!--
          --><span style="color: #bc152b; ">e</span>
         </a>
      </div>
      <div class="btn-group flexbtngrp ">
          <button> <a class="navA" href="AnnounAdd.html" >Dodaj Ogłoszenie!</a> </button>
          <button> <a class="navA" href="Account.html"> Twój Profil </a> </button>
          <button> <a class="navA" href="index.html"> Ogłoszenia </a> </button>
          <button> <a class="navA" data-toggle="modal" data-target="#Login">Logowanie </a> </button>
      </div>


    </div>


    <!-- Modal -->
<div class="modal fade" id="Login" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">
  <div class =" logo-login">
    Logowanie w
    <a class="spanhelp" href="index.html" >
      <span style="color: #bc152b; ">e</span><!--
      --><span style="color: #6699cc; ">tt</span><!--
      --><span style="color: #bc152b; ">e</span>
     </a>
  </div>
</h4>
</div>
              <div class="modal-body">
               <form action="php/login.php" method="post">
                  Login / Email :<br>
                  <input type="text" name="login"><br>
                  Hasło :<br>
                  <input type="password" name="password"><br><br>
                  <input type="submit" value="Zaloguj">
                </form>
              </div>
<div class="modal-footer">
</div>
Testing
</div>

</div>
</div>



<!-- Modal END-->



    <div class='wrap'>
      <div class = "flexmanag" >

            <div class="flex acchead">

      <img class="awatar" src="awatar.jpg" alt="Twoje zdjęcie">

      <h2> Twój profil </h2>
      Tu możesz zarządzać swoimi danymi oraz ogłoszeniami.
      </div>

      <div class="flex accpanel">
           <button class="buttonpanel"><a href="adds.html" target="iframe"> Ogłoszenia </a></button>
           <button class="buttonpanel"><a href="answers.html" target="iframe"> Odpowiedzi </a></button>
           <button class="buttonpanel"><a href="settings.html" target="iframe"> Ustawienia </a></button>
      </div>


        <iframe class="acctable" style="visibility:hidden;" onload="this.style.visibility = 'visible';"
         src="settings.html" name="iframe"></iframe>

      <div class="accfooter">
        Poka 100py
      </div>


      </div>
    </div>

 <?php
 require 'php/page_format.php';

 if(isset($_SESSION['user'])){

 }

 ?>
</body>

</html>
