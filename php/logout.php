<?php 
session_start();

require_once 'connect.php';

if(isset($_SESSION['user'])){
    unset($_SESSION['user']);
}
echo "<script type='text/javascript'>window.location = '../index.php';</script>";

?>