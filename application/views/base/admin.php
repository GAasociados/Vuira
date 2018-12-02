
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
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/images/icons/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/images/icons/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/images/icons/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/images/icons/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="https://webservice.irapuato.gob.mx/Estilos/img/logoIrapuato.png">

<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="https://webservice.irapuato.gob.mx/Estilos/assets_admin/bootstrap/js/popper.min.js"></script>

<!-- Admin theme -->

<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/themes/admin/layout.css">
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/themes/admin/color-schemes/default.css">

<!-- Components theme -->

<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/themes/components/default.css">
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/themes/components/border-radius.css">

<!-- Admin responsive -->

<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/helpers/responsive-elements.css">
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/helpers/admin-responsive.css">

<!-- HELPERS -->

<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/helpers/animate.css">
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/helpers/backgrounds.css">
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/helpers/boilerplate.css">
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/helpers/border-radius.css">
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/helpers/grid.css">
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/helpers/page-transitions.css">
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/helpers/spacing.css">
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/helpers/typography.css">
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/helpers/utils.css">
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/helpers/colors.css">
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/elements/images.css">

<!-- SNIPPETS -->

<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/snippets/login-box.css">
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/snippets/user-profile.css">
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/snippets/mobile-navigation.css">

<!-- ELEMENTS -->

<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/elements/badges.css">
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/elements/buttons.css">
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/elements/content-box.css">
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/elements/dashboard-box.css">
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/elements/forms.css">

<!-- ICONS -->

<link rel="stylesheet" type="text/css" href="/assets_admin/icons/fontawesome/fontawesome.css">
<link rel="stylesheet" type="text/css" href="/assets_admin/icons/linecons/linecons.css">
<link rel="stylesheet" type="text/css" href="/assets_admin/icons/spinnericon/spinnericon.css">

<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/widgets/accordion-ui/accordion.css">

<!-- WIDGETS -->

<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/widgets/modal/modal.css">
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/widgets/dropdown/dropdown.css">

<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/css/global.css">
<!--#endregion -->

<!--#region JS  -->

<!-- JQuery -->
<script type="text/javascript" src="https://webservice.irapuato.gob.mx/Estilos/assets_admin/js-core/jquery-core.js"></script>

<!-- Bootstrap -->
<script type="text/javascript" src="https://webservice.irapuato.gob.mx/Estilos/assets_admin/bootstrap/js/bootstrap.js"></script>

<!-- JQuery UI -->
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<!--		 <script type="text/javascript" src="https://webservice.irapuato.gob.mx/Estilos/assets_admin/js-core/jquery-ui-core.js"></script> -->

<script type="text/javascript" src="https://webservice.irapuato.gob.mx/Estilos/assets_admin/js-core/modernizr.js"></script>
<script type="text/javascript" src="https://webservice.irapuato.gob.mx/Estilos/js/funciones.js"></script>
<script type="text/javascript" src="https://rawgit.com/darron1217/enjoyhint.js/master/dist/enjoyhint.js"></script>
<link href="<?php echo base_url(); ?>assets/global/css/enjoyhint.css" rel="stylesheet" type="text/css" />


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