					<script type="text/javascript">
						window.onload = function () {

							var chart = new CanvasJS.Chart("chartContainer", {
								animationEnabled: true,  
								exportEnabled: true,
								title:{
									text: "Water Intake"
								},
								axisY: {
									title: "Number of Glasses",
									suffix: " Glasses",
									stripLines: [{
										value: 8,
										label: "Average",
										valueFormatString: "DD MMMM YYYY"
									}],

								},
								data: [{
									yValueFormatString: "## Glasses",
									type: "splineArea",
									dataPoints: [
									<?php foreach ($waterintakeData as $row): ?>
										<?php $d = explode('-', $row['dateOfIntake']); ?>
										{ x: new Date(<?php echo $d[0].",".($d[1]-1).",".$d[2]; ?>), y: <?php echo $row['numberOfWaterIntake'] ?> },	
									<?php endforeach ?>
									]
								}]
							});
							chart.render();

							}
					</script>
					<div id="chartContainer" style="height: 300px; width: 100%;"></div>