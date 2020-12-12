<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Editar perfil</title>
  <link rel="stylesheet" href="css/StyleModificarDatos.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</head>
<?php
      require_once "menu_inicial.php";
    ?>
<body background="img/perfil.jpg">

  <div class="container" id="body">

    <div class="header">
      <h2>Editar perfil</h2>
    </div>

    <form id="form" class="form">

      <div class="form-control">
        <label for="username">Nuevo usuario</label>
        <input type="text" placeholder="Esmeralduchi22" id="username" />
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error</small>
      </div>

      <div class="form-control">
        <label for="username">Nuevo email</label>
        <input type="email" placeholder="esmelopez536@gmail.com" id="email" />
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error</small>
      </div>

      <div class="form-control">
        <label for="username">Nueva Contraseña</label>
        <input type="password" placeholder="Contraseña" id="password" />
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error</small>
      </div>

      <div class="form-control">
        <label for="username">Confirmar contraseña</label>
        <input type="password" placeholder="Confirmar contraseña" id="password2" />
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error</small>
      </div><input type="submit" value="INICIAR SESION "><a>--></a><a href="index.php "> Volver</a>
      <div class="footer-text">
          <p>&copy; Agencia de asesorías web - 2020</p>
        </div>
    </form>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>        
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>    
    <script src="sweetalert/SweetAlert2/sweetalert2.all.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">


    <script src="scriptsRegistro.js"></script>
</body>

</html>