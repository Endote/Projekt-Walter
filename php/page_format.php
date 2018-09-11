<?php
    require 'php/connect.php';

    if(isset($_SESSION['user'])){
       echo "<script type='text/javascript'>document.getElementById('loginButton').innerHTML = '<button onclick=location.href=\'php/logout.php\'>Wyloguj</button>'</script>";
    }
?>