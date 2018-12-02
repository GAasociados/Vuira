<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php  
$identificacion = '';
$rpredial = '';
$nooficial = '';
foreach ($predial->result() as $row) { $rpredial .= $row->tipo_documento; }

foreach ($INE->result() as $row) { $identificacion .= $row->tipo_documento; }
foreach ($noficial->result() as $row) { $nooficial .= $row->tipo_documento; }

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Ventanilla Única Irapuato</title>
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
        <link rel="shortcut icon" href="favicon.ico" /> </head>
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
                                        <h1>Perfil de Usuario</h1>
                                    </div>
                                    <!-- END PAGE TITLE -->
                                </div>
                            </div>
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div class="container-fluid">
                                  <br>
                                  <ul class="nav nav-pills nav-justified steps">
                                     <li class="active">
                                        <a data-toggle="tab" class="step" aria-expanded="true">
                                        <span class="number"> 1 de 1 - </span>
                                        <span class="desc">
                                        <b>Completar Perfil</b><i class="fa fa-check"></i></span>
                                        </a>
                                     </li>
                                  </ul>
                                  <h4 class="note note-warning"><b>Antes de solicitar algún trámite por favor ingresar los siguientes documentos escaneados del original</b></h4>
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <form action="<?php echo $action; ?>" method="post" enctype = "multipart/form-data">
                                    <?php if ($this->session->userdata('tipo') == 4 ||  $this->session->userdata('tipo') == 3 ) {?>

                                                    <h3>Datos del Ciudadano</h3>
                                                    <input type="hidden" name="tramite" value="<?php echo $tramite;?>">
                                                    <div class="form-group">
                                                            <div class="form-group col-md-3">
                                                                <label for="varchar">Nombres <?php echo form_error('nombres') ?></label>
                                                                <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombres" readonly="true" value="<?php echo $nombres; ?>" />
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="varchar">Apellido Paterno <?php echo form_error('apellido_pat') ?></label>
                                                                <input type="text" class="form-control" name="apellido_pat" id="apellido_pat" placeholder="Apellido Paterno" readonly="true" value="<?php echo $apellido_pat; ?>" />
                                                            </div>

                                                            <div class="form-group col-md-3">
                                                                <label for="varchar">Apellido Materno <?php echo form_error('apellido_mat') ?></label>
                                                                <input type="text" class="form-control" name="apellido_mat" id="apellido_mat" placeholder="Apellido Materno" readonly="true" value="<?php echo $apellido_mat; ?>" />
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="varchar">Calle <?php echo form_error('calle') ?></label>
                                                                <input type="text" class="form-control" name="calle" id="calle" placeholder="Calle"  readonly="true" value="<?php echo $calle; ?>" />
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                            <label for="int">Colonia <?php echo form_error('colonia') ?></label>
                                                            <?php
                                                if (!empty($colonia)):

                                                    $arraycolonia = $this->Colonias_model->getalladatacoloniabyid($colonia);
                                                    ?>
                                                    <input type="text" class="form-control" name="colonia" id="colonia" placeholder="Colonia"  readonly="true" value="<?php echo  $arraycolonia->NOMBRE ?>" />
                                                    

                                                <?php endif; ?>
                                                            
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                        <label for="varchar">Código postal <?php echo form_error('cp') ?></label>
                                                        <input type="text" class="form-control" name="cp" id="cp" placeholder="Código postal "  readonly="true" value="<?php echo $cp; ?>" />
                                    </div>
                                    <div class="form-group col-md-3">
                                    <label for="varchar">Correo Electrónico <?php echo form_error('correo') ?></label>
                                    <input type="text" class="form-control" name="correo" id="correo" placeholder="Correo Electrónico"  readonly="true" value="<?php echo $correo; ?>" />
                                </div>
                                <div class="form-group col-md-3">
                                <label for="varchar">Teléfono <?php echo form_error('telefono') ?></label>
                                <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Teléfono" readonly="true"  value="<?php echo $telefono; ?>" />
                            </div>


                        </div>


                                     <div class="col-md-12">
                                       <h3>Documentación escaneada del original</h3>
                                     </div>

                                  <div class="form-group">
                
                                       <div class="form-group col-md-4">
                                               
                                                <?php if (empty($identificacion)): ?>
                                               <label for="varchar">Identificación (INE,Pasaporte,Cédula Profesional) *<?php echo form_error('doctoife') ?></label>
                                                <input type="file"  accept="application/pdf, image/*" name="documento_ife" id="doctoife" placeholder="Documento IFE"/>
                                                <?php endif; ?>
                                             </div>
                              
                                       <div class="form-group col-md-4">
                                                
                                                <?php if(empty($rpredial)): ?>
                                                  <label for="varchar">Recibo impuesto predial  *<?php echo form_error('documento_predial') ?></label>
                                                  <input type="file" accept="application/pdf, image/*" name="documento_predial" id="doctopredial" placeholder="Recibo impuesto predial" />
                                                <?php endif; ?>
                                             </div>
                               
                                     <div class="form-group col-md-4">
                                                
                                                <?php if (empty($nooficial)): ?>
                                                <label for="varchar">Número oficial de la propiedad*<?php echo form_error('documento_numero_oficial') ?></label>
                                                <input type="file"  accept="application/pdf, image/*" name="documento_numero_oficial" id="doctonumerooficial" placeholder="Documento Número oficial de la propiedad"/>
                                                <?php endif; ?>
                                      </div>
                                      
                                                                      
                                  </div>

                                  <?php } ?>

                                <div class="form-group">
                                    <div class="col-md-12">
                                      <input type="hidden" name="ID" value="<?php echo $ID; ?>" />
                                      <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                                    </div>
                                </div>
                              </form>
                                    <!-- END PAGE CONTENT INNER -->
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
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>           <script src="<?php echo base_url();?>/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
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
        <script src="<?php echo base_url();?>assets/js/tram/japami.js" type="text/javascript"></script>

    </body>
</html>
