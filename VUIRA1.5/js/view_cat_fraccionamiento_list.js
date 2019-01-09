var rowSelected="";
var rowSelectedContent="";

function event_load()
{
  var Operation = $("#operation").val()
  if(Operation=="Ventanilla")
    new view_claves_cat_fraccionamiento_list().get_All_Fraccionamientos();
  else if (Operation=="Auxiliar")
    new view_claves_cat_fraccionamiento_list().get_Fraccionamientos_by_Auxiliar($("#uid").val());
  else if (Operation=="Asignar")
    new view_claves_cat_fraccionamiento_list().get_All_Fraccionamientos_by_SinAsignar();
}

function event_Asignar(control)
{
  var objAuxiliar = new view_claves_cat_fraccionamiento_list();
  objAuxiliar.cancelar_asignacion();
	rowSelected = control.name;
	objAuxiliar.display_asignador_interface($("#"+control.name));
}

function event_remover_asignacion(control)
{
  new view_claves_cat_fraccionamiento_list().delete_asignado(control.id, control.name, control.value, control);
}

function event_Cancelar()
{
  var objAuxiliar = new view_claves_cat_fraccionamiento_list();
  objAuxiliar.cancelar_asignacion();
}

function event_Asignar_Auxiliar()
{
  var objAuxiliar = new view_claves_cat_fraccionamiento_list();
  objAuxiliar.asignarAuxiliar(objAuxiliar.getDatosAsignacion());
}

class view_claves_cat_fraccionamiento_list
{
  constructor()
  {
      this.basePath = "https://vuira.irapuato.gob.mx/";
      //this.basePath = "http://localhost/Vuira/";
  }

  get_folio_final(id, fila)
  {
     $.ajax({
      type:"post",
      data:{id,id},
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_core.php?service_name=getFoFi",

      async:true,
      success: function (jdata)
      {
        var data = JSON.parse(jdata);
        fila[5].innerText = data[0]["Folio"];
      }
    });
  }

   get_no_claves(id, fila)
  {
     $.ajax({
      type:"post",
      data:{id,id},
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_core.php?service_name=noClaves",

      async:true,
      success: function (jdata)
      {
        var data = JSON.parse(jdata);
        fila[3].innerText = data[0]["Claves"];
      }
    });
  }

  get_All_Fraccionamientos()
  {
    $.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_core.php?service_name=getAll",

      async:true,
      success: function (jdata)
      {
        var data = JSON.parse(jdata);
        new view_claves_cat_fraccionamiento_list().setup_Listado_Fraccionamientos(data,"Ventanilla","");
      }
    });
  }

  get_Fraccionamientos_by_Auxiliar(Auxiliar)
  {

    $.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_core.php?service_name=getByAuxiliar",
      data:{auxiliar:Auxiliar},
      async:true,
      success: function (jdata)
      {
        var data = JSON.parse(jdata);
        new view_claves_cat_fraccionamiento_list().setup_Listado_Fraccionamientos(data,"Auxiliar",Auxiliar);
      }
    });
  }

  get_All_Fraccionamientos_by_SinAsignar()
  {
    $.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_core.php?service_name=getSinAsignar",
      async:true,
      success: function (jdata)
      {
        var data = JSON.parse(jdata);
        new view_claves_cat_fraccionamiento_list().setup_Listado_Fraccionamientos(data,"Asignador","");
      }
    });
  }

  setup_Listado_Fraccionamientos(data,opcion,auxiliar)
  {
      var innerConent = "";
      for(var i=0; i< data.length;i++)
      {
        innerConent+="<tr id='"+data[i].Id+"'>";
        innerConent+="<td>"+ data[i].Id + "</td>";
        innerConent+="<td>"+ data[i].Propietario + "</td>";
        innerConent+="<td>"+ data[i].Colonia + "</td>";
        innerConent+="<td>"+ "CANTIDAD DE CLAVES" + "</td>";
        innerConent+="<td>"+ data[i].Folio + "</td>";
        innerConent+="<td>"+ "Folio Final" + "</td>";
        innerConent+="<td>"+ data[i].Correo_Electronico + "</td>";
        innerConent+="<td>"+ data[i].Telefono + "</td>";
        if(opcion=="Ventanilla")
          innerConent+="<td href=''><a href='Clave_Catastral_Fraccionamientos_Ventanilla.php?Id="+data[i].Id+"'>Ver Registro </a></td>";
        else if(opcion=="Auxiliar")
          innerConent+="<td href=''><a href='Clave_Catastral_Fraccionamientos_Auxiliar.php?Id="+data[i].Id+"&uid="+auxiliar+"'>Generar Clave</a></td>";
        else if(opcion=="Asignador")
            innerConent+="<td><input type='button' class='btn btn-info'' name='"+data[i].Id+"' onclick='event_Asignar(this)' value='Asignar' /></td>";
        else
            innerConent+="<td>Error opcion incorrecta</td>";
        innerConent+="</tr>";
      }
      $("#tblcontent").append(innerConent);
      $('#tblcontent tr').each(function() {
        if ( this.id != "")
        {
          new view_claves_cat_fraccionamiento_list().get_folio_final(this.id, jQuery(this).children());
          new view_claves_cat_fraccionamiento_list().get_no_claves(this.id, jQuery(this).children());
        }
      });
  }

  get_all_auxiliares()
  {
	  var data=[];
	  $.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_aux.php?service_name=get_All_Auxiliares",
      async:false,
      success: function (jdata)
      {
        data = JSON.parse(jdata);
      }
    });
	  return data;
  }

  setup_all_auxiliares(data)
  {

	  var control="<select id='cmbAuxiliares' class='chosen-select'>";
	  for(var i=0; i< data.length ; i++)
	  {
      var fullName = data[i].nombres+" "+(data[i].apellido_pat==null?"":data[i].apellido_pat)+" "+(data[i].apellido_mat==null?"":data[i].apellido_mat);
		  control += "<option value='"+data[i].ID+"'>"+fullName.toUpperCase()+ "</option>";
	  }
	  control+="</select>";
	  return control;
  }

  get_Auxiliares_Asignados(idFraccionamiento)
  {
	var data=[];
	$.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_aux.php?service_name=get_asignados_fraccionamiento",
      async:false,
	  data:{idFraccionamiento:idFraccionamiento},
      success: function (jdata)
      {
        data = JSON.parse(jdata);
      }
    });
	return data;
  }

  setup_Auxiliares_Asignados(data)
  {

	  var control="<table class='table table-bordered'>";
    control+="<thead>";
	  control+="<tr>";
	  control+="<th scope='col'>Auxiliar</td>";
	  control+="<th scope='col'>Folio</td>";
	  control+="<th scope='col'>Manzana</td>";
    control+="<th scope='col'>Lote</td>";
    control+="<th scope='col'>Calle</td>";
    control+="<th scope='col'></td>";
	  control+="</tr>";
    control+="</thead>";
	  for(var i=0; i< data.length ; i++)
	  {
      control+="<tr>";
      if ( data[i].Nombre == null )
      {
        data[i].Nombre = "No Capturado";
      }
      if ( data[i].Folio == null )
      {
        data[i].Folio == "No Capturado";
      }
      if ( data[i].Manzana == null )
      {
        data[i].Manzana == "No Capturado";
      }
      if ( data[i].Lote == null )
      {
        data[i].Lote == "No Capturado";
      }
      if ( data[i].Calle == null )
      {
        data[i].Calle == "No Capturado";
      }
      control+="<td>"+data[i].Nombre+"</td>";
      control+="<td>"+data[i].Folio+"</td>";
      control+="<td>"+data[i].Manzana+"</td>";
      control+="<td>"+data[i].Lote+"</td>";
      control+="<td>"+data[i].Calle+"</td>";
      control+="<td  align='center'>"+"<button type='button' class='btn btn-danger' id='"+data[i].Id_Fraccionamiento+"' name='"+data[i].Cuenta_Predial+"' value='"+data[i].Id_Auxiliar+"' onclick='event_remover_asignacion(this)'><i class='glyph-icon icon-trash'></i></button>"+"</td>";
      control+="</tr>";
	  }
	  control+="</table>";
	  return control;
  }

  get_Sin_Asignar(idFraccionamiento)
  {
	var data=[];
	$.ajax({
      type:"post",
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_aux.php?service_name=get_no_asignados_fraccionamiento",
      async:false,
	    data:{idFraccionamiento:idFraccionamiento},
      success: function (jdata)
      {
        data = JSON.parse(jdata);
      }
    });
	return data;
  }

  display_asignador_interface(tblRow)
  {
	 var frag_auxiliares =this.setup_all_auxiliares(this.get_all_auxiliares());
	 var frag_aux_asignados = this.setup_Auxiliares_Asignados(this.get_Auxiliares_Asignados(rowSelected));
   var maxAvilable = this.get_Sin_Asignar(rowSelected)[0];
	 rowSelectedContent = tblRow.html()
	 var innerHtml= "<td colspan='8'>";
	 innerHtml+= "<h3>Asignacion de Auxiliares</h3>";
	 innerHtml+= "Auxiliar:"+frag_auxiliares;
	 innerHtml+= "Bloque: <input type='text' id='txtBloque'> Disponibles: <input type='hidden' id='hidSinAsignar' value='"+maxAvilable.Sin_Asignar+"'> "+maxAvilable.Sin_Asignar;
	 innerHtml+= frag_aux_asignados;
	 innerHtml+= "</td>";
	 innerHtml+= "<td>";
   innerHtml+= "<div class='btn-group-vertical' role='group' aria-label='acciones'>";
	 innerHtml+= "<button type='button' class='btn btn-info' value='Asignar' onclick='event_Asignar_Auxiliar()'>Asignar</button>";
	 innerHtml+= "<button type='button' class='btn btn-danger' value='Cancelar' onclick='event_Cancelar()'>Cancelar</button>";
   innerHtml+= "</div>";
	 innerHtml+= "</td>";
	 tblRow.html(innerHtml);
  }

  cancelar_asignacion()
  {
    if(rowSelected!= "")
	  {
		  $("#"+rowSelected).html(rowSelectedContent);
		  rowSelected="";
		  rowSelectedContent="";
	  }
  }

  getDatosAsignacion()
  {
    var data={};
    data['Id_Auxiliar'] = $("#cmbAuxiliares").val();
    data['Id_Fraccionamiento'] = rowSelected;
    data['BlockSize'] = $("#txtBloque").val();
    data['SinAsignar'] = $("#hidSinAsignar").val();
    return data;
  }

  cambiar_status(id1,status1)
  {
  		if(id1!= null && id1!= "")
  		{
  			$.ajax({
  				type:"post",
  				url:"https://vuira.irapuato.gob.mx/VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_core.php?service_name=updateStatus",
  				data:{id:id1,status:status1},
  				async:false,
  				success: function (data)
  				{
  					console.log(data);
  					console.log("Save completed");
  					alert (data);
  				}
  			});
  		}
  		else
  			console.log("Error no id selected");
  }

  asignarAuxiliar(dataA)
  {
    $.ajax({
        type:"post",
        url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_aux.php?service_name=asignacion_fraccionamiento",
        async:true,
        data:{idFraccionamiento:dataA["Id_Fraccionamiento"],idAuxiliar:dataA["Id_Auxiliar"],BlockSize:dataA["BlockSize"]},
        success: function (jdata)
        {
          console.log(jdata);
        }
      });
      if((parseInt(dataA['SinAsignar'])-parseInt(dataA['BlockSize']))<=0)
      {
        this.cambiar_status(dataA["Id_Fraccionamiento"],"Asignado");
      }
      this.cancelar_asignacion();
  }

  delete_asignado(id_fracc, cuenta, id_aux, fila)
  {
    $.ajax({
      type:"post",
      data:{id_fraccionamiento:id_fracc, cuenta:cuenta, id_auxiliar:id_aux},
      url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_aux.php?service_name=delete_asignado",
      async:true,
      success: function (jdata)
      {
        var data = JSON.parse(jdata);
        if ( data == 0 || data == "0")
        {
          $(fila).closest("tr").remove();
          new Noty({
            type: 'info',
            layout: 'topRight',
            theme: 'sunset',
            text: 'Se ha quitado la asignación, vuelva a oprimir el boton Asignar'
          }).show();
        }
      }
    });
  }
}
