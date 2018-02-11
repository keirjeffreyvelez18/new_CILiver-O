<?php include_once('Lib/layout/header.php');?>


</head>
	<body>
		<br>
		<div class="container">
			<div class="row header-blueP">
				<div class="col-lg-12">
					<h1>Sleep Tracker</h1>
				</div>
			</div>
			<div class="row body-maroonP">
				<div class="col-lg-12">
						<!-- InputForm -->
						<div class = "container">
							<div class="row">
								<form method="POST" action="<?php echo base_url('index.php/sleeptracker/saveSleepTracker');?>">
									<div class="col-md-12">
										<label for="dos">Date Of Sleep</label>
										<input id="dos" class="form-control" type="date" name="dateOfSleep" value="<?php echo date('Y-m-d'); ?>"></input><br>
										<input class="form-control" name="sleeptime" type="time" placeholder="Sleep Time..." value="00:00"></input><br>
										<input class="form-control" name="wakeuptime" type="time" placeholder="Wake Up Time..." value="00:00"></input><br>
										<input type="submit" name="" value="Save" class="form-control btn btn-success">
									</div>
								</form><br>
								<hr>
							</div>	
						</div>
						<!-- InputForm -->
					  <!-- Sleep Progress Go Here -->
					  <script type="text/javascript">
					  	window.onload = function () {

							var chart = new CanvasJS.Chart("chartContainer", {
								animationEnabled: true,
								theme: "light2",
								title:{
									text: "Sleeping Pattern"
								},
								axisX:{
									valueFormatString: "DD MMM",
									crosshair: {
										enabled: true,
										snapToDataPoint: true
									},
									ValueFormatString: "DD MMM, YYYY",
								},
								axisY: {
									title: "Hours",
									crosshair: {
										enabled: true
									},
									ValueFormatString: "HH:mm",
								},
								toolTip:{
									shared:true
								},  
								legend:{
									cursor:"pointer",
									verticalAlign: "bottom",
									horizontalAlign: "left",
									dockInsidePlotArea: true,
									itemclick: toogleDataSeries
								},
								data: [{
									type: "line",
									showInLegend: true,
									name: "Fall Asleep",
									markerType: "square",
									color: "#F08080",
									dataPoints: [
										{ x: new Date(2017, 0, 3), y: new Date(21, 0, 1) },
										{ x: new Date(2017, 0, 4), y: 22 },
										{ x: new Date(2017, 0, 5), y: 23 },
										{ x: new Date(2017, 0, 6), y: 20 },
										{ x: new Date(2017, 0, 7), y: 22 },
										{ x: new Date(2017, 0, 8), y: 22 },

									]
								},
								{
									type: "line",
									showInLegend: true,
									name: "Wake Up",
									lineDashType: "dash",
									dataPoints: [
										{ x: new Date(2017, 0, 3), y: new Date(21, 0, 1) },
										{ x: new Date(2017, 0, 4), y: 03 },
										{ x: new Date(2017, 0, 5), y: 05 },
										{ x: new Date(2017, 0, 6), y: 05 },
										{ x: new Date(2017, 0, 7), y: 07 },
										{ x: new Date(2017, 0, 8), y: 04 },
									]
								}]
							});
							chart.render();

						function toogleDataSeries(e){
							if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
								e.dataSeries.visible = false;
							} else{
								e.dataSeries.visible = true;
							}
							chart.render();
						}

						}
					  </script>
					  <br>
					  <div class = "col-lg-12">
					  	<div id="chartContainer" style="height: 300px; width: 100%;"></div>
					  </div>
					  <!-- Sleep Progress Go Here -->

					  	<hr>
				</div>
				<br>
			</div>		
		</div>		
		<br>
<!-- ====================================FOOTER HERE=================================================== -->
	<?php include_once('Lib/layout/footer.php');?>
<!-- ====================================FOOTER HERE=================================================== -->