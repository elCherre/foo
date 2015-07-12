<?php
    $currentlang = "es";
    include_once "nah/includes/lang/lang.php";
?>
<!doctype html>
<html>

<head>
    <title>Line Chart with Custom Tooltips</title>
    <script src="nah/js/Chart.Core.js"></script>
    <script src="nah/js/Chart.Line.js"></script>
    <script src="nah/js/jquery-2.1.4.js"></script>

    <style>
    #canvas-holder1 {
        width: 300px;
        margin: 20px auto;
    }
    #canvas-holder2 {
        width: 50%;
        margin: 20px 25%;
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
   	.chartjs-tooltip-key{
   		display:inline-block;
   		width:10px;
   		height:10px;
   	}
    </style>
</head>

<body>
    <div id="canvas-holder1">
        <canvas id="chart1" width="300" height="30" />
    </div>
    <div id="canvas-holder2">
        <canvas id="chart2" width="450" height="600" />
    </div>

    <div id="chartjs-tooltip"></div>


    <script>

    Chart.defaults.global.pointHitDetectionRadius = 1;
    Chart.defaults.global.customTooltips = function(tooltip) {

        var tooltipEl = $('#chartjs-tooltip');

        if (!tooltip) {
            tooltipEl.css({
                opacity: 0
            });
            return;
        }

        tooltipEl.removeClass('above below');
        tooltipEl.addClass(tooltip.yAlign);

        var innerHtml = '';
        for (var i = tooltip.labels.length - 1; i >= 0; i--) {
        	innerHtml += [
        		'<div class="chartjs-tooltip-section">',
        		'	<span class="chartjs-tooltip-key" style="background-color:' + tooltip.legendColors[i].fill + '"></span>',
        		'	<span class="chartjs-tooltip-value">' + tooltip.labels[i] + '</span>',
        		'</div>'
        	].join('');
        }
        tooltipEl.html(innerHtml);

        tooltipEl.css({
            opacity: 1,
            left: tooltip.chart.canvas.offsetLeft + tooltip.x + 'px',
            top: tooltip.chart.canvas.offsetTop + tooltip.y + 'px',
            fontFamily: tooltip.fontFamily,
            fontSize: tooltip.fontSize,
            fontStyle: tooltip.fontStyle,
        });
    };
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };
    var lineChartData = {
        labels: ["<?=$langprint['janc']?>", "<?=$langprint['febc']?>", "<?=$langprint['marc']?>", "<?=$langprint['aprc']?>", "<?=$langprint['mayc']?>", "<?=$langprint['junc']?>", "<?=$langprint['julc']?>", "<?=$langprint['augc']?>", "<?=$langprint['sepc']?>", "<?=$langprint['octc']?>", "<?=$langprint['novc']?>", "<?=$langprint['decc']?>"],
        datasets: [{
            label: "My First dataset",
            fillColor: "rgba(222, 75, 75,0.2)",
            strokeColor: "rgb(222, 75, 75)",
            pointColor: "rgba(222, 75, 75,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(222, 75, 75,1)",
            data: [23, 55, 23, 1, 76, 44, 10, 55, 44, 27, 3, 15]
        }, {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [10, 35, 3, 7, 66, 99, 86, 88, 10, 20, 10, 66]
        }]
    };

    window.onload = function() {
        var ctx1 = document.getElementById("chart1").getContext("2d");
        window.myLine = new Chart(ctx1).Line(lineChartData, {
        	showScale: false,
        	pointDot : true,
            responsive: true
        });

        var ctx2 = document.getElementById("chart2").getContext("2d");
        window.myLine = new Chart(ctx2).Line(lineChartData, {
            responsive: true
        });
    };
    </script>
</body>

</html>