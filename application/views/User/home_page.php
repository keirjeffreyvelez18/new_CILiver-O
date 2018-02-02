<?php include_once('Lib/layout/header.php');?>

<?php echo(validation_errors())?> 
 <!--HEADER-->   
<div class="bg">

<!-- Welcome Message -->   
    <div class = "container-fluid header-blueP">
        <div class="row">
        	<div class="col-lg-12 "><!-- For Gradient  effects, remember to add this to the less.css -->
        		<h2>Welcome <?php echo $this->session->userdata('username') ?>, </h2>
        	</div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <p>Hey, <?php echo $this->session->userdata('username') ?> 
                    this session is taken on ( <?php echo date('d-m-Y');?> )</p>
            </div>
        </div>
    </div>
<!-- Welcome Message -->

<!-- Contents and News -->

	<div class = "container-fluid">
        
    </div>

<!-- Contents and News -->

</div>
</body>
</html>