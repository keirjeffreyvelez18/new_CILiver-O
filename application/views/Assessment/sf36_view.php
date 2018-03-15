<?php include_once('Lib/layout/header.php');?>


</head>
	<body>
		<div class = "container">
			<div class="row">
	       		<?php include_once('Lib/layout/progress.php');?>
	       	</div>
	    </div>

	    <div class="content">
			
			<div class = "container">
			    <?php if ($index<37): ?>
			    	<form method="post" action="<?php echo base_url('index.php/Assessment/sf36') ?>" class="container quiz-container">
			    <?php else: ?>
			    	<form method="post" action="<?php echo base_url('index.php/Assessment/sf36_save') ?>" class="container quiz-container">
			    <?php endif ?>

						<table class="table table-inverse" id = "white">

							<thead align="center">
								<tr>
									<?php if ($index!=37): ?>
										<div class="col-md-9">
											<h4><?php echo "General Health Question #".$index." of 36"; ?><h4> 
											<h4 class="alert-danger"> <?php echo $this->session->flashdata('error'); ?></h4>
										</div>
									<?php else: ?>
										<div class="col-md-9"><h4>Thank you for Answering</h4></div>
									<?php endif ?>
								</tr>

								<tr>
									<div class="<?php if($index==37){echo 'collapse';} ?> container-fluid">
										<!-- Progress Trackers -->
									       	<div class = "row">
									       		<div class = "col-lg-12">
									       			<div class="progress">
													 	<div class="progress-bar" role="progressbar" aria-valuenow="70"
													 	aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $progress ?>%;">
													  	<?php echo round($progress) ?>%
													 	</div>
													</div>
									       		</div>
									      	 </div>
										<!-- Progress Trackers --> 	
									</div>
								</tr> 
							</thead>
							
							<tbody>
								<?php foreach($questiontab as $row): ?>
									<tr>
										<?php if ($row->qCat==$qcategory): ?>
										<?php $MyQuestion = json_decode($row->qAndA); ?>
										
										<td class="<?php if($index!=$row->qIndex){echo 'collapse';} ?>" >
											<!-- ==============Question and Avatar Container================== -->
												<div class = "container-fluid">
													<div class = "center-block animated jackInTheBox">
														<h3 class = "speech-bubble"><?php echo $MyQuestion->question;?></h3>
													</div>
													
													<div>
														<!-- ======================Response and Answers=========================== -->
														<input name="qIndex" type="hidden" value="<?php echo $row->qIndex; ?>">
														<input type="hidden" name="i"  value="<?php echo $index; ?>">

														<div class="btn-group" data-toggle="buttons" style="margin: 5%; margin-left: 7%;"> <!-- Look into this -->
														
															<?php for ($a=0; $a < count($MyQuestion->answer) ; $a++): ?>
																<?php if ($MyQuestion->answer[$a]!=""): ?>
																	
																	<label class="Rcontainer radio-custom <?php $i=$row->qIndex; if(isset($curAns->$i)){if(trim($curAns->$i)==$MyQuestion->score[$a]){echo 'active';}} ?>">
																	
																	    <input name="ans[<?php echo $row->qIndex ?>]" type="radio" value="<?php echo $MyQuestion->score[$a]; ?>" <?php $i=$row->qIndex; if(isset($curAns->$i)){if(trim($curAns->$i)==$MyQuestion->score[$a]){echo 'checked="checked"';}} ?>>
																	    	<span class="checkmark"></span>

																	    <?php echo $MyQuestion->answer[$a] ?>

																	</label>
																																	
																<?php endif ?>
															<?php endfor ?>
																
														
															<input name="domain[<?php echo $row->qIndex?>]" type="hidden" value="<?php echo $row->domain; ?>">
															<input name="qcategory" type="hidden" value="<?php echo $qcategory; ?>">
														</div>

													<!-- =========================Response and Answers=========================== -->

														<img class="pull-right animated swing" style=" max-height: 30%; max-width: 30%;" src="<?php echo base_url('Lib/imgs/Liver_D.png')?>" alt="liver Doctor"/>
													</div>
												</div>
											<!-- ==============Question and Avatar Container================== -->
											<?php endif ?>
											<?php endforeach ?>
										</td>			
									</tr>
								

								<!-- =======================Result=============================== -->
								<tr>
									<td class="<?php if($index!=37){echo 'collapse';} ?>">
										<h2>
										 Your Average General Health: <?php echo round($result['ave']) ?> %	
										</h2>
										
										<div class="row">
											<div class="col-md-7">
												<ul>
						       						<?php foreach ($sf36_eval as $row):?> 
						       							<li>
						       								<?php echo $row; ?>					 
						       							</li>
						       							<br>
						       						<?php endforeach ?>
					       						</ul>
					       					</div>
					       					<div class="col-md-5">
					       						<h4 class="speech-bubble3">
					       							Hey <strong><?php echo $this->session->userdata('username') ?>,</strong>  
					       							You have the <strong><?php echo " ". $sf36_inter['interpretation']; ?></strong>
					       							<strong><?php echo $sf36_inter['description']; ?></strong>
					       						</h4>

					       						<img class="pull-right animated swing" style=" max-height: 100%; max-width: 100%;" src="<?php echo base_url('Lib/imgs/Liver_D.png')?>" alt="liver Doctor"/>
					       					</div>
				       					</div>
										
									</td>
								</tr>
								<!-- =======================Result=============================== -->

							</tbody>

							<tfoot>
								<tr>
									<td>
										<div class = "pull-right">
											<input type="submit" name="submit" class="btn btn-primary" value="Back" 
												<?php if($index==1){echo "disabled";} ?> 
											>
											<?php if ($index==37): ?>
												<input onclick="alert('Saved');" type="submit" name="submit" class="btn btn-primary" value="Save">
											<?php else: ?>
												<input type="submit" name="submit" class="btn btn-primary" value="Next" autofocus="">
											<?php endif ?>
										</div>
									</td>
								</tr>
							</tfoot>

						</table>
				</form>
			</div>
		</div>

<!-- ====================================FOOTER HERE=================================================== -->
	<?php include_once('Lib/layout/footer.php');?>
<!-- ====================================FOOTER HERE=================================================== -->