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




  <a href="Register.php" class="btn btn-info btnhead register"  role="button">
    Zarejestruj się! </a>



  <div class = "flexnav page-header">

      <div class =" logo">
        <a class="spanhelp" href="index.php" >
          <span style="color: #bc152b; ">e</span><!--
          --><span style="color: #6699cc; ">tt</span><!--
          --><span style="color: #bc152b; ">e</span>
         </a>
      </div>
      <div class="btn-group flexbtngrp ">
          <a class="navA" onclick="location.href='AnnounAdd.php'"><button> Dodaj Ogłoszenie!</button></a>
          <a class="navA" href="Account.php"><button>  Twój Profil</button></a>
          <a class="navA" href="index.php"><button>  Ogłoszenia </button> </a>
          <a class="navA" data-toggle="modal" data-target="#Login" id='loginButton'><button> Logowanie </button></a>
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



 
      <div class = "flexmanag" >
	  
            <div class="flex acchead">
			
			<img class="awatar" src="Awatar.jpg" alt="Twoje zdjęcie">
							
			<h2> Twój profil </h2> 
			Tu możesz zarządzać swoimi danymi oraz ogłoszeniami.
			</div>
			
			<div class="flex accpanel">
			 
			</div>
			
			<div class="flex acctable">
			
			</div>
			
			<div class="flex accfooter">
			<h1> Testin </h1>
			</div>          
                 
      </div>

    

 <?php
 require 'php/page_format.php';

 if(isset($_SESSION['user'])){

 }

 ?>
</body>

</html>
