					<script type="text/javascript">
					  	window.onload = function () {

							var chart = new CanvasJS.Chart("chartContainer", {
								animationEnabled: true,
								theme: "light2",
								title:{
									text: "Sleeping Pattern"
								},
								axisX:{
									title: "Date of Sleep",
									valueFormatString: "MMMM DD, YYYY hh:mm TT",
									crosshair: {
										enabled: true,
										snapToDataPoint: true
									},
								},
								axisY: {
									title: "Time",
									crosshair: {
										enabled: true
									},
									maximum: 24,
									  
								},
								toolTip:{
									shared:true
								},  
								legend:{
									cursor:"pointer",
									verticalAlign: "bottom",
									horizontalAlign: "top",
									dockInsidePlotArea: true,
									itemclick: toogleDataSeries
								},
								data: [{
									type: "line",
									showInLegend: true,
									name: "Fall Asleep",
									markerType: "circle",
									color: "#F08080",
									dataPoints: [
										<?php foreach ($tStart as $key => $value): ?>
											{ x: new Date(<?php echo $dos[$key][0].",".($dos[$key][1]-1).",".$dos[$key][2].",".$tStart[$key][0].",".$tStart[$key][1] ?>), y: <?php echo $tStart[$key][0] ?> },
										<?php endforeach ?>
										

									]
								},
								{
									type: "line",
									showInLegend: true,
									name: "Wake Up",
									lineDashType: "dash",
									dataPoints: [
										<?php foreach ($tEnd as $key => $value): ?>
											{ x: new Date(<?php echo $dos[$key][0].",".($dos[$key][1]-1).",".$dos[$key][2].",".$tEnd[$key][0].",".$tEnd[$key][1] ?>), y: <?php echo $tEnd[$key][0] ?> },
										<?php endforeach ?>
									]
								}]
							});
							chart.render();

						function toogleDataSeries(e){
							if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
								e.dataSeries.visible = false;
							} else{
								e.dataSeries.visible = true;
							}
							chart.render();
						}

						}
					  </script>
					  <br>
					  <div class = "col-lg-12">
					  	<div id="chartContainer" style="height: 300px; width: 100%;"></div>
					  </div>