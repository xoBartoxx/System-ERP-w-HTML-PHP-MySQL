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