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

										<label class="text-muted" id="white">Sleep Time: From:</label>

										<input style="color:black;" name="sleeptime" type="time" placeholder="Sleep Time..." value="20:00" ></input> <label>To</label>
										<input id="wt" style="color:black;"  name="wakeuptime" type="time" placeholder="Wake Up Time..." value="04:00"></input><br><br>	

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
					  <div class="col-lg-12">
							<p>Legend: <span class="glyphicon glyphicon-triangle-top"></span> Too Much Sleep, <span  class="glyphicon glyphicon-stop"></span>Normal Sleep, <span class="glyphicon glyphicon-remove"></span> Lack of Sleep</p>
						</div>
					  	<div class="col-md-12">
							<h2>Sleep Tracker Interpretation:</h2>
							<div class="col-md-10">
								<ul>
									<li> Your Sleeping Average:  <?php echo $sleep; ?> Sleeping Hours Per Day</li>
										<?php if ($cldq['ave']): ?>
											<li>You are required to sleeping: <?php echo $cldq_recom[1]; ?></li>
										<?php elseif($sf36['ave']): ?>
											<li>You are required to sleeping: <?php echo $sf36_recom[1]; ?></li>
										<?php endif ?>
								</ul>
							</div>
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