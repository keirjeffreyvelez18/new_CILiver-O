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
					<h1>Sleep Tracker</h1>
					  <h2>Select Amount</h2>
					  <p>The .dropdown-header class is used to add headers inside the dropdown menu:</p>

					  <!-- Sleep Progress Go Here -->
					  <div class = "col-lg-12">
					  	<img class = "center-block" src="<?php echo base_url('Lib/imgs/SleepTracker.png')?>" alt="Sleep Progress Image">
					  </div>
					  <!-- Sleep Progress Go Here -->

					  	<hr>

						<form>

						<!-- Progress Trackers -->
						<div class = "row">
							<div class = "col-lg-12">
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $progress ?>%;">
									 	<?php echo round($progress) ?>%
									 </div>
								</div>
							</div>
						</div>
						<!-- Progress Trackers -->	
						
						<!-- InputForm -->
						<div class = "container">
							<div class="row">
								<div class="col-lg-12">
									<input class="form-control" type="text" placeholder="Sleep Time..."></input><br>
									<input class="form-control" type="text" placeholder="Wake Up Time..."></input><br>
								</div>
							</div>	
						</div>
						<!-- InputForm -->
							
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
						  <button class="btn btn-primary btn-block" type="button"><!-- This is the reset amount of glass
						  "-1 glass/1 click" -->
						  <span class="glyphicon glyphicon-repeat"></span>
						    Reset
						  </button>

						  <br>
						</div>
						</form>
						<br>
				</div>
			</div>		
		</div>		

	</body>

	<!-- STATIC FILES -->
		<script type="text/javascript" src="<?php echo base_url('Lib/js/bootstrap.min.js')?>" ></script>
	    <script type="text/javascript" src="<?php echo base_url('Lib/js/jquery.min.js')?>" ></script>
		<script type="text/javascript" src="<?php echo base_url('Lib/js/jquery.canvasjs.min.js')?>" ></script>
    <!-- LOAD STATIC FILES -->

</html>