<?php include("includes/header.php"); ?>
    <!-- Slider Start -->
  
<section class="resumen">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <img src="img/cafecito.png" alt="diarios con café">
                    <h4 class="verde">EDITAR SUSCRIPTOR</h4>
                </div>

                <div class="login-form">
                    <form method="post" id="grupal-form" role="form" autocomplete="off" enctype="multipart/form-data">
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
                        <button class="au-btn au-btn--block au-btn--green m-b-20 btn-login" type="submit">  Editar Suscriptor </button>
            </div>
        </div>
    </section>

    <?php include("includes/footer.php"); ?>