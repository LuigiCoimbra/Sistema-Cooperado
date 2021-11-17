<?php 
	require_once('config.php');

	$eventname = $_POST['eventname'];
	$eventdesc = $_POST['eventdesc'];
	$eventdate = $_POST['eventdate'];
	$eventtime = $_POST['eventtime'];
	$eventcategory = $_POST['eventcategory'];
	$eventallday = $_POST['eventallday'];

	$sql = "INSERT INTO Events (eventname, eventdescription, eventdate, eventtime, eventcategory, eventallday) VALUES (?, ?, ?, ?, ?, ?)";
	$stmtselect = $db->prepare($sql);
	$result = $stmtselect->execute([$eventname, $eventdesc, $eventdate, $eventtime, $eventcategory, $eventallday]);
 ?>