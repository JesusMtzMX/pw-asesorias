<?php        
    require_once "../datos/Asesoria_Dao.php";
    $dao = new Asesoria_Dao();
    $lista = $dao->obtenerAsesoriasUsuario($_SESSION['usuarioID']);
?>
<div class="mt-5 pt-4 mx-5">
    <h2 class="text-center pb-3">Mis asesorías</h2>    
    <table class="table table-striped table-bordered table-hover tabla-agenda-asesores" id="tabla-agenda">
        <thead class="thead-dark">
            <tr>
                <th> Asesor </th>
                <th> Tema </th>
                <th> Área</th>
                <th> Fecha</th>
                <th> Hora</th>
                <th> Estatus</th>                
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
                    <?= $fila->Asesor ?>
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
                <!-- <td>
                    <button type="button" class="btn btn-outline-danger rounded-circle"><i class="fas fa-trash-alt"></i></button>
                </td> -->
            </tr>
        <?php
                }
            }
        ?>
        </tbody>
    </table>
</div>