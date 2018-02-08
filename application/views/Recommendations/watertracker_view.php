<?php include_once('Lib/layout/header.php');?>


</head>
	<body>
		<br>
		<div class="container">
			<div class="row header-blueP">
				<div class="col-lg-12">
					<h1>Water Tracker</h1>
				</div>
			</div>
			<div class="row body-maroonP">
				<div class="col-lg-12">
				<center>
					<div class="slidecontainer range">
						<form oninput="x.value=parseInt(a.value)">
							<input type="range" id="a" min="1" max="20" value="50" class="slider" id="myRange">
							<output name="x" for="a" value="50"></output>
							<div class = "col-lg-12">
								<img class = "center-block" src="<?php echo base_url('Lib/imgs/WaterIntakeReminder.png')?>" alt="Water Tracker Image">
							</div>
						</form>
					</div>
				</center><br>
				<input type="" name="">
				</div>
			</div>		
		</div>

<!-- ====================================FOOTER HERE=================================================== -->
	<?php include_once('Lib/layout/footer.php');?>
<!-- ====================================FOOTER HERE=================================================== -->