<?php include_once('Lib/layout/header.php');?>


</head>
	<body>
		<br>
		<div class="container content">
			<div class="row header-blueP">
				<div class="col-lg-12">
					<h1>
						<span class="glyphicon glyphicon-tint"></span>
						Water Tracker
					</h1>
				</div>
			</div>
			<div class="row recom-container">
				<div class="col-lg-12">
				<center>
					<div class="slidecontainer range">
						<form method="post" action="<?php echo base_url('index.php/watertracker/saveWaterIntake');?>">
							<input type="date" name="dOfIntake" value="<?php echo date('Y-m-d'); ?>" style="color: black">
							<input  type="number" name="numOfIntake" min="1" max="20" value="8" style="color: black"><span>Glasses</span>
							<input type="submit" name="" value="Save" style="color: black">
						</form>
					</div>
					
					<?php include_once('Lib/layout/waterTracker.php');?>

				</center><br>
				</div>
				<div class="col-md-12">
					<h2>Water Tracker Interpretation:</h2>
					<div class="col-md-10">
						<ul>
							<li> Your Water Intake Average:  <?php echo $waterAve; ?> Glasses Per Day</li>
								<?php if ($cldq['ave']): ?>
							 		<li>You are required to drink: <?php echo $cldq_recom[1]; ?></li>
								<?php elseif($sf36['ave']): ?>
							 		<li>You are required to drink: <?php echo $sf36_recom[1]; ?></li>
								<?php endif ?>
						</ul>
					</div>
				</div>
			</div>		
		</div>
		<br><br>
		<!-- ====================================FOOTER HERE=================================================== -->
	<?php include_once('Lib/layout/footer.php');?>
<!-- ====================================FOOTER HERE=================================================== -->