<html lang="pl">

<head>
<meta charset="utf-8" />
<title>tak</title>
</head>

<body>

<?php

require_once 'connect.php';

//POBIERANIE DANYCH

$login = $_POST['RegLogin'];
$password = $_POST['RegPasswd'];
$password2 = $_POST['RegPasswd2'];
$email = $_POST['RegEmail'];
$phone = $_POST['RegPhone'];

//GENEROWANIE SALTA

function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyz')
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
$verificationCode = md5(rand(0,1000));


//SPRAWDZ LOGIN, HASLO


if (($password !== $password2) || (strlen($password) < 6) || (strlen($login) < 4) || ($checkLogin == 'yes') || ($email == "") || (!(filter_var($email, FILTER_VALIDATE_EMAIL))) || (($checkEmail == 'yes')) || (!(is_numeric($phone))) || ($login == "") || ($password == "") || ($password2 == "") || ($phone == "") )
{
   if ($checkLogin == 'yes')
    {
        echo "<script type='text/javascript'>alert('This login already exists!');window.location = '../Register.html';</script>";
    } 
    
   else if ($checkEmail == 'yes')
    {
        echo "<script type='text/javascript'>alert('This Email is already being used!');window.location = '../Register.html';</script>";
    } 
    
    else if (($password !== $password2) || ($password2 == "") || ($password2 == "") )
    {
    echo "<script type='text/javascript'>alert('Passwords do not match!');window.location = '../Register.html';</script>";
    }
    
    else if ($email == "") 
    {
        echo "<script type='text/javascript'>alert('Insert email address');window.location = '../Register.html';</script>";
    }
    
    else if ($login == "")
    {
        echo "<script type='text/javascript'>alert('Insert login');window.location = '../Register.html';</script>";
    }
    
    
    else if ($phone == "")
    {
        echo "<script type='text/javascript'>alert('Insert phone number');window.location = '../Register.html';</script>";
    }
    
    else if (!(filter_var($email, FILTER_VALIDATE_EMAIL)))
    {
        echo "<script type='text/javascript'>alert('Insert vaild email');window.location = '../Register.html';</script>";
    }
    
    
   
    else if (strlen($login) < 4)
    {
        echo "<script type='text/javascript'>alert('Login must be at least 4 characters');window.location = '../Register.html';</script>";
    }
    
    else if (strlen($password) < 6)
    {
        echo "<script type='text/javascript'>alert('Password must be at least 6 characters');window.location = '../Register.html';</script>";
    }
    
    else if (!(is_numeric($phone)))
    {
        echo "<script type='text/javascript'>alert('Insert valid phone number');window.location = '../Register.html';</script>";
    }
}

//SZYFRUJ HASLO, WPROWADZ UZYTKOWNIKA DO BAZY DANYCH

    else
    {
  
           
    $password = SHA1($_POST['password']);
    $password = ($encrypt.$password);

if($link === false)
{
    die("ERROR: Could not connect. ".mysqli_connect_error());
}

$sql = "INSERT INTO login (Login, Password, Email, Phone, ActivationCode, EmailStatus) VALUES ('$login', '$password', '$email', '$phone', '$verificationCode', 'not verified')";


if(mysqli_query($link, $sql))
{
    /*$to=$email;
    $subject="Activation Code For Test.pl";
    $from = 'n.weronika@op.pl';
    $body='Thanks for singing up, '.$login.'!< /br>Your Activation Code is '.$verificationCode.' Please Click On This link <a href="verification.php">Verify.php?id='.$login.'&code='.$verificationCode.'</a>to activate your account.';
    $headers = "From:".$from;
    mail($to,$subject,$body,$headers);*/
echo "You are registered! :) <br />";
//echo "Verification code has been sent into your mail account. <br />";
mysqli_close($link);
}

else
    echo "Something went wrong :(";

    
    
echo "<br /><br /> <a href='../index.html'>Back</a>";

    }


?>

</body>
</html>