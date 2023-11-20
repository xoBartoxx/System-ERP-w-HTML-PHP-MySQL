<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8"/>
		<title>view_customers</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<meta name="description" content="ERP System"/>
		<meta name="author" content="xoBartoxx"/>
	</head>
	
	<body>
	
		<?php

			$dbhost = 'localhost';
			$dbuser = 'root';
			$dbpass = '';
			$dbname = 'erpdatabase';

			$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

			$sql = 'SELECT id, login, imie, nazwisko, adres, email FROM customers';

			$result = mysqli_query($db, $sql);

			echo "<table>";
			echo "<tr>" . "<th>L.p.</th>";
			echo "<th>LOGIN</th>";
			echo "<th>Imie</th>";
			echo "<th>Nazwisko</th>";
			echo "<th>Adres</th>";
			echo "<th>Email</th>";
			echo "</tr>";
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_array($result)){
					echo "<tr>" . "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['login'] . "</td>";
					echo "<td>" . $row['imie'] . "</td>";
					echo "<td>" . $row['nazwisko'] . "</td>";
					echo "<td>" . $row['adres'] . "</td>";
					echo "<td>" . $row['email'] . "</td>";
					echo "</tr>";
				}

			}
			echo "</table>";
			mysqli_close($db);
		?>

</body>

</html>