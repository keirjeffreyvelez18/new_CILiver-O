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
	       				<button style = "float: right" class = "btn btn-md btn-success" type = "button" href = "#">
	       				 	Proceed
	       				 	<span class = "glyphicon glyphicon-chevron-right"></span>
	       				</button>
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
										var chart = new CanvasJS.Chart("sf36", {
											height:200,
											width:720,
											theme: "light1", // "light2", "dark1", "dark2"
											animationEnabled: true, // change to true		
											title:{
												text: "SF36 Result"
											},
											
											axisY:{
										       maximum: 100 //comment this to show numeric values
										    },
										    
											data: [
											{
												// Change type to "bar", "area", "spline", "pie",etc.
												type: "line",
												color: "teal",
												dataPoints: [
													{ label: "Healthy", x: 1, y: 75 },
													{ label: "Your <?php echo $sf36_eval['ave']; ?>", x: 2 ,   y:<?php echo $sf36['ave'] ?> }
												]
											}
											]
										});
										chart.render();
										var chart = new CanvasJS.Chart("blq", {
											height:200,
											width:720,
											theme: "light1", // "light2", "dark1", "dark2"
											animationEnabled: true, // change to true		
											title:{
												text: "BLQ Result"
											},
											
											axisY:{
										       maximum: 34 //comment this to show numeric values
										    },
										    
											data: [
											{
												// Change type to "bar", "area", "spline", "pie",etc.
												type: "line",
												color: "teal",
												dataPoints: [
													{ label: "Healthy", x: 1, y: 17 },
													{ label: "<?php echo $blq_eval ?>", x: 2 ,   y:<?php echo $blq ?>  }
												]
											}
											]
										});
										chart.render();
										var chart = new CanvasJS.Chart("cldq", {
											height:200,
											width:720,
											theme: "light1", // "light2", "dark1", "dark2"
											animationEnabled: true, // change to true		
											title:{
												text: "CLDQ Result"
											},
											
											axisY:{
										       maximum: 100 //comment this to show numeric values
										    },
										    
											data: [
											{
												// Change type to "bar", "area", "spline", "pie",etc.
												type: "line",
												color: "teal",
												dataPoints: [
													{ label: "Healthy", x: 1, y: 50 },
													{ label: "<?php echo $cldq_eval['ave'] ?>", x: 2 ,   y:<?php echo $cldq['ave'] ?>  }
												]
											}
											]
										});
										chart.render();
										}

									</script>

										</script>


									<ul class="nav nav-tabs custom-nav-tabs">
	       								<li class="active"><a href="#sf36" class="btn btn-info" data-toggle="tab">SF36 Result</a></li>
	       								<li><a href="#blq" class="btn btn-info" data-toggle="tab">BLQ Result</a></li>
	       								<li><a href="#cldq" class="btn btn-info" data-toggle="tab">CLDQ Result</a></li>
	       							</ul>
	       							<div class="tab-content">
										<div id="sf36" class="tab-pane fade in active">
											<div id="sf36"></div>
										</div>

										<div id="blq" class="tab-pane fade in">
											<div id="blq"></div>
										</div>

										<div id="cldq" class="tab-pane fade in">
										    <div id="cldq"></div>
										</div>
									</div>

								</div>

							</div>
	       				   
	       				<br>
	       			</div>
	       		</div>
	       		<div class = "col-lg-4 content1-custom">
	       			<div class = "container-fluid m-middle">
		       				
		       			<br>
		       				<p>lorem ipsum, condition of the patient</p><!-- Mention the current condition of the user-->
		       			<br>
		       				<div>
		       					<?php foreach ($sf36_eval as $row): ?>
		       						<ul>
		       							<li><?php echo $row."<br>"; ?></li>
		       						</ul>
		       						
		       					<?php endforeach ?>
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