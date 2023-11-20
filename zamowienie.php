<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Zamówienie</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<meta name="description" content="ERP System"/>
		<meta name="author" content="xoBartoxx"/>
	</head>

	<body>
		<header id="baner">
			<h1>Tworzenie Systemu ERP z Zarządzaniem Pracownikami w HTML, PHP oraz MySQL</h1>
		</header>
		<section id="order">
			<h1>Przejrzyj naszą ofertę i złóż swoje zamówienie!</h1>
		</section>
		<?php
			$dbhost = 'localhost';
			$dbuser = 'root';
			$dbpass = '';
			$dbname = 'erpdatabase';

			$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

			$sql = 'SELECT id, nazwa, opis, cena, dostepnosc FROM products';

			$result = mysqli_query($db, $sql);

			echo "<table>";
			echo "<tr>" . "<th>L.p.</th>";
			echo "<th>Nazwa produktu</th>";
			echo "<th>Opis produktu</th>";
			echo "<th>Cena</th>";
			echo "<th>Dostępność</th>";
			echo "</tr>";
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_array($result)){
					echo "<tr>" . "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['nazwa'] . "</td>";
					echo "<td>" . $row['opis'] . "</td>";
					echo "<td>" . $row['cena'] . "</td>";
					echo "<td>" . $row['dostepnosc'] . "</td>";
					echo "</tr>";
				}

			}
			echo "</table>";
			
			mysqli_close($db);
		
		?>
		<section class="formularze">
			<br><h3>Zamów produkt o numerze:</h3>
			<form action="zamowienie.php" method="post">
			<select name="id">
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
				<label for="ile">Liczba:</label><input type="number" name="ile"/><br>
				<label for="login">Twój login:</label><input type="text" name="login"/><br>
				<input type="submit" name="submit" value="Zamów"/><br>
			</form>
			<?php
				$dbhost = 'localhost';
				$dbuser = 'root';
				$dbpass = '';
				$dbname = 'erpdatabase';

				$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
				
				if(isset($_POST['submit'])){
					$id = $_POST['id'];
					$ile = $_POST['ile'];
					$login = $_POST['login'];

					$data = date("Y-m-d H:i:s");
					
					$sql = "SELECT id FROM customers WHERE login = '$login'";
					$result = mysqli_query($db,$sql);
					
					if(mysqli_num_rows($result)>0){
						while($row = mysqli_fetch_array($result)) {
							$id_login = $row['id'];
						}
						$sql2 = "INSERT INTO Orders(id_produktu, Ilosc, data_zamowienia, Id_Klienta) VALUES ('$id', '$ile', '$data', '$id_login')";
						$result2 = mysqli_query($db, $sql2);
						echo '<span style="font-size: 120%; font-weight: bold; color: green;">Zamówiłeś nasz produkt. Dziękujemy!';
					}
					else{
						echo '<span style="color: red; font-weight: bold;">Nie znajdujesz się w naszym systemie!</span>';
					}
				}
				
				mysqli_close($db);	
			?>
		</section>

		
		<footer>
			<p>Author: xoBartoxx</p>
		</footer>
	</body>

</html>