<?php include_once('Lib/layout/header.php');?>

	<script type="text/javascript">
    window.onload = function() {
        $("#bmiGraph").CanvasJSChart({
            theme: "light2",
            animationEnabled: true,
            animationDuration: 1000,
            exportFileName: "TB Patient Registration Group", 
            exportEnabled: true,
            title: { 
                text: "Bacolod City Health TB DOTS Center",
                fontSize: 20
            },
            subtitles:[
                {
                    text: "Patient Registration Group - Year <?php echo $year?>"
                }
            ],
            axisY: { 
                title: "Registration" 
            }, 
            legend :{ 
                verticalAlign: "center", 
                horizontalAlign: "left",
                cursor: "pointer",

            }, 
            data: [ 
                { 
                    type: "doughnut", 
                    showInLegend: true, 
                    toolTipContent: "{label} <br/> {y}", 
                    indexLabel: "{y}", 
                    dataPoints: [ 
                        { label: "New",  y: 100}
					]
                }  
            ] 
        }); 
    } 
</script>

<div id="bmiGraph" style="width: 100%; height: 100%; color: black; z-index: 2">asdsasdsa</div>


<script type="text/javascript" src="<?php echo base_url('Lib/js/bootstrap.min.js')?>" ></script>
<script type="text/javascript" src="<?php echo base_url('Lib/js/jquery.canvasjs.min.js')?>" ></script>

</body>
</html>