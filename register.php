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
					<label for="loginn">Login:</label><input type="text" name="loginn"/><br>
					<label for="hasloo">Hasło:</label><input type="password" name="hasloo"/><br>
					<label for="adres">Adres:</label><input type="text" name="adres"/>
					<label for="email">Email:</label><input type="text" name="email"/>
					<input type="submit" value="Zarejestruj się" name="rejestruj"/>
				</form>
			</div>
		</section>

	</body>

</html>