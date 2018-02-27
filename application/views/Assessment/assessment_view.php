<?php include_once('Lib/layout/header.php');?>


</head>
<body>
	<div class="container content">

		<div class="row">
			<div class="col-lg-12 form-group">
				<?php include_once('Lib/layout/progress.php');?>
			</div>
		</div>

		<div class="row bmi-container">
			<div class="col-lg-12 form-group">
				<h2>Liver Assessment</h2>
				<a href="<?php echo site_url('Assessment/nextAssessment')?>"><button class="btn-primary" >Lets Gets Started</button></a>
				<h3>Shall we begin with the assessment?</h3>
				<p>Before we take the assessment, Would you kindly be: </p>
				<ul>
					<li>Honest</li>
					<li>Try not to leave unanswered questions</li>
				</ul>
				<p>Thank You!</p>
			</div>
		</div>
		
	</div>

<!-- ====================================FOOTER HERE=================================================== -->
	<?php include_once('Lib/layout/footer.php');?>
<!-- ====================================FOOTER HERE=================================================== -->