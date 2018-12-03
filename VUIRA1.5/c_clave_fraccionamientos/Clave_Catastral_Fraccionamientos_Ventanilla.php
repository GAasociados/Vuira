<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
?>
<!DOCTYPE html>
<html>
<head>
    <?php include("./../base/Header.php");?>
    <!--<script src="./../js/tether.min.js"></script>
    <script src="./../js/bootstrap.min.js"></script>-->
    <script type="text/javascript" src="./../js/view_claves_cat_fraccionamiento.js"></script>
    <!-- <script type="text/javascript" src="./js/jquery-3.3.1.min.js.js"></script> -->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Ventanilla Clave Catastral Fraccionamientos</title>
</head>
<body onload="event_load_ventanilla()">
<form method="post" enctype="multipart/form-data" action="../c_clave_fraccionamientos/C_C_Fraccionamientos_CE.php" id="formVentanilla">
    <div class="container">
    <br>
    <h1> CLAVE CATASTRAL FRACCIONAMIENTOS</h1>
    <div class="">
    <input type="hidden" name="id" id="id" value="<?php
		if(isset($_GET["Id"]))
		{
			echo $_GET["Id"];
		}
	   ?>"/>
    <div class="container">
        <h2 class="card-tittle"> I. DOCUMENTOS DEL INMUEBLE</h2>
        <br>
        Adjunte los Siguientes Archivos Escaneados de el Original:
        <br>
        <br>
        <ol>
          <li> Identificación de Propietario: INE, Pasaporte o Cédula Profesional*
            <div class="input-group mb-3 col-md-6">
              <div class="custom-file">
                <input accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="custom-file-input" type="file" name="Doc_Identificacion" multiple="">
                <label class="custom-file-label" for="inputGroupFile01">Elegir archivo...</label>
              </div>
            </div>
           </li>
          <li> Oficio de Traza Autorizada por la Dirección General de Desarrollo Territorial *
            <div class="input-group mb-3 col-md-6">
              <div class="custom-file">
                <input accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="custom-file-input" type="file" name="Doc_Oficio_Traza" multiple="">
                <label class="custom-file-label" for="inputGroupFile01">Elegir archivo...</label>
              </div>
            </div>
          </li>
          <li> Recibo Predial actualizado general y/o Cuentas Prediales Individuales *
              <div class="input-group mb-3 col-md-6">
              <div class="custom-file"><input style="background-color:#fff1d2;" accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="custom-file-input" type="file" name="Doc_Resibo_Predial" multiple=""><label class="custom-file-label" for="inputGroupFile01">Elegir archivo...</label></div></div>
          </li>
          <li> Plano Digital de Traza Autorizada por la Dirección General de Desarrollo Territorial *
              <div class="input-group mb-3 col-md-6">
              <div class="custom-file"> <input accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="custom-file-input" type="file" name="Doc_Plano_Digital" multiple=""><label class="custom-file-label" for="inputGroupFile01">Elegir archivo...</label></div></div>
          </li>
          <li> Plano físico de Traza autorizada por la Dirección General de Desarrollo Territorial *
              <div class="input-group mb-3 col-md-6">
              <div class="custom-file"> <input accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="custom-file-input" type="file" name="Doc_Plano_Fisico" multiple=""><label class="custom-file-label" for="inputGroupFile01">Elegir archivo...</label></div></div>
          </li>
          <li> Escritura Pública de Propiedad que contenga la Hoja Registral y ampare la Superficie Registrada (en caso de no contener la hoja registral anexar copia de Libertad de Gravamen) *
            <div class="input-group mb-3 col-md-6">
              <div class="custom-file">  <input accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="custom-file-input" type="file" name="Doc_Escritura_Publica" multiple=""><label class="custom-file-label" for="inputGroupFile01">Elegir archivo...</label></div></div>
          </li>
          <li> Poder Notarial para representación de persona moral
            <div class="input-group mb-3 col-md-6">
              <div class="custom-file"><input accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="custom-file-input" type="file" name="Doc_Acta" multiple="">
                <label class="custom-file-label" for="inputGroupFile01">Elegir archivo...</label></div></div>
          </li>
        </ol>
    </div>
    <div>
    <?php include_once("cmp_inmueble_create.php"); ?>
    </div>

    <div class="container card">
    <br>
    <h2>III. DATOS DEL PROPIETARIO Y/O REPRESENTANTE</h2>
    <br>
    <div class="container">
    <div class="form-group col-md-6">
        <label class="control-label" for="Propietario">Nombre Completo del Propietario *</label>
        <input class="form-control" type="text" id="Propietario" name="Propietario" placeholder="Propietario" / required>
      </div>
      <div class="form-group col-md-6">
            <label class="control-label" for="Correo_Electronico">Correo Electrónico *</label>
            <input class="form-control" type="email" id="Correo_Electronico" name="Correo_Electronico" aria-describedby="emailHelp" placeholder="Ingresar correo electrónico" required>
            <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tu correo electrónico con nadie.</small>
      </div>
      <div class="form-group col-md-6">
            <label class="control-label" for="Telefono">Teléfono *</label>
            <input class="form-control mr-sm-2" type="text" id="Telefono" name="Telefono" placeholder="Ingresar teléfono"/>
      </div>
      <div class="form-row align-items-start col-md-6">
              <label class="mr-sm-1" for="Tipo_Tramite">Tipo de Trámite que Solicita*</label>
              <select class="custom-select mr-sm-2" id="Tipo_Tramite" name="Tipo_Tramite">
                    <option selected>Elegir trámite...</option>
                    <option value="1">Asignación de Claves Catastrales</option>
                    <option value="2">Modificación de Clave Catastrales</option>
              </select>
      </div>
      <br>
      <div class="col-md-6">
        <input class="btn btn-danger" type="button" value="Cancelar" onclick="dirigir_main_page()" />
        <input class="btn btn-success" type="submit" value="Guardar" onclick=""/><br><br>
      </div>
    </form>
    </div>
    </div>
    </div>
</div>

</body>
</html>
<?php
  include('./../base/Footer.php')
?>
