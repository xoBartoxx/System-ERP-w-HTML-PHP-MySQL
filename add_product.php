<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>add_product</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<meta name="description" content="ERP System"/>
		<meta name="author" content="xoBartoxx"/>
	</head>

	<body>
		<section class="formularze">
			<h2>Dodawanie produktu</h2>
			<form action="add_product.php" method="post">
				<label for="nazwa">Nazwa </label><input type="textarea" name="nazwa"/><br>
				<label for="opis">Opis </label><input type="textarea" name="opis"/><br>
				<label for="cena">Cena </label><input type="number" step="any" name="cena"/><br>
				<label for="ile">Dostępność </label><input type="number" name="ile"/><br>
				
				<input type="submit" value="Wyślij" name="submit"/><input type="reset" value="Wyczyść"/>
			</form>
		</section>
	</body>

	<?php

		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$dbname = 'erpdatabase';

		$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
		
		if(isset($_POST['submit'])){
			$nazwa = $_POST['nazwa'];
			$opis = $_POST['opis'];
			$cena = $_POST['cena'];
			$ile = $_POST['ile'];
			
			$sql = "INSERT INTO products(nazwa,opis,cena,dostepnosc) VALUES ('$nazwa','$opis','$cena','$ile')";
			$result = mysqli_query($db, $sql);
			
			if(($result)===TRUE){
				echo "Pomyślnie dodano produkt";
			}
			else{
				echo 'Coś poszło nie tak. Nie udało się dodać produktu.';
			}
			
			
			$data = date("Y-m-d H:i:s");
			$sql2 = "INSERT INTO EmployeeActions (data, log) VALUES ('$data', 'Dodano produkt $nazwa')";
			$result2 = mysqli_query($db, $sql2);
		
			}
		mysqli_close($db);
	?>



</html>