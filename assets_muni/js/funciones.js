//Funciones
function notificar(texto, tipo){

    texto = typeof texto !== 'undefined' ? texto : "--";
    tipo = typeof tipo !== 'undefined' ? tipo : "success";

    new Noty({type: tipo,
        theme: 'sunset',
        text: texto,
        timeout: 1500
    }).show();
}
function loading() {
    $('#loading').show();
}

function loaded() {
    $('#loading').fadeOut(100, "linear");
}

function waiting(target) {
    target = typeof target !== 'undefined' ? target : ".waiting";
    var htmlWaiting = "";
    htmlWaiting = "<div class='waiting-icon remove-border glyph-icon tooltip-button icon-spin-6 icon-spin' title='' data-original-title='icon-spin-6' style='font-size:48px !important;  color: #92A0B3;'></div>";
    $(target).children().hide();
    $(target).append(htmlWaiting);
}

function waitingRemove(target) {
    $(target).find(".waiting-icon").remove();
    $(target).children().show("slow");
}

function getBaseUrl(){
    var resultado = "";

    if($("#baseUrl").length==1){
        resultado = $("#baseUrl").attr("base-url");
    }

    return resultado;
}

function wait(target) {
    target = typeof target !== 'undefined' ? target : ".waiting";
    size = typeof size !== 'undefined' ? size : "24px";
    var htmlWaiting = "";
    htmlWaiting = "<div class='waiting-icon remove-border glyph-icon tooltip-button icon-spin-6 icon-spin' title='' data-original-title='icon-spin-6' style='font-size:"+size+" !important;  color: #92A0B3;'></div>";
    $(target).children().hide();
    $(target).append(htmlWaiting);
}

function waitEnd(target) {
    $(target).find(".waiting-icon").remove();
    $(target).children().show("slow");
}

function ajax(ruta, callback) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: ruta,
        success: callback,
        beforeSend: function () {
            //console.log("antes de enviar...");
        },
        complete: function () {
            //console.log("completado");
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log("Error en: " + ruta + " " + xhr.status + " " + thrownError);
        }
    });
}

function msgbox(texto, tipo, titulo) {

    texto = typeof texto !== 'undefined' ? texto : "--";
    tipo = typeof tipo !== 'undefined' ? tipo : "success";
    titulo = typeof titulo !== 'undefined' ? titulo : "Información";

    swal({
        title: titulo,
        html: texto,
        type: tipo,
    });
}

function capitalize(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function loadTable(tableId, url, callback) {
    query = typeof query !== 'undefined' ? query : "";
    param = typeof param !== 'undefined' ? param : "";
    label = typeof label !== 'undefined' ? label : "";

    $(tableId).bootstrapTable('destroy');
    $(tableId).bootstrapTable('showLoading');
    $(label).html("0");

    $(tableId).bootstrapTable({
        locale:'es-MX',
        url: url,
        search: true,
        pagination: true,
        onLoadSuccess: function (data) {
         callback(data);
        }
    });
}

//fix iconos tablas

//Addons JQuery
$.fn.serializeFormJSON = function () {

    var o = {};
    var a = this.serializeArray();

    $.each(a, function () {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

/*
function regresar(divisionModAcadId, periodoId) {
    $('#principal').load("grupospaginacion.php", {divisionModAcadId: divisionModAcadId, periodoId: periodoId});
}

function cargarprincipal(pagina, divid) {
    /!*$('#cargando').show();
     $("#"+divid).load(pagina, function(){
     $('#cargando').hide();
     });*!/
    $("#" + divid).load(pagina);
    //$('.active').removeClass('active');//remueve todas las clases activas de los tabs
    //$('#tabprimario').addClass('active');//agrega una clase activa al tab principal
}

function cargarPdfModal($pagina, $divid) {
    $("#modalboleta").modal();
    $("#" + $divid).load($pagina);
}

function cargarGrid(idtabla, idcolumna, AJAX) {
    if (AJAX != 'true') AJAX = false; //verifica si AJAX tiene un valor 'true', para cargar una tabla con ajax,  de lo contrario es false
    $('#' + idtabla).bootgrid({
        ajax: AJAX
    }).on("click.rs.jquery.bootgrid", function (e, columns, rows) {
        if (rows != null)
            if (idcolumna) {
                if (idtabla != "detallepreinteresados") {
                    $('#basicModal').modal('show');//abre una ventana modal
                    var id = rows[idcolumna];
                    var seccion = $("#seccion").val();//recibe un value de un input en base a su id
                    cargarprincipal('seguimiento/modalinformaciongeneral.php?id=' + id + '&seccion=' + seccion + '&registrobitacora=1', 'tabcont');
                }
            }
    }).on("loaded.rs.jquery.bootgrid", function () {
        // Setup - agrega un input tipo texto por cada columna en la cabecera
        /!*$('#' + idtabla + ' thead th').each(function () {
         var title = $(this).text();
         if (title != "")
         $(this).html(title + '<br>' + '<input class="search-field form-control" type="text" placeholder="Buscar">');
         });*!/
    });
}

//funci�n que recibe un id de una tabla html y exporta a excel
function ExportarExcel(idtabla, filename) {
    var fecha = new Date();
    var formatofecha = fecha.getDate() + '-' + (fecha.getMonth() + 1) + '-' + fecha.getFullYear();
    $("#" + idtabla).tableExport({type: 'excel', fileName: filename + ':' + formatofecha});
}
//funcion que permite registrar las acciones del seguimiento a los interesados
function registrarAccion() {
    var accionid = $("#cmbaccion").val();
    var medio = $("#cmbmedio").find("option:selected").text();
    var detalle = $("#txtdetalle").val();
    var interesadoid = $("#interesadoid").val();
    var estatus = $("#estatus").val();//recibe un value de un input en base a su id
    var seccion = $("#seccion").val();//recibe un value de un input en base a su id
    $.post("seguimiento/modalaccion.php", {
        accionid: accionid,
        medio: medio,
        detalle: detalle,
        interesadoid: interesadoid,
        estatus: estatus
    }, function (data) {
        if (data) {
            cargarprincipal('seguimiento/modalinformaciongeneral.php?id=' + interesadoid + '&seccion=' + seccion + '&registrobitacora=0', 'tabcont');
        }
    });
}

function ExportarExcelGrupo() {
    var divModalidadAcadId = $("#divisionModAcadId").val();
    var periodoId = $("#periodoEscolarId").val();
    window.location.href = "excelgrupospaginacion.php?divModalidadAcadId=" + divModalidadAcadId + "&periodoId=" + periodoId;

}

function ExportarPdf(url) {
    if (url) window.location.href = url;
}

function ObtenerFechas() {
    var fechainicio = $("#date1").val().split('/');//recibe un value de un input en base a su id
    var fechatermino = $("#date2").val().split('/');//recibe un value de un input en base a su id
    var nuevafechainicio = fechainicio[2] + '-' + fechainicio[1] + '-' + fechainicio[0];
    var nuevafechatermino = fechatermino[2] + '-' + fechatermino[1] + '-' + fechatermino[0];

    if (new Date(nuevafechainicio) < new Date(nuevafechatermino)) {
        cargarprincipal('seguimiento/interesadoseguimiento.php?fechainicio=' + nuevafechainicio + '&fechatermino=' + nuevafechatermino, 'principal');
    }
    else {
        $("#contenidoAlerta").html('<strong class="text-center">La fecha de inicio debe ser previa a la fecha de termino</strong>');
        $("#modalAlerta").modal();
    }
}

function CargarDatetime(divId) {
    $('#' + divId).datetimepicker();
}

function ObtenerCorreos() {
    var correocopia = document.getElementById("correocopia").value;
    cargarprincipal('enviarboleta.php?res=' + correocopia, 'boletaenviar');
}

function cargarIndicadores() {
    $(".knob").knob({
        /!*change : function (value) {
         //console.log("change : " + value);
         },
         release : function (value) {
         console.log("release : " + value);
         },
         cancel : function () {
         console.log("cancel : " + this.value);
         },*!/
        draw: function () {

            // "tron" case
            if (this.$.data('skin') == 'tron') {

                var a = this.angle(this.cv)  // Angle
                    , sa = this.startAngle          // Previous start angle
                    , sat = this.startAngle         // Start angle
                    , ea                            // Previous end angle
                    , eat = sat + a                 // End angle
                    , r = true;

                this.g.lineWidth = this.lineWidth;

                this.o.cursor
                && (sat = eat - 0.3)
                && (eat = eat + 0.3);

                if (this.o.displayPrevious) {
                    if (this.value > 100) {
                        this.value = 100
                    }
                    ;

                    ea = this.startAngle + this.angle(this.value);
                    this.o.cursor
                    && (sa = ea - 0.3)
                    && (ea = ea + 0.3);
                    this.g.beginPath();
                    this.g.strokeStyle = this.previousColor;
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                    this.g.stroke();
                }

                this.g.beginPath();
                this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                this.g.stroke();

                this.g.lineWidth = 2;
                this.g.beginPath();
                this.g.strokeStyle = this.o.fgColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                this.g.stroke();

                return false;
            }
        }
    });
}

function mostrarMensajeSimpleUsuario(dialogTitulo, dialogMensaje, dialogTipo) {
    var btnClass = "";
    var msgUsuario = BootstrapDialog.show({
        title: '<strong>' + dialogTitulo + '</strong>',
        message: dialogMensaje
    });

    if (dialogTipo == "error")
        msgUsuario.setType(BootstrapDialog.TYPE_DANGER);
    else if (dialogTipo == "info")
        msgUsuario.setType(BootstrapDialog.TYPE_INFO);
    else if (dialogTipo == "success")
        msgUsuario.setType(BootstrapDialog.TYPE_SUCCESS);
    msgUsuario.open();
}

function validarFechas() {
    var fechaInicio = $("#dtpFechaInicio").val().split("/");
    var fechaFinal = $("#dtpFechaFinal").val().split("/");
    if ((fechaInicio.length > 1) && (fechaFinal.length > 1)) {
        var AnyoInicio = parseInt(fechaInicio[0]);
        var MesInicio = parseInt(fechaInicio[1]);
        var DiaInicio = parseInt(fechaInicio[2]);

        var AnyoFinal = parseInt(fechaFinal[0]);
        var MesFinal = parseInt(fechaFinal[1]);
        var DiaFinal = parseInt(fechaFinal[2]);

        if (AnyoInicio < AnyoFinal) {
            //alert ("La fecha introducida es anterior a la final");
            return true;
        }
        else {
            if (AnyoInicio == AnyoFinal && MesInicio < MesFinal) {
                //alert ("La fecha introducida es anterior a la final");
                return true;
            }
            else {
                if (AnyoInicio == AnyoFinal && MesInicio == MesFinal && DiaInicio < DiaFinal) {
                    //alert ("La fecha introducida es anterior a la final");
                    return true;
                }
                else {
                    if (AnyoInicio == AnyoFinal && MesInicio == MesFinal && DiaInicio == DiaFinal) {
                        BootstrapDialog.show({
                            title: 'Registro de Servicio Social',
                            type: BootstrapDialog.TYPE_DANGER,
                            message: 'La fecha de inicio y final son iguales.'
                        });
                        return false;
                    }
                    else {
                        BootstrapDialog.show({
                            title: 'Registro de Servicio Social',
                            type: BootstrapDialog.TYPE_DANGER,
                            message: 'La fecha de inicio es posterior a la fecha final.'
                        });
                        return false;
                    }
                }
            }
        }
    }
}

function mostrarDialogBootstrapdatos(tituloMensaje, mensajeNoOk, divrecargar, paginarecargar, id) {
    BootstrapDialog.show({
        title: tituloMensaje,
        message: mensajeNoOk,
        buttons: [{
            label: 'Cerrar',
            action: function (dialogItself) {
                dialogItself.close();
                if (paginarecargar != "") {
                    $("#" + divrecargar).load(paginarecargar, {matricula: id});
                }
            }
        }]
    });
}

//ivanvai



$.extend({
    percentage: function(a) {
        return Math.round((a) * 100);
    }
});



Number.prototype.toFixedDown = function(digits) {
    var re = new RegExp("(\\d+\\.\\d{" + digits + "})(\\d)"),
        m = this.toString().match(re);
    return m ? parseFloat(m[1]) : this.valueOf();
};

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

function removeURLParameter(url, parameter) {
    //prefer to use l.search if you have a location/link object
    var urlparts= url.split('?');
    if (urlparts.length>=2) {

        var prefix= encodeURIComponent(parameter)+'=';
        var pars= urlparts[1].split(/[&;]/g);

        //reverse iteration as may be destructive
        for (var i= pars.length; i-- > 0;) {
            //idiom for string.startsWith
            if (pars[i].lastIndexOf(prefix, 0) !== -1) {
                pars.splice(i, 1);
            }
        }

        url= urlparts[0] + (pars.length > 0 ? '?' + pars.join('&') : "");
        return url;
    } else {
        return url;
    }
}

function getCurrentUrlClean(){
    return location.protocol + '//' + location.host + location.pathname;
}

function loadPage(destino,url,callback){
    //callback
    //response, status, xhr
    $(destino).load( url,callback);
}

function duplicarVentana(){
    var yourDOCTYPE = "<!DOCTYPE html..."; // your doctype declaration
    var printPreview = window.open('about:blank', 'print_preview');
    var printDocument = printPreview.document;
    printDocument.open();
    printDocument.write(yourDOCTYPE+
        "<html>"+
        document.documentElement.innerHTML+
        "</html>");
    printDocument.close();
}

function getCurrentUrl(){
    var ruta = location.protocol + '//' + location.host + location.pathname;
    return ruta;
}

function loading(target) {

    if($(".loader").length==0){
        $(target).prepend("<div align='center' class='loader'><i class='fa fa-refresh fa-spin fa-5x pagination-centered'></i></div>");
    }
}

function loadingRemove(target) {
    $(target + " .loader").remove();
}

function alerta(mensaje,tipo,titulo,textoAceptar){

    mensaje = typeof mensaje !== 'undefined' ? mensaje : "";
    titulo = typeof titulo !== 'undefined' ? titulo : "Listo";
    tipo = typeof tipo !== 'undefined' ? tipo : "success";
    textoAceptar = typeof textoAceptar !== 'undefined' ? textoAceptar : "Aceptar";

    swal({
        title: titulo,
        text: mensaje,
        type: tipo,
        confirmButtonText: textoAceptar
    })
}

function getBrowser(){
    var browser = '';
    var browserVersion = 0;

    if (/Opera[\/\s](\d+\.\d+)/.test(navigator.userAgent)) {
        browser = 'Opera';
    } else if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)) {
        browser = 'MSIE';
    } else if (/Navigator[\/\s](\d+\.\d+)/.test(navigator.userAgent)) {
        browser = 'Netscape';
    } else if (/Chrome[\/\s](\d+\.\d+)/.test(navigator.userAgent)) {
        browser = 'Chrome';
    } else if (/Safari[\/\s](\d+\.\d+)/.test(navigator.userAgent)) {
        browser = 'Safari';
        /Version[\/\s](\d+\.\d+)/.test(navigator.userAgent);
        browserVersion = new Number(RegExp.$1);
    } else if (/Firefox[\/\s](\d+\.\d+)/.test(navigator.userAgent)) {
        browser = 'Firefox';
    }
    if(browserVersion === 0){
        browserVersion = parseFloat(new Number(RegExp.$1));
    }

    return browser +" " + browserVersion;
}

function validarAcceso(resultado){
    var peticion = new Object();
    peticion.accion="validar";

    ajax("controller/validadorController.php", peticion, resultado);
}

function logOut(resultado){
    window.location.replace("login.html");
    var peticion = new Object();
    peticion.accion="logout";

    ajax("controller/validadorController.php", peticion, resultado);
}*/
