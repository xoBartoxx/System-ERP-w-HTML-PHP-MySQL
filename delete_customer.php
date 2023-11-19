<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>delete_customer</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<meta name="description" content="ERP System"/>
		<meta name="author" content="xoBartoxx"/>
	</head>

	<body>
		<h2>Usuwanie klienta z bazy danych</h2>
		<form action="delete_customer.php" method="post">
	     Wybierz numer klienta, którego chcesz usunąć
		 <select name="id">
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
			
			$sql = "DELETE FROM customers WHERE id = '$id'";
			
			$result = mysqli_query($db, $sql);
				
			if(($result)===TRUE){
				echo 'Pomyślnie usunięto rekord';
			}
			else{
				echo 'Rekord nie isntnieje!';
			}
			
			$data = date("Y-m-d H:i:s");
			$log = "INSERT INTO EmployeeActions (data, log) VALUES ('$data','Usunięto klienta o numerze $id')";
			$resultlog = mysqli_query($db, $log);
		}
		
		mysqli_close($db);

	?>



</html>