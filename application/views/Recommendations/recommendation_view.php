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

			<!-- =========================================================Recommendations Contents======================================================================== -->
			<div class="row content1-custom" style="padding:3%;">

				<!-- ==========================================================RECOM NAVIGATION====================================================================== -->
				<ul class="nav nav-tabs custom-nav-tabs">
					<li class="active">
						<a data-toggle="tab" href="#WaterTrackerMenu">
							<span class="glyphicon glyphicon-tint"></span> Water Recommendations
						</a>
					</li>
					<li>
						<a data-toggle="tab" href="#SleepTrackerMenu">
							<span class="glyphicon glyphicon-bed"></span> Sleep Recommendations
						</a>
					</li>
					<li>
						<a data-toggle="tab" href="#CalorieRecomMenu">
							<span class="glyphicon glyphicon-cutlery"></span> Calorie Recommendation
						</a>
					</li>
				</ul>
				<!-- ==========================================================RECOM NAVIGATION====================================================================== -->

				<div class=" tab-content">
					<!-- ==========================================================WATER INTAKE RECOM====================================================================== -->
					<div id="WaterTrackerMenu" class="col-lg-12  tab-pane fade in active">
						<!-- <h3>
							<span class="glyphicon glyphicon-tint"></span>
							Water Recommendation
						</h3> -->
						<!-- ^======Insert recommendation here: this must change according to the score ======^ -->
						<div class="row">
							
							<h4 class = "speech-bubble2 animated jackInTheBox">
								Hey, you should know that your abdominial symptom severity score is: <strong><?php echo $cldq['as']; ?></strong>, 
								<br> <?php echo $cldq_eval['as'] ?>
							</h4>

							<div class="col-lg-7">
								<p class="pull-left"><strong>DISCLAIMER:</strong> The recommendations we provide cannot replace a real doctor's advice and prescription.</p>

								<div class="pull-left">
									<ul class="nav nav-tabs custom-nav-tabs">
										<li class="active"><a data-toggle="tab" href="#Wmenu1">Concerns</a></li>
										<li><a data-toggle="tab" href="#Wmenu2">Hints and Suggestion</a></li>
										<li><a data-toggle="tab" href="#Wmenu3">Additional Information</a></li>
									</ul>

									<div class="tab-content custom-tab-content">
										<div id="Wmenu1" class="tab-pane fade in active">
										  	<h3>Concerns</h3>
										  	<ul>
											  	<?php if ($sf36['ave']>75): ?>
											      	<li>
											      		<h4>You are healthy, please keep it that way and regulate your water intake.</h4>

											      	</li>
											      <?php else: ?>
											      	<?php if ($cldq['as']<50): ?>
											      		<li>
											      			<h4>You should keep watch over your water intake because your body might accumulate fluid that may worsen your abdominal symptoms</h4>
											      		</li>
											      		<li>
											      			<h4>1 liter or 4 glasses [51 ounces] per day</h4>
											      		</li>
											      	<?php else: ?>
											      		<li>
											      			<h4>You are at risk of the effects of severe ascites, please consult your doctor and get fluid restriction instructions from your doctor.
											      			</h4>
											      		</li>
											      		<li>
											      			<?php echo $cldq_recom[2]; ?>
											      		</li>
											      	<?php endif ?>
											    <?php endif ?>
											     
										    </ul>

										    <a href="<?php echo site_url('watertracker') ?>">
												<button class = "btn btn-md btn-success" type = "button" style="float:right">
												<span class="glyphicon glyphicon-tint"></span>
												Start Daily Water Tracking
					       				 		<span class = "glyphicon glyphicon-chevron-right"></span>
					       						</button>
					       					</a><br>

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
										      	<li>Drinking water helps flush out toxins from the human body.</li>
										      	<li>Adequate water intake can fix metabolism.</li>
										    </ul>
										</div>
									</div>
									<!-- ^======FOR MORE PRECISED RECOMMEDNATIONS ADD HERE FOR ADDITIONAL HINTS AND RECOMMENDATIONS ======^ -->
								</div>
							</div>

							<div class="col-lg-5">
								<div class="pull-right">
									<img class="center-block animated swing pull-right" style=" max-height: 70%; max-width: 70%; margin-right: 10%;" src="<?php echo base_url('Lib/imgs/Liver_D.png')?>" alt="liver Doctor"/>
								</div>
							</div>
				
						</div>
					</div>
					<!-- ==========================================================WATER INTAKE RECOM====================================================================== -->

					<!-- ================================================================SLEEP RECOM======================================================================= -->
					<div id="SleepTrackerMenu" class="col-lg-12 tab-pane fade in">
						<!-- <h3>
							<span class="glyphicon glyphicon-bed"></span>
							Sleep Recommendation
						</h3> -->

						<div class="row">
							<h4 class = "speech-bubble2 animated jackInTheBox">
								Hey, you should know that your emotional function score is: <strong><?php echo $sf36['ef']; ?></strong>,
								<br>and your fatigue score: <strong><?php echo $cldq['f'] ?></strong> 
								<br>- <?php echo $sf36_eval['ef'] ?> 
								<br>- <?php echo $cldq_eval['f'] ?> 

							</h4>

							<div class="col-lg-7">
								<p class="pull-left"><strong>DISCLAIMER:</strong> The recommendations we provide cannot replace a real doctor's advice and prescription.</p>

								<div class="pull-left">
									<ul class="nav nav-tabs custom-nav-tabs">
									    <li class="active"><a data-toggle="tab" href="#Smenu1">Concerns</a></li>
									    <li><a data-toggle="tab" href="#Smenu2">Hints and Suggestion</a></li>
									    <li><a data-toggle="tab" href="#Smenu3">Additional Information</a></li>
									</ul>

									<div class="tab-content">
									    <div id="Smenu1" class="tab-pane fade in active">
										    <h3>Concerns: </h3>
										      <!-- <p>If the result is high severity Systemic/Emotional/Fatigue place it here.</p> -->
										    <ul>
										   		<?php if ($sf36['ef']>75): ?>
										      	<li>
										      		<h4> You are healthy, please keep it that way and regulate your sleeping pattern to avoid complications.</h4>
										      	</li>
										    	<?php else: ?>
										    	<?php if ($cldq['f']<50): ?>
										      	<li>
										      		<h4> You should keep watch over your sleeping pattern because your body might suffer more serious complications involving sleep related liver complications. Keep track of your sleeping pattern before it's to late. </h4>
										      	</li>
										    	<?php else: ?>
											    <li>
											      	<h4> You are at risk of the effects of severe hepatic encephalopathy, please consult your doctor and monitor your sleeping patterns. </h4>
											    </li>
										    	<?php endif ?>
										    	<?php endif ?>
										    </ul>

									      	<a href="<?php echo site_url('sleeptracker') ?>">
												<button class = "btn btn-md btn-success" type = "button" style="float:right">
												<span class="glyphicon glyphicon-bed"></span>
												Start Daily Sleep Tracking
					       				 		<span class = "glyphicon glyphicon-chevron-right"></span>
					       						</button>
					       					</a><br>

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
								</div>
							</div>

							<div class="col-lg-5">
								<div class="pull-right">
									<img class="center-block animated swing pull-right" style=" max-height: 70%; max-width: 70%; margin-right: 10%;" src="<?php echo base_url('Lib/imgs/Liver_D.png')?>" alt="liver Doctor"/>
								</div>
							</div>

						</div>
					</div>
					<!-- ================================================================SLEEP RECOM======================================================================= -->

					<!-- ================================================================CALORIE RECOM===================================================================== -->
					<div id="CalorieRecomMenu" class="col-lg-12 tab-pane fade in">
						<!-- <h3>
							<span class="glyphicon glyphicon-cutlery"></span>
							Calories/Carbohydrates/Fats Recommendations
						</h3> -->

						<div class="row">
							<h4 class = "speech-bubble2 animated jackInTheBox">
								According to your assessment your Body Mass Index is <strong><?php echo $bmi; ?></strong>,
								<br>
								Your daily recommended Calorie intake should be, <strong><?php echo ($bmi*40); ?> kcal/kg</strong> per day.
							</h4>

							<div class="col-lg-7">
								<p class="pull-left"><strong>DISCLAIMER:</strong> Please go to your dietician for interpretation of the results and get an appropriate meal plan</p>

								<div class="pull-left">
									<ul class="nav nav-tabs custom-nav-tabs">
									    <li class="active"><a data-toggle="tab" href="#Fmenu1">Concerns</a></li>
									    <li><a data-toggle="tab" href="#Fmenu2">Hints and Suggestion</a></li>
									    <li><a data-toggle="tab" href="#Fmenu3">Additional Information</a></li>
									</ul>

									<div class="tab-content">
									    <div id="Fmenu1" class="tab-pane fade in active">
									      <h3>Concerns</h3>

									      <ul>
										      <li>Recommended Calorie Intake: <strong><?php echo ($bmi*40); ?> kcal/kg</li></strong>
										      <li>Recommended Cardohydrates Intake: <strong><?php echo (($bmi*40)*0.5)/4; ?> g</li></strong>
										      <li>Recommended Fats Intake: <strong><?php echo round(((($bmi*40)*0.35)/9),2); ?> g</li></strong>
										      <li>Recommended Protein Intake: <strong><?php echo round(((($bmi*40)*0.15)/4),2); ?> g</li></strong>
									      </ul>
									      <!-- <?php if (condition): ?>
									      	
									      <?php endif ?>
									      <p>If the result is high severity Abdominal/Systemic/Emotional/Fatigue symptoms place it here.</p> -->
									      <!-- ====FOOD RELATED PROBLEMS==== -->
									      <!-- <p>[this is the result if the result in SF36 is HEALTHY ] You are healthy, please keep consuming the reccommended amount of calories.</p>
									      <p>[this is the result if the result in CLDQ is MILD ] You should keep watch over your calorie intake because your body might suffer more serious complications or more liver damage. Please follow the recommended amount of calories. </p>
									      <p>[this is the result if the result in CLDQ is SEVERE ] You are at risk of the effects of severe hepatic encephalopathy, jaundice or even ascites. If this is left uncontolled, you will be at health will be at 50/50. Food is vital especially when you are suffering severe case of cirrhosis.</p> -->
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
									      	<li>Calories can be bad or good, but we need the right amount to survive.</li>
									      	<li>There are "empty calories". These calories are only accompanied by a few nutrients.</li>
									      	<li>Calories weighs nothing, but excess calories are stored as potential energy then it is turned into fat. </li>
									      </ul>
									    </div>
									</div>
									<!-- ^======FOR MORE PRECISED RECOMMEDNATIONS ADD HERE FOR ADDITIONAL HINTS AND RECOMMENDATIONS ======^ -->
								</div>
							</div>

							<div class="col-lg-5">
								<div class="pull-right">
									<img class="center-block animated swing pull-right" style=" max-height: 70%; max-width: 70%; margin-right: 10%;" src="<?php echo base_url('Lib/imgs/Liver_D.png')?>" alt="liver Doctor"/>
								</div>
							</div>
							
						</div>

						<!-- <center>
							<h4>
								<ul>
									<li>
										Abdominal Health Result: <?php echo $cldq_eval['as']; ?>
									</li>
									<li>
										Emotional/Fatigue: <?php echo $sf36_eval['ef']; ?>
									</li>
								</ul>
							</h4>
						</center> -->
						<!-- ====================THE CHART OF CORRESPONDING RECOMMENDATION======================== -->


						<!-- ^======Insert disclaimer here: this must change according to the recommendation ======^ -->
					</div>
					<!-- ================================================================CALORIE RECOM===================================================================== -->
				</div>		
			</div>
			<!-- =========================================================Recommendations Contents======================================================================== -->
		</div>
		<br>		


    <script type="text/javascript" src="<?php echo base_url('Lib/js/bootstrap.min.js')?>" ></script>
    <script type="text/javascript" src="<?php echo base_url('Lib/js/jquery.min.js')?>" ></script>

<!-- ====================================FOOTER HERE=================================================== -->
	<?php include_once('Lib/layout/footer.php');?>
<!-- ====================================FOOTER HERE=================================================== -->