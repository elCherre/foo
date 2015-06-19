<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Index</title>
    <!-- CSS -->
    <?php 
        include "nah/includes/css.php";
    ?>
    <!-- CSS -->
</head>
<body>
    <form action="/" method="post">
        <button type="button" class="www" value="lelelele">lrl</button>
    </form>
    <!-- JAVASCRIPT -->
    <?php 
        include "nah/includes/js.php";
    ?>
    <script>
    $(function(){
        $(".www").click(function(){
            var dropcur = $(".www").val();
            $.ajax({
                method: "POST",
                url: "form_process.php",
                data: {lel: dropcur},
                beforeSend: function() {
                    alert("enviando..." + dropcur);
                },
                success: function(data) {
                    alert(" yei " + data);
                }
            });
        });
    });
    </script>
    <!-- / JAVASCRIPT -->
</body>
</html>