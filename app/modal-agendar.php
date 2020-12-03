<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        
        <input type="number" class="input form-control my-2" name="txtIDAsesor" id="txtIDAsesor">
        <input type="text" class="input form-control my-2" name="txtNombreAsesor" id="txtNombreAsesor" placeholder="Asesor" disabled required>
        <div class="valid-feedback">
            Dato correcto
        </div>
        <div class="invalid-feedback">
            El asesor es un valor requerido
        </div>

        <input type="text" class="input form-control my-2" name="txtIDAsesorado" id="txtIDAsesorado" value="<?= $_SESSION['username']?>" disabled required>
        <div class="valid-feedback">
            Dato correcto
        </div>
        <div class="invalid-feedback">
            El asesorado es un dato requerido
        </div>

        <label class="mb-0 mt-3" for="txtTemaAsesoria">Tema</label>
        <input type="text" class="input form-control" name="txtTemaAsesoria" id="txtTemaAsesoria" placeholder="Tema" required>
        <!-- <div class="valid-feedback">
            Dato correcto
        </div> -->
        <div class="invalid-feedback">
            <li>Ingrese un tema de asesoría (mínimo 4 carácteres, máximo 40)</li>
        </div>

        <label class="mb-0 mt-3" for="txtAreaEstudio">Área o ámbito</label>
        <input type="text" class="input form-control" name="txtAreaEstudio" id="txtAreaEstudio" placeholder="Area de estudio (ámbito o rama)" required>
        <!-- <div class="valid-feedback">
            Dato correcto
        </div> -->
        <div class="invalid-feedback">
            <li>Ingrese el área al que pertenece su tema de asesoría (mínimo 4 carácteres, máximo 40)</li>
        </div>

        <label class="mb-0 mt-3" for="inpFecha">Fecha propuesta</label>
        <input type="date" class="input form-control" name="inpFecha" id="inpFecha" required>
        <!-- <div class="valid-feedback">
            Dato correcto
        </div> -->
        <div class="invalid-feedback">
            <li>Ingrese una fecha de asesoría</li>
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