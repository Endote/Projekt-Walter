<?php
session_start();
require '../php/session.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>  ette </title>
  <!-- BOOTSRAP & STUFF-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  function toggle(source) {
  checkboxes = document.getElementsByName('checkadd');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
  </script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Back to normie bs -->
  <link rel="stylesheet" href="adds.css">

  <meta charset="utf-8">
</head>

<body>

  <div class="container"  id="search-container">
    <div class="header">

      <div class="col-sm-6">
          <button> Aktywne </button>
          <button> Nieaktywne </button>
      </div>

      <div class="col-sm-6 search">
        <form method="get" action="">
          <input type="text" class="search"
          placeholder="Tytuł Ogłoszenia?" name="search_query">
          <input type="submit" style="background: transparent; border: none !important;font-size:0; visibility: hidden; float: right;">
        </form>
      </div>
    </div>

    <div class="addhead">
      <div class="col-sm-1">
        <input type="checkbox" name="checkall" onClick="toggle(this)">
      </div>
      <div class="col-sm-2">
      Data
      </div>
      <div class="col-sm-5">
      Tytuł
      </div>
      <div class="col-sm-2">
      Data utworzenia
      </div>
      <div class="col-sm-2">
      Status
      </div>
    </div>

      </div>
<?php
require '../php/connect.php';
$session_user_id = $_SESSION['user']; 
mysqli_set_charset($link,"utf8");

function DisplayResults($connectionLink, $query){
    $raw_results = mysqli_query($connectionLink,$query) or die(mysqli_error($connectionLink));
    
    if(mysqli_num_rows($raw_results) > 0)      
    {
        while($row = mysqli_fetch_assoc($raw_results))
        {
          $title_of_ad = $row['title'];
          $text_of_ad = $row['text'];
          $image_of_ad = $row['image1'];
          $views_of_ad = $row['views'];
          $date_of_ad = $row['posting_date'];
          //echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image1'] ).'"/>';
          echo("<script type='text/javascript'>document.getElementById('search-container').innerHTML += '<div class=add>\
        <div class=addbody>\
          <div class=check>\
            <input type=checkbox name=checkadd>\
          </div>\
          <div class=date>\
            Od: TBA <br>\
            Do: TBA\
          </div>\
          <div class=title>\
            <h4> ".$title_of_ad."</h4>\
          </div>\
          <div class=price>".$date_of_ad."</div>\
          <div class=status>\
            <button> Aktywuj </button>\
            <button> Edytuj </button>\
          </div>\
        </div>\
        <div class=addfoot>\
          <div style=\"padding: 0px 10px; border-right: 1px solid gray;\">Statystyki</div>\
          <div style=\"padding: 0px 10px; border-right: 1px solid gray;\">Wyświetleń: ".$views_of_ad."</div>\
          <div style=\"padding: 0px 10px; border-right: 1px solid gray;\">Telefony:</div>\
          <div style=\"padding: 0px 10px;\">Obserwuje:</div>\
        </div>';</script>");
        }
              
    }
    else
    {
        echo("<script type='text/javascript'>document.getElementById('search-container').innerHTML += 'Brak wyników wyszukiwania'</script>");
    }
}
if(!isset($_GET['search_query'])){
  DisplayResults($link, "SELECT * FROM adverts WHERE poster_id = '$session_user_id'");
}
else{
  $query = $_GET['search_query'];
  DisplayResults($link, "SELECT * FROM adverts WHERE (LOWER(title) LIKE LOWER('%".$query."%')) AND poster_id = '$session_user_id'");
}
?>

</body>

</html>
