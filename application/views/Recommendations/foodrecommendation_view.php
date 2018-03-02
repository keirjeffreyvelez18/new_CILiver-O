<?php include_once('Lib/layout/header.php');?>


</head>
	<body class="base-background">
		<br>
		<div class="container content">
			<!-- ================================Header 1================================ -->
			<div class="row header-blueP">
				<div class="col-lg-12">
					<h1>
						<span class="glyphicon glyphicon-cutlery"></span>
						Calorie Recommendation
					</h1>
				</div>
			</div>
			<!-- ================================End of Header 1================================ -->
				
			<!-- ================================FORM 1================================ -->
			<div class="row recom-container">
				<!-- <div class="col-lg-12">
					<div class="text-center">

						<form method="post" action="<?php echo base_url('index.php/foodrecommendation/saveCalorieIntake');?>">
							<input type="date" name="dOfIntake" value="<?php echo date('Y-m-d'); ?>" style="color: black">
							<input type="number" name="numOfIntake" min="1" value="25" style="color: black">
							<input type="submit" name="" value="Save" style="color: black">
						</form>
					</div>
					
					<?php include_once('Lib/layout/calorieTracker.php');?>
					<br>
				</div> -->
				<div class="container">
					<div class="row">
						<div class="col-lg-7"> 
							<h2>Recommended ammount of Calories: </h2>
							<ul>
								<li><h4>Body Mass Index Score: </h4></li>
								<li><h4>Calorie Recommendation: </h4></li>
							</ul>
						</div>
						<div class="col-lg-5">
							<h2>Calorie Distribution: </h2>
							<ul>
								<li><h4>Carbohydrates Amount: </h4></li>
								<li><h4>Fat Amount: </h4></li>
								<li><h4>Protein Amount: </h4></li>
							</ul>
						</div>
					</div>
					<br>
				</div>
			</div>
			<br>
		</div>	

<!-- ====================================FOOTER HERE=================================================== -->
	<?php include_once('Lib/layout/footer.php');?>
<!-- ====================================FOOTER HERE=================================================== -->