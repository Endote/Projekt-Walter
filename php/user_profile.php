<?php
require('connect.php');
mysqli_set_charset($link,"utf8");

$user_id= $_GET['user'];

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
if($user_id != NULL)
{
    $name_query = mysqli_query($link, "SELECT * FROM login WHERE ID = $user_id");
    if(mysqli_num_rows($name_query) >= 1){
        $row = mysqli_fetch_assoc($name_query);
        echo "<h1>".$row['Login']."</h1>";
        echo "<br><br><br><h2>Dodane do ulubionych:</h2>";
        if($row['Favourites'] != null){
            $array_of_fav_posts = explode('.', $row['Favourites']);
            for ($i=0; $i < count($array_of_fav_posts); $i++) { 
                $currentID = $array_of_fav_posts[$i];
                DisplayResults($link, "SELECT * from adverts WHERE id = $currentID");
            }
        }
        else{
            echo "No results";
        }
        echo "<h2>Opublikowane ogłoszenia użytkownika:</h2>";
        DisplayResults($link, "SELECT * FROM adverts WHERE poster_id = $user_id");
    }
    else{
        echo "Invalid request: user not found";
    }
}
else{
    echo "Invalid request: please specify user id";
}



?>