<?php 
	require_once('config.php');

	$sql = "SELECT * FROM Events";
	$stmtselect = $db->prepare($sql);
	$result = $stmtselect->execute();
	$user = $stmtselect->fetchAll(PDO::FETCH_ASSOC);
	$json = json_encode($user);
	echo ($json);
 ?>