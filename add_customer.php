<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>add_customer</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<meta name="description" content="ERP System"/>
		<meta name="author" content="xoBartoxx"/>
	</head>

	<body>
		<h1>Utworzenie nowego użytkownika w bazie danych</h1>
		<form action="add_customer.php" method="post">
			<label for="login">Login użytkownika: </label><input type="textarea" name="login" /><br>
			<label for="haslo">Hasło użytkownika: </label><input type="password" name="haslo" id="pass"/>
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
			$login = $_POST['login'];
			$haslo = $_POST['haslo'];
			$imie = $_POST['imie'];
			$nazwisko = $_POST['nazwisko'];
			$adres = $_POST['adres'];
			$email = $_POST['email'];
			
			$haslo = md5($haslo);
			
			$komunikaty = "";
			$mail1 = strpos($email, "@");
			$mail2 = strpos($email, ".");
			

			if ($mail1 == false OR $mail2 == false) {
				$komunikaty .= "Nieprawidłowy adres e-mail!"; }
			
			
			
			
			$sql = "INSERT INTO customers(login, haslo, imie, nazwisko, adres, email) VALUES ('$login','$haslo','$imie','$nazwisko', '$adres', '$email')";
			$result = mysqli_query($db, $sql);
			
			if(($result)===TRUE){
				echo 'Pomyślnie dodano klienta';
			}

			
			$data = date("Y-m-d H:i:s");
			$log = "INSERT INTO EmployeeActions (data, log) VALUES ('$data','Dodano klienta o loginie $login')";
			$resultlog = mysqli_query($db, $log);
			
		
		}
		
		
		mysqli_close($db);
	?>



</html>