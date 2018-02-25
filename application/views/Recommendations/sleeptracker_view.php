<?php include_once('Lib/layout/header.php');?>


</head>
	<body>
		<br>
		<div class="container content">
			
			<div class="row header-blueP">
				<div class="col-lg-12">
					<h1>
						<span class="glyphicon glyphicon-bed"></span>
						Sleep Tracker &nbsp <br><small>Suggested to be record every morning</small>
					</h1>
				</div>
			</div>

			<div class="row recom-container" >
				<div class="col-lg-12">
						<!-- ================== InputForm ================== -->
						<div class = "container-fluid">
							<div class="row">
								<form method="POST" action="<?php echo base_url('index.php/sleeptracker/saveSleepTracker');?>">
									<div class="col-md-12">
										<label for="dos" class="text-muted" id="white">Date Of Sleep </label>
										<input id="dos" class="form-control" type="date" name="dateOfSleep" value="<?php echo date('Y-m-d'); ?>"></input><br>
										<label for="st" class="text-muted" id="white">Sleep Time</label>
										<input id="st" class="form-control" name="sleeptime" type="time" placeholder="Sleep Time..." value="20:00"></input><br>
										<label for="wt" class="text-muted" id="white">Wake Up Time (Wake Up Time in the next day)</label>
										<input id="wt" class="form-control" name="wakeuptime" type="time" placeholder="Wake Up Time..." value="06:00"></input><br>
										<input type="submit" name="" value="Save" class="form-control btn btn-success">
									</div>
								</form>
								<br>
							</div>	
						</div>
						<!-- ================== InputForm ================== -->


					  <!-- ================== Sleep Progress Go Here ===================== -->
					  <br>
					  <div class = "col-lg-12">
					  	
					  	<?php include_once('Lib/layout/sleepPattern.php');?> 
					  	<br>
					  </div>
					  <!-- ================== End of Sleep Progress ======================-->

					  	<hr>
				</div>
				<br>
			</div>		
		</div>		
		<br>
<!-- ====================================FOOTER HERE=================================================== -->
<?php include_once('Lib/layout/footer.php');?>
<!-- ====================================FOOTER HERE=================================================== -->