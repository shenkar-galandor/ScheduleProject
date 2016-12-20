<?php
mysql_select_db("scheduledb",$conn);

$result = mysql_query("SELECT * FROM `class`");
echo "<br>";
	while($row = mysql_fetch_array($result)){
		echo "Class Number: " .$row['classNum']. " Building: " .$row['classBuilding'] . " Floor: " .$row['classFloor'] ."<br>";
	} 


?>