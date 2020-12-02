$(document).ready(function()
{
    $( "#submitContactForm" ).submit(function( event )
    {
        event.preventDefault();
        if($("#message").val().length < 26)
        {
            alert("Please make the message greater than 25 characters");
        }else
        {
            var data = $("#submitContactForm").serializeArray();
            //data.push({name: "tienn2t", value: "love"}); //can be used to add extra fields
            $.ajax({
                type: "POST",
                url: "formSubmit.php",
                data: data,
                dataType: "text",
                success: function(returnData) {
                    //var obj = jQuery.parseJSON(data); if the dataType is not     specified as json uncomment this
                    // do what ever you want with the server response
                    console.log(returnData);
                    $("#information").html(returnData)
                },
                error: function(jqXHR, exception) {
                    var msg = "";
                    if (jqXHR.status === 0) {
                        msg = "Not connect.\n Verify Network.";
                    } else if (jqXHR.status == 404) {
                        msg = "Requested page not found. [404]";
                    } else if (jqXHR.status == 500) {
                        msg = "Internal Server Error [500].";
                    } else if (exception === "parsererror") {
                        msg = "Requested JSON parse failed.";
                    } else if (exception === "timeout") {
                        msg = "Time out error.";
                    } else if (exception === "abort") {
                        msg = "Ajax request aborted.";
                    } else {
                        msg = "Uncaught Error.\n" + jqXHR.responseText;
                    }
                    alert("error handing here: " + msg);
                }
            });
        }
    });
});