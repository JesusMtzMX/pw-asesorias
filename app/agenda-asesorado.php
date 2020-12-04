<?php        
    require_once "../datos/Asesoria_Dao.php";
    $dao = new Asesoria_Dao();
    $lista = $dao->obtenerAsesoriasUsuario($_SESSION['usuarioID']);
?>
<div class="mt-5 pt-4">
    <h2 class="text-center pb-3">Mis asesorías</h2>
    <table class="table tabla-agenda-asesores">
        <thead>
            <th> Asesor </th>
            <th> Asesorado </th>
            <th> Tema </th>
            <th> Área</th>
            <th> Fecha</th>
            <th> Hora</th>
            <th> Estatus</th>
        </thead>
        <tbody>
            <?php if(isset($lista))
            {
                foreach ($lista as $fila)
                {
            ?>
            <tr>
                <td>
                    <?= $fila?>
                </td>
                <td>
                    <?= $fila[1]?>
                </td>
                <td>
                    <?= $fila[2]?>
                </td>
                <td>
                    <?= $fila[3]?>
                </td>
                <td>
                    <?= $fila[4]?>
                </td>
                <td>
                    <?= $fila[5]?>
                </td>
                <td>
                    <?= $fila[6]?>
                </td>
            </tr>
        <?php
                }
            }
        ?>
        </tbody>
    </table>
<script>alert('Hola')</script>
</div>