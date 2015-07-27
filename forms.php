<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index</title>
    <!-- CSS -->
    <?php 
        include "assets/includes/css.php";
    ?>
    <!-- CSS -->
</head>
<body>
<div class="container">
    <div class="jumbotron">
    <div class="row">
        <h3>AJAX form</h3>
        <div id="process-msg"></div>
        <form action="/" method="post">
            <div class="form-group">
                <label for="insname">Your name</label>
                <input type="text" class="form-control onlytext" id="insname" placeholder="Your name">
            </div>
            <div class="form-group">
                <label for="inssurname">Your surname</label>
                <input type="text" class="form-control" id="inssurname" placeholder="Your surname">
            </div>
            <div class="form-group">
                <label for="insusername">Create an username</label>
                <input type="text" class="form-control username" id="insusername" placeholder="Your surname">
                <div id="already"></div>
            </div>
            
            <button type="button" class="btn btn-success" id="insusrdata">Save my data</button>
        </form>
        <!-- JAVASCRIPT -->
        <?php 
            include "assets/includes/js.php";
        ?>
    </div>
    </div>
</div>
    <script>
    $(function(){
        // NULL VALIDATION
        $('input').blur(function(){
            if( $(this).val() == "") 
            {
                $(this).closest('div').removeClass('has-success');
                $(this).closest('label').removeClass('text-success');
                $(this).closest('div').addClass('has-error');
                $(this).closest('label').addClass('text-danger');
            }
            else
            {
                $(this).closest('div').removeClass('has-error');
                $(this).closest('label').removeClass('text-danger');
                $(this).closest('div').addClass('has-success');
                $(this).closest('label').addClass('text-success');
            }
        });
        // / NULL VALIDATION
        
        // WATCHING IF THE USER ALREADY EXIST
        $('.username').blur(function(){
            var newusername = $(this).val();
            $.ajax({
                method: "POST",
                url: "assets/includes/ajax/created-username.php",
                data: {
                    newusername: newusername // INSERTED BTN *
                },
                beforeSend: function() { // OPTIONAL
                    // SENDING...
                },
                success: function(data) {
                    // RESULTS...
                    document.getElementById('already').innerHTML = data; // PRINT "ECHO" MESSAGE
                }
            });
        });
        // / WATCHING IF THE USER ALREADY EXIST
        
        // SENDING WITH AJAX
        $("#insusrdata").click(function(){
            var btninsusrdata = $(this).val(); // INSERTED BTN *
            var btninst = $(this).text();
            var insname = $("#insname").val();          // OTHER VALUES ...
            var inssurname = $("#inssurname").val();
            var insusername = $("#insusername").val();
            
            if(insname == "" || inssurname == "" || insusername == "") // NULL VALIDATION
            {
                bootbox.alert({ title: "<h4 class='text-danger'>Error: You do not complete all the form</h4>" , message: "<p>Please fill all the fields!</p>" });
            }
            else
            {
                $.ajax({
                    method: "POST",
                    url: "assets/includes/ajax/form_process.php",
                    data: {
                        btninsusrdata: btninsusrdata,  // INSERTED BTN *
                        name: insname,                  // OTHER VALUES ...
                        surname: inssurname,
                        username: insusername
                    },
                    beforeSend: function() { // OPTIONAL
                        // SENDING...
                    },
                    success: function(data) {
                        // RESULTS...
                        document.getElementById('process-msg').innerHTML = data; // PRINT "ECHO" MESSAGE
                        $("#insname").val(""); // CLEANING INPUT VALUES ...
                        $("#inssurname").val("");
                        $("#insusername").val("");
                        $("#already").html("");
                        document.getElementById('already').innerHTML = "";
                        $('div').removeClass('has-success');
                        $('label').removeClass('text-success');
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