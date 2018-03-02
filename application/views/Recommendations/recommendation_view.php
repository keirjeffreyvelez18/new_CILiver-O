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
					<p>Hey, you should know that your abdominial symptom severity score is: </p>
					<!-- ^======Insert recommendation here: this must change according to the score ======^ -->

					<center><h3><?php echo $cldq_eval['a'] ?></h3></center>
					<!-- ====================THE CHART OF CORRESPONDING RECOMMENDATION======================== -->

					<p><strong>DISCLAIMER:</strong> The recommendations we provide cannot replace a real doctor's advice and prescription.</p>
					<!-- ^======Insert disclaimer here: this must change according to the recommendation ======^ -->

					<ul class="nav nav-tabs custom-nav-tabs">
					    <li class="active"><a data-toggle="tab" href="#Wmenu1">Concerns</a></li>
					    <li><a data-toggle="tab" href="#Wmenu2">Hints and Suggestion</a></li>
					    <li><a data-toggle="tab" href="#Wmenu3">Additional Information</a></li>
					</ul>

					<div class="tab-content custom-tab-content">
					    <div id="Wmenu1" class="tab-pane fade in active">
					      <h3>Concerns</h3>
					      <?php if ($sf36['ave']>75): ?>
					      	<h3>You are healthy, please keep it that way and regulate your water intake.</h3>
					      <?php else: ?>
					      	<?php if ($cldq<50): ?>
					      		<h4>You should keep watch over your water intake because your body might accumulate fluid that may worsen your abdominal symptoms</h4>
					      	<?php else: ?>
					      		<h4>You are at risk of the effects of severe ascites, please consult your doctor and get fluid restriction instructions from your doctor.</h4>
					      	<?php endif ?>
					      <?php endif ?>
					     
					    </div>
					    <div id="Wmenu2" class="tab-pane fade">
					      <h3>Hints and Suggestions</h3>
					      <ul>
					      	<li>According to most research, an average person needs 8 cups of 8 ounces of water as a minimum water intake for a day.</li>
					      	<li>Drinking water before eating improves digestion.</li>
					      	<li>After drinking or eating sugary treats, drinking water dilutes the sugar.</li>
					      	<li>Always keep a water jug nearby to stay hydrated.</li>
					      	<li>Eat ice chips & candy and gum to avoid thirst if ascites is severe.</li>
					      </ul>
					    </div>
					    <div id="Wmenu3" class="tab-pane fade">
					      <h3>Did you know?</h3>
					      <ul>
					      	<li>According to most research, An average human body is composed of 60% - 70%.</li>
					      	<li>Some researches say that, drinking too much water too fast causes water intoxication or Hyponatermia.</li>
					      </ul>
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
					<p>Hey tou should be aware of these following domains: </p>
					<!-- ^======Insert recommendation here: this must change according to the score ======^ -->

					<center><h3>[Show Systemic/Emotional/Fatigue Score and Severity]</h3></center>
					<!-- ====================THE CHART OF CORRESPONDING RECOMMENDATION======================== -->

					<p><strong>DISCLAIMER:</strong> The recommendations we provide cannot replace a real doctor's advice and prescription.</p>
					<!-- ^======Insert disclaimer here: this must change according to the recommendation ======^ -->

					<ul class="nav nav-tabs custom-nav-tabs">
					    <li class="active"><a data-toggle="tab" href="#Smenu1">Concerns</a></li>
					    <li><a data-toggle="tab" href="#Smenu2">Hints and Suggestion</a></li>
					    <li><a data-toggle="tab" href="#Smenu3">Additional Information</a></li>
					</ul>

					<div class="tab-content">
					    <div id="Smenu1" class="tab-pane fade in active">
					      <h3>Concerns</h3>
					      <!-- <p>If the result is high severity Systemic/Emotional/Fatigue place it here.</p> -->
					      <p>[this is the result if the result in SF36 is HEALTHY ] You are healthy, please keep it that way and regulate your sleeping pattern to avoid complications.</p>
					      <p>[this is the result if the result in CLDQ is MILD ] You should keep watch over your sleeping pattern because your body might suffer more serious complications involving sleep related liver complications. Keep track of your sleeping pattern before it's to late. </p>
					      <p>[this is the result if the result in CLDQ is SEVERE ] You are at risk of the effects of severe hepatic encephalopathy, please consult your doctor and monitor your sleeping patterns. </p>
					    </div>
					    <div id="Smenu2" class="tab-pane fade">
					      <h3>Hints and Suggestions</h3>
					      <p>In this section the hints and tips on how to sleep effectively shall be found here</p>
					      <ul>
					      	<li>Breathing slowly, in and out, helps your mind relax which helps you fall asleep faster.</li>
					      	<li>Drinking warm milk if there are sleep disturbances. If you are lactose intolerant, lactose-free milk is also available. Consult your doctor for more precise recommendations.</li>
					      	<li>Control your light exposure, it helps you sleep better.</li>
					      	<li>Stretching before sleeping actually improves blood circulation which promotes better sleep.</li>
					      </ul>
					    </div>
					    <div id="Smenu3" class="tab-pane fade">
					      <h3>Did you know?</h3>
					      <ul>
					      	<li>Too much sleep is actually bad for you.</li>
					      	<li>Wearing caps, beanies, or socks are actually harmful to the brain if worn while sleeping.</li>
					      	<li>A healthy diet helps you sleep better. </li>
					      	<li>Lack of sleep can actually cause your brain to slowly eat itself. </li>
					      	<li>Sleeping at morning is not as beneficial as sleeping at night. </li>
					      </ul>
					    </div>
					</div>
					<!-- ^======FOR MORE PRECISED RECOMMEDNATIONS ADD HERE FOR ADDITIONAL HINTS AND RECOMMENDATIONS ======^ -->

					<hr>
				</div>
				<div class="col-lg-12">
					<h3>
						<span class="glyphicon glyphicon-cutlery"></span>
						Calorie Recommendation
					</h3>
					<p>Show score or reason why the recommended amount is generated</p>
					<!-- ^======Insert recommendation here: this must change according to the score ======^ -->

					<center><h3>[Show Abdominal/Systemic/Emotional/Fatigue Score and Severity]</h3></center>
					<!-- ====================THE CHART OF CORRESPONDING RECOMMENDATION======================== -->

					<p><strong>DISCLAIMER:</strong> The recommendations we provide cannot replace a real doctor's advice and prescription.</p>
					<!-- ^======Insert disclaimer here: this must change according to the recommendation ======^ -->

					<ul class="nav nav-tabs custom-nav-tabs">
					    <li class="active"><a data-toggle="tab" href="#Fmenu1">Concerns</a></li>
					    <li><a data-toggle="tab" href="#Fmenu2">Hints and Suggestion</a></li>
					    <li><a data-toggle="tab" href="#Fmenu3">Additional Information</a></li>
					</ul>

					<div class="tab-content">
					    <div id="Fmenu1" class="tab-pane fade in active">
					      <h3>Concerns</h3>
					      <p>If the result is high severity Abdominal/Systemic/Emotional/Fatigue symptoms place it here.</p><!-- ====FOOD RELATED PROBLEMS==== -->
					      <p>[this is the result if the result in SF36 is HEALTHY ] You are healthy, please keep consuming the reccommended amount of calories.</p>
					      <p>[this is the result if the result in CLDQ is MILD ] You should keep watch over your calorie intake because your body might suffer more serious complications or more liver damage. Please follow the recommended amount of calories. </p>
					      <p>[this is the result if the result in CLDQ is SEVERE ] You are at risk of the effects of severe hepatic encephalopathy, jaundice or even ascites. If this is left uncontolled, you will be at health will be at 50/50. Food is vital especially when you are suffering severe case of cirrhosis.</p>
					    </div>
					    <div id="Fmenu2" class="tab-pane fade">
					      <h3>Hints and Suggestions</h3>
					      <ul>
					      	<li>Avoid transfat as much as possible.</li>
					      	<li>Consume healthy fats with Omega 3 oil to improve digestion and nutrient absorption</li>
					      	<li>Keep your purine levels at controlled levels.</li>
					      	<li>Limit your sodium intake, it makes you more thirsty it may cause you do accumulate more water than needed which is bad.</li>
					      </ul>
					    </div>
					    <div id="Fmenu3" class="tab-pane fade">
					      <h3>Did you know?</h3>
					      <ul>
					      	<li>Avoid transfat as much as possible.</li>
					      	<li>Keep your purine levels at controlled levels.</li>
					      	<li>Limit your sodium intake, it makes you more thirsty it may cause you do accumulate more water than needed which is bad.</li>
					      </ul>
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