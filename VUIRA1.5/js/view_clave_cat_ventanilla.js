 $(document).ready(function(){
 	events();
});

function avanzarTramite()
{
	var id=$('#id_tramite').val();
    var flag=Get_Doctos(id);
    var message="";

    if($('#doctofinal').val()==""){
    	flag="ac"+flag;
    }

	if(flag.indexOf("ac")!=-1){
		message+="Hace falta el documento .dwg";
	}
	if(flag.indexOf("df")!=-1){
		if(message!="")
			message+=".\n Hace falta generar el documento final";
		else
			message+="Hace falta generar el documento final";
	}
	if(flag.indexOf("dp")!=-1){
		if(message!="")
			message+=".\n Hace falta generar el documento de pago.";
		else
			message+="Hace falta generar el documento de pago.";
	}
	if(flag=="true"){
		var status=4;
       	cambiar_status(id,status);
       	window.location.href='https://vuira.irapuato.gob.mx/claves_catastrales_individual/';
	}
	else{
		if(message!="")
			alert(message);

	}
}

function guardarTramite()
{
	alert("El cambio se ha guardado con éxito.\n Por favor vuelva a entrar al trámite");
}

function events(){

    $('#Realizar_Tramite').on('click',function(){

    });

    $('#Regresar_Tramite').on('click',function(){
		var id=$('#id_tramite').val();
		regresar_tramite(id);
		return false;
    });

    /*$('#formclave').on('submit',function(){

   	});*/

}

//026172018
function cambiar_status(id1,status1)
{
		if(id1!= null && id1!= "")
		{
			$.ajax({
				type:"post",
				url:"https://vuira.irapuato.gob.mx/VUIRA1.5/servicios/c_clave_individual/cta_predial_individual_services.php?service_name=update_status",
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

function regresar_tramite(id1)
{
	if(id1!= null && id1!= "")
	{
		$.ajax({
			type:"post",
			url:"https://vuira.irapuato.gob.mx/VUIRA1.5/servicios/c_clave_individual/cta_predial_individual_services.php?service_name=regresar_tramite",
			data:{id:id1},
			async:false,
			success: function (data)
			{
				console.log(data);
				console.log("Rollback completed");
				alert (data);
			}
		});
	}
	else
		console.log("Error no id selected");
}

function Get_Doctos(id1){

	var flag="";
	$.ajax({
			type:"post",
			url:"https://vuira.irapuato.gob.mx/VUIRA1.5/servicios/c_clave_individual/cta_predial_individual_services.php?service_name=comprobar_documentos",
			data:{id:id1},
			async:false,
			success: function (data)
			{
				var obj=JSON.parse(data);
				if(obj[0].Croquis_URL!=null /*&& obj[0].autocat*/ && obj[0].doctopago!=null)
				{
					flag="true";
				}
				else
				{
					if(obj[0].Croquis_URL==null){
						flag+="df";
					}
					/*if(obj[0].autocat==null){
						flag+="ac";
					}*/
					if(obj[0].doctopago==null){
						flag+="dp";
					}
				}

			},
			error:function(error)
			{
				console.log(error);
			}
	});

	return flag;
}

function addDays(date, days) {
      var result = new Date(date);
      result.setDate(result.getDate() + days);
      return result;
}

function addDaysTalon()
{
  var today = new Date();
  var weekDay = today.getDay();
  if(weekDay >0 && weekDay <=3)
    return addDays(today,2);
  else {
    return addDays(today,4);
  }
}
