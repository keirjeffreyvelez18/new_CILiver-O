<?php include_once('Lib/layout/header.php');?>


</head>
	<body>
		<br>
		<div class="container">
			<div class="row header-blueP">
				<div class="col-lg-12">
					<h1>Water Tracker</h1>
				</div>
			</div>
			<div class="row body-maroonP">
				<div class="col-lg-12">
				<center>
					<div class="slidecontainer range">

						<form>
							<input type="date" name="curDate" value="<?php echo date('Y-m-d'); ?>" style="color: black">
							<input type="number" min="1" max="50" value="50" style="color: black">
							<input type="submit" name="" value="Save" style="color: black">
						</form>
					</div>
					<script type="text/javascript">
						window.onload = function () {

							var chart = new CanvasJS.Chart("chartContainer", {
								animationEnabled: true,  
								title:{
									text: "Water Intake"
								},
								axisY: {
									title: "Number of Glasses",
									suffix: " Glasses",
									stripLines: [{
										value: 12,
										label: "Average",
										valueFormatString: "DD MMMM YYYY"
									}],

								},
								data: [{
									yValueFormatString: "## Glasses",
									type: "line",
									dataPoints: [
										{ x: new Date(2017,06,01), y:15 },
										{ x: new Date(2017,06,02), y:13 },
										{ x: new Date(2017,06,03), y:14 },
										{ x: new Date(2017,06,04), y:17 },
										{ x: new Date(2017,06,05), y:16 },
										{ x: new Date(2017,06,06), y:16 },
										{ x: new Date(2017,06,07), y:18 },
										{ x: new Date(2017,06,08), y:16 },
										{ x: new Date(2017,06,09), y:15 },
										{ x: new Date(2017,06,10), y:16 },
										{ x: new Date(2017,06,11), y:15 },
										{ x: new Date(2017,06,12), y:19 },
										{ x: new Date(2017,06,13), y:16 },
										{ x: new Date(2017,06,14), y:16 },
										{ x: new Date(2017,06,15), y:18 },
										{ x: new Date(2017,06,16), y:17 },
										{ x: new Date(2017,06,17), y:19 },
										{ x: new Date(2017,06,18), y:19 },
										{ x: new Date(2017,06,19), y:20 },
										{ x: new Date(2017,06,20), y:17 },
										{ x: new Date(2017,06,21), y:19 },
										{ x: new Date(2017,06,22), y:21 },
										{ x: new Date(2017,06,23), y:20 },
										{ x: new Date(2017,06,24), y:17 },
										{ x: new Date(2017,06,25), y:17 },
										{ x: new Date(2017,06,26), y:16 },
										{ x: new Date(2017,06,27), y:19 },
										{ x: new Date(2017,06,28), y:18 },
										{ x: new Date(2017,06,29), y:18 },
										{ x: new Date(2017,06,30), y:20 },
										{ x: new Date(2017,06,31), y:19 }
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