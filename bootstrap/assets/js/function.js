function sendReportAJAX(rName, rType, rTime, rURL, theButton) {
    $.ajax({
        method: "POST",
        url: "assets/php/guardar1.php",
        data: {
            rName: rName,
            rType: rType,
            rTime: rTime,
            rURL: rURL
        },
        beforeSend: function() {
            $("#" + theButton).attr('disabled', true).html("<i class='fa fa-circle-o-notch fa-spin fa-fw'></i> Sending...");
            setTimeout(function(){
            
            }, 500);
        },
        success: function(phpResponse) {
            var obj = jQuery.parseJSON( phpResponse );

            afterThePHPResponse(obj.isError, obj.message, theButton);
            //clearAllInputs(".my-input");
//            $("#rName").val(""); // clear the input
//            $(".radioselect:checked").prop('checked', false); // uncheck the radiobutton
//            $("#rTime").val("");
//            $("#rURL").val("");
        }
    });
    
}

function afterThePHPResponse(isError, message, theButton) {
    
        if(isError == "yes")
        {
            $("#results").html("<div class='alert alert-danger alert-dismissible' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> <strong>Error: </strong>"+ message +"</div>");
        }
        else
        {
            $("#results").html("<div class='alert alert-success alert-dismissible' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> <strong>OK: </strong>"+ message +"</div>");
        }
        $("#" + theButton).attr('disabled', false).html("<i class='fa fa-floppy-o' aria-hidden='true'></i> Save");
    
}

function clearAllInputs(receivedClass) {
  $(receivedClass).find(':input').each(function() {
    switch(this.type) {
        case 'password':
        case 'text':
        case 'textarea':
        case 'file':
        case 'select-one':
        case 'select-multiple':
        case 'date':
        case 'number':
        case 'tel':
        case 'email':
            $(this).val('');
            break;
        case 'checkbox':
        case 'radio':
            this.checked = false;
            break;
    }
  });
}