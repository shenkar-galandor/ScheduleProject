<?php
//database server page
//by Or Adar and Gal Amitai - All Rights Reserved

//connect to database
$servername = "localhost";
$username = "root";
$password = "";
header('Content-Type: text/plain');
// Create connection
$conn =mysql_connect($servername, $username, $password);
$i = 0;
// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully\n";

//if database is not exists create it

$sqlCheck = mysql_select_db("schedualdb",$conn);
$dbFlag =0;
if ($sqlCheck == TRUE){
	echo "Database Exisits\n";
}else{
	$dbFlag = 1;
	mysql_query("CREATE DATABASE scheduledb",$conn);
	echo "database created\n";
}

$dbFlag=1;
if ($dbFlag == 1){
	
	mysql_select_db("scheduledb",$conn);
	
	$classTable = "CREATE TABLE class (
	classNum int(3) NOT NULL PRIMARY KEY,
	classBuilding int(3) NOT NULL,
	classFloor int(2) NOT NULL
	)";

	if (mysql_query($classTable,$conn)){
		echo "Class table created\n";
	}else{
		echo "Error creating table: " . mysql_error($conn);
	}
	
	$lecturerTable = "CREATE TABLE lecturers (
	id int(11) NOT NULL PRIMARY KEY,
	firstName VARCHAR(30),
	lastName VARCHAR(30),
	birthDay VARCHAR(11),
	age int(3),
	address VARCHAR(50)
	)";

	if(mysql_query($lecturerTable,$conn)){
		echo "Lecturer table created\n";
	}else{
		echo "Error creating table: " . mysql_error($conn);
	}
	

	$courseTable = "CREATE TABLE courses(
	courseNum int(5) NOT NULL PRIMARY KEY,
	courseName VARCHAR(30),
	semester VARCHAR(1),
	year VARCHAR(1),
	numOfHours int (3)

	)";

	if(mysql_query($courseTable,$conn)){
		echo "Courses table created\n";
	}else{
		echo "Error creating table: " . mysql_error($conn);
	}
}

?>