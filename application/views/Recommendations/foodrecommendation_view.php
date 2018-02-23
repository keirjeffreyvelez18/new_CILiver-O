<?php include_once('Lib/layout/header.php');?>


</head>
	<body>
		<br>
		<div class="container">
			<!-- ================================Header 1================================ -->
			<div class="row header-blueP">
				<div class="col-lg-12">
					<h1>Food Recommendation</h1>
				</div>
			</div>
			<!-- ================================End of Header 1================================ -->
				
			<!-- ================================FORM 1================================ -->
			<div class="row body-maroonP">
				<div class="col-lg-12">
					<div class="text-center">

						<form method="post" action="<?php echo base_url('index.php/foodrecommendation/saveCalorieIntake');?>">
							<input type="date" name="dOfIntake" value="<?php echo date('Y-m-d'); ?>" style="color: black">
							<input type="number" name="numOfIntake" min="1" value="25" style="color: black">
							<input type="submit" name="" value="Save" style="color: black">
						</form>
					</div>
					
					<?php include_once('Lib/layout/calorieTracker.php');?>
				</div>
			</div>
			<br>
		</div>	

<!-- ====================================FOOTER HERE=================================================== -->
	<?php include_once('Lib/layout/footer.php');?>
<!-- ====================================FOOTER HERE=================================================== -->