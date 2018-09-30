<?php 
session_start();

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
    echo "<script type='text/javascript'>alert('Invaild login/email or password');window.location = '../Register.php?redirected=true';</script>";
}

else
{
    $verification = mysqli_query($link,"SELECT * FROM login WHERE Login='$login' OR Email='$login'") or die(mysqli_error($link));
    $row2 = mysqli_fetch_assoc($verification);
    if ($row2['EmailStatus'] == 'not verified')
    {
        echo "<script type='text/javascript'>alert('Musisz aktywować swoje konto przed logowaniem');window.location = '../Register.php?redirected=true';</script>";
    }
    else if ($row2['ToBeDeletedDate'] != null){
        date_default_timezone_set('Europe/Berlin'); // CDT
        $current_date = strtotime(date('Y-m-d'));
        $del_date = strtotime($row2['ToBeDeletedDate']);
        $date_difference = ($del_date - $current_date)/24/60/60;
        $_SESSION['recover_id'] = $row2['ID'];
        echo "<script type='text/javascript'>var avert = confirm('Twoje konto jest nieaktywne i będzie usunięte za ".(int)$date_difference." dni, czy chcesz anlować ten proces?'); if(avert){window.location = '../php/account_recovery.php'}else{window.location = '../index.php'};</script>";
    }
    else if (($loginDB == 'yes') && ($passwordDB == $password) && ($row2['EmailStatus'] == 'verified') )
    {
        $result3 = mysqli_query($link,"SELECT ID FROM login WHERE Login='$login' OR Email='$login'");
        $user_id = mysqli_fetch_row($result3);
        $_SESSION['user'] = $user_id[0];
        echo "<script type='text/javascript'>window.location = '../index.php';</script>";
    }
    
    mysqli_close($link);
    
}

?>