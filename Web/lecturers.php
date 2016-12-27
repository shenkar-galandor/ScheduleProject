<?php
mysql_select_db("scheduledb",$conn);

$result = mysql_query("SELECT `lecturers`.`id`,`lecturers`.`firstName`,`lecturers`.`lastName`,`lecturers`.`birthDay`,`lecturers`.`age`,`lecturers`.`address`,`telephones`.`phoneNumber` FROM `lecturers` LEFT JOIN `telephones` ON `lecturers`.`id` = `telephones`.`lecturerID`");

	echo "<a class=add href=?addLecture=true>הוספה</a>
	<table>
			  <tr>
			    <th>תעודת זהות</th>
			    <th>שם פרטי</th>
			    <th>שם משפחה</th>
			    <th>תאריך לידה</th>
			    <th>גיל</th>
			    <th>כתובת</th>
			    <th>טלפון</th>
			    <th></th>
			    <th></th>
			  </tr>";
	while($row = mysql_fetch_array($result)){
		echo "<tr>
				<td>" .$row['id']. "</td><td>" .$row['firstName'] .
				"</td><td>" .$row['lastName'] . "</td><td>". $row['birthDay'] .
				"</td><td>" . $row['age'] . "</td><td>" . $row['address']. "</td><td>" . $row['phoneNumber']. "</td>
				<td><a href='?deleteLecture=" . $row['id'] . "'><img src=images/delete.png></a></td>
				<td><a href='?editLecture=" . $row['id'] . "'><img src=images/edit.png></a></td></tr>";
	}
?>