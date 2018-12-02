<div clas="modal-body">
    <div class="container-fluid">
        <input name="ID" value="<?php echo $ID; ?>" type="hidden">
        <div class="row">
            <div class="form-group col-md-12">
                <div class="form-group">
                    <h4 style="margin-top:10px;">Complete los campos marcados con(*)</h4>
                </div>
                <table class="table table-bordered" border="1">
                    <tbody>
                        <tr>
                            <td>
                                <h5>Documentos</h5>
                                    <div class="form-group">
                                        <?php if ($otradoc): ?>
                                            <a class="btn btn-primary" style="margin-bottom: 5px;" target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $otradoc; ?>">
                                                <i class="fa fa-file"></i> Ver Otra Documentación
                                            </a>
                                        <?php endif; ?>
                                        
                                        <?php if ($mdocaux1): ?>
                                            <a class="btn btn-primary" style="margin-bottom: 5px;" target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $mdocaux1; ?>">
                                                <i class="fa fa-file"></i> Ver Otra Documentación
                                            </a>
                                        <?php endif; ?>
                                        <?php if ($rpredialar): ?>
                                            <a class="btn btn-primary" style="margin-bottom: 5px;" target="_blank" href="<?php echo base_url() . "assets/usuarios/documentos/" . $rpredialar; ?>" title="Visualizar Recibo Predial <?php echo $predialso == "" ? "Propietario" : "Solicitante"; ?>">
                                                <i class="fa fa-file"></i> Recibo Predial <?php echo $predialso == "" ? "Propietario" : "Solicitante"; ?>
                                            </a>
                                        <?php endif; ?>
                                        <?php if ($doctopredial): ?>
                                            <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctopredial; ?>" title="Visualizar Recibo Predial <?php echo $predialso == "" ? "Propietario" : "Solicitante"; ?>">
                                                <i class="fa fa-file"></i> Recibo Predial <?php echo $predialso == "" ? "Propietario" : "Solicitante"; ?>
                                            </a>
                                        <?php endif; ?>
                                                                        <?php if ($doctolegalpropiedad): ?>
                                                                            <a class="btn btn-primary"
                                                                               style="margin-bottom: 5px; "
                                                                               target="_blank"
                                                                               href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctolegalpropiedad; ?>"
                                                                               title="Visualizar Documneto De Propiedad"><i
                                                                                        class="fa fa-file"></i>
                                                                                Documento De Propiedad</a>
                                                                        <?php endif; ?>
                                                                        <?php if ($identificacionar): ?>
                                                                            <a class="btn btn-primary"
                                                                               style="margin-bottom: 5px; "
                                                                               target="_blank"
                                                                               href="<?php echo base_url() . "assets/usuarios/documentos/" . $identificacionar; ?>"
                                                                               title="Visualizar Indetificacion de <?php echo $morine == "" ? "Propietario" : "Solicitante" ?> "><i
                                                                                        class="fa fa-file"></i>
                                                                                Identificación <?php echo $morine == "" ? "Propietario" : "Solicitante" ?>
                                                                            </a>
                                                                        <?php endif; ?>
                                                                        <?php if ($morine): ?>
                                                                            <a class="btn btn-primary"
                                                                               style="margin-bottom: 5px; "
                                                                               target="_blank"
                                                                               href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $morine; ?>"
                                                                               title="Visualizar Indetificacion de Propietario "><i
                                                                                        class="fa fa-file"></i>
                                                                                Identificación
                                                                                Propietario</a>
                                                                        <?php endif; ?>
                                                                        <?php if ($doctoine): ?>
                                                                            <a class="btn btn-primary"
                                                                               style="margin-bottom: 5px; "
                                                                               target="_blank"
                                                                               href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctoine; ?>"
                                                                               title="Visualizar Indetificacion de <?php echo $morine == "" ? "Propietario" : "Solicitante" ?> "><i
                                                                                        class="fa fa-file"></i>
                                                                                Identificación <?php echo $morine == "" ? "Propietario" : "Solicitante" ?>
                                                                            </a>
                                                                        <?php endif; ?>
                                                                        <?php if ($cartapoder): ?>
                                                                            <a class="btn btn-primary"
                                                                               style="margin-bottom: 5px; "
                                                                               target="_blank"
                                                                               href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $cartapoder; ?>"
                                                                               title="Visualizar Carta Poder"><i
                                                                                        class="fa fa-file"></i>
                                                                                Carta Poder</a>
                                                                        <?php endif; ?>
                                                                        <?php if ($predialso): ?>
                                                                            <a class="btn btn-primary"
                                                                               style="margin-bottom: 5px; "
                                                                               target="_blank"
                                                                               href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $predialso; ?>"
                                                                               title="Visualizar Predial Propietario"><i
                                                                                        class="fa fa-file"></i>Recibo
                                                                                Predial
                                                                                Propietario</a>
                                                                        <?php endif; ?>
                                                                        <?php if ($fisrfc): ?>
                                                                            <a class="btn btn-primary"
                                                                               style="margin-bottom: 5px; "
                                                                               target="_blank"
                                                                               href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $fisrfc; ?>"
                                                                               title="Escritura Compra-Venta"><i
                                                                                        class="fa fa-file"></i>
                                                                                Escritura Compra-Venta</a>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-group">

                                                                    <!-- AQUI TODOS LOS INPUTS -->

                                                                        <div class="form-group col-md-4" id="NOMBRE">
                                                                            <label for="varchar"> Nombre del propietario *</label>
                                                                            <input required name="Nombre_Propietario" placeholder="Nombre" readonly class="form-control" value="<?php echo $nombrepropietariodp; ?>"/>
                                                                        </div>
                                                                       
                                                                        <div class="form-group hidden col-md-4">
                                                                            <label for="varchar"> Nombre del solicitante </label> <label>*</label>
                                                                            <input required name="" placeholder="Nombre" readonly class="form-control" value="<?php echo $nombrepropietariodp; ?>"/>
                                                                        </div>
                                                                       
                                                                        <div class="form-group col-md-4 hidden" id="FECHA_SOLICITUD">
                                                                            <label for="date">Fecha de solicitud </label> <label>*</label>
                                                                            <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" style="pointer-events:none;">
                                                                                <input value="<?php
                                                                                if ($fechaesc) {
                                                                                    $phpdate = strtotime($fechaesc);
                                                                                    $mysqldate = date('d-m-Y', $phpdate);
                                                                                    echo $mysqldate;
                                                                                }
                                                                                ?>" class="form-control" placeholder="fecha de solicitud" required type="text" readonly name="fecha_solicitud">
                                                                                <span class="input-group-btn">
                                                                                    <button class="btn btn-primary btn-outline" type="button" readonly>
                                                                                        <i class="fa fa-calendar"></i>
                                                                                    </button>
                                                                                </span>    
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group col-md-4" id="CARACTER">
                                                                            <label for="varchar">En Su Caracter*</label>
                                                                            <select class="form-control" style="text-transform: uppercase;" tabindex="-1" required name="Caracter">
                                                                                <?php if ($caracter): ?>
                                                                                    <option value="<?php echo $caracter; ?>"><?php echo $caracter; ?></option>
                                                                                <?php else: ?>
                                                                                    <option value="Propietario">Propietario</option>
                                                                                <?php endif; ?>
                                                                                <option value="Copropietarios">Copropietarios</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group col-md-4" id="COPROPIETARIOS">
                                                                            <label for="varchar">Co-propietario Nombre </label> <label>*</label>
                                                                            <input autocomplete="off" value="<?php echo $copro; ?>" id="copropietarios_text" name="Copropietarios" title="Ingrese el nombre del co-propietario si es necesario" placeholder="Nombre Co-propietario" style="text-transform:uppercase;" pattern="[A-Z0-9 .-,/]+" class="form-control"/>
                                                                        </div>

                                                                        <div class="form-group col-md-4 hidden" id="COLONIA">
                                                                            <label for="varchar">Colonia </label> <label>*</label>
                                                                            <input id="coloniaui" name="Colonia" placeholder="Colonia" style="text-transform:uppercase;" pattern="[A-Z0-9 .-,/]+" class="form-control"/>
                                                                        </div>
                                                                                
                                                                        <div class="form-group col-md-4 hidden" id="CALLEE">
                                                                            <label for="varchar">Calle </label> <label>*</label>
                                                                            <input autocomplete="off" value="<?php echo $calleui; ?>" id="CALLE" name="Calle" title="Ingrese la calle si es necesario" placeholder="Calle" style="text-transform:uppercase;" pattern="[A-Z0-9 .-,/]+" class="form-control"/>
                                                                        </div>

                                                                        <div class="form-group col-md-4 hidden" id="NUMERO_EXTERIOR">
                                                                            <label for="varchar">N&uacute;mero Exterior </label> <label></label>
                                                                            <input autocomplete="off" value="<?php echo $nooficialui != "" ? $nooficialui : "S/N"; ?>" name="Numero_Exterior" title="" placeholder="N&uacute;mero exterior" style="text-transform:uppercase;" pattern="[A-Z0-9 .-,/]+" class="form-control"/>
                                                                        </div>

                                                                        <div class="form-group col-md-4 hidden" id="NUMERO_INERIOR">
                                                                            <label for="varchar">N&uacute;mero Interior </label> <label>*</label>
                                                                            <input autocomplete="off" value="<?php echo $nooficialinui; ?>"  name="nooficialinui" title="" placeholder="N&uacute;mero interior" style="text-transform:uppercase;" pattern="[A-Z0-9 .-,/]+" class="form-control"/>
                                                                        </div>

                                                                        <div class="form-group col-md-4 infonavit" id="MANZANA">
                                                                            <label for="varchar">Manzana </label> <label></label>
                                                                            <input autocomplete="off" value="<?php echo $nomanzanaui; ?>" name="Manzana" title="" placeholder="Manzana" style="text-transform:uppercase;" pattern="[A-Z0-9 .-,/]+" class="form-control"/>
                                                                        </div>

                                                                        <div class="form-group col-md-4 infonavit" id="LOTE">
                                                                            <label for="varchar">N&uacute;mero de Lote </label> <label></label>
                                                                            <input autocomplete="off" value="<?php echo $noloteui; ?>" name="Numero_Lote" title="" placeholder="Lote" style="text-transform:uppercase;" pattern="[A-Z0-9 .-,/]+" class="form-control"/>
                                                                        </div>

                                                                        <div class="form-group col-md-4 parce" id="PARCELA">
                                                                            <label for="varchar">Parcela </label> <label>*</label>
                                                                            <input autocomplete="off" value="" name="Numero_Parcela" title="" placeholder="Parcela" style="text-transform:uppercase;" pattern="[A-Z0-9 .-,/]+" class="form-control"/>
                                                                        </div>

                                                                        <div class="form-group col-md-4" id="SUPER">
                                                                            <label for="varchar"> Superficie del terreno </label> <label>*</label>
                                                                            <input autocomplete="off" type="number" step="0.0001" id="SUPERFICIE" value="<?php echo $supsiac; ?>" required name="Superficie" placeholder="superficie" class="form-control"/>
                                                                        </div>

                                                                        <div class="form-group col-md-2" id="SUPER_RADIOS">
                                                                            <label for="varchar">Superfice</label> <label>*</label>
                                                                            <br>
                                                                            m²
                                                                            <input <?php echo $supciact == 1 ? 'checked' : ""; ?> required value="m2" name="tipo_sup" type="radio">
                                                                            &nbsp;&nbsp;ha
                                                                            <input <?php echo $supciact == 2 ? 'checked' : ""; ?> required value="ha" name="tipo_sup" type="radio">
                                                                        </div>

                                                                        <div class="form-group hidden col-md-4" id="TIPO_TRAMITE">
                                                                            <label for="varchar"> Tipo de tramite </label> <label>*</label>
                                                                            <input autocomplete="off" hidden id="tipotramite" required style="text-transform:uppercase;" name="Tipo_Tramite" placeholder="" class="form-control"/>
                                                                        </div>

                                                                        <div class="form-group hidden col-md-4">
                                                                            <label for="varchar"> Asunto </label> <label>*</label>
                                                                            <input autocomplete="off" id="asunto" required style="text-transform:uppercase;" pattern="[A-Z0-9 .,-/]+" name="tipotramitedp" placeholder="" class="form-control"/>
                                                                        </div>

                                                                        <div class="form-group hidden col-md-4">
                                                                            <label for="varchar"> Predial </label> <label>*</label>
                                                                            <input autocomplete="off" id="pred" required style="text-transform:uppercase;" pattern="[A-Z0-9 .,-/]+" name="Numero_Predial" placeholder="" class="form-control"/>
                                                                        </div>


                                                                        <!--<div class="form-group hiddencol-md-4" id="CONSTANCIA">
                                                                            <label for="varchar"> Constancia </label> <label>*</label>
                                                                            <input autocomplete="off" style="text-transform:uppercase;" name="" placeholder="Constancia" class="form-control"/>
                                                                        </div>-->

                                                                        <div class="form-group col-md-4 cor" id="CORETT">
                                                                            <label for="varchar"> Contrato corett </label> <label>*</label>
                                                                            <input autocomplete="off" value="" style="text-transform:uppercase;" pattern="[A-Z0-9 .,-/]+" name="Contrato_CORETT" placeholder="" class="form-control"/>
                                                                        </div>

                                                                        <div class="form-group col-md-4 sentju" id="NOMBRE_JUEZ">
                                                                            <label for="varchar"> Nombre Juez </label> <label>*</label>
                                                                            <input autocomplete="off" value="" style="text-transform:uppercase;" pattern="[A-Z0-9 .,-/]+" name="Nombre_Juicio_Juez" placeholder="" class="form-control"/>
                                                                        </div>

                                                                        <div class="form-group col-md-4 sentju" id="NUMERO_JUICIO">
                                                                            <label for="varchar"> N&uacute;mero juicio </label> <label>*</label>
                                                                            <input autocomplete="off" value="" style="text-transform:uppercase;" pattern="[A-Z0-9 .,-/]+" name="Numero_Juicio" placeholder="" class="form-control"/>
                                                                        </div>

                                                                        <div class="form-group col-md-4 infonavit" id="NUMERO_TITULO">
                                                                            <label for="varchar"> N&uacute;mero T&iacute;tulo </label> <label>*</label>
                                                                            <input autocomplete="off" value="" style="text-transform:uppercase;" pattern="[A-Z0-9 .,-/]+" name="Numero_Titulo" placeholder="" class="form-control"/>
                                                                        </div>

                                                                        <div class="form-group col-md-4 infonavit" id="NUMERO_INFONAVIT">
                                                                            <label for="varchar"> N&uacute;mero INFONAVIT </label> <label>*</label>
                                                                            <input autocomplete="off" value="" style="text-transform:uppercase;" pattern="[A-Z0-9 .,-/]+" name="Numero_INFONAVIT" placeholder="" class="form-control"/>
                                                                        </div>

                                                                        <div class="form-group col-md-4 imuvii" id="SOLICITUD_IMUVII">
                                                                            <label for="varchar"> Solicitud IMUVII </label> <label>*</label>
                                                                            <input autocomplete="off" value="" style="text-transform:uppercase;" pattern="[A-Z0-9 .,-/]+" name="Solicitud_IMUVII" placeholder="" class="form-control"/>
                                                                        </div>

                                                                        <div class="form-group col-md-4 imuvii" id="ENCARGADO_IMUVII">
                                                                            <label for="varchar"> Nombre encargado IMUVII </label> <label>*</label>
                                                                            <input autocomplete="off" value="" style="text-transform:uppercase;" pattern="[A-Z0-9 .,-/]+" name="Nombre_Encargado_IMUVII" placeholder="" class="form-control"/>
                                                                        </div>

                                                                      

                                                                        <div class="form-group col-md-4 escpu prop" id="NUMERO_ESCRITURA_PUBLICA">
                                                                            <label for="varchar"> Número de Escritura </label> <label>*</label>
                                                                            <input autocomplete="off" value="<?php echo $noescri; ?>" style="text-transform:uppercase;" pattern="[A-Z0-9 .,-/]+" name="Numero_Escritura" placeholder="Número Escritura" class="form-control"/>
                                                                        </div>
                                                                        
                                                                        <div class="form-group col-md-4 escpu egi" id="NOMBRE_NOTARIO">
                                                                            <label for="varchar"> Nombre del Notario Público </label>  <label>*</label>
                                                                            <input autocomplete="off" value="<?php echo $notario; ?>"  style="text-transform:uppercase;" pattern="[A-Za-z0-9ÑÁÉÍÓÚáéíóúñ .,-/]+" name="Nombre_Notario" placeholder="Nombre del Notario Público" class="form-control"/>
                                                                        </div>

                                                                        <div class="form-group col-md-4 escpu" id="NUMERO_NOTARIO">
                                                                            <label for="varchar">Número de Notario Público </label> <label>*</label>
                                                                            <input autocomplete="off" value="<?php echo $nonotario; ?>"  name="Numero_Notario" placeholder="Número de Notario Público" style="text-transform:uppercase;" pattern="[A-Za-z0-9 -,./]+" class="form-control"/>
                                                                        </div>

                                                                        <div class="form-group col-md-4 escpu egi prop" id="FECHA_ESCRITURAS">
                                                                            <label for="date">Fecha de Escrituras </label>  <label>*</label>
                                                                            <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy">
                                                                                <input value="<?php
                                                                                if ($fechaesc) {
                                                                                    $phpdate = strtotime($fechaesc);
                                                                                    $mysqldate = date('d-m-Y', $phpdate);
                                                                                    echo $mysqldate;
                                                                                }
                                                                                ?>" class="form-control" placeholder="fecha de escrituras"  type="text" name="Fecha_Escritura">
                                                                                <span class="input-group-btn">
                                                                                    <button class="btn btn-primary btn-outline" type="button">
                                                                                        <i class="fa fa-calendar"></i>
                                                                                    </button>
                                                                                </span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group col-md-4 hidden" id="ESTADO_ESCRITURA">
                                                                            <label for="varchar">Estado de Escritura</label>  <label>*</label>
                                                                            <select class="form-control" style="text-transform:uppercase;" tabindex="-1"  name="estado">
                                                                                <?php if ($estado): ?>
                                                                                    <option value="<?php echo $estado; ?>"><?php echo $estado; ?></option>
                                                                                <?php else: ?>
                                                                                    <option value="Guanajuato">Guanajuato</option>
                                                                                <?php endif; ?>
                                                                                <option value="Aguascalientes">Aguascalientes</option>
                                                                                <option value="Baja California">Baja California</option>
                                                                                <option value="Baja California Sur">Baja California Sur</option>
                                                                                <option value="Campeche">Campeche</option>
                                                                                <option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
                                                                                <option value="Colima">Colima</option>
                                                                                <option value="Chiapas">Chiapas</option>
                                                                                <option value="Chihuahua">Chihuahua</option>
                                                                                <option value="Ciudad de México">Ciudad de México</option>
                                                                                <option value="Durango">Durango</option>
                                                                                <option value="Guerrero">Guerrero</option>
                                                                                <option value="Hidalgo">Hidalgo</option>
                                                                                <option value="Jalisco">Jalisco</option>
                                                                                <option value="Estado de México">Estado de México</option>
                                                                                <option value="Michoacán de Ocampo">Michoacán de Ocampo</option>
                                                                                <option value="Morelos">Morelos</option>
                                                                                <option value="Nayarit">Nayarit</option>
                                                                                <option value="Nuevo León">Nuevo León</option>
                                                                                <option value="Oaxaca">Oaxaca</option>
                                                                                <option value="Puebla">Puebla</option>
                                                                                <option value="Querétaro">Querétaro</option>
                                                                                <option value="Quintana Roo">Quintana Roo</option>
                                                                                <option value="San Luis Potosí">San Luis Potosí</option>
                                                                                <option value="Sinaloa">Sinaloa</option>
                                                                                <option value="Sonora">Sonora</option>
                                                                                <option value="Tabasco">Tabasco</option>
                                                                                <option value="Tamaulipas">Tamaulipas</option>
                                                                                <option value="Tlaxcala">Tlaxcala</option>
                                                                                <option value="Veracruz">Veracruz</option>
                                                                                <option value="Yucatán">Yucatán</option>
                                                                                <option value="Zacatecas">Zacatecas</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-4f hidden" id="CIUDAD_ESCRITURA">
                                                                            <label for="varchar">Ciudad de Escritura </label> <label>*</label>
                                                                            <input autocomplete="off"
                                                                                <?php if($ciudad != '' || $ciudad != 'Null'): ?>
                                                                                    value="<?php echo $ciudad; ?>"
                                                                                <?php else:?>
                                                                                    value="IRAPUATO"
                                                                                <?php endif;?>
                                                                                 name="ciudad" placeholder="Ciudad De Escritura" style="text-transform:uppercase;" pattern="[A-Z0-9 -.,/Ñ�?É�?ÓÚ]+" class="form-control" autocomplete="on"/>
                                                                        </div>

                                                                        <div class="form-group col-md-4" id="CLAVE_CATASTRAL">
                                                                            <label for="varchar"> Clave Catastral </label> <label>*</label>
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" autocomplete="off" pattern="[0-9]{15,18}" required id="clavenueva" name="Clave_Catastral" placeholder="Clave Catastral" class="form-control" value="<?php echo $clave == "" ? "017" : $clave; ?>" maxlength="18" minlength="15"/>
                                                                                <span class="input-group-addon">
                                                                                    <a title="Dar click para buscar si la clave ya esta registrada" id="check-clave" class=" btn-md success">
                                                                                        <i class="fa fa-search"></i>
                                                                                    </a>
                                                                                </span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group col-md-4" id="NUMERO_EXPEDIENTE">
                                                                            <label for="varchar"> Número de expediente </label> <label>*</label>
                                                                            <input autocomplete="off" readonly style="text-transform:uppercase;" pattern="[A-Z0-9 -,./]+" required name="Numero_Seguimiento" placeholder="Número de Expediente " value="<?php echo $numerocontrol; ?>" class="form-control"/>
                                                                        </div>

                                                                        <div class="form-group col-md-4">
                                                                            <label for="varchar">Número de Oficio</label> <label>*</label>
                                                                            <input autocomplete="off" value="<?php echo $nooficio; ?>" style="text-transform:uppercase;" pattern="[A-Z0-9 -.,/]+" required name="ID_Numero_Oficio" placeholder="Número de Oficio " class="form-control"/>
                                                                        </div>

                                                                        <div class="form-group col-md-4 parce" id="FECHA_CERTIFICADO_PARCELARIO">
                                                                            <label for="date">Fecha de Certificado Parcelario</label>  <label>*</label>
                                                                            <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy">
                                                                                <input name="fecha_certi_parce" value="" class="form-control" placeholder="FECHA DE CERTIFICADO PARCELARIO"  type="text" name="Fecha_Certi_Parce">
                                                                                <span class="input-group-btn">
                                                                                    <button class="btn btn-primary btn-outline" type="button">
                                                                                        <i class="fa fa-calendar"></i>
                                                                                    </button>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-4 parce">
                                                                            <label for="varchar">Número de Certificado Parcelario</label> <label>*</label>
                                                                            <input name="certi_parcelario" autocomplete="off" type="number" style="text-transform:uppercase;"  required placeholder="NÚMERO DE CERTIFICADO PARCELARIO" class="form-control"/>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr> 
                                                            <tr>
                                                                <td>
                                                                    <div class="form-group col-md-12 escpu">
                                                                        <label>Por favor indicar si la propiedad se encuentra en régimen</label>
                                                                        <br>
                                                                        <div class="col-md-12" id="Area_P_Container" style="margin-bottom:10px;">
                                                                            <input <?php echo $areap == 1 ? 'checked' : ""; ?> type="checkbox" id="priv" value="Área Privativa">
                                                                            &Aacute;rea Privativa 
                                                                            <input id="privt" name="privt" class="<?php echo $areap == 1 ? '' : "hidden"; ?>" type="text" autocomplete="off" value="<?php echo $areapt; ?>">
                                                                        </div>
                                                                        
                                                                        <div class="col-md-12 " style="margin-bottom:10px;">
                                                                            <input <?php echo $areac == 1 ? 'checked' : ""; ?> type="checkbox" name="Comun" id="com" value="Área Común">
                                                                            &Aacute;rea Común 
                                                                            <input name="Area_Comun" id="comt" name="comt" class="<?php echo $areac == 1 ? '' : "hidden"; ?>" type="text" autocomplete="off" value="<?php echo $areact; ?>">
                                                                        </div>

                                                                        <div class="col-md-12 hidden" id="Area_C_Container" style="margin-bottom:10px;">
                                                                            <div class="col-md-6">
                                                                                <input <?php echo $acc == 1 ? 'checked' : ""; ?> type="checkbox" name="Cubiertac" id="Cub" value="Área Común Cubierta">
                                                                                &Aacute;rea Común Cubierta 
                                                                                <input name="Area_Comun_Cubierta" id="Cubt" name="Cubt" class="<?php echo $acc == 1 ? '' : "hidden"; ?>" type="text" autocomplete="off" value="<?php echo $acct; ?>">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <input <?php echo $acd == 1 ? 'checked' : ""; ?> type="checkbox" name="Cubiertad" id="Cub1" value="Área Común Descubierta"> 
                                                                                &Aacute;rea Común Descubierta
                                                                                <input name="Cubiertatd" id="Cubt1" name="Cubt1" class="<?php echo $acd == 1 ? '' : "hidden"; ?>" autocomplete="off" type="text" value="<?php echo $acdt; ?>">
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-md-12" id="Tot_In_Container" style="margin-bottom:10px;">
                                                                            <input <?php echo $totalind == 1 ? 'checked' : ""; ?>type="checkbox" name="indivisot" id="indt" value="Total Indiviso">
                                                                            Total Indiviso
                                                                            <input name="Total_Indiviso" id="indtt" name="indtt" class="<?php echo $totalind == 1 ? '' : "hidden"; ?>" type="text" autocomplete="off" value="<?php echo $totalindt; ?>">
                                                                            <br>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-12">
                                                                            <div class="col-md-6 hidden" id="Por_In_Container" style="margin-bottom:10px;">
                                                                                <input <?php echo $porcent == 1 ? 'checked' : ""; ?> type="checkbox" name="Indivisop" id="indp" value="Porcenta">
                                                                                Porcentaje Indiviso 
                                                                                <input name="Porcentaje_Indiviso" id="indpt" name="indpt" class="<?php echo $porcent == 1 ? '' : "hidden"; ?>" type="text" autocomplete="off" value="<?php echo $porcentt; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                        <script>
                                                                        //validaciones


                                                                        $('#SUPERFICIE').on('input', function () { 
                                                                            //this.value = this.value.replace(/[0-9]+(.)?\d{1,4}/g,'');
                                                                        });
                                                                        $('#privt').on('input', function () { 
                                                                            this.value = this.value.replace(/[^0-9]/g,'');
                                                                        });
                                                                        $('#comt').on('input', function () { 
                                                                            this.value = this.value.replace(/[^0-9]/g,'');
                                                                        });
                                                                        $('#Cubt').on('input', function () { 
                                                                            this.value = this.value.replace(/[^0-9]/g,'');
                                                                        });
                                                                        $('#Cubt1').on('input', function () { 
                                                                            this.value = this.value.replace(/[^0-9]/g,'');
                                                                        });
                                                                         $('#indtt').on('input', function () { 
                                                                            this.value = this.value.replace(/[^0-9]/g,'');
                                                                        });
                                                                        $('#indpt').on('input', function () { 
                                                                            this.value = this.value.replace(/[^0-9]/g,'');
                                                                        });
                                                                        </script>

                                                                        
                                                                        <script>

                                                                            $("#priv").on("click", function () {
                                                                                if ($("#privt").hasClass('hidden')) {
                                                                                    $("#privt").removeClass('hidden');
                                                                                } else {
                                                                                    $("#privt").addClass('hidden');
                                                                                    $("#privt").val("");
                                                                                }
                                                                            });
                                                                            $("#com").on("click", function () {
                                                                                if ($("#comt").hasClass('hidden')) {
                                                                                    $("#comt").removeClass('hidden');
                                                                                    $("#Area_C_Container").removeClass('hidden');
                                                                                    
                                                                                } else {
                                                                                    $("#comt").addClass('hidden');
                                                                                    $("#Area_C_Container").addClass('hidden');
                                                                                    $("#Cubt").addClass('hidden');
                                                                                    $("#Cubt1").addClass('hidden');
                                                                                    $("#Cubt").val("");
                                                                                    $("#Cubt1").val("");
                                                                                    $("#comt").val("");
                                                                                    $("#Cub").prop('checked', false); 
                                                                                    $("#Cub1").prop('checked', false); 
                                                                                }
                                                                            });
                                                                            $("#Cub").on("click", function () {
                                                                                if ($("#Cubt").hasClass('hidden')) {
                                                                                    $("#Cubt").removeClass('hidden');
                                                                                } else {
                                                                                    $("#Cubt").addClass('hidden');
                                                                                    $("#Cubt").val("");
                                                                                }
                                                                            });
                                                                            $("#Cub1").on("click", function () {
                                                                                if ($("#Cubt1").hasClass('hidden')) {
                                                                                    $("#Cubt1").removeClass('hidden');
                                                                                } else {
                                                                                    $("#Cubt1").addClass('hidden');
                                                                                    $("#Cubt1").val("");
                                                                                }
                                                                            });
                                                                            $("#indt").on("click", function () {
                                                                                if ($("#indtt").hasClass('hidden')) {
                                                                                    $("#indtt").removeClass('hidden');
                                                                                    $("#Por_In_Container").removeClass('hidden');
                                                                                    
                                                                                } else {
                                                                                    $("#indtt").addClass('hidden');
                                                                                    $("#Por_In_Container").addClass('hidden');
                                                                                    $("#indp").prop('checked', false); 
                                                                                    $("#indpt").addClass('hidden');
                                                                                    
                                                                                    $("#indtt").val("");
                                                                                    $("#indpt").val("");
                                                                                    
                                                                                }
                                                                            });
                                                                            $("#indp").on("click", function () {
                                                                                if ($("#indpt").hasClass('hidden')) {
                                                                                    $("#indpt").removeClass('hidden');
                                                                                } else {
                                                                                    $("#indpt").addClass('hidden');
                                                                                    $("#indpt").val("");
                                                                                }
                                                                            });
                                                                        </script>
                                                                    
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                      <div class="form-group col-md-12" id="OBSERVACIONES">
                                                                            <label for="observaciones">Observaciones</label>
                                                                            <textarea rows="5" class="form-control" name="Observaciones" style="text-transform:uppercase;">
                                                                                <?php echo $observaciones; ?>
                                                                            </textarea>
                                                                        </div>
                                                                    <div class="form-group col-sm-6">
                                                                        <label>Imagen Croquis</label>                                   
                                                                        <input name="autocat" id="autocat" type="file" multiple />
                                                                        <input type="button" onclick="uploadFile()" value="Subir Archivo" />
                                                                        <input type="hidden" id="Croquis_URL" name="Croquis_URL" />
                                                                    </div>
                                                                </td>
                                                            </tr>


                                                            </tbody>
                                                        </table>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">

                                            <button type="submit" class="btn btn-success">Generar Documento Final
                                            </button>
                                            <button type="button" data-dismiss="modal" class="btn dark btn-outline">
                                                Cerrar
                                            </button>
                                        </div>