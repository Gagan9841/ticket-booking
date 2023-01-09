function onLoaderFunc()
{
  $(".seatStructure *").prop("disabled", true);
  $(".displayerBoxes *").prop("readonly", true);
}
function takeData()
{
  if (( $("#Username").val().length == 0 ) || ( $("#Numseats").val().length == 0 ))
  {
  alert("Please Enter your Name and Number of Seats");
  }
  else
  {
    $(".inputForm *").prop("readonly", true);
    $(".seatStructure *").prop("disabled", false);
    $(".submit").prop("disabled", true);

    document.getElementById("notification").innerHTML = "<b class='btn btn-info btn-outline-danger'>Please Select your Seats NOW!</b>";
  }
}


function updateTextArea() {

  if ($("input:checked").length == ($("#Numseats").val()))
    {
      $(".seatStructure *").prop("disabled", true);
      $(".submit").prop("disabled", false);

     var allNameVals = [];
     var allticketVals = [];
     var allNumberVals = [];
     var allMovieVals = [];
     var allSeatsVals = [];
     var allpriceVals = [];

     //Storing in Array
     allNameVals.push($("#Username").val());
     allticketVals.push($("#ticketNo").val());
     allMovieVals.push($("#movie").val());
     allNumberVals.push($("#Numseats").val());
     allpriceVals.push($("#ticket_rate").val()*$("#Numseats").val());
     $('#seatsBlock :checked').each(function() {
       allSeatsVals.push($(this).val());
     });

     //Displaying
     $('#nameDisplay').val(allNameVals);
     $('#TicketDisplay').val(allticketVals);
     $('#movieDisplay').val(allMovieVals);
     $('#NumberDisplay').val(allNumberVals);
     $('#seatsDisplay').val(allSeatsVals);
     $('#rateDisplay').val(allpriceVals);
    }
  else
    {
      alert("Please select " + ($("#Numseats").val()) + " seats")
    }
  }


function myFunction() {
  alert($("input:checked").length);
}

/*
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
*/


$(":checkbox").click(function() {
  if ($("input:checked").length == ($("#Numseats").val())) {
    $(":checkbox").prop('disabled', true);
    $(':checked').prop('disabled', false);
  }
  else
    {
      $(":checkbox").prop('disabled', false);
    }
});


