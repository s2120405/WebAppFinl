<?php
require_once 'classes/rentClass.php';
$rentals = new Rental();


$data = $rentals->list_rental();
$dataPoints = array();
foreach ($data as $row) {
    $dataPoints[] = array("label" => $row['item_name'], "y" => $row['item_qty']);
}
?>

<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light1",
        title: {
            text: "Products Chart"
        },
        axisY: {
            includeZero: true
        },
        data: [{
            type: "column",
            indexLabelFontColor: "#5A5757",
            indexLabelPlacement: "outside",
            indexLabel: "{label}: {y}",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>