<!DOCTYPE html>
<html>
    <!--
    Cherre had made dis
    -->
<head>
    <meta charset="utf-8" />
    <title>Index</title>
    <!-- CSS -->
    <?php 
        include "assets/includes/css.php";
    ?>
    <!-- CSS -->
</head>
<body>
    <style>
    .hidden-menu{
        width: 50px;
        height: 50px;
        border: 1px solid #3498db;
        background-color: #fff;

        color: #3498db;
        text-align: center;

        position: fixed;
        left: 15px;
        top: 15px;
        z-index: 10;
    }
    .hidden-menu:hover,
    .hidden-menu:active{
        background-color: #369fe5;
        cursor: pointer;
        color: #fff;
        transition-duration: 1s;
        transition-timing-function: ease-out;
        -webkit-transition-duration: 1s;
        -webkit-transition-timing-function: ease-out;
    }
    .wow-menu{
        width: 0%;
        height: 0%;
        margin: 15px;
        
        border: 1px solid #3498db;
        background-color: #369fe5;

        color: #fff;
        
        z-index: 9;
        display: none;
        position: fixed; 
    }
    h1{
        display: inherit;
    }
    </style>
    <button class="hidden-menu appearplz fa fa-bars"></button>
    <div class="wow-menu" currentstatus="nop">
<!--        <h1 class="text-center">rg erg th rth</h1>-->
    </div>
    <!-- JAVASCRIPT -->
    <?php 
        include "assets/includes/js.php";
    ?>
    <script>
    $(document).ready(function() {
        $(".appearplz").click(function() {
            
            var currentstatus = $(".wow-menu").attr("currentstatus");
            
            if(currentstatus == "nop")
            {
                $(".wow-menu").css('display', 'block');
                $(".wow-menu").attr("currentstatus", "sip");
                
                $(".wow-menu").animate({
                    width: "400px",
                    height: "400px"
                }, 1000);
                
                $(this).css("border","0px");
                $(this).removeClass("fa-bars");
                $(this).addClass("fa-times");
            }
            else
            {
                $(".wow-menu").animate({
                    width: "0",
                    height: "0",
                    display: "none"
                }, 500);
                
                $(".wow-menu").attr("currentstatus", "nop");
                
                $(this).css("border","1px solid #3498db");
                $(this).removeClass("fa-times");
                $(this).addClass("fa-bars");

            }
        });
    });
    </script>
    <!-- / JAVASCRIPT -->
</body>
</html>