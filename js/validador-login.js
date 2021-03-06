// JavaScript Validación
$('document').ready(function () {

    // Máscara para validación de Email
    var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    $.validator.addMethod("validemail", function (value, element) {
            return this.optional(element) || eregex.test(value);
        });

    $("#formulariologin").validate({

        rules: {

            email: {
                required: true,
                validemail: true
            },
            password: {
                required: true
            }
        },
        messages: {
            email: {
                required: "Por favor, ingrese una dirección de correo válida",
                validemail: "Introduzca correctamente su correo"
            },
            password: {
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
        submitHandler: function (form) {
            grecaptcha.ready(function () {
                grecaptcha.execute('6Le03n0eAAAAAPvJr46Tq6U9BnQpMEICuIJNy1rK',{action: 'application_form'}).then(function(token){

                        // var formData = $(form).serialize();
                        let formData = {
                            email: $('#email').val(),
                            password: $('#password').val(),
                            token: token,
                            action: 'application_form'
                        };
                        $(form).ajaxSubmit({

                            type: 'POST',
                            url: 'functions/login.php',
                            data: formData,
                            success: function (html) {
                                if (html == 'true') {
                                  window.location = "perfil-usuario.php";
                                 

                                } else {
                                    $("#add_err").html(html);

                                }
                            },
                            beforeSend: function () {
                                $(".content-inner-all").addClass('opacity-b');
                                $("#add_err").html("Procesando ...");

                            }

                        });

                    });
            });

        } // end submit handler
    });


    $("#formulario-olvido").validate({

        rules: {

            email: {
                required: true,
                validemail: true
            }
        },
        messages: {
            email: {
                required: "Por favor, ingrese una dirección de correo válida",
                validemail: "Introduzca correctamente su correo"
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
        submitHandler: function (form) {
            grecaptcha.ready(function () {
                grecaptcha.execute('6Le03n0eAAAAAPvJr46Tq6U9BnQpMEICuIJNy1rK',{action: 'application_form'}).then(function(token){

                        // var formData = $(form).serialize();
                        let formData = {
                            email: $('#email').val(),
                            token: token,
                            action: 'application_form'
                        };
                        $(form).ajaxSubmit({

                            type: 'POST',
                            url: 'functions/forgot.php',
                            data: formData,
                            success: function (html) {
                                if (html == 'true') {
                                    $("#add_err").html(html);
                                 

                                } else {
                                    $("#add_err").html(html);

                                }
                            },
                            beforeSend: function () {
                                $(".content-inner-all").addClass('opacity-b');
                                $("#add_err").html("Procesando ...");

                            }

                        });

                    });
            });

        } // end submit handler
    });
});