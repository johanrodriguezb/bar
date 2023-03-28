<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ingreso</title>
	<?php include 'scripts.php'; ?>
</head>
<body class="cover">
	<div class="container-login">
		<p class="text-center" style="font-size: 80px;">
			<i class="zmdi zmdi-account-circle"></i>
		</p>
		<p class="text-center text-condensedLight">Ingresa con tu cuenta</p>
		<form action="index1.php?c=Usuarios&a=verifica" method="POST">
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			    <input class="mdl-textfield__input" type="text" id="Usuario" name="Usuario">
			    <label class="mdl-textfield__label" for="userName">Nombre de Usuario</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			    <input class="mdl-textfield__input" type="password" id="Contrasena" name="Contrasena">
			    <label class="mdl-textfield__label" for="pass">Contraseña</label>
			</div>
			<button id="SingIn" class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #ffffff; float:right;">
				Ingresar <i class="zmdi zmdi-mail-send"></i>
			</button>
			<br>
		</form>
	</div>
</body>
</html>