
<?php include("includes/header.php"); ?>
    <!-- Slider Start -->
  <?php if($user_cafe != ''){ ?>  
<section class="resumen">
    <div class="container">
        <div class="row">
        <div class="col-md-12 col-sm-12">
                        <img src="img/cafecito.png" alt="diarios con café">
                                <h4 class="verde">EDITAR PERFIL DEL USUARIO</h4>
                                <hr>
                        </div>
<div class="col-md-12 col-sm-12">
<div class="col-md-4 col-sm-4 botonera-izq">
            <ul>
                <li><a href="perfil-usuario.php" class="link-blanco"> Detalles de Suscripción </a></li>
                <li><a href="editar-perfil.php"class="link-blanco" > Editar Perfil del usuario</a></li>
            </ul>
            <div class="well">
          <span> Para cambiar la dirección de mail, el tipo de suscripción, ó consultas relacionadas, por favor mandanos un mail a <a href="mailto:suscripciones@diariosconcafe.com" class="verde" target="_blank" >suscripciones@diariosconcafe.com</a> </span>
          </div>
        </div>
        
 <div class="col-md-8">
            
         
               
            <div class="login-form">
                            <form method="post" id="registro-form" role="form" autocomplete="off" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <div class="form-group has-success"> 
                                    <input class="au-input au-input--full form-control" type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo get_user_info($user_cafe, nombre); ?>" >
                                    <span id="error" class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Apellido</label>
                                    <div class="form-group has-success"> 
                                    <input class="au-input au-input--full form-control" type="text" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo get_user_info($user_cafe, apellido); ?>" >
                                    <span id="error" class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="form-group has-success"> 
                                    <input class="au-input au-input--full form-control" type="email" id="email" name="email" placeholder="Email" readonly value="<?php echo get_user_info($user_cafe, email); ?>" >
                                    <span id="error" class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Teléfono / WhatsApp</label>
                                    <div class="form-group has-success"> 
                                    <input class="au-input au-input--full form-control" type="text" id="telefono" name="telefono" placeholder="Teléfono / WhatsApp" value="<?php echo get_user_info($user_cafe, telefono); ?>" >
                                    <span id="error" class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group has-success"> 
                                <label>Tipo de suscripción</label>
                                                    <select class="form-control  custom-select custom-select-lg " name="niveles1" id="niveles" readonly>
                                                    <option  value="">  <?php echo get_info(niveles,get_user_info($user_cafe, id_nivel), name); ?>  </option>
                                                          
                                                             
                                                    </select>
                                                    <span id="error" class="help-block"></span>
                                    </div>
                                <div class="form-group">
                                    <label>Clave</label>
                                    <div class="form-group has-success"> 
                                    <input class="au-input au-input--full form-control" type="password" id="password1" name="password1" placeholder="********">
                                    <span id="error" class="help-block"></span>
                                </div>
                                <div class="form-group">
                                    <label>Repetir Clave</label>
                                    <div class="form-group has-success"> 
                                    <input class="au-input au-input--full form-control" type="password" id="cpassword1" name="cpassword1"  placeholder="********">
                                    <span id="error" class="help-block"></span>
                                </div>
                               
                                <input type="hidden" name="id_update" value="1">
                                </div>
                            
                                <button class="au-btn au-btn--block au-btn--green m-b-20 btn-login" type="submit">  Editar Perfil </button>
                              
                            </form>
                           <div class="col-lg-12" id="add_err"></div>
                        </div>
          </div>
          </div>     
    </div>

    <hr class="wp-block-separator is-style-wide"/>
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