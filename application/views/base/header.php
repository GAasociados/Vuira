     <style>
  .example3 {

  margin:250px auto;
}
          </style>
          <style>
              .btnAyuda{ 
        border-radius: 50px 0px 0px 50px; 
        right: 0px; 
    }
    .btnAyudaForm{border-radius: 50px 0px 0px 50px;                       
    right: 0px;                       
    position: fixed;                       
    bottom: 150px;                       
    z-index: 10;                     
    }
        </style>
<!-- BEGIN HEADER -->
<div class="page-header">
    <!-- BEGIN HEADER TOP -->
    <div class="page-header-top">
        <div class="container-fluid">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <?php if (isset($logo_jp)): ?>
                    <a>
                        <img src="<?php echo base_url(); ?>assets/images/japami.png" alt="logo" class="logo-default" style="height: 90%; margin: 1%;">
                    </a>
                <?php endif; ?>
                <a href="http://www.irapuato.gob.mx/e-gob/">
                    <img src="<?php echo base_url(); ?>assets/layouts/layout3/img/logo.png" alt="logo" class="logo-default" style="  <?php if (isset($logo_jp)): ?>
                             height: 65%; margin: 1%;
                         <?php else: ?>height: 90%; margin: 1%;<?php endif; ?>">
                </a>

            </div>

            <!-- END LOGO -->
            <div class="nav navbar-brand"> Irapuato, Gto. <?php
                /* $fechaactual = getdate(); echo $fechaactual["weekday"]." ".$fechaactual["mday"]." ".$fechaactual["month"]." ".$fechaactual["year"]; */
                $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

                $arrayDias = array('Domingo', 'Lunes', 'Martes',
                    'Miércoles', 'Jueves', 'Viernes', 'Sábado');

                echo $arrayDias[date('w')] . ", " . date('d') . " de " . $arrayMeses[date('m') - 1] . " de " . date('Y');
                ?></div>
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler"></a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <!-- DOC: Apply "dropdown-hoverable" class after "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                    <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->

                    <!-- END NOTIFICATION DROPDOWN -->
                    <li class="droddown dropdown-separator">
                        <span class="separator"></span>
                    </li>


                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-user dropdown-dark">

                        <a href="<?php echo base_url() . "login"; ?>" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <!--
                            <img alt="" class="img-circle" src="<?php //echo base_url();        ?>assets/layouts/layout3/img/avatar9.jpg">
                            -->
                            <i class="fa fa-user"></i>
                            <?php if ($this->session->userdata("login")) { ?>
                                <span class="username username-hide-mobile"><?php echo $this->session->userdata("nombrec"); ?></span>

                            <?php } else { ?>
                                <span class="username username-hide-mobile">Iniciar Sesión</span>
                            <?php } ?>
                        </a>

                        <!--
                        <a href="<?php echo base_url() . "login"; ?>" class="dropdown-toggle" data-close-others="true">
                        <img alt="" class="img-circle" src="<?php echo base_url(); ?>assets/layouts/layout3/img/avatar.png">
                        <span class="username username-hide-mobile">Iniciar Sesión / Crear Cuenta</span>
                        </a>
                        -->

                        <ul class="dropdown-menu dropdown-menu-default">

                            <?php if ($this->session->userdata("login")) { ?>
                                <?php if ($this->session->userdata('tipo') != 1000): ?>
                                    <li>
                                        <a href="<?php echo base_url(); ?>user/modificar">
                                            <i class="icon-user"></i> Modificar Perfil </a>
                                    </li>
                                <?php endif; ?> 
                                <li>
                                    <a data-target="#full11" data-toggle="modal"><i class="fa fa-lock"></i> Cambiar Contraseña</a>

                                </li>
                                <?php if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3): ?>
                                    <li>
                                        <a href="<?php echo base_url(); ?>usuarios/modificar_documentos_ferfil/<?php echo $this->session->userdata('id'); ?>">
                                            <i class="fa fa-folder-open-o"></i> Cambiar Documentos </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>Solicitudes/create">
                                            <i class="fa fa-exchange"></i>Eliminar Documentos</a>
                                    </li>

                                <?php endif; ?>
                                <?php if ($this->session->userdata('tipo') == 1): ?>
                                    <li>
                                        <a href="<?php echo base_url(); ?>Solicitudes/">
                                            <i class="fa fa-gavel"></i>Ver Solicitudes</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>user/register">
                                            <i class="fa fa-pencil-square-o"></i>Agregar Funcionarios   </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>user/funcionarios">
                                            <i class="fa fa-users"></i> Listado de Funcionarios    </a>
                                    </li>
                                <?php endif; ?>
                                <?php if ($this->session->userdata('admin') == 1): ?>
                                    <li>
                                        <a href="<?php echo base_url(); ?>usuarios/cambioqr">
                                            <i class="fa fa-file"></i>Cambio Temporal</a>
                                    </li>
                                <?php endif; ?>
                                <li class="divider"> </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>login/logout">
                                        <i class="icon-key"></i> Salir </a>
                                </li>
                            <?php } else { ?>
                                <li>
                                    <a href="<?php echo base_url() . "login"; ?>">
                                        <i class="icon-user"></i>Iniciar Sesión</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() . "user/register"; ?>">
                                        <i class="icon-user"></i>Regístrate</a>
                                </li>
                            <?php } ?>
                        </ul>
                        </div>
                        <!-- END TOP NAVIGATION MENU -->
                        </div>
                        </div>
                        <!-- END HEADER TOP -->
                        <!-- BEGIN HEADER MENU -->
                        <div class="page-header-menu">
                            <div class="container-fluid">
                                <!-- BEGIN MEGA MENU -->
                                <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                                <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                                <?php if ($this->session->userdata('tipo') != 1000): ?>
                                    <div class="hor-menu  ">
                                        <ul class="nav navbar-nav">
                                            <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                                <a href="<?php echo base_url(); ?>"> Trámites y Servicios
                                                    <span class="arrow"></span>
                                                </a>
                                            </li>

                                            <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                                <!--
                                                  <a href="<?php echo base_url() . 'user/mostrar'; ?>"> Mostrar Usuarios
                                                      <span class="arrow"></span>
                                                  </a>
                                                -->
                                            </li>

                                            <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown  ">
                                                <a href="<?php echo base_url('citas2'); ?>"> Obtén una Cita
                                                    <span class="arrow"></span>
                                                </a>

                                            </li>
                                            <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                                <a title="Sistema de Apertura Rápida de Empresas" target="_blank" href="https://sare.irapuato.gob.mx/"><span class="bold"> s@re</span>
                                                    <span class="arrow"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- END MEGA MENU -->
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- END HEADER MENU -->
                        </div>
                        <!-- END HEADER -->
                        <div class="modal fade" id="full11" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title">Cambiar Contraseña</h4>
                                    </div>
                                    <form id="contrasena" action="<?php echo base_url(); ?>usuarios/cambiar_contra" method="post">
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label>Contraseña Nueva</label>
                                                        <input name="c1" required="" type="password" class="form-control" id="contra1" >
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Confirmar Contraseña</label>
                                                        <input name="c1" required="" type="password" class="form-control" id="contra2">
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="row">
                                                <div class="col-md-12" id="alerta">

                                                </div>
                                            </div>
                                        </div>                
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Guardar Contraseña</button>
                                            <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                        <script>
                            $(document).ready(function () {
                                $("#contrasena").on('submit', function (e) {

                                    e.preventDefault();
                                    var c1 = $("#contra1").val();
                                    var c2 = $("#contra2").val()
                                    if (c1 === c2 && c1 != '' && c2 != '') {
                                        $('#alerta').html("<span id='' class='hidden' style='color:red;'>Las Constraseñas no coinciden</span>");
                                        $.ajax({
                                            url: $("#contrasena").attr("action"), //http://naturalmentefuerte.com/usuarios/login/logenter
                                            type: $("#contrasena").attr("method"), //post
                                            data: $("#contrasena").serialize(), //Captura la informacion de las caas de texto
                                            //Si preciono el boton submit del formilario me redirecciona 
                                            //Pero si doy enter al llenar los datos me redirecciona a
                                            //http://naturalmentefuerte.com/usuarios/login/logenter
                                            success: function (respuesta) {
                                                if (respuesta === "1") {

                                                    $('#full11').modal('hide');
                                                    alert("La contraseña se modifico con éxito");
                                                    $("#contra1").val("");
                                                    $("#contra2").val("");
                                                } else {
                                                    alert("La contraseña no se pudo modificar por favor intentelo mas tarde");
                                                    $("#contra1").val("");
                                                    $("#contra2").val("");
                                                }

                                            }
                                        });

                                    } else {
                                        $('#alerta').html("<span id='' class='' style='color:red;'>Las Constraseñas no coinciden</span>");
                                        $("#contra1").val("");
                                        $("#contra2").val("");
                                    }



                                });
                            });
                        </script>    
                        <script>

<?php
$correcto = $this->session->flashdata('correcto');

if ($correcto) {
    ?>
                                $(document).ready(function () {
                                    setTimeout(function () {
                                     //   alert("<?php echo $correcto; ?>");

                                        $('#talon').modal('show');
                                    }, 100);

                                });
<?php }
?>
                        </script>