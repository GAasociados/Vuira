<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Desarrollo Territorial</title>

<link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />  <style type="text/css">
  table{
    /*font: 100% sans-serif;*/
  }
  </style>
</head>
<header>
</header>
<body>
  <form class="" action="<?php echo base_url()."/docstramites/documentoanuncio/documentofinal"; ?>" method="post">
    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
  <table style="width:100%; floar:left;">
    <tr>
      <td>
        <img src="<?php echo base_url()."assets/images/" ?>/iniciodesarrollo.png" alt="" width="100%">
      </td>
    </tr>
  </table>

  <table style="width:100%; floar:left;">
    <tr>
      <td align="right">
        <b>
          Dirección de Administración Urbana
          <br>
          <input type="text" name="d1" size="25" value="DGDT/DAU/DP/01/32366/2017">
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
          <input disabled type="text" name="u1" value="<?php echo $u1; ?>" size="30">
          <br>
          <input type="text" name="representante" value="Representante Legal">
        </b>
        <br>
        <input disabled type="text" name="u2" value="<?php echo $u2; ?>" size="30">
        <br>
        <input disabled type="text" name="u3" value="<?php echo $u3; ?>" size="50">
        <br>
        <b>
          P r e s e n t e
        </b>
      </td>
    </tr>
    <tr>
      <td align="justify">
        <br>
        Habiendo acreditado el cumplimiento de lo establecido con el artículo 92 fracciones IV, VI, VII, IX, XI, XV y XVII del Reglamento Orgánico de la Administración Pública Municipal de Irapuato, Guanajuato, publicado en el Periódico Oficial del Gobierno del Estado de Guanajuato, número 73 Segunda Parte de fecha 6 de Mayo del 2016; los artículos 2 fracción III, 269, 270, 271, 272, 273, 274, 275 y 276 del Código Territorial para el Estado y los Municipios de Guanajuato, publicado en el Periódico Oficial del Gobierno del Estado de Guanajuato, número 154 Segunda Parte de fecha 25 de septiembre del año 2012; así como los artículos 2 fracciones XII, XIX, XXV y XXX, 5 fracción II y VII, 6 fracción I y II, 7 fracción I, 11 fracción I, 21 fracción XIV y 25 del Reglamento de Construcción para el Municipio de Irapuato, Guanajuato, publicado en el Periódico Oficial del Gobierno del Estado de Guanajuato número 38 Segunda Parte de fecha 07 de Marzo del 2014; además de las Normas Complementarias de “Presentación de los Proyectos Ejecutivos para el Proyecto Arquitectónico de Seguridad y Medidas de Protección durante el Proceso Constructivo, para Anuncios y para la Participación de Peritos Corresponsables” del Municipio de Irapuato, Guanajuato, publicadas en el Periódico Oficial del Gobierno del Estado de Guanajuato número 160 Tercera Parte de fecha 06 de Octubre del 2006; se expide el presente Permiso de Anuncios con las características que se detallan a continuación:
        <br>
        <br>
        <b>Datos del Inmueble</b>
      </td>
    </tr>
  </table>

  <table style="width:100%; floar:left; border: 1px solid black;">
    <tr style="border: 1px solid black;">
      <td style="border: 1px solid black;">
        Antecedentes
      </td>
      <td colspan="3" style="border: 1px solid black;">
        <b>Dictamen de Número Oficial:</b><br>
        <input size="50" type="text" name="d2" value="DGOT/DF/NO/03/4880/2011 de fecha 05 de agosto del 2011.">
        <br>

        <b>Condicionantes del Aprovechamiento Inmobiliario:</b><br>
        <input size="50" type="text" name="d3" value="DGOT/DAU/GI/04/5453/2011 de fecha 08 de Agosto del 2011.">
        <br>

        <b>Autorización de Aprovechamiento Ambiental:</b><br>
        <input size="50" type="text" name="d4" value="DGOT/DOA/AAA/1606/2011 de fecha 21 de octubre del 2011.">
        <br>

        <b>Permiso de Edificación Obra Nueva:</b><br>
        <input size="50" type="text" name="d5" value="DGOT/DAU/GU/01/7566/2011 de fecha 18 de noviembre del 2011.">
        <br>

        <b>Autorización de Aprovechamiento Inmobiliario:</b><br>
        <input size="50" type="text" name="d6" value="DGOT/DAU/GI/02/10909/2012 de fecha 27 de julio del 2012.">
        <br>

        <b>Licencia de Difusión de Publicidad:</b><br>
        <input size="50" type="text" name="d7" value="DGOT/DAU/DP/01/12612/2012 de fecha 10 de agosto del 2012.">
        <br>

        <b>Refrendo Licencia de Difusión de Publicidad:</b><br>
        <input size="50" type="text" name="d8" value="DGOT/DAU/DP/02/11772/2013 de fecha 01 de agosto del 2013.">
        <br>

        <b>Permiso de Uso de Suelo:</b><br>
        <input size="50" type="text" name="d9" value="DGDT/DAU/GI/02/22497/2016 de fecha 23 de Diciembre del 2016.">
        <br>
      </td>
    </tr style="border: 1px solid black;">
    <tr style="border: 1px solid black;">
      <td style="border: 1px solid black;">
        Ubicación
        <select class="" name="op1">
          <option value="Bardas">Bardas</option>
          <option value="Anuncios en Tapiales">Anuncios en Tapiales</option>
          <option value="Vidrieras">Vidrieras</option>
          <option value="Escaparates">Escaparates</option>
          <option value="Cortinas Metálicas">Cortinas Metálicas</option>
          <option value="Marquesinas">Marquesinas</option>
          <option value="Toldos">Toldos</option>
          <option value="Fachadas">Fachadas</option>
          <option value="Anuncios en Muros de colindancia, interiores o laterales">Anuncios en Muros de colindancia, interiores o laterales</option>
          <option value="Anuncios en mobiliario urbano">Anuncios en mobiliario urbano</option>
          <option value="Anuncios en azotea">Anuncios en azotea</option>
        </select>
      </td>
      <td colspan="3" style="border: 1px solid black;">
        <input disabled type="text" name="u4" value="<?php echo $u4; ?>" size="30">
      </td>
    </tr>
    <tr style="border: 1px solid black;">
      <td style="border: 1px solid black;">PMDUOET</td>
      <td style="border: 1px solid black;"><input type="text" name="d10" value="Habitacional"></td>
      <td style="border: 1px solid black;">AGAT <input type="text" name="d11" value="1159"></td>
      <td style="border: 1px solid black;">Superficie del Predio:         <input disabled type="text" name="u5" value="<?php echo $u5; ?>" size="30"> m²</td>
    </tr>
    <tr style="border: 1px solid black;">
      <td style="border: 1px solid black;">Uso:</td>
      <td style="border: 1px solid black;"><input type="text" name="d12" value="Comercio"></td>
      <td style="border: 1px solid black;" colspan="2">Clave Catastral: <input type="text" name="d13" value="8457948394749"></td>
    </tr>
  </table>

  <table width="100%">
    <tr>
      <td width="70%">
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
      <td width="30%">
        Hoja 1 de 3
      </td>
    </tr>
  </table>

  <table>
    <tr>
      <td>
        <br><br><b>DATOS DEL ANUNCIO</b>
      </td>
    </tr>
  </table>

  <table style="border: 1px solid black;" width="100%">
    <tr style="border: 1px solid black;">
      <td rowspan="4" style="border: 1px solid black;">
        Clasificación de los Anuncios
      </td>
      <td style="border: 1px solid black;">Pos su duración:</td>
      <td style="border: 1px solid black;">
        <select class="" name="d14">
          <option value="Anuncios Eventuales">Anuncios Eventuales</option>
          <option value="Anuncios Temporales">Anuncios Temporales</option>
          <option value="Anuncios Permanentes">Anuncios Permanentes</option>
        </select>
      </td>
    </tr>
    <tr>
      <td style="border: 1px solid black;">Pos su contenido:</td>
      <td style="border: 1px solid black;">
        <select class="" name="d15">
          <option value="Anuncios Denominativos">Anuncios Denominativos</option>
          <option value="Anuncios de Propaganda">Anuncios de Propaganda</option>
          <option value="Anuncios Mixtos">Anuncios Mixtos</option>
        </select>
      </td>
    </tr>
    <tr style="border: 1px solid black;">
      <td>Características de Montaje: </td>
      <td style="border: 1px solid black;">
        <select class="" name="d16">
          <option value="M1 - Anuncios Adosados">M1 - Anuncios Adosados</option>
          <option value="M2 - Anuncios Integrados">M2 - Anuncios Integrados</option>
          <option value="M3 - Anuncios de Caracteres Aislado">M3 - Anuncios de Caracteres Aislado</option>
          <option value="M4 - Anuncios Soportados">M4 - Anuncios Soportados</option>
          <option value="M5 - Anuncios en volados, salientes o colgantes">M5 - Anuncios en volados, salientes o colgantes</option>
          <option value="M6 - Anuncios en objetos inflables">M6 - Anuncios en objetos inflables</option>
          <option value="M7 - Anuncios Aerostáticos">M7 - Anuncios Aerostáticos</option>
          <option value="M8 - Anuncios Eólicos">M8 - Anuncios Eólicos</option>
        </select>
        <br>
        <select class="" name="d17" title="Seleccione solo si es necesario">
          <option value=" " title="Seleccione solo si es necesario">Opción Dos</option>
          <option value="M1 - Anuncios Adosados">M1 - Anuncios Adosados</option>
          <option value="M2 - Anuncios Integrados">M2 - Anuncios Integrados</option>
          <option value="M3 - Anuncios de Caracteres Aislado">M3 - Anuncios de Caracteres Aislado</option>
          <option value="M4 - Anuncios Soportados">M4 - Anuncios Soportados</option>
          <option value="M5 - Anuncios en volados, salientes o colgantes">M5 - Anuncios en volados, salientes o colgantes</option>
          <option value="M6 - Anuncios en objetos inflables">M6 - Anuncios en objetos inflables</option>
          <option value="M7 - Anuncios Aerostáticos">M7 - Anuncios Aerostáticos</option>
          <option value="M8 - Anuncios Eólicos">M8 - Anuncios Eólicos</option>
        </select>
      </td>
    </tr>
    <tr style="border: 1px solid black;">
      <td style="border: 1px solid black;">Constitución:</td>
      <td style="border: 1px solid black;">
        <select class="" name="d18">
          <option value="C1 - Anuncios Pintados">C1 - Anuncios Pintados</option>
          <option value="C2 - Anuncios Adheribles">C2 - Anuncios Adheribles</option>
          <option value="C3 - Anuncios Impresos">C3 - Anuncios Impresos</option>
          <option value="C4 - Anuncios de Proyección Óptica">C4 - Anuncios de Proyección Óptica</option>
          <option value="C5 - Anuncios Electrónicos">C5 - Anuncios Electrónicos</option>
          <option value="C6 - Anuncios Luminosos">C6 - Anuncios Luminosos</option>
          <option value="C7 - Anuncios Iluminados">C7 - Anuncios Iluminados</option>
          <option value="C8 - Anuncios Sonoros">C8 - Anuncios Sonoros</option>
        </select>
      </td>
    </tr>
    <tr style="border: 1px solid black;">
      <td rowspan="6" style="border: 1px solid black;">Datos del Anuncio</td>
      <td style="border: 1px solid black;">Altura máxima de la Estructura (Poste):</td>
      <td style="border: 1px solid black;"><input type="text" name="d19" value="13.50 mts desde nivel de calle" size="50"></td>
    </tr>
    <tr style="border: 1px solid black;">
      <td style="border: 1px solid black;">Número de las Carteleras:</td>
      <td style="border: 1px solid black;"><input type="text" name="d20" value="Seis (6)"></td>
    </tr>

    <tr style="border: 1px solid black;">
      <td style="border: 1px solid black;">Dimensiones de las Carteleras:</td>
      <td style="border: 1px solid black;"><textarea name="d21" rows="2" cols="72">“A” = 9.62 m2 x 2 = 19.24 m2<br>Orientación: 1.75 m2 x 2 = 3.50 m2<br>Teléfono= 1.75 m2 x 2 = 3.50 m2</textarea></td>
      </tr>

      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Referente a:</td>
        <td style="border: 1px solid black;"><input type="text" name="d22" value="Farmacia del Ahorro"></td>
      </tr>

      <tr style="border: 1px solid black;">
        <td colspan="2" style="border: 1px solid black;">
          <textarea name="d23" rows="1" cols="100">Póliza: STDN-070-1011839-0 BANORTE SEGUROS vigente al 31 de Diciembre de 2017</textarea>
        </td>
      </tr>

      <tr style="border: 1px solid black;">
        <td colspan="2" style="border: 1px solid black;">
          <textarea name="d24" rows="8" cols="100">
            ANUNCIOS ADOSADOS DENOMINATIVOS (4 CARTELERAS)
            Dimensión “A”
            2.50 x 0.25 m
            Dimensión “Farmacias del Ahorro”
            9.30 x 1.40 m
            Dimensión “Farmacias del Ahorro”
            4.90 x 1.40 m
            Dimensión “Farmacias del Ahorro”
            8.10 x 1.40 m
            Barners (4 pzas)
            (2.50 x 0.75 m) x 4 = 7.50 m2
            Barners (2 pzas)
            (3.00 x 0.75 m) x 2 = 4.50 m2
            Gabinete Orientación:
            2.50 x 0.60 m = 1.50 m2
          </textarea>
        </td>
      </tr>

      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Vigencia</td>
        <td colspan="2" style="border: 1px solid black;"><input type="text" name="d25" value="365 días al 12 de junio del 2018" size="50"></td>
      </tr>

      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Perito Responsable Especializado en Diseño Estructural:</td>
        <td style="border: 1px solid black;" align="center"><?php echo $u6; ?></td>
        <td style="border: 1px solid black;" align="center">No. <?php echo $u7; ?></td>
      </tr>
    </table>
    <br><br>
    <table>
      <tr><b>Disposiciones Generales:</b></tr>
      <tr>
        <td align="justify">
          <br>
          <u>1. El presente permiso quedará sin efecto al momento en que cambie de titular, cualquier modificación o ampliación posterior de la sección o contenido de publicidad autorizada, deberá ser solicitada previamente.</u>
          <br><br>
          <b>
            2. Deberá presentar la renovación de la Póliza de Seguro presentada por la fecha restante de la vigencia del presente permiso.
            <br><br>
            <u>3. Deberá hacer constar, en el anuncio de manera visible, el número de permiso otorgado para su instalación y el periodo de vigencia de la misma.</u>
          </b>
          <br><br>
          4. Cualquier modificación de los trabajos aprobados requerirá Autorización previa de esta Dirección, a fin de verificar que cumpla con los Ordenamientos Urbanos Aplicables.
          <br><br>
          5. Deberá realizar las actividades de mantenimiento necesarias para mantener en adecuadas condiciones de seguridad y en buen estado de conservación y operación, debidamente validadas por el Perito Responsable Especializado en Diseño Estructural, el cual deberá estar actualizado ante esta Dirección.
          <br><br>
          <b>6. Al concluir la vigencia del Permiso otorgado, deberá realizar el refrendo del mismo anexando anualmente la Bitácora de Mantenimiento con fotografías, avalado por un Perito Responsable Especializado en Diseño Estructural, el cual deberá estar actualizado ante esta Dirección.</b>
          <br><br>
          7. El municipio podrá hacer efectivo el seguro otorgado en su favor, para los efectos de sufragar los gastos inherentes a la corrección de las anomalías resultantes, cuando la empresa o persona física arrendadora del anuncio, incumpla o infrinja alguno de los lineamientos contenidos en las presentes Normas, previo el apercibimiento que se le haga y plazo que se le otorgue al incumplido o infractor para su debido cumplimiento.
          <br><br>
          8. Para todos los tipos de anuncios la distancia mínima que debe guardarse entre cualquier elemento integrante del anuncio con el cableado de la Comisión Federal de Electricidad, será de 3.00 metros como mínimo.
          <br><br>
          9. El sistema de iluminación deberá tener un reductor que disminuya su luminosidad de las 19.00 a las 06:00 horas, del día siguiente.
          <br><br>
          10. Las fuentes luminosas no deberán rebasar los 75 luxes.
          <br><br>
          <b>
          11. El presente no constituye constancia de apeo y deslinde respecto al inmueble, ni acredita la propiedad o posesión del mismo a favor de solicitante.
          <br><br>
          12. El Inmueble estará sujeto a la supervisión de la Autoridad Municipal para efectos de su verificación y cumplimiento de lo descrito con anterioridad.
          </b>
        </td>
      </tr>
    </table>

    <table>
      <tr>
        <td>
          <br><br><b>DERECHOS DE EXPEDICIÓN</b>
        </td>
      </tr>
    </table>
    <table style="border: 1px solid black;" width="100%">
      <tr>
        <th>Concepto</th>
        <th>Tarifa</th>
        <th>Superficie</th>
        <th>Total</th>
      </tr>

      <tr>
        <td><input type="text" name="d26" value="Constancia de Validación de Anuncios"></td>
        <td><input type="text" name="d27" value="$227.73 x"></td>
        <td><input type="text" name="d28" value="1.00 pza"></td>
        <td><input type="text" name="d29" value="$227.73"></td>
      </tr>

      <tr>
        <td><input type="text" name="d30" value="Permiso Anual para la colocación de anuncios iluminados"></td>
        <td><input type="text" name="d31" value="$225.06 x"></td>
        <td><input type="text" name="d32" value="39.74 m2"></td>
        <td><input type="text" name="d33" value="$8,943.88"></td>
      </tr>

      <tr>
        <td colspan="3" align="right"><b>TOTAL</b></td>
        <td><input type="text" name="d34" value="$9,171.61"></td>
      </tr>
    </table>

    <table>
      <tr>
        <td align="justify">
          Por último, deberá pagar a la tesorería municipal los derechos correspondientes del presente, de conformidad con lo dispuesto en el artículo 29 fracción I inciso d) y e) de la Ley de Ingresos para el Municipio de Irapuato Guanajuato publicada en el Periódico Oficial del Gobierno del Estado de Guanajuato, número 205 sexta parte, de fecha 23 de diciembre del año 2016; mismas que entraron en vigor a partir del 1° de enero del año 2017 para el ejercicio fiscal año 2017.
          <br><br>Lo anterior con fundamento en el artículo 90 fracción I, II, III, IV, y VII del Reglamento Orgánico de la Administración Pública Municipal de Irapuato, Guanajuato, publicado en el Periódico Oficial del Gobierno del Estado de Guanajuato, número 73 Segunda Parte de fecha 06 de mayo del 2016.
          <br><br>Sin más por el momento, quedo de Usted.
        </td>
      </tr>
      <tr>
        <br>
        <td align="center">
          <br>
          A t e n t a m e n t e
        </td>
      </tr>

      <tr>
        <td><br><br><br><br></td>
      </tr>

      <tr>
        <td align="center">
          Arq. José Alfredo López Padilla
          <br>
          Director General de Desarrollo Territorial
        </td>
      </tr>
    </table>
    <table>
      <tr>
        <td>
          Con copia para-
          <br>
          -Archivo Minutario; <input type="text" name="d35" value="DGOT/MÓDULO. –Integrar con DGDT/DAU/GI/02/22497/2016." size="50">
          <br>
          -Se integra con <input type="text" name="d36" value="DGOT/DAU/DP/02/31080/2017." size="50">
          <br>
          Revisó: <input type="text" name="d37" value="A’MELB" size="50">
          <br>
          Elaboró:<input type="text" name="d38" value="a’laa" size="50">
          <br>
          Zona Norponiente
        </td>
      </tr>
    </table>
    <table width="100%">
      <tr>
        <td width="70%">
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
        <td width="30%">
          Hoja 3 de 3
        </td>
      </tr>
    </table>

    <button type="submit" name="button" class="btn btn-info col-md-12"><b>Generar e Imprimir</b></button>
    </form>
    <footer>
    </footer>
  </body>
  </html>
