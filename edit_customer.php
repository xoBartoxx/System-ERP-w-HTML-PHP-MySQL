<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>edit_customer</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<meta name="description" content="ERP System"/>
		<meta name="author" content="xoBartoxx"/>
	</head>

	<body>
		<h2>Edycja klienta w bazie danych</h2>
		<form action="edit_customer.php" method="post">
			Wybierz numer klienta: <select name="id">
			<?php
				$dbhost = 'localhost';
				$dbuser = 'root';
				$dbpass = '';
				$dbname = 'erpdatabase';
				$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
				
				
				$sql = "SELECT id FROM customers";
				
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
				
				Login klienta: <input type="textarea" name="login"/><br>
				Zresetuj hasło<input type="checkbox" name="reset" value="Zresetuj hasło"/><br>
				Możesz ustawić nowe hasło:<input type="password" name="haslo" id="pass">
				<input type="checkbox" onclick="ukryjhaslo()">Pokaż hasło<br>
				<script>
					function ukryjhaslo() {
					var x = document.getElementById("pass");
					if (x.type === "password") {
						x.type = "text";
					} else {
						x.type = "password";
						}
					}
				</script>
				<label for="Imie">Imię: </label><input type="textarea" name="imie"/><br>
				<label for="nazwisko">Nazwisko: </label><input type="textarea" name="nazwisko"/><br>
				<label for="adres">Adres: </label><input type="textarea" name="adres"/><br>
				<label for="email">E-mail: </label><input type="textarea" name="email"/><br>
				<input type="submit" value="Wyślij" name="submit"/><input type="reset" value="Wyczyść"/>
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
			$login = $_POST['login'];
			$haslo = $_POST['haslo'];
			$reset = $_POST['reset'];
			$imie = $_POST['imie'];
			$nazwisko = $_POST['nazwisko'];
			$adres = $_POST['adres'];
			$email = $_POST['email'];
			
			$haslo = md5($haslo);
			
			
			if(isset($_POST['login'])){
				$sql1 = "UPDATE customers SET login = '$login' WHERE id='$id'";
				
				$result1 = mysqli_query($db, $sql1);
			}
			else{
				echo 'Nie zmieniono loginu klienta';
			}
			if(isset($_POST['imie'])){
				$sql2 = "UPDATE customers SET imie = '$imie' WHERE id='$id'";
				
				$result2 = mysqli_query($db, $sql2);
			}
			else{
				echo 'Nie uzupełniono imienia klienta';
			}
			if(isset($_POST['nazwisko'])){
				$sql3 = "UPDATE customers SET nazwisko = '$nazwisko' WHERE id='$id'";
				
				$result3 = mysqli_query($db, $sql3);
			}
			else{
				echo 'Nie uzupełniono nazwiska klienta';
			}
			if(isset($_POST['adres'])){
				$sql4 = "UPDATE customers SET adres = '$adres' WHERE id='$id'";
				
				$result4 = mysqli_query($db, $sql4);
			}
			else{
				echo 'Nie uzupełniono adresu';
			}
			if(isset($_POST['email'])){
				$sql5 = "UPDATE customers SET email = '$email' WHERE id='$id'";
				
				$result5 = mysqli_query($db, $sql5);
			}
			else{
				echo 'Nie uzupełniono e-maila';
			}
			if(isset($_POST['reset'])){
				$sql6 = "UPDATE customers SET haslo = 'NULL' WHERE id='$id'";
				
				$result6 = mysqli_query($db, $sql6);
			}
			else{
				echo 'Nie zaznaczono opcji resetu hasła';
			}
			if(isset($_POST['haslo'])){
				$sql7 = "UPDATE customers SET haslo = '$haslo' WHERE id='$id'";
				
				$result7 = mysqli_query($db, $sql7);
			}
			else{
				echo 'Nie zmieniono hasła';
			}
			
			$data = date("Y-m-d H:i:s");
			$log = "INSERT INTO EmployeeActions (data, log) VALUES ('$data','Zedytowano klienta o numerze '$id'')";
			$resultlog = mysqli_query($db, $resultlog);
		}
		

		
		mysqli_close($db);
	?>



</html>