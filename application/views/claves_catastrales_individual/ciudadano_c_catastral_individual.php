<!DOCTYPE html>
<html lang="es" ng-app="Aplicacion">
<head>
    <?php $this->load->view('base/head - css'); ?>
</head>
<body class="page-container-bg-solid">
    <div id="page-content">
        <div class="container">
            <h2>Solicitud de Clave Catastral</h2>

            <div class="panel">
                <div class="panel-body">
                    <h5 class="note note-success">Para solicitar este trámite le recomendamos tenga su recibo predial a la mano.</h5>

                    <form id="formclave" action="https://vuira.irapuato.gob.mx/VUIRA1.5/servicios/c_clave_individual/clave_catastral_ciudadano.php" method="post" ="post" enctype="multipart/form-data">
                        <div class="row content-box border-top border-blue <?php echo $this->session->userdata('tipo') == 15? "hidden" : true ?>" id="paso">
                            <div class="content-box-wrapper">
                                <div class="form-group">
                                    <div class="form-group col-md-12">
                                        <h3 class="title-hero">Identificación y Ubicación del Inmueble</h3>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="varchar">Número Cuenta Predial</label>
                                            <input title="Este Número se compone de 12 Digitos o la palabra APERTURA si no se cuenta con un número predial" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" autocomplete="off" type="text" class="form-control" name="predialui" id="predialui" placeholder="Cuenta Predial" value="" maxlength="12"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="varchar">Dirección del inmueble*</label>
                                            <input autocomplete="off" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" required type="text" class="form-control" name="domicilio" id="domicilio" placeholder="Dirección" value=""/>
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <label for="varchar">Teléfono*</label>
                                            <input maxlength="10" pattern="[0-9]{7,10}" type="text" class="form-control" name="telefononotificacionesdp" id="telefononotificacionesdp" placeholder="Teléfono" value="" title="Solo números" autocomplete="off" required/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="varchar">Ejemplo de cuenta predial:</label>
                                            <img src="../assets/recpre.png" style="width: 100%; height: auto;">
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control select2" title="Tipo de trámite" name="cbotipotramite" id="cbotipotramite" required>
                                                <option value="-1">Seleccionar tipo de trámite...</option>
                                                <option value="1">Asignación de clave catastral</option>
                                                <option value="2">Modificación de clave catastral</option>
                                                <option value="3">Duplicado de clave catastral</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <select class="form-control select2" title="Motivo de trámite" name="cbomotivotramite" id="cbomotivotramite" required>
                                                <option value="-1">Seleccionar motivo de trámite...</option>
                                                <option value="1">Solicitud de parte</option>
                                                <option value="2">Permiso de divicion</option>
                                                <option value="3">Aprobacion de suelo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row content-box border-top border-blue <?php echo $this->session->userdata('tipo') == 15? "hidden" : true ?>">
                            <div class="form-group" id="datosps">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Por favor indique el tipo de persona</label><br>
                                        <label>Moral</label>
                                        <input class="" type="radio" name="tipopersona" id="tipopersonamo" value="moral" checked="true">
                                        <label>Física</label>
                                        <input class="" type="radio" name="tipopersona" id="tipopersonafi" value="fisica">
                                        <br><br>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <h5 class=" ">Adjunte los Siguientes Archivos Escaneados en Original</h5>
                                        </div>
                                        <div id="fisrfc" class="col-md-12">
                                            <div class="col-md-4">
                                                <!-- accept=".jpg, .jpeg, .png, .pdf, .rar, .zip" -->
                                                <label>Escritura de Compra Venta</label>
                                                <input accept=".pdf" class="" type="file" name="fisrfc">
                                                <a class="hidden" target="_blank" href=""> Visualizar Documento</a>
                                                <br>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Documento Acta constitutiva</label>
                                                <input accept=".pdf" class="" type="file" name="acta_const" value="">
                                                <a class="hidden" target="_blank" href="">Visualizar Documento</a>
                                                <br>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Poder Notarial para representación de persona
                                                    moral</label>
                                                <input accept=".pdf" class="" type="file" name="poder_nota" value="">
                                                <a class="hidden" target="_blank" href="">Visualizar Documento</a>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <label>Identificación del Propietario (INE, Pasaporte, Cédula
                                                    Profesional) Puede adjuntar uno o varios archivos*</label>
                                                <input accept=".pdf" class="" type="file" name="morine" value="">
                                                <a class="hidden" target="_blank" href="">Visualizar Documento</a>
                                                <br>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="varchar">Documento legal que acredite la propiedad;
                                                    debidamente inscrito en el Registro Público de la Propiedad (Con
                                                    todos sus anexos) Puede adjuntar uno o varios
                                                    archivos*</label>
                                                <input accept=".pdf" type="file" multiple=""
                                                           id="doctolegalpropiedad" placeholder="Poder Simple en caso de que el Trámite se Realizado por el Representante Legal"/>
                                                <a class="hidden" target="_blank" href="">Visualizar Documento</a>
                                                <br>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="varchar">Predial Actualizado*</label>
                                                <input accept=".pdf" type="file" name="doctopredial" id="doctopredial" placeholder="Recibo impuesto predial"/>
                                                <a class="hidden" target="_blank" href="">Visualizar Documento</a>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Horale</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    /*$('#epa').on('click',function(){

        var data=$('#formclave').serialize();
        var dat=JSON.stringify(data);

        alert(dat);
         $.ajax({
        url:"https://vuira.irapuato.gob.mx/VUIRA1.5/servicios/c_clave_individual/clave_catastral_ciudadano.php",
        type:"POST",
        async:false,
        dataType:"json",
        Data:data,
        success:(function(){
            alert("hey");
        }),
        error:(function(){
            alert("fallo");
        })
        });

    });*/
    
</script>
</html>