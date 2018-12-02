

function RegresarTramite()
{
	var id=$('#ID').val();
	var status=3;
    cambiar_status(id,status);		
	window.history.back();
}


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
