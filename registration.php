<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registrar</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
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
							<input type="text" name="fname" id="fname" class="form-control input_user" placeholder="Nome" required>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="lname" id="lname" class="form-control input_user" placeholder="Sobrenome" required>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
							</div>
							<input type="text" name="telephone" id="telephone" class="form-control input_user" placeholder="Telefone" required>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-at"></i></span>
							</div>
							<input type="text" name="username" id="username" class="form-control input_user" placeholder="Email" required>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" id="password" class="form-control input_pass" placeholder="Senha" required>
							<div class="input-group-append">
							    <span class="input-group-text inputshow" id="show">
							      <i class="fa fa-eye"></i>
							    </span>
							</div>
						</div>
					</div>
					<div class="d-flex justify-content-center mt-3 login_container">
						<button type="button" name="button" id="register" class="btn login_btn">Registrar</button>
					</div>
				</form>
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Ja tem uma conta? <a href="login.php" class="ml-2">Fazer Login</a>
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
			$('#register').click(function(e){
				var fname = $('#fname').val();
				var lname = $('#lname').val();
				var telephone = $('#telephone').val();
				var username = $('#username').val();
				var password = $('#password').val();
				var valido = true;
				if ((fname.length == 0) || (lname.length == 0) || (telephone.length == 0) || (username.length == 0) || (password.length == 0) ) {
					valido = false;
					alert('Você deve preencher todos os campos');
				}

				e.preventDefault();
				if (valido == true) {
					$.ajax({
						type: 'POST',
						url: 'jsregister.php',
						data: {fname: fname, lname: lname, telephone: telephone, username: username, password: password},
						success: function(data){
							if ($.trim(data) === "1") {
								setTimeout(' window.location.href = "login.php", 2000');
							}
						},
						error: function(data){
							alert('there has been an error');
						}
					});
				}
				});
		})
	</script>
</body>
</html>