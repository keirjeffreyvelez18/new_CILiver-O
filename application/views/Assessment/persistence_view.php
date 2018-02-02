<?php include_once('Lib/layout/header.php');?>


</head>
	<body>
		<!-- Progress Indicator -->
		<div class = "container">
			<div class="row">
	       		<?php include_once('Lib/layout/progress.php');?>
	       	</div>
	    </div>

		<!-- End of Progress Indicator -->
		<div class="container quiz-container">
			<div class="row">
				<div class="col-lg-12 content1-custom form-group">
					
					<div class="row content2-custom"><!-- This div is for the header -->
						<div class="col-lg-12">
								<h3 class = "glyphicon glyphicon-question-sign">Are the symptoms appearing for the last six months? </h3>
								
								<a href="<?php echo base_url('index.php/Assessment/cldq');?>" style="color: white">
									<button class = "btn btn-md btn-success " type = "button" style="float:right">
		       				 				Yes
		       				 			<span class = "glyphicon glyphicon-chevron-right"></span>
		       						</button>
		       					</a>
		       					<a href="<?php echo base_url('index.php/Result/');?>" style="color: white">
									<button class = "btn btn-md btn-success " type = "button" style="float:right">
		       				 				No
		       				 			<span class = "glyphicon glyphicon-chevron-left"></span>
		       						</button>
		       					</a><br>	
	       				</div>
	       			</div>

					<div class="row"><!-- This div must be for the forms or chart for the user's view -->
						
						
					</div>

				</div>

			</div>
		</div>
	</body>
</html>