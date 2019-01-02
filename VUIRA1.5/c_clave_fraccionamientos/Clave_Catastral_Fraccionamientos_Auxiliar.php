<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
?>

<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="UTF-8">
		<title> Auxiliar Clave Catastral Fraccionamientos </title>
		<meta name="description" content="">
		<link rel="shortcut icon" href="../..assets_muni/img/irapuato.png">
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

	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../assets_muni/assets/images/icons/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../assets_muni/images/icons/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../assets_muni/assets/images/icons/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="../../assets_muni/assets/images/icons/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="../../assets_muni/img/logoIrapuato.png">

	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="../../assets_muni/assets/bootstrap/js/popper.min.js"></script>

	<!-- Admin theme -->

	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/themes/admin/layout.css">
	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/themes/admin/color-schemes/default.css">

	<!-- Components theme -->

	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/themes/components/default.css">
	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/themes/components/border-radius.css">

	<!-- Admin responsive -->

	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/helpers/responsive-elements.css">
	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/helpers/admin-responsive.css">

	<!-- HELPERS -->

	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/helpers/animate.css">
	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/helpers/backgrounds.css">
	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/helpers/boilerplate.css">
	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/helpers/border-radius.css">
	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/helpers/grid.css">
	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/helpers/page-transitions.css">
	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/helpers/spacing.css">
	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/helpers/typography.css">
	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/helpers/utils.css">
	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/helpers/colors.css">
	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/elements/images.css">

	<!-- SNIPPETS -->

	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/snippets/login-box.css">
	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/snippets/user-profile.css">
	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/snippets/mobile-navigation.css">

	<!-- ELEMENTS -->

	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/elements/badges.css">
	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/elements/buttons.css">
	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/elements/content-box.css">
	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/elements/dashboard-box.css">
	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/elements/forms.css">

	<!-- ICONS -->

	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/icons/fontawesome/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/icons/linecons/linecons.css">
	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/icons/spinnericon/spinnericon.css">

	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/widgets/accordion-ui/accordion.css">

	<!-- WIDGETS -->

	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/widgets/modal/modal.css">
	<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/widgets/dropdown/dropdown.css">

	<link rel="stylesheet" type="text/css" href="../../assets_muni/css/global.css">				
	<!--#endregion -->

	<!--#region JS  -->

	<!-- JQuery -->
	<script type="text/javascript" src="../../assets_muni/assets/js-core/jquery-core.js"></script>

	<!-- Bootstrap -->
	<script type="text/javascript" src="../../assets_muni/assets/bootstrap/js/bootstrap.js"></script>

	<!-- JQuery UI -->
	<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
	<!-- <script type="text/javascript" src="assets/js-core/jquery-ui-core.js"></script> -->

	<script type="text/javascript" src="../../assets_muni/assets/js-core/modernizr.js"></script>
	<script type="text/javascript" src="../../assets_muni/js/funciones.js"></script>

	<!-- NUESTRO SCRIPT -->
	<script type="text/javascript" src="./../js/view_claves_cat_fraccionamiento.js"></script>

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
	<body onload="event_load_auxiliar()">
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
								<img width="28" src="../../assets_muni/assets/image-resources/gravatar.jpg" alt="Administrador">
							</a>
							<div class="dropdown-menu ">
								<div class="box-sm">
									<div class="login-box clearfix">
										<div class="user-img">
											<a href="#" title="" class="change-img">Cambiar foto</a>
											<img src="../../assets_muni/assets/image-resources/gravatar.jpg" alt="">
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
									<div class="divider">
									</div>
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
							<span>CLAVE CATASTRAL FRACCIONAMIENTOS</span>
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
							<h2>CLAVE CATASTRAL FRACCIONAMIENTOS</h2><br>
							<div id="panel-captura-avaluo" class="panel">
								<div class="panel-body">
									<button class="btn btn-success float" title="Guardar Cuenta" id="btnGuardarFracc" form="form">
										Guardar
										<!-- <i class="glyph-icon icon-save"></i> -->
									</button>
									<button class="btn btn-danger float" title="Cncelar Cuenta" id="btnCancelarFracc" style="position: fixed;bottom: 70px;right: 20px;">
										Cancelar
									</button>
									<form id="form">
										<input type="hidden" name="id" id="id" value="<?php
										if(isset($_GET["Id"]))
										{
											echo $_GET["Id"];
										}
										?>"/>
										<input type="hidden" name="uid" id="uid" value="<?php
										if(isset($_GET['uid']))
										{
											echo $_GET["uid"];
										}
										?>">
										<div id="panel-fecha_recep" class="content-box border-top border-blue">
											<div class="content-box-wrapper">
												<h3 class="title-hero">I. Documentos del Inmueble</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="">Identificación de Propietario INE,Pasaporte,Cédula Profesional)</label>
															<a id="Doc_Identificacion" name="Doc_Identificacion" href="" target="_blank"> Ver Documento </a>
										            	</div>
										            </div>
										            <div class="col-md-6">
										            	<div class="form-group">
										            		<label for="">Oficio de Traza Autorizada por la Dirección General de Desarrollo Territorial</label>
										            		<a id="Doc_Oficio_Traza" name="Doc_Oficio_Traza" href="" target="_blank"> Ver Documento </a>
										            	</div>
										            </div>
										        </div>
										        <div class="row">
										        	<div class="col-md-6">
										        		<div class="form-group">
										        			<label for="">Recibo Predial actualizado general y/o Cuentas Prediales Individuales</label>
										            		<a id="Doc_Resibo_Predial" name="Doc_Resibo_Predial" href="" target="_blank"> Ver Documento </a>
										            	</div>
										            </div>
										            <div class="col-md-6">
										            	<div class="form-group">
										            		<label for="">Plano Digital de Traza Autorizada por la Dirección General de Desarrollo Territorial</label>
										            		<a id="Doc_Plano_Digital" name="Doc_Plano_Digital" href="" target="_blank"> Ver Documento </a>
										            	</div>
										            </div>
										          </div>
										          <div class="row">
										            <div class="col-md-6">
										            	<div class="form-group">
										          			<label for="">Escritura Pública de Propiedad que contenga la Hoja Registral y ampare la Superficie Registrada (en caso de no contener la hoja registral anexar copia de Libertad de Gravamen)</label>
										            		<a id="Doc_Escritura_Publica" name="Doc_Escritura_Publica" href="" target="_blank" > Ver Documento </a>
										            	</div>
										            </div>
										            <div class="col-md-6">
										            	<div class="form-group">
										            		<label for="">Poder Notarial para representación de persona moral</label>
										            		<a id="Doc_Acta" name="Doc_Acta" href="" target="_blank"  > Ver Documento </a>
										            	</div>
										            </div>
										          </div>
										          <div class="row">
										          	<div class="col-md-6">
										          		<div class="form-group">
										            		<label for="" >Presentar Plano físico de Traza autorizada por la Dirección General de Desarrollo Territorial</label>
										            	</div>
										          	</div>
										          </div>
										        </div>
										      </div>


										      <div id="panel-datos-cuenta-suspendida" class="content-box border-top border-blue">
										        <div class="content-box-wrapper">
										        	<h3 class="title-hero">II. IDENTIFICACIÓN Y UBICACIÓN DEL INMUEBLE</h3>
										        	<!-- <div class="alert alert-info" role="alert" align="center">
													  <strong>PLANTILLA</strong>
													</div> -->
										        	<?php include_once ('cmp_inmueble_generar.php')?>
										        </div><!-- DIV content-box-wrapper de CUENTAS SUSPENDIDAS-->
										      </div> <!-- DIV PANEL-CUENTA-SUSPENDIDA 1-->

										      <div id="panel-datos-cuenta-suspendida2" class="content-box border-top border-blue">
										        <div class="content-box-wrapper">
										          <h3 class="title-hero">III. DATOS DEL PROPIETARIO Y/O REPRESENTANTE</h3>
										          <div class="bordered-row">
										            <div class="row">
										              <div class="col-md-5">
										                <div class="form-group">
										                  <label class="control-label">Nombre completo del propietario</label>
										                  <input type="text" class="form-control" id="Propietario" name="Propietario" value="" required></select>
										                </div>
										                <div class="form-group">
										                  <label class="control-label">Correo Electronico</label>
										                  <input type="email" class="form-control" id="Correo_Electronico" name="Correo_Electronico"  value="" required></select>
										                </div>

										              </div>

										              <div class="col-md-7" id="Superficie">
										                <div class="form-group">
										                  <label>Telefono</label>
										                  <div class="row">
										                    <div class="col-xs-6 col-md-6">
										                     <input type="text" class="form-control" id="Telefono" name="Telefono" value="" required>
										                    </div>
										                  </div>
										                </div>
										                <div class="form-group" >
										                  <label class="control-label">Tipo de Tramite que solicita</label>
										                  <select id="tipo_de_tramite" name="tipo_de_tramite" class="chosen-select">
										                  	 <option value="0">Elegir trámite...</option>
											                 <option value="1">Asignación de Claves Catastrales</option>
											                 <option value="2">Modificación de Clave Catastrales</option>
										                  </select>
										                </div>

										              </div><!-- FIN SUPERFICE-->
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
																				<img src="../../assets_muni/img/logo_vedablanco.svg" width="45%"></img>
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
											<?php include_once("modal_pago.php"); ?>
											</body>
										</html>



										<script type="text/javascript">var base_url = "";</script>

										<!-- SELECT CHOSEN-->
										<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/widgets/chosen/chosen.css">
										<script type="text/javascript" src="../../assets_muni/assets/widgets/chosen/chosen.js"></script>
										<script type="text/javascript" src="../../assets_muni/assets/widgets/chosen/chosen-demo.js"></script>

										<!-- INPUT SWITCH -->
										<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/widgets/input-switch/inputswitch.css">
										<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/widgets/input-switch/inputswitch-alt.css">
										<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/widgets/theme-switcher/themeswitcher.css">
										<script type="text/javascript" src="../../assets_muni/assets/widgets/input-switch/inputswitch.js"></script>



										<!-- DATEPICKER -->
										<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/widgets/datepicker/datepicker.css">
										<script type="text/javascript" src="../../assets_muni/assets/widgets/datepicker/datepicker.js"></script>

										<script>
										         $(function()
										         {
										           "use strict"; $('.input-switch').bootstrapSwitch();
										           $("#date").bsdatepicker();
										         });
										</script>
