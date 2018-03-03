<?php include_once('Lib/layout/header.php');?>

<?php echo(validation_errors())?> 
 <!--HEADER-->
 <div class="content">

<!-- Welcome Message -->   
    <div class = "container-fluid">
        <div class="row header-blueP">
        	<div class="col-lg-12 "><!-- For Gradient  effects, remember to add this to the less.css -->
        		<h2>Welcome <?php echo $this->session->userdata('username') ?>, </h2>
        	</div>
            <div class="col-lg-12">
                <p>Hey, <?php echo $this->session->userdata('username') ?> 
                    this session is taken on ( <?php echo date('d-m-Y');?> ) Your last login was <?php echo $this->session->userdata('lastLogin'); ?></p>
            </div>
        </div>
<!-- Welcome Message -->

<!-- Contents and News -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="text-justify">
                        Liver-O is a web app meant to inform its users about their current liver condition, to make them aware of their current health and liver health status. In short, Liver-O is your very own online liver health assistant to know more about your liver and on what actions to do for liver improvement.
                    </h3>
                </div>
            </div>

            <br>

            <div class = "row">
                <div class="col-lg-4 text-center">
                    <div><span class="glyphicon glyphicon-list-alt img-circle" style="font-size: 150px"></span></div>
                    <!-- <img class="img-circle" src="<?php echo base_url('Lib/imgs/developers/dev.jpg')?>"/> -->
                    <h2>Take the Liver Health Assessment</h2>
                    <p>First, Liver-O will provide a set of questionnaires to determine your current liver health status</p>
                </div>
                <div class="col-lg-4 text-center">
                    <div><span class="glyphicon glyphicon-paste img-circle" style="font-size: 150px"></span></div>
                    <!-- <img class="img-circle" src="<?php echo base_url('Lib/imgs/developers/dev.jpg')?>"/> -->
                    <h2>Get Results and Recommendations</h2>
                    <p>Second, after the assessment Liver-O will generate results and interpretations about your current liver health status</p>
                </div>
                <div class="col-lg-4 text-center">
                    <div><span class="glyphicon glyphicon-stats img-circle" style="font-size: 150px"></span></div>
                    <!-- <img class="img-circle" src="<?php echo base_url('Lib/imgs/developers/dev.jpg')?>"/> -->
                    <h2>Lets Track Your Liver Through your Progress</h2>
                    <p>After the result is given, Liver-O can be used as a tool to keep track of your liver enhancing activities</p>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-lg-12 center-block">
                    <a href="<?php echo site_url('assessment')?>"><button class="btn btn-primary btn-block" ><h4>Lets Gets Started</h4></button></a>
                    <!-- ^ THIS BUTTON WILL TRIGGER THE ENABLE OF THE NAVBAR ^ -->
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <small>“I am strong because I've been weak. I am fearless because I've
                            been afraid. I am wise because I've been foolish.”</small>
                    <br>
                    <small>- Anonymous</small>
                </div>
            </div>
        </div>

    </div>
<!-- Contents and News -->
</div>
<br>
<!-- ====================================FOOTER HERE=================================================== -->
    <?php include_once('Lib/layout/footer.php');?>
<!-- ====================================FOOTER HERE=================================================== -->