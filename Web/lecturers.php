<?php
mysql_select_db("scheduledb",$conn);

$result = mysql_query("SELECT * FROM `lecturers`");
echo "<br>";
	while($row = mysql_fetch_array($result)){
		echo "id: " .$row['id']. " name: " .$row['firstName'] . " Last name: " .$row['lastName'] . " birthday: ". $row['birthDay'] . " age: " . $row['age'] . " address: " . $row['address']. "<br>";
	} 


?>