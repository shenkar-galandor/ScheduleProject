<?php
mysql_select_db("scheduledb",$conn);

$result = mysql_query("SELECT * FROM `class`");
echo "<a class=add href=?addClass=true>הוספה</a>
	<table>
			  <tr>
			    <th>מספר כיתה</th>
			    <th>מספר בניין</th>
			    <th>קומה</th>
			    <th></th>
			    <th></th>
			  </tr>";
	while($row = mysql_fetch_array($result)){
		echo "<tr>
				<td>" .$row['classNum']. "</td><td>" .$row['classBuilding'] .
				"</td><td>" .$row['classFloor'] . "</td>
				<td><a href='?deleteClass=" . $row['classNum'] . "'><img src=images/delete.png></a></td>
				<td><a href='?editClass=" . $row['classNum'] . "'><img src=images/edit.png></a></td></tr>";
	} 


?>