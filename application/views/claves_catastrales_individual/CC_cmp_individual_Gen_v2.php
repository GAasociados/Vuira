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
																
																	 <div class="form-group hidden col-md-4" id="TIPO_TRAMITE">
                                                                            <label for="varchar"> Tipo de tramite </label> <label>*</label>
                                                                            <input autocomplete="off" hidden id="tipotramite" required style="text-transform:uppercase;" name="Tipo_Tramite" placeholder="" class="form-control"/>
                                                                     </div>
																		
																	 <div class="form-group col-md-4 hidden" id="CALLEE">
                                                                            <label for="varchar">Calle </label> <label>*</label>
                                                                            <input autocomplete="off" value="<?php echo $calleui; ?>" id="CALLE" name="Calle" title="Ingrese la calle si es necesario" placeholder="Calle" style="text-transform:uppercase;" class="form-control"/>
                                                                     </div>
																	 <div class="form-group hidden col-md-4">
                                                                            <label for="varchar"> Asunto </label> <label>*</label>
                                                                            <input autocomplete="off" id="asunto" required style="text-transform:uppercase;" name="tipotramitedp" placeholder="" class="form-control"/>
                                                                     </div>
																	 <div class="form-group col-md-4 hidden" id="NUMERO_EXTERIOR">
                                                                            <label for="varchar">N&uacute;mero Exterior </label> <label></label>
                                                                            <input autocomplete="off" value="<?php echo $nooficialui != "" ? $nooficialui : "S/N"; ?>" name="Numero_Exterior" title="" placeholder="N&uacute;mero exterior" style="text-transform:uppercase;" class="form-control"/>
                                                                     </div>
																	 <?php /*$arraycolonia = $this->Colonias_model->getalladatacoloniabyidpredial($cbocoloniaui); */
																		?>
																	 <div class="form-group col-md-4 imuvii hidden" id="COLONIA">
                                                                            <label for="coloniaui">Colonia </label> <label>*</label>
                                                                            <input type="text" id="coloniaui1" name="Colonia" 
																			value="<?php echo strtoupper($arraycolonia->NOMBRE)=="COLONIA NO ASIGNADA"?$coloniados:strtoupper($arraycolonia->NOMBRE); ?>" 
																			placeholder="Colonia" style="text-transform:uppercase;" class="form-control"/>
                                                                     </div>
																	 <div class="form-group hidden col-md-4">
                                                                            <label for="varchar"> Predial </label> <label>*</label>
                                                                            <input autocomplete="off" id="pred" required style="text-transform:uppercase;"  name="Numero_Predial" placeholder="" class="form-control"/>
                                                                     </div>
																	  <div class="form-group col-md-4 hidden" id="NUMERO_INERIOR">
                                                                            <label for="varchar">N&uacute;mero Interior </label> <label>*</label>
                                                                            <input autocomplete="off" value="<?php echo $nooficialinui; ?>"  name="nooficialinui"  id="nooficialinui2" title="" placeholder="N&uacute;mero interior" style="text-transform:uppercase;"  class="form-control"/>
                                                                      </div>
																	  
																	  <div class="form-group col-md-4 hidden" id="Colonia2">
                                                                            
                                                                            <input autocomplete="off" value="<?php echo $coloniados; ?>"  name="coloniados" id="coloniados" title="" placeholder="N&uacute;mero interior" style="text-transform:uppercase;" class="form-control"/>
                                                                      </div>
																		
                                                                     <div class="form-group">
																		<!-- AQUI TODOS LOS INPUTS -->
																		<?php 
                                          error_reporting(E_ALL);
ini_set("display_errors",1);
                                          include_once("./CC_Modal_Gen/Gen_Template_Modal_Impl.php");

                                          //include("./CC_Modal_Gen/Gen_Template_Data.php"); 
                                      $obj = new Gen_Extractor_Data($ID);
                                    ?>
																		<div class="form-group col-md-4 egi hidden" id="ESTADO_ESCRITURA">
                                                                            <label for="varchar">Estado de Escritura</label>  <label>*</label>
                                                                            
                                                                            <select class="form-control" style="text-transform:uppercase;" tabindex="-1"  name="CE_Estado_Escritura" id="CE_Estado_Escritura">
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
																		<div class="form-group col-md-4 egi hidden" id="CIUDAD_ESCRITURA">

                                                                            <label for="varchar">Ciudad de Escritura </label> <label>*</label>
                                                                            <input <?php if($ciudad != '' || $ciudad != Null): ?>
																						                                            value="<?php echo $ciudad; ?>"
																					                                         <?php else:?>
																						                                            value="Irapuato"
																					                                         <?php endif;?>
                                                                                 name="CE_Ciudad_Escritura" placeholder="Ciudad De Escritura" style="text-transform:uppercase;" class="form-control" autocomplete="on"/>
                                                                        </div>
																		
																		<div class="form-group col-md-4 escpu hidden" id="ESTADO_ESCRITURA2">
                                                                            <label for="varchar">Estado de Escritura</label>  <label>*</label>
                                                                            
                                                                            <select class="form-control" tabindex="-1"  name="Es_Estado_Escritura" id="Estado_Escritura">
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
																		<div class="form-group col-md-4 escpu hidden" id="CIUDAD_ESCRITURA">

                                                                            <label for="varchar">Ciudad de Escritura </label> <label>*</label>
                                                                            <input <?php if($ciudad != '' || $ciudad != Null): ?>
																						                                            value="<?php echo $ciudad; ?>"
																					                                         <?php else:?>
																						                                            value="Irapuato"
																					                                         <?php endif;?>
                                                                                 name="Es_Ciudad_Escritura" placeholder="Es_Ciudad_Escritura" class="form-control" autocomplete="on"/>
                                                                        </div>
																		

                                                                     </div>
																</td>
															</tr>
                                                            <tr>
                                                                <td>
																	
                                                                    <div class="form-group col-md-12 escpu infonavit cor ">
                                                                        <label>Por favor indicar si la propiedad se encuentra en régimen</label>
                                                                        <br>
                                                                        <div class="col-md-12" id="Area_P_Container" style="margin-bottom:10px;">
                                                                            <input <?php echo $areap == 1 ? 'checked' : ""; ?> type="checkbox" id="priv" value="Área Privativa">
                                                                            &Aacute;rea Privativa 
                                                                            <input id="privt" name="privt" class="<?php echo $areap == 1 ? '' : "hidden"; ?>" type="text" autocomplete="off" value="<?php echo ($obj->get_Value_Tramite('Area_Privativa') == null) ? $areapt : $obj->get_Value_Tramite('Area_Privativa'); ?>">
                                                                        </div>
                                                                        
                                                                        <div class="col-md-12 " style="margin-bottom:10px;">
                                                                            <input <?php echo $areac == 1 ? 'checked' : ""; ?> type="checkbox" name="Comun" id="com" value="Área Común">
                                                                            &Aacute;rea Común 
                                                                            <input name="Area_Comun" id="comt" name="comt" class="<?php echo $areac == 1 ? '' : "hidden"; ?>" type="text" autocomplete="off" value="<?php echo ($obj->get_Value_Tramite('Area_Comun') == null) ? $areact : $obj->get_Value_Tramite('Area_Comun'); ?>">
                                                                        </div>

                                                                        <div class="col-md-12 hidden" id="Area_C_Container" style="margin-bottom:10px;">
                                                                            <div class="col-md-6">
                                                                                <input <?php echo $acc == 1 ? 'checked' : ""; ?> type="checkbox" name="Cubiertac" id="Cub" value="Área Común Cubierta">
                                                                                &Aacute;rea Común Cubierta 
                                                                                <input name="Area_Comun_Cubierta" id="Cubt" name="Cubt" class="<?php echo $acc == 1 ? '' : "hidden"; ?>" type="text" autocomplete="off" value="<?php echo ($obj->get_Value_Tramite('Area_Comun_Cubierta') == null) ? $acct : $obj->get_Value_Tramite('Area_Comun_Cubierta'); ?>">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <input <?php echo $acd == 1 ? 'checked' : ""; ?> type="checkbox" name="Cubiertad" id="Cub1" value="Área Común Descubierta"> 
                                                                                &Aacute;rea Común Descubierta
                                                                                <input name="Cubiertatd" id="Cubt1" name="Cubt1" class="<?php echo $acd == 1 ? '' : "hidden"; ?>" autocomplete="off" type="text" value="<?php echo ($obj->get_Value_Tramite('Area_Comun_Descubierta') == null) ? $acdt : $obj->get_Value_Tramite('Area_Comun_Descubierta'); ?>">
                                                                            </div>
																			<div class="form-group col-md-4 hidden" id="NUMERO_EXPEDIENTE">
																				<label for="varchar"> Número de expediente </label> <label>*</label>
																				<input autocomplete="off" readonly style="text-transform:uppercase;" name="Numero_Seguimiento" placeholder="Número de Expediente " value="<?php echo 	$numerocontrol; ?>" class="form-control"/>
																			</div>
                                                                        </div>


                                                                        <div class="col-md-12" id="Tot_In_Container" style="margin-bottom:10px;">
                                                                            <input <?php echo $totalind == 1 ? 'checked' : ""; ?>type="checkbox" name="indivisot" id="indt" value="Total Indiviso">
                                                                            Total Indiviso
                                                                            <input name="Total_Indiviso" id="indtt" name="indtt" class="<?php echo $totalind == 1 ? '' : "hidden"; ?>" type="text" autocomplete="off" value="<?php echo ($obj->get_Value_Tramite('Total_Indiviso') == null) ? $totalindt : $obj->get_Value_Tramite('Total_Indiviso'); ?>">
                                                                            <br>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-12">
                                                                            <div class="col-md-6 hidden" id="Por_In_Container" style="margin-bottom:10px;">
                                                                                <input <?php echo $porcent == 1 ? 'checked' : ""; ?> type="checkbox" name="Indivisop" id="indp" value="Porcenta">
                                                                                Porcentaje Indiviso 
                                                                                <input name="Porcentaje_Indiviso" id="indpt" name="indpt" class="<?php echo $porcent == 1 ? '' : "hidden"; ?>" type="text" autocomplete="off" value="<?php echo ($obj->get_Value_Tramite('Porcentaje_Indiviso') == null) ? $porcentt : $obj->get_Value_Tramite('Porcentaje_Indiviso'); ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                     
																	 <script>
                                                                        //validaciones


                                                                        $('#SUPERFICIE').on('input', function () { 
                                                                            //this.value = this.value.replace(/[0-9]+(.)?\d{1,4}/g,'');
                                                                        });
                                                                        $('#privt').on('input', function () { 
                                                                            this.value = this.value.replace(/[^0-9]\./g,'');
                                                                        });
                                                                        $('#comt').on('input', function () { 
                                                                            this.value = this.value.replace(/[^0-9]\./g,'');
                                                                        });
                                                                        $('#Cubt').on('input', function () { 
                                                                            this.value = this.value.replace(/[^0-9]\./g,'');
                                                                        });
                                                                        $('#Cubt1').on('input', function () { 
                                                                            this.value = this.value.replace(/[^0-9]\./g,'');
                                                                        });
                                                                         $('#indtt').on('input', function () { 
                                                                            this.value = this.value.replace(/[^0-9]\./g,'');
                                                                        });
                                                                        $('#indpt').on('input', function () { 
                                                                            this.value = this.value.replace(/[^0-9]\./g,'');
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
                                                              <div class="form-group col-md-12 sentju" id="Ref_Legal">
                                                                            <label for="Ref_Legal">Referencia legal (descripcion de documentos y situacion jur&iacute;dica)</label>
                                                                            <textarea rows="5" class="form-control" name="Ref_Legal">
                                                                                <?php echo $obj->get_Value_Tramite('Ref_Legal'); ?>
                                                                            </textarea>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                      <div class="form-group col-md-12" id="OBSERVACIONES">
                                                                            <label for="observaciones">Observaciones</label>
                                                                            <textarea rows="5" class="form-control" name="Observaciones" >
                                                                                <?php echo $obj->get_Value_Tramite('Observaciones'); ?>
                                                                            </textarea>
                                                                        </div>
                                                                    <div class="form-group col-sm-6">
                                                                        <label>Imagen Croquis</label>                                   
                                                                        <input name="autocat" id="autocat" type="file" value='Subir Archivo' />
                                                                        <input type="button" onclick="uploadFile()" value="Subir Archivo" />
                                                                        <input type="hidden" id="Croquis_URL" name="Croquis_URL" value="<?php echo $obj->get_Value_Tramite('Croquis_URL'); ?>" />

                                                                        <?php if (($obj->get_Value_Tramite('Croquis_URL')) != null || ($obj->get_Value_Tramite('Croquis_URL')) != ''): ?>
                                                                            <br><b>Archivo subido:</b> <a href="<?php echo("https://vuira.irapuato.gob.mx/".$obj->get_Value_Tramite('Croquis_URL'))?>">Croquis</a>
                                                                        <?php endif;?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                                  </select>


                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-success">Generar Documento Final</button>
    <button type="button" data-dismiss="modal" class="btn dark btn-outline">
        Cerrar
    </button>
</div>

<script>
    $(document).ready(function() {
        $('#CE_Estado_Escritura').val("<?php echo($obj->get_Value_Tramite('CE_Estado_Escritura'));?>"); 
		
		if($("#Numero_Lote").val()=="")
			$("#Numero_Lote").val($("#noloteui").val());
		if($("#Manzana").val()=="")
			$("#Manzana").val($("#nomanzanaui").val());
		if($("#nooficialinui").val()=="")
			$("#nooficialinui2").val($("#nooficialinui").val());
		$("#nooficialinui").focusout(function (){ $("#nooficialinui2").val($("#nooficialinui").val());});
	});
</script>