<nav class="menu">
  <div class="logo-box">
    <h1><a href="#">Asesorías</a></h1>
    <span class="btn-menu"><i class="fas fa-bars"></i></span>
  </div>

  <div class="list-container">

    <ul class="lists">

      <li class="active"><a href="index.php">Inicio</a></li>

      <li><a href="mis-cursos.php">Mis cursos</a></li>

      <li><a href="mi-agenda.php" id="menuAgenda">Agenda</a></li>

      <li><a href="chat-asesor.php">Chat</a></li>      

      <li class="nav-item dropdown">

        <a class="dropdown-toggle" id="navAsesores" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Asesores</a>

        <div class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">
          <a href="lista-asesores.php">Ver asesores</a>          
        </div>

      </li>

      <li class="nav-item dropdown">

        <a class="dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false"><?= $_SESSION['username']?>
        </a>
        
        <div class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">

          <form class="form-inline my-2 my-lg-0" action="../datos/Logout.php" method="POST">
            <button class="btn btn-outline-info mx-2 my-2 my-sm-0" type="submit">Cerrar sesión</button>
          </form>

        </div>

      </li>

    </ul> <!-- lists-->

  </div> <!-- container-->

</nav>