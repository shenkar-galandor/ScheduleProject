<?php
// if (!$conn) {
//     echo"<p>קובץ נתונים לא נמצא!</p>";
// }
// else{
// 	echo"<p>קובץ נתונים נטען בהצלחה!</p>";
// }
	if(isset($_GET['deleteLecture'])) {
	    $id = $_GET['deleteLecture'];
	    mysql_query("DELETE FROM `lecturers` WHERE `lecturers`.`id` =" . $id,$conn);
	    echo "<p>המידע המבוקש נמחק בהצלחה!</p>";
	}
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
			<input type=submit value=עדכן פרטים></form>";
	   // mysql_query("DELETE FROM `lecturers` WHERE `lecturers`.`id` =" . $id,$conn);
	   // echo "<p>המידע המבוקש נמחק בהצלחה!</p>";
	}
	if(isset($_GET['id']) && isset($_GET['firstName']) &&
		isset($_GET['lastName']) && isset($_GET['birthDay']) &&
		isset($_GET['age']) && isset($_GET['address'])) {
		mysql_query("UPDATE `lecturers` SET `id` = '".$_GET['id']."', `firstName` = '".$_GET['firstName']."', `lastName` = '".$_GET['lastName']."', `birthDay` = '".$_GET['birthDay']."', `age` = '".$_GET['age']."', `address` = '".$_GET['address']."' WHERE `lecturers`.`id` = ".$_GET['mId'],$conn);
		echo "<p>הנתונים עודכנו בהצלחה!</p>";
	}
	if(isset($_GET['addLecture'])){
		echo "<form method=get>
			תעודת זהות<br>
			<input type=text name=aId> 
			<br><br>שם פרטי<br> <input type=text name=aFirstName>
			<br><br>שם משפחה<br> <input type=text name=aLastName>
			<br><br>תאריך לידה<br> <input type=text name=aBirthDay>
			<br><br>גיל<br> <input type=text name=aAge>
			<br><br>כתובת<br> <input type=text name=aAddress><br><br>
			<input type=submit value=הוספת נתונים></form>";
	}
	if(isset($_GET['aId']) && isset($_GET['aFirstName']) && isset($_GET['aLastName']) && isset($_GET['aBirthDay']) && isset($_GET['aAge']) && isset($_GET['aAddress'])) {
		mysql_query("INSERT INTO `lecturers` (`id`, `firstName`, `lastName`, `birthDay`, `age`, `address`)
			VALUES ('".$_GET['aId']."', '".$_GET['aFirstName']."', '".$_GET['aLastName']."', '".$_GET['aBirthDay']."', '".$_GET['aAge']."', '".$_GET['aAddress']."')",$conn);
		echo "<p>הנתונים התווספו בהצלחה!</p>";
	}
?>