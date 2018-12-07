rowSelected = "";
rowSelectedContent="";
var esPrimerCuenta = "si";
var esPrimerCarga = 1;
var mensajeSubmitAux = "Error";
var id_bd =0;
var cuentas_asignadas = 0;

function dirigir_main_page()
{
  window.location.replace("https://vuira.irapuato.gob.mx/infotramites/info_atencion_de_claves_catastrales_fraccionamiento");
}

function realizarSubmit()
{
  $( "#form" ).submit();
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

function event_pulsar_enter(event)
{
  if (event.keyCode == 13) 
  {
    event.preventDefault();
    event_add_cuenta_predial();
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
  var objVista=new view_claves_fraccionamiento();
  objVista.get_data_clave($("#id").val());
  //objVista.get_data_details($("#id").val());
  objVista.get_data_asignaciones( $("#id").val(), $("#uid").val());

  $( "#form" ).submit(function( event ) {
    objVista.update_status_fraccionamientos( $("#id").val() );
    if ( mensajeSubmitAux == 0)
      return true;
  });
}

function event_load_ventanilla()
{


  //valida la caja cuenta predial
  if($("#id").val()!="")
  {
    var objVista=new view_claves_fraccionamiento();
    objVista.load_data_fraccionamientos( $("#id").val() );
    objVista.load_data_fraccionamientos_detalles( $("#id").val() );
  }
  //sirve para tomar el nombre del archivo cargado y coloca su nombre en el label
  $(".custom-file-input").change(function(event){
    var padre = $(this).parent()
    var archivos = $(this).get(0).files;
    var label = padre.children( ".custom-file-label" );
    label.text( archivos[0]["name"] );
  });

  //valida el boton guardar
  $( "#formVentanilla" ).submit(function( event ) {
    event.preventDefault();
    var tbody = $('tbody');
    if ( tbody.children().length >= 2)
    {
      $('#exampleModal').modal('show');
    }
    else
    {
      alert("Debe agregar por lo menos una cuenta predial");
    }
  });

  $("#imprimirTalon").click( function()
  {
    var fecha_ini = $("#fecha-inicio").val();
    var fecha_final = $("#fecha-entrega").val();
    window.open("../../PDFGen/pdfGenTalon.php?fecha_ini="+fecha_ini+"&"+"fecha_final="+fecha_final, "_blank");
    document.getElementById('formVentanilla').submit();
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

class view_claves_fraccionamiento
{
  constructor()
  {
      //this.basePath = "https://vuira.irapuato.gob.mx/";
      this.basePath = "http://"+window.location.hostname+"/Vuira/";
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
          var id = $("#id").val();
          var data = JSON.parse(jdata);
          new view_claves_fraccionamiento().set_nombre_propietario(data);

          //si es nuevo trámite
          if (typeof id == undefined)
          {
            new view_claves_fraccionamiento().set_to_grid(data);
          }
          // si se edita un trámite existente
          else if ( esPrimerCarga === 0 )
          {
            new view_claves_fraccionamiento().insertar_cuenta_predial_detalles(data);
            new view_claves_fraccionamiento().set_to_grid(data);
          }
          // para mostrar la cuenta de un trámite existente
          else
          {
            esPrimerCarga = 0;
            new view_claves_fraccionamiento().set_to_grid(data);
          }
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
          console.log("LOS SIGUIENTES SON DATA");
          cuentas_asignadas = data;
          new view_claves_fraccionamiento().get_numeros_consecutivos();
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

  get_data_details(id)
  {
    $.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_det.php?service_name=byiddet",
      data:{id:id},
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
  }

  set_to_grid(data)
  {
     var innerTableContent = "<tr id='"+data.CUENTA_PREDIAL+"'>";
     innerTableContent += "<td name='"+data.CUENTA_PREDIAL+"'>"+ data.CUENTA_PREDIAL;
     innerTableContent += "<input type='hidden' name='S1_C_"+data.CUENTA_PREDIAL+"' value='"+data.CUENTA_PREDIAL+"' ></td>";
     innerTableContent += "<td name='"+data.CALLE_ID+"'>"+ data.CALLE_ID+
          "<input type='hidden' name='S1_CC_"+data.CUENTA_PREDIAL+"' value='"+data.CALLE_ID+"' ></td>";
     innerTableContent += "<td name='"+data.NO_EXTERIOR+"'>"+ data.NO_EXTERIOR+
          "<input type='hidden' name='S1_NE_"+data.CUENTA_PREDIAL+"' value='"+data.NO_EXTERIOR+"' ></td>";
     innerTableContent += "<td name='"+data.NO_INTERIOR+"'>"+ data.NO_INTERIOR+
          "<input type='hidden' name='S1_NI_"+data.CUENTA_PREDIAL+"' value='"+data.NO_INTERIOR+"' ></td>";
     innerTableContent += "<td name='"+data.COLONIA_ID+"'>"+ data.COLONIA_ID+
          "<input type='hidden' name='S1_CCC_"+data.CUENTA_PREDIAL+"' value='"+data.COLONIA_ID+"' ></td>";
     innerTableContent += "<td><input type='button' name='"+data.CUENTA_PREDIAL+"' value='borrar' onclick='event_remove_clave(this)'></td>";
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
		 innerTableContent += "<td><input type='button' name='"+data[i].Cuenta_Predial+"' value='Seleccionar' onclick='event_select_entry(this)'></td>";
		 innerTableContent += "</tr>";
	 }
     $("#tblinmubles").append(innerTableContent);
  }

  setup_for_claveGen(tblRow)
  {
  	rowSelectedContent = tblRow.html();
    var hidden= tblRow.find(":hidden");
    var tmpHidden = "";

    tmpHidden+= "<input type='hidden' id='Cuenta_Predial' value='"+hidden[0].value+"' />";
    tmpHidden+= "<input type='hidden' id='Calle' value='"+hidden[1].value+"' />";
    tmpHidden+= "<input type='hidden' id='Num_Ext' value='"+hidden[2].value+"' />";
    tmpHidden+= "<input type='hidden' id='Num_Int' value='"+hidden[3].value+"' />";
    tmpHidden+= "<input type='hidden' id='Colonia' value='"+hidden[4].value+"' />";
    tmpHidden+= "<input type='hidden' id='Id_clave' value='"+hidden[5].value+"' />";

  	var innerTableContent = "<td colspan='5' ><div class='container-fluid'>";
    innerTableContent += "<div style='display: none;'>"+tmpHidden+"</div>";
    innerTableContent += "<div class='form-row'>"
  	innerTableContent += "<div class='form-group col-md-4 col'><label for='claveCat' class='control-label'>Clave Catastral *</label> <input type='text'id='claveCat' class='form-control'> </div>";
  	innerTableContent += "<div class='form-group col-md-4 col'><label for='propietario' class='control-label'>Nombre del propietario *</label> <input type='text' id='propietario' class='form-control'></div>";
  	innerTableContent += "<div class='form-group col-md-4 col'><label for='caracter'class='control-label'>En Su Caracter * </label><input type='text' id='caracter' class='form-control'></div>";
    innerTableContent += "</div>"
    innerTableContent += "<div class='form-row'>"
  	innerTableContent += "<div class='form-group col-md-4 col'><label for='superficie' class='control-label'> Superficie del terreno * <input type='text' id='superficie' class='form-control'></div>";
  	innerTableContent += "<div class='form-group col-md-4 col'><label for='escritura' class='control-label'> Número de Escritura * <input type='text' id='escritura' class='form-control'></div>";
  	innerTableContent += "<div class='form-group col-md-4 col'><label for='notario_publico' class='control-label'> Nombre del notario público * <input type='text' id='notario_publico' class='form-control'></div>";
    innerTableContent += "</div>"
    innerTableContent += "<div class='form-row'>"
  	innerTableContent += "<div class='form-group col-md-4 col'><label for='numero_notario_publico'class='control-label'> Número de notario público * <input type='text' id='numero_notario_publico' class='form-control'></div>";
  	innerTableContent += "<div class='form-group col-md-4 col'><label for='fecha_escritura' class='control-label'> Fecha de Escrituras * <input type='date' id='fecha_escritura' class='form-control'></div>";
  	innerTableContent += "<div class='form-group col-md-4 col'><label for='numero_oficio' class='control-label'> Número de Oficio * <input type='text' id='numero_oficio' class='form-control'></div>";
    innerTableContent += "</div>"
    innerTableContent += "<div class='form-row'>"
  	innerTableContent += "<div class='form-group col-md-4 col'><label for='estado_escritura' class='control-label'>Estado de Escritura *</label> <input type='text' id='estado_escitura' class='form-control'></div>";
  	innerTableContent += "<div class='form-group col-md-4 col'><label for='ciudad_escritura' class='control-label'>Ciudad de Escritura *</label> <input type='text' id='ciudad_escritura' class='form-control'></div>";
    innerTableContent += "</div>"
  	innerTableContent += "</td>";
  	innerTableContent += "<td>";
  	innerTableContent += "<input type='button' name='' value='Generar Clave' onclick='event_generar_clave(this)'>";
  	innerTableContent += "<input type='button' name='' value='Cancelar' onclick='event_cancelar_selection()'>";
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

  }


  get_numeros_consecutivos()
  {
    console.log( cuentas_asignadas.length );

    $.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/actualizacion_no_seguimiento.php",
      data:{no:cuentas_asignadas.length},
      async:true,
      success: function (jdata)
      {
        console.log(jdata);
        if(jdata != "Error")
        {
          var data = JSON.parse(jdata);
          console.log("LOS NUMEROS CONSECUTIVOS SON");
          console.log(data);
          new view_claves_fraccionamiento().set_folio_fracc_detalles(data);
        }
        else
        {
            alert (jdata);
        }
      }
    });
  }

  set_folio_fracc_detalles(data)
  {
    var numeros = Object.keys(data).map(function (key) { return data[key]; });
    var url = this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/actualizacion_no_seguimiento.php";
    for (var i = 0; i < numeros.length; i++) 
    {
      (function (i) 
        {
          $.ajax({
            type:"post",
            url:url,
            data:{no:numeros[i]},
            async:true,
            success: function (jdata)
            {
              console.log(jdata);
              if(jdata != "Error")
              {
                 console.log("CUENTA PREDIAL: "+ cuentas_asignadas[i]["Cuenta_Predial"] +" VALOR DE I:" +numeros[i]);
              }
              else
              {
                  alert (jdata);
              }
            }
          });
        })
      (i); 
    }
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
    		  var url = "../DocPrint/DocPrint.php?id="+jdata;
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
    $("#Tipo_Tramite").val( data[0]["Tipo_Tramite"] );
  }

  set_data_form_detalles(data)
  {
    $("#txtCuentaPredial").val( data[0]["Cuenta_Predial"] );
    for (var i = 0; i < Object.keys(data).length; i++)
    {
      new view_claves_fraccionamiento().get_predial( data[i]["Cuenta_Predial"] );
      console.log("NUMERO DE ENVIOS DE CUENTAS"+Object.keys(data).length);
    }
  }

  set_nombre_propietario(data)
  {
    var nombre_propietario_actual = $("#Propietario").val();
    var nombre_nuevo = data.NOMBRE + " " + data.APELLIDO_PATERNO + " " + data.APELLIDO_MATERNO;

    if ( esPrimerCuenta === "si" )
    {
       $("#Propietario").val( nombre_nuevo );
       esPrimerCuenta = "no";
    } else if ( nombre_propietario_actual != nombre_nuevo)
    {
      alert("Los Propietarios no son iguales");
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
        }
        else
        {
          alert (jdata);
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
        }
        else
        {
          alert (jdata);
        }
      }
    });

  }
}
