<?php
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
// ADD Course
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
	mysql_query("INSERT INTO `courses` (`courseNum`, `courseName`, `semester`, `year`, `numOfHours`)
		VALUES ('".$_GET['aCourseNum']."', '".$_GET['aCourseName']."', '".$_GET['aSemester']."', '".$_GET['aYear']."', '".$_GET['aNumOfHours']."')",$conn);
	echo "<p>הנתונים התווספו בהצלחה!</p>";
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
// ADD Class
else if(isset($_GET['addClass'])){
	echo "<form method=get>
			מספר כיתה<br><input type=text name=aClassNum> 
			<br><br>מספר בניין<br> <input type=text name=aClassBuilding>
			<br><br>מספר קומה<br> <input type=text name=aClassFloor><br><br>
			<input class=add2 type=submit value='הוספת נתונים'></form>";
}
else if(isset($_GET['aClassNum']) && isset($_GET['aClassBuilding']) && isset($_GET['aClassFloor'])) {
	mysql_query("INSERT INTO `class` (`classNum`, `classBuilding`, `classFloor`) 
		VALUES ('".$_GET['aClassNum']."', '".$_GET['aClassBuilding']."', '".$_GET['aClassFloor']."')",$conn);
	echo "<p>הנתונים התווספו בהצלחה!</p>";
}
else {
	echo "<p>ברוך הבא למערכת ניהול שנת לימודים!</p>";
}
// END Courses Functions
?>