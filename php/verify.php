<?php 

require_once 'connect.php';

if($link === false)
{
    die("ERROR: Could not connect. ".mysqli_connect_error());
}

$verification_code = $_GET['code'];

if($verification_code != null){
    $query = "UPDATE login SET EmailStatus = 'verified' WHERE '$verification_code' = ActivationCode";
    if(mysqli_query($link,$query)){
        echo "Your email is now verified, you can log in freely";
    }
    else{
        echo "Your verification code is invalid or expired";
    }
    mysqli_close($link);
}
else{
    echo "Incorrect verification code";
}

?>