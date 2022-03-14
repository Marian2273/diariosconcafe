<?php include("includes/header.php"); ?>
<!-- Slider Start -->

<section class="suscripcion">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">

                <div class="col-md-6 titulo-sus">
                   Cortado
                </div>
                <div class="col-md-6 precio-sus">
                    AR$ 700.- / €5.-
                </div>

             
            </div>

            <hr style="width:100%" class="wp-block-separator is-style-wide"/>
            <div class="col-md-12 col-sm-12">

                <div class="col-md-6 col-sm-12 tipos">

                    <img
                        src="img/cortado.jpg"
                        class="img-responsive"
                        alt="Diarios con café - Expreso">
                <div class="col-md-12"> 
                    <h4>Para suscribirte a este envío, primero debés resgistrado o estar logueado/a.</h4>     </div>
                </div>
                <div class="col-md-6 botones-pago">
                    <div class="col-md-12 parrafo">
                       
                        <p>El jarrito, el que tomás con algo más de tiempo. Tal vez ya estés sentado en la oficina frente a una computadora. O en tu casa empezando a trabajar. 

                          
                        </p>
                        <p><strong>Cada mañana te llega a tu Mail:</strong></p>
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
                        href="https://www.mercadopago.com/mla/debits/new?preapproval_plan_id=2c9380847811eb78017813f77e240430"
                        class="btn btn-info btn-verde-sus mercado"
                        target="_blank">
                        AR$ 700
                    </a>

                    <a
                        href="https://buy.stripe.com/test_5kA2aH6kN01H62Y6op"
                        class="btn btn-info btn-verde-sus stripe"
                        target="_blank">
                        €5
                    </a>
                    <?php }   ?>

                </div>
            </div>

        </div>
        <hr class="wp-block-separator is-style-wide"/>
    </div>
</section>

<?php include("includes/footer.php"); ?>