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
						<!-- InputForm -->
						<div class = "container">
							<div class="row">
								<form class="">
									<div class="col-md-12">
										<input class="form-control" type="text" placeholder="Sleep Time..."></input><br>
										<input class="form-control" type="text" placeholder="Wake Up Time..."></input><br>
										<input type="submit" name="" value="Save" class="btn btn-success">
									</div>
								</form>
							</div>	
						</div>
						<!-- InputForm -->
					  <!-- Sleep Progress Go Here -->
					  <div class = "col-lg-12">
					  	<img class = "center-block" src="<?php echo base_url('Lib/imgs/SleepTracker.png')?>" alt="Sleep Progress Image">
					  </div>
					  <!-- Sleep Progress Go Here -->

					  	<hr>
				</div>
				<br>
			</div>		
		</div>		

<!-- ====================================FOOTER HERE=================================================== -->
	<?php include_once('Lib/layout/footer.php');?>
<!-- ====================================FOOTER HERE=================================================== -->