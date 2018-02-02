<?php include_once('Lib/layout/header.php');?>

<script type="text/javascript">
        $(document).ready(function(){
            //group add limit
            var maxGroup = 10;
            
            //add more fields group
            $(".addMore").click(function(){
                if($('body').find('.fieldGroup').length < maxGroup){
                    var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
                    $('body').find('.fieldGroup:last').after(fieldHTML);
                }else{
                    alert('Maximum '+maxGroup+' groups are allowed.');
                }
            });
            
            //remove fields group
            $("body").on("click",".remove",function(){ 
                $(this).parents(".fieldGroup").remove();
            });
        });
</script>

</head>
<body>
	
<!--Registration Form-->
    
    <?php echo(validation_errors())?>
    <div class = "container-fluid">
        <form method="post" action="<?php echo base_url('index.php/quiz/add_question')?>">
        <center><h2 id = "white" >Add New Question</h2><br></center>
            <input type="text" name="qIndex" class = "form-control" placeholder="Question Index"><br>
            <textarea rows="5" cols="72" name="question" class = "form-control" placeholder="Question"></textarea><hr>
            <div class="form-group fieldGroup">
            <div class="input-group">
                <input type="text" name="answer[]" class="form-control" placeholder="Enter name"/>
                    <div class="input-group-addon"> 
                        <input type="number" name="score[]">
                        <a href="javascript:void(0)" class="addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                    </div>
                </div>
            </div>
            <input type="submit" value="Submit" class = "btn btn-primary btn-block">
        </form>


        <div class="form-group fieldGroupCopy" style="display: none;">
            <div class="input-group">
                <input type="text" name="answer[]" class="form-control" placeholder="Enter name"/>
                <div class="input-group-addon"> 
                     <input type="number" name="score[]">
                    <a href="javascript:void(0)" class="remove"><span class="glyphicon glyphicon glyphicon-minus" aria-hidden="true"></span></a>
                </div>
            </div>
    </div>

<!--End of Registration Form-->

</body>
</html>