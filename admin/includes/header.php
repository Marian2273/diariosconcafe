<?php include('functions/functions.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon.png">
    <!-- Title Page-->
    <title>Admin Diarios con Café </title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
   <!-- datapicker CSS
        ============================================ -->
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
        <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap-editable.css">
    <!-- Main CSS-->

    <link href="css/chat.css" rel="stylesheet" media="all">
    
    <link href="css/theme.css" rel="stylesheet" media="all">
  

</head>

<body class="">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="../assets/images/logo.png"  alt="Diarios con Café" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                <ul class="list-unstyled navbar__list">
                    <li>   INICIO </li>
                    
                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Dashboard </a></li>
                 
                    <li style="border:1px solid #ddd; margin-bottom:10px"></li>  
                    <li>   USUARIOS </li>
                    
                    <li><a href="usuarios.php"><i class="fa fa-users"></i> Usuarios Registrados </a></li>
                 
                    <li style="border:1px solid #ddd; margin-bottom:10px"></li>  
                    <li>  DOMINGOS ILUSTRADOS  </li>
                    <li><a href="ilustraciones.php"><i class="fa fa-folder"></i> Ver Ilustraciones </a></li>
                    <li><a href="agregar-ilustracion.php"><i class="fa fa-plus-circle"></i> Agregar  Ilustración</a> </li>
                    <li style="border:1px solid #ddd; margin-bottom:10px"></li> 
                    
                    <hr> 
                  
                 

                   
                    
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                       <img src="../assets/images/logo.png" alt="Diarios con Café" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                    <li>   INICIO </li>
                    
                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Dashboard </a></li>
                 
                    <li style="border:1px solid #ddd; margin-bottom:10px"></li>  
                    <li>   USUARIOS </li>
                    
                    <li><a href="usuarios.php"><i class="fa fa-users"></i> Usuarios Registrados </a></li>
                 
                    
                    <li style="border:1px solid #ddd; margin-bottom:10px"></li>  
                    <li>  DOMINGOS ILUSTRADOS  </li>
                    <li><a href="ilustraciones.php"><i class="fa fa-folder"></i> Ver Ilustraciones </a></li>
                    <li><a href="agregar-ilustracion.php"><i class="fa fa-plus-circle"></i> Agregar  Ilustración</a> </li>
                    <li style="border:1px solid #ddd; margin-bottom:10px"></li> 
                    
                    <hr> 
                  
                 

                   
                    
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST"></form>
                            <div class="header-button">
                                <div class="noti-wrap"> </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?= get_admin($user_diarios_admin,'usuario'); ?> </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?=  get_admin($user_diarios_admin,'usuario');?></a>
                                                    </h5>
                                                    <span class="email"><?= get_admin($user_diarios_admin,'email'); ;?></span>
                                                </div>
                                            </div>
                                          
                                            <div class="account-dropdown__footer">
                                                <a href="functions/logout.php">
                                                    <i class="zmdi zmdi-power"></i> Sign off</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->