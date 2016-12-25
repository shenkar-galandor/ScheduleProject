<?php
mysql_select_db("scheduledb",$conn);

$result = mysql_query("SELECT * FROM `scheduletable`");
echo "<table>
			  <tr>
			    <th>ת.ז מרצה</th>
			    <th>יום</th>
			    <th>שעה</th>
			    <th>מספר כיתה</th>
			    <th>מספר קורס</th>
			  </tr>";
	while($row = mysql_fetch_array($result)){
		echo "<tr>
				<td>" .$row['lecturerID']. "</td><td>" .$row['day'] .
				"</td><td>" .$row['hour'] . "</td>
				<td>" .$row['classNum'] . "</td>
				<td>" .$row['courseNum'] . "</td></tr>";
	} 


?>