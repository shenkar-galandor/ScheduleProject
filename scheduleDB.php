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

$sqlCheck = mysql_select_db("scheduledb",$conn);
$dbFlag =0;
if ($sqlCheck == TRUE){
	echo "Database Exisits\n";
}else{
	$dbFlag = 1;
	mysql_query("CREATE DATABASE scheduledb",$conn);
	echo "database created\n";
}

//build the database and the tables
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
	

	$telephonesTable = "CREATE TABLE telephones(
	id int(10) AUTO_INCREMENT PRIMARY KEY,
	lecturerID int(11) NOT NULL, 
	phoneNumber VARCHAR(11),
	FOREIGN KEY (lecturerID) REFERENCES lecturers(id)
	)";

	if(mysql_query($telephonesTable,$conn)){
		echo "telephones table created\n";
	}else{
		echo "Error creating table: " . mysql_error($conn);
	}

	$scheduleTable = "CREATE TABLE scheduleTable(
	lecturerID int (11) NOT NULL,
	day VARCHAR(11) NOT NULL,
	hour VARCHAR(11) NOT NULL,
	classNum int(3) NOT NULL,
	courseNum int(5) NOT NULL,
	FOREIGN KEY (lecturerID) REFERENCES lecturers(id),
	FOREIGN KEY (classNum) REFERENCES class(classNum),
	FOREIGN KEY (courseNum) REFERENCES courses(courseNum)
	)";

	if(mysql_query($scheduleTable,$conn)){
		echo "schedule main table created\n";
	}else{
		echo "Error creating table: " . mysql_error($conn);
	}
}

	//insert data to the tables
	mysql_select_db("scheduledb",$conn);
	$dbFlag=1;
	
	//Insert Lectures Data
	if($dbFlag==1){
		$lecturesT =  "INSERT INTO lecturers (id,firstName,lastName,birthDay,age,address)";
		$lecturesVal = "VALUES(201590775,'Or', 'Adar','24/6/1989',27,'Kazerin 16 Asheklon'),
					    (302115648,'Gal', 'Amitai','3/1/1992',25,'Hadekel 3 Rehovot'),
					    (200569875,'Geula', 'Malichi','12/7/1960',57,'Hashoshan 15 Bat-Yam'),
					    (365221456,'Yigal', 'Reuven','14/12/1954',68,'Hashaked 5 Rishon LeZion'),
					    (200006958,'Shlomo', 'Six','15/3/1785',36,'Hashalom 3 Gedera'),
					    (369869633,'Gili', 'Shimshi','5/5/1988',28,'Hanoked 6/15 Ashkelon'),
					    (223632544,'Shimrit', 'Geuli','20/4/1980',39,'Shimshonim 3 Qiryat Ata'),
					    (200589963,'Rivka', 'Tachober','24/7/1979',40,'Ayelet 5 Ramat Aviv'),
					    (112023654,'Nahum', 'Mosinzon','4/7/1940',86,'Nachalat Hashalom 5 Bnei-Brak'),
					    (366982200,'Omer', 'Dudiyahu','16/10/1986',31,'Refael Eitan 4 Lod')";

		if(mysql_query($lecturesT.$lecturesVal,$conn)){
			echo "data insert into lectures\n";
		}else{
			echo "error insert data" .mysql_error($conn);
		}
	}
	
	//insert Classes into database
	if($dbFlag==1){
		$classT =  "INSERT INTO class (classNum,classBuilding,classFloor)";
		$classVal = "VALUES(100,1,2),(101,1,2),(247,2,3),(63,1,1),(70,3,5)";

		if(mysql_query($classT.$classVal,$conn)){
			echo "data insert into class\n";
		}else{
			echo "error insert data" .mysql_error($conn);
		}	

	}
?>