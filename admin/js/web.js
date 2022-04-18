$(function () {
                // Get the form.
                var form = $('#loginForm');
                // Get the messages div.
              
                // Set up an event listener for the contact form.
                $(form).submit(function (e) {
                    // Stop the browser from submitting the form.
                    e.preventDefault();
            
                    // Serialize the form data.
                    var formData = $(form).serialize();
            
                    // Submit the form using AJAX.
                    $.ajax({
                        type: 'POST',
                        url: $(form).attr('action'),
                        data: formData,
                        success: function (html) {
                            if (html == 'true') {
                                window.location="dashboard.php";
                }           else {
            
                                $("#add_err").addClass('animated fadeInDown');
                                $("#add_err").html(html);
                               // setInterval('location.reload()', 2000);
            
                            }
                        },
                        beforeSend: function () {
            
                            $("#add_err").addClass('animated fadeInDown');
                            $("#add_err").html('Procesando...');
                            
                        }
                    });
            
                });
            
            });

            