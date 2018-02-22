                        function showSf36(){
                          var chart = new CanvasJS.Chart("sf36", {
                                    height:175,
                                    width:500,
                                    theme: "light1", // "light2", "dark1", "dark2"
                                    animationEnabled: true, // change to true   
                                    title:{
                                      text: "SF36 Result"
                                    },
                                    
                                    axisY:{
                                         maximum: 100 //comment this to show numeric values
                                      },
                                      
                                    data: [
                                    {
                                      // Change type to "bar", "area", "spline", "pie",etc.
                                      type: "line",
                                      color: "teal",
                                      dataPoints: [
                                        { label: "Healthy", x: 1, y: 75 },
                                        { label: "Your <?php echo $sf36_eval['ave']; ?>", x: 2 ,   y:<?php echo $sf36['ave'] ?> }
                                      ]
                                    }
                                    ]
                                  });
                                  chart.render();
                        }


// window.onload = function () {

//                       var chart = new CanvasJS.Chart("sf36", {
//                         height:175,
//                         width:500,
//                         theme: "light1", // "light2", "dark1", "dark2"
//                         animationEnabled: true, // change to true   
//                         title:{
//                           text: "SF36 Result"
//                         },
                        
//                         axisY:{
//                              maximum: 100 //comment this to show numeric values
//                           },
                          
//                         data: [
//                         {
//                           // Change type to "bar", "area", "spline", "pie",etc.
//                           type: "line",
//                           color: "teal",
//                           dataPoints: [
//                             { label: "Healthy", x: 1, y: 75 },
//                             { label: "Your <?php echo $sf36_eval['ave']; ?>", x: 2 ,   y:<?php echo $sf36['ave'] ?> }
//                           ]
//                         }
//                         ]
//                       });
//                       chart.render();

//                       var chart = new CanvasJS.Chart("blq", {
//                         height:175,
//                         width:500,
//                         theme: "light1", // "light2", "dark1", "dark2"
//                         animationEnabled: true, // change to true   
//                         title:{
//                           text: "BLQ Result"
//                         },
                        
//                         axisY:{
//                              maximum: 34 //comment this to show numeric values
//                           },
                          
//                         data: [
//                         {
//                           // Change type to "bar", "area", "spline", "pie",etc.
//                           type: "line",
//                           color: "teal",
//                           dataPoints: [
//                             { label: "Healthy", x: 1, y: 17 },
//                             { label: "<?php echo $blq_eval ?>", x: 2 ,   y:<?php echo $blq ?>  }
//                           ]
//                         }
//                         ]
//                       });
//                       chart.render();

//                       var chart = new CanvasJS.Chart("cldq", {
//                         height:175,
//                         width:500,
//                         theme: "light1", // "light2", "dark1", "dark2"
//                         animationEnabled: true, // change to true   
//                         title:{
//                           text: "CLDQ Result"
//                         },
                        
//                         axisY:{
//                              maximum: 100 //comment this to show numeric values
//                           },
                          
//                         data: [
//                         {
//                           // Change type to "bar", "area", "spline", "pie",etc.
//                           type: "line",
//                           color: "teal",
//                           dataPoints: [
//                             { label: "Healthy", x: 1, y: 50 },
//                             { label: "<?php echo $cldq_eval['ave'] ?>", x: 2 ,   y:<?php echo $cldq['ave'] ?>  }
//                           ]
//                         }
//                         ]
//                       });
//                       chart.render();
//                     }