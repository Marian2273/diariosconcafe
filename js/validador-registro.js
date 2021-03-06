// JavaScript Validación
$('document').ready(function () {
                // Validación para campos de texto exclusivo, sin caracteres especiales ni
                // números
                var nameregex = /^[a-zA-Z ]+$/;
            
                $.validator.addMethod("validname", function (value, element) {
                        return this.optional(element) || nameregex.test(value);
                    });
            
                // Máscara para validación de Email
                var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            
                $.validator.addMethod("validemail", function (value, element) {
                        return this.optional(element) || eregex.test(value);
                    });
            
            

$("#registro-form").validate({
            
               rules: {
                nombre: {
                required: true,
                },
               email: {
               required: true,
                 validemail: true
               },
               apellido: {
                required: true,
                 },
                 niveles:{
                     required: true,
                 },
                 telefono:{
                    required: true,
                },
                 password: {
                    required: true,
                    minlength: 8,
                    maxlength: 15
                   },
                   cpassword: {
                    required: true,
                    equalTo: '#password'
                   },
                   password1: {
                    minlength: 8,
                    maxlength: 12
                   },
                   cpassword1: {
                    equalTo: '#password1'
                   },
                   terminos:{
                    required: true,
                   }
                },
                messages: {
                nombre: {
                    required: "Este dato es obligatorio",
                },
                email: {
                required: "Por favor, ingrese una dirección de correo válida",
                validemail: "Introduzca correctamente su correo"
                },
                password: {
                    required: "Este dato es obligatorio",
                },
              
                apellido: {
                    required: "Este dato es obligatorio",
                    },
                    niveles:{
                        required: "Este dato es obligatorio",
                    },
                    telefono:{
                        required: "Este dato es obligatorio",
                    },
                password: {
                        required: "Este dato es obligatorio",
                        minlength: "Mínimo 8 caracteres",
                        maxlength:"Máximo 12 caracteres",
                        },
                        password1: {
                         
                            minlength: "Mínimo 8 caracteres",
                            maxlength:"Máximo 12 caracteres",
                            },
                        cpassword:{
                            required: "Este dato es obligatorio",
                            equalTo:"Por favor, introduzca el mismo valor de nuevo",
                        },
                        cpassword1:{
                            equalTo:"Por favor, introduzca el mismo valor de nuevo",
                        },
                 terminos: {
                    required: "Leer y Aceptar los términos y condiciones",
                                }
                                  
                                },
                                errorPlacement: function (error, element) {
                                    $(element)
                                        .closest('.form-group')
                                        .find('.help-block')
                                        .html(error.html());
                                },
                                highlight: function (element) {
                                    $(element)
                                        .closest('.form-group')
                                        .removeClass('has-success')
                                        .addClass('has-error');
                                },
                                unhighlight: function (element, errorClass, validClass) {
                                    $(element)
                                        .closest('.form-group')
                                        .removeClass('has-error')
                                        .addClass('has-success');
                                    $(element)
                                        .closest('.form-group')
                                        .find('.help-block')
                                        .html('');
                                },
                        
                               /* submitHandler: function (form) {
                                   /* var form = $('#formulario-contacto');
                                    form.action = "functions/ingreso-contrato.php";
                                    form.submit(); 
                                    
                        
                                }*/
                                submitHandler: function (form) {
                                                grecaptcha.ready(function () {
                                                    grecaptcha.execute('6Le03n0eAAAAAPvJr46Tq6U9BnQpMEICuIJNy1rK',{action: 'application_form'}).then(function(token){
                                    
                                                            // var formData = $(form).serialize();
                                                            let formData = {
                                                                email: $('#email').val(),
                                                                nombre: $('#nombre').val(),
                                                                apellido: $('#apellido').val(),
                                                                niveles: $('#niveles').val(),
                                                                password: $('#password').val(),
                                                                password1: $('#password1').val(),
                                                                id_update: $('#id_update').val(),
                                                                token: token,
                                                                action: 'application_form'
                                                            };
                                                            $(form).ajaxSubmit({
                                    
                                                                type: 'POST',
                                                                url: 'functions/add-user.php',
                                                                data: formData,
                                                                success: function (html) {
                                                                    if (html == 'true') {
                                                                        Swal.fire({icon: 'success', 
                                                                        title: '<span style="font-size:16px;"> Su Registro se realizó con éxito <br> Muchas Gracias! </span>', 
                                                                        showConfirmButton: true, 
                                                                        confirmButtonColor: '#15b29f', 
                                                                         }).then(function(){ 
                                                                            window.location = "ingresar.php";
                                                                        });
                                                                       
                                                                       
                                                                    }  else if(html == 'update'){
                                                                        Swal.fire({icon: 'success', 
                                                                        title: '<span style="font-size:16px;"> Su Registro se realizó con éxito <br> Muchas Gracias! </span>', 
                                                                        showConfirmButton: true, 
                                                                        confirmButtonColor: '#15b29f', 
                                                                         }).then(function(){ 
                                                                            window.location = "perfil-usuario.php";
                                                                        });
                                                                    }

                                                                     else {
                                                                        $("#add_err").html(html);
                                    
                                                                    }
                                                                },
                                                                beforeSend: function () {

                                                                    $("#add_err").html("Procesando...");
                                    
                                                                }
                                    
                                                            });
                                    
                                                        });
                                                });
                                    
                                } // end submit handler
                        });






                        $("#suscriptor-form").validate({
            
                            rules: {
                             nombre: {
                             required: true,
                             },
                            email: {
                            required: true,
                              validemail: true
                            },
                            apellido: {
                             required: true,
                              },
                            
                              telefono:{
                                 required: true,
                             }
                            
                             
                             },
                             messages: {
                             nombre: {
                                 required: "Este dato es obligatorio",
                             },
                             email: {
                             required: "Por favor, ingrese una dirección de correo válida",
                             validemail: "Introduzca correctamente su correo"
                             },
                            
                           
                             apellido: {
                                 required: "Este dato es obligatorio",
                                 },
                                
                                 telefono:{
                                     required: "Este dato es obligatorio",
                                 },
                            
                           
                                               
                                             },
                                             errorPlacement: function (error, element) {
                                                 $(element)
                                                     .closest('.form-group')
                                                     .find('.help-block')
                                                     .html(error.html());
                                             },
                                             highlight: function (element) {
                                                 $(element)
                                                     .closest('.form-group')
                                                     .removeClass('has-success')
                                                     .addClass('has-error');
                                             },
                                             unhighlight: function (element, errorClass, validClass) {
                                                 $(element)
                                                     .closest('.form-group')
                                                     .removeClass('has-error')
                                                     .addClass('has-success');
                                                 $(element)
                                                     .closest('.form-group')
                                                     .find('.help-block')
                                                     .html('');
                                             },
                                     
                                            /* submitHandler: function (form) {
                                                /* var form = $('#formulario-contacto');
                                                 form.action = "functions/ingreso-contrato.php";
                                                 form.submit(); 
                                                 
                                     
                                             }*/
                                             submitHandler: function (form) {
                                                             grecaptcha.ready(function () {
                                                                 grecaptcha.execute('6Le03n0eAAAAAPvJr46Tq6U9BnQpMEICuIJNy1rK',{action: 'application_form'}).then(function(token){
                                                 
                                                                         // var formData = $(form).serialize();
                                                                         let formData = {
                                                                             email: $('#email').val(),
                                                                             nombre: $('#nombre').val(),
                                                                             apellido: $('#apellido').val(),
                                                                             niveles: $('#niveles').val(),
                                                                             password: $('#password').val(),
                                                                             password1: $('#password1').val(),
                                                                             id_update: $('#id_update').val(),
                                                                             token: token,
                                                                             action: 'application_form'
                                                                         };
                                                                         $(form).ajaxSubmit({
                                                 
                                                                             type: 'POST',
                                                                             url: 'functions/add-suscriptor.php',
                                                                             data: formData,
                                                                             success: function (html) {
                                                                                 if (html == 'true') {
                                                                                     Swal.fire({icon: 'success', 
                                                                                     title: '<span style="font-size:16px;"> El suscriptor se agregó exitosamente. </span>', 
                                                                                     showConfirmButton: true, 
                                                                                     confirmButtonColor: '#15b29f', 
                                                                                      }).then(function(){ 
                                                                                        window.location = "perfil-usuario.php";
                                                                                     });
                                                                                    
                                                                                    
                                                                                 }  else {
                                                                                     $("#add_err").html(html);
                                                 
                                                                                 }
                                                                             },
                                                                             beforeSend: function () {
             
                                                                                 $("#add_err").html("Procesando...");
                                                 
                                                                             }
                                                 
                                                                         });
                                                 
                                                                     });
                                                             });
                                                 
                                             } // end submit handler
                                     });
             
             
    
});
