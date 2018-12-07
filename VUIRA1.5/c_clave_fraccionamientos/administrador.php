

	<!DOCTYPE html>
	<html lang="es">

	<head>
		<meta charset="UTF-8">

		<title> SIPREG </title>
		<meta name="description" content="">
		<link rel="shortcut icon" href="/img/irapuato.png">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!--#region CSS  -->

		<style>
			/* Loading Spinner */
			.spinner {
				margin: 0;
				width: 70px;
				height: 18px;
				margin: -35px 0 0 -9px;
				position: absolute;
				top: 50%;
				left: 50%;
				text-align: center
			}

			.spinner>div {
				width: 18px;
				height: 18px;
				background-color: #333;
				border-radius: 100%;
				display: inline-block;
				-webkit-animation: bouncedelay 1.4s infinite ease-in-out;
				animation: bouncedelay 1.4s infinite ease-in-out;
				-webkit-animation-fill-mode: both;
				animation-fill-mode: both
			}

			.spinner .bounce1 {
				-webkit-animation-delay: -.32s;
				animation-delay: -.32s
			}

			.spinner .bounce2 {
				-webkit-animation-delay: -.16s;
				animation-delay: -.16s
			}

			@-webkit-keyframes bouncedelay {
				0%,
				80%,
				100% {
					-webkit-transform: scale(0.0)
				}
				40% {
					-webkit-transform: scale(1.0)
				}
			}

			@keyframes bouncedelay {
				0%,
				80%,
				100% {
					transform: scale(0.0);
					-webkit-transform: scale(0.0)
				}
				40% {
					transform: scale(1.0);
					-webkit-transform: scale(1.0)
				}
			}

		</style>

		<!-- Favicons -->

		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/icons/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/icons/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/icons/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="assets/images/icons/apple-touch-icon-57-precomposed.png">
		<link rel="shortcut icon" href="img/logoIrapuato.png">

		<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="assets/bootstrap/js/popper.min.js"></script>

		<!-- Admin theme -->

		<link rel="stylesheet" type="text/css" href="assets/themes/admin/layout.css">
		<link rel="stylesheet" type="text/css" href="assets/themes/admin/color-schemes/default.css">

		<!-- Components theme -->

		<link rel="stylesheet" type="text/css" href="assets/themes/components/default.css">
		<link rel="stylesheet" type="text/css" href="assets/themes/components/border-radius.css">

		<!-- Admin responsive -->

		<link rel="stylesheet" type="text/css" href="assets/helpers/responsive-elements.css">
		<link rel="stylesheet" type="text/css" href="assets/helpers/admin-responsive.css">

		<!-- HELPERS -->

		<link rel="stylesheet" type="text/css" href="assets/helpers/animate.css">
		<link rel="stylesheet" type="text/css" href="assets/helpers/backgrounds.css">
		<link rel="stylesheet" type="text/css" href="assets/helpers/boilerplate.css">
		<link rel="stylesheet" type="text/css" href="assets/helpers/border-radius.css">
		<link rel="stylesheet" type="text/css" href="assets/helpers/grid.css">
		<link rel="stylesheet" type="text/css" href="assets/helpers/page-transitions.css">
		<link rel="stylesheet" type="text/css" href="assets/helpers/spacing.css">
		<link rel="stylesheet" type="text/css" href="assets/helpers/typography.css">
		<link rel="stylesheet" type="text/css" href="assets/helpers/utils.css">
		<link rel="stylesheet" type="text/css" href="assets/helpers/colors.css">
		<link rel="stylesheet" type="text/css" href="assets/elements/images.css">

		<!-- SNIPPETS -->

		<link rel="stylesheet" type="text/css" href="assets/snippets/login-box.css">
		<link rel="stylesheet" type="text/css" href="assets/snippets/user-profile.css">
		<link rel="stylesheet" type="text/css" href="assets/snippets/mobile-navigation.css">

		<!-- ELEMENTS -->

		<link rel="stylesheet" type="text/css" href="assets/elements/badges.css">
		<link rel="stylesheet" type="text/css" href="assets/elements/buttons.css">
		<link rel="stylesheet" type="text/css" href="assets/elements/content-box.css">
		<link rel="stylesheet" type="text/css" href="assets/elements/dashboard-box.css">
		<link rel="stylesheet" type="text/css" href="assets/elements/forms.css">

		<!-- ICONS -->

		<link rel="stylesheet" type="text/css" href="assets/icons/fontawesome/fontawesome.css">
		<link rel="stylesheet" type="text/css" href="assets/icons/linecons/linecons.css">
		<link rel="stylesheet" type="text/css" href="assets/icons/spinnericon/spinnericon.css">

		<link rel="stylesheet" type="text/css" href="assets/widgets/accordion-ui/accordion.css">

		<!-- WIDGETS -->

    <link rel="stylesheet" type="text/css" href="assets/widgets/modal/modal.css">
		<link rel="stylesheet" type="text/css" href="assets/widgets/dropdown/dropdown.css">

	<link rel="stylesheet" type="text/css" href="css/global.css">
		<!--#endregion -->

		<!--#region JS  -->

		<!-- JQuery -->
		<script type="text/javascript" src="assets/js-core/jquery-core.js"></script>

		<!-- Bootstrap -->
		<script type="text/javascript" src="assets/bootstrap/js/bootstrap.js"></script>

		<!-- JQuery UI -->
		<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
		<!-- <script type="text/javascript" src="assets/js-core/jquery-ui-core.js"></script> -->

		<script type="text/javascript" src="assets/js-core/modernizr.js"></script>
		<script type="text/javascript" src="js/funciones.js"></script>


		<script type="text/javascript">
			$(window).load(function () {
				setTimeout(function () {
					$('#loading').fadeOut(400, "linear");
				}, 300);
			});

			$(function () {
			  $('[data-toggle="tooltip"]').tooltip()
			});


		</script>

		<!--#endregion -->

	</head>


  	<body>
  		<!-- <div id="sb-site"> -->
  			<div id="baseUrl" base-url=""></div>
  			<div id="loading">
  				<div class="spinner">
  					<div class="bounce1"></div>
  					<div class="bounce2"></div>
  					<div class="bounce3"></div>
  				</div>
  			</div>
  			<!-- FIN loading -->

  				<div id="page-wrapper">
  					<div id="page-header" class="bg-gradient-9">
  						<div id="mobile-navigation">
  							<button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar">
  								<span></span>
  							</button>
  							<a href="" class="logo-content-small" title="SIPREG"></a>
  						</div>
  						<div id="header-logo" class="logo-bg">
  							<a href="" class="logo-content-big" title="SIPREG">
  								SIPREG
  								<span>Sistema Integral de Planeación de Recursos Gubernamentales</span>
  							</a>
  							<a href="" class="logo-content-small" title="SIPREG">
  								SIPREG
  								<span>Sistema Integral de Planeación de Recursos Gubernamentales</span>
  							</a>
  							<a id="close-sidebar" href="#" title="Close sidebar">
  								<i class="glyph-icon icon-angle-left"></i>
  							</a>
                          </div>


  						<!-- #header-nav-right -->

  						<div id="header-nav-right">
                  <div class=" dropdown user-account-btnn">
                    <a href="#" title="Soy Administrador" class="user-profile " data-toggle="dropdown">
                      <img width="28" src="assets/image-resources/gravatar.jpg" alt="Administrador">
                    </a>
                    <div class="dropdown-menu ">
                      <div class="box-sm">
                        <div class="login-box clearfix">
                          <div class="user-img">
                            <a href="#" title="" class="change-img">Cambiar foto</a>
                            <img src="assets/image-resources/gravatar.jpg" alt="">
                          </div>
                          <div class="user-info">
                            <span>
															Soy Administrador
                              <i>DTI Desarrollador</i>
                            </span>
                            <a href="#" title="Editar perfíl">Perfíl</a>
                            <a href="#" title="Ver Notificaciones">Notificaciones</a>
                          </div>
                        </div>
                        <div class="divider"></div>
                        <div class="pad5A button-pane button-pane-alt text-center">
                          <a href="logout/" class="btn display-block font-normal btn-danger">
                            <i class="glyph-icon icon-power-off"></i>
                            Salir
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
  							<a href="#" class="hdr-btn iconos" id="fullscreen-btn" title="Pantalla completa">
  								<i class="glyph-icon icon-arrows-alt"></i>
  							</a>

  							<a class="header-btn iconos" id="logout-btn"href="logout/" title="Bloquear">
  								<i class="glyph-icon icon-linecons-lock"></i>
  							</a>

  						</div>
  						<!-- #header-nav-right -->

  					</div>
  				</div>
                  <!-- FIN page-wrapper -->
									<!--#region Menú  -->
									<div id="page-sidebar">
									<div class="scroll-sidebar">
										<ul id="sidebar-menu">
											<li class="header">
												<span>NOMBRE DEL TRÁMITE</span>
											</li>
											<li>
											<li>
												<a href="">
													<i class="glyph-icon icon-ban"></i>
													<span>Acción 1 del Trámite </span>
												</a>
											</li>

											<li class="header">
												<span>IMPUESTOS INMOBILIARIOS</span>
											</li>
											<li>
												<a class="sf-with-ul" href="#" title="Menú 2">
													<i class="glyph-icon icon-home"></i>
													<span>PREDIAL</span>
												</a>
									      <div class="sidebar-submenu">
													<ul >
														<li style="display: block">
															<span>Constancias</span>
														</li>
														<li style="display: block">
																<a href=""><span>Constancia de Propiedad</span></a>
														</li>
														<li style="display: block" class="header">
															<span>Catalogos</span>
														</li>
														<li style="display: block">
															<a href="" title="Cuota minima"><span>Cuota minima</span></a>
														</li>


													</ul>
									      </div>
											</li>


										</ul>
									</div>
									</div>
									<!--#endregion Menú  -->

									<!-- FIN page-sidebar -->

									<div id="page-content-wrapper">
									<div id="page-content">
										<div class="container">
											<h2>Nombre Trámite</h2><br>
											<div id="panel-captura-avaluo" class="panel">
											  <div class="panel-body">
											    <button class="btn btn-success float" title="Guardar Cuenta" id="btnGuardarCtaSuspendida">
											      Guardar Trámite
											        <!-- <i class="glyph-icon icon-save"></i> -->
											    </button>
											    <form id="frmCuentaSuspendida">
											      <div id="panel-fecha_recep" class="content-box border-top border-blue">
											        <div class="content-box-wrapper">
											          <div class="row">
											            <div class="col-md-12">
											              <div class=" col-xs-6 col-md-6">
											                <label class="control-label">Fecha de Recepci&oacute;n</label>
											                <div class='input-prepend input-group' >
											                  <span class="add-on input-group-addon"><i class="glyph-icon icon-calendar"></i></span>
											                    <input type='text' id="date" class="form-control" data-date-format="mm/dd/yy" name="fecha_recepcion" />
											                </div>
											              </div>
											              <div class="col-xs-6 col-md-6" >
											                <center>
											                  <label >No. Consecutivo</label></br>
											                  <label  id="input-num_oficio" name="input-num_oficio" value="">CS - 142/2018</label>
											                </center>
											              </div>
											            </div>
											          </div>
											        </div>
											      </div>


											      <div id="panel-datos-cuenta-suspendida" class="content-box border-top border-blue">
											        <div class="content-box-wrapper">
											          <h3 class="title-hero">I. DATOS DEL SOLICITANTE</h3>
											          <div class="bordered-row">
											            <div class="row">
											              <div class="col-md-12">
											                <div class="col-md-5">
											                  <div class="form-group">
											                    <label class="control-label">Cuenta Predial</label>
											                    <input type="hidden" class="form-control" id="input-cuenta_predial_id" name="cuenta_predial_id" value="" >
											                    <input type="text" class="form-control" id="input-cuenta_predial" name="cuenta_predial" value="" >
											                  </div>
											                  <div class="form-group">
											                    <label class="control-label">Nombre de Propietario</label>
											                    <input type="text" class="form-control" id="input-propietario" name="propietario" value="" >
											                  </div>
											                  <div class="form-group">
											                    <div class="row">
											                      <div class="col-md-12">
											                        <label class="control-label">Nombre de Solicitante</label>
											                      </div>
											                      <div class="col-md-4">
											                        <center>
											                          <label style="font-weight: normal;">Es el Propietario</label>
											                          <input type="checkbox" data-on-color="success" id="check-propietario" name="es_propietario" value="Si">
											                        </center>
											                      </div>
											                      <div class="col-md-8">
											                        <label style="font-weight: normal;">Otro</label>
											                        <input type="text" class="form-control" name="nombre_solicitante" id="input-solicitante" value="" >
											                      </div>
											                    </div>
											                  </div>
											                </div>

											                <div class="col-md-7" id="datossolicitante">
											                  <div class="row">
											                    <div class="col-md-12">
											                      <div class="form-group">
											                        <h5 class="control-label">Domicilio del Solicitante</h5>
											                      </div>
											                    </div>

											                    <div class="col-md-6">
											                      <div class="form-group">
											                        <label class="control-label">Calle</label>
											                        <input type="text" class="form-control" id="input-calle_sol" name="calle_solicitante" value="" >
											                      </div>

											                      <div class="form-group">
											                        <label class="control-label">Col./Fracc./Cond./Barrio/C./Predio/Ejido</label>
											                        <input type="text" class="form-control" id="input-colonia_sol" name="colonia_solicitante" value="" >
											                      </div>

											                      <div class="form-group">
											                        <div class="row">
											                          <div class="col-xs-12 col-md-6">
											                            <label class="control-label">No. Exterior</label>
											                            <input type="text" class="form-control" id="input-num_ext_sol" name="num_ext_solicitante" value="" >
											                          </div>

											                          <div class="col-xs-12 col-md-6">
											                            <label class="control-label">No. Interior</label>
											                            <input type="text" class="form-control" id="input-num_int_sol" name="num_int_solicitante"  value="" >
											                          </div>
											                        </div>
											                      </div>
											                    </div>

											                    <div class="col-md-6">
											                      <div class="form-group">
											                        <label class="control-label">Tel. Particular</label>
											                        <input type="text" class="form-control" id="input-tel_particular_sol" name="telefono_particular_solicitante"  value="" >
											                      </div>

											                      <div class="form-group">
											                        <label class="control-label">Tel. Celular</label>
											                        <input type="text" class="form-control" id="input-cel_particular_sol" name="telefono_celular_solicitante" value="" >
											                      </div>

											                      <div class="form-group">
											                        <label class="control-label">Lote</label>
											                        <input type="text" class="form-control" id="input-lote" name="lote_solicitante" value="" >
											                      </div>
											                    </div>
											                  </div>
											                </div>

											              </div>
											            </div>
											          </div>
											        </div><!-- DIV content-box-wrapper de CUENTAS SUSPENDIDAS-->
											      </div> <!-- DIV PANEL-CUENTA-SUSPENDIDA 1-->

											      <div id="panel-datos-cuenta-suspendida2" class="content-box border-top border-blue">
											        <div class="content-box-wrapper">
											          <h3 class="title-hero">II. IDENTIFICACI&Oacute;N Y UBICACI&Oacute;N DEL INMUEBLE</h3>
											          <div class="bordered-row">
											            <div class="row">
											              <div class="col-md-5">
											                <div class="form-group">
											                  <label class="control-label">Col./Fracc./Cond./Barrio/C./Predio/Ejido</label>
											                  <select class="chosen-select"  data-placeholder="Seleccione una Opción" id="select-colonia_inmueble" name="colonia_id_inmueble" value=""></select>
											                </div>
											                <div class="form-group">
											                  <label class="control-label">Calle</label>
											                  <select type="text" data-placeholder="Seleccione una Opción" class="chosen-select"  id="input-calle_inmueble" name="calle_id_inmueble" value="" ></select>
											                </div>

											              </div>

											              <div class="col-md-7" id="Superficie">
											                <div class="form-group">
											                  <label>Superficie</label>
											                  <div class="row">
											                    <div class="col-xs-6 col-md-6">
											                     <input type="text" class="form-control" id="input-superficie_inmueble" name="superficie_inmueble" value="" >
											                    </div>
											                    <div class="col-xs-3 col-md-6">
											                      <label class="radio-inline"><input type="radio"  id="check-unidad_supM"  class="sup_inmueble_swi" checked name="sup_inmueble_swi" value="M">M<sup>2</sup></label>
											                      <label class="radio-inline"><input type="radio"  id="check-unidad_supH" class="sup_inmueble_swi"  name="sup_inmueble_swi" value="H">HAS</label>
											                    </div>
											                  </div>
											                </div>

											                <div class="form-group" >
											                  <label class="control-label">Uso Actual</label>
											                  <select id="select-uso_actual" name="uso_predio_id" data-placeholder="Seleccione una Opción" class="chosen-select" required autofocus></select>
											                </div>

											              </div><!-- FIN SUPERFICE-->
											            </div>
											          </div>
											        </div>
											      </div>
														<div id="panel-fecha_recep" class="content-box border-top border-blue">
															<div class="content-box-wrapper">
																 <h3 class="title-hero">III. EXPEDIENTES</h3>
																<div class="row">
																	<div class="col-md-6">
																		<div class="form-group">
																			<label for="">Formato de solicitud suscrito por el propietario, representante legal o referente del mismo</label>
																			<input  type="file" name="reporte_fotografico-1[]" id="reporte_fotografico-1" multiple/>
																		</div>
																		<div class="form-group">
																			<label for="">Copia de identificaci&oacute;n oficial de propietario/a</label>
																			<input type="file" name="reporte_fotografico-2[]" id="reporte_fotografico-2" multiple/>
																		</div>

																	</div>
																	<div class="col-md-6">

																		<div class="form-group">
																			<label for="">Copia de t&iacute;tulo de propiedad (para predios r&uacute;sticos)</label>
																			<input type="file" name="reporte_fotografico-6[]" id="reporte_fotografico-6" multiple/>
																		</div>
																		<div class="form-group">
																			<label for="">Copia de recibo predial actualizado o edo. de cuenta</label>
																			<input type="file" name="reporte_fotografico-7" id="reporte_fotografico-7"/>
																		</div>

																	</div>
																</div>
															</div>
														</div>
											    </form>
											  </div>
											</div>
										</div>
																<!-- container -->
															</div>
															<!-- page-content -->


																 <footer class="page-footer font-small special-color-dark pt-4 footer">
																		<div class="container footercontainer">
																			<div class="row">
																				<div class="col-lg-6 col-md-12 footerseccion1">
																					<img src="img/logo_vedablanco.svg" width="45%"></img>
																					<h5 class=" sistema">SIPREG</h5>
																					<p class="nombreSistema">Sistema De Planeación de Recursos Gubernamentales</p>
																				</div>
																				<div class="col-lg-4 offset-lg-2 col-md-12 footerseccion2">
																					<h5 class="white-text sistema espacio">Ayuda</h5><br>
																					<h5 class="list-unstyled list-inline titulo espacio">TECNOLOG&Iacute;AS DE LA INFORMACI&Oacute;N</h5>
																					<div>
																						<i  class="espacio glyphicon glyphicon-map-marker" style="float:left;font-size:18px"></i>
																						<p class="espacio ciudad">Hidalgo #77, Zona Centro</p>
																						<p class="espacio ciudad">Irapuato, Gto. M&eacute;xico</p>
																						<i class="glyphicon glyphicon-earphone "  style="float:left;font-size:18px"> </i>
																						<p class="espacio ciudad">01 (462) 60 69 999 Ext. 2021</p>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="footer-copyright footerfinal">
																			<div class="container" align="center">
																				© Irapuato | Ayuntamiento 2015-2018
																			</div>
																		</div>
																</footer>
																<!-- Footer -->
															</div>
															<!-- page-content-wrapper -->
													</div>
													<!-- FIN sb-site -->
												</body>
											</html>



											<script type="text/javascript">var base_url = "";</script>

											<!-- SELECT CHOSEN-->
											<link rel="stylesheet" type="text/css" href="assets/widgets/chosen/chosen.css">
											<script type="text/javascript" src="assets/widgets/chosen/chosen.js"></script>
											<script type="text/javascript" src="assets/widgets/chosen/chosen-demo.js"></script>

											<!-- INPUT SWITCH -->
											<link rel="stylesheet" type="text/css" href="assets/widgets/input-switch/inputswitch.css">
											<link rel="stylesheet" type="text/css" href="assets/widgets/input-switch/inputswitch-alt.css">
											<link rel="stylesheet" type="text/css" href="assets/widgets/theme-switcher/themeswitcher.css">
											<script type="text/javascript" src="assets/widgets/input-switch/inputswitch.js"></script>



											<!-- DATEPICKER -->
											<link rel="stylesheet" type="text/css" href="assets/widgets/datepicker/datepicker.css">
											<script type="text/javascript" src="assets/widgets/datepicker/datepicker.js"></script>

											<script>
											         $(function()
											         {
											           "use strict"; $('.input-switch').bootstrapSwitch();
											           $("#date").bsdatepicker();
											         });
											</script>
