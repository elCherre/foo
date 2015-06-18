<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>la wea</title>
    <!-- CSS -->
    <?php 
        include "nah/includes/css.php";
    ?>
    <!-- CSS -->
</head>
<body>
    <?php
        $x = 1;
        while($x < 10)
        {
            echo "<p>Ninja <i class='fa fa-eye'></i></p>";
            $x++;
        }
    ?>
    <!-- JAVASCRIPT -->
    <?php 
        include "nah/includes/js.php";
    ?>
    <script>
    $(document).ready(function(){
        $("p").click(function(){
            $(this).hide();
        });
    });
    </script>
    <!-- / JAVASCRIPT -->
</body>
</html>