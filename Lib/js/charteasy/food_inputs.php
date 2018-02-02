<?php

$year = date('Y');
if(isset($_GET['year']))
{
	$year=$_GET['year'];
}
$conn = new mysqli("localhost", "root", "", "database") or die(mysqli_error());
$q1 = $conn->query("select sum(ep) as total from `foodinputs`") or die(mysqli_error());
$f1 = $q1->fetch_array();
$q2= $conn->query("select sum(water) as total from `foodinputs`") or die(mysqli_error());
$f2 = $q2->fetch_array();
?>

<script type="text/javascript">
	window.onload = function() {
		$("#food_inputs").CanvasJSChart({
			theme: "light2",
			animationEnabled: true,
			animationDuration: 1000,
			exportFileName: "TB Patient Registration Group", 
			exportEnabled: true,
			title: { 
				text: "Bacolod City Health TB DOTS Center",
				fontSize: 20
			},
			subtitles:[
				{
					text: "Patient Registration Group - Year <?php echo $year?>"
				}
			],
			axisY: { 
				title: "Registration" 
			}, 
			legend :{ 
				verticalAlign: "center", 
				horizontalAlign: "left",
				cursor: "pointer",

			}, 
			data: [ 
				{ 
					type: "doughnut", 
					showInLegend: true, 
					toolTipContent: "{label} <br/> {y}", 
					indexLabel: "{y}", 
					dataPoints: [ 
						{ label: "EP",  y: 
						 <?php
	if($f1 == ""){
		echo 0;
	}else{
		echo $f1['total'];
	}	
						 ?>, legendText: "EP"},
						{ label: "EP",  y: 
						 <?php
						 if($f2 == ""){
							 echo 0;
						 }else{
							 echo $f2['total'];
						 }	
						 ?>, legendText: "Water"}

					] 
				} 
			] 
		}); 
	} 
</script>