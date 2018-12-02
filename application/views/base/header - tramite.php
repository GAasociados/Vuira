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
<div class="top-bar bg-gradient-12" style="color:white !important">
    <div class="container">
        <div class="float-right dropdown">
          <div class="igob-signin-c" sistema-id="e4da3b7fbbce2345d7772b0674a318d5"></div>
        </div>
        <div class="float-right dropdown">
            
        </div>
        <div class="float-right user-account-btn dropdown">
            <?php if ($this->session->userdata("login")) { ?>
                <span class="username username-hide-mobile"><?php echo $this->session->userdata("nombrec"); ?></span>
            <?php }?>
        </div>
    </div>
    <!-- .container -->
</div>

<!-- ************ INICIO MENU ***************** -->
<div class="main-header bg-header wow fadeInDown colorMenu" >
    <div class="container">
        <!-- <a href="index.php/Busqueda/" class="header-logo" title="Irapuato - Municipio"></a> -->
        <a href="" class="header-logo" title="Irapuato - Municipio"></a>
        <div class="right-header-btn">
            <div id="mobile-navigation">
                <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target=".header-nav">
                        <span></span>
                </button>
            </div>
        </div>

        <ul class="header-nav" >

            <li>
                <a href="<?php echo base_url(); ?>" title="Inicio">
                    <span>Trámites y Servicios</span>
                </a>
            </li>
            <li >
                <a href="<?php echo base_url('citas2'); ?>" title="Obtén una cita">
                    <span>Obtén una cita</span>
                </a>
            </li>
            <li>
                <a href="https://sare.irapuato.gob.mx/" target="_blank" title="Sistema de Apertura Rápida de Empresas">
                    <span>s@re</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- .container -->
</div>
<!-- ************FIN MENU***************** -->