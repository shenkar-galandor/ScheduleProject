<?php
mysql_select_db("scheduledb",$conn);

$result = mysql_query("SELECT * FROM `courses`");
echo "<br>";
	while($row = mysql_fetch_array($result)){
		echo "Course Number: " .$row['courseNum']. " Course Name: " .$row['courseName'] . " Semester: " .$row['semester'] . " Year: ". $row['year'] . " Number Of Hourse: " . $row['numOfHours'] ."<br>";
	} 


?>