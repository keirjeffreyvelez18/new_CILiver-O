
				<div class = "col-lg-12">
	       			<center><h3>Your Progress</h3></center>
		        	<ul class="progress-indicator">
		        		<!-- start BMI -->
			            <li class="<?php if($qTaken['bmi']==0.5){echo'active';}elseif($qTaken['bmi']==1){echo'completed';} ?>">
			            	<a href="<?php echo base_url('index.php/Assessment/bmi'); ?>">
			                	<span class="bubble">
				                </span>
				            </a>
			                <a href="<?php echo base_url('index.php/Assessment/bmi'); ?>">
			                	<button class="btn" style="background-color:transparent;" 
			                	<?php if($qTaken['bmi']==0){echo'disabled';} ?> >
			                		Body Mass Index Assessment
			                	</button>
			                </a>
			                <br>
			                <?php if ($qTaken['bmi']==0.5): ?>
			                	<small>(In Progress)</small>
			                <?php elseif ($qTaken['bmi']==1): ?>
			                	<small>(Completed)</small>
			                <?php endif ?>
			            </li>
			            <!-- end BMI  -->
			            <!-- start SF36 -->
			            <li class="<?php if($qTaken['sf36']==0.5){echo'active';}elseif($qTaken['sf36']==1){echo'completed';} ?>">
			            	<a href="<?php echo base_url('index.php/Assessment/sf36');?>"
			            		onclick="return <?php if($qTaken['sf36']==0){echo'false';} ?>;" >
			                	<span class="bubble">
				                </span>
				            </a>
			                <a href="<?php echo base_url('index.php/Assessment/sf36'); ?>">
			                	<button class="btn" style="background-color:transparent;" 
			                	<?php if($qTaken['sf36']==0){echo'disabled';} ?> >
			                		General Health Assessment
			                	</button>
			                </a>
			                <br>
			                <?php if ($qTaken['sf36']==0.5): ?>
			                	<small>(In Progress)</small>
			                <?php elseif ($qTaken['sf36']==1): ?>
			                	<small>(Completed)</small>
			                <?php endif ?>
			            </li>
			            <!-- end SF36 -->
			            <!-- start BLQ -->
			            <li class="<?php if($qTaken['blq']==0.5){echo'active';}elseif($qTaken['blq']==1){echo'completed';} ?>">
			            	<a href="<?php echo base_url('index.php/blq');?>"
			            		onclick="return <?php if($qTaken['blq']==0){echo'false';} ?>;" >
			                	<span class="bubble">
				                </span>
				            </a>
			                <a href="<?php echo base_url('index.php/blq'); ?>">
			                	<button class="btn" style="background-color:transparent;" 
			                	<?php if($qTaken['blq']==0){echo'disabled';} ?> >
			                		Brief Liver Assessment
			                	</button>
			                </a>
			                <br>
			                <?php if ($qTaken['blq']==0.5): ?>
			                	<small>(In Progress)</small>
			                <?php elseif ($qTaken['blq']==1): ?>
			                	<small>(Completed)</small>
			                <?php endif ?>
			            </li>
			            <!-- end BLQ -->
			            <!-- start Persistence -->
			            <li class="<?php if($qTaken['prs']==0.5){echo'active';}elseif($qTaken['prs']==1){echo'completed';} ?>">
			            	<a href="<?php echo base_url('index.php/Assessment/prs');?>"
			            		onclick="return <?php if($qTaken['prs']==0){echo'false';} ?>;" >
			                	<span class="bubble">
				                </span>
				            </a>
			                <a href="<?php echo base_url('index.php/Assessment/prs'); ?>">
			                	<button class="btn" style="background-color:transparent;" 
			                	<?php if($qTaken['prs']==0){echo'disabled';} ?> >
			                		Persistence
			                	</button>
			                </a>
			                <br>
			                <?php if ($qTaken['prs']==0.5): ?>
			                	<small>(In Progress)</small>
			                <?php elseif ($qTaken['prs']==1): ?>
			                	<small>(Completed)</small>
			                <?php endif ?>
			            </li>
			            <!-- end Persistence -->
			            <!-- start CLDQ -->
			            <li class="<?php if($qTaken['cldq']==0.5){echo'active';}elseif($qTaken['cldq']==1){echo'completed';} ?>">
			            	<a href="<?php echo base_url('index.php/cldq');?>"
			            		onclick="return <?php if($qTaken['cldq']==0){echo'false';} ?>;" >
			                	<span class="bubble">
				                </span>
				            </a>
			                <a href="<?php echo base_url('index.php/cldq'); ?>">
			                	<button class="btn" style="background-color:transparent;" 
			                	<?php if($qTaken['cldq']==0){echo'disabled';} ?> >
			                		Chronic Liver Disease Questionnare
			                	</button>
			                </a>
			                <br>
			                <?php if ($qTaken['cldq']==0.5): ?>
			                	<small>(In Progress)</small>
			                <?php elseif ($qTaken['cldq']==1): ?>
			                	<small>(Completed)</small>
			                <?php endif ?>
			            </li>
			            <!-- end CLDQ -->
			            <!-- start Asssessment -->

			            <li class="<?php if($qTaken['result']==1){echo'completed';} ?>">
			            	<a href="<?php echo base_url('index.php/result');?>"
			            		onclick="return <?php if($qTaken['result']==0){echo'false';} ?>;" >
			                	<span class="bubble">
				                </span>
				            </a>
			                <a href="<?php echo base_url('index.php/result'); ?>">
			                	<button class="btn" style="background-color:transparent;" 
			                	<?php if($qTaken['result']==0){echo'disabled';} ?> >
			                		Assessment Result
			                	</button>
			                </a>
			                
			            </li>
			            <!-- end Assessement -->
		        	</ul>
		        </div>