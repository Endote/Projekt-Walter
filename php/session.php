<?php 

session_start();



if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
{
    echo "Welcome, " . $_SESSION['username'] . "!";
} 


else 
{
    echo "<script type='text/javascript'>alert('Please, log in first to see this page');window.location = '../Login.html';</script>";
}





session_destroy();



?>