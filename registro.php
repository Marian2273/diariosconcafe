<?php include("includes/header.php"); ?>
    <!-- Slider Start -->
  
<section class="resumen">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
            <img src="img/cafecito.png" alt="diarios con café">
            <h4 class="verde">Registrarse</h4>
            <div class="login-form">
                            <form method="post" id="registro-form" role="form" autocomplete="off" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <div class="form-group has-success"> 
                                    <input class="au-input au-input--full form-control" type="text" id="nombre" name="nombre" placeholder="Nombre">
                                    <span id="error" class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Apellido</label>
                                    <div class="form-group has-success"> 
                                    <input class="au-input au-input--full form-control" type="text" id="apellido" name="apellido" placeholder="Apellido">
                                    <span id="error" class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="form-group has-success"> 
                                    <input class="au-input au-input--full form-control" type="email" id="email" name="email" placeholder="Email">
                                    <span id="error" class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Teléfono / WhatsApp</label>
                                    <div class="form-group has-success"> 
                                    <input class="au-input au-input--full form-control" type="text" id="telefono" name="telefono" placeholder="Teléfono / WhatsApp">
                                    <span id="error" class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group has-success"> 
                                <label>Tipo de suscripción</label>
                                                    <select class="form-control  custom-select custom-select-lg " name="niveles" id="niveles">
                                                    <option  value=""> Sleccionar tipo de suscripción </option>
                                                            <?php get_level(); ?> 
                                                             
                                                    </select>
                                                    <span id="error" class="help-block"></span>
                                    </div>
                                <div class="form-group">
                                    <label>Clave</label>
                                    <div class="form-group has-success"> 
                                    <input class="au-input au-input--full form-control" type="password" id="password" name="password" placeholder="********">
                                    <span id="error" class="help-block"></span>
                                </div>
                                <div class="form-group">
                                    <label>Repetir Clave</label>
                                    <div class="form-group has-success"> 
                                    <input class="au-input au-input--full form-control" type="password" id="cpassword" name="cpassword"  placeholder="********">
                                    <span id="error" class="help-block"></span>
                                </div>
                                </div>
                                <div class="form-group">
                                    
                                    <div class="form-group has-success"> 
                                    <label class="form-check-label" for="exampleCheck1">Términos y Condiciones</label>
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" value="1" name="terminos" >
                                  
                                    <span id="error" class="help-block termino"></span>
                                    
                                </div>
                                <a href="terminos-condiciones.php" class="link-verde col-lg-12 terminos" target="_blank">Ver términos y condiciones</a>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20 btn-login" type="submit">  Registrarme </button>
                              
                            </form>
                           <div class="col-lg-12" id="add_err"></div>
                        </div>
          </div>
          <hr>
    </div>
    

</section>


<?php include("includes/footer.php"); ?>