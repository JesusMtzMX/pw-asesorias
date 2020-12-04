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
                        <img src="<?= $asesor->Foto?>" alt="<?= "Asesor " . $asesor->Nombre ?>">
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