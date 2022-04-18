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

    // CIF     
    var cifvalid = /^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$|^[0-9]{8}[A-Z]{1}$/;
    $.validator.addMethod("validcif", function (value, element) {
        return this.optional(element) || cifvalid.test(value);
    });

    //NIF / NIE
    var nievalid = /^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$|^[0-9]{8}[A-Z]{1}$/;
    $.validator.addMethod("validnie", function (value, element) {
        return this.optional(element) || nievalid.test(value);
    });


    $("#formulario-informes").validate({

        rules: {
           nombre: {
                required: true,
                maxlength: 150
            },
           
           copete: {
                required: true,
                maxlength: 1200
            },
            file: {
                required: true,
              
            },
          
         
        
        },
        messages: {
            nombre: {
                required: "Este dato es necesario",
                maxlength: "Máximo de 150 caracteres"
            },
           copete: {
                required: "Este dato es necesario",
                maxlength: "Máximo de 150 caracteres"
            },
          
           
            file: {
                required: "Este dato es necesario",
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

    var formData = $(form).serialize();
 
    $(form).ajaxSubmit({

        type: 'POST',
        url: 'functions/agregar-categoria.php',
        data: formData,
        success: function (html) {
            if (html == 'true') {
                $("#error-lv").html(html);
                
            } else {

                $("#error-lv").addClass('help-block');
                $("#error-lv").html(html);

            }
        },
        beforeSend: function () {
          
          
            $("#error-lv").html("Procesando");
          
        }

    });

} // end submit handler
});


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


    $("#formulario-productos").validate({

        rules: {
           nombre: {
                required: true,
                maxlength: 150
            },
           
           subtitulo: {
                required: true,
                maxlength: 150
            },
            precio: {
                required: true,
               
            },
            parrafo1: {
                required: true,
               
            },
            file1: {
                required: true,
              
            },
            id_tipo: {
                required: true,
              
            },
            topico_duracion: {
                required: true,
              
            },
          
         
        
        },
        messages: {
            titulo: {
                required: "Este dato es necesario",
                maxlength: "Máximo de 150 caracteres"
            },
          
            id_categoria: {
                required: "Este dato es necesario",
                
            },
            descripcion: {
                required: "Este dato es necesario",
                
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

    var formData = $(form).serialize();
 
    $(form).ajaxSubmit({

        type: 'POST',
        url: 'functions/agregar-curso.php',
        data: formData,
        success: function (html) {
            if (html == 'true') {
                $("#error-lv").html(html);
                
            } else {

                $("#error-lv").addClass('help-block');
                $("#error-lv").html(html);

            }
        },
        beforeSend: function () {
          
          
            $("#error-lv").html("Procesando");
          
        }

    });

} // end submit handler
});


$("#formulario-subcategoria").validate({


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

var formData = $(form).serialize();

$(form).ajaxSubmit({

    type: 'POST',
    url: 'functions/agregar-subcategoria.php',
    data: formData,
    success: function (html) {
        if (html == 'true') {
            $("#error-lv").html(html);
            
        } else {

            $("#error-lv").addClass('help-block');
            $("#error-lv").html(html);

        }
    },
    beforeSend: function () {
      
      
        $("#error-lv").html("Procesando");
      
    }

});

} // end submit handler
});
})