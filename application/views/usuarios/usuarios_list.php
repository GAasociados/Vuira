<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js">
<![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js">
<![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <title>Funcionarios</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta content="Preview page of Metronic Admin Theme #3 for " name="description" />
  <meta content="" name="author" />
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <link href="<?php echo base_url();?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN THEME GLOBAL STYLES -->
  <link href="<?php echo base_url();?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
  <link href="<?php echo base_url();?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
  <!-- END THEME GLOBAL STYLES -->
  <!-- BEGIN THEME LAYOUT STYLES -->
  <link href="<?php echo base_url();?>assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
  <link href="<?php echo base_url();?>assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
  <!-- END THEME LAYOUT STYLES -->
  <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<body class="page-container-bg-solid">
  <div class="page-wrapper">
    <div class="page-wrapper-row">
      <div class="page-wrapper-top">
        <!-- BEGIN HEADER -->
        <?php $this->load->view('base/header'); ?>
        <!-- END HEADER -->
      </div>
    </div>
    <div class="page-wrapper-row full-height">
      <div class="page-wrapper-middle">
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
          <!-- BEGIN CONTENT -->
          <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
              <div class="container-fluid">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                  <h1>Listado de Funcionarios</h1>
                </div>
                <!-- END PAGE TITLE -->
              </div>
            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE CONTENT BODY -->
            <div class="page-content">
              <div class="container-fluid">
                <!-- BEGIN PAGE CONTENT INNER -->
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">
                            <?php //echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <!-- -->

                    <div class="col-md-3 text-right">
                    
                    </div>
                </div>
                
                <a href="<?php echo base_url(); ?>infotramites/info_permisos_de_anuncios_autosoportados_azoteas" class="btn btn-primary">Regresar</a>
                <div class='portlet box blue'>
                  <div class='portlet-title'>
                    <div class='caption'>
                      <i class='icon-book-open'></i>
                      Funcionarios
                    </div>
                  <div class='tools'>
                  </div>
                </div>
               </div>
<table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nombre</th>
		<th>Correo</th>
		<th>Telefono</th>
		<th>Tipo de Funcionario</th>
		<th>Acciones</th>
            </tr><?php
            foreach ($usuarios_data as $usuarios)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $usuarios->nombres ." ".  $usuarios->apellido_pat ." ".$usuarios->apellido_mat ;?></td>
			
			<td><?php echo $usuarios->correo ?></td>
			<td><?php echo $usuarios->telefono ?></td>
			
                        <td><?php                                switch ($usuarios->tipo_usu){
                                     case 13: echo  "Funcionario Japami";
                                         break;
                                     case 15: echo  "Funcionario Catastro";
                                         break;
                                        case 12: echo  "Funcionario Permisos de Anuncios";
                                         break;                            
                                       case 11: echo  "Funcionario Obras";
                                         break;                               
                                        case 14: echo  "Funcionario Rusticos y Urbanos";
                                         break;     
                                     case 19: echo  "Funcionario Regime de propiedad";
                                         break;     
                                     case 155: echo  "Funcionario Auxiliar(Catastro)";
                                         break;  
                                      case 1555: echo  "Funcionario Administrador(Auxiliares Catastro)";
                                         break;
                                     case 16: echo  "Funcionario Administrador(Verifiadores)";
                                         break;  
                                     case 166: echo  "Funcionario Verificador(Permisos y Obras)";
                                         break; 
                                     case 1: echo  "Administrador";
                                         break; 
                                    
                        }
                       ?> </td>
			
			<td style="text-align:center" width="200px">
				<?php 
				
				echo anchor(site_url('usuarios/delete/'.$usuarios->ID),'Eliminar','onclick="javasciprt: return confirm(\'¿Estas seguro de eliminar este registro ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
      
                <div class="row">
                    <div class="col-md-6">

              </div>
                    <div class="col-md-6 text-right">
                        <?php echo $pagination ?>
                    </div>
                </div>
                <!-- END PAGE CONTENT INNER -->
              </div>
            </div>
          </div>
          <!-- END PAGE CONTENT BODY -->
          <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
      </div>
      <!-- END CONTAINER -->
    </div>
  </div>
  <div class="page-wrapper-row">
    <div class="page-wrapper-bottom">
      <!-- BEGIN FOOTER -->
      <!-- BEGIN INNER FOOTER -->
      <?php $this->load->view('base/footer'); ?>
      <!-- END INNER FOOTER -->
      <!-- END FOOTER -->
    </div>
  </div>
</div>
<div class="quick-nav-overlay"></div>
<!--[if lt IE 9]>
<script src="<?php echo base_url();?>assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/excanvas.min.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url();?>assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>           <script src="../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo base_url();?>assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>assets/pages/scripts/form-wizard.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/pages/scripts/form-repeater.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?php echo base_url();?>assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
</body>
</html>
