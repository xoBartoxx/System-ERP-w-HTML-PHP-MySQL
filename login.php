<!DOCTYPE html>
<?php
session_start();
?>
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
			<h2>Panel Logowania</h2>
		</header>
		<section>
			<div id="login">
				<h4>Logowanie</h4>
				<form action="login.php" method="post">
					<label for="login">Login:</label><input type="text" name="login"/><br>
					<label for="haslo">Hasło:</label><input type="password" name="haslo"/><br>
					<input type="submit" value="Zaloguj" name="loguj"/>
				</form>
			</div>
		</section>
		<?php
			

		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$dbname = 'erpdatabase';

		$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

		if(isset($_POST['loguj'])){
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		$haslo = addslashes($haslo);
		$login = addslashes($login);
		$login = htmlspecialchars($login);

		$haslo = md5($haslo); //szyfrowanie hasla
			if (!$login OR empty($login)) {
		include("head2.php");
		echo '<p class="alert">Wypełnij pole z loginem!</p>';
		include("foot.php");
		exit;
		}
			if (!$haslo OR empty($haslo)) {
		include("head2.php");
		echo '<p class="alert">Wypełnij pole z hasłem!</p>';
		include("foot.php");
		exit;
		}
		$istnick = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) FROM `uzytkownicy` WHERE `login` = '$login' AND `haslo` = '$haslo'")); // sprawdzenie czy istnieje uzytkownik o takim nicku i hasle
			if ($istnick[0] == 0) {
		echo 'Logowanie nieudane. Sprawdź pisownię nicku oraz hasła.';
			} else {

		$_SESSION['nick'] = $login;
		$_SESSION['haslo'] = $haslo;

		header("Location: zamowienia.php");
		}
		}
		
		mysqli_close($db);
	

			
		?>
	
	</body>

</html>