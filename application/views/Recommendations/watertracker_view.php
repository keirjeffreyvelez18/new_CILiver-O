<?php include_once('Lib/layout/header.php');?>


</head>
	<body>
		<br>
		<div class="container">

			<div class="row header-blueP">
				<div class="col-lg-12">
					<h1>Water Intake Tracker</h1>
				</div>
			</div>

			<div class="row body-maroonP">
				<form>
					<h1>Water Intake Tracker</h1>
					  <h2>Select Amount</h2>
					  <p>The .dropdown-header class is used to add headers inside the dropdown menu:</p>

					  <!-- Water Intake Progress Go Here -->
					  	<div class = "row form-group ">
						  <div class = "col-lg-12">
						  	<img class = "center-block" src="<?php echo base_url('Lib/imgs/WaterIntakeReminder.png')?>" alt="Water Intake Progress Image">
						  </div>
						</div>
					  <!-- Water Intake Progress Go Here -->

					  <!-- Progress Trackers -->
						<div class = "row form-group ">
							<div class = "col-lg-12">
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $progress ?>%;">
									 	<?php echo round($progress) ?>%
									 </div>
								</div>
							</div>
						</div>
						<!-- Progress Trackers -->	

					  	<hr>

					  	<!-- Input Fields -->
						<div class = "row form-group ">
							<div class = "col-lg-12">
								<input class="form-control" type="text"></input>
							</div>
						</div>
						<!-- Input Fields -->

						<br>

						<div class="row form-group">
						  	<div class="col-lg-7">
								<div class="dropdown">
									<button class="btn btn-primary btn-block dropdown-toggle" type="button" data-toggle="dropdown">Amounts Available
									<span class="caret"></span></button>
									<ul class="dropdown-menu btn-block">
										<li><a href="#">Large Container(value)</a></li>
										<li><a href="#">Medium Container(value)</a></li>
										<li><a href="#">Small Container(value)</a></li>
									</ul>
								</div>
							</div>

							<div class="col-lg-5">  
								<button class="btn btn-primary btn-block" type="button"><!-- This is the reset amount of glass "-1 glass/1 click" -->
								<span class="glyphicon glyphicon-repeat"></span>
								Reset
								</button>
							</div>
						</div>
						
					</form>
			</div>		
		</div>		
	</body>

	<!-- STATIC FILES -->
		<script type="text/javascript" src="<?php echo base_url('Lib/js/bootstrap.min.js')?>" ></script>
	    <script type="text/javascript" src="<?php echo base_url('Lib/js/jquery.min.js')?>" ></script>
    <!-- LOAD STATIC FILES -->

</html>