<?php include('includes/header.php');?>
<?php 
     if($_GET['data'] == 'delete'){?>
    <script>
    Swal.fire({icon: 'success', title: 'El Pedido se eliminó con éxito' ,
        showConfirmButton: true,
        confirmButtonColor: '#27ce4b',
        confirmButtonText:'<span onclick="my2()"> OK </span>',});
            function my2() {
            window.location.href = "pedidos.php";   
            } 
  
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
                                                <a href="dashboard.php">Home</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item"> Suscripción Grupal </li>
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
           <section class="statistic listar">
                  <!-- Static Table Start -->
            <div class="data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline13-list shadow-reset lista">
                              
                                <div class="sparkline13-graph">
                                                
                                <p>Nombre y Apellido : <?= get_user_info(usuarios, $_GET[id], nombre);?> <?= get_user_info(usuarios, $_GET[id], apellido);?> </p>
                                <p>Fecha : <?= get_user_info(usuarios, $_GET[id], date);?> </p>
                                <p>Tipo de Suscripción: <?= get_user_info(niveles,get_user_info(usuarios, $_GET[id], id_nivel), name);?> </p>
                                </div>
                                <hr>
                                <div class="sparkline13-graph ">
                                <?php if(get_user_info(usuarios, $_GET[id], id_nivel) == 10){
                                get_sus_grupal( $_GET[id]);

                                 } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Static Table End -->

            </section>
            <!-- END STATISTIC-->

<?php include('includes/footer.php');?>