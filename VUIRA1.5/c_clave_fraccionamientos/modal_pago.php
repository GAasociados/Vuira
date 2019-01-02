<div class="modal fade" id="modalPago" tabindex="-1" role="dialog" aria-labelledby="talonModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalPagLLabel">Generar Talón de Pago</h5>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="exampleFormControlInput1">Número de Claves</label>
          <input class="form-control" id="numeroClaves" type="number">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" id="generarTalonPago" onclick="generar_talon_pago(this)">Generar</button>
      </div>
    </div>
  </div>
</div>