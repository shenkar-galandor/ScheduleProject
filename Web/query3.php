<?php
mysql_select_db("scheduledb",$conn);
$lectures = mysql_query("SELECT `id` FROM `lecturers`");
echo "<p>בחר שעות וימים</p><br>
	<form method='get'>
	<p>מיום</p>
	<select name='fromDay'>
		<option value='Sunday'>ראשון</option>
		<option value='Monday'>שני</option>
		<option value='Tuesday'>שלישי</option>
		<option value='Wesnesday'>רביעי</option>
		<option value='Thursday'>חמישי</option>
		<option value='Friday'>שישי</option>
	</select>
	<p>משעה</p>
	<select name='fromHour'>
		<option value='08:00:00'>08:00</option>
		<option value='09:00:00'>09:00</option>
		<option value='10:00:00'>10:00</option>
		<option value='11:00:00'>11:00</option>
		<option value='12:00:00'>12:00</option>
		<option value='13:00:00'>13:00</option>
		<option value='14:00:00'>14:00</option>
		<option value='15:00:00'>15:00</option>
		<option value='16:00:00'>16:00</option>
		<option value='17:00:00'>17:00</option>
		<option value='18:00:00'>18:00</option>
	</select>
	<br>
	<p>עד יום</p>
	<select name='toDay'>
		<option value='Sunday'>ראשון</option>
		<option value='Monday'>שני</option>
		<option value='Tuesday'>שלישי</option>
		<option value='Wesnesday'>רביעי</option>
		<option value='Thursday'>חמישי</option>
		<option value='Friday'>שישי</option>
	</select>
	<p>עד שעה</p>
	<select name='toHour'>
		<option value='08:00:00'>08:00</option>
		<option value='09:00:00'>09:00</option>
		<option value='10:00:00'>10:00</option>
		<option value='11:00:00'>11:00</option>
		<option value='12:00:00'>12:00</option>
		<option value='13:00:00'>13:00</option>
		<option value='14:00:00'>14:00</option>
		<option value='15:00:00'>15:00</option>
		<option value='16:00:00'>16:00</option>
		<option value='17:00:00'>17:00</option>
		<option value='18:00:00'>18:00</option>
	</select>
	<br>
	<br>
	<input type=submit value='הצג'>

	</form>";
	
?>