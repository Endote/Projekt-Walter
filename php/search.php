<?php
require_once 'connect.php';

$search = $_POST['search'];

if (!($search == NULL))
{
            $search = htmlspecialchars($search);
            $query = mysqli_real_escape_string($query);
            
            $raw_results = mysqli_query("SELECT * FROM adverts
            WHERE (`title` LIKE '%".$search."%') OR (`text` LIKE '%".$search."%')") or die(mysql_error());
    
    
            if(mysqli_num_rows($raw_results) > 0)
            
            {
                while($results = mysqli_fetch_array($raw_results))
                {
                       echo "<p><h3>".$results['title']."</h3>".$results['text']."</p>";
                    
                }
              
            }
            else
                echo "No results";
}

else 
    echo "<script type='text/javascript'>alert('Insert word');window.location = '../Search.html';</script>";



?>