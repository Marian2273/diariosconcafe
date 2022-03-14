<?php include("includes/header.php"); ?>
    <!-- Slider Start -->
<?php if($user_cafe != ''){ ?>  
<section class="resumen">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <img src="img/cafecito.png" alt="diarios con café">
                    <h4 class="verde">EDITAR SUSCRIPTOR</h4>
                    
                </div>
                
                        <div class="col-md-12 col-sm-12 perfil">
               <a href="perfil-usuario.php" class="link-verde volver"> <i class="fa fa-arrow-left"></i> Volver </a>
                                </div>

         
          <div class="col-md-12">
              
                <div class="login-form">
                <form method="post" id="suscriptor-form" role="form" autocomplete="off" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nombre</label>
                            <div class="form-group has-success"> 
                            <input class="au-input au-input--full form-control" type="text" id="nombre" name="nombre"  placeholder="Nombre" value="<?php echo get_info(grupal, $_GET['id'], nombre);?>">
                            <span id="error" class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Apellido</label>
                            <div class="form-group has-success"> 
                            <input class="au-input au-input--full form-control" type="text" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo get_info(grupal, $_GET['id'], apellido);?>">
                            <span id="error" class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <div class="form-group has-success"> 
                            <input class="au-input au-input--full form-control" type="email" id="email" name="email" placeholder="Email" value="<?php echo get_info(grupal, $_GET['id'], email);?>">
                            <span id="error" class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Teléfono / WhatsApp</label>
                            <div class="form-group has-success"> 
                            <input class="au-input au-input--full form-control" type="text" id="telefono" name="telefono" placeholder="Teléfono / WhatsApp" value="<?php echo get_info(grupal, $_GET['id'], telefono);?>">
                            <span id="error" class="help-block"></span>
                            </div>
                        </div>
                                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                                <input type="hidden" name="id_update" value="1">

                        <button class="au-btn au-btn--block au-btn--green m-b-20 btn-login" type="submit">  Editar Suscriptor </button>
                        </form>
                        </form>
                           <div class="col-lg-12" id="add_err"></div>
                        </div>
          </div>
          </div>     
    </div>
  

</section>

    <?php } else{ ?>  
<section class="resumen">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <img src="img/cafecito.png" alt="diarios con café">
                    <h4 class="verde">EDITAR PERFIL DEL USUARIO</h4>
                    <hr>
                    Debes estar logueado para acceder a esta sección.
                    <a href="ingresar.php" class="link-verde"> Iniciar Sesión </a>
            </div>
        </div>
    </div>
</section>

    
    
    <?php }   ?>

<?php include("includes/footer.php"); ?>