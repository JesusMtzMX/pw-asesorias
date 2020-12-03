<!DOCTYPE html>
<html lang="en">

<head>
  <title>Asesorías en línea</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Estilos Css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Red+Hat+Text:400,500,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="sweetalert/SweetAlert2/sweetalert2.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="css/styles.css">

</head>

<body>

  <!-- Ir Arriba -->
  <div class="go-top">
    <span class="fas fa-angle-up"></span>
  </div>

  <!-- Menu de Navegacion -->
  <header id="header">

  <?php
    session_start();

    if (session_id() === 'Asesor')
    {
      require_once "menu_asesor.php";
    }
    else if (session_id() === 'Asesorado')
    {
      require_once "menu_asesorado.php";
    }
    else
    {
      require_once "menu_inicial.php";
    }
  ?>

    <!-- Imagen Header -->
    <div class="img-header">
      <div class="welcome">
        <h1>Bienvenidos</h1>
        <hr>
        <p>Nuevas alternativas de aprendizaje</p>

      </div>
    </div>

    <div class="skew-abajo"></div>

  </header>

  <main>
    <div class="encabezado">
      <h3> Asesorías en línea para todos </h3>
    </div>

    <div class="texto-bienvenida">
      <h5> Únete a la comunidad de asesores en línea con amplia disponibilidad de horarios.</h5>
    </div>
    <div class="contenedor-img">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100 " src="img/img-1.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="img/img-11.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="img/img-15.jpg" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>


    <div id="lista-cursos" class="informacion">
      <h5>Cursos</h5>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum vitae itaque impedit aspernatur enim voluptas
        dignissimos, velit modi officia consequuntur odio maxime eligendi assumenda accusamus eveniet ad? Optio, rerum
        labore.
      </p>

      <div>
        <ul>
          <li> <a href="#curso-1"> Curso 1 </a></li>
          <li><a href="#curso-2"> Curso 2 </a></li>
          <li><a href="#curso-3"> Curso 3 </a></li>
          <li><a href="#curso-4"> Curso 4 </a></li>
        </ul>
      </div>
    </div>

    <div class="descripcion-cursos">

      <div id="curso-1" class="info-cursos">
        <h5>Curso 1</h5>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam corrupti, necessitatibus quisquam quia itaque
          architecto. Veritatis officiis libero, in expedita quis numquam ducimus obcaecati at quos, corrupti
          dignissimos nihil voluptate!
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam corrupti, necessitatibus quisquam quia itaque
          architecto. Veritatis officiis libero, in expedita quis numquam ducimus obcaecati at quos, corrupti
          dignissimos nihil voluptate!
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam corrupti, necessitatibus quisquam quia itaque
          architecto. Veritatis officiis libero, in expedita quis numquam ducimus obcaecati at quos, corrupti
          dignissimos nihil voluptate!
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam corrupti, necessitatibus quisquam quia itaque
          architecto. Veritatis officiis libero, in expedita quis numquam ducimus obcaecati at quos, corrupti
          dignissimos nihil voluptate!
        </p>
        <div>
          <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Inscríbete</button>
        </div>
      </div>
      <div id="curso-2" class="info-cursos">
        <h5>Curso 2</h5>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam corrupti, necessitatibus quisquam quia itaque
          architecto. Veritatis officiis libero, in expedita quis numquam ducimus obcaecati at quos, corrupti
          dignissimos nihil voluptate!
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam corrupti, necessitatibus quisquam quia itaque
          architecto. Veritatis officiis libero, in expedita quis numquam ducimus obcaecati at quos, corrupti
          dignissimos nihil voluptate!
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam corrupti, necessitatibus quisquam quia itaque
          architecto. Veritatis officiis libero, in expedita quis numquam ducimus obcaecati at quos, corrupti
          dignissimos nihil voluptate!
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam corrupti, necessitatibus quisquam quia itaque
          architecto. Veritatis officiis libero, in expedita quis numquam ducimus obcaecati at quos, corrupti
          dignissimos nihil voluptate!
        </p>
        <div>
          <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Inscríbete</button>
        </div>
      </div>
      <div id="curso-3" class="info-cursos">
        <h5>Curso 3</h5>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam corrupti, necessitatibus quisquam quia itaque
          architecto. Veritatis officiis libero, in expedita quis numquam ducimus obcaecati at quos, corrupti
          dignissimos nihil voluptate!
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam corrupti, necessitatibus quisquam quia itaque
          architecto. Veritatis officiis libero, in expedita quis numquam ducimus obcaecati at quos, corrupti
          dignissimos nihil voluptate!
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam corrupti, necessitatibus quisquam quia itaque
          architecto. Veritatis officiis libero, in expedita quis numquam ducimus obcaecati at quos, corrupti
          dignissimos nihil voluptate!
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam corrupti, necessitatibus quisquam quia itaque
          architecto. Veritatis officiis libero, in expedita quis numquam ducimus obcaecati at quos, corrupti
          dignissimos nihil voluptate!
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam corrupti, necessitatibus quisquam quia itaque
          architecto. Veritatis officiis libero, in expedita quis numquam ducimus obcaecati at quos, corrupti
          dignissimos nihil voluptate!
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam corrupti, necessitatibus quisquam quia itaque
          architecto. Veritatis officiis libero, in expedita quis numquam ducimus obcaecati at quos, corrupti
          dignissimos nihil voluptate!
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam corrupti, necessitatibus quisquam quia itaque
          architecto. Veritatis officiis libero, in expedita quis numquam ducimus obcaecati at quos, corrupti
          dignissimos nihil voluptate!
        </p>
        <div>
          <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Inscríbete</button>
        </div>
      </div>
      <div id="curso-4" class="info-cursos">
        <h5>Curso 4</h5>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam corrupti, necessitatibus quisquam quia itaque
          architecto. Veritatis officiis libero, in expedita quis numquam ducimus obcaecati at quos, corrupti
          dignissimos nihil voluptate!
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam corrupti, necessitatibus quisquam quia itaque
          architecto. Veritatis officiis libero, in expedita quis numquam ducimus obcaecati at quos, corrupti
          dignissimos nihil voluptate!
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam corrupti, necessitatibus quisquam quia itaque
          architecto. Veritatis officiis libero, in expedita quis numquam ducimus obcaecati at quos, corrupti
          dignissimos nihil voluptate!
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam corrupti, necessitatibus quisquam quia itaque
          architecto. Veritatis officiis libero, in expedita quis numquam ducimus obcaecati at quos, corrupti
          dignissimos nihil voluptate!
        </p>
        <div>
          <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Inscríbete</button>
        </div>
      </div>

    </div>

    <!-- Acerca de nosotros -->
    <section id="acerca-de" class="acerca-de">
      <div class="info-container">
        <h1>Acerca de Nosotros</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam molestie in risus eget iaculis. Pellentesque
          habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed at ultricies lacus. Sed
          ut ornare mi, ac blandit nibh. Nulla sollicitudin lorem consequat, porta est ut, scelerisque risus. Morbi
          iaculis a sem quis iaculis. Sed facilisis turpis placerat, aliquam augue in, aliquet lectus.</p>
        <p>Aliquam erat volutpat. Aliquam pellentesque velit ut neque consequat, id accumsan est cursus. Ut ut leo at
          dolor molestie porta. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
          Integer auctor gravida quam et faucibus. Vivamus vel porttitor leo, ac ornare odio. Praesent finibus mi urna,
          sed vehicula dolor bibendum vel.</p>
        <div class="about-gallery">
          <img src="img/img-9.jpg" alt="">
          <img src="img/img-13.jpg" alt="">
          <img src="img/img-17.jpg" alt="">
        </div>

        <div class="about-more"><button>Leer mas</button></div>

      </div>
    </section>

    <!-- Opiniones -->
    <section class="testimonios">
      <div class="testimonios-title">
        <h2>Opiniones</h2>
        <hr>
      </div>

      <div class="box-testimonio">
        <div class="card-testimonio">
          <!--<div class="card-img"><img src="img/peaple-1.jpg" alt=""></div>-->
          <div class="testimonio-text">
            <h4>Amanta Castillo</h4>
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec tellus quis orci tristique accumsan
              a quis tortor. Quisque ultricies diam vitae dolor varius, et molestie dolor faucibus."</p>
          </div>
        </div>

        <div class="card-testimonio">
          <!--<div class="card-img"><img src="img/peaple-2.jpg" alt=""></div>-->
          <div class="testimonio-text">
            <h4>Clara Smilla</h4>
            <p>"In a gravida enim. Ut nunc tortor, viverra et leo ut, mattis pretium velit. Phasellus vitae molestie
              tortor, blandit scelerisque tellus."</p>
          </div>
        </div>

        <div class="card-testimonio">
          <!--<div class="card-img"><img src="img/peaple-3.jpg" alt=""></div>-->
          <div class="testimonio-text">
            <h4>Oscar Muñoz - Fundandor</h4>
            <p>"Sed pulvinar neque semper quam ultricies placerat. Suspendisse id posuere diam, sit amet malesuada urna.
              Proin eleifend consectetur convallis. Nulla dignissim ut elit a faucibus. Sed luctus sagittis gravida.
              Vivamus ante leo, finibus a rutrum ac, sodales vitae nisi."</p>
          </div>
        </div>

        <div class="card-testimonio">
          <!--<div class="card-img"><img src="img/peaple-4.jpg" alt=""></div>-->
          <div class="testimonio-text">
            <h4>Roberto Perez</h4>
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec tellus quis orci tristique accumsan
              a quis tortor. Quisque ultricies diam vitae dolor varius, et molestie dolor faucibus."</p>
          </div>
        </div>

      </div>
    </section>

  </main>

  <!-- Footer -->
  <footer class="footer">
    <div class="skew-arriba"></div>
    <div class="deg-footer"></div>

    <div class="ejeZfooter">
      <div class="footer-content">
        <div class="footer-title">
          <h2>Contáctanos</h2>
          <hr>
        </div>

        <div class="formulario-content">
          <form id="formulario">
            <label for="user">Nombre:</label>
            <input type="text" id="user" name="user" placeholder="Ingresa tu Nombre">

            <label for="email">Correo Electronico:</label>
            <input type="email" id="email" name="email" placeholder="Ingresa tu Correo Electronico">

            <label for="message">Escribe tu mensaje</label>
            <textarea name="menssage" id="message"></textarea>

            <div class="send">
              <button id="btnEnviarComentario" type="button" value="Enviar" onclick="enviarComentario()">Enviar</button>
            </div>

            <div class="mensaje-form">
              <p>Escribenos un mensaje, con gusto tendras una respuesta de parte de nosotros en muy poco tiempo.</p>
            </div>
          </form>
        </div>

        <div class="footer-text">
          <p>&copy; Agencia de asesorías web - 2020</p>
        </div>

      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="https://kit.fontawesome.com/35db202371.js"></script>
  <script src="js/app.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>
  <script src="sweetalert/SweetAlert2/sweetalert2.all.min.js"></script>
</body>

</html>