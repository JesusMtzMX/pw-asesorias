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
    <link rel="stylesheet" href="sweetalert/SweetAlert2/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="css/bootstrapValidator.min.css">
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

<?php
    $asesoria = null;
    $msgError=null;
    $validacion=null;    

    //Asegura que los datos requeridos cumplan con las mismas
    //validaciones que en el cliente para asegurar que vienen correctos
    
    function validar()
    {
		$textoValidacion="";
		
		if (!isset($_POST["txtTemaAsesoria"]) || strlen(trim($_POST["txtTemaAsesoria"]))<4 ||
			strlen(trim($_POST["txtTemaAsesoria"]))>40)
            $textoValidacion .="<li>Debes especificar el tema de la asesoría solicitada.</li>";
            
        if (!isset($_POST["txtAreaEstudio"]) || strlen(trim($_POST["txtAreaEstudio"]))<4 ||
        strlen(trim($_POST["txtAreaEstudio"]))>40)
			$textoValidacion.="<li>Debes especificar el área de estudio de tu tema solicitado</li>";

		if (!isset($_POST["inpFecha"]))
            $textoValidacion.="<li>Debes seleccionar una fecha de asesoría</li>";
        
        if (!validar_fecha_espanol($_POST["inpFecha"]))
			$textoValidacion.="<li>Debes seleccionar una fecha correcta</li>";

        if (!isset($_POST["inpHora"]))
        $textoValidacion.="<li>Debes seleccionar una hora para la asesoría</li>";

        if ($textoValidacion)
        {
			return "<ul>".$textoValidacion."</ul>";
		}

		return "";
	}
    function validar_fecha_espanol($fecha)
    { //mysql: año, mes dia   input: año, mes, dia   checkdate; mes, dia, año  2020-12-16
        $valores = explode('-', $fecha);
        if(count($valores) == 3 && checkdate($valores[1], $valores[2], $valores[0]))
        {            
            return true;
        }
        
        return false;
    }

    //La función empty nos ayuda a verificar si una variable esta
	//vacía (sin elementos o sin datos)

    if (!empty($_POST)) //Se recibieron datos por post
    {
        require_once "../datos/Asesoria_Dao.php";
        $dao=new Asesoria_Dao();        
        //Guardar
        //Se verifica si la variable POST no está vacía (implica que se dió 
        //click a guardar y se recibieron los datos de las cajas de texto
        $validacion=validar();
        $asesoria = new Asesoria();

        if(isset($_POST['txtTemaAsesoria']) && isset($_POST['txtAreaEstudio']) && isset($_POST['inpFecha']) && isset($_POST['inpHora']))
        {            
            $asesoria->IDAsesor=$_POST['txtIDAsesor'];
            $asesoria->IDAsesorado=$_SESSION['usuarioID'];
            $asesoria->Tema=$_POST['txtTemaAsesoria'];
            $asesoria->AreaEstudio=$_POST['txtAreaEstudio'];
            $asesoria->Fecha=$_POST['inpFecha'];
            $asesoria->Hora=$_POST['inpHora'];
            $asesoria->Estatus='Pospuesta';
        }       
        if($validacion==""){
            //Datos correctos
            // if(isset($_POST["txtClave"]))
            // { //Editar
            //     if($dao->editar($asesoria))
            //     {
            //         session_start();
            //         $_SESSION["msg"]="asesoria almacenado con éxito";
            //         $_SESSION["tipoMsg"]=1; //Mensaje de éxito

            //         var_dump($asesoria);
            //         //header("Location: lista_productos.php");
            //         exit;
            //     }
            //     else
            //     {
            //         $msgError="No se ha podido realizar la operación, intenta más tarde";
            //     }
            // }
            // else
            { //Agregar
                if($dao->agregar($asesoria))
                {                    
                    $_SESSION["msg"]="Asesoria almacenada con éxito";
                    $_SESSION["tipoMsg"]=1; //Mensaje de éxito
                    //header("Location: lista_productos.php");
                    //exit;
                }
                else
                {
                    //$msgError="No se ha podido realizar la operación, intenta más tarde";
                }
            }
        }
        else
        {
            $msgError="Los datos no son válidos: <br>";
        }
        
    }
    else
    {
        // Solo cargar para comenzar a capturar
    }
?>

    <!-- <div class="skew-abajo">
    </div> -->

    </header>

    <div class="lista-asesores">
        <div class="agenda-titulo-asesores">
            <h1 class="text-center">ASESORES</h1>
            <br>
        </div>
        <br>
    <?php 
        if($msgError)
        {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?= $msgError?></strong> <?= $validacion ?> <?= $_POST['inpFecha'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php        
        }
        if(isset($_SESSION["msg"]))
        {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= $_SESSION["msg"] ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php        
        }
        $msgError = "";
        $validacion = "";
        $_SESSION["msg"] = null;
    ?>

    <?php
        include 'modal-agendar.php';
        require_once "../datos/Asesor_Dao.php";
        $dao = new Asesor_Dao();
        $lista = $dao->obtenerTodos();

    ?>
        <table class="table tabla-agenda-asesores">
            <thead>
                <th> Foto perfil </th>
                <th> Nombre </th>
                <th> Temas ofrecidos</th>
                <th> Agendar</th>
            </thead>
            <tbody>
                <?php if(isset($lista))
                {
                    foreach ($lista as $asesor)
                    {
                ?>
                <tr>
                    <td>
                        
                    </td>
                    <td>
                        <h6><?= $asesor->Nombre ?> <?= $asesor->Apellidos ?></h6>
                    </td>
                    <td>
                        <?= $asesor->TemasOfrecidos ?>
                    </td>
                    <td>
                        <button class="btn btn-info btn-agendar" type="button" onclick="asignardatos('<?= $asesor->Nombre ?> <?= $asesor->Apellidos ?>', '<?=$asesor->IDAsesor?>')" value="" data-toggle="modal" data-target="#exampleModal">
                            AGENDAR
                        </button>                        
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
    <script src="js/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="js/bootstrapValidator.js"></script>
    <script src="sweetalert/SweetAlert2/sweetalert2.all.min.js"></script>
    <script src="https://kit.fontawesome.com/35db202371.js"></script>
    <script src="js/seleccionar-asesor.js"></script>
</body>

</html>