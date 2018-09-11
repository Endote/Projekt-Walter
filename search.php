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

</div>

<!-- Modal END-->



  <div class="container ">


        <div class = "panel panel-search row">
            <form>
                <div class="col-sm-5">
                  <input type="text" placeholder="Czego szukasz?" name="search"> </div>
                <div class="col-sm-5">
                  <input type="text" placeholder="Gdzie jesteś?" name="localisation"> </div>
                <div class="col-sm-2 ">
                  <input class="search" type="submit" value="Wyszukaj"> </div>
      </form>
        </div>

        <div id="search-container" class="alert alert-success">
          
        </div>



    </div>

<?php
require 'php/page_format.php';
require 'php/connect.php';
mysqli_set_charset($link,"utf8");

$search = @$_GET['search'];
$category = @$_GET['kat'];

function DisplayResults($connectionLink, $query){
    $raw_results = mysqli_query($connectionLink,$query) or die(mysqli_error($connectionLink));
    
    if(mysqli_num_rows($raw_results) > 0)      
    {
        while($row = mysqli_fetch_assoc($raw_results))
        {
          $title_of_ad = $row['title'];
          $text_of_ad = $row['text'];
          $image_of_ad = $row['image1'];
          //echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image1'] ).'"/>';
          echo("<script type='text/javascript'>document.getElementById('search-container').innerHTML += '<a style=\"color:inherit;\" href=AnnounView.php?id=".$row['id']."><div style=\"width: 100%; display:flex; border: 2px solid green; margin: 2px 2px 15px 2px; padding: 3px;\"><div style=\"width: 80%; height: 100%; float: left;\"><p><h3>$title_of_ad</h3>$text_of_ad</p></div><div style=\"height: 100%; width: 20%; display:flex; float: right;\" float=left><img src=\"data:image/jpeg;base64,".base64_encode( $row['image1'] )."\"/></div></div></a>';</script>");
        }
              
    }
    else
    {
        echo("<script type='text/javascript'>document.getElementById('search-container').innerHTML += 'Brak wyników wyszukiwania'</script>");
    }
}
if($category != null && $search != null)
{
    DisplayResults($link, "SELECT * FROM adverts WHERE (((LOWER(title) LIKE LOWER('%".$search."%')) OR (LOWER(text) LIKE LOWER('%".$search."%'))) AND (LOWER(category) = LOWER('".$category."')))");
}
else if ($search != null)
{
    DisplayResults($link, "SELECT * FROM adverts WHERE (LOWER(title) LIKE LOWER('%".$search."%')) OR (LOWER(text) LIKE LOWER('%".$search."%'))");
    
}
else if($category != null){
    DisplayResults($link, "SELECT * FROM adverts WHERE (LOWER(category) = LOWER('".$category."'))");
}
else 
{
    echo("<script type='text/javascript'>document.getElementById('search-container').innerHTML += 'Brak wyników wyszukiwania'</script>");
}
?>

</body>

</html>
