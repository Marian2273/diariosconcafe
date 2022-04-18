<?php include('includes/header.php');?>
<?php 
     if($_GET['data'] == 'delete'){?>
    <script>
    Swal.fire({icon: 'success', title: 'El Producto se eliminó con éxito' ,
        showConfirmButton: true,
        confirmButtonColor: '#27ce4b',
        });
          
  
    </script>
    <?php } ?>

     <!-- BREADCRUMB-->
     <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                   
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="#">Home</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item">Dashboard</li>
                                        </ul>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
       
            </section>
         

            <!-- END STATISTIC-->
                    <!-- STATISTIC-->
                    <section class="statistic">
                <div class="container">
                    <div class="row">
                 
                     <a href="usuarios.php"  class="col-md-6 col-lg-4">
                         <div class="statistic__item statistic__item--red">
                 
                                <span class="desc"> Usuarios Registrados </span>
                                <h2 class="number"></h2>
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                            </div>
                       
                        </a>
                        <!--
                        <a href="coaching.php"   class="col-md-6 col-lg-4">
                            <div class="statistic__item statistic__item--red">
                             
                                <span class="desc">Coaching</span>
                                <h2 class="number"></h2>
                                <div class="icon">
                                    <i class="zmdi zmdi-accounts"></i>
                                </div>
                            </div>
                        </a>
                  
                     


                        <a href="cursos.php"   class="col-md-6 col-lg-4">
                            <div class="statistic__item statistic__item--red">
                             
                                <span class="desc">Cursos </span>
                                <h2 class="number"></h2>
                                <div class="icon">
                                    <i class="zmdi zmdi-view-compact"></i>
                                </div>
                            </div>
                        </a>

                        <a href="eventos.php"   class="col-md-6 col-lg-4">
                            <div class="statistic__item statistic__item--red">
                             
                                <span class="desc">Eventos</span>
                                <h2 class="number"></h2>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-check"></i>
                                </div>
                            </div>
                        </a>
                     
                        <a href="personal-shopper.php"   class="col-md-6 col-lg-4">
                            <div class="statistic__item statistic__item--red">
                             
                                <span class="desc">Personal Shopper</span>
                                <h2 class="number"></h2>
                                <div class="icon">
                                    <i class="zmdi  zmdi-shopping-cart"></i>
                                </div>
                            </div>
                        </a>
                        <a href="lectura-cartas.php"   class="col-md-6 col-lg-4">
                            <div class="statistic__item statistic__item--red">
                             
                                <span class="desc"> Lectura de Cartas </span>
                                <h2 class="number"></h2>
                                <div class="icon">
                                <i class="zmdi zmdi-star"></i>
                                </div>
                            </div>
                        </a>
                        <!--
                    <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--blue">
                            
                                <span class="desc">This Week</span>
                                <h2 class="number">50</h2>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--red">
                              
                                <span class="desc">total earnings</span>
                                <h2 class="number">$1,060</h2>
                                <div class="icon">
                                    <i class="zmdi zmdi-money"></i>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </section>

<?php include('includes/footer.php');?>