<?php include_once('Lib/layout/header.php');?>


</head>
	<body>
		<br>
		<div class="container content">
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
										<label for="dos" class="text-muted">Date Of Sleep</label>
										<input id="dos" class="form-control" type="date" name="dateOfSleep" value="<?php echo date('Y-m-d'); ?>"></input><br>
										<label for="st" class="text-muted">Sleep Time</label>
										<input id="st" class="form-control" name="sleeptime" type="time" placeholder="Sleep Time..." value="00:00"></input><br>
										<label for="wt" class="text-muted">Wake Up Time</label>
										<input id="wt" class="form-control" name="wakeuptime" type="time" placeholder="Wake Up Time..." value="00:00"></input><br>
										<input type="submit" name="" value="Save" class="form-control btn btn-success">
									</div>
								</form><br>
								<hr>
							</div>	
						</div>
						<!-- InputForm -->
					  <!-- Sleep Progress Go Here -->
					  	<?php include_once('Lib/layout/sleepPattern.php');?>
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