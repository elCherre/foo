<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index</title>
    <!-- CSS -->
    <?php 
        include "nah/includes/css.php";
    ?>
    <!-- CSS -->
</head>
<body>
<div class="container">
    <div class="jumbotron">
    <div class="row">
        <h3>AJAX form</h3>
        <form action="/" method="post">
            <div class="form-group">
                <label for="insname">Your name</label>
                <input type="text" class="form-control onlytext" id="insname" placeholder="Your name">
            </div>
            <div class="form-group">
                <label for="inssurname">Your surname</label>
                <input type="text" class="form-control" id="inssurname" placeholder="Your surname">
            </div>
            
            <button type="button" class="btn btn-success" id="insusrdata">Save my data</button>
        </form>
        <!-- JAVASCRIPT -->
        <?php 
            include "nah/includes/js.php";
        ?>
    </div>
    </div>
</div>
    <script>
    $(function(){
        // NULL VALIDATION
        $('input').blur(function(){
            // var chkinp = $(this).attr('id');
            if( $(this).val().length === 0) 
            {
                $(this).closest('div').addClass('has-error');
                $(this).closest('label').addClass('text-danger');
            }
        });
        // / NULL VALIDATION
        
        // ONLY LETTERS VALIDATION
//        $("p.onlytext").keypress(function(){
//            var valtext = $(this).val();
//            var viptext  = /^[a-z\u00C0-\u00ff\s]+$/;
//            var resultval = viptext.test(valtext);
//            if(resultval false)
//            {
//                $(this).closest('div').addClass('has-error');
//            }
//        });
        // / ONLY LETTERS VALIDATION
        
        // SENDING WITH AJAX
        $("#insusrdata").click(function(){
            var btninsusrdata = $(this).val(); // INSERTED BTN *
            var btninst = $(this).text();
            var insname = $("#insname").val();          // OTHER VALUES ...
            var inssurname = $("#inssurname").val();
            
            if(insname == "" || inssurname == "") // NULL VALIDATION
            {
                bootbox.alert({ title: "<h4 class='text-danger'>Error: You do not complete all the form</h4>" , message: "<p>Please fill all the fields!</p>" });
            }
            else
            {
                $.ajax({
                    method: "POST",
                    url: "form_process.php",
                    data: {
                        btninsusrdata: btninsusrdata,  // INSERTED BTN *
                        name: insname,                  // OTHER VALUES ...
                        surname: inssurname
                    },
                    beforeSend: function() { // OPTIONAL
                        // SENDING...
                    },
                    success: function(data) {
                        // RESULTS...
                        bootbox.alert({ title: "<h4>Results</h4>" , message: data });
                    }
                });
            }
        });
        // / SENDING WITH AJAX
    });
    </script>
    <!-- / JAVASCRIPT -->
</body>
</html>