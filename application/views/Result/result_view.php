
	<?php include_once('Lib/layout/header.php');?>
	
	<div class = "container">
		<!-- Progress Indicator -->
			
			<div class = "container">
			
	       		<?php include_once('Lib/layout/progress.php');?>

	    	</div>

		<!-- End of Progress Indicator -->
	
		<!-- Results -->
	
		<div class = "container m-middle content1-custom">
	       	<div class = "row">
	       		<div class = "col-lg-12 header-blueP">
	       			<h1>
	       				<span class = "glyphicon glyphicon-plus"></span>
	       				General Health Assessment Result
	       				
	       			</h1><!-- Must be the name of the assessment taken by the user -->			
	       		</div>
	       	</div>

	       	<div class = "row">
	       		<div class = "col-lg-8">
	       			<div class = "container-fluid m-middle">
	       				<center><h3>Results Go Here!</h3></center><!-- result goes here -->

	       				<div class="row">
	       						<div class="col-lg-12">

	       							<script type="text/javascript">
	       								
										window.onload = function () {

											var chart = new CanvasJS.Chart("chartContainer", {
												animationEnabled: true,
												title:{
													text: "Results"
												},	
												axisY: {
													title: "Yours Results",
													titleFontColor: "#4F81BC",
													lineColor: "#4F81BC",
													labelFontColor: "#4F81BC",
													tickColor: "#4F81BC",
													suffix: "%",
													maximum: 100
												},
												axisY2: {
													title: "Healthy Results",
													titleFontColor: "#C0504E",
													lineColor: "#C0504E",
													labelFontColor: "#C0504E",
													tickColor: "#C0504E",
													maximum: 100
												},	
													toolTip: {
														shared: true,

													},
												legend: {
													cursor:"pointer",
													itemclick: toggleDataSeries
												},
												data: [{
													type: "column",
													name: "Your Results",
													legendText: "Your Results ",
													showInLegend: true, 
													dataPoints:[
														{ label: "SF36", y: <?php echo $sf36['ave'] ?>,indexLabel: "<?php echo $sf36_eval['ave']; ?>"},
														{ label: "BLQ", y: <?php echo round($blq,2) ?> ,indexLabel: "<?php echo $blq_eval; ?>" },
														{ label: "CLDQ", y: <?php echo $cldq['ave'] ?>,indexLabel: "<?php echo $cldq_eval['ave']; ?>"  },
													]
												},
												{
													type: "column",	
													name: "Healthy",
													legendText: "Healthy",
													axisYType: "secondary",
													showInLegend: true,
													dataPoints:[
														{ label: "SF36", y: 75 },
														{ label: "BLQ", y: 53.125 },
														{ label: "CLDQ", y: 50 },
													]
												}]
											});
											chart.render();

											function toggleDataSeries(e) {
												if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
													e.dataSeries.visible = false;
												}
												else {
													e.dataSeries.visible = true;
												}
												chart.render();
											}

										}
										// window.onload = function () {
										// 	var chart = new CanvasJS.Chart("sf36", {
										// 		height:200,
										// 		width:720,
										// 		theme: "light1", // "light2", "dark1", "dark2"
										// 		animationEnabled: true, // change to true		
										// 		title:{
										// 			text: "SF36 Result"
										// 		},
												
										// 		axisY:{
										// 	       maximum: 100 //comment this to show numeric values
										// 	    },
											    
										// 		data: [
										// 		{
										// 			// Change type to "bar", "area", "spline", "pie",etc.
										// 			type: "column",
										// 			color: "teal",
										// 			dataPoints: [
										// 				{ label: "Healthy", x: 1, y: 75 },
										// 				{ label: "Your <?php echo $sf36_eval['ave']; ?>", x: 2 ,   y:<?php echo $sf36['ave'] ?> }
										// 			]
										// 		}
										// 		]
										// 	});
										// 	chart.render();
										// 	var chart = new CanvasJS.Chart("blq", {
										// 		height:200,
										// 		width:720,
										// 		theme: "light1", // "light2", "dark1", "dark2"
										// 		animationEnabled: true, // change to true		
										// 		title:{
										// 			text: "BLQ Result"
										// 		},
												
										// 		axisY:{
										// 	       maximum: 34 //comment this to show numeric values
										// 	    },
											    
										// 		data: [
										// 		{
										// 			// Change type to "bar", "area", "spline", "pie",etc.
										// 			type: "line",
										// 			color: "teal",
										// 			dataPoints: [
										// 				{ label: "Healthy", x: 1, y: 17 },
										// 				{ label: "<?php echo $blq_eval ?>", x: 2 ,   y:<?php echo $blq ?>  }
										// 			]
										// 		}
										// 		]
										// 	});
										// 	chart.render();
										// 	var chart = new CanvasJS.Chart("cldq", {
										// 		height:200,
										// 		width:720,
										// 		theme: "light1", // "light2", "dark1", "dark2"
										// 		animationEnabled: true, // change to true		
										// 		title:{
										// 			text: "CLDQ Result"
										// 		},
												
										// 		axisY:{
										// 	       maximum: 100 //comment this to show numeric values
										// 	    },
											    
										// 		data: [
										// 		{
										// 			// Change type to "bar", "area", "spline", "pie",etc.
										// 			type: "line",
										// 			color: "teal",
										// 			dataPoints: [
										// 				{ label: "Healthy", x: 1, y: 50 },
										// 				{ label: "<?php echo $cldq_eval['ave'] ?>", x: 2 ,   y:<?php echo $cldq['ave'] ?>  }
										// 			]
										// 		}
										// 		]
										// 	});
										// 	chart.render();
										// }

									</script>

									<div id="chartContainer" style="height: 300px; width: 100%;"></div>

								</div>

							</div>
	       				   
	       				<br>
	       			</div>
	       		</div>
	       		<div class = "col-lg-4 content1-custom">
	       			<div class = "container-fluid m-middle">
		       				
		       			<br>
		       				<p>Condition of the patient</p><!-- Mention the current condition of the user-->
		       			<br>
		       				
		       				<ul class="nav nav-tabs custom-nav-tabs">
							    <li class="active"><a data-toggle="tab" href="#Rmenu1">Interpretation</a></li>
							    <li><a data-toggle="tab" href="#Rmenu2">Recommendation</a></li>
							</ul>

		       				<div class="tab-content custom-tab-content">
							    <div id="Rmenu1" class="tab-pane fade in active">
								    <h4>Interpretations</h4>
								    <ul>
								    	<?php if ($sf36['ave']>75): ?>
								    		<?php foreach ($sf36_eval as $row):?> 
				       							<li>
				       								<?php echo $row; ?>
				       							</li>
			       							<?php endforeach ?>
			       						<?php else: ?>
			       							<?php foreach ($cldq_eval as $row):?> 
				       							<li>
				       								<?php echo $row; ?>
				       							</li>
			       							<?php endforeach ?>
								    	<?php endif ?>
			       						
			       					</ul>
							    </div>
							    <div id="Rmenu2" class="tab-pane fade">
							      <h4>Recommendations</h4>
							      	<ul>
							      		<?php if ($sf36['ave']>75): ?>
							      			<li><?php echo $sf36_recom[1]; ?></li>
							      			<li><?php echo $sf36_recom[2]; ?></li>
							      		<?php else: ?>
							      			<li>You are required to drink <?php echo $cldq_recom[1]; ?></li>
							      			<li>You need to sleep <?php echo $cldq_recom[2]; ?></li>
							      		<?php endif ?>
							      		
							      		
							      	</ul>
							    </div>
							</div>

		       				<div>
								<!--<?php echo $sf36_recom[1]; ?>
			       					<br>
			       					<?php echo $sf36_recom[2]; ?>
			       					<?php echo $cldq_recom[1]; ?>
			       					<br>
			       					<?php echo $cldq_recom[2]; ?> -->
		       				</div>
		       			<br>	
	       			</div>
	       		</div>
	       	</div>
	    </div>
    <!--End of Result Form-->
	</div>
	</div><br>

	<script type="text/javascript" src="<?php echo base_url('Lib/js/bootstrap.min.js')?>" ></script>
    <script type="text/javascript" src="<?php echo base_url('Lib/js/jquery.min.js')?>" ></script>

<!-- ====================================FOOTER HERE=================================================== -->
	<?php include_once('Lib/layout/footer.php');?>
<!-- ====================================FOOTER HERE=================================================== -->
