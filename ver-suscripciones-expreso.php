<?php include("includes/header.php"); ?>
<!-- Slider Start -->

<section class="resumen">
    <div class="container">
        <div class="row">
        <div class="col-md-12 col-sm-12">
            
            <h4 class="titulo-blanco">PLAN EXPRESO</h4>
          
          </div>
            <div class="col-md-12 col-sm-12">

                <div class="col-md-4 col-sm-12 tipos">
                   
                    <img src="img/expreso.jpg" class="img-responsive" alt="Diarios con café - Expreso">
                   
                   
                </div>
                <div class="col-md-5 botones-pago">
                <div class="col-md-12 parrafo">
                        <h6>Resumen y audio por WhatsApp</h6>
                        <p>Cada mañana te llega nuestro análisis de las noticias más relevantes con
                            claves de lectura.
                        </p>
                       
                    </div>
                    <?php if($user_cafe == '')
{ ?>
                <a href="ingresar.php" class="btn btn-info btn-verde-sus mercado">
                            AR$ 400 
               </a>
                
               <a href="ingresar.php" class="btn btn-info btn-verde-sus stripe" >
                           €3
                </a>
<?php }   else{ ?>
                <!-- resgistrados -->
                <a href="https://www.mercadopago.com/mla/debits/new?preapproval_plan_id=2c9380847811eb7d017813f5b5ea03ff" class="btn btn-info btn-verde-sus mercado" target="_blank" >
                            AR$ 400 
               </a>
                
               <a href="https://buy.stripe.com/test_eVa2aHeRjg0FezudQQ" class="btn btn-info btn-verde-sus stripe" target="_blank" >
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