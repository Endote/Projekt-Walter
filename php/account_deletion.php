<?php
    session_start();
    require 'connect.php';

    if(isset($_SESSION['user'])){
    	$user_id = $_SESSION['user'];
    	$raw_results = mysqli_query($link,"SELECT * FROM login WHERE ID='$user_id'") or die(mysqli_error($link));
    	if(mysqli_num_rows($raw_results) > 0)      
    	{
        	while($row = mysqli_fetch_assoc($raw_results))
        	{
        		$link->set_charset("utf8");
        		date_default_timezone_set('Europe/Berlin'); // CDT
        		$current_date = date('Y-m-d', strtotime(' +30 days'));
        		mysqli_query($link, "UPDATE login SET ToBeDeletedDate = '$current_date' WHERE ID = '$user_id'") or die(mysqli_error($link));
        		echo "<script type='text/javascript'>window.location = 'logout.php';</script>";
        	}
        }
    }
?>