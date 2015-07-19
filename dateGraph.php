<?php 
include "nah/includes/iconexion.php";
if(isset($_GET["ago"]))
{
    $dayto = $_GET['ago'];
    for($x = 0; $x <= $dayto; $x++)
    {
        $datecha[$x] = date('Y-m-d', strtotime("-".$x." day"));
        $c[$x] = 0;
        echo $datecha[$x]."<br>";
    }
    $stmt = $mysqli->query("SELECT date FROM user WHERE date > '$datecha[$dayto]'");
    if ($stmt->num_rows > 0) 
    {
        while($row = $stmt->fetch_assoc())
        {
            for($x=0; $x < $dayto; $x++)
            {
                switch($row["date"])
                {
                    case $datecha[$x];
                    $c[$x]++;
                    break;
                }
            }
        }
    }
}
else
{
    for($x = 0; $x <= 6; $x++)
    {
        $date[$x] = date('Y-m-d', strtotime("-".$x." day"));
        $c[$x] = 0;
    }
    $stmt = $mysqli->query("SELECT date FROM user WHERE date > '$date[5]'");
    if ($stmt->num_rows > 0) 
    {
        while($row = $stmt->fetch_assoc())
        {
            switch($row["date"])
            {
                case $date[0];
                $c[0]++;
                break;
                case $date[1];
                $c[1]++;
                break;
                case $date[2];
                $c[2]++;
                break;
                case $date[3];
                $c[3]++;
                break;
                case $date[4];
                $c[4]++;
                break;
                case $date[5];
                $c[5]++;
                break;
            }
        }
    }
}
?>
<!doctype html>
<html>
	<head>
		<title>Line Chart</title>
	</head>
	<body>
		<div style="width:30%">
			<div>
				<canvas id="canvas" height="450" width="600"></canvas>
			</div>
		</div>

    <script src="nah/js/Chart.Core.js"></script>
    <script src="nah/js/Chart.Line.js"></script>
	<script>
		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
		<?php
        if(isset($_GET["ago"]))
        {
        ?>
            var lineChartData = {
                labels : [<?php
                    for($x = $dayto; $x >= 0; $x--)
                    {
                        if($x == 0)
                        {
                            echo "'".$datecha[$x]."'";
                        }
                        else
                        {
                            echo "'".$datecha[$x]."',";
                        }
                    }
                    ?>],
                datasets : [
                    {
                        label: "My First dataset",
                        fillColor : "rgba(39, 174, 96, 0.2)",
                        strokeColor : "rgb(39, 174, 96)",
                        pointColor : "rgba(39, 174, 96,1)",
                        pointStrokeColor : "#fff",
                        pointHighlightFill : "#fff",
                        pointHighlightStroke : "rgba(39, 174, 96,1)",
                        data : [
                        <?php
                        for($x = $dayto; $x >= 0; $x--)
                        {
                            if($x == 0)
                            {
                                echo "'".$c[$x]."'";
                            }
                            else
                            {
                                echo "'".$c[$x]."',";
                            }
                        }
                        ?>
                        ]
                    }
                ]
            }
        <?php
        }
        else
        {
        ?>
            var lineChartData = {
                labels : ["<?=$date[5]?>", "<?=$date[4]?>", "<?=$date[3]?>", "<?=$date[2]?>", "<?=$date[1]?>", "<?=$date[0]?>"],
                datasets : [
                    {
                        label: "My First dataset",
                        fillColor : "rgba(39, 174, 96, 0.2)",
                        strokeColor : "rgb(39, 174, 96)",
                        pointColor : "rgba(39, 174, 96,1)",
                        pointStrokeColor : "#fff",
                        pointHighlightFill : "#fff",
                        pointHighlightStroke : "rgba(39, 174, 96,1)",
                        data : ["<?=$c[5]?>", "<?=$c[4]?>", "<?=$c[3]?>", "<?=$c[2]?>", "<?=$c[1]?>", "<?=$c[0]?>"]
                    }
                ]
            }
        <?php
        }
        ?>

	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}


	</script>
	</body>
</html>
