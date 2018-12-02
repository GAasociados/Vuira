<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Desarrollo Territorial</title>  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
			<style type="text/css">
      table{
        /*font: 100% sans-serif;*/
      }
      </style>
    </head>
    <header>
    </header>
    <body>
			<form class="" action="<?php echo base_url('index.php/docstramites/documentoconstruccion/documentofinal'); ?>" method="post">
			<input type="hidden" name="ID" value="<?php echo $ID; ?>">
      <table style="width:100%; floar:left;">
        <tr>
          <td>
            <img src="<?php echo base_url()."assets/images/"; ?>iniciodesarrollo.png" alt="" width="100%">
          </td>
        </tr>
      </table>
      <table style="width:100%; floar:left;">
        <tr>
          <td align="right">
            <b>
              Dirección de Administración Urbana
              <br>
              <input type="text" name="d1" value="DGDT/DAU/DP/01/32366/2017" size="30">
              <br>
              PERMISO DE ANUNCIOS
              <br>
              Irapuato, Guanajuato; a <?php /*$fechaactual = getdate(); echo $fechaactual["weekday"]." ".$fechaactual["mday"]." ".$fechaactual["month"]." ".$fechaactual["year"];*/
              $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
              'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

              $arrayDias = array( 'Domingo', 'Lunes', 'Martes',
              'Miércoles', 'Jueves', 'Viernes', 'Sábado');

              echo $arrayDias[date('w')].", ".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y'); ?>
            </b>
          </td>
        </tr>
        <tr>
          <td>
            <b>
              <?php echo $nombrepropietariodg; ?>
            </b>
            <br>
            <?php echo "Calle ". $calledg. " # ".$numerodg; ?>
            <br>
            <?php echo $arraycolonia->tipo_de_asentamiento . " ". $arraycolonia->colonia . " C.P. ". $arraycolonia->codigo_postal; ?>
            <br>
            <b>
              P r e s e n t e
            </b>
          </td>
        </tr>
        <tr>
          <td align="justify">
            <br>
            En base al Aviso de Terminación de Obra recibió en la Dirección General de Desarrollo Territorial, y de conformidad con lo establecido en los artículos 379, 380 y 381 del Código Territorial para el Estado y los Municipios de Guanajuato, publicado en el Periódico Oficial del Estado de Guanajuato número 154 Segunda Parte de fecha 25 de Septiembre del 2012; así como los artículos 5 fracción II, 11 fracción I, 37, 38, 39, 40 y 93 del Reglamento de Construcción para el Municipio de Irapuato, Guanajuato, publicado en el Periódico Oficial del Estado de Guanajuato número 38 Segunda Parte de fecha 07 de Marzo del 2014; se realizó la inspección final correspondiente para verificar el cumplimiento de lo señalado en la Tabla de Requisitos para la Gestión de Acciones Urbanísticas, comparando lo ejecutado con los planos de proyecto que sirvieron de base para otorgar del Permiso de Construcción con las características que se detallan a continuación:
            <br>
            <br>
            <b>Datos del Inmueble</b>
          </td>
        </tr>
      </table>

      <table style="width:100%; floar:left;">
        <tr style="border: 1px solid black;">
          <td style="border: 1px solid black;">Antecedentes</td>
          <td colspan="3" style="border: 1px solid black;">
            <b>Permiso de Construcción Ampliación:</b>
            <input type="text" name="d2" value="DGOT/DAU/GU/">
          </td>
        </tr>
        <tr style="border: 1px solid black;">
          <td rowspan="2" style="border: 1px solid black;">Ubicación</td>
          <td colspan="3" style="border: 1px solid black;">
            <select class="" name="d3">
              <option value="Bardas">Bardas</option>
              <option value="Anuncios en Tapiales">Anuncios en Tapiales</option>
              <option value="Vidrieras">Vidrieras</option>
              <option value="Escaparates">Escaparates</option>
              <option value="Cortinas Metálicas">Cortinas Metálicas</option>
              <option value="Marquesinas">Marquesinas</option>
              <option value="Toldos">Toldos</option>
              <option value="Fachadas">Fachadas</option>
              <option value="Anuncios en Muros de colindancia, interioles o laterales">Anuncios en Muros de colindancia, interioles o laterales</option>
              <option value="Anuncios en mobiliario urbano">Anuncios en mobiliario urbano</option>
              <option value="Anuncios en azotea">Anuncios en azotea</option>
            </select>
          </td>
        </tr>
        <tr style="border: 1px solid black;">
          <td style="border: 1px solid black;">Lote: <?php echo $nodeloteui; ?></td>
          <td style="border: 1px solid black;">Manzana:<?php echo $manzanaui; ?></td>
          <td style="border: 1px solid black;">Superficie total del predio: <?php echo $superficiepredioui; ?> m²</td>
        </tr>
        <tr style="border: 1px solid black;">
          <td style="border: 1px solid black;">PMDUOET:</td>
          <td style="border: 1px solid black;"><input type="text" name="d4" value="AO (Área Ocupada)"></td>
          <td style="border: 1px solid black;" colspan="2"><input type="text" name="d5" value="UGAT:"></td>
        </tr>
        <tr>
          <td style="border: 1px solid black;">Uso:</td>
          <td style="border: 1px solid black;"><input type="text" name="d6" value="Habitacional (Densidad H-)"></td>
          <td style="border: 1px solid black;" colspan="2"><input type="text" name="d7" value="Clave catastral:03948234"></td>
        </tr>
      </table>

      <table>
        <tr>
          <br>
          <td><b>Datos de la Construcción</b></td>
        </tr>
      </table>

      <table style="border: 1px solid black;" width="100%">
        <tr style="border: 1px solid black;">
          <td style="border: 1px solid black;">Destino</td>
          <td colspan="2" style="border: 1px solid black;"><b><input type="text" name="d8" size="50" value="Casa Habitación Unifamiliar Exclusivamente"></b></td>
        </tr>
        <tr>
          <td style="border: 1px solid black;">Superficie Autorizada</td>
          <td style="border: 1px solid black;"><textarea name="d9" rows="8" cols="50">28.46 m2 Planta Baja (losa en área de cochera y ampliación de sala)
28.46 m2 Planta Alta (2 recámaras)
</textarea></td>
          <td style="border: 1px solid black;"><b>Superficie Total Construida <?php echo $superficieconstruidaui; ?> m²</b></td>
        </tr>
        <tr style="border: 1px solid black;">
          <td style="border: 1px solid black;">Niveles Existentes</td>
          <td colspan="2" style="border: 1px solid black;"><input type="text" name="d10" value="Dos (Planta Baja y Planta Alta)" size="40"></td>
        </tr>
        <tr style="border: 1px solid black;">
          <td style="border: 1px solid black;">Perito:</td>
          <td style="border: 1px solid black;"><?php echo $arrayperito[0]->nombre; ?></td>
          <td style="border: 1px solid black;">No. <?php echo $arrayperito[0]->numperito; ?></td>
        </tr>
				<tr>
					<tr style="border: 1px solid black;">
						<td style="border: 1px solid black;">Perito Especializado:</td>
						<td style="border: 1px solid black;"><?php echo $arrayperitoesp[0]->nombre; ?></td>
						<td style="border: 1px solid black;"><?php echo $arrayperitoesp[0]->numregistro; ?></td>
					</tr>
				</tr>
      </table>
      <table>
        <tr>
          <td colspan="3" align="justify">
            <br>
            En atención a su partido arquitectónico, características constructivas, requerimientos funcionales, ambientales y técnicos el permiso autorizado sobre el inmueble en cuestión cumple con los requerimientos mínimos para:
          </td>
        </tr>
        <tr>
          <td align="center"><u><b>CASA HABITACIÓN UNIFAMILIAR EXCLUSIVAMENTE</b></u></td>
        </tr>
        <tr>
          <td align="justify">
            <br>
            1. Cualquier reestructuración, modificación o ampliación posterior deberá solicitar previamente el permiso respectivo.
            <br><br>
            2. A partir de la fecha de expedición de la presente, el propietario se constituye como responsable de la operación y mantenimiento de la edificación a fin de satisfacer sus condiciones de seguridad e higiene.
            <br><br>
            3. Deberá respetar el <b>área para cochera según proyecto</b>, por lo que se autorizará construcción y/o cambio de uso de dicha área, en caso contrario quedará sujeto a lo establecido en los artículos 152 fracción II Inciso d), 157 fracción X y 158 del Reglamento de Construcción para el Municipio de Irapuato, Guanajuato.
            <br><br>
            4. El presente no constituye constancia de apeo y deslinde respecto al inmueble, ni acredita la propiedad o posesión del mismo a favor de solicitante.
          </td>
        </tr>
      </table>

      <table>
        <tr>
          <td><b>Derechos de Expedición</b></td>
        </tr>
      </table>

      <table width="100%">
        <tr style="border: 1px solid black;">
          <th>Concepto</th>
          <th>Uso</th>
          <th>Expedición</th>
        </tr>
        <tr style="border: 1px solid black;">
          <td><input type="text" name="d11"  size="50"value="Autorización para el uso y Ocupación de la Construcción"></td>
          <td><input type="text" name="d12" value="Habitacional H-"></td>
          <td><input type="text" name="d13" value="$234.00"></td>
        </tr>
        <tr style="border: 1px solid black;">
          <td align="right" colspan="2"><b>Total</b></td>
          <td><input type="text" name="d14" value="$234.00"></td>
        </tr>
      </table>
      <table>
        <tr>
          <td align="justify">
            Por último, deberá pagar a la tesorería municipal los derechos correspondientes del presente, de conformidad con lo dispuesto en el artículo 26 de la Ley de Ingresos para el Municipio de Irapuato Guanajuato publicada en el Periódico Oficial del Gobierno del Estado de Guanajuato, número 205 sexta parte, de fecha 23 de diciembre del año 2016; mismas que entraron en vigor a partir del 1° de enero del año 2017 para el ejercicio fiscal año 2017.
            <br>
            <b>
              Lo anterior con fundamento en el artículo 90 fracción I, II, III, IV, y VII del Reglamento Orgánico de la Administración Pública Municipal de Irapuato, Guanajuato, publicado en el Periódico Oficial del Gobierno del Estado de Guanajuato, número 73 Segunda Parte de fecha 06 de mayo del 2016.
            </b>
            <br>
            Sin más por el momento, quedo de Usted.
          </td>
        </tr>
        <tr>
          <td align="center">
            A t e n t a m e n t e
            <br>
            <br>
            <br>
            <br>
            <br>
            <b>Arq. José Alfredo López Padilla</b>
            <br>
            Director General de Desarrollo Territorial
          </td>
        </tr>
        <tr>
          <td>
            Con copia para.-
            <br>
            - Archivo Minutario;<input type="text" name="d15" value=" DGOT/MÓDULO.">
            <br>
            - Se Integra con
            <br>
            Revisó: <input type="text" name="d16" value="A’MELB">
            <br>
            Elaboró: <input type="text" name="d17" value="a’laa">
            <br>
            ZONA
          </td>
        </tr>
      </table>

      <table width="100%">
        <tr>
          <td width="90%">
            <br>
            <br>
            <b>
              DIRECCIÓN GENERAL DE DESARROLLO TERRITORIAL /
              <br>
              DIRECCIÓN DE ADMINISTRACIÓN URBANA
            </b>
            <hr>
            Desarrollo Siglo XXI, Blvd. Solidaridad 8350, Col. Lázaro Cárdenas, C.P. 36540
            <br>
            Tel. 01 (462) 635 88 00 ext. 3204
            <br>
            Irapuato, Gto. México
          </td>
          <td width="10%">
            Hoja 1 de 3
          </td>
        </tr>
      </table>
			<button type="submit" class="col-md-12 btn btn-info">Generar e Imprimir</button>
		</form>
  </body>
</html>
