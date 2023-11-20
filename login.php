<!DOCTYPE html>
<?php
session_start();

?>
<html lang="pl">
	
	<head>
		<meta charset="utf-8"/>
		<title>System ERP</title>
		<meta name="description" content="ERP System"/>
		<meta name="author" content="xoBartoxx"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
		
		
	<body>
		<header id="baner">
			<h1>Tworzenie Systemu ERP z Zarządzaniem Pracownikami w HTML, PHP oraz MySQL</h1>
		</header>
		
		<section id="sss">
			<section id="login">
				<h4>Panel logowania</h4>
				<form action="login.php" method="post">
					<b>Login:</b> <input type="text" name="login"><br>
					<b>Hasło:</b> <input type="password" name="haslo"><br>
					<input type="submit" value="Zaloguj" name="loguj">
				</form>
				<?php
			

		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$dbname = 'erpdatabase';

		$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

		if (isset($_POST["loguj"])) {
			$login = $_POST["login"];
			$haslo = $_POST["haslo"];
			$haslo = md5($haslo);
			
			$sql = "SELECT login, haslo FROM customers WHERE login = '$login' AND haslo = '$haslo'";
			$result = mysqli_query($db,$sql);
		  
		  
		  
		if(mysqli_num_rows($result)>0){
			echo '<span style="color: green; font-weight: bold;">Zalogowano pomyślnie!</span>';
			echo '<br> Teraz możesz złożyć swoje zamówienie ' . '<a href="zamowienie.php"> w tym miejscu</a>';
		}
		else{
			echo '<span style="color: red; font-weight: bold;">Niepoprawny login lub hasło!</span>';
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