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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Back to normie bs -->
  <link rel="stylesheet" href="settings.css">

  <meta charset="utf-8">
  <!-- To je accordion, tego nie polakierujesz zwykłym szprajem! -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>
  <script type='text/javascript'>
function Confirm(){
	var r=confirm('Czy jestes pewnien ze chcesz usunac konto?'); 
	if (r==true){
		alert('Twoje konto zostanie usunięte za 30 dni, masz do tego momentu czas na reatywację');
    window.parent.location = "../php/account_deletion.php"
	}
}
</script>
</head>

<body>

  <div class="container ">
    <div id="accordion">
  <h3>Dane Kontaktowe</h3>
  <div class="menu">
    <form id="FormDane" action="" method="post">
    <p>Osoba Kontaktowa</p>
    <input type="text" name="name" id="nameInput" value="" tabindex="1"> <br><br>
    <p>Numer Telefonu</p>
    <input type="text" name="number" id="numberInput" value="" tabindex="2"> <br><br>
    <p>Email</p>
    <input type="text" name="email" id="emailInput" value="" tabindex="3"> <br><br>

    <input type="submit" value="Zapisz">
    </form>

  </div>

  <h3>Hasło</h3>
  <div class="menu">
    <br>
    <h4>Zmiana Hasła</h4>
    <p> Stare Hasło </p>
    <form id="FormPasswd" action="" method="post">
    <input type="password" name="oldpasswd" value="" tabindex="1"> <br><br>
    <p> Nowe Hasło </p>
    <input type="password" name="newpasswd" value="" tabindex="2"> <br><br>
    <p> Powtórz Nowe Hasło </p>
    <input type="password" name="newpasswd2" value="" tabindex="3"> <br><br>

    <input type="submit" value="Zmień">

  </div>
  <h3>Zarządzanie Kontem</h3>
  

 
  <div class="menu">
  <form id="sett" method="post" action="">
  <input type="submit" id="delete" value="Usuń konto" onClick="javascript:Confirm()">
  </form>
  

   <!--   <p>
    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
    et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
    faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
    mauris vel est.
    </p>
    <p>
    Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
    inceptos himenaeos.
    </p> -->
  </div>
</div>

    </div>


  </div>

<?php
  require '../php/connect.php';

  $session_user_id = $_SESSION['user']; 
  function random_str($length, $keyspace = '0123456789abcde')
  {
    $pieces = array();
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
  }
  //set current data to fields
  $raw_login_result = mysqli_query($link, "SELECT * FROM login WHERE ID = '$session_user_id'") or die(mysqli_error($link));
  if(mysqli_num_rows($raw_login_result) > 0)      
  {
    while($row = mysqli_fetch_assoc($raw_login_result))
    {
      $currentName = $row['Contact_Name'];
      $currentNumber = $row['Contact_Phone_Number'];
      $currentEmail = $row['Contact_Email'];
      echo("<script type='text/javascript'>document.getElementById('nameInput').value = '$currentName';document.getElementById('numberInput').value = '$currentNumber';document.getElementById('emailInput').value = '$currentEmail';</script>");
    }
  }

  if(isset($_POST['oldpasswd']) && isset($_POST['newpasswd']) && isset($_POST['newpasswd2'])){
    $oldpasswd = $_POST['oldpasswd'];
    $newpasswd = $_POST['newpasswd'];
    $newpasswd2 = $_POST['newpasswd2'];   
    $raw_results = mysqli_query($link, "SELECT * FROM login WHERE ID = '$session_user_id'") or die(mysqli_error($link));
    

    if(mysqli_num_rows($raw_results) > 0)      
    {
      while($row = mysqli_fetch_assoc($raw_results))
      {
        if(substr($row['Password'],32) == SHA1($oldpasswd) && $newpasswd == $newpasswd2){
          $newpasswd_updated = random_str(32).SHA1($newpasswd);
          mysqli_query($link, "UPDATE login SET password = '$newpasswd_updated' WHERE ID = '$session_user_id'");
          echo("<script type='text/javascript'>alert('Hasło zostało zaktualizowane');</script>");
        }
        }
      }
    }
  $data_changed = False;
    if(isset($_POST['name'])){
      $name_to_set = $_POST['name'];
      mysqli_query($link, "UPDATE login SET Contact_Name = '$name_to_set' WHERE ID = '$session_user_id'") or die(mysqli_error($link));
      $data_changed = True;
    }
    if(isset($_POST['number'])){
      $number_to_set = $_POST['number'];
      mysqli_query($link, "UPDATE login SET Contact_Phone_Number = '$number_to_set' WHERE ID = '$session_user_id'") or die(mysqli_error($link));
      $data_changed = True;
    }
    if(isset($_POST['email'])){
      $email_to_set = $_POST['email'];
      mysqli_query($link, "UPDATE login SET Contact_Email = '$email_to_set' WHERE ID = '$session_user_id'") or die(mysqli_error($link));
      $data_changed = True;
    }
    if($data_changed){
       echo("<script type='text/javascript'>alert('Dane kontaktowe zostały zaktualizowane');</script>");
    }
  
?>
</body>

</html>
