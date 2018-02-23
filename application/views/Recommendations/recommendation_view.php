<?php include_once('Lib/layout/header.php');?>


</head>
	<body class="base-background">
		<br>
		<div class="container quiz-container inner-container content">
			<div class="row header-blueP">
				<div class="col-lg-12">
					<h1>
						<span class="glyphicon glyphicon-check"></span> 
						Recommendation Page
					</h1>
				</div>
			</div>
			<div class="row content1-custom">
				<div class="col-lg-12">
					<h3>
						<span class="glyphicon glyphicon-tint"></span>
						Water Recommendation
					</h3>
					<p>Show score or reason why the recommended amount is generated</p>
					<!-- ^======Insert recommendation here: this must change according to the score ======^ -->

					<center><h2>CHART GOES HERE</h2></center>
					<!-- ====================THE CHART OF CORRESPONDING RECOMMENDATION======================== -->

					<p><strong>DISCLAIMER:</strong> Remind the user that this recommendations cannot replace a real doctor's advice and prescription</p>
					<!-- ^======Insert disclaimer here: this must change according to the recommendation ======^ -->

					<ul class="nav nav-tabs custom-nav-tabs">
					    <li class="active"><a data-toggle="tab" href="#Wmenu1">Concerns</a></li>
					    <li><a data-toggle="tab" href="#Wmenu2">Hints and Suggestion</a></li>
					    <li><a data-toggle="tab" href="#Wmenu3">Additional Information</a></li>
					</ul>

					<div class="tab-content custom-tab-content">
					    <div id="Wmenu1" class="tab-pane fade in active">
					      <h3>Concerns</h3>
					      <p>If the result is high severity abdominal symptoms place it here.</p>
					    </div>
					    <div id="Wmenu2" class="tab-pane fade">
					      <h3>Hints and Suggestions</h3>
					      <p>In this section the hints and tips on how to drink water shall be found here</p>
					    </div>
					    <div id="Wmenu3" class="tab-pane fade">
					      <h3>Additional Information</h3>
					      <p>Display facts that stresses the importance of water</p>
					    </div>
					</div>
					<!-- ^======FOR MORE PRECISED RECOMMEDNATIONS ADD HERE FOR ADDITIONAL HINTS AND RECOMMENDATIONS ======^ -->

					<hr>
				</div>
				<div class="col-lg-12">
					<h3>
						<span class="glyphicon glyphicon-bed"></span>
						Sleep Recommendation
					</h3>
					<p>Show score or reason why the recommended amount is generated</p>
					<!-- ^======Insert recommendation here: this must change according to the score ======^ -->

					<center><h2>CHART GOES HERE</h2></center>
					<!-- ====================THE CHART OF CORRESPONDING RECOMMENDATION======================== -->

					<p><strong>DISCLAIMER:</strong> Remind the user that this recommendations cannot replace a real doctor's advice and prescription</p>
					<!-- ^======Insert disclaimer here: this must change according to the recommendation ======^ -->

					<ul class="nav nav-tabs custom-nav-tabs">
					    <li class="active"><a data-toggle="tab" href="#Smenu1">Concerns</a></li>
					    <li><a data-toggle="tab" href="#Smenu2">Hints and Suggestion</a></li>
					    <li><a data-toggle="tab" href="#Smenu3">Additional Information</a></li>
					</ul>

					<div class="tab-content">
					    <div id="Smenu1" class="tab-pane fade in active">
					      <h3>Concerns</h3>
					      <p>If the result is high severity systemic/emotional/fatigue place it here.</p>
					    </div>
					    <div id="Smenu2" class="tab-pane fade">
					      <h3>Hints and Suggestions</h3>
					      <p>In this section the hints and tips on how to sleep effectively shall be found here</p>
					    </div>
					    <div id="Smenu3" class="tab-pane fade">
					      <h3>Additional Information</h3>
					      <p>Display facts that stresses the importance of sleep</p>
					    </div>
					</div>
					<!-- ^======FOR MORE PRECISED RECOMMEDNATIONS ADD HERE FOR ADDITIONAL HINTS AND RECOMMENDATIONS ======^ -->

					<hr>
				</div>
				<div class="col-lg-12">
					<h3>
						<span class="glyphicon glyphicon-cutlery"></span>
						Food Suggestion
					</h3>
					<p>Show score or reason why the recommended amount is generated</p>
					<!-- ^======Insert recommendation here: this must change according to the score ======^ -->

					<center><h2>CHART GOES HERE</h2></center>
					<!-- ====================THE CHART OF CORRESPONDING RECOMMENDATION======================== -->

					<p><strong>DISCLAIMER:</strong> Remind the user that this recommendations cannot replace a real doctor's advice and prescription</p>
					<!-- ^======Insert disclaimer here: this must change according to the recommendation ======^ -->

					<ul class="nav nav-tabs custom-nav-tabs">
					    <li class="active"><a data-toggle="tab" href="#Fmenu1">Concerns</a></li>
					    <li><a data-toggle="tab" href="#Fmenu2">Hints and Suggestion</a></li>
					    <li><a data-toggle="tab" href="#Fmenu3">Additional Information</a></li>
					</ul>

					<div class="tab-content">
					    <div id="Fmenu1" class="tab-pane fade in active">
					      <h3>Concerns</h3>
					      <p>If the result is high severity abdominal symptoms place it here.</p><!-- ====FOOD RELATED PROBLEMS==== -->
					    </div>
					    <div id="Fmenu2" class="tab-pane fade">
					      <h3>Hints and Suggestions</h3>
					      <p>In this section the hints and tips on how to determine calorie needs shall be found here</p>
					    </div>
					    <div id="Fmenu3" class="tab-pane fade">
					      <h3>Additional Information</h3>
					      <p>Display facts that stresses the importance of recieving the right amount of calories</p>
					    </div>
					</div>
					<!-- ^======FOR MORE PRECISED RECOMMEDNATIONS ADD HERE FOR ADDITIONAL HINTS AND RECOMMENDATIONS ======^ -->

					<hr>
				</div>
			</div>		
		</div>
		<br>		


    <script type="text/javascript" src="<?php echo base_url('Lib/js/bootstrap.min.js')?>" ></script>
    <script type="text/javascript" src="<?php echo base_url('Lib/js/jquery.min.js')?>" ></script>

<!-- ====================================FOOTER HERE=================================================== -->
	<?php include_once('Lib/layout/footer.php');?>
<!-- ====================================FOOTER HERE=================================================== -->