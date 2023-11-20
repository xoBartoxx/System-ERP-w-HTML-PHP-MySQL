<!DOCTYPE html>
<html lang="pl">
	
	<head>
		<meta charset="utf-8"/>
		<title>System ERP</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<meta name="description" content="ERP System"/>
		<meta name="author" content="xoBartoxx"/>
	</head>
		
		
	<body>
		<header id="baner">
			<h1>Tworzenie Systemu ERP z Zarządzaniem Pracownikami w HTML, PHP oraz MySQL</h1>
		</header>
		<section id="sss">
			<section id="register">
				<h4>Rejestracja</h4>
				<form action="register.php" method="post">
					<label for="login">Login:</label><input type="text" name="login"/><br>
					<label for="haslo">Hasło:</label><input type="password" name="haslo" id="pass"/><br>
					<script>
						function ukryjhaslo() {
						var x = document.getElementById("pass");
						if (x.type === "password") {
							x.type = "text";
						} else {
							x.type = "password";
							}
						}
					</script>
					<label for="adres">Adres:</label><input type="text" name="adres"/><br>
					<label for="email">Email:</label><input type="email" name="email"/><br>
					<label for="imie">Imie:</label><input type="text" name="imie"/><br>
					<label for="nazwisko">Nazwisko:</label><input type="text" name="nazwisko"/><br>
					<input type="checkbox" onclick="ukryjhaslo()"/>Pokaż hasło<br>
					<input type="submit" value="Zarejestruj się" name="rejestruj"/><br>
				</form>
				<?php
			$dbhost = 'localhost';
			$dbuser = 'root';
			$dbpass = '';
			$dbname = 'erpdatabase';

			$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
			
			
			if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"]) && isset($_POST["haslo"]) && isset($_POST["adres"]) && isset($_POST["email"])){
				$login = $_POST['login'];
				$haslo = $_POST['haslo'];
				$haslo = md5($haslo);
				$adres = $_POST['adres'];
				$email = $_POST['email'];
				$imie = $_POST['imie'];
				$nazwisko = $_POST['nazwisko'];
				
				$sql = "SELECT * FROM customers WHERE login = '$login'";
				
				$result = mysqli_query($db, $sql);
				
				$pos = strpos($email, "@");
				$pos2 = strpos($email, ".");
				$spr4 = strlen($login);
				$spr5 = strlen($haslo);
				
				
				if (!$login || !$email || !$haslo || !$adres || !$imie || !$nazwisko) {
					echo '<span style="color: red; font-weight: bold; font-size: 140%;">Musisz wypełnić wszystkie pola!</span>';
				}
				else if (mysqli_num_rows($result) > 0){
					echo '<span style="color: red; font-weight: bold;">Login jest już zajęty!</span>';
				}	
				else{	
					$result2 = mysqli_query($db, "INSERT INTO customers (login, email, haslo, adres, imie, nazwisko) VALUES('$login','$email','$haslo','$adres', '$imie', '$nazwisko')") or die("Nie mogłem Cie zarejestrować!");
		
					echo '<br><span style="color: green; font-weight: bold; font-size: 140%;">Zostałeś zarejestrowany '.$login.'.<br>Teraz możesz się zalogować <a href="login.php" style="text-decoration: none;">TUTAJ</a>.</span>';
				}

				
			}
				

		mysqli_close($db);
		?>
			</section>
		</section>
		
	
		<footer>
			<p>Author: xoBartoxx</p>
		</footer>
	
	</body>

</html>