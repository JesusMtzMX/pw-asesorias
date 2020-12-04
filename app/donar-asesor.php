<!DOCTYPE html>
<html lang="en">

<head>
    <title>Asesorías en línea</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Estilos Css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Red+Hat+Text:400,500,700&display=swap" rel="stylesheet">
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

        <div class="skew-abajo">
        </div>

    </header>

    <?php        
        require_once "../datos/Asesor_Dao.php";
        $dao = new Asesor_Dao();
        $lista = $dao->obtenerTodos();
    ?>

    <div class="lista-asesores">
        <div class="agenda-titulo-asesores">
            <h1 class="text-center">DONACIÓN A ASESORES</h1>
            <br>
            <h4 class="text-center"> Este sitio es 100% gratuito</h4>
            <br>
            <h4 class="text-center">Todas las donaciones son opcionales y se realizan a través de PayPal</h4>
        </div>
        <br>
        <table class="tabla-agenda-asesores">
            <thead>
                <th> Foto perfil </th>
                <th> Nombre </th>
                <th> Donación a Paypal</th>
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
                        <a type="button"><?= $asesor->Paypal?></a>
                    </td>
                </tr>
            <?php
                    }
                }
            ?>
            </tbody>
        </table>
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
</body>

</html>