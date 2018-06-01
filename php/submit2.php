<html lang="pl">

<head>
<meta charset="utf-8" />
<title>tak</title>
</head>

<body>

<?php

require_once 'connect.php';

//POBIERANIE DANYCH

$login = $_POST['login'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$email = $_POST['email'];


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



//SPRAWDZ LOGIN, HASLO


if (($password !== $password2) || (strlen($password) < 6) || (strlen($login) < 4) || ($checkLogin == 'yes') || (empty($email)) || (!filter_var($email, FILTER_VALIDATE_EMAIL)) || ($checkEmail == 'yes'))
{
   if ($checkLogin == 'yes')
    {
        echo "<script type='text/javascript'>alert('This login already exists!');window.location = 'index2.php';</script>";
    } 
    
   else if ($checkEmail == 'yes')
    {
        echo "<script type='text/javascript'>alert('This Email is already being used!');window.location = 'index2.php';</script>";
    } 
    
    else if ($password !== $password2)
    {
    echo "<script type='text/javascript'>alert('Passwords do not match!');window.location = 'index2.php';</script>";
    }
    
    else if (empty($email))
    {
        echo "<script type='text/javascript'>alert('Insert email address');window.location = 'index2.php';</script>";
    }
    
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "<script type='text/javascript'>alert('Insert vaild email');window.location = 'index2.php';</script>";
    }
    
    
   
    else if(strlen($login) < 4)
    {
        echo "<script type='text/javascript'>alert('Login must be at least 4 characters');window.location = 'index2.php';</script>";
    }
    
    else if(strlen($password) < 6)
    {
        echo "<script type='text/javascript'>alert('Password must be at least 6 characters');window.location = 'index2.php';</script>";
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

$sql = "INSERT INTO login (Login, Password, Email) VALUES ('$login', '$password', '$email')";


if(mysqli_query($link, $sql))
{
echo "You are registered! :) <br />";
mysqli_close($link);
}

else
    echo "Something went wrong :(";

    
    
echo "<br /><br /> <a href='index2.php'>Back</a>";

    }


?>

</body>
</html>