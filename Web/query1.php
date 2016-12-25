<?php
mysql_select_db("scheduledb",$conn);
$classes = mysql_query("SELECT `classNum` FROM `class`");
echo "<p>בחר מספר כיתה להצגת מרצים וקורסים</p>
	<form method=get>
		<select name=classNum>";
			while($row1 = mysql_fetch_array($classes)){
				echo "<option value='".$row1['classNum']."'>".$row1['classNum']."</option>";
			}
		echo "</select> <input type=submit value='בחר'>";

?>