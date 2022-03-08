<?php include("includes/header.php"); ?>
    <!-- Slider Start -->
  
<section class="resumen">
    <div class="container">
        <div class="row">
        <div class="col-md-12 col-sm-12">
                        <img src="img/cafecito.png" alt="diarios con café">
                                <h4 class="verde">DETALLE DE SUSCRIPCIÓN</h4>
                                <hr>
                        
                     
        <div class="col-md-4 col-sm-4 botonera-izq">
            <ul>
                <li><a href="perfil-usuario.php" class="link-blanco"> Detalles de Suscripción </a></li>
                <li><a href="editar-perfil.php"class="link-blanco" >Editar del usuario</a></li>
            </ul>
        </div>
      <div class="col-md-8 col-sm-8">
                       
                   
                        <div class="col-md-12 col-sm-12 perfil">
                <h4>Hola, <?php  echo get_user_info($user_cafe, nombre); ?> <?php  echo get_user_info($user_cafe, apellido); ?></h4>
               
                <p>Fecha de Suscripción: <b><?php echo date(" d m, Y", strtotime(get_user_info($user_cafe, date))); ?></b></p>
                <p>Plan: <b><?php  echo get_info(niveles, get_user_info($user_cafe, id_nivel), name); ?></b></p>
                <p>Precio Suscripción: <b><?php  echo get_info(niveles, get_user_info($user_cafe, id_nivel), precio); ?></b></p>
                </div>
        
                <?php if(get_user_info($user_cafe, id_nivel) == 10){ ?>
                    <div class="col-md-12 col-sm-12 perfil">
 
                    <h4>Suscripción Grupal</h4>
                    <p><b>Suscriptores del Plan</b></p>
                   <hr>
                   <?php get_sus_grupal($user_cafe);?>
                    </div>
                        
             <?php } ?>
           
         
    </div>
    <hr class="wp-block-separator is-style-wide"/>

</section>


<?php include("includes/footer.php"); ?>