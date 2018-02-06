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
	       							<form method="post" action="<?php echo site_url('result/show_result'); ?>">
									  <ul class="nav nav-pills">	
										    <li>
										    	<input class="btn btn-primary btn-blk" type="Submit" name="qCat" value="SF36">
										    </li>
										    <li>
										    	<input class="btn btn-primary" type="Submit" name="qCat" value="BLQ">
										    </li>
										    <li>
										    	<input class="btn btn-primary" type="Submit" name="qCat" value="CLDQ">
										    </li>
									  </ul>
									</form>

									<?php include_once('Lib/layout/chart_results.php');?> 

									<div id="sf36" style="width: 100%; height: 170px;" 
									class=""></div>

									<div id="blq" style="width: 100%; height: 170px;" 
									class=""></div>

									<div id="cldq" style="width: 100%; height: 170px;" 
									class=""></div>

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
	</div><br>

<!-- ====================================FOOTER HERE=================================================== -->
	<?php include_once('Lib/layout/footer.php');?>
<!-- ====================================FOOTER HERE=================================================== -->