<?php include_once('Lib/layout/header.php');?>


</head>
	<body class="base-background">
		<br>
		<div class="container">
			<!-- ================================Header 1================================ -->
			<div class="row header-blueP">
				<div class="col-lg-12">
					<h1>
						<span class="glyphicon glyphicon-cutlery"></span>
						Food Recommendation
					</h1>
				</div>
			</div>
			<!-- ================================End of Header 1================================ -->

			<!-- ================================FORM 1================================ -->
			<div class="row recom-container">
				<div class="col-lg-12">
					<h1>Food Recommendation</h1>
					  <h2>Select Amount</h2>
					  <p>The .dropdown-header class is used to add headers inside the dropdown menu:</p>

					  <!-- Sleep Progress Go Here -->
					  <div class = "col-lg-12">
					  	<img class = "center-block" src="<?php echo base_url('Lib/imgs/MealPlanner.png')?>" alt="Sleep Progress Image">
					  	<br>
					  </div>
					  <!-- Sleep Progress Go Here -->
				</div>
			</div>
			<!-- ================================END OF FORM 1================================ -->
			
			<!-- ================================Chart 1================================ -->
			<div class="row body-maroonP">
				<div class="col-lg-12">
					<h1>Charts must pop-up here</h1>
					  <h2>Please...</h2>
					  <p>Lorem Ipsum dolor et lallalalalala</p>

					  <script type="text/javascript">
						window.onload = function () {

						var chart = new CanvasJS.Chart("chartContainer", {
							theme: "light1", // "light2", "dark1", "dark2"
							animationEnabled: false, // change to true		
							title:{
								text: "Basic Column Chart"
							},
							data: [
							{
								// Change type to "bar", "area", "spline", "pie",etc.
								type: "pie",
								dataPoints: [
									{ label: "apple",  y: 10  },
									{ label: "orange", y: 15  },
									{ label: "banana", y: 25  },
									{ label: "mango",  y: 30  },
									{ label: "grape",  y: 28  }
								]
							}
							]
						});
						chart.render();

						}
						</script>

						<div id="chartContainer" style="width: 100%; height: 100%;"></div>
					<br>
				</div>

			</div>
			<!-- ================================END of Chart================================ -->
			<br>
		</div>	

<!-- ====================================FOOTER HERE=================================================== -->
	<?php include_once('Lib/layout/footer.php');?>
<!-- ====================================FOOTER HERE=================================================== -->