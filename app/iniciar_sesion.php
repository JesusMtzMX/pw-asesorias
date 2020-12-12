<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <title>iniciar sesion</title>
</head>
<?php
      require_once "menu_inicial.php";
    ?>
	
</head>

<body>

	<div class="container" id="body">
		<div class="header">
			<h2>Iniciar sesión</h2>
		</div>

		<form action="../datos/Login.php" method="POST" id="form" class="form">
			<div class="form-control">
				<label for="username">Email</label>
				<input type="text" name="email" placeholder="Email" id="username" />
				<i class="fas fa-check-circle"></i>
				<i class="fas fa-exclamation-circle"></i>
				<small>Error</small>
			</div>
			<!--	<div class="form-control">
				<label for="username">Email</label>
				<input type="email" placeholder="esmelopez536@gmail.com" id="email" />
				<i class="fas fa-check-circle"></i>
				<i class="fas fa-exclamation-circle"></i>
				<small>Error</small>
			</div>-->
			<div class="form-control">
				<label for="password">Contraseña</label>
				<input type="password" name="password" placeholder="Contraseña" id="password" />
				<i class="fas fa-check-circle"></i>
				<i class="fas fa-exclamation-circle"></i>
				<small>Error</small>
			</div>
			<!--	<div class="form-control">
				<label for="username">Confirmar contraseña</label>
				<input type="password" placeholder="Confirmar contraseña" id="password2"/>
				<i class="fas fa-check-circle"></i>
				<i class="fas fa-exclamation-circle"></i>
				<small>Error</small>
      		</div>-->

			<input type="checkbox"><a>Mantener inciada la sesión</a>
			<div>
				<a>¿Olvidé mi contraseña?</a>
				<a href="index.php">Volver</a>
			</div>
			<button type="submit" class="btn-entrar">ENTRAR</button>
		</form>
		<div class="footer-text">
          <p>&copy; Agencia de asesorías web - 2020</p>
        </div>
	</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
	<!--<script src="scripts.js"></script>-->
</body>

</html>