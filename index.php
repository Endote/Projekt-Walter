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
  <link rel="stylesheet" href="index.css">
  <meta charset="utf-8">
</head>

<body>



  <a href="Register.php" class="btn btn-info btnhead register" role="button">
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
          <div id="profileButton"></div>
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
    <a class="spanhelp" href="index.php" >
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

</div>

<!-- Modal END-->



  <div class="container ">


        <div class = "panel panel-search row">
            <form action="search.php" method="get">
                <div class="col-sm-5">
                  <input type="text" placeholder="Czego szukasz?" name="search"> </div>
                <div class="col-sm-5">
                  <input type="text" placeholder="Gdzie jesteś?" name="localisation"> </div>
                <div class="col-sm-2 ">
                  <input class="search" type="submit" value="Wyszukaj"> </div>
      </form>
        </div>

        <div class="alert alert-success">
          <!-- Wyróżnione -->
          <div class = " wrap">
            <div class = "row">
              <div class = "col-sm-3">
                Testings
              </div>
              <div class="col-sm-3">
                <a class="categoryA" href="search.php?kat=Nieruchomości">Nieruchomości </a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
              </div>
              <div class="col-sm-3">
                  <a class="categoryA" href="search.php?kat=Motoryzacja"> Motoryzacja </a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
              </div>
              <div class="col-sm-3">
                  <a class="categoryA" href="search.php?kat=Elektronika"> Elektronika </a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
              </div>
            </div>
          </div>


          <!-- Pierwszy Rząd -->
            <div class="row">
              <div class="col-sm-3">
                  <a class="categoryA" href="search.php?kat=Praca">Praca </a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
              </div>
              <div class="col-sm-3">
                <a class="categoryA" href="search.php?kat=Nieruchomości">Nieruchomości </a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
              </div>
              <div class="col-sm-3">
                  <a class="categoryA" href="search.php?kat=Motoryzacja"> Motoryzacja </a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
              </div>
              <div class="col-sm-3">
                  <a class="categoryA" href="search.php?kat=Elektronika"> Elektronika </a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
              </div>
            </div>
            <!-- Drugi Rząd -->
            <div class="row">
              <div class="col-sm-3">
                  <a class="categoryA" href="search.php?kat=Dom+i+ogród"> Dom i Ogród </a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
              </div>
              <div class="col-sm-3">
                  <a class="categoryA" href="search.php?kat=Moda"> Moda </a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
              </div>
              <div class="col-sm-3">
                  <a class="categoryA" href="search.php?kat=Zwierzęta"> Zwierzęta </a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
              </div>
              <div class="col-sm-3">
                  <a class="categoryA" href="search.php?kat=Rolnictwo"> Rolnictwo </a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
              </div>
            </div>
            <!-- Trzeci Rząd -->
            <div class="row">
              <div class="col-sm-3">
                  <a class="categoryA" href="search.php?kat=Dzieci"> Dla Dzieci </a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
              </div>
              <div class="col-sm-3">
                  <a class="categoryA" href="search.php?kat=Hobby+i+sport"> Hobby i Sport </a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
              </div>
              <div class="col-sm-3">
                  <a class="categoryA" href="search.php?kat=Muzyka"> Muzyka </a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
              </div>
              <div class="col-sm-3">
                <a class="categoryA" href="search.php?kat=Edukacja"> Edukacja </a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
              </div>
            </div>
            <!-- Czwarty Rząd -->
            <div class="row">
              <div class="col-sm-3">
                <a class="categoryA" href="search.php?kat=Firmy+i+usługi"> Firmy i Usługi </a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
              </div>
              <div class="col-sm-3">
                <a class="categoryA" href="search.php?kat=Oddam+za+darmo"> Oddam za Darmo </a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
              </div>
              <div class="col-sm-3">
                <a class="categoryA" href="search.php?kat=Zamienię"> Zamienię </a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
              </div>
              <div class="col-sm-3">
                <a class="categoryA" href="search.php?kat=Różne"> Różne </a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
              </div>
            </div>

        </div>



    </div>

    <?php
      require 'php/page_format.php'
    ?>

</body>

</html>
