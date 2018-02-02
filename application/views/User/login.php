    <?php include_once('Lib/layout/header.php');?>
<!--Login Form-->

<script>
    function passw() {
        var x = document.getElementById("pass");
        if (x.type === "text") {
            x.type = "password";
        } else {
            x.type = "text";
        }
    } 
</script>


    <div class = "container-fluid jumbotron">
        <form method="post" action="<?php echo base_url('index.php/home/login');?>">
        <center><div class="text-success"><?php echo $this->session->flashdata('success')?></div>
        <div class="text-success"><?php echo $this->session->flashdata('logout')?></div>
        <h2 id = "white">Login to Liver-O</h2><br>

            
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
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url('index.php/home/register')?>">Register</a>
          <span>  |  </span>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
        </center>
    </div>


<!--End of Login Form-->
</body>
  <script type="text/javascript" src="<?php echo base_url('Lib/js/bootstrap.min.js')?>" ></script>
  <script type="text/javascript" src="<?php echo base_url('Lib/js/jquery.min.js')?>" ></script>
</html>