<?php include("includes/header.php"); ?>
<!-- Slider Start -->

<section class="suscripcion">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">

                <div class="col-md-6 titulo-sus">
                    Expreso
                </div>
                <div class="col-md-6 precio-sus">
                    AR$ 400.- / €3.-
                </div>

             
            </div>

            <hr style="width:100%" class="wp-block-separator is-style-wide"/>
            <div class="col-md-12 col-sm-12">

                <div class="col-md-6 col-sm-12 tipos">

                    <img
                        src="img/expreso.jpg"
                        class="img-responsive"
                        alt="Diarios con café - Expreso">
                <div class="col-md-12"> 
                    <h4>Para suscribirte a este envío, primero debés resgistrado o estar logueado/a.</h4>     </div>
                </div>
                <div class="col-md-6 botones-pago">
                    <div class="col-md-12 parrafo">
                       
                        <p>El cortito, el que tomás de un sorbo en tu casa mientras terminás de vestirte para salir o de parado en un bar camino al trabajo.
                          
                        </p>
                        <p><strong>Cada mañana te llega a tu Whatsapp</strong></p>
                        <p><strong>Resumen editorial en formato .pdf</strong> con lo más destacado del día y clave en negrita oara lectura más dinámica. (Lunes a Lunes)</p>
                        <p><strong>Un audio en formato mp3</strong> con la lectura del resumen. Ideal para los verdaderos amantes del expreso. Entre 5 y 7 minutos estarás informado cada día (Lunes a Viernes).</p>
                        <p>Los domingos además te llega<strong>Una ilustración representativa de la semana</strong> </p>
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
                        href="https://www.mercadopago.com/mla/debits/new?preapproval_plan_id=2c9380847811eb7d017813f5b5ea03ff"
                        class="btn btn-info btn-verde-sus mercado"
                        target="_blank">
                        AR$ 400
                    </a>

                    <a
                        href="https://buy.stripe.com/test_eVa2aHeRjg0FezudQQ"
                        class="btn btn-info btn-verde-sus stripe"
                        target="_blank">
                        €3
                    </a>
                    <?php }   ?>

                </div>
            </div>

        </div>
        <hr class="wp-block-separator is-style-wide"/>
    </div>
</section>

<?php include("includes/footer.php"); ?>