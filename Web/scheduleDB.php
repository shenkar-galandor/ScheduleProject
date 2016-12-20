<?php
//database server page
//by Or Adar and Gal Amitai - All Rights Reserved
include("./connector.php");
//connect to database
header('Content-Type: text/plain');


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
	classBuilding int(3),
	classFloor int(2)
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
	ON DELETE CASCADE
    	ON UPDATE CASCADE
	)";

	if(mysql_query($telephonesTable,$conn)){
		echo "telephones table created\n";
	}else{
		echo "Error creating table: " . mysql_error($conn);
	}

	$scheduleTable = "CREATE TABLE scheduleTable(
	lecturerID int (11) NOT NULL,
	day VARCHAR(11) ,
	hour VARCHAR(11),
	classNum int(3),
	courseNum int(5),
	FOREIGN KEY (lecturerID) REFERENCES lecturers(id)
	ON DELETE CASCADE 
    	ON UPDATE CASCADE,
	FOREIGN KEY (classNum) REFERENCES class(classNum)
	ON DELETE CASCADE
    	ON UPDATE CASCADE,
	FOREIGN KEY (courseNum) REFERENCES courses(courseNum)
	ON DELETE CASCADE
    	ON UPDATE CASCADE
	)";

	if(mysql_query($scheduleTable,$conn)){
		echo "schedule main table created\n";
	}else{
		echo "Error creating table: " . mysql_error($conn);
	}

	//insert data to the tables
	//Insert Lectures Data
	
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

	//insert Classes into database
	
		$classT =  "INSERT INTO class (classNum,classBuilding,classFloor)";
		$classVal = "VALUES(100,1,2),(101,1,2),(247,2,3),(63,1,1),(70,3,5)";

		if(mysql_query($classT.$classVal,$conn)){
			echo "data insert into class\n";
		}else{
			echo "error insert data" .mysql_error($conn);
		}	

	//insert Courses into database
		$courseT =  "INSERT INTO courses (courseNum,courseName,semester,year,numOfHours)";
		$courseVal = "VALUES(256,'Algebra','A','A',25),
				             (380,'Computers and CPU','B','B',30),
				             (102,'Graphics','S','A',27),
				             (143,'Cars and Motors','B','A',40),
				             (444,'Algorithms','S','B',40),
				             (160,'Complicated Matrix','B','C',35),
				             (280,'The Wonderful Internet','A','A',20),
				             (197,'Advenced MicroTech','S','D',45)";
            	if(mysql_query($courseT.$courseVal,$conn)){
			echo "data insert into Courses\n";
		}else{
			echo "error insert data" .mysql_error($conn);
		}

	//insert Phones into database
	  	$phonesT =  "INSERT INTO telephones (lecturerID,phoneNumber)";
	  	$phonesVal = "VALUES(201590775,'0543551520'),
	  				   (201590775,'086711741'),
	  				   (302115648,'0506696321'),
	  				   (302115648,'036614787'),
	  				   (200569875,'0546678547'),
	  				   (365221456,'0503362012'),
	  				   (365221456,'0503362013'),
	  				   (365221456,'0867445412'),
	  				   (200006958,'036652111'),
	  				   (369869633,'0509142856'),
	  				   (223632544,'045512365'),
	  				   (200589963,'0545582365'),
	  				   (200589963,'023965874'),
	  				   (112023654,'0504478965')";
	  	if(mysql_query($phonesT.$phonesVal,$conn)){
			echo "data insert into Phones\n";
		}else{
			echo "error insert data " .mysql_error($conn);
		}
	
		$scheduleT = "INSERT INTO scheduletable(lecturerID,day,hour,classNum,courseNum)";
		$scheduleVal = "VALUES (201590775,'Sunday','08:00',100,256),
					      (302115648,'Sunday','08:00',101,380),
					      (302115648,'Wednesday','10:00',247,380),
					      (200569875,'Monday','09:00',63,102),
					      (200569875,'Thursday','14:00',63,102),
					      (365221456,'Sunday','09:00',63,143),
					      (365221456,'Friday','09:00',63,143),
					      (200006958,'Sunday','09:00',70,143),
					      (200006958,'Tuesday','11:00',70,143),
					      (369869633,'Monday','12:00',100,444),
					      (223632544,'Wednesday','13:00',100,444),
					      (200589963,'Friday','08:00',70,160),
					      (200589963,'Friday','08:00',70,160),
					      (112023654,'Friday','10:00',100,280),
					      (112023654,'Sunday','09:00',100,280),
					      (366982200,'Sunday','10:00',101,197),
					      (366982200,'Monday','10:00',101,197)";

			  if(mysql_query($scheduleT.$scheduleVal,$conn)){
				echo "data insert into Schedule\n";
				}else{
				echo "error insert data " .mysql_error($conn);
				}

	}

?>