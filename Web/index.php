<?php
include ("./connector.php");
$sqlCheck = mysql_select_db("scheduledb",$conn);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Schedule Project - Gal Amitai & Or Adar</title>
	<link rel="stylesheet" href="includes/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="row fill">
    <div class="col-xs-1 col-sm-2 sidebar">
        <h3>תפריט ניווט</h3>
        <nav>
	        <ul>
	        	<li><a href="index.php">פאנל ניהול ראשי</a></li>
	        	<li><a href="index.php?page=courses">רשימת קורסים</a></li>
	        	<li><a href="index.php?page=lecturers">רשימת מרצים</a></li>
	        	<li><a href="index.php?page=classes">רשימת כיתות</a></li>
	        	<li><a href="index.php?page=schedule">הצגת מערכת שעות</a></li>
	        	<li><a href="index.php?page=query1">הצג נתוני כיתה</a></li>
	        	<li><a href="index.php?page=query2">הצג נתוני מרצים</a></li>
	        	<li><a href="index.php?page=query3">הצגת פרטים לפי זמן</a></li>
	        </ul>
        </nav>
    </div>
    <div class="col-xs-11 col-sm-10 main-content-area">
        <h1>מערכת שעות - פאנל ניהול</h1>
        
        <section>
        	<?php
        		if(isset($_GET['page'])) {
	        		$page = $_GET['page'];
	        		switch($page) {
	        			case 'lecturers' :
	        				include('./lecturers.php');
	        				break;
	        			case 'classes' :
	        				include('./classes.php');
	        				break;
	        			case 'courses':
	        				include('./courses.php');
	        				break;
	        			case 'schedule':
	        				include('./schedule.php');
	        				break;
	        			case 'query1':
	        				include('./query1.php');
	        				break;
	        			case 'query2':
	        				include('./query2.php');
	        				break;
	        			case 'query3':
	        				include('./query3.php');
	        				break;
	        		}
	        	}
	        	else
	        		include('./homepage.php');
        	?>

        </section>
    </div>
</div>
<div class="footer">
מערכת זו נבנתה ע"י גל אמיתי ואור אדר - כל הזכויות שמורות 2017
</div>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>