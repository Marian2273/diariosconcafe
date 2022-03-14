<?php include('functions/functions.php');?>
<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Diarios con café   </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <!-- Js -->
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/min/waypoints.min.js"></script>
    <script src="js/jquery.counterup.js"></script>

    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="js/google-map-init.js"></script>

<!-- Fancy-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="js/main.js"></script>
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>



    <!-- Header Start -->
    <section class="header-all">
  <header>
    <!--- Topbar Start -->
<div class="franja-login">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="col-md-6 semana-de-prueba"> 
                  <a data-fancybox data-type="ajax" data-src="formularios/semana-de-prueba.php" href="javascript:;">
                  ¡SEMANA DE PRUEBA!
                </a></div>
                <div class="col-md-6 seccion-usuarios">
                <?php if($user_cafe !=''){ ?>
                  <div class="usuarios">
						<a href="perfil-usuario.php" class="perfil" > PERFIL USUARIO </a> <span> |</span>
				    <a href="functions/logout.php" class="cerrar-sesion"> CERRAR SESIÓN </a>
                </div>
						<?php }else{ ?>
              <div class="usuarios">
						<a href="ingresar.php" class="sesion"> LOGIN </a> <span> |</span>
						<a href="registro.php" class="registro" >REGISTRARME</a>
            </div>
						<?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!--- Topbar End -->
    <div class="container-fluid">
  
      <div class="row">
      
        <div class="col-md-12">
          <!-- header Nav Start -->
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12 logo-arriba">
                  <a class="" href="index.php" >
                    <img src="img/header-logo.png" alt="Diarios con Café" class="img-responsive">
                  </a>
                </div>
              </div>
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
               
              
              </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
              
               
              </div><!-- /.container-fluid -->
              
            </nav>
          </div>
        </div>
      </div>
    </header><!-- header close -->
    
  </section><!-- header all -->
  <section class="botonera">
    <div class="container">
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
    <ul class="nav navbar-nav navbar-center">
      <li class="<?= $a;?>"><a href="index.php">TAPAS DE HOY</a></li>
      <li class="<?= $b;?>"><a href="noticias-de-ayer.php">NOTICIAS DE AYER</a></li>
      <li class="<?= $c;?>"><a href="domingos-ilustrados.php">DOMINGOS ILUSTRADOS</a></li>
      <li class="<?= $d;?>"><a href="conocenos.php">CONOCENOS</a></li>
      <li class="sus <?= $e;?>" ><a href="quiero-suscribirme.php">¡QUIERO SUSCRIBIRME!</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
</div>
</section>