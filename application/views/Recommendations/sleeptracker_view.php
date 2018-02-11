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
								<form class="">
									<div class="col-md-12">
										<input class="form-control" type="text" placeholder="Sleep Time..."></input><br>
										<input class="form-control" type="text" placeholder="Wake Up Time..."></input><br>
										<input type="submit" name="" value="Save" class="btn btn-success">
									</div>
								</form>
							</div>	
						</div>
						<!-- InputForm -->
					  <!-- Sleep Progress Go Here -->
					  <script type="text/javascript">
					  	window.onload = function () {

							var chart = new CanvasJS.Chart("chartContainer", {
								animationEnabled: true,
								exportEnabled: true,
								title:{
									text: "Sleeping Pattern"
								},
								axisY: {
									includeZero:false,
									title: "Hours",
									suffix: " Hr"
								},
								axisX: {
									valueFormatString: "DD MMMM YYYY"
								},
								data: [
								{
									type: "rangeArea",
									xValueFormatString: "DD MMMM", 
									yValueFormatString: "##",
									toolTipContent: " <span style=\"color:#4F81BC\">{x}</span><br><b>Start:</b> {y[0]}<br><b>End:</b> {y[1]}",
									dataPoints: [
										{ x: new Date(2017,06,01), y:[08, 04] },
										{ x: new Date(2017,06,02), y:[12, 03] },
										{ x: new Date(2017,06,03), y:[10, 06] },
										{ x: new Date(2017,06,04), y:[08, 04] },
									]
								}]
							});
							chart.render();

						}
					  </script>
					  <div class = "col-lg-12">
					  	<div id="chartContainer" style="height: 300px; width: 100%;"></div>
					  </div>
					  <!-- Sleep Progress Go Here -->

					  	<hr>
				</div>
				<br>
			</div>		
		</div>		

<!-- ====================================FOOTER HERE=================================================== -->
	<?php include_once('Lib/layout/footer.php');?>
<!-- ====================================FOOTER HERE=================================================== -->