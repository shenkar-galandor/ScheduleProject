<?php
mysql_select_db("scheduledb",$conn);

$result = mysql_query("SELECT * FROM `courses`");
echo "
	<a class=add href=?addCourse=true>הוספה</a>
	<table>
			  <tr>
			    <th>מספר קורס</th>
			    <th>שם הקורס</th>
			    <th>סמסטר</th>
			    <th>שנה</th>
			    <th>מספר שעות</th>
			    <th></th>
			    <th></th>
			  </tr>";
	while($row = mysql_fetch_array($result)){
		echo "<tr>
				<td>" .$row['courseNum']. "</td><td>" .$row['courseName'] .
				"</td><td>" .$row['semester'] . "</td><td>". $row['year'] .
				"</td><td>" . $row['numOfHours'] . "</td>
				<td><a href='?deleteCourse=" . $row['courseNum'] . "'><img src=images/delete.png></a></td>
				<td><a href='?editCourse=" . $row['courseNum'] . "'><img src=images/edit.png></a></td></tr>";
	} 


?>