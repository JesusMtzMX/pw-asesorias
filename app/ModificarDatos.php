<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Editar perfil</title>
  <link rel="stylesheet" href="css/StyleRegistro.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</head>
<?php
      require_once "menu_inicial.php";
    ?>
<body background="img/perfil.jpg">

  <div class="container" id="body">

  <header id="header">Editar dato</header>
        <form action="../datos/modificar.php" method="POST" id="form" class="form">
    <div class="content"> 
        <div class="field">
        <span class="fa fa-user"></span>
              <input type="text"  placeholder="Nombre" name="Nombre">
            </div>
            <div class="field space">
              <span class="fa fa-user"></span>
              <input type="text"  placeholder="Apellidos" name="Apellidos">
            </div>
            <div class="field space">
              <span class="fa fa-lock"></span>
              <input type="email" class=""  placeholder="Email" name="Email">
            </div>
            <div class="field space">
              <span class="fa fa-lock"></span>
              <input type="password" class="pass-key"  placeholder="ClaveAcceso" name="ClaveAcceso">
            </div>
            <div class="field space">
              <span class="fa fa-lock"></span>
              <input type="number"   placeholder="Teléfono" name="Telefono">
            </div>
        
            <div class="field space">
              <span class="fa fa-lock"></span>
              <input type="File" name="Foto" id="Foto">
            </div>
            <input type="submit" value="EDITAR " name="btnEditar">
    
      <div> <a>--></a><a href="index.php "> Volver</a></div>
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