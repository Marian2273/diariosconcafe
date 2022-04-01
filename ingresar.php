<?php include("includes/header.php"); ?>
    <!-- Slider Start -->
  
<section class="resumen">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
            <img src="img/cafecito.png"  class="icono-cafecito" alt="diarios con café">
            <h4 class="verde titulo-verde">Iniciar Sesión</h4>
            <div class="login-form">
                            <form method="post" id="formulariologin" role="form" autocomplete="off" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Usuario</label>
                                    <div class="form-group has-success"> 
                                    <input class="au-input au-input--full form-control" type="email" id="email" name="email" placeholder="Email">
                                    <span id="error" class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Clave</label>
                                    <div class="form-group has-success"> 
                                    <input class="au-input au-input--full form-control" type="password" id="password" name="password" placeholder="********">
                                    <span id="error" class="help-block"></span>
                                </div>
                                </div>
                                <div class="forgot col-md-6 ">
						        <a href="olvido-su-clave.php"> Olvidé mi contraseña </a>
					            </div>
                                <div class="reg col-md-6">
						        <a href="registro.php"> Registrarme </a>
					            </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20 btn-login" type="submit">  Login </button>
                              
                            </form>
                           <div class="col-lg-12" id="add_err"></div>
                        </div>
          </div>

    </div>
    <hr class="wp-block-separator is-style-wide"/>

</section>


<?php include("includes/footer.php"); ?>