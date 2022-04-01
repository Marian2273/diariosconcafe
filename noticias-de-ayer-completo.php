<?php include('includes/header.php'); ?>
    <!-- Slider Start -->
    <section id="slider1">
             

      <!-- The HTML5 video element that will create the background video on the header -->
    
      
      <!-- The header content -->
     
</section>
<?php if($user_cafe != ''){ ?>  
       <!-- Resumen -->
<section class="resumen">
    <div class="container">
        <div class="row">
           <div class="col-md-12 col-sm-12">
    <h4>
        <img src="img/cafecito.png" alt="diarios con café" class="icono-cafe" >
        <h4>Listado completo de Noticias </h4>
       
       
       
        <hr>  
        <div class="listado-noticias">
         
         
         
          <ul class="col-md-12 ">
            <script  src="//diariosconcafe.us1.list-manage.com/generate-js/?u=50d1b98d85b86ac4d7edaaade&amp;fid=63510&amp;show=5030" type="text/javascript">
          </script>
            </ul>
            <p class="noticias-link" >Este es el listado del último mes. Si tenés una suscripción, podés acceder al
              archivo completo en este <a href="" class="verde">link.</a> 
          </p>
       
        
        </div>
    </div>
    <!-- .col-md-6 close -->
    
            </div>
        </div>
        <?php } else{ ?>  
<section class="resumen">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
               
                 
                    <hr>
                  Para acceder al listado completo de noticias deberas estar    <a href="ingresar.php" class="link-verde">logueado </a> y tener una suscripción.<br>
                  
            </div>
        </div>
    </div>
</section>

    
<?php }   ?>
     

<?php include('includes/footer.php'); ?>