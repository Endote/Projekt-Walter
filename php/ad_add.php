<html>
	<head>
		<meta charset='utf-8'>
	</head>
	<body>
		<form method="post">
			<textarea name="title" cols="100" rows="1">Tutaj wpisz tytuł ogłoszenia</textarea><br/>
			<textarea name="text" cols="100" rows="30">Tutaj wpisz treść swojego ogłoszenia</textarea><br/>
			Tu załącz zdjęcie:
			<input type="file" name="image" accept="image/png, image/jpeg" /> <br/><br/>
			<input type="submit"/>
		</form>
		<p>
		Wskazówki dotyczące formatowania tekstu:<br/>
		*tekst* - wypisuje tekst kursywą<br/>
		#tekst# - pogrubia tekst<br/>
		_tekst_ - podkreśla tekst<br/>
		~tekst~ - przekreśla tekst<br/>
		</p>
		<?php
		require_once 'connect.php';
		require_once 'session.php';
			// this function is responsible for converting text-markings such as * ** _ ~ to html markup tags like <b> <u> etc.
			function ConvertFormating($text_to_convert){
				//Here is an aray with keys and values that will help us to convert the markings
				$all_markings = [
					"*" => "i",
					"#" => "b",
					"_" => "u",
					"~" => "s",
				];
				//First we convert all new line characters like \n to <br/> tags
				$local_text = nl2br($text_to_convert);
				//Now we convert the rest of markings
				foreach ($all_markings as $key => $value) {
					$opened_tag = "<".$value.">";
					$closed_tag = "</".$value.">";

					$res_str = array_chunk(explode($key,$local_text),2);
					foreach( $res_str as &$val){
   						$val  = implode($opened_tag,$val);
					}

					$local_text = implode($closed_tag,$res_str);
				}
				return $local_text;
			}

			if(isset($_POST['text']) && isset($_POST['title']) && isset($_POST['image'])){
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "ads";

				$ad_text = ConvertFormating($_POST['text']);
				$ad_title = $_POST['title'];
				$ad_image = $_POST['image'];

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				$conn->set_charset("utf8");

				// Check connection
				if ($conn->connect_error) {
    				die("Connection failed: " . $conn->connect_error);
				}
				echo "Connected successfully<br>";
				//Insert our ad into the database
				$result = mysqli_query($conn, "INSERT INTO ads (title,text,image) VALUES ('$ad_title','$ad_text','$ad_image')") or die("Query not correct<br>");
				echo "Post submited<br>";
			}
		?>
	</body>
</html>