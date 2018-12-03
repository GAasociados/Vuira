<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= (!empty($setting->favicon) ? base_url($setting->favicon) : base_url('assets_web/images/icons/favicon.png')) ?>"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Agendar Cita</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?= base_url('assets_web/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Jquery Ui -->
    <link href="<?= base_url('assets_web/css/jquery-ui.min.css') ?>" rel="stylesheet" type="text/css"/>
    <!-- Font Awesome -->
    <link href="<?= base_url('assets_web/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css"/>
    <!-- Flaticon -->
    <link href="<?= base_url('assets_web/css/flaticon.css') ?>" rel="stylesheet" type="text/css"/>
    <!-- Owl Carousel -->
    <link href="<?= base_url('assets_web/owl-carousel/owl.carousel.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url('assets_web/owl-carousel/owl.theme.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url('assets_web/owl-carousel/owl.transitions.css') ?>" rel="stylesheet" type="text/css"/>
    <!-- Custom Style Sheet -->
    <link href="<?= base_url('assets_web/css/style.css') ?>" rel="stylesheet" type="text/css"/>
</head>
<section id="appointment" class="choose-form-inner">
    <div class="container">

        <div class="row">

            <!-- Main Title -->
            <div class="col-md-6 col-md-offset-3">
                <div class="title-block">
                    <h3><?= (!empty($section['cita']['title']) ? $section['cita']['title'] : null) ?></h3>
                    <p><?= (!empty($section['cita']['description']) ? $section['cita']['description'] : null) ?></p>
                </div>
            </div>
        </div>


        <!-- Message & exception -->
        <div class="col-sm-12">
            <?php if ($this->session->flashdata('success') != null) { ?>
                <div class="alert alert-info">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php } ?>

            <?php if ($this->session->flashdata('exception') != null) { ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('exception'); ?>
                </div>
            <?php } ?>
        </div>


        <!-- Citas Form -->
        <div class="col-sm-6 col-md-4">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="<?= ($this->session->flashdata('p_status') != 2 ? "active" : null) ?>">
                    <a href="#appRegister" aria-controls="appRegister" role="tab" data-toggle="tab">Agendar Cita</a>
                </li>

            </ul>


            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Login -->
                <div role="tabpanel" class="tab-pane <?= ($this->session->flashdata('p_status') != 2 ? "active" : null) ?>" id="appRegister">
                    <div id="form" class="form-area">
                        <form action="<?= base_url() . "welcome/index" ?>" method="post">
                            <div class="form-padding">
                                <h4>Formulario</h4>

                                <!-- Ciudadano id -->
                                <div class="form-group">
                                    <label>Nombre Completo<i class="text-danger">*</i></label>
                                    <input name="nombre_completo" autocomplete="off" type="text" class="form-control" id="nombre_completo" placeholder="Nombre Completo">
                                    <span></span>
                                </div>

                                <div class="form-group">
                                    <label>Telefono<i class="text-danger">*</i></label>
                                    <input name="telefono" maxlength="10" autocomplete="off" type="text" class="form-control" id="telefono" placeholder="Telefono de Contacto">
                                    <span></span>
                                </div>


                                <div class="form-group">
                                    <label>Dirección <i class="text-danger">*</i></label>
                                    <?php echo form_dropdown('departamento_id', $lista_departamentos, $cita->departamento_id, 'class="form-control" id="departamento_id"') ?>
                                    <span class="doctor_error"></span>
                                </div>

                                <div class="form-group hidden">
                                    <label>Encargado<i class="text-danger">*</i></label>
                                    <?php echo form_dropdown('encargado_id', '', '', 'class="form-control" id="encargado_id"') ?>
                                    <p class="help-block" id="available_days"></p>
                                </div>
                                <div class="form-group">
                                    <label>Trámite<i class="text-danger">*</i></label>
                                    <?php echo form_dropdown('tramite_id', '', '', 'class="form-control" id="tramite_id"') ?>
                                    <p class="help-block" id="available_days"></p>
                                </div>
                                <div class="form-group">
                                    <label>Día <i class="text-danger">*</i></label>
                                    <input name="date" type="date" class="datepicker-avaiable-days form-control" id="date" placeholder="Seleccionar día" >
                                </div>

                                <div class="form-group">
                                    <label>Horario <i class="text-danger">*</i></label>
                                    <div id="serial_preview">
                                        <div class="btn btn-success disabled btn-sm"> 01</div>
                                        <div class="btn btn-success disabled btn-sm"> 02</div>
                                        <div class="btn btn-success disabled btn-sm"> 03</div>...
                                        <div class="slbtn btn btn-success disabled btn-sm"> N</div>

                                    </div>
                                    <input type="hidden" name="horarios_id" id="horarios_id"/>
                                    <input type="hidden" name="serial_no" id="serial_no"/>
                                    <input id="horario" type="hidden" name="hora_cita"/>

                                </div>
                                <div class="form-group">
                                    <label>Correo Electronico <i class="text-danger">*</i></label>
                                    <input type="input" name="email" id="email"/>
                                    <span class="doctor_error"></span>
                                </div>

                                <div class="form-group">
                                    <label>Asunto de la cita </label>
                                    <textarea name="asunto" class="form-control" placeholder="Descripción del asunto "  rows="7"></textarea>
                                </div>

                            </div>

                            <div class="form-footer">
                                <div class="checkbox">
                                    <label></label>
                                </div>
                                <button type="submit" id="submit" class="btn thm-btn">Solicitar Cita</button>
                            </div>

                        </form> 
                    </div>
                </div>


            </div>


        </div>



        <!-- Section Image -->
        <div class="col-md-6">
            <div class="doctor_img">
                <iframe id="pdf_view" src="" width="700" height="800" frameborder="2"></iframe>
                <!--http://docs.google.com/gview?url=http://naturalmentefuerte.com/vuira/assets/AVISO_DE_CONFIDENCIALIDAD.pdf&embedded=true#:0.page.20-->
            </div>
        </div>



        <!-- Why Choose Us -->
        <div class="col-sm-6 col-md-4">
            <?php
            if (!empty($items['cita'])):
                foreach ($items['cita'] as $cita):
                    ?>
                    <div class="choose">
                        <div class="choose-icon">
                            <?php if (!empty($cita['icon_image'])): ?>
                                <img src="<?= $cita['icon_image'] ?>" alt=""/>
                            <?php endif; ?>
                        </div>
                        <div class="choose-content">
                            <h4><?= $cita['title'] ?></h4>
                            <p><?= character_limiter($cita['description'], 120) ?></p>
                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>


    </div>

</div>


</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

        //reviso ciudadano
        $('#ciudadano_id').keyup(function () {
            var pid = $(this);

            $.ajax({
                url: '<?= base_url('welcome/check_ciudadano/') ?>',
                type: 'post',
                dataType: 'JSON',
                data: {
                    '<?= $this->security->get_csrf_token_name(); ?>': '<?= $this->security->get_csrf_hash(); ?>',
                    ciudadano_id: pid.val()
                },
                success: function (data)
                {
                    if (data.status == true) {
                        pid.next().text(data.message).addClass('text-success').removeClass('text-danger');
                    } else if (data.status == false) {
                        pid.next().text(data.message).addClass('text-danger').removeClass('text-success');
                    } else {
                        pid.next().text(data.message).addClass('text-danger').removeClass('text-success');
                    }
                },
                error: function ()
                {
                    alert('failed');
                }
            });
        });

        //departamento_id
        $("#departamento_id").change(function () {
            var output = $('.doctor_error');
            var doctor_list = $('#encargado_id');

            var available_day = $('#available_day');

            $.ajax({
                url: '<?= base_url('welcome/encargado_por_departamento/') ?>',
                type: 'post',
                dataType: 'JSON',
                data: {
                    '<?= $this->security->get_csrf_token_name(); ?>': '<?= $this->security->get_csrf_hash(); ?>',
                    departamento_id: $(this).val()
                },
                success: function (data)
                {
                    if (data.status == true) {
                        doctor_list.html(data.message);
                        available_day.html(data.available_days);
                        output.html('');
                    } else if (data.status == false) {
                        doctor_list.html('');
                        output.html(data.message).addClass('text-danger').removeClass('text-success');
                    } else {
                        doctor_list.html('');
                        output.html(data.message).addClass('text-danger').removeClass('text-success');
                    }
                },
                error: function ()
                {
                    alert('failed');
                }
            });
        });
        $("#departamento_id").change(function () {
            var output = $('.doctor_error');
            var doctor_list = $('#encargado_id');
            var available_day = $('#available_day');
            var tramite_list = $('#tramite_id');
            $.ajax({
                url: '<?= base_url('welcome/tramites_departamento/') ?>',
                type: 'post',
                dataType: 'JSON',
                data: {
                    '<?= $this->security->get_csrf_token_name(); ?>': '<?= $this->security->get_csrf_hash(); ?>',
                    departamento_id: $(this).val()
                },
                success: function (data)
                {
                    if (data.status == true) {
                        tramite_list.html(data.message);

                        output.html('');
                    } else if (data.status == false) {
                        tramite_list.html('');
                        output.html(data.message).addClass('text-danger').removeClass('text-success');
                    } else {
                        tramite_list.html('');
                        output.html(data.message).addClass('text-danger').removeClass('text-success');
                    }
                },
                error: function (e)
                {
                    alert('failed');
                }
            });
        });


        //encargado_id
        $("#encargado_id").change(function () {
            var encargado_id = $('#encargado_id');
            var output = $('#available_days');

            $.ajax({
                url: '<?= base_url('welcome/dias_horario_encargado/') ?>',
                type: 'post',
                dataType: 'JSON',
                data: {
                    '<?= $this->security->get_csrf_token_name(); ?>': '<?= $this->security->get_csrf_hash(); ?>',
                    encargado_id: $(this).val()
                },
                success: function (data)
                {
                    if (data.status == true) {
                        output.html(data.message).addClass('text-success').removeClass('text-danger');
                    } else if (data.status == false) {
                        output.html(data.message).addClass('text-danger').removeClass('text-success');
                    } else {
                        output.html(data.message).addClass('text-danger').removeClass('text-success');
                    }
                },
                error: function ()
                {
                    alert('failed');
                }
            });
        });


        //date
        $("#date").change(function () {
            var date = $('#date');
            var serial_preview = $('#serial_preview');
            var encargado_id = $('#encargado_id');
            var horarios_id = $("#horarios_id");
            var ciudadano_id = $("#ciudadano_id");
            var tramite_id = $("#tramite_id");
            $.ajax({
                url: '<?= base_url('welcome/horario_por_dia/') ?>',
                type: 'post',
                dataType: 'JSON',
                data: {
                    '<?= $this->security->get_csrf_token_name(); ?>': '<?= $this->security->get_csrf_hash(); ?>',
                    encargado_id: encargado_id.val(),
                    ciudadano_id: ciudadano_id.val(),
                    tramite_id: tramite_id.val(),
                    date: $(this).val()
                },
                success: function (data)
                {
                    if (data.status == true) {
                        //set schedule id
                        horarios_id.val(data.horarios_id);
                        serial_preview.html(data.message);
                    } else if (data.status == false) {
                        horarios_id.val('');
                        serial_preview.html(data.message).addClass('text-danger').removeClass('text-success');
                    } else {
                        horarios_id.val('');
                        serial_preview.html(data.message).addClass('text-danger').removeClass('text-success');
                    }
                },
                error: function ()
                {
                    alert('failed');
                }
            });
        });

        //serial_no
        $("body").on('click', '.serial_no', function () {
            var serial_no = $(this).attr('data-item');
            $("#serial_no").val(serial_no);
            $('.serial_no').removeClass('btn-danger').addClass('btn-success').not(".disabled");
            $(this).removeClass('btn-success').addClass('btn-danger').not(".disabled");
        });

        $(".datepicker-avaiable-days").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            showButtonPanel: false,
            minDate: 0,

            // beforeShowDay: DisableDays
        });


    });
</script>
<script>
    $('#tramite_id').change(function () {
        var tramite_id = $("#tramite_id");
        var pdf = $("#pdf_view");
        $.ajax({
            url: '<?= base_url('welcome/ver_pdf') ?>',
            type: 'post',
            dataType: 'JSON',
            data: {
                tramite_id: tramite_id.val(),
            },
            success: function (data)
            {
                if (data != "") {
                    data = "<?php echo base_url();?>assets/"+data;
                    $('#pdf_view').attr('src', data);
                } else {
                    $('#pdf_view').attr('src', data);
                }
            },
            error: function ()
            {
                alert('failed');
            }
        });
    });
</script>
<script>
    function hora(time) {
        $('#horario').val(time.toString());
    }
</script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?= base_url('assets_web/js/jquery.min.js" type="text/javascript') ?>"></script>
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVtjo9eO4klWhYbHwL9jObfuke4rxSWWc"></script>-->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?= base_url('assets_web/js/bootstrap.min.js') ?>"></script>
<!-- owl carousel js -->
<script src="<?= base_url('assets_web/owl-carousel/owl.carousel.min.js') ?>" type="text/javascript"></script>
<!-- Plugin JavaScript -->
<script src="<?= base_url('assets_web/js/jquery.easing.min.js') ?>" type="text/javascript"></script>
<!-- Jquery Ui -->
<script src="<?= base_url('assets_web/js/jquery-ui.min.js') ?>" type="text/javascript"></script>
<!-- Custom Js -->
<script src="<?= base_url('assets_web/js/custom.js') ?>" type="text/javascript"></script>

