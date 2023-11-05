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
			<h2>Panel Rejestracji</h2>
		</header>
		<section>
			<div id="register">
				<h4>Rejestracja</h4>
				<form action="register.php" method="post">
					<label for="login">Login:</label><input type="text" name="login"/><br>
					<label for="haslo">Hasło:</label><input type="password" name="haslo"/><br>
					<label for="adres">Adres:</label><input type="text" name="adres"/>
					<label for="email">Email:</label><input type="text" name="email"/>
					<input type="submit" value="Zarejestruj się" name="rejestruj"/>
				</form>
			</div>
		</section>
		<?php
			$dbhost = 'localhost';
			$dbuser = 'root';
			$dbpass = '';
			$dbname = 'erpdatabase';

			$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
			
			$ip = $_SERVER['REMOTE_ADDR'];

			if(isset($_POST['rejestruj'])){
				
			//
			$login = substr(addslashes(htmlspecialchars($_POST['login'])),0,32);
			$haslo = substr(addslashes($_POST['haslo']),0,32);
			$email = substr($_POST['email'],0,32);
			$login = trim($login);
			//kilka sprawdzen co do loginu i maila
			$spr1 = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) FROM uzytkownicy WHERE login='$login' LIMIT 1")); //czy user o takim loginu istnieje
			$spr2 = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) FROM uzytkownicy WHERE email='$email' LIMIT 1")); // czy user o takim emailu istnieje
			$pos = strpos($email, "@");
			$pos2 = strpos($email, ".");
			$komunikaty = '';
			$spr4 = strlen($login);
			$spr5 = strlen($haslo);
			//sprawdzenie co uzytkownik zle zrobil
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

			//jesli cos jest nie tak to blokuje rejestracje i wyswietla bledy
			
			else
			//jesli wszystko jest ok dodaje uzytkownika i wyswietla informacje
			$login = str_replace ( ' ','', $login );
			$haslo = md5($haslo); //szyfrowanie hasla

			mysqli_query($db, "INSERT INTO `uzytkownicy` (login, email, haslo, ip) VALUES('$login','$email','$haslo','$ip')") or die("Nie mogłem Cie zarejestrować!");

			echo '<br><span style="color: green; font-weight: bold;">Zostałeś zarejestrowany '.$login.'. Teraz możesz się zalogować</span><br>';
			echo '<br><a href="login.php">Logowanie</a>';
			
			}
		mysqli_close($db);
		?>

<form method=
	</body>

</html>