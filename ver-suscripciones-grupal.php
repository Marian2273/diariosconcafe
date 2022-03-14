<?php include("includes/header.php"); ?>
<!-- Slider Start -->

<section class="suscripcion">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">

                <div class="col-md-6 titulo-sus">
                Suscripción grupal
                </div>
                <div class="col-md-6 precio-sus">
                    AR$ 2000.- / €15.-
                </div>

             
            </div>

            <hr style="width:100%" class="wp-block-separator is-style-wide"/>
            <div class="col-md-12 col-sm-12">

                <div class="col-md-6 col-sm-12 tipos">

                    <img
                        src="img/ronda-single.jpg"
                        class="img-responsive"
                        alt="Diarios con café - Expreso">
                <div class="col-md-12"> 
                    <h4>Para suscribirte a este envío, primero debés resgistrado o estar logueado/a.</h4>     </div>
                </div>
                <div class="col-md-6 botones-pago">
                    <div class="col-md-12 parrafo">
                       
                <p>¡Para todas y todos! Si tenés un grupo de trabajo, familiar, de amistades, de deporte… lo que sea. Te ofrecemos un ofertón de cinco suscripciones con doble envío para que la experiencia Diarios con Café se siga expandiendo. </p>
                        <p><strong>Cada mañana les llega al WhatsApp y al Mail:</strong></p>
                        <p>Resumen editorial con lo más destacado del día y claves en negrita para una lectura más dinámica.</p>
                        <p><strong>Un audio en formato mp3</strong> con la lectura del resumen editorial.</p>
                        <p>Un listado con los links de las notas más destacadas de los medios relevados.</p>
                        <p>Los domingos además te llega<strong> Una ilustración representativa de la semana</strong> </p>
                    </div>
                    <?php if($user_cafe == '')
{ ?>
                    <a href="registro.php" class="btn btn-info btn-verde-sus mercado">
                        REGISTRARME
                    </a>

                    <a href="ingresar.php" class="btn btn-info btn-verde-sus stripe">
                       YA ME HE REGISTRADI / ENTRAR
                    </a>
                <?php }   else{ ?>
                    <!-- resgistrados -->
                    <a
                        href="https://www.mercadopago.com.ar/subscriptions/checkout?preapproval_plan_id=2c9380847af0a720017b131cd06419f8"
                        class="btn btn-info btn-verde-sus mercado"
                        target="_blank">
                        AR$ 2000
                    </a>

                    <a
                        href="https://buy.stripe.com/test_6oE9D9fVn15L8b6bIL"
                        class="btn btn-info btn-verde-sus stripe"
                        target="_blank">
                        €15
                    </a>
                    <?php }   ?>

                </div>
            </div>

        </div>
        <hr class="wp-block-separator is-style-wide"/>
    </div>
</section>

<?php include("includes/footer.php"); ?>