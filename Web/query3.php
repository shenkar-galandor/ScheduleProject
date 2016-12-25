<?php
mysql_select_db("scheduledb",$conn);
$lectures = mysql_query("SELECT `id` FROM `lecturers`");
echo "<p>בחר מרצה להצגת פרטי קורסים כתות וזמן לימוד</p>
	<form method=get>
		<select name=lecturesID>";
			while($row1 = mysql_fetch_array($lectures)){
				echo "<option value='".$row1['id']."'>".$row1['id']."</option>";
			}
		echo "</select> <input type=submit value='בחר'>";

?>