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
		
		<header id="panel">
			<div id ="welcome">
				<h2>Witaj w naszym sklepie komputerowym!</h2>
			</div>
			<div id="guziki">
				<a id="log" href="login.php">Logowanie</a>
				<a id="reg" href="register.php">Rejestracja</a>
			</div>
		</header>
		
		<section id="sklep">
		</section>
	
		<main>
			<h3>Lista naszych produktów:</h3>
			<?php
				//view.products.php
				include('view_products.php');	
			?>
		</main>
		
		
		
		
		
		
	</body>

</html>