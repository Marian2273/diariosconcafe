$(function () {
    // ajax call better placed here. id="my ID"; Define id, as it's not defined in
    // the original post. Commented out just for JsFiddle, uncomment this for live
    // version.
    $.getJSON('checkDates.php', function (json) {
        dates = json;

        $("#datepicker").datepicker(
            {
                dateFormat: 'yy-mm-dd',
                numberOfMonths: 4,
                minDate: '0',
                yearRange: "-100:+20",
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                inline: true,
               // beforeShowDay: checkAvailability
            
          }
        );
    });
    $('#text').change(function () {
        $('#datepicker').datepicker('setDate', $(this).val());
    });
    $('#datepicker').change(function () {
        $('#text').attr('value', $(this).val());

    });

});
//Id is not defined. This may be something you just missed in the post.

function checkAvailability(mydate) {
    var myBadDates = dates;

    var $return = true;
    var $returnclass = "available";
    $checkdate = $
        .datepicker
        .formatDate('yy-mm-dd', mydate);
    //Here we do a quick indexOf check start loop
    for (var x in myBadDates) {
        console.log(x);
        if (myBadDates[x].dates == $checkdate) {
            $return = false;
            $returnclass = "unavailable";
        }

        $myBadDates = new Array(myBadDates[x]['start']);

        for (var i = 0; i < $myBadDates.length; i++) 

            if ($myBadDates[i] == $checkdate) {
                $return = false;
                $returnclass = "unavailable";
            }
        
    } //end loop
    return [$return, $returnclass];
}

$(function () {
  // ajax call better placed here. id="my ID"; Define id, as it's not defined in
  // the original post. Commented out just for JsFiddle, uncomment this for live
  // version.
  $.getJSON('checkDates.php', function (json) {
      dates = json;

      $("#datepicker1").datepicker(
          {  
              
            dateFormat: 'yy-mm-dd',
            numberOfMonths: 2,
            yearRange: "-100:+20",
            minDate:0,
            maxDate: "+1M",
            beforeShowDay: checkAvailability,
           //beforeShowDay: $.datepicker.noWeekends,
           monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
           monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
           dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
           inline: true,
        }
      );
  });
  $('#text1').change(function () {
      $('#datepicker1').datepicker('setDate', $(this).val());
  });
  $('#datepicker1').change(function () {
      $('#text1').attr('value', $(this).val());

  });

});
//Id is not defined. This may be something you just missed in the post.

function checkAvailability(mydate) {
  var myBadDates = dates;

  var $return = true;
  var $returnclass = "available";
  $checkdate = $
      .datepicker
      .formatDate('yy-mm-dd', mydate);
  //Here we do a quick indexOf check start loop
  for (var x in myBadDates) {
      console.log(x);
      if (myBadDates[x].dates == $checkdate) {
          $return = false;
          $returnclass = "unavailable";
      }

      $myBadDates = new Array(myBadDates[x]['start']);

      for (var i = 0; i < $myBadDates.length; i++) 

          if ($myBadDates[i] == $checkdate) {
              $return = false;
              $returnclass = "unavailable";
          }
      
  } //end loop
  return [$return, $returnclass];
}