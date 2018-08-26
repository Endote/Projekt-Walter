<?php
require('connect.php');
mysqli_set_charset($link,"utf8");

$search = $_GET['search'];
$category = $_GET['cat'];

function DisplayResults($connectionLink, $query){
    $raw_results = mysqli_query($connectionLink,$query) or die(mysqli_error($connectionLink));
    
    if(mysqli_num_rows($raw_results) > 0)      
    {
        while($row = mysqli_fetch_assoc($raw_results))
        {
            echo("<p><h3>".$row['title']."</h3>".$row['text']."</p>");
        }
              
    }
    else
    {
        echo "No results";
    }
}
if($category != null && $search != null)
{
    DisplayResults($link, "SELECT * FROM adverts WHERE (((LOWER(title) LIKE LOWER('%".$search."%')) OR (LOWER(text) LIKE LOWER('%".$search."%'))) AND (LOWER(category) = LOWER('".$category."')))");
}
else if ($search != null)
{
    DisplayResults($link, "SELECT * FROM adverts WHERE (LOWER(title) LIKE LOWER('%".$search."%')) OR (LOWER(text) LIKE LOWER('%".$search."%'))");
    
}
else if($category != null){
    DisplayResults($link, "SELECT * FROM adverts WHERE (LOWER(category) = LOWER('".$category."'))");
}
else 
{
    echo "<script type='text/javascript'>alert('Insert word');window.location = '../Search.html';</script>";
}



?>