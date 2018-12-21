<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
?>
<!DOCTYPE html>
<html>
<head>
    <?php include("./../base/Header.php");?>
    <script type="text/javascript" src="./../js/view_claves_cat_fraccionamiento.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Auxiliar Clave Catastral Fraccionamientos</title>
</head>
<body onload="event_load_auxiliar()">
<form method="post" id="form" enctype="multipart/form-data">
<div class="container">
  <br>
    <h1> CLAVE CATASTRAL FRACCIONAMIENTOS</h1>
    <hr>
    <input type="hidden" name="id" id="id" value="<?php
				if(isset($_GET["Id"]))
				{
						echo $_GET["Id"];
				}
			?>" />
    <input type="hidden" name="uid" id="uid" value="<?php
      if(isset($_GET['uid']))
      {
        echo $_GET["uid"];
      }
      ?>">
    <div class="container">
        <h2> I. DOCUMENTOS DEL INMUEBLE</h2>
        <br>
        Visualize los Siguientes Archivos Escaneados del Original:
        <br>
        <br>
        <ul class="list-group list-group-flush ">
          <li class="list-group-item" style="background-color:transparent;">1.- Identificación de Propietario (INE,Pasaporte,Cédula Profesional) *
            <div class="clearfix w-50 col-md-8"> <a style="border=0;" class="float-right" id="Doc_Identificacion" name="Doc_Identificacion" href="" target="_blank"> Ver Documento </a></div>
           </li>
          <li class="list-group-item" style="background-color:transparent;">2.- Oficio de Traza Autorizada por la Dirección General de Desarrollo Territorial *
              <div class="clearfix w-50 col-md-8"> <a class="float-right" id="Doc_Oficio_Traza" name="Doc_Oficio_Traza" href="" target="_blank"> Ver Documento </a></div>
          </li>
          <li class="list-group-item" style="background-color:transparent;">3.- Recibo Predial actualizado general y/o Cuentas Prediales Individuales *
              <div class="clearfix w-50 col-md-8"> <a class="float-right" id="Doc_Resibo_Predial" name="Doc_Resibo_Predial" href="" target="_blank"> Ver Documento </a></div>
          </li>
          <li class="list-group-item" style="background-color:transparent;">4.- Plano Digital de Traza Autorizada por la Dirección General de Desarrollo Territorial *
              <div class="clearfix w-50 col-md-8"> <a class="float-right" id="Doc_Plano_Digital" name="Doc_Plano_Digital" href="" target="_blank"> Ver Documento </a></div>
          </li>
          <li class="list-group-item" style="background-color:transparent;">5.- Plano físico de Traza autorizada por la Dirección General de Desarrollo Territorial *
              <div class="clearfix w-50 col-md-8"> <a class="float-right" id="Doc_Plano_Fisico" name="Doc_Plano_Fisico" href="" target="_blank"> Ver Documento </a></div>
          </li>
          <li class="list-group-item" style="background-color:transparent;">6.- Escritura Pública de Propiedad que contenga la hoja Registral y ampare la Superficie Registrada (en caso de no contener la hoja registral anexar copia de Libertad de Gravamen) *
            <div class="clearfix w-50 col-md-8"> <a class="float-right" id="Doc_Escritura_Publica" name="Doc_Escritura_Publica" href="" target="_blank" > Ver Documento </a></div>
          </li>
          <li class="list-group-item" style="background-color:transparent;">7.- Poder Notarial para representación de persona moral
            <div class="clearfix w-50 col-md-8"> <a class="float-right" id="Doc_Acta" name="Doc_Acta" href="" target="_blank"  > Ver Documento </a></div>
          </li>
        </ul>
    </div>
    <div>
    <?php include_once("cmp_inmueble_generar.php"); ?>
    </div>
    <div class="container">
    <br>
    <h2>III. DATOS DEL PROPIETARIO Y/O REPRESENTANTE</h2>
    <br>
    <div class="container">
    <div class="form-group col-md-8">
        <label class="control-label" for="Propietario">Nombre Completo del Propietario *</label>
        <input class="form-control" type="text" id="Propietario" name="Propietario" placeholder="Propietario" />
      </div>
      <div class="form-group col-md-8">
            <label class="control-label" for="Correo_Electronico">Correo Electrónico *</label>
            <input class="form-control" type="email" id="Correo_Electronico" name="Correo_Electronico" aria-describedby="emailHelp" placeholder="Ingresar correo electrónico">
            <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tu correo electrónico con nadie.</small>
      </div>
      <div class="form-group col-md-8">
            <label class="control-label" for="Telefono">Teléfono *</label>
            <input class="form-control mr-sm-2" type="text" id="Telefono" name="Telefono" placeholder="Ingresar teléfono"/>
      </div>
      <div class="form-row align-items-start col-md-8">
              <label class="mr-sm-1" for="Tipo_Tramite">Tipo de Trámite que Solicita*</label>
              <select class="custom-select mr-sm-2" id="Tipo_Tramite" name="Tipo_Tramite">
                    <option selected>Elegir trámite...</option>
                    <option value="1">Asignación de Claves Catastrales</option>
                    <option value="2">Modificación de Clave Catastrales</option>
              </select>
      </div>
      <br>
      <div class="col-md-8">
      <input class="btn btn-danger" type="button" value="Cancelar"  />
      <input class="btn btn-success" type="submit" value="Guardar" /><br><br>
      </div>
    </form>
    </div>
    </div>
</div>
<script src="./../js/tether.min.js"></script>
<script src="./../js/bootstrap.min.js"></script>
</body>
</html>
<?php
  include('./../base/Footer.php')
?>
