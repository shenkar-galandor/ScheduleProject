<?php

function getDay($num){
    	if ($num==0) return "Sunday";
    	else if ($num==1) return "Monday";
    	else if ($num==2) return "Tuesday";
    	else if ($num==3) return "Wednesday";
    	else if ($num==4) return "Thursday";
    	else if ($num==5) return "Friday";
 };
function getNum($day){
    	if ($day=='Sunday') return 0;
    	else if ($day=='Monday') return 1;
    	else if ($day=='Tuesday') return 2;
    	else if ($day=='Wednesday') return 3;
    	else if ($day=='Thursday') return 4;
    	else if ($day=='Friday') return 5;
};

function addHour($cTime){
	$timestamp = strtotime($cTime) + 60*60;
	$time = date('H:i:s', $timestamp);
	return $time;
}

// START Lecturers Functions
// Delete Lecture
if(isset($_GET['deleteLecture'])) {
    $id = $_GET['deleteLecture'];
    mysql_query("DELETE FROM `lecturers` WHERE `lecturers`.`id` =" . $id,$conn);
    echo "<p>המידע המבוקש נמחק בהצלחה!</p>";
}
// Edit Lecture
else if (isset($_GET['editLecture'])) {
	$id = $_GET['editLecture'];
	$result = mysql_query("SELECT * FROM `lecturers` WHERE `id` =" . $id);
	$row = mysql_fetch_array($result);
	echo "<form method=get>
		תעודת זהות<br><input type=hidden name=mId value=". $row['id'] .
		"><input type=text name=id value=" . $row['id'] . 
		"><br><br>שם פרטי<br> <input type=text name=firstName value=" . $row['firstName'] .
		"><br><br>שם משפחה<br> <input type=text name=lastName value=" . $row['lastName'] .
		"><br><br>תאריך לידה<br> <input type=text name=birthDay value=" . $row['birthDay'] .
		"><br><br>גיל<br> <input type=text name=age value=" . $row['age'] .
		"><br><br>כתובת<br> <input type=text name=address value=" . $row['address'] . "><b><br>
		<input class=add2 type=submit value='עדכן פרטים'></form>";
}
else if (isset($_GET['id']) && isset($_GET['firstName']) &&
	isset($_GET['lastName']) && isset($_GET['birthDay']) &&
	isset($_GET['age']) && isset($_GET['address'])) {
	mysql_query("UPDATE `lecturers` SET `id` = '".$_GET['id']."', `firstName` = '".$_GET['firstName']."', `lastName` = '".$_GET['lastName']."', `birthDay` = '".$_GET['birthDay']."', `age` = '".$_GET['age']."', `address` = '".$_GET['address']."' WHERE `lecturers`.`id` = ".$_GET['mId'],$conn);
		echo "<p>הנתונים עודכנו בהצלחה!</p>";
}
// ADD Lecturers
else if(isset($_GET['addLecture'])){
	echo "<form method=get>
			תעודת זהות<br>
			<input type=text name=aId> 
			<br><br>שם פרטי<br> <input type=text name=aFirstName>
			<br><br>שם משפחה<br> <input type=text name=aLastName>
			<br><br>תאריך לידה<br> <input type=text name=aBirthDay>
			<br><br>גיל<br> <input type=text name=aAge>
			<br><br>כתובת<br> <input type=text name=aAddress><br><br>
			<input class=add2 type=submit class=add value='הוספת נתונים'></form>";
}
else if(isset($_GET['aId']) && isset($_GET['aFirstName']) && isset($_GET['aLastName']) && isset($_GET['aBirthDay']) && isset($_GET['aAge']) && isset($_GET['aAddress'])) {
	mysql_query("INSERT INTO `lecturers` (`id`, `firstName`, `lastName`, `birthDay`, `age`, `address`)
			VALUES ('".$_GET['aId']."', '".$_GET['aFirstName']."', '".$_GET['aLastName']."', '".$_GET['aBirthDay']."', '".$_GET['aAge']."', '".$_GET['aAddress']."')",$conn);
	echo "<p>הנתונים התווספו בהצלחה!</p>";
}
// END Lecturers Functions

// START Courses Functions
// Delete Course
else if(isset($_GET['deleteCourse'])) {
    $id = $_GET['deleteCourse'];
    mysql_query("DELETE FROM `courses` WHERE `courses`.`courseNum` = ".$id,$conn);
    echo "<p>המידע המבוקש נמחק בהצלחה!</p>";
}
// Edit Course
else if (isset($_GET['editCourse'])) {
	$id = $_GET['editCourse'];
	$result = mysql_query("SELECT * FROM `courses` WHERE `courseNum` =" . $id);
	$row = mysql_fetch_array($result);
	echo "<form method=get>
		מספר קורס<br><input type=hidden name=mId value=". $id .
		"><input type=text name=courseNum value=" . $row['courseNum'] . 
		"><br><br>שם הקורס<br> <input type=text name=courseName value=" . $row['courseName'] .
		"><br><br>סמסטר<br> <input type=text name=semester value=" . $row['semester'] .
		"><br><br>שנה<br> <input type=text name=year value=" . $row['year'] .
		"><br><br>כמות שעות<br> <input type=text name=numOfHours value=" . $row['numOfHours'] .
		"><br><br>
		<input class=add2 type=submit value='עדכן פרטים'></form>";
}
else if(isset($_GET['courseNum']) &&	isset($_GET['courseName']) && isset($_GET['semester']) &&
	isset($_GET['year']) && isset($_GET['numOfHours'])) {
	mysql_query("UPDATE `courses` SET `courseNum` = '".$_GET['courseNum']."', `courseName` = '".$_GET['courseName']."', `semester` = '".$_GET['semester']."', `year` = '".$_GET['year']."', `numOfHours` = '".$_GET['numOfHours']."' WHERE `courses`.`courseNum` = ". $_GET['mId'],$conn);
		echo "<p>הנתונים עודכנו בהצלחה!</p>";
}
// ADD Course with prepared statment
else if(isset($_GET['addCourse'])){
	echo "<form method=get>
			מספר קורס<br><input type=text name=aCourseNum> 
			<br><br>שם הקורס<br> <input type=text name=aCourseName>
			<br><br>סמסטר<br> <input type=text name=aSemester>
			<br><br>שנה<br> <input type=text name=aYear>
			<br><br>מספר שעות<br> <input type=text name=aNumOfHours><br><br>
			<input class=add2 type=submit value='הוספת נתונים'></form>";
}
else if(isset($_GET['aCourseNum']) && isset($_GET['aCourseName']) && isset($_GET['aSemester']) && isset($_GET['aYear']) && isset($_GET['aNumOfHours'])) {
	$conn1 = new mysqli('localhost','root','','scheduledb');
	$stmt=$conn1->prepare("INSERT INTO `courses` (`courseNum`,`courseName`,`semester`,`year`,`numOfHours`) VALUES (?,?,?,?,?)");
	$stmt->bind_param("isssi",$_GET['aCourseNum'],$_GET['aCourseName'],$_GET['aSemester'],$_GET['aYear'],$_GET['aNumOfHours']);
	$stmt->execute();
	echo "<p>הנתונים עודכנו בהצלחה!</p>";
	$stmt->close();

}
// END Courses Functions

// START Classes Functions
// Delete Class
else if(isset($_GET['deleteClass'])) {
    $id = $_GET['deleteClass'];
    mysql_query("DELETE FROM `class` WHERE `class`.`classNum` = ".$id,$conn);
    echo "<p>המידע המבוקש נמחק בהצלחה!</p>";
}
// Edit Course

else if (isset($_GET['editClass'])) {
	$id = $_GET['editClass'];
	$result = mysql_query("SELECT * FROM `class` WHERE `classNum` =" . $id);
	$row = mysql_fetch_array($result);
	echo "<form method=get>
		מספר כיתה<br><input type=hidden name=cId value=". $id .
		"><input type=text name=classNum value=" . $row['classNum'] . 
		"><br><br>מספר בניין<br> <input type=text name=classBuilding value=" . $row['classBuilding'] .
		"><br><br>מספר קומה<br> <input type=text name=classFloor value=" . $row['classFloor'] .
		"><br><br>
		<input class=add2 type=submit value='עדכן פרטים'></form>";
}
else if(isset($_GET['classNum']) &&	isset($_GET['classBuilding']) && isset($_GET['classFloor'])) {
	mysql_query("UPDATE `class` SET `classNum` = '".$_GET['classNum']."', `classBuilding` = '".$_GET['classBuilding']."', `classFloor` = '".$_GET['classFloor']."' WHERE `class`.`classNum` =".$_GET['cId'],$conn);
		echo "<p>הנתונים עודכנו בהצלחה!</p>";
}
// ADD Class using Transaction
else if(isset($_GET['addClass'])){
	echo "<form method=get>
			מספר כיתה<br><input type=text name=aClassNum> 
			<br><br>מספר בניין<br> <input type=text name=aClassBuilding>
			<br><br>מספר קומה<br> <input type=text name=aClassFloor><br><br>
			<input class=add2 type=submit value='הוספת נתונים'></form>";
}
//using transaction for validation
else if(isset($_GET['aClassNum']) && isset($_GET['aClassBuilding']) && isset($_GET['aClassFloor'])) {
	$mysqli = new mysqli('localhost','root','','scheduledb');
	$mysqli->autocommit(FALSE);
	
	$mysqli->query("INSERT INTO class (classNum,classBuilding,classFloor)  VALUES ('".$_GET['aClassNum']."','".$_GET['aClassBuilding']."','".$_GET['aClassFloor']."')");

	if (($_GET['aClassNum'] != NULL) && ($_GET['aClassBuilding']!=NULL) && ($_GET['aClassFloor']!=NULL)){
		echo "<p>הנתונים התווספו בהצלחה!</p>";
		$mysqli->commit();
	}else{
		echo "<p>הזנת נתונים שגוייה!</p>";
		$mysqli->rollback();
	}
	$mysqli->autocommit(TRUE);
}
//Show for class the Lectures and the Course numbers
else if(isset($_GET['classNum'])) {
	$num = $_GET['classNum'];
	$result = mysql_query("SELECT `lecturerID`, `courseNum` FROM `scheduletable` WHERE `classNum` IN (SELECT `classNum` FROM `class` WHERE `classNum`='".$num."')");
	echo "
	<table>
			  <tr>
			    <th>ת.ז מרצה</th>
			    <th>מספר קורס</th>
			  </tr>";
	while($row = mysql_fetch_array($result)){
		echo "<tr>
				<td>" .$row['lecturerID']. "</td><td>" .$row['courseNum'] .
				"</td></tr>";
	} 


}
//Show for class the Lectures and the Course numbers
else if(isset($_GET['lecturesID'])) {
	$num = $_GET['lecturesID'];
	$result = mysql_query("SELECT `hour`,`classNum`,`courseNum` FROM `scheduletable` WHERE `lecturerID`=".$num." GROUP BY `hour`,`classNum`,`courseNum`");
	echo "
	<table>
			  <tr>
			    <th>שעת לימוד</th>
			    <th>מספר כיתה</th>
			    <th>מספר קורס</th>
			  </tr>";
	while($row = mysql_fetch_array($result)){
		echo "<tr>
				<td>" .$row['hour']. "</td>
				<td>" .$row['classNum']. "</td>
				<td>" .$row['courseNum'] .
				"</td></tr>";
	} 


}
else if(isset($_GET['fromDay']) && isset($_GET['fromHour']) &&
	isset($_GET['toDay']) && isset($_GET['toHour'])){
	$fromDay = $_GET['fromDay'];
	$toDay = $_GET['toDay'];
	$fromHour = $_GET['fromHour'];
	$toHour = $_GET['toHour'];
	
	if ((getNum($fromDay))>=(getNum($toDay))){
		echo "<p>הזנת נתונים שגוייה</p>";
	}else {
		$firstDay = "(`day`='".$fromDay."') AND (";
		for($i = $fromHour ; $i != "17:00:00" ; $i = addHour($i))
			$firstDay .= "`hour` = '".$i."' OR ";
		$firstDay.="`hour`='17:00:00') OR ";

		for($i = (getNum($fromDay)+1); $i < getNum($toDay); $i++)
			 $firstDay.= "(`day` = '". getDay($i)."') OR ";
			
		$firstDay.="((`day`='".$toDay."') AND (";
		for($i = '08:00:00' ; $i != $toHour ; $i = addHour($i))
			$firstDay.= "`hour` = '".$i."' OR ";
		$firstDay.="`hour`='".$toHour."'))";
		$result = mysql_query("SELECT `scheduletable`.`lecturerID` ,`lecturers`.`firstName`,`lecturers`.`lastName` FROM `scheduletable` LEFT JOIN `lecturers` on `scheduletable`.`lecturerID`=`lecturers`.`id` WHERE ".$firstDay." GROUP BY `scheduletable`.`lecturerID`");

		echo "
			<table>
			  <tr>
			    <th>תעודת זהות</th>
			    <th>שם פרטי</th>
			    <th>שם משפחה</th>
			  </tr>";
		while($row = mysql_fetch_array($result)){
		echo "<tr>
				<td>" .$row['lecturerID']. "</td>
				<td>" .$row['firstName']. "</td>
				<td>" .$row['lastName']. "</td>
				</tr>";
								} 

	}
}
else {
	echo "<p>ברוך הבא למערכת ניהול שנת לימודים!</p>";
}


// END Courses Functions
?>