<!DOCTYPE html>
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
		
		<header id="panel">
				<h2>Witaj w naszym sklepie komputerowym!</h2>
		</header>
			<section id="guziki">
				<a href="login.php">Logowanie</a>
				<a href="register.php">Rejestracja</a>
			</section>
		<section id="oferta">
			<h3>Sprawdź naszą ofertę poniżej!</h3>
		</section>
		<section id="sklep">
			<?php
				include "view_products.php";
			?>
		</section>

				
			<section id="elo">
			<section class="butony">
				<h2>PRODUKTY</h2>
				
				<a href="add_product.php"><button>DODAJ PRODUKT</button></a>
				<a href="edit_product.php"><button>EDYTUJ PRODUKT</button></a>
				<a href="delete_product.php"><button>USUŃ PRODUKT</button></a>
			</section>
			
			<section class="butony">
				<h2>KLIENCI</h2>
				<a href="add_customer.php"><button>DODAJ KLIENTA</button></a>
				<a href="edit_customer.php"><button>EDYTUJ KLIENTA</button></a>
				<a href="delete_customer.php"><button>USUŃ KLIENTA</button></a>
				<a href="view_customers.php"><button>ZOBACZ WSZYSTKICH KLIENTÓW</button></a>
			</section>
			
			<section class="butony">
				<h2>PRACOWNICY</h2>
				<a href="add_employee.php"><button>DODAJ PRACOWNIKA</button></a>
			</section>
			<section class="butony">
				<h2>HISTORIA</h2>
				<a href="view_history.php"><button>SPRAWDŹ LOGI</button></a>
			</section>

		</section>
		
		<footer>
			<p>Author: xoBartoxx</p>
		</footer>
		
	</body>

</html>