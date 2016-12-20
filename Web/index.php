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
    <div class="col-md-2 sidebar">
        <h3>תפריט ניווט</h3>
        <nav>
	        <ul>
	        	<li><a href="index.php">פאנל ניהול ראשי</a></li>
	        	<li><a href="index.php?page=courses">רשימת קורסים</a></li>
	        	<li><a href="index.php?page=lecturers">רשימת מרצים</a></li>
	        	<li><a href="index.php?page=classes">רשימת כיתות</a></li>
	        </ul>
        </nav>
    </div>
    <div class="col-md-10 main-content-area">
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