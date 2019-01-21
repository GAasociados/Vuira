<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php ?>
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
        <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url(); ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url(); ?>assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url(); ?>assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
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
                                        <h1>Permiso de Anuncios Adosados</h1>
                                    </div>
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-md-4 text-center">
                                            <div style="margin-top: 8px" id="message">
                                                <?php //echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-1 text-right">
                                        </div>
                                        <div class="col-md-3 text-right">
                                            <?php if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122): ?>
                                                <!--
                                                <form action="<?php echo site_url('permiso_anuncios/index'); ?>" class="form-inline" method="get">
                                                  <h4>Buscar Por Estatus</h4>
                                                    <div class="input-group">
                                                        <select class="form-control" name="q">
                                                          <option value = "1">Iniciado</option>
                                                          <option value = "2">En Revisión de Información</option>
                                                          <option value = "3">Trámite en Proceso</option>
                                                          <option value = "4">En Espera de Pago</option>
                                                          <option value = "5">Cancelado</option>
                                                          <option value = "6">Terminado</option>
                                                        </select>
                                                        <span class="input-group-btn">
                                                <?php
                                                if ($q <> '') {
                                                    ?>
                                                                            <!-- <a href="<?php echo site_url('permiso_anuncios'); ?>" class="btn btn-default">Borrar</a> --
                                                    <?php
                                                }
                                                ?>
                                                          <button class="btn btn-primary" type="submit">Buscar</button>
                                                        </span>
                                                    </div>
                                                    <br>
                                                    <a href="<?php echo site_url('permiso_anuncios'); ?>" class="btn btn-success">Mostrar Todos</a>
                                                </form>
                                                -->
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!--<h4 class="note note-warning">Si alguno de sus trámites se encuentra en este color, significa solicitud nueva o modificada.</h4>-->
                                    <button type="button" id="asignar" class="btn btn-primary">Asignar Funcionario</button> <a href="<?php echo base_url(); ?>infotramites/info_permisos_de_anuncios_adosados_rotulados" class="btn btn-primary">Regresar</a>
                                    <div class='portlet box blue'>
                                        <div class='portlet-title'>
                                            <div class='caption'>
                                                <i class='icon-book-open'></i>
                                                Mis Trámites
                                            </div>
                                            <div class='tools'>
                                            </div>
                                        </div>
                                    </div>

                                    <table class="table table-bordered" style="margin-bottom: 10px">
                                        <tr>
                                             <th>Seleccione</th>
                                            <th>Nombre del Propietario del Inmueble</th>
                                            <th>Documento  Final</th>
                                            <th>Mensaje</th>
                                            <th>Número de Control</th>
                                            <th>Estatus</th>
                                            <!--<th>Acción</th>-->
                                        </tr><?php
                                        $i=0;
                                        foreach ($permiso_anuncios_adosados_data as $permiso_anuncios_adosados) {
                                            if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122) {
                                                ?>
                                                <?php if ($permiso_anuncios_adosados->notificacion == 1) { ?>
                                                    <tr class="note note-warning">
                                                    <?php } else { ?>
                                                    <tr>
                                                    <?php } ?>
                                                         <td> <input type="checkbox" id="seleccionar[<?php echo $i; ?>]" name="opc" value="<?php echo $permiso_anuncios_adosados->ID; ?>"></td>
                                                    <td><?php echo $permiso_anuncios_adosados->nombrepropietarioinmuebledg ?></td>
                                                    <td>
                                                        <?php
                                                        if (empty($permiso_anuncios_adosados->doctofinal)) {
                                                            echo "El Documento Final Se Subirá Cuando " .
                                                            "El Proceso Del Trámite Esté Terminado";
                                                        } else {
                                                            echo "<a href='" . base_url() . "assets/tramites/permisosanunciosadosados/" . $permiso_anuncios_adosados->doctofinal . "'>Descargar<a>";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $permiso_anuncios_adosados->mensaje ?></td>
                                                    <td><?php echo $permiso_anuncios_adosados->nocontrol ?></td>
                                                    <td>
                                                        <?php
                                                        switch ($permiso_anuncios_adosados->status) {
                                                            case '1':
                                                                echo "Iniciado";
                                                                break;

                                                            case '2':
                                                                echo "Revisión De Información";
                                                                break;

                                                            case '3':
                                                                echo "Trámite en Proceso";
                                                                break;

                                                            case '4':
                                                                echo "En Espera De Pago";
                                                                break;

                                                            case '5':
                                                                echo "Cancelado";
                                                                break;

                                                            default:
                                                                echo "Terminado";
                                                                break;
                                                        }
                                                        ?>
                                                    </td>

                                                </tr>
                                                <?php
                                            } else {
                                                
                                            }
                                        }
                                        ?>
                                    </table>
                                    <!-- END PAGE CONTENT INNER -->
                                    <div class="row">
                                        <div class="col-md-6">

                                        </div>
                                        <div class="col-md-6 text-right">
                                            <?php echo $pagination ?>
                                        </div>
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

        <!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/excanvas.min.js"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
   
     <script type="text/javascript">
            $(document).ready(function () {
                $("#asignar").click(function () {
                    var favorite = [];
                    $.each($("input[name='opc']:checked"), function () {
                        favorite.push($(this).val());
                    });

                    if (favorite.length > 0) {
                        $('#docsid').val(favorite);
                        $('#small').modal('toggle');

                    } else
                    {
                        alert("Seleccione los tramites");
                    }
                });
            });

        </script>
         <div class="modal fade bs-modal-md" id="small" tabindex="-1" role="dialog" aria-hidden="true">
            <form action="<?php echo base_url() . "permiso_anuncios_adosados/asignar_func"; ?>" method="post" >
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Funcionarios Permiso de Anuncios Auto Soportados</h4>
                        </div>
                        <div class="modal-body"> 
                            
                                <label for="int">Asignar Funcionarios Permiso de Anuncios Auto Soportados*</label>
                                <select required="" class="form-control" name="auxiliar" tabindex="-1"  id="auxiliar"/>
                                <option value="">
                                    Seleccione Funcionarios Permiso de Anuncios Auto Soportados
                                </option>
                                <?php foreach ($auxiliares->result() as $fila): ?>

                                    <option value="<?php echo $fila->ID; ?>">
                                        <?php echo $fila->nombres." ".$fila->apellido_pat." ".$fila->apellido_mat; ?>
                                        
                                    </option>
                                <?php endforeach; ?>
                                </select>
                            
                            <input id="docsid" type="hidden" name="IDs">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn green">Asignar Auxiliar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
            </form>
            <!-- /.modal-dialog -->
        </div>
    </body>

</html>
