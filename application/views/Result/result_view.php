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
	       		<div class = "col-lg-12 content2-custom">
	       			<h1>
	       				<span class = "glyphicon glyphicon-plus"></span>
	       				General Health Assessment
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
											height:175,
											hidth:500,
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
											height:175,
											hidth:500,
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
											height:175,
											hidth:500,
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

	       							<a href="#sf36" class="btn btn-info" data-toggle="collapse">SF36 Result</a>
	       							<a href="#blq" class="btn btn-info" data-toggle="collapse">BLQ Result</a>
	       							<a href="#cldq" class="btn btn-info" data-toggle="collapse">CLDQ Result</a>


									<div id="sf36" class="collapse">
										<div id="sf36"></div>
									</div>

									<div id="blq" class="collapse">2
										<div id="blq"></div>
									</div>

									<div id="cldq" class="collapse">
									    <div id="cldq"></div>
									</div>
								</div>

							</div>
	       				   
	       				<br>
	       			</div>
	       		</div>
	       		<div class = "col-lg-4 content1-custom">
	       			<div class = "container-fluid m-middle">
		       			<h3>Avatar, Relevant Image or Icon Corresponding to the curent assessment</h3>
		       			<br>
		       			<p>lorem ipsum, condition of the patient</p><!-- Mention the current condition of the user-->
		       			<br>
		       			<img class = "fit" src = "<?php echo BASE_URL('Lib/imgs/slide3.jpg')?>" alt="example">
		       			<br>	
	       			</div>
	       		</div>
	       	</div>
	    </div>
    <!--End of Result Form-->
    <script type="text/javascript" src="<?php echo base_url('Lib/js/bootstrap.min.js')?>" ></script>
    <script type="text/javascript" src="<?php echo base_url('Lib/js/jquery.min.js')?>" ></script>
	</div>
	</div><br>

<!-- ====================================FOOTER HERE=================================================== -->
	<?php include_once('Lib/layout/footer.php');?>
<!-- ====================================FOOTER HERE=================================================== -->