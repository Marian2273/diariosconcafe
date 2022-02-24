$(document).ready(function() {

$(".link-temario").click(function () {
                var myVar = $(this).attr('data-id');
                
                    $.ajax({
                        url: "functions/get-content.php",
                        dataType:'html',
                        data: {
                            myData: myVar
                        },
                        type: 'GET',
                        success: function (response) {
                            var resp = $.trim(response);
                            $("#contentIndividualPlay").html(resp);
                        }
                    });
              
            });
});