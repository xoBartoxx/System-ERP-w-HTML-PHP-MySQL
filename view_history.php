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

			$sql = 'SELECT id_akcji, log, data FROM EmployeeActions ORDER BY id_akcji DESC';

			$result = mysqli_query($db, $sql);

			echo "<table>";
			echo "<tr>" . "<th>L.p.</th>";
			echo "<th>Czynność</th>";
			echo "<th>Data(Y:M:D)</th>";
			echo "</tr>";
			
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_array($result)){
					echo "<tr>" . "<td>" . $row['id_akcji'] . "</td>";
					echo "<td>" . $row['log'] . "</td>";
					echo "<td>" . $row['data'] . "</td>";
					echo "</tr>";
					}

				}
			echo "</table>";
			mysqli_close($db);
		?>

	</body>
	
</html>