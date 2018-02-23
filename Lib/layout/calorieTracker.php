					<script type="text/javascript">
						window.onload = function () {

							var chart = new CanvasJS.Chart("chartContainer", {
								animationEnabled: true,  
								exportEnabled: true,
								title:{
									text: "Calorie Intake"
								},
								axisY: {
									title: "Calorie",
									suffix: "Calorie",
								},
								data: [{
									yValueFormatString: "## cal",
									type: "splineArea",
									dataPoints: [
									<?php foreach ($calorieintakeData as $row): ?>
										<?php $d = explode('-', $row['dateOfIntake']); ?>
										{ x: new Date(<?php echo $d[0].",".($d[1]-1).",".$d[2]; ?>), y: <?php echo $row['numOfCalorie'] ?> },	
									<?php endforeach ?>
									]
								}]
							});
							chart.render();

							}
					</script>
					<div id="chartContainer" style="height: 300px; width: 100%;"></div>