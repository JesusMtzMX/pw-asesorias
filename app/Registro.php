<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Crear cuenta</title>
    <link rel="stylesheet" href="css/StyleRegistro.css">
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body background="IS.jpg">
    <div class="IS.jpg">
      <div class="content">
        <header id="header">Registrarse como ASESOR</header>
        <form action="../datos/RegistroAsesor.php" method="POST" >
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
              <input type="text"  placeholder="LINK Paypal" name="Paypal">
            </div>
            <div class="field space">
              <span class="fa fa-lock"></span>
              <input type="text" name="Foto" id="Foto">
            </div><br>
          <div class="field space">
            <input type="submit" value="REGISTRARSE" id="btnAsesor">
          </div><br>
          <a href="iniciar_sesion.php">Volver</a>
        </form>
        <div class="footer-text">
          <p>&copy; Agencia de asesorías web - 2020</p>
        </div>
        <div class="content2">
          <header id="header">Registrarse como ASESORADO</header>
          <form action="../datos/Registrar.php" method="POST" >
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
              <input type="text" name="Foto" id="Foto">
            </div><br>
            <div class="field space">
              <input type="submit" value="REGISTRARSE" id="btnAsesorado">
            </div><br>
            <a href="iniciar_sesion.php">Volver</a>
          </form>
          <div class="footer-text">
          <p>&copy; Agencia de asesorías web - 2020</p>
        </div>
    </div>
    
  </body>
  
</html>

