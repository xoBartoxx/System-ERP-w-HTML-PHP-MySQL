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
		<header id="h">
			<h2>Rejestracja</h2>
		</header>
		<section id="sss">
			<section id="register">
				<h4>Rejestracja</h4>
				<form action="register.php" method="post">
					<label for="login">Login:</label><input type="text" name="login"/><br>
					<label for="haslo">Hasło:</label><input type="password" name="haslo"/><br>
					<label for="adres">Adres:</label><input type="text" name="adres"/><br>
					<label for="email">Email:</label><input type="text" name="email"/><br>
					<label for="imie">Imie:</label><input type="text" name="imie"/><br>
					<label for="nazwisko">Nazwisko:</label><input type="text" name="nazwisko"/><br>
					<input type="submit" value="Zarejestruj się" name="rejestruj"/><br>
				</form>
			</section>
		</section>
		<?php
			$dbhost = 'localhost';
			$dbuser = 'root';
			$dbpass = '';
			$dbname = 'erpdatabase';

			$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
			

			if(isset($_POST['rejestruj'])){
				
			$login = substr(addslashes(htmlspecialchars($_POST['login'])),0,32);
			$haslo = substr(addslashes($_POST['haslo']),0,32);
			$email = substr($_POST['email'],0,32);
			$login = trim($login);
			$adres = $_POST['adres'];
			$imie = $_POST['imie'];
			$nazwisko = $_POST['nazwisko'];
			$spr1 = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) FROM customers WHERE login='$login' LIMIT 1")); 
			$spr2 = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) FROM customers WHERE email='$email' LIMIT 1")); 
			$pos = strpos($email, "@");
			$pos2 = strpos($email, ".");
			$komunikaty = '';
			$spr4 = strlen($login);
			$spr5 = strlen($haslo);
			if (!$login || !$email || !$haslo ) {
			$komunikaty .= "Musisz wypełnić wszystkie pola!<br>"; }
			if ($spr4 < 4) {
			$komunikaty .= "Login musi mieć przynajmniej 4 znaki<br>"; }
			if ($spr5 < 4) {
			$komunikaty .= "Hasło musi mieć przynajmniej 4 znaki<br>"; }
			if ($spr1[0] >= 1) {
			$komunikaty .= "Ten login jest zajęty!<br>"; }
			if ($spr2[0] >= 1) {
			$komunikaty .= "Ten e-mail jest już używany!<br>"; }
			if ($pos == false OR $pos2 == false) {
			$komunikaty .= "Nieprawidłowy adres e-mail<br>"; }
			
			else
			$login = str_replace ( ' ','', $login );
			$haslo = md5($haslo);

			mysqli_query($db, "INSERT INTO customers (login, email, haslo, adres, imie, nazwisko) VALUES('$login','$email','$haslo','$adres', '$imie', '$nazwisko')") or die("Nie mogłem Cie zarejestrować!");
		
			echo '<br><span style="color: green; font-weight: bold;">Zostałeś zarejestrowany '.$login.'. Teraz możesz się zalogować</span><br>';
			echo '<br><a href="login.php">Logowanie</a>';
			
			}
		mysqli_close($db);
		?>
	
		<footer>
			<p>Author: xoBartoxx</p>
		</footer>
	
	</body>

</html>