function sendThroughAJAX(receivedVar) {
    receivedVar.forEach();
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
            //$("#btnInsert").attr('disabled', true).html("<i class='fa fa-circle-o-notch fa-spin fa-fw'></i> Sending...");
        },
        success: function(phpResponse) {
            var obj = jQuery.parseJSON( phpResponse );

            afterTheResponse(obj.isError, obj.message);

//            $("#rName").val(""); // clear the input
//            $(".radioselect:checked").prop('checked', false); // uncheck the radiobutton
//            $("#rTime").val("");
//            $("#rURL").val("");
        }
    });
}

function asignVars(item, index, arr) {
    //dfhvwjfvwjhevfh
}