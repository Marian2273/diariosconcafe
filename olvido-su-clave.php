<?php include("includes/header.php"); ?>
    <!-- Slider Start -->
  
<section class="resumen">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
            <img src="img/cafecito.png" alt="diarios con café">
            <h4 class="verde">Olvidó su clave</h4>
            <div class="login-form">
                            <form method="post" id="formulario-olvido" role="form" autocomplete="off" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Usuario</label>
                                    <div class="form-group has-success"> 
                                    <input class="au-input au-input--full form-control" type="email" id="email" name="email" placeholder="Email con el que se registró">
                                    <span id="error" class="help-block"></span>
                                    </div>
                                </div>
                                
                               
                               
                                <button class="au-btn au-btn--block au-btn--green m-b-20 btn-login" type="submit">  Enviar </button>
                             
                           <div class="col-lg-12" id="add_err"></div>
                        </div>
          </div>

    </div>
    <hr class="wp-block-separator is-style-wide"/>

</section>


<?php include("includes/footer.php"); ?>