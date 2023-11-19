<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>edit_product</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<meta name="description" content="ERP System"/>
		<meta name="author" content="xoBartoxx"/>
	</head>

	<body>
		<h2>Edytowanie produktu</h2>
		<form action="edit_product.php" method="post">
	     Wybierz numer produktu<select name="id">
		<?php
			$dbhost = 'localhost';
			$dbuser = 'root';
			$dbpass = '';
			$dbname = 'erpdatabase';
			$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
			
			
			$sql = "SELECT id FROM products";
			
			$result = mysqli_query($db, $sql);
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){
					
					echo "<option value='". $row['id'] ."'>" . $row['id'] . '</option>';

				}
			}

			mysqli_close($db);
		?>
		</select>
		<br>
		Nazwa produktu:<input type="textarea" name="nazwa"/><br>
		Opis produktu:<input type="textarea" name="opis"/><br>
		Cena produktu<input type="number" step="any" name="cena"/><br>
		Dostępność produktu<input type="number" name="ile"/><br>
		<input type="submit" name="submit" value="Potwierdź ID"/>
		</form>
	</body>

	<?php

		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$dbname = 'erpdatabase';
		
		$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
		
		if(isset($_POST['submit'])){
			$id = $_POST['id'];
			$nazwa = $_POST['nazwa'];
			$opis = $_POST['opis'];
			$cena = $_POST['cena'];
			$ile = $_POST['ile'];
			
			
			
			
			if(isset($_POST['nazwa'])){
				$sql1 = "UPDATE products SET nazwa = '$nazwa' WHERE id='$id'";
				
				$result1 = mysqli_query($db, $sql1);
			}
			else{
				echo 'Nie uzupełniono nazwy produktu';
			}
			if(isset($_POST['opis'])){
				$sql2 = "UPDATE products SET opis = '$opis' WHERE id='$id'";
				
				$result2 = mysqli_query($db, $sql2);
			}
			else{
				echo 'Nie uzupełniono opisu produktu';
			}
			if(isset($_POST['cena'])){
				$sql3 = "UPDATE products SET cena = '$cena' WHERE id='$id'";
				
				$result3 = mysqli_query($db, $sql3);
			}
			else{
				echo 'Nie uzupełniono ceny produktu';
			}
			if(isset($_POST['ile'])){
				$sql4 = "UPDATE products SET dostepnosc = '$ile' WHERE id='$id'";
				
				$result4 = mysqli_query($db, $sql4);
			}
			else{
				echo 'Nie uzupełniono dostępności produktu';
			}
			
			
			$data = date("Y-m-d H:i:s");
			$log = "INSERT INTO employeeactions(data, log) VALUES ('$data','Zedytowano produkt o numerze $id')";
			$resultlog = mysqli_query($db, $log);
			
			
		}
		
			
		
		mysqli_close($db);
	?>



</html>