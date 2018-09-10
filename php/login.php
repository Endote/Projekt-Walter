<?php 

require_once 'connect.php';

if($link === false)
{
    die("ERROR: Could not connect. ".mysqli_connect_error());
}

$login = $_POST['login'];
$password = SHA1($_POST['password']);
$result = mysqli_query($link,"SELECT Login FROM login WHERE Login='$login' OR Email='$login'");
$loginDB = mysqli_num_rows($result) > 0 ? 'yes' : 'no';
$result2 = mysqli_query($link,"SELECT Password FROM login WHERE Login='$login' OR Email='$login'");
$row = mysqli_fetch_row($result2);
$passwordDB = substr($row[0], 32);


if (($loginDB == 'no') || ($passwordDB !== $password))
{
    echo "<script type='text/javascript'>alert('Invaild login/email or password');window.location = 'index.php';</script>";
}

else
{
    $verification = mysqli_query($link,"SELECT EmailStatus FROM login WHERE Login='$login' OR Email='$login'");
    $row2 = mysqli_fetch_row($verification);
    if ($row2[0] == 'not verified')
    {
        echo "<script type='text/javascript'>alert('You must activate your account first.');window.location = 'index.php';</script>";
    }
    
    else if (($loginDB == 'yes') && ($passwordDB == $password) && ($row2[0] == 'verified') )
    {
        session_start();
        $result3 = mysqli_query($link,"SELECT ID FROM login WHERE Login='$login' OR Email='$login'");
        $user_id = mysqli_fetch_row($result3);
        $_SESSION['user'] = $user_id[0];
        echo "<script type='text/javascript'>window.location = '../index.html';</script>";
    }
    
    mysqli_close($link);
    
}

?>