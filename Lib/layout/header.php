<html>
<head>
  <title><?php echo $title ?></title>
    <meta charset = "utf-8">
    <meta name = "viewport" content="width = device-width, initial-scale = 1, shrink-to-fit=no">
    <link rel = "shortcut icon" type = "image/png" href="<?php echo base_url('Lib/imgs/dark-logo.png')?>"><!-- Diri ma set website icon-->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('Lib/css/style.css')?>"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('Lib/css/bootstrap.css')?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('Lib/css/less.css')?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('Lib/css/animate.css')?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('Lib/css-progress-wizard-master/css/progress-wizard.min.css')?>" >
    
    <!-- For social media -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Javasctipt files -->
    <script type="text/javascript" src="<?php echo base_url('Lib/js/bootstrap.min.js')?>" ></script>
    <script type="text/javascript" src="<?php echo base_url('Lib/js/jquery.min.js')?>" ></script>
    <script type="text/javascript" src="<?php echo base_url('Lib/js/carousel.js')?>" ></script>
    <script type="text/javascript" src="<?php echo base_url('Lib/js/canvasjs.min.js')?>" ></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myModal').modal('show');
        });

        function passw() {
            var x = document.getElementById("pass");
                if (x.type === "text") {
                    x.type = "password";
                } else {
                    x.type = "text";
                }
        } 
        function password() {
            var x = document.getElementById("password");
                if (x.type === "text") {
                    x.type = "password";
                } else {
                    x.type = "text";
                }
        }
    </script>

    
    <!-- jQuery library -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

    <!-- Latest compiled JavaScript -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

</head>
<body>
	
<!--Nav Bar-->

    <nav class="navbar navbar-inverse <?php if($this->uri->uri_string()=='home'){echo('navbar-fixed-top transparent');} ?>">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="<?php 
                     if($this->session->userdata('isLoggedIn')){
                        echo base_url('index.php/home/home_page');
                    }else{
                        echo base_url('index.php/home/');
                    }
                    ?>">
                    <img class="navbar-brand" src="<?php echo base_url('Lib/imgs/light-logo.png')?>">
                 </a>
            </div>


            <div class="navbar-header">
                <a class="navbar-brand" href="<?php 
                if($this->session->userdata('isLoggedIn')){
                    echo base_url('index.php/home/home_page');
                }else{
                    echo base_url('index.php/home/');
                }

                ?>">Liver-O</a>
            </div>
                <?php if ($this->session->userdata('isLoggedIn')): ?>
                    <ul class="nav navbar-nav">
                        <li class="<?php if ($this->uri->segment(2)=='home_page'){echo 'active';}?>">
                            <a href="<?php echo site_url('home/home_page') ?>">Home</a>
                        </li>
                        <li class="<?php if($this->uri->segment(2)=='questions_view' || $this->uri->segment(2)=='assessment_view'){echo 'active';}?>"> 
                            <a href="<?php
                                        if($this->session->userdata('username')=='Administrator'){
                                            echo site_url('quiz/questions_view');
                                        }else{
                                            echo site_url('Assessment');
                                        }
                                     ?>">Questionnaire</a>
                        </li>
                       
                        <li class="<?php echo site_url('result')?>">
                            <a href = "<?php echo site_url('result')?>">Result</a>
                        </li><!-- THIS IS FOR VIEWING PURPOSE ONLY, REMOVE IF NOT NEEDED -->
                        
                        <li class="<?php echo site_url('watertracker')?>">
                            <a href = "<?php echo site_url('watertracker')?>">Water Tracker</a>
                        </li><!-- THIS IS FOR VIEWING PURPOSE ONLY, REMOVE IF NOT NEEDED -->

                        <li class="<?php echo site_url('sleeptracker')?>">
                            <a href = "<?php echo site_url('sleeptracker')?>">Sleep Tracker</a>
                        </li><!-- THIS IS FOR VIEWING PURPOSE ONLY, REMOVE IF NOT NEEDED -->

                        <li class="<?php echo site_url('foodrecommendation')?>">
                            <a href = "<?php echo site_url('foodrecommendation')?>">Food Recommendation</a>
                        </li><!-- THIS IS FOR VIEWING PURPOSE ONLY, REMOVE IF NOT NEEDED -->
                        
                        

                    </ul>
                <?php endif; ?>
            <ul class="nav navbar-nav navbar-right">
                <li class="<?php if($this->uri->segment(2)=='profile'){echo 'active';} ?>">
                    <a href="<?php echo base_url('index.php/home/profile') ?>"> 
                        <?php echo $this->session->userdata('username') ?></a> <!-- This is where the system uses calls the name of the user logged in -->
                </li>
            

                <?php if ($this->session->userdata('isLoggedIn')): ?>
                    <li><a href="<?php echo base_url('index.php/home/logout') ?>" ><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                <?php else: ?>
                    <li><a data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-log-in" ></span> Login</a></li>
                    <li><a data-toggle="modal" data-target="#register"><span class="glyphicon glyphicon-registration-mark "></span> Register</a></li>
                <?php endif ?>
               
            </ul>
        </div>
    </nav>


<?php if ($this->session->flashdata('error')): ?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Error!</h4>
      </div>
      <div class="modal-body">
        <div class="text-danger"><?php echo $this->session->flashdata('error')?></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<?php endif ?>

<!-- Login Modal -->
<?php if ($this->session->flashdata('success')): ?>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<?php else: ?>
    <div class="modal fade" id="login" role="dialog">
<?php endif ?>
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
        <div class="modal-body">
            <center>
        <form method="post" action="<?php echo base_url('index.php/home/login');?>">
            <div class="text-success" style="text-align: "><?php echo $this->session->flashdata('success')?></div>
            <div class="col-sm-9 input-group">
                <input class="form-control" placeholder="Email" name="email" type="email" value= "<?php echo set_value('email'); ?>"><br>
                <sup>Email serves as username</sup><br><br>
            </div>

            <span class="text-danger"><?php echo form_error('email'); ?></span>

            <div class="col-sm-9 input-group">
                <input type="password" name="password" class = "form-control"  id="pass" placeholder="Password" value = "<?php echo set_value('password'); ?>" required><br>
                 <div class="input-group-addon">
                    <div>
                        <input type="checkbox" name="" title="Show Password" onclick="passw()" >
                    </div>
                </div>
            </div><br>

            <span class="text-danger"><?php echo form_error('password'); ?></span>

            <div class="col-sm-9 input-group">
                <input type="submit" name="register_btn" value="Login" class = "btn btn-primary btn-block form-control">
            </div>

        </form>

        </div>
        <div class="modal-footer">

            <div class="text-center">
              <a data-toggle="modal" data-target="#register" data-dismiss="modal" >Register</a>
              <span>  |  </span>
              <a class="d-block small">Forgot Password?</a>
            </div>

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- end of Login -->

  <!-- Register Modal -->
<div class="modal fade" id="register" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Register</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="<?php  echo base_url('index.php/home/register')?>">
                <table>
                    <tr>
                        <td class="col-sm-2">
                            <label for="Name" class="col-sm-2 form-control-label ">Name: </label>
                        </td>
                        <td class="col-md-10">
                            <input type="text" name="name" class = "form-control" placeholder="Name" value = "<?php echo set_value('name'); ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-sm-2">
                            <label for="email" class="col-sm-2 form-control-label">Email:</label>
                        </td>
                        <td class="col-md-10">
                            <input class="form-control" placeholder="Email" name="email" type="email" value= "<?php echo set_value('email'); ?>">
                            <center><small>Email serves as username</small></center>    
                        </td>
                    </tr>
                    <tr>
                        <td class="col-sm-2">
                            <label for="password" class="col-sm-2 form-control-label">Password: </label>
                        </td>
                        <td class="col-md-11">
                            <div class="input-group">
                                <input type="password" name="password" class = "form-control"  id="pass" placeholder="Password" value = "<?php echo set_value('password'); ?>" required><br>
                                 <div class="input-group-addon">
                                    <input type="checkbox" name="" title="Show Password" onclick="passw()" >
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-sm-2">
                            <label for="birthday" class="col-sm-2 form-control-label" >Birthday: </label>
                        </td>
                        <td class="col-md-11">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="glyphicon glyphicon-calendar"></i>
                                </div>
                                <input type="date" name="birthday" class = "form-control " value = "<?php echo set_value('birthday'); ?>" required >
                                
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-sm-2">
                            <label for="gender" class="col-sm-2 form-control-label">Gender: </label>
                        </td>
                        <td class="col-md-11">
                            <div >
                                <select name='gender' class = "form-control">
                                    <option value="Male" <?php echo set_select("gender",'Male'); ?>>Male</option>
                                    <option value="Female" <?php echo set_select("gender",'Female'); ?>>Female</option>
                                </select><br>
                            </div>
                        </td>
                    </tr>
                </table>
                <input  type="submit" name="register_btn" value="Register" class = "btn btn-primary btn-block"> 
            </form>

        </div>
        <div class="modal-footer">
            <div class="text-center">
              <a data-toggle="modal" data-target="#login" data-dismiss="modal" >Login</a>
              <span>  |  </span>
              <a class="d-block small">Forgot Password?</a>
            </div>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
</div>
  <!-- end of Register -->
<!--End of Nav Bar-->