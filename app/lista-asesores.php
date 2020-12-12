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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/estilos-asesores.css">

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
                <h1>Conoce a nuestros asesores</h1>
                <hr>
                <p>En la siguiente tabla encontrarás información acerca de los asesores que estarán dispuestos a
                    ayudarte
                </p>
            </div>
        </div>

        <div class="skew-abajo">

        </div>

    </header>

    <div class="titulo-asesores">
        <h1>ASESORES</h1>
        <br>
    </div>

    <div class="mx-5">
        <?php        
            require_once "../datos/Asesor_Dao.php";
            $dao = new Asesor_Dao();
            $lista = $dao->obtenerTodos();

        ?>
        <table id="tablaAsesores" class="table table-striped table-bordered table-hover tabla-agenda-asesores">
            <thead class="thead-dark">
                <tr>
                    <th> Foto perfil </th>
                    <th> Nombre </th>
                    <th> Perfil profesional</th>                            
                </tr>
            </thead>
            <tbody>
                <?php if(isset($lista))
                {
                    foreach ($lista as $asesor)
                    {
                ?>
                <tr>
                    <td>
                        <img src="<?= $asesor->Foto?>" alt="<?= "Asesor " . $asesor->Nombre ?>">
                    </td>
                    <td>
                        <h6 class="my-3"><?= $asesor->Nombre ?> <?= $asesor->Apellidos ?></h6>
                    </td>
                    <td>
                        <p class="my-3"><?= $asesor->DescripcionPerfil ?></p>
                    </td>
                </tr>
            <?php
                    }
                }
            ?>
            </tbody>
        </table>
    </div>

    <div class="agendar">
        <div class="titulo-agendar">
            <h2 class="text-center">¿Te interesa agendar alguna asesoría en línea?</h2>
            <h3 class="text-center">Ponte en contacto con el asesor de tu preferencia que cumpla con el perfil de acuerdo a tu necesidad.</h3>
        </div>
        <br>
        <div class="text-center">
            <button class="btn btn-info btn-agendar"> AGENDAR ASESORÍA </a>  </button>
        </div>
    </div>
    <div class="donar">
        <h2 class="text-center">¿Te gustaría hacer una donación?</h2>
        <br>
        <div class="text-center">
            <button class="btn btn-info btn-agendar"> DONAR </a>  </button>
        </div>
    </div>

    </main>

    <footer class="footer">
        <div class="skew-arriba"></div>
        <div class="deg-footer"></div>
    
        <div class="ejeZfooter">
          <div class="footer-content">
                   
            <div class="footer-text">
              <p>&copy; Agencia de asesorías web - 2020</p>
            </div>
    
          </div>
        </div>
      </footer>
      <input type="hidden" id="variable_sesion" value="<?php echo session_id() ?>">      

    <!-- Scripts -->
    <script src="js/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>        
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.8.1/js/all.js"></script>
    <script src="sweetalert/SweetAlert2/sweetalert2.all.min.js"></script>
    <script src="js/agendar-asesoria.js"></script>
</body>

</html>