function event_load()
{
    new view_fracc_validar_pago().get_all_fraccioamientos_con_cero();
}

function event_validar_pago(event)
{
    new view_fracc_validar_pago().set_pago(event.name);
}

class view_fracc_validar_pago
{
    constructor()
    {
        //this.basePath = "https://vuira.irapuato.gob.mx/";
        this.basePath = "https://"+window.location.hostname+"/";
        //this.basePath = "http://localhost/Vuira/";
    }

    get_all_fraccioamientos_con_cero()
    {
        $.ajax({
            type:"post",
            url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_core.php?service_name=getAllWithZero",
            async:true,
            success: function (jdata)
            {
              var data = JSON.parse(jdata);
              new view_fracc_validar_pago().setup_listado_fraccionamientos(data);
            }
          });
    }

    setup_listado_fraccionamientos(data)
    {
        var innerContent = "";
        for (var i=0;i < data.length;i++)
        {
            innerContent +="<tr id='" + data[i].Id + "'>";
            innerContent += "<td>" + data[i].Id + "</td>";
            innerContent += "<td>" + data[i].Propietario + "</td>";
            innerContent += "<td>" + data[i].Colonia + "</td>";
            if ( data[i].Lote == undefined)
            {
                data[i].Lote = "Sin Asignar";
            }
            if ( data[i].Manzana == undefined)
            {
                data[i].Manzana = "Sin Asignar";
            }
            innerContent += "<td>" + data[i].Lote + "</td>";
            innerContent += "<td>" + data[i].Manzana + "</td>";
            innerContent += "<td align='center' ><input type='button' class='btn btn-success' name='"+data[i].Id+"' onclick='event_validar_pago(this)' value='Validar Pago' ></td>";
        }
        $("#tblcontent").append(innerContent);
    }

    set_pago(idFracc)
    {
        $.ajax({
            type:"post",
            url:this.basePath+"VUIRA1.5/servicios/c_clave_fraccionamiento/c_clave_fracc_core.php?service_name=updatePago",
            data:{id:idFracc},
            async:true,
            success: function (jdata)
            {
                if ( jdata == 0 || jdata == "0")
                {
                    console.log(jdata);
                    window.location.reload();
                }
            }
          });
    }
}