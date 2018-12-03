<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Acuse de Confirmacíon</title>

    <link rel="shortcut icon" href="<?= base_url($this->session->userdata('favicon')) ?>">

    <!-- jquery-ui -->
    <link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap colockpicker -->
    <link href="<?php echo base_url(); ?>assets/css/jquery-ui-timepicker-addon.min.css" rel="stylesheet" type="text/css"/>
    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>assets/css/metisMenu.css" rel="stylesheet" type="text/css"/>
    <!-- mCustomScrollbar css -->
    <link href="<?php echo base_url(); ?>assets/css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css"/>
    <!-- font-awesome -->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!-- flaticon css -->
    <link href="<?php echo base_url(); ?>assets/css/flaticon.css" rel="stylesheet" type="text/css"/>

    <!-- semantic css -->
    <link href="<?php echo base_url(); ?>assets/css/semantic.min.css" rel="stylesheet" type="text/css"/> 
    <!-- select2 css -->
    <link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet" type="text/css"/> 


    <!-- DataTables CSS -->
    <link href="<?= base_url('assets/datatables/css/jquery.dataTables.min.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/datatables/css/responsive/dataTables.responsive.css" rel="stylesheet" type="text/css"/> 
    <link href="<?= base_url('assets/datatables/css/button/buttons.dataTables.min.css') ?>" rel="stylesheet" type="text/css"/> 

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css"/>

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,700i|Open+Sans:400,600,700,800" rel="stylesheet">  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js" type="text/javascript"></script>
</head>
<div class="row">

    <div class="col-sm-12" >
        <div  class="panel panel-info"> 
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-6 col-md-8">
                        <dl class="dl-horizontal">
                            <dt>Encargado</dt> <dd><?php echo "$cita->nombres $cita->apellido" ?></dd>
                            <dt>Departamento</dt> <dd><?php echo $cita->departamento ?></dd>
                            <dt>Rango</dt> <dd><?php echo $cita->rango ?></dd>
                            <dt>Disponible</dt> <dd><?php
                                $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
                                $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
                                $nombredia = str_replace($dias_EN, $dias_ES, $cita->dias_disponibles);
                                echo $nombredia
                                ?></dd>
                            <dt>Horario </dt> <dd><?php echo "$cita->tiempo_inicio - $cita->tiempo_final" ?></dd>
                        </dl>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <dl class="dl-horizontal">

                            <dt>Serial No</dt> <dd>#<?php echo ($cita->serial_no <= 9) ? "0$cita->serial_no" : $cita->serial_no ?></dd>
                            <dt>Día</dt> <dd><?php echo $cita->dia ?></dd>
                        </dl>
                    </div>
                </div>
            </div>

            <div class="panel-body"  id="PrintMe">  
                <div class=>
                    <div class="col-sm-12" align="center">  
                        <h1>Información de su Cita</h1>
                        <br>
                    </div>

                    <div class="col-md-3" align="center"> 
                        <img alt="Picture" width="300" src="<?php echo (!empty($cita->foto) ? base_url($cita->foto) : base_url("assets/images/no-img.png")) ?>" class="img-thumbnail img-responsive">
                        <h3><?php echo "$cita->nombre_completo "; ?></h3>
                    </div>

                    <div class="col-md-9"> 
                        <dl class="dl-horizontal">

                            <dt>Cita ID</dt><dd><?php echo $cita->citas_id ?></dd>
                            <dt>Ciudadano </dt><dd><?php echo "$cita->nombre_completo "; ?></dd>

                            <dt>Fecha de Cita</dt><dd><?php echo date('d M Y', strtotime($cita->dia)); ?></dd> 
                            <dt>Hora de Cita</dt><dd><?php echo $cita->hora_cita; ?></dd> 
                            <dt>Teléfono</dt><dd><?php echo $cita->telefono; ?></dd> 
                            <dt>Asunto:</dt><br><div class="col-md-4"> <p><?php echo $cita->asunto; ?></p></div>
                    </div>
                </div>  

            </div> 

            <div class="panel-footer">
                <div class="text-center">
                    <strong><?php echo $this->session->userdata('title') ?></strong>
                    <p class="text-center"><?php echo $this->session->userdata('address') ?></p>
                </div>
            </div>
        </div>
    </div>



    <div class="col-sm-12">
        <div class="btn-group">
            <button type="button" onclick="printContent('PrintMe')" class="btn btn-success" >Imprimir</button> 
        </div>
    </div>


</div>
<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url() ?>assets/js/metisMenu.js" type="text/javascript"></script>
<!-- mCustomScrollbar js -->
<script src="<?php echo base_url() ?>assets/js/jquery.mCustomScrollbar.concat.min.js" type="text/javascript"></script>
<!-- canvas js -->
<script src="<?php echo base_url() ?>assets/js/canvasjs.min.js" type="text/javascript"></script> 
<!-- semantic js -->
<script src="<?php echo base_url() ?>assets/js/semantic.min.js" type="text/javascript"></script>
<!-- select2 js -->
<script src="<?php echo base_url() ?>assets/js/select2.min.js" type="text/javascript"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url("assets/datatables/js/button/jquery.dataTables.min.js") ?>"></script>
<script src="<?php echo base_url("assets/datatables/js/button/dataTables.buttons.min.js") ?>"></script>
<script src="<?php echo base_url("assets/datatables/js/button/buttons.flash.min.js") ?>"></script>
<script src="<?php echo base_url("assets/datatables/js/button/jszip.min.js") ?>"></script>
<script src="<?php echo base_url("assets/datatables/js/button/pdfmake.min.js") ?>"></script>
<script src="<?php echo base_url("assets/datatables/js/button/vfs_fonts.js") ?>"></script>
<script src="<?php echo base_url("assets/datatables/js/button/buttons.html5.min.js") ?>"></script>
<script src="<?php echo base_url("assets/datatables/js/button/buttons.print.min.js") ?>"></script>
<script src="<?php echo base_url() ?>assets/datatables/js/responsive/dataTables.responsive.js" type="text/javascript"></script>  

<!-- tinymce texteditor -->
<script src="<?php echo base_url() ?>assets/tinymce/tinymce.min.js" type="text/javascript"></script> 
<!-- bootstrap timepicker -->
<script src="<?php echo base_url() ?>assets/js/jquery-ui-sliderAccess.js" type="text/javascript"></script> 
<script src="<?php echo base_url() ?>assets/js/jquery-ui-timepicker-addon.min.js" type="text/javascript"></script> 

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url() ?>assets/js/custom.js" type="text/javascript"></script>