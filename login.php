<?php
	session_start();

	if(isset($_SESSION['userlogin'])){
		header("Location: index.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de Login</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="img/logo-ppy.png" class="brand_logo" alt="Papaya">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" id="username" class="form-control input_user" required>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" id="password" class="form-control input_pass" required>
							<div class="input-group-append input_config">
							    <span class="input-group-text inputshow" id="show">
							      <i class="fa fa-eye"></i>
							    </span>
							</div>
						</div>
					</div>
					<div class="d-flex justify-content-center mt-3 login_container">
						<button type="button" name="button" id="login" class="btn login_btn">Login</button>
					</div>
				</form>
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Ainda não tem uma conta? <a href="registration.php" class="ml-2">Registrar-se</a>
					</div>
					<div class="d-flex justify-content-center">
						<a href="#">Esqueceu sua senha?</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="undefined" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(function(){
	  			function Show() {
					var x = document.getElementById("password");
					if (x.type === "password") {
						x.type = "text";
					} else {
						x.type = "password";
					}
				}
				$('#show').click(function(e){
						Show();
				})
			$('#login').click(function(e){
				var valid = this.form.checkValidity();

				if (valid) {
					var username = $('#username').val();
					var password = $('#password').val();
				}

				e.preventDefault();

				$.ajax({
					type: 'POST',
					url: 'jslogin.php',
					data: {username: username, password: password},
					success: function(data){
						if ($.trim(data) === "1") {
							setTimeout(' window.location.href = "index.php", 2000');
						}
						if ($.trim(data) === "error") {
							alert("Informações incorretas");
						}
					},
					error: function(data){
						alert('there has been an error');
					}
				});
			});
		});
	</script>
</body>
</html>