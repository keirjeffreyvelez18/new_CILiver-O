<script type="text/javascript">
window.onload = function () {

	var sf36 = new CanvasJS.Chart("sf36", {
		theme: "light1", // "light2", "dark1", "dark2"
		animationEnabled: true, // change to true		
		title:{
			text: "SF36"
		},
											
		axisY:{
			title: " ",
			tickLength: 0,
			margin:0,
			lineThickness:0,
			valueFormatString:"",
			maximum: 100, //comment this to show numeric values
		},
		axisX:{
			title: " ",
			tickLength: 0,
			margin:0,
			lineThickness:0,
			valueFormatString:" ",
			maximum: 3 //comment this to show numeric values
		},
		data: [
			{
												// Change type to "bar", "area", "spline", "pie",etc.
				type: "line",
				color: "blue",
				dataPoints: [
					{ label: "Healthy", x: 1, y: 75 },
					{ label: "Your <?php echo $sf36_eval['ave'] ?>", x: 2,   y:<?php echo $sf36 ?> }
				]
			}
				]
	});
	sf36.render();

	var blq = new CanvasJS.Chart("blq", {
		theme: "light1", // "light2", "dark1", "dark2"
		animationEnabled: true, // change to true		
		title:{
			text: "BLQ"
		},
											
		axisY:{
			title: " ",
			tickLength: 0,
			margin:0,
			lineThickness:0,
			valueFormatString:"",
			maximum: 100, //comment this to show numeric values
		},
		axisX:{
			title: " ",
			tickLength: 0,
			margin:0,
			lineThickness:0,
			valueFormatString:" ",
			maximum: 3 //comment this to show numeric values
		},
		data: 
		[
			{
												// Change type to "bar", "area", "spline", "pie",etc.
				type: "line",
				color: "blue",
				dataPoints: 
				[
					{ label: "Healthy", x: 1, y: 50 },
					{ label: "Your <?php echo $blq_eval ?>", x: 2,   y:<?php echo $blq ?> }
				]
			}
		]
	});
	blq.render();

		// var cldq = new CanvasJS.Chart("cldq", {
		// 	theme: "light1", // "light2", "dark1", "dark2"
		// 	animationEnabled: true, // change to true		
		// 	title:{
		// 		text: "CLDQ"
		// 	},
												
		// 	axisY:{
		// 		title: " ",
		// 		tickLength: 0,
		// 		margin:0,
		// 		lineThickness:0,
		// 		valueFormatString:"",
		// 		maximum: 100, //comment this to show numeric values
		// 	},
		// 	axisX:{
		// 		title: " ",
		// 		tickLength: 0,
		// 		margin:0,
		// 		lineThickness:0,
		// 		valueFormatString:" ",
		// 		maximum: 3 //comment this to show numeric values
		// 	},
		// 	data: [
		// 		{
		// 											// Change type to "bar", "area", "spline", "pie",etc.
		// 			type: "line",
		// 			color: "blue",
		// 			dataPoints: [
		// 				{ label: "Healthy", x: 1, y: 75 },
		// 				{ label: "", x: 2,   y:<?php echo $sf36 ?> }
		// 			]
		// 		}
		// 			]
		// });
		// cldq.render();
}
</script>
