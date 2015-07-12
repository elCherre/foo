<?php
    $currentlang = "es";
    include_once "nah/includes/lang/lang.php";
?>
<!doctype html>
<html>

<head>
    <title>Pie Chart with Custom Tooltips</title>
    <script src="nah/js/Chart.Core.js"></script>
    <script src="nah/js/Chart.Doughnut.js"></script>
    <script src="nah/js/Chart.PolarArea.js"></script>
    <script src="nah/js/Chart.Radar.js"></script>
    <script src="nah/js/jquery-2.1.4.js"></script>

    <style>
    #canvas-holder {
        width: 100%;
        margin-top: 50px;
        text-align: center;
    }
    #chartjs-tooltip {
        opacity: 1;
        position: absolute;
        background: rgba(0, 0, 0, .7);
        color: white;
        padding: 3px;
        border-radius: 3px;
        -webkit-transition: all .1s ease;
        transition: all .1s ease;
        pointer-events: none;
        -webkit-transform: translate(-50%, 0);
        transform: translate(-50%, 0);
    }
    #chartjs-tooltip.below {
        -webkit-transform: translate(-50%, 0);
        transform: translate(-50%, 0);
    }
    #chartjs-tooltip.below:before {
        border: solid;
        border-color: #111 transparent;
        border-color: rgba(0, 0, 0, .8) transparent;
        border-width: 0 8px 8px 8px;
        bottom: 1em;
        content: "";
        display: block;
        left: 50%;
        position: absolute;
        z-index: 99;
        -webkit-transform: translate(-50%, -100%);
        transform: translate(-50%, -100%);
    }
    #chartjs-tooltip.above {
        -webkit-transform: translate(-50%, -100%);
        transform: translate(-50%, -100%);
    }
    #chartjs-tooltip.above:before {
        border: solid;
        border-color: #111 transparent;
        border-color: rgba(0, 0, 0, .8) transparent;
        border-width: 8px 8px 0 8px;
        bottom: 1em;
        content: "";
        display: block;
        left: 50%;
        top: 100%;
        position: absolute;
        z-index: 99;
        -webkit-transform: translate(-50%, 0);
        transform: translate(-50%, 0);
    }
    </style>
</head>

<body>
<!--
    <div id="canvas-holder">
        <canvas id="chart-area1" width="50" height="50" />
    </div>
-->
    <div id="canvas-holder">
        <canvas id="chart-area2" width="300" height="300" />
    </div>

    <div id="chartjs-tooltip"></div>

    <?php
    include "nah/includes/conexion.php";
    try
    {
        $stmt = $conexion->prepare("SELECT COUNT(gender) FROM user WHERE gender = 'm'");
        $stmt->execute();
        $row  = $stmt->fetch();
        $male = $row[0] * 10;
    }
    catch(PDOException $e)
    {
        echo "<div class='alert alert-danger'>
                <strong>Error: </strong><p>An unknow server error...</p><p>".$e."</p>
            </div>";
    }
    ?>

    <script>
    Chart.defaults.global.customTooltips = function(tooltip) {

    	// Tooltip Element
        var tooltipEl = $('#chartjs-tooltip');

        // Hide if no tooltip
        if (!tooltip) {
            tooltipEl.css({
                opacity: 0
            });
            return;
        }

        // Set caret Position
        tooltipEl.removeClass('above below');
        tooltipEl.addClass(tooltip.yAlign);

        // Set Text
        tooltipEl.html(tooltip.text);

        // Find Y Location on page
        var top;
        if (tooltip.yAlign == 'above') {
            top = tooltip.y - tooltip.caretHeight - tooltip.caretPadding;
        } else {
            top = tooltip.y + tooltip.caretHeight + tooltip.caretPadding;
        }

        // Display, position, and set styles for font
        tooltipEl.css({
            opacity: 1,
            left: tooltip.chart.canvas.offsetLeft + tooltip.x + 'px',
            top: tooltip.chart.canvas.offsetTop + top + 'px',
            fontFamily: tooltip.fontFamily,
            fontSize: tooltip.fontSize,
            fontStyle: tooltip.fontStyle,
        });
    };

    var pieData = [{
        value: <?=$male?>,
        color: "#5d5dbe",
        highlight: "#4d4db2",
        label: "Male"
    }, {
        value: 50,
        color: "#cc8fb2",
        highlight: "#cc70a5",
        label: "Female"
    }];

    window.onload = function() {
//        var ctx1 = document.getElementById("chart-area1").getContext("2d");
//        window.myPie = new Chart(ctx1).Pie(pieData);

        var ctx2 = document.getElementById("chart-area2").getContext("2d");
        window.myPie = new Chart(ctx2).Pie(pieData);
    };
    </script>
</body>

</html>