<?php include('includes/header.php');?>



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
                                            <li class="list-inline-item">Cargar Producto </li>
                                        </ul>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- STATISTIC-->
            <section class="statistic">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            
                        <div class="col-lg-8">
                                
                                 
                                    <div class="card-block">
                                        <form method="post" enctype="multipart/form-data" class="form-horizontal" id="formulario-productos">
                                           
                                           <!-- input --> 
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label"> Fecha </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                   <div class="form-group has-success"> 
                                                  
                                                                <div class='input-group date' id='datetimepicker1'>
                                                                <input type='text' class="form-control" />
                                                                <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                                </div>
                                                                </div>
                                                                
                                                                <script type="text/javascript">
                                                                $(function () {
                                                                $('#datetimepicker1').datetimepicker();
                                                                });
                                                                </script>
                                                    <small class="form-text text-muted"> 150 máx. caracteres </small>
                                                    <span id="error" class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                             <!-- ..//input --> 




                                              
                                            <!-- input -->
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Ilustración</label>
                                                </div>
                                                <div class="col-lg-3 col-md-3">
                                                
                                                <div class="form-group has-success"> 
                                                 <input type="file" id="file-input" onchange="readURL(this);"  name="file1" class="form-control-file">
                                                    <span id="error" class="help-block"></span>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-lg-5 col-md-5">
                                                
                                                <img id="blah" src="https://placehold.it/640x500" class="img-thumbnail"/>
                                                        <script type="text/javascript">
                                                            function readURL(input) {
                                                                if (input.files && input.files[0]) {
                                                                    var reader = new FileReader();
                                                                    reader.onload = function (e) {
                                                                        $('#blah').attr('src', e.target.result);
                                                                    }
                                                                    reader.readAsDataURL(input.files[0]);
                                                                }
                                                            }
                                                        </script>
                                                </div>
                                            </div>

                                              <!-- ..//input --> 
                                           

                                            
                                            <!-- input -->
                                            <div class="row form-group">
                                                <div class="col col-md-3"></div>
                                                <div class="col-12 col-md-9" style="padding:0px">
                                                <button type="submit" class="btn btn-primary btn-cargar"> Cargar Producto </button>
                                                </div>
                                            </div>
                                             <!-- ..//input --> 
                                        </form>
                                    </div>
                                    <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12"></div>
                            <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                    <div class="col-lg-12 procesando-delete">
                                        <div id="error-lv" class="error"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                                </div>
                               
                          
                       
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->

      

<?php include('includes/footer.php');?>