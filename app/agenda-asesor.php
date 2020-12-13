<?php            
    require_once "../datos/Asesoria_Dao.php";
    $dao = new Asesoria_Dao();
    $lista = $dao->obtenerAsesoriasAsesor($_SESSION['usuarioID']);

    if (!empty($_POST)) //Se recibieron datos por post
    {
        $IDAsesoria = $_POST['cambiarStatus'];
        
        $obj = $dao->obtenerUno($IDAsesoria);
        
        if($obj->Estatus == 'Pospuesta')
        {
            $dao->editarEstatus($IDAsesoria,'Completada');
        }
        else
        {
            $dao->editarEstatus($IDAsesoria,'Pospuesta');
        }
    }
    else
    {
?>
    <!-- <div class="alert alert-danger">
        Ha ocurrido un error
    </div> -->
<?php
    }
?>

<div class="mt-5 pt-4 px-5">
    <h2 class="text-center pb-3">Mis asesorías</h2>    
    <table class="table table-striped table-bordered tabla-agenda-asesores" id="tabla-agenda">
        <thead class="thead-dark">
            <tr>
                <th> Asesorado </th>            
                <th> Tema </th>
                <th> Área</th>
                <th> Fecha</th>
                <th> Hora</th>
                <th> Estatus</th>
                <th> Acciones </th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($lista))
            {                
                foreach ($lista as $fila)
                {
            ?>            
            <tr>
                <td>
                    <?= $fila->Asesorado ?>
                </td>                
                <td>
                    <?= $fila->Tema?>
                </td>
                <td>
                    <?= $fila->Area?>
                </td>
                <td>
                    <?= $fila->Fecha?>
                </td>
                <td>
                    <?= $fila->Hora?>
                </td>
                <td>
                    <?php
                        if($fila->Estatus == 'Pospuesta')
                        {
                            echo'Pendiente';
                        }
                        else
                        {
                            echo $fila->Estatus;
                        }
                    ?>                    
                </td>
                <td>
                    <form action="mi-agenda.php" method="POST">
                        <input type="text" name="cambiarStatus" value="<?=$fila->IDAsesoria?>" hidden>
                        <button type="submit" class="btn btn-outline-danger rounded-circle"><i class="fas fa-edit"></i></button>
                    </form>
                </td>
            </tr>
        <?php
                }
            }
        ?>
        </tbody>
    </table>
</div>
