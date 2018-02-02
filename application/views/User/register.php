<?php include_once('Lib/layout/header.php');?>
<!--End of Nav Bar-->

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

<!--Registration Form-->

    <div class = "container-fluid">
        <form method="post" action="<?php  echo base_url('index.php/home/register')?>">
        <center><div class="text-danger"><?php echo $this->session->flashdata('error')?></div>
            <div class="text-danger"><?php echo(validation_errors())?></div>
        <center><h2 id = "white">Register to Liver-O</h2><br>

            <div class="form-group row">

                <label for="Name" class="col-sm-2 form-control-label ">Name: <br></label>
                <div class="col-sm-10">
                    <input type="text" name="name" class = "form-control" placeholder="Name" value = "<?php echo set_value('name'); ?>" required><br>
                </div>

                <label for="email" class="col-sm-2 form-control-label">Email :</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="Email" name="email" type="email" value= "<?php echo set_value('email'); ?>"><br>
                    <sup>Email serves as username</sup><br><br>
                </div>

                <label for="password" class="col-sm-2 form-control-label">Password:<br></label>
                <div class="col-sm-9 input-group">
                    <input type="password" name="password" class = "form-control"  id="pass" placeholder="Password" value = "<?php echo set_value('password'); ?>" required><br>
                   <div class="input-group-addon">
                       <div>
                           <input type="checkbox" name="" title="Show Password" onclick="passw()">
                       </div>
                   </div>
                </div><br>

                <label for="birthday" class="col-sm-2 form-control-label" >Birthday:<br></label>
                <div class="col-sm-10 inner-addon left-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                    <input type="date" name="birthday" class = "form-control " value = "<?php echo set_value('birthday'); ?>" required ><br>
                </div>

                <label for="gender" class="col-sm-2 form-control-label">Gender:<br></label>
                <div class="col-md-10">
                    <select name='gender' class = "form-control"><br>
                        <option value="Male" <?php echo set_select("gender",'Male'); ?>>Male</option>
                        <option value="Female" <?php echo set_select("gender",'Female'); ?>>Female</option>
                    </select><br>
                </div>

            </div>
            <input  type="submit" name="register_btn" value="Register" class = "btn btn-primary btn-block"> 
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url('index.php/home/login')?>">Login Page</a>
        </div>
    </div>

<!--End of Registration Form-->
</body>
</html>