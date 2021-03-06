<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Crear cuenta</title>
    <link rel="stylesheet" href="css/StyleRegistro.css">
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Red+Hat+Text:400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="sweetalert/SweetAlert2/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/styles.css">

  </head>
  <?php
      require_once "menu_inicial.php";
    ?>
  <body background="IS.jpg">
    <div class="IS.jpg">
      <div class="content">
        <header id="header">Registrarse como ASESOR</header>
        <form action="../datos/RegistroAsesor.php" method="POST" enctype="multipart/form-data">
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
              <input type="text"  placeholder="DescripcionPerfil" name="DescripcionPerfil">
            </div>
            <div class="field space">
              <span class="fa fa-lock"></span>
              <input type="text"  placeholder="TemasOfrecidos" name="TemasOfrecidos">
            </div>
            <div class="field space">
              <span class="fa fa-lock"></span>
              <input type="File" name="Foto" id="Foto">
            </div>
            <div class="field space">
              <span class="fa fa-lock"></span>
              <input type="text"  placeholder="LINK Paypal" name="Paypal">
            </div><br>
          <div class="field space">
            <input type="submit" value="REGISTRARSE" name="btnasesor" id="btnasesor">
            
          </div><br>
          <a href="../app/iniciar_sesion.php">Volver</a>
        </form>
        <div class="footer-text">
          <p>&copy; Agencia de asesorías web - 2020</p>
        </div>
        <div class="content2">
          <header id="header">Registrarse como ASESORADO</header>
          <form action="../datos/Registrar.php" method="POST">
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
            </div><br>
            <div class="field space">
              <input type="submit" value="REGISTRARSE" name="btnAsesorado">
         
            </div><br>
            <a href="../app/iniciar_sesion.php">Volver</a>
          </form>
          <div class="footer-text">
          <p>&copy; Agencia de asesorías web - 2020</p>
        </div>
      
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>        
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>    
    <script src="sweetalert/SweetAlert2/sweetalert2.all.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">

      <script src="js/app.js"></script>
  </body>
  
</html>

