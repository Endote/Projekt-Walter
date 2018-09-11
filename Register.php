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
  <link rel="stylesheet" href="styleReg.css">
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


<div class="container main">

  <h4 align="left"> Zaczynamy! </h4>
                              <hr class="HRanon">
   <form action="" method="post">
<div class="row">

  <div class="col-xs-2"></div>
  <div class="col-xs-2">
    Twój login
    </div>
  <div class="col-xs-4">
    <input type="text" name="RegLogin">
  </div>

  <div class="col-xs-4"></div>

</div>

<br>

<div class="row">

  <div class="col-xs-2"></div>
  <div class="col-xs-2">
    Twój mail
    </div>
  <div class="col-xs-4">
    <input type="text" name="RegMail">
  </div>

  <div class="col-xs-4"></div>
</div>

<br>

<div class="row">

  <div class="col-xs-2"></div>
  <div class="col-xs-2">
    Twoje hasło
    </div>
  <div class="col-xs-4">
    <input type="password" name="RegPasswd">
  </div>

  <div class="col-xs-4"></div>
</div>

<br>


<div class="row">

  <div class="col-xs-2"></div>
  <div class="col-xs-2">
    Potwierdź hasło
    </div>
  <div class="col-xs-4">
    <input type="password" name="RegPasswd2">
  </div>

  <div class="col-xs-4"></div>
</div>

<br>

<div class="row">
  <div class="col-xs-2"></div>
  <div class="col-xs-2">
    Numer telefonu
    </div>
  <div class="col-xs-4">
    <input type="password" name="RegPhone">
  </div>

  <div class="col-xs-4"></div>
</div>

<input type="submit" value="Zakończ Rejestrację!">
</form>
</div>

<?php
  require_once 'php/connect.php';
  require 'php/page_format.php';

if(!isset($_POST['RegLogin']) || !isset($_POST['RegPasswd']) || !isset($_POST['RegPasswd2']) || !isset($_POST['RegMail']) || !isset($_POST['RegPhone'])){
  die();
}

//POBIERANIE DANYCH

$login = $_POST['RegLogin'];
$password = $_POST['RegPasswd'];
$password2 = $_POST['RegPasswd2'];
$email = $_POST['RegMail'];
$phone = $_POST['RegPhone'];

//GENEROWANIE SALTA

function random_str($length, $keyspace = '0123456789abcde')
{
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}

$encrypt = random_str(32); 
$result = mysqli_query($link,"SELECT Login FROM login WHERE Login='$login'");
$checkLogin = mysqli_num_rows($result) > 0 ? 'yes' : 'no';
$result2 = mysqli_query($link,"SELECT Email FROM login WHERE Email='$email'");
$checkEmail = mysqli_num_rows($result2) > 0 ? 'yes' : 'no';
while (true){
    $verificationCode = md5(rand(0,1000));
    $result = mysqli_query($link, "SELECT 1 FROM login WHERE ActivationCode = '$verificationCode' LIMIT 1");
    if (mysqli_num_rows($result) == 0) {
        break;
    }
}


//SPRAWDZ LOGIN, HASLO


if (($password !== $password2) || (strlen($password) < 6) || (strlen($login) < 4) || ($checkLogin == 'yes') || ($email == "") || (!(filter_var($email, FILTER_VALIDATE_EMAIL))) || (($checkEmail == 'yes')) || (!(is_numeric($phone))) || ($login == "") || ($password == "") || ($password2 == "") || ($phone == "") )
{
    if ($checkLogin == 'yes')
    {
        echo "<script type='text/javascript'>alert('This login already exists!');window.location = './Register.php';</script>";
    } 
    
    else if ($checkEmail == 'yes')
    {
        echo "<script type='text/javascript'>alert('This Email is already being used!');window.location = './Register.php';</script>";
    }

    else if ($login == "")
    {
        echo "<script type='text/javascript'>alert('Insert login');window.location = './Register.php';</script>";
    } 
    
    else if ($email == "") 
    {
        echo "<script type='text/javascript'>alert('Insert email address');window.location = './Register.php';</script>";
    }
    
    else if ($phone == "")
    {
        echo "<script type='text/javascript'>alert('Insert phone number');window.location = './Register.php';</script>";
    }

    else if (($password !== $password2) || ($password2 == "") || ($password2 == "") )
    {
        echo "<script type='text/javascript'>alert('Passwords do not match!');window.location = './Register.php';</script>";
    }
    
    else if (!(filter_var($email, FILTER_VALIDATE_EMAIL)))
    {
        echo "<script type='text/javascript'>alert('Insert vaild email');window.location = './Register.php';</script>";
    }
    else if (strlen($login) < 4)
    {
        echo "<script type='text/javascript'>alert('Login must be at least 4 characters');window.location = './Register.php';</script>";
    }
    
    else if (strlen($password) < 6)
    {
        echo "<script type='text/javascript'>alert('Password must be at least 6 characters');window.location = './Register.php';</script>";
    }
    
    else if (!(is_numeric($phone)))
    {
        echo "<script type='text/javascript'>alert('Insert valid phone number');window.location = './Register.php';</script>";
    }
}

//SZYFRUJ HASLO, WPROWADZ UZYTKOWNIKA DO BAZY DANYCH

else
{
    $password = SHA1($password);
    $password = ($encrypt.$password);

    if($link === false)
    {
        die("ERROR: Could not connect. ".mysqli_connect_error());
    }

    $sql = "INSERT INTO login (Login, Password, Email, Phone, ActivationCode, EmailStatus) VALUES ('$login', '$password', '$email', '$phone', '$verificationCode', 'not verified')";


    if(mysqli_query($link, $sql))
    {
    $to=$email;
    $subject="Activation Code For Test.pl";
    $from = 'n.weronika@op.pl';
    $body='Thanks for singing up, '.$login.'!< /br>Your Activation Code is '.$verificationCode.' Please Click On This link <a href="verify.php?id=$login">Verify.php?code='.$verificationCode.'</a>to activate your account.';
    $headers = "From:".$from;
    mail($to,$subject,$body,$headers);
    //echo "You are registered! :) <br />";
    echo "Verification code has been sent into your mail account. <br />";
    //mail($email, "Registration confirmation", "to be added");
    mysqli_close($link);
}

else
    echo "Something went wrong :(";
    echo "<br /><br /> <a href='../index.html'>Back</a>";
}
?>

</body>

</html>
