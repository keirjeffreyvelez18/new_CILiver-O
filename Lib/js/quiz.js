$(function() {
      $('#colorselector').change(function(){
        $('.colors').hide();
        $('#' + $(this).val()).show();
      });
    });

    window.onload = function () {
      var chart = new CanvasJS.Chart("chartContainer", {
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
    chart.render(); 
  </script>