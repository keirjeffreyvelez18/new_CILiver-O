<?php include_once('Lib/layout/header.php');?>
	
	<div class = "container">

		<!-- Progress Indicator -->
		<div class = "container">
			<div class="row">
	       		<div class = "col-lg-12">
	       			<center><h3>Your Progress</h3></center>
		        	<ul class="progress-indicator">
			            <li class="completed">
			                <span class="bubble"></span>
			                BMI Test. <br><small>(complete)</small>
			            </li>
			            <li class="active">
			                <span class="bubble"></span>
			                General Health Assessment. <br><small>(active)</small>
			            </li>
			            <li >
			                <span class="bubble"></span>
			                Brief Liver Assessment. 
			            </li>
			            <li >
			                <span class="bubble"></span>
			                Persistence. 
			            </li>
			            <li>
			                <span class="bubble"></span>
			                Chronic Liver Disease Questionnare.
			            </li>
			            <li>
			                <span class="bubble"></span>
			                Assessment Result.
			            </li>
		        	</ul>
		        </div>
	       	</div>
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
	       				<img class = "fit" src = "<?php echo BASE_URL('Lib/imgs/slide3.jpg')?>" alt="example">
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

		<!-- Progress Trackers -->
	       	<div class = "row">
	       		<div class = "col-lg-12">
	       			<div class="progress">
					  <div class="progress-bar" role="progressbar" aria-valuenow="70"
					  aria-valuemin="0" aria-valuemax="100" style="width:100%">
					    100%
					  </div>
					</div>
	       		</div>
	       	</div>
		<!-- Progress Trackers -->	

	    </div>

    <!--End of Result Form-->

	</div>

</body>
</html>