<?php

session_start();

	if(!isset($_SESSION['userlogin'])){
		header("Location: login.php");
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION);
		header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Painel</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<a href="#" class="float" id="menu-share">
		<i class="fas fa-bars  my-float"></i>
	</a>
	<ul>
		<li><a href="index.php?logout=true">
			<i class="fas fa-sign-out-alt my-float"></i>
		</a></li>
		<li><a href="calendar.php">
			<i class="fas fa-calendar-alt my-float"></i>
		</a></li>
		<li><a href="index.php">
			<i class="fas fa-home my-float"></i>
		</a></li>
	</ul>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="undefined" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(function(){
			$('#menu-share').click(function(e){
				if ($('ul').css('visibility') == 'visible') {
					$('ul').css('visibility', 'hidden')
					$('ul').css('animation', 'none')
				}
				else {
						$('ul').css('visibility', 'visible')
						$('ul').css('animation', 'scale-in 0.5s')
					}
				})
		})
	</script>
</body>
</html>
