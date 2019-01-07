rowSelected = "";
rowSelectedContent="";
var id_bd = 0;
var contador = 0;
var numero_cuentas = 0;
//se utiliza en ventanilla y auxiliae
var cuentas_asignadas = [];
//se utiliza en ventanilla
var numeros_asignados = 0;


function event_cancelar_tramite()
{
  new view_claves_fraccionamiento().redirigir_inicio_tramite();
}

function event_load_ventanilla()
{
  var objVista=new view_claves_fraccionamiento();
  var id = $("#id").val();
  if ( id !== "")
  {

    objVista.load_data_fraccionamientos( $("#id").val() );
    objVista.load_data_fraccionamientos_detalles( $("#id").val() );
  }
  else
  {
    console.log("SE INICIA UN NUEVO FRACCIONAMIENTO");
  }

  //sirve para tomar el nombre del archivo cargado y coloca su nombre en el label
  $(".custom-file-input").change(function(event){
    var padre = $(this).parent()
    var archivos = $(this).get(0).files;
    var label = padre.children( ".custom-file-label" );
    label.text( archivos[0]["name"] );
  });

  //valida el boton guardar
  event_submit_ventanilla();
  //evento para generar el talon
  event_imprimirTalon_click();

  if(objVista.isImprimirTalon())
    event_imiprimirTalon();

}

function event_submit_ventanilla()
{
    $( "#formVentanilla" ).submit(function( event ) {
      event.preventDefault();
      if ( cuentas_asignadas.length >= 1)
      {
        document.forms['formVentanilla'].submit();
      }
      else
      {
        mensajeError('Debe Agregar Al Menos Una Cuenta Predial');
      }
    });
}

function event_mostrar_modal_pago(event)
{
  $("#modalPago").modal("show");
  $("#numeroClaves").val(1);
}

function event_mostrar_modal_pago_cuentas()
{
  $("#modalPago").modal("show");
  $("#numeroClaves").val(cuentas_asignadas.length);
}

function generar_talon_pago(event)
{
  //window.open("../../PDFGen/pdfGenTalonPago.php?Propietario="+$("#Propietario").val()+"&cantidadClaves="+cuentas_asignadas.length+"&data="+cuentas_asignadas,"_blank");
  //$("#modalPago").modal("hide");
  console.log($("#id").val());
  var jsonData = JSON.stringify(cuentas_asignadas);
  $.ajax({
    type:"post",
    url:"../../PDFGen/pdfGenTalonPago.php",
    data:{idFracc:$("#id").val(),data:jsonData,nombre:$("#Propietario").val(),cantidadClaves:cuentas_asignadas.length,},
    async:true,
    success: function (jdata)
    {
      window.open("../../PDFGen/TalonPago.pdf", "_blank");
    }
  });
}

function event_imiprimirTalon()
{
    $('#talonModal').modal('show');
}

function event_imprimirTalon_click()
{
  $("#imprimirTalon").click( function()
  {
    fraccionamiento= new view_claves_fraccionamiento()
    if(fraccionamiento.isUpdate())
      fraccionamiento.init_fraccionamientoFolios(numero_cuentas);
  });
}


function event_add_cuenta_predial()
{
  if ( $("#txtCuentaPredial").val() != "" )
  {
    var objVista = new view_claves_fraccionamiento();
    objVista.get_predial($("#txtCuentaPredial").val());
  }
  else
  {
    alert("Debes ingresar una cuenta predial");
  }
}

function event_get_croquis(event)
{
  var form = $("#form");
  var data = new FormData(form);
  data.append('croquis',event.target.files[0]);
  for (var p of data) {
  console.log(p);
  }
  new view_claves_fraccionamiento().save_croquis(data);
}

function event_pulsar_enter(event)
{
  if (event.keyCode == 13)
  {
    event.preventDefault();
    console.log("SE HA PRESIONADO ENTER");
    event_add_cuenta_predial($("#txtCuentaPredial").val());
  }
}

function event_update_manzana(inputName)
{
  if (event.keyCode == 13)
  {
    event.preventDefault();
    if ( inputName.value != "")
    {
      console.log( inputName.name );
      new view_claves_fraccionamiento().update_manzana(inputName.name, inputName.value);
    }
    else
    {
      alert("DEBE INGRESAR INFORMACION");
    }
  }
}

function event_update_lote(inputName)
{
  if (event.keyCode == 13)
  {
    event.preventDefault();
    if ( inputName.value != "")
    {
      console.log( inputName.name );
      new view_claves_fraccionamiento().update_lote(inputName.name, inputName.value);
    }
    else
    {
      alert("DEBE INGRESAR INFORMACION");
    }
  }
}


function event_remove_clave(buttonName)
{
  console.log(buttonName.name);
  $("#"+buttonName.name).remove();
  var objVista=new view_claves_fraccionamiento();
  objVista.delete_fraccionamientos_detalles( $("#id").val(), buttonName.name );
}

function event_load_auxiliar()
{
  $("#tipo_de_tramite").val("2").change();
  var objVista=new view_claves_fraccionamiento();
  objVista.get_data_clave($("#id").val());
  objVista.get_data_asignaciones( $("#id").val(), $("#uid").val());

  $( "#form" ).submit(function( event ) {
    event.preventDefault();
    objVista.update_status_fraccionamientos( $("#id").val() );
  });
}


function event_select_entry(buttonName)
{

  id_bd = $("#clave_ind_"+buttonName.name).val();
  console.log(id_bd);
	var objVista =new view_claves_fraccionamiento();
	objVista.cancelar_claveGen();
	rowSelected = buttonName.name;
	objVista.setup_for_claveGen($("#"+buttonName.name));
  if(id_bd != "0")
    objVista.get_data_inmueble_auxiliar(id_bd, buttonName.name);
}

function event_cancelar_selection()
{
	new view_claves_fraccionamiento().cancelar_claveGen();
}

function event_generar_clave(buttonName)
{
  if ( $("#claveCat").val() != "" && $("#caracter").val() != "" && $("#superficie").val() != ""
    && $("#escritura").val() != "" && $("#notario_publico").val() != "" && $("#numero_notario_publico").val() != ""
    && $("#numero_notario_publico").val() != "" && $("#fecha_escritura").val() != ""
    && $("#numero_oficio").val() != "" && $("#estado_escitura").val() != "" && $("#ciudad_escritura").val() != "")
  {
    new view_claves_fraccionamiento().setup_generate_clave();
  }
  else
  {
    alert("Se deben llenar todos los campos");
  }
}

function uploadFile()
{
          if($("#autocat").val() != "")
          {
            var file_data = $('#autocat').prop('files')[0];
            var form_data = new FormData();

            form_data.append('file', file_data);

            $.ajax({
              url: 'https://vuira.irapuato.gob.mx//DocPrint/uploadFile.php', // point to server-side PHP script
              dataType: 'text', // what to expect back from the PHP script, if anything
              cache: false,
              contentType: false,
              processData: false,
              data: form_data,
              type: 'post',
              success: function(data){
              // get server responce here
              alert(data);
              // clear file field
              var filename = $('#autocat').val().replace(/C:\\fakepath\\/i, '')
              $("#Croquis_URL").val("assets/tramites/clavescatastralesindividual/croquis/"+filename);
            }
          });
        }
        else
        {
            alert("Please select file!");
        }
  }

  function uploadCadFile()
  {
    if($("#archivoAutoCad").val() != "")
    {
      var file_data = $('#archivoAutoCad').prop('files')[0];
      var form_data = new FormData();

      form_data.append('file', file_data);
      $.ajax({
        url: 'https://vuira.irapuato.gob.mx//DocPrint/uploadCadFile.php', // point to server-side PHP script
        dataType: 'text', // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(data){
        // get server responce here
        alert(data);
        // clear file field
        var filename = $('#autocat').val().replace(/C:\\fakepath\\/i, '')
        $("#Croquis_URL").val("assets/tramites/clavescatastralesindividual/croquis/"+filename);
        }
      });
    }
    else
    {
      alert("Please select file!");
    }
  }

class view_claves_fraccionamiento
{
  //se define una propiedad estatico para que las demas instancia compartan su valor
  constructor()
  {
      //this.basePath = "https://vuira.irapuato.gob.mx/";
      //this.basePath = "https://"+window.location.hostname+"/";
      this.basePath = "http://localhost/Vuira/";
  }

  isUpdate()
  {
    if($("#id").val()!="")
      return true;
    return false;
  }

  isImprimirTalon()
  {
    if($("#operation").val()=="ImprimirTalon")
      return true;
    return false;
  }

  get_predial(predialNum)
  {
    $.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/Ser/predial_Querry.php",
      data:{predial:predialNum},
      async:true,
      success: function (jdata)
      {
        console.log(jdata);
        if(jdata != "Error")
        {
          var data = JSON.parse(jdata);
          var obj = new view_claves_fraccionamiento();
          var result = obj.isUpdate();
          cuentas_asignadas.push(predialNum);
          if ( !result )
          {
            new view_claves_fraccionamiento().set_nombre_propietario(data);
            new view_claves_fraccionamiento().set_to_grid(data);
          }
          else
          {
            new view_claves_fraccionamiento().insertar_cuenta_predial_detalles(data);
          }
          console.log(data);
        }
        else
        {
            alert (jdata);
        }
      }
    });
  }

  get_data_asignaciones(id,uid)
  {
    $.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_det.php?service_name=byiddet",
      data:{id:id,uid:uid},
      async:true,
      success: function (jdata)
      {
        console.log(jdata);
        if(jdata != "Error")
        {
          var data = JSON.parse(jdata);
          cuentas_asignadas = data;
          new view_claves_fraccionamiento().set_data_grid_aux(data);
          console.log(data);
        }
        else
        {
            alert (jdata);
        }
      }
    });
  }

  get_data_clave(id)
  {
    $.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_core.php?service_name=byidcore",
      data:{id:id},
      async:true,
      success: function (jdata)
      {
        console.log(jdata);
        if(jdata != "Error")
        {
          var data = JSON.parse(jdata);
          new view_claves_fraccionamiento().set_data_auxiliar(data[0]);
        }
        else
        {
            alert (jdata);
        }
      }
    });
  }

  get_data_details(id,uid)
  {
    $.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_det.php?service_name=byiddet",
      data:{id:id,uid:uid},
      async:true,
      success: function (jdata)
      {
        console.log(jdata);
        if(jdata != "Error")
        {
          var data = JSON.parse(jdata);
          new view_claves_fraccionamiento().set_data_grid_aux(data);
        }
        else
        {
            alert (jdata);
        }
      }
    });
  }

  get_data_inmueble_auxiliar(id, cuenta_predial)
  {
    console.log(cuenta_predial);
    $.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_det.php?service_name=getinfodocumentos",
      data:{id:id,cuenta_predial:cuenta_predial},
      async:true,
      success: function (jdata)
      {
        console.log(jdata);
        if(jdata != "Error")
        {
          var data = JSON.parse(jdata);
          new view_claves_fraccionamiento().set_data_seleccion_auxiliar(data);
        }
        else
        {
            alert (jdata);
        }
      }
    });
  }

  set_data_seleccion_auxiliar(data)
  {
    $("#claveCat").val( data[0]["Clave_Catastral"] );
    $("#caracter").val( data[0]["Caracter"] );
    $("#superficie").val( data[0]["Superficie"] );
    $("#escritura").val( data[0]["Numero_Escritura"] );
    $("#notario_publico").val( data[0]["Nombre_Notario"] );
    $("#numero_notario_publico").val(  data[0]["Numero_Notario"] );
    if(data[0]["Fecha_Escritura"]!="")
    {
      var parts = data[0]["Fecha_Escritura"].split('-')
      if(parts[2].length ==4)
        $("#fecha_escritura").val(parts[2]+"-"+parts[1]+"-"+parts[0] ) ;
      else
        $("#fecha_escritura").val(data[0]["Fecha_Escritura"]);
    }
    $("#numero_oficio").val( data[0]["ID_Numero_Oficio"] );
    $("#estado_escitura").val( data[0]["Es_Estado_Escritura"] );
    $("#ciudad_escritura").val( data[0]["Es_Ciudad_Escritura"] );
    $("#Croquis_URL").val( data[0]["Croquis_URL"] );
  }

  set_to_grid(data)
  {
     var innerTableContent = "<tr id='"+data.CUENTA_PREDIAL+"'>";
     innerTableContent += "<td name='"+data.CUENTA_PREDIAL+"'>"+ data.CUENTA_PREDIAL;
     innerTableContent += "<input type='hidden' name='S1_C_"+data.CUENTA_PREDIAL+"' value='"+data.CUENTA_PREDIAL+"' ></td>";
     innerTableContent += "<td name='"+data.NOMBRE_CALLE+"'>"+ data.NOMBRE_CALLE+
          "<input type='hidden' name='S1_CC_"+data.CUENTA_PREDIAL+"' value='"+data.NOMBRE_CALLE+"' ></td>";
      //MANZANA
     innerTableContent += "<td name='"+data.CUENTA_PREDIAL+"LOTE"+"'>"+
          "<input type='text' name='S1_MZ_"+data.CUENTA_PREDIAL+"' value='' onkeypress='event_update_manzana(this)'></td>";
     //LOTE
     innerTableContent += "<td name='"+data.CUENTA_PREDIAL+"LOTE"+"'>"+
          "<input type='text' name='S1_LT_"+data.CUENTA_PREDIAL+"' value='' onkeypress='event_update_lote(this)'></td>";

     innerTableContent += "<td name='"+data.NO_EXTERIOR+"'>"+ data.NO_EXTERIOR+
          "<input type='hidden' name='S1_NE_"+data.CUENTA_PREDIAL+"' value='"+data.NO_EXTERIOR+"' ></td>";
     innerTableContent += "<td name='"+data.NO_INTERIOR+"'>"+ data.NO_INTERIOR+
          "<input type='hidden' name='S1_NI_"+data.CUENTA_PREDIAL+"' value='"+data.NO_INTERIOR+"' ></td>";
     innerTableContent += "<td name='"+data.NOMBRE_COLONIA+"'>"+ data.NOMBRE_COLONIA+
          "<input type='hidden' name='S1_CCC_"+data.CUENTA_PREDIAL+"' value='"+data.NOMBRE_COLONIA+"' ></td>";
     innerTableContent += "<td><button type='button' class='btn btn-danger' name='"+data.CUENTA_PREDIAL+"' value='borrar' onclick='event_remove_clave(this)'>Borrar</button></td>";
     innerTableContent += "</tr>";
     $("#tblinmubles").append(innerTableContent);

     //limpia la caja de texto de la cuenta predial
     $("#txtCuentaPredial").val("");
  }

  load_detallesFraccionamiento(data)
  {
     var innerTableContent = "<tr id='"+data.Cuenta_Predial+"'>";
     innerTableContent += "<td name='"+data.Cuenta_Predial+"'>"+ data.Cuenta_Predial;
     innerTableContent += "<input type='hidden' name='S1_C_"+data.Cuenta_Predial+"' value='"+data.Cuenta_Predial+"' ></td>";
     innerTableContent += "<td name='"+data.Calle+"'>"+ data.Calle+
          "<input type='hidden' name='S1_CC_"+data.Cuenta_Predial+"' value='"+data.Calle+"' ></td>";
      //MANZANA
     innerTableContent += "<td name='"+data.Cuenta_Predial+"MZ"+"'>"+
          "<input type='text' name='S1_MZ_"+data.Cuenta_Predial+"' value='"+data.Lote+"' onkeypress='event_update_manzana(this)'></td>";
     //LOTE
     innerTableContent += "<td name='"+data.Cuenta_Predial+"LOTE"+"'>"+
          "<input type='text' name='S1_LT_"+data.Cuenta_Predial+"' value='"+data.Manzana+"' onkeypress='event_update_lote(this)'></td>";

     innerTableContent += "<td name='"+data.Numero_Ext+"'>"+ data.Numero_Ext+
          "<input type='hidden' name='S1_NE_"+data.Cuenta_Predial+"' value='"+data.Numero_Ext+"' ></td>";
     innerTableContent += "<td name='"+data.Numero_Int+"'>"+ data.Numero_Int+
          "<input type='hidden' name='S1_NI_"+data.Cuenta_Predial+"' value='"+data.Numero_Int+"' ></td>";
     innerTableContent += "<td name='"+data.Colonia+"'>"+ data.Colonia+
          "<input type='hidden' name='S1_CCC_"+data.Cuenta_Predial+"' value='"+data.Colonia+"' ></td>";
     innerTableContent += "<td><button type='button' class='btn btn-danger' name='"+data.Cuenta_Predial+"' value='borrar' onclick='event_remove_clave(this)'>Borrar</button></td>";
     innerTableContent += "</tr>";
     $("#tblinmubles").append(innerTableContent);

     //limpia la caja de texto de la cuenta predial
     $("#txtCuentaPredial").val("");
  }


  set_data_auxiliar(data)
  {
    for(var field in data)
    {
      if($("#"+field)!= null)
      {
        if($("#"+field).is("input"))
          $("#"+field).val(data[field]);
        else if($("#"+field).is("a")){
          if(data[field]!="")
            $("#"+field).attr("href", "https://vuira.irapuato.gob.mx/assets/tramites/clavescatastralesfraccionamiento/"+ data[field]);
          }
        else if($("#"+field).is("select"))
          $("#"+field).val(data[field]);
      }
    }
    //se agregó por que al parecer es el unico campo que no establece su valor

  }

  set_data_grid_aux(data)
  {
     var innerTableContent ="";

	 for(var i=0; i< data.length;i++)
	 {
		 innerTableContent+="<tr id='"+data[i].Cuenta_Predial+"'>"
		 for (var element in data[i])
		 {
			 if(element != "Id_Fraccionamientos" && element!= "Id_Clave")
			 {
				innerTableContent += "<td>"+ data[i][element]+
					"<input type='hidden' name='S1_"+data[i].Cuenta_Predial+"' value='"+data[i][element]+"' ></td>";
			 }
       else if(element == "Id_Clave")
       {
         innerTableContent += "<input type='hidden' id='clave_ind_"+data[i].Cuenta_Predial+"' name='id_clave_ind' value='"+data[i][element]+"' >"
       }
		 }
		 innerTableContent += "<td><input type='button' class='btn btn-info' name='"+data[i].Cuenta_Predial+"' value='Seleccionar' onclick='event_select_entry(this)'></td>";
		 innerTableContent += "</tr>";
	 }
     $("#tblinmubles").append(innerTableContent);
  }

  setup_for_claveGen(tblRow)
  {
  	rowSelectedContent = tblRow.html();
    var hidden= tblRow.find(":hidden");
    var tmpHidden = "";
    var cuentaPredial = tblRow.name;

    tmpHidden+= "<input type='hidden' id='Cuenta_Predial' value='"+hidden[0].value+"' />";
    tmpHidden+= "<input type='hidden' id='Calle' value='"+hidden[1].value+"' />";
    tmpHidden+= "<input type='hidden' id='Manzana' value='"+hidden[2].value+"' />";
    tmpHidden+= "<input type='hidden' id='Lote' value='"+hidden[3].value+"' />";
    tmpHidden+= "<input type='hidden' id='Num_Ext' value='"+hidden[4].value+"' />";
    tmpHidden+= "<input type='hidden' id='Num_Int' value='"+hidden[5].value+"' />";
    tmpHidden+= "<input type='hidden' id='Colonia' value='"+hidden[6].value+"' />";
    tmpHidden+= "<input type='hidden' id='Id_clave' value='"+hidden[7].value+"' />";

  	var innerTableContent = "<td colspan='7' ><div class='container-fluid'>";
    innerTableContent += "<div style='display: none;'>"+tmpHidden+"</div>";
    innerTableContent += "<div class='form-row'>";
  	innerTableContent += "<div class='form-group col-md-4 col'><label for='claveCat' class='control-label'>Clave Catastral *</label> <input type='text'id='claveCat' class='form-control'> </div>";
  	innerTableContent += "<div class='form-group col-md-4 col'><label for='propietario' class='control-label'>Nombre del propietario *</label> <input type='text' id='propietario' class='form-control'></div>";
  	innerTableContent += "<div class='form-group col-md-4 col'><label for='caracter'class='control-label'>En Su Caracter * </label><input type='text' id='caracter' class='form-control'></div>";
    innerTableContent += "</div>";
    innerTableContent += "<div class='form-row'>";
  	innerTableContent += "<div class='form-group col-md-4 col'><label for='superficie' class='control-label'> Superficie del terreno * <input type='text' id='superficie' class='form-control'></div>";
  	innerTableContent += "<div class='form-group col-md-4 col'><label for='escritura' class='control-label'> Número de Escritura * <input type='text' id='escritura' class='form-control'></div>";
  	innerTableContent += "<div class='form-group col-md-4 col'><label for='notario_publico' class='control-label'> Nombre del notario público * <input type='text' id='notario_publico' class='form-control'></div>";
    innerTableContent += "</div>";
    innerTableContent += "<div class='form-row'>";
  	innerTableContent += "<div class='form-group col-md-4 col'><label for='numero_notario_publico'class='control-label'> Número de notario público * <input type='text' id='numero_notario_publico' class='form-control'></div>";
  	innerTableContent += "<div class='form-group col-md-4 col'><label for='fecha_escritura' class='control-label'> Fecha de Escrituras * <input type='date' id='fecha_escritura' class='form-control'></div>";
  	innerTableContent += "<div class='form-group col-md-4 col'><label for='numero_oficio' class='control-label'> Número de Oficio * <input type='text' id='numero_oficio' class='form-control'></div>";
    innerTableContent += "</div>";
    innerTableContent += "<div class='form-row'>";
  	innerTableContent += "<div class='form-group col-md-4 col'><label for='estado_escritura' class='control-label'>Entidad Federativa *</label> <input type='text' id='estado_escitura' class='form-control'></div>";
  	innerTableContent += "<div class='form-group col-md-4 col'><label for='ciudad_escritura' class='control-label'>Ciudad de Escritura *</label> <input type='text' id='ciudad_escritura' class='form-control'></div>";
    innerTableContent += "</div>";
  	innerTableContent += "</td>";
    innerTableContent += "<td>";
    innerTableContent += "<div class='form-row'>";
    innerTableContent += "<div class='form-group col-md-6 col'><input type='button' name='"+hidden[0].value+"' class='btn btn-success' value='Orden de Pago' onclick='event_mostrar_modal_pago(this)'></div>";
    innerTableContent += "</div>";
    innerTableContent += "<div class='form-row'>";
    innerTableContent += "<div class='form-group col-md-6 col'><input type='button' name='' class='btn btn-info' value='Generar Clave' onclick='event_generar_clave(this)'></div>";
    innerTableContent += "</div>";
    innerTableContent += "<div class='form-row'>";
    innerTableContent += "<div class='form-group col-md-6 col'><input type='button' name='' class='btn btn-danger' value='Cancelar' onclick='event_cancelar_selection()'></div>";
    innerTableContent += "</div>";
    innerTableContent += "<div class='form-row'><div class='form-group col-md-12 col'><input type='file' name='croquis' id='autocat' onchange=''>"
    innerTableContent += "<input type='button' onclick='uploadFile()'  value='Subir Archivo'><input type='hidden' id='Croquis_URL' name='Croquis_URL' value='assets/tramites/clavescatastralesindividual/croquis/2861.PNG'></div></div>";
    innerTableContent += "</div>";
  	innerTableContent += "</div></td>";
  	tblRow.html(innerTableContent);
    this.set_template_to_record();
  }

  set_template_to_record()
  {
    if($("#propietario").val()=="")
		$("#propietario").val($("#Propietario").val());
    if($("#caracter").val()=="")
		$("#caracter").val($("#p_caracter").val());
	 if($("#superficie").val()=="")
		$("#superficie").val($("#p_superficie").val());
	 if($("#escritura").val()=="")
		$("#escritura").val($("#p_numero_escritura").val());
     if($("#notario_publico").val()=="")
		$("#notario_publico").val($("#p_notario_publico").val());
	 if($("#numero_notario_publico").val()=="")
		$("#numero_notario_publico").val($("#p_numero_notario_publico").val());
	 if($("#fecha_escritura").val()=="")
		$("#fecha_escritura").val($("#p_fecha_escritura").val());
	 if($("#numero_oficio").val()=="")
		$("#numero_oficio").val($("#p_numero_oficio").val());
	 if($("#estado_escitura").val()=="")
		$("#estado_escitura").val($("#p_estado_escritura").val());
	 if($("#ciudad_escritura").val()=="")
		$("#ciudad_escritura").val($("#p_ciudad_escritura").val());
  }


  setup_generate_talon()
  {
    var fecha_ini = $("#fecha-inicio").val();
    var fecha_final = $("#fecha-entrega").val();
    var nombre_propietario = $("#Propietario").val();
    var telefono = $("#Telefono").val();
    var correo = $("#Correo_Electronico").val();
    var tipo_tramite = $("#Tipo_Tramite").val();
    var clave = cuentas_asignadas[0]["Cuenta_Predial"];
    var folios = JSON.stringify(numeros_asignados);
    window.open("../../PDFGen/pdfGenTalon.php?nombre="+nombre_propietario+"&correo="+correo
      +"&fecha_inicial="+fecha_ini+"&fecha_final="+fecha_final+"&folios="+folios+"&clave="+clave, "_blank");
    for (var i = 0; i < numeros_asignados.length; i++)
    {
      new view_claves_fraccionamiento().set_folio_fracc_detalles(i);
    }
    window.location.href=this.basePath+"VUIRA1.5/c_clave_fraccionamientos/Clave_Catastral_Listado.php";
  }

  init_fraccionamientoFolios(numero_cuentas)
  {
    if ( numero_cuentas !== 0)
    {
      this.get_numeros_consecutivos(numero_cuentas);
    }
    else
      mensajeError('El numero de cuentas no puede ser 0');
  }

  get_numeros_consecutivos(numero)
  {
    $.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/actualizacion_no_seguimiento.php",
      data:{no:numero},
      async:true,
      success: function (jdata)
      {
        console.log(jdata);
        if(jdata != "Error")
        {
          var data = JSON.parse(jdata);
          //obtiene solo los valores del json
          numeros_asignados = Object.keys(data).map(function (key) { return data[key]; });
          new view_claves_fraccionamiento().setup_generate_talon();
        }
        else
        {
          alert (jdata);
        }
      }
    });
  }

  set_folio_fracc_detalles(indice)
  {
    $.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_insert_folio.php",
      data:{id:$("#id").val(),cuenta_predial:cuentas_asignadas[indice]["Cuenta_Predial"],folio:numeros_asignados[indice]},
      async:true,
      success: function (jdata)
      {
        console.log(jdata);
        if(jdata != "Error")
        {

          console.log(jdata);
        }
        else
        {
            alert (jdata);
        }
      }
    });
  }

  setup_generate_clave()
  {
	  var dataBase = this.get_data_generar_clave_ind();
	  var dataDoc = this.get_data_generar_clave_ind_documento();
	  $.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/c_clave_individual/cta_predial_individual_services.php?service_name=agregar_fraccionamiento_individual",
      data:{dataBase:dataBase,dataDoc:dataDoc},
      async:true,
      success: function (jdata)
      {
        console.log(jdata);
        if(jdata != "Error")
        {
          alert(jdata);
    		  var data ={};
          if(id_bd=="0")
          {
            data["Id_Clave"]=jdata;
            new view_claves_fraccionamiento().update_Detalles(data,
                                                              $("#id").val(),
                                                              $("#Cuenta_Predial").val());
          }
          //var url = "https://vuira.irapuato.gob.mx/DocPrint/DocPrint.php?id="+jdata;
    		  var url = "../../DocPrint/DocPrint.php?id="+jdata;
    		  window.open(url, '_blank');
        }
        else
        {
            alert (jdata);
        }
      }
    });
  }

  update_Detalles(data,id_frac,predial)
  {
	   $.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_det.php?service_name=updatedet",
      data:{id:id_frac,predial:predial,data:data},
      async:true,
      success: function (jdata)
      {
        console.log(jdata);
        if(jdata != "Error")
        {

          console.log(jdata);
        }
        else
        {
            alert (jdata);
        }
      }
    });
  }

  set_data_form(data)
  {
    $("#Propietario").val( data[0]["Propietario"] );
    $("#Correo_Electronico").val( data[0]["Correo_Electronico"] );
    $("#Telefono").val( data[0]["Telefono"] );
    $("#Tipo_Tramite")[0].selectedIndex= parseInt(data[0]["Tipo_Tramite"]);
  }

  set_data_form_detalles(data)
  {
    for (var i = 0; i < Object.keys(data).length; i++)
    {
       console.log(data[i]);
       this.load_detallesFraccionamiento(data[i]);
       numero_cuentas++;
    }
  }

  set_nombre_propietario(data)
  {
    var nombre_propietario_actual = $("#Propietario").val();
    var nombre_nuevo = data.NOMBRE + " " + data.APELLIDO_PATERNO + " " + data.APELLIDO_MATERNO;
    if ( nombre_propietario_actual != "")
    {
      if ( nombre_propietario_actual != nombre_nuevo)
      {
        mensajeInfo('Los Propietarios No Son Iguales');
      }
    }
    else
    {
      $("#Propietario").val(nombre_nuevo);
    }
  }

  get_data_generar_clave_ind()
  {
	var data={};
	data['calleui'] = $("#Calle").val();
	data['predialui'] = $("#Cuenta_Predial").val();
	data['noloteui'] = "";
	data['nomanzanaui'] = "";
	data['nooficialui'] = $("#Num_Ext").val();
	data['cbocoloniaui'] = "";
	data['categoriapredioui'] = "";
	data['nombrepropietariodp'] = $("#propietario").val();
	data['status'] = "3";
	return data;
  }

  get_data_generar_clave_ind_documento()
  {
  	var data={};
  	data['ID_Numero_Oficio'] = $("#numero_oficio").val();
    if(id_bd!="0")
      data['ID_Bd'] = id_bd;
    else
      data['ID_Bd'] = "";
  	data['Nombre_Propietario'] = $("#propietario").val();
  	data['Tipo_Tramite'] = "Escritura Publica";
  	data['Calle'] = $("#Calle").val();
  	data['Numero_Exterior'] = $("#Num_Ext").val();//datos
    data['Numero_Escritura'] = $("#escritura").val();//datos
  	data['NoInterior'] = $("#Num_Int").val();//datos
  	data['Colonia'] = $("#Colonia").val();//datos
  	data['Numero_Predial'] = $("#Cuenta_Predial").val();//datos
  	data['Superficie'] = $("#superficie").val();
  	data['Caracter'] = $("#caracter").val();
  	data['Fecha_Escritura'] = $("#fecha_escritura").val();
  	data['Nombre_Notario'] = $("#notario_publico").val();
  	data['Numero_Notario'] = $("#numero_notario_publico").val();
  	data['Numero_Seguimiento'] = $("#numero_oficio").val();
  	data['Fecha_Inicio'] = "";
  	data['Clave_Catastral'] = $("#claveCat").val();
  	data['Manzana'] = "";
  	data['Numero_Lote'] = "";
  	data['Fecha_Generacion_Documento']="";
  	data['No_Off']=$("#numero_oficio").val();
  	data['Tipo_Sup']="m2";
  	data['Es_Ciudad_Escritura']=$("#ciudad_escritura").val();
  	data['Es_Estado_Escritura']=$("#estado_escitura").val();
    data['Croquis_URL']=$("#Croquis_URL").val();
  	return data;
  }

  cancelar_claveGen()
  {
	  if(rowSelected!= "")
	  {
		  $("#"+rowSelected).html(rowSelectedContent);
		  rowSelected="";
		  rowSelectedContent="";
	  }
  }

  load_data_fraccionamientos(id)
  {
    $.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/get_data_fraccionamientos.php",
      data:{id:id},
      async:true,
      success: function (jdata)
      {
        console.log(jdata);
        if(jdata != "Error")
        {
          var data = JSON.parse(jdata);
          console.log(data);
          new view_claves_fraccionamiento().set_data_form(data);
        }
        else
        {
            alert (jdata);
        }
      }
    });
  }

  load_data_fraccionamientos_detalles(id)
  {
    $.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/get_data_fraccionamientos_detalles.php",
      data:{id:id},
      async:true,
      success: function (jdata)
      {
        console.log(jdata);
        if(jdata != "Error")
        {
          var data = JSON.parse(jdata);
          cuentas_asignadas = data;
          console.log(data);
          new view_claves_fraccionamiento().set_data_form_detalles(data);
        }
        else
        {
            alert (jdata);
        }
      }
    });
  }



  insertar_cuenta_predial_detalles(data)
  {
    var id_fraccionamientos = $("#id").val();
    $.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_det_insert.php",
      data:{id:id_fraccionamientos, cuenta_predial:data.CUENTA_PREDIAL, calle:data.CALLE_ID, numero_ext:data.NO_EXTERIOR,
        numero_int:""+data.NO_INTERIOR+"", colonia:data.COLONIA_ID, id_clave:0},
      async:true,
      success: function (jdata)
      {
        console.log(jdata);
        if(jdata.includes("Error"))
        {
          console.log(jdata);
          mensajeError('La cuenta no existe o ya se ha agregado');
        }
        else
        {
          new view_claves_fraccionamiento().set_nombre_propietario(data);
          new view_claves_fraccionamiento().set_to_grid(data);
          //alert (jdata);
        }
      }
    });
  }

  verificar_propietarios_iguales(data)
  {
    var nombre_nuevo = data.NOMBRE + " " + data.APELLIDO_PATERNO + " " + data.APELLIDO_MATERNO;
    var nombre_actual = $("#Propietario").val();

    console.log(nombre_nuevo);
    console.log(nombre_actual);

    if ( nombre_nuevo === nombre_actual )
    {
      console.log("Nombres son iguales");
    }
  }

  delete_fraccionamientos_detalles(id,valor)
  {
     $.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_det_delete.php",
      data:{id:id, cuenta_predial:valor},
      async:true,
      success: function (jdata)
      {
        console.log(jdata);
        if(jdata != "Error")
        {
          console.log(jdata);
        }
        else
        {
            alert (jdata);
        }
      }
    });
  }

  update_status_fraccionamientos(id)
  {
    $.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_det_update_status.php",
      data:{id:id},
      async:true,
      success: function (jdata)
      {
        console.log(jdata);
        if(jdata != "Error")
        {
          console.log(jdata);
          document.getElementById('form').submit();
        }
        else
        {
          alert (jdata);
        }
      }
    });
  }

  save_croquis(data)
  {
    $.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_core.php?service_name=subirCroquis",
      data:{data:data},
      async:true,
      success: function (jdata)
      {
        console.log(jdata);
        if(jdata != "Error")
        {
          var data = JSON.parse(jdata);
          console.log(data);
        }
        else
        {
            alert (jdata);
        }
      }
    });
  }

  update_manzana(cuenta_predial,valor)
  {
    var id = $("#id").val();
    $.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_det_update_manzana.php",
      data:{id:id,cuenta_predial:cuenta_predial,valor:valor},
      async:true,
      success: function (jdata)
      {
        console.log(jdata);
        if(jdata != "Error")
        {
          console.log(jdata);
          mensajeInfo('Se Ha Actualizado La Cuenta Predial');
        }
        else
        {
          alert (jdata);
        }
      }
    });
  }

  update_lote(cuenta_predial,valor)
  {
    var id = $("#id").val();
    $.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_det_update_lote.php",
      data:{id:id,cuenta_predial:cuenta_predial,valor:valor},
      async:true,
      success: function (jdata)
      {
        console.log(jdata);
        if(jdata != "Error")
        {
          console.log(jdata);
          mensajeInfo('Se Ha Actualizado La Cuenta Predial');
        }
        else
        {
          alert (jdata);
        }
      }
    });
  }
  redirigir_inicio_tramite()
  {
    window.location.href="https://vuira.irapuato.gob.mx/infotramites/info_atencion_de_claves_catastrales_fraccionamiento";
  }
}
