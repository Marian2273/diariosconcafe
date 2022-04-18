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
                                            <li class="list-inline-item"> Usuarios Registrados </li>
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
                                 
                                    <div class="datatable-dashv1-list custom-datatable-overright">
                           
                                        <div class="table-responsive">
                                        <table class="table table-striped" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="false" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="false" data-show-toggle="false" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="false" data-toolbar="#toolbar">
                                            <thead>
                                                <tr>
                                                   
                                                    <th  class="centrado" data-field="id">ID</th>
                                                    <th data-field="name">Imagen</th>
                                                   
                                                    <th class="">Fecha</th>
                                                  
                                                    <th class="centrado">Activo</th>
                                                    <th class="centrado">Ver / Editar </th>
                                                  
                                                    
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php  get_lista_ilustraciones();?>
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
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