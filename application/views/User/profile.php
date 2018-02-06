<?php include_once('Lib/layout/header.php');?>

<!--End of Nav Bar-->

    <?php echo(validation_errors())?>
    <div class = "container-fluid">
        <center><h2 id = "black">Profile</h2><br>
        <div class="text-success"> <?php echo $this->session->flashdata('update'); ?> </div>
        <div class="text-danger"> <?php echo $this->session->flashdata('error'); ?> </div></center>
        <div class="container">
            <form>
        <!--Username-->
            <input type="text" name="username" class = "form-control"  placeholder="Username" value ="<?php echo $this->session->userdata('username');?>" readonly required>
            <span>Username  | </span> 
            <span><input type="button" name="Edit" class = "btn btn-info btn-sm" value="Edit" data-toggle="modal" data-target="#nameModal" ></span>
        <!--Email-->
            <input type="text" name="email" class = "form-control" placeholder="email" value ="<?php echo $this->session->userdata('email');?>" readonly required>
            <span>E-mail  | </span> 
            <span><input style="font-size: 12px;" type="button" name="Edit" class = "btn btn-info btn-sm" value="Edit" data-toggle="modal" data-target="#emailModal"  ></span>
        <!--Password-->
            <input type="password" name="password" class = "form-control" placeholder="password" value ="<?php echo $this->session->userdata('password');?>" readonly required>
            <span>Password  | </span> 
            <span><input style="font-size: 12px;" type="button" name="Edit" class = "btn btn-info btn-sm" value="Edit" data-toggle="modal" data-target="#passModal" ></span>
        <!--Birthday-->
            <input type="text" name="birthday" class = "form-control" placeholder="birthday" value ="<?php echo $this->session->userdata('birthday');?>" readonly required>
            <span>Birthday  | </span> 
            <span><input style="font-size: 12px;" type="button" name="Edit" class = "btn btn-info btn-sm" value="Edit" data-toggle="modal" data-target="#birthdayModal" ></span>
        <!--Gender-->
            <input type="text" name="gender" class = "form-control" placeholder="gender" value ="<?php echo $this->session->userdata('gender');?>" readonly required>
            <span>Gender | </span> 
            <span><input style="font-size: 12px;" type="button" name="Edit" class = "btn btn-info btn-sm" value="Edit" data-toggle="modal" data-target="#genderModal" ></span>
            </form>
        </div>
    </div>
</body>

<!--Modal for Username-->
<form style="border: transparent; background: transparent;" method="post" action="<?php echo base_url('index.php/home/update_name'); ?>">
    <input type="hidden" name="userid" value ="<?php echo $this->session->userdata('userid');?>">
    <div id="nameModal" class="modal fade" role="dialog" style="color:black;">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Please Enter New Username</h4>
          </div>
          <div class="modal-body">
            <span>Username:</span><input type="text" name="username" value ="<?php echo $this->session->userdata('username');?>" class="form-control" required>
          </div>
          <div class="modal-footer">
            <input type="submit" name="Submit" class="btn btn-success" value="Submit">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
</form>

<!--Modal for Password-->
<form style="border: transparent; background: transparent;" method="post" action="<?php echo base_url('index.php/home/update_pass'); ?>">
    <input type="hidden" name="userid" value ="<?php echo $this->session->userdata('userid');?>">
    <div id="passModal" class="modal fade" role="dialog" style="color:black;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Please Enter New Password</h4>
          </div>
          <div class="modal-body">
            <span>Enter New Password:</span><input class="form-control" type="password" name="password"><br>
            <span>Confirm Password:</span><input class="form-control" type="password" name="password2">
          </div>
          <div class="modal-footer">
            <input type="submit" name="Submit" class="btn btn-success" value="Submit">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>/
        </div>
      </div>
    </div>
</form>

<!--Modal for Email-->
<form style="border: transparent; background: transparent;" method="post" action="<?php echo base_url('index.php/home/update_email'); ?>">
    <input type="hidden" name="userid" value ="<?php echo $this->session->userdata('userid');?>">
    <div id="emailModal" class="modal fade" role="dialog" style="color:black;">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Please Enter New Email</h4>
          </div>
          <div class="modal-body">
            <span>Email:</span><input type="text" name="email" value ="<?php echo $this->session->userdata('email');?>" class="form-control" required>
          </div>
          <div class="modal-footer">
            <input type="submit" name="Submit" class="btn btn-success" value="Submit">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
</form>

<!--Modal for Birthday-->
<form style="border: transparent; background: transparent;" method="post" action="<?php echo base_url('index.php/home/update_dob'); ?>">
    <input type="hidden" name="userid" value ="<?php echo $this->session->userdata('userid');?>">
    <div id="birthdayModal" class="modal fade" role="dialog" style="color:black;">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Please Enter Birthdate</h4>
          </div>
          <div class="modal-body">
            <span>Birthday:</span><input type="date" name="birthday" value ="<?php echo $this->session->userdata('birthday');?>" class="form-control" required>
          </div>
          <div class="modal-footer">
            <input type="submit" name="Submit" class="btn btn-success" value="Submit">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
</form>

<!--Modal for Gender-->
<form style="border: transparent; background: transparent;" method="post" action="<?php echo base_url('index.php/home/update_gender'); ?>">
    <input type="hidden" name="userid" value ="<?php echo $this->session->userdata('userid');?>">
    <div id="genderModal" class="modal fade" role="dialog" style="color:black;">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Please Select Gender</h4>
          </div>
          <div class="modal-body">
            
            <select name='gender' class = "form-control"><br>
                <option <?php if($this->session->userdata('gender')=='Male'){echo 'selected';} ?> value="Female" <?php echo set_select("gender",'Female'); ?> >Female</option>
                <option <?php if($this->session->userdata('gender')=='Male'){echo 'selected';} ?> value="Male" <?php echo set_select("gender",'Male'); ?> >Male</option>
            </select><br>

          </div>
          <div class="modal-footer">
            <input type="submit" name="Submit" class="btn btn-success" value="Submit">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
</form>
  
  <!-- STATIC JS LINKS -->
  <script type="text/javascript" src="<?php echo base_url('Lib/js/bootstrap.min.js')?>" ></script>
  <script type="text/javascript" src="<?php echo base_url('Lib/js/jquery.min.js')?>" ></script>

</html>




<!-- <center><h2 id = "white">Profile</h2><br>
            <center><div class="text-success"> <?php //echo $this->session->flashdata('update'); ?> </div>
            <input type="hidden" name="userid" class = "form-control" value ="<?php //echo $this->session->userdata('userid');?>"><br>
            <label for="Username" id = "white">Username<br></label>
            <input type="text" name="username" class = "form-control" placeholder="Username" value ="<?php //echo $this->session->userdata('username');?>" required><br>
            <label for="Email" id = "white">Email<br></label>
            <input type="email" name="email" class = "form-control" placeholder="Email" value="<?php //echo $this->session->userdata('email');?>" required><br>
            <label for="password" id = "white">Password<br></label>
            <input type="password" name="password" class = "form-control" placeholder="Password" value = "<?php //echo $this->session->userdata('password');?>"" required><br>
            <input type="password" name="password2" class = "form-control" placeholder="Confirm Password" value = ""  required ><br>
            <label for="birthday" id = "white" >Birthday<br></label>
            <input type="date" name="birthday" class = "form-control" value = "<?php //echo $this->session->userdata('birthday');?>" required ><br>
            <label for="gender" id = "white">Gender<br></label>
            <select name='gender' class = "form-control"><br>
                <option <?php// if($this->session->userdata('gender')=='Male'){echo 'selected';} ?> value="Female" <?php //echo set_select("gender",'Female'); ?> >Female</option>
                <option <?php //if($this->session->userdata('gender')=='Male'){echo 'selected';} ?> value="Male" <?php //echo set_select("gender",'Male'); ?> >Male</option>
            </select><br>
            <input onclick = "return confirm('Do you wish to update user?')" type="submit" name="update_btn" value="Update" class = "btn btn-info btn-block"> -->