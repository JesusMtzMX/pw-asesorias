<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Red+Hat+Text:400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="sweetalert/SweetAlert2/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/styles.css">

    <title>Mi agenda de asesorías</title>
</head>
<body>
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
    ?>
      <div class="container bg-light mx-auto mt-5 pt-5 text-center">
        <h4>Acceso no autorizado</h4>
        <p>Para poder acceder a su agenda, debe iniciar sesión</p>
      </div>
    <?php
    }
  ?>

  <div class="pt-3 mt-5">
  <?php
    if (session_id() === 'Asesor')
    {
      require_once "agenda-asesor.php";
    }
    else if (session_id() === 'Asesorado')
    {     
      require_once "agenda-asesorado.php";
    }
  ?>
  </div>
    
    <script src="js/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>        
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>    
    <script src="sweetalert/SweetAlert2/sweetalert2.all.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.8.1/js/all.js"></script>
    <script src="js/mi-agenda.js"></script>
</body>
</html>