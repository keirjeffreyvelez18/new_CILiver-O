						<script type="text/javascript">
					  		window.onload = function () {

								var chart = new CanvasJS.Chart("chartContainer",
								    {
								    	animationEnabled: true,
										exportEnabled: true,
								      	title:{
								       		text: "Sleep Pattern"   
								      	},
								      	legend: {
									        horizontalAlign: "right",
									        verticalAlign: "center"
									    },
								      	axisY:{
								      		title: "Sleeping Hours",
									    	viewportMaximum:16,
									    	suffix: " hr",
									    	stripLines: [{
												value: 8,
												label: "Average",
											}],
											crosshair: {	
												enabled: true,
											},
									   	},

									   	axisX:{
									   		valueFormatString: "DD-MMM-YYYY",
									   		crosshair: {
												enabled: true,
											},

									   	},
									   	
								      	data: [
									      	{        
										        type: "line",
										        dataPoints:[
										        	<?php foreach ($sleepTrackerData as $key => $value):?> 
										        		<?php $d = explode('-', $sleepTrackerData[$key]['dateofSleep']); ?>
										        		<?php if ($value['hoursOfSleep']>=7 && $value['hoursOfSleep']<=9):?>
										        			{ 	x: new Date(<?php echo $d[0].",".($d[1]-1).",".$d[2]; ?>),
										        				y: <?php echo $sleepTrackerData[$key]['hoursOfSleep']; ?>, 
										        				indexLabel: "Normal",
										        				markerType: "square",
										        				legendMarkerType: "square" ,
										        				legendText: "Normal Sleeping",
										        				markerColor: "green",
										        				markerSize: 10,										        			},
										        		<?php elseif($value['hoursOfSleep']>9): ?>
										        			{  	x: new Date(<?php echo $d[0].",".($d[1]-1).",".$d[2]; ?>),
										        				y: <?php echo $sleepTrackerData[$key]['hoursOfSleep']; ?>, 
										        				indexLabel: "Too Much ",
										        				markerType: "triangle",
										        				markerColor: "red",
										        				markerSize: 10,
										        				legendMarkerType: "triangle" ,
										        				legendText: "Too Much Sleeping",
										        			},
										        		<?php elseif($value['hoursOfSleep']<7): ?>
										        			{  	x: new Date(<?php echo $d[0].",".($d[1]-1).",".$d[2]; ?>),
										        				y: <?php echo $sleepTrackerData[$key]['hoursOfSleep']; ?>, 
										        				indexLabel: "Low",
										        				markerType: "cross",
										        				markerColor: "blue",
										        				markerSize: 10

										        			},
										        		<?php endif ?>
										        		
										        	<?php endforeach ?>
											        // {  y: 7 },
											        // {  y: 8, indexLabel: "normal",markerType:"square",markerColor: "green" , markerSize: 10},
											        // {  y: 6 },
											        // {  y: 5 },
											        // {  y: 10, indexLabel: "high", markerType:"triangle", markerColor: "red", markerSize: 10 },
											        // {  y: 4 },
											        // {  y: 7 },
											        // {  y: 6 },
											        // {  y: 3, indexLabel: "low",markerType:"cross",markerColor: "blue" , markerSize: 10 }
										        ]
									      	}
								      	]
								    });

								    chart.render();

								
								function toggleDataSeries(e) {
									if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
										e.dataSeries.visible = false;
									} else {
										e.dataSeries.visible = true;
									}
									e.chart.render();
								}

							}
					  	</script>
					  	
					  	<div id="chartContainer" style="height: 300px; width: 100%;"></div>


<!-- 					<script type="text/javascript">
					  	window.onload = function () {

							var chart = new CanvasJS.Chart("chartContainer", {
								animationEnabled: true,
								exportEnabled: true,
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
					  	<br>
					  </div> -->