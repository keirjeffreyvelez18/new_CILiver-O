<?php include_once('Lib/layout/header.php');?>


</head>
	<body>
		<br>
		<div class="container content">
			<div class="row header-blueP">
				<div class="col-lg-12">
					<h1>Water Tracker</h1>
				</div>
			</div>
			<div class="row body-maroonP">
				<div class="col-lg-12">
				<center>
					<div class="slidecontainer range">

						<form method="post" action="<?php echo base_url('index.php/watertracker/saveWaterIntake');?>">
							<input type="date" name="dOfIntake" value="<?php echo date('Y-m-d'); ?>" style="color: black">
							<input type="number" name="numOfIntake" min="1" max="50" value="50" style="color: black">
							<input type="submit" name="" value="Save" style="color: black">
						</form>
					</div>
					<script type="text/javascript">
						window.onload = function () {

							var chart = new CanvasJS.Chart("chartContainer", {
								animationEnabled: true,  
								exportEnabled: true,
								title:{
									text: "Water Intake"
								},
								axisY: {
									title: "Number of Glasses",
									suffix: " Glasses",
									stripLines: [{
										value: 8,
										label: "Average",
										valueFormatString: "DD MMMM YYYY"
									}],

								},
								data: [{
									yValueFormatString: "## Glasses",
									type: "line",
									dataPoints: [
									<?php foreach ($waterintakeData as $row): ?>
										<?php $d = explode('-', $row['dateOfIntake']); ?>
										{ x: new Date(<?php echo $d[0].",".($d[1]-1).",".$d[2]; ?>), y: <?php echo $row['numberOfWaterIntake'] ?> },	
									<?php endforeach ?>
									]
								}]
							});
							chart.render();

							}
					</script>
					<div id="chartContainer" style="height: 300px; width: 100%;"></div>

				</center><br>
				</div>
			</div>		
		</div>
		<!-- ====================================FOOTER HERE=================================================== -->
	<?php include_once('Lib/layout/footer.php');?>
<!-- ====================================FOOTER HERE=================================================== -->