<?php
    session_start();
    require 'connect.php';

    if(isset($_SESSION['recover_id'])){
    	$user_id = $_SESSION['recover_id'];
    	$raw_results = mysqli_query($link,"SELECT * FROM login WHERE ID='$user_id'") or die(mysqli_error($link));
    	if(mysqli_num_rows($raw_results) > 0)      
    	{
        	while($row = mysqli_fetch_assoc($raw_results))
        	{
        		$link->set_charset("utf8");
        		mysqli_query($link, "UPDATE login SET ToBeDeletedDate = null WHERE ID = '$user_id'") or die(mysqli_error($link));
        		echo "<script type='text/javascript'>alert('Konto zostało przywrócone');window.location = '../index.php';</script>";
        	}
        }
    }
?>