<?php
session_start();
require 'php/session.php';
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
  <script src="AnnounAdd.js"></script>
  <!-- Back to normie bs -->
  <link rel="stylesheet" href="styleAnnon.css">
  <link rel="stylesheet" href="style.css">
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

    <div class="container main">

      <h4 align="left"> Zaczynamy! </h4>
                                  <hr class="HRanon">
  <div class="row">
      <form action="" method="post" enctype="multipart/form-data">
      <div class="col-xs-2"></div>
      <div class="col-xs-2">
        Tytuł ogłoszenia
        </div>
      <div class="col-xs-4">
        <input type="text" name="AdTitle">
      </div>

      <div class="col-xs-4"></div>
  </div>

                                  <hr class="HRanon">
    <div class="row">
    <div class="col-xs-2"></div>
      <div class="col-xs-2">
        Wybierz kategorię

    </div>
      <div class="col-xs-4">
            <select name="Category">
          <option value="Praca">Praca</option>
          <option value="Nieruchomości">Nieruchomości</option>
          <option value="Motoryzacja">Motoryzacja</option>
          <option value="Elektronika">Elektronika</option>
          <option value="Dom i Ogród">Dom i Ogród</option>
          <option value="Moda">Moda</option>
          <option value="Zwierzęta">Zwierzęta</option>
          <option value="Rolnictwo">Rolnictwo</option>
          <option value="Dla Dzieci">Dla Dzieci</option>
          <option value="Hobby i Sport">Hobby i Sport</option>
          <option value="Muzyka">Muzyka</option>
          <option value="Edukacja">Edukacja</option>
          <option value="Firmy i Usługi">Firmy i Usługi</option>
          <option value="Oddam za Darmo">Oddam za Darmo</option>
          <option value="Zamienię">Zamienię</option>
          <option value="Różne">Różne</option>
        </select>
    </div>
      <div class="col-xs-4"></div>
  </div>
                                  <hr class="HRanon">
  <div class="row">
    <div class="col-xs-2">
    </div>
    <div class="col-xs-2">
    Opis ogłoszenia
    </div>
    <div class="col-xs-2">
    <textarea rows="10" cols="50" name="AdText">Twój opis...</textarea>
    </div>
    <div class="col-xs-2">
    </div>
    <div class="col-xs-2">
    </div>
    <div class="col-xs-2">
    </div>
  </div>
  <hr class="HRanon">

  <div class="row">
    <div class="col-xs-2">

	  </div>
	  <div class="col-xs-2">
	  Dodaj zdjęcia
	  </div>
      <div class="form-group">
           <div class="input-group">
               <span class="input-group-btn">
                   <span class="btn btn-default btn-file">
                       Browse… <input type="file" id="imgInp" name="image1" accept="image/png, image/jpeg">
                   </span>
               </span>
           </div>
           <img id='img-upload'/>
       </div>
      <div class="form-group">
          <div class="input-group">
              <span class="input-group-btn">
                  <span class="btn btn-default btn-file">
                      Browse… <input type="file" id="imgInp" name="image2" accept="image/png, image/jpeg">
                  </span>
              </span>
          </div>
          <img id='img-upload'/>
      </div>
      <div class="form-group">
          <div class="input-group">
              <span class="input-group-btn">
                  <span class="btn btn-default btn-file">
                      Browse… <input type="file" id="imgInp" name="image3" accept="image/png, image/jpeg">
                  </span>
              </span>
          </div>
          <img id='img-upload'/>
      </div>
      <div class="form-group">
          <div class="input-group">
              <span class="input-group-btn">
                  <span class="btn btn-default btn-file">
                      Browse… <input type="file" id="imgInp" name="image4" accept="image/png, image/jpeg">
                  </span>
              </span>
          </div>
          <img id='img-upload'/>
      </div>
      <div class="form-group">
          <div class="input-group">
              <span class="input-group-btn">
                  <span class="btn btn-default btn-file">
                      Browse… <input type="file" id="imgInp" name="image5" accept="image/png, image/jpeg">
                  </span>
              </span>
          </div>
          <img id='img-upload'/>
      </div>
	</div>
	                                    <hr class="HRanon">

  <input type="submit" value="Dodaj Ogłoszenie">
        </form>


    </div>
    <?php
      require 'php/connect.php';
      require 'php/page_format.php';
      if(isset($_POST['AdText']) && isset($_POST['AdTitle']) && isset($_POST['Category'])){

        $ad_text = preg_replace( "/\r\n/", "</br>", $_POST['AdText']);
        $ad_title = $_POST['AdTitle'];
        $ad_image1 = @addslashes(file_get_contents($_FILES['image1']['tmp_name']));
        $ad_image2 = @addslashes(file_get_contents($_FILES['image2']['tmp_name']));
        $ad_image3 = @addslashes(file_get_contents($_FILES['image3']['tmp_name']));
        $ad_image4 = @addslashes(file_get_contents($_FILES['image4']['tmp_name']));
        $ad_image5 = @addslashes(file_get_contents($_FILES['image5']['tmp_name']));
        $ad_category = $_POST['Category'];
        $user_session_id = $_SESSION['user'];
        //$current_user_id = $_SESSION['user_id'];
        date_default_timezone_set('Europe/Berlin'); // CDT
        $current_date = date('Y-m-d');

        // Create connection
        $link->set_charset("utf8");

        //Insert our ad into the database
        $result = mysqli_query($link, "INSERT INTO adverts (title,text,image1,image2,image3,image4,image5,category,poster_id,posting_date,views,status) VALUES ('$ad_title','$ad_text','$ad_image1', '$ad_image2', '$ad_image3', '$ad_image4', '$ad_image5', '$ad_category', '$user_session_id', '$current_date', 0, 'pending')") or die(mysqli_error($link));
        $message = "Post został opublikowany!";
        echo "<script type='text/javascript'>alert('$message');window.location.href = 'index.php';</script>";
      }
    ?>

</body>

</html>
