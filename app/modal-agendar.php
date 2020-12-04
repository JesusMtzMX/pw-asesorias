<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
  <div class="modal-dialog my-5 py-5" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form class="needs-validation" novalidate id="frmAsesoria" action="agendar-asesoria.php" method="POST">

        <div class="form-group">
          <label class="mb-0 mt-2">Solicitante</label>
          <input type="text" class="input form-control my-2" name="txtIDAsesorado" id="txtIDAsesorado" value="<?= $_SESSION['username']?>" disabled required>
        </div>

        <div class="form-group">
          <label class="mb-0 mt-2" for="txtTemaAsesoria">Tema</label>
          <input type="text" class="input form-control" name="txtTemaAsesoria" id="txtTemaAsesoria" placeholder="Tema" required>
        </div>

        <div class="form-group">
          <label class="mb-0 mt-2" for="txtAreaEstudio">Área o ámbito</label>
          <input type="text" class="input form-control" name="txtAreaEstudio" id="txtAreaEstudio" placeholder="Area de estudio (ámbito o rama)" required>          
        </div>

        <div class="form-group">
          <label class="mb-0 mt-2" for="inpFecha">Fecha propuesta</label>
          <input type="date" class="input form-control" name="inpFecha" id="inpFecha" required>
        </div>

        <div class="form-group">
          <label class="mb-0 mt-2" for="inpHora">Hora</label>
          <input type="time" class="input form-control" name="inpHora" id="inpHora" required>
        </div>

        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btnCancelar" data-dismiss="modal">Cancelar</button>
        <button type="submit" form="frmAsesoria" class="btn btn-primary btnConfirmarAsesoria">Aceptar</button>
      </div>

    </div>
  </div>
</div>