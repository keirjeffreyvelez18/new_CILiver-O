<?php include_once('Lib/layout/header.php');?>

<!--End of Nav Bar-->


    <strong><h2><?php echo(validation_errors())?></h2></strong>
    
    <div class = "container content">
        
        <strong><div class="text-success" style="text-align: center"> <?php echo $this->session->flashdata('update'); ?> </div></strong>
        <strong><div class="text-danger" style="text-align: center"> <?php echo $this->session->flashdata('error'); ?> </div></center></strong>
        
        <div class="row header-blueP">
          <strong><h3 id = "black" style="text-align: center">Profile</h3></strong>
        </div>

        <div class="row container profile">
              <table>
                  <tr class="row">
                    <td>
                      <span>E-mail  : </span>
                    </td>
                    <td>
                      <div class="inner-addon left-addon">
                          <i  class="glyphicon glyphicon-envelope"></i>
                          <input type="text" name="email"  class = "form-control" placeholder="email" value ="<?php echo $this->session->userdata('email');?>" readonly required>
                      </div>
                    </td>
                  </tr>
                  <br>

                  <tr class="row">
                    <td>
                      <span>Name  : </span>&nbsp&nbsp
                    </td>

                    <?php if ($edit_name==TRUE): ?>
                      <form method="post" action="<?php echo base_url('index.php/home/update_username');?>">
                    <?php else: ?>
                      <form method="post" action="<?php echo base_url('index.php/home/update');?>">
                    <?php endif ?>
                    
                      <td>
                        <div class="inner-addon left-addon">
                          <i  class="glyphicon glyphicon-user"></i>
                          <input type="text" name="username" class = "form-control"  placeholder="Username" value ="<?php echo $this->session->userdata('username');?>" <?php if(!$edit_name){echo "readonly";} ?> required>
                        </div>
                          
                      </td>
                      <td>
                        <span>

                          <?php if ($edit_name==TRUE): ?>
                              
                            <div class="inner-addon left-addon">
                              <i  class="glyphicon glyphicon-save"></i>
                                <input type="submit" name="btn_edit" value="SAVE" style="background-color:transparent; font-size:16px" class = "btn btn-sm form-control">
                            </div>

                          <?php else: ?>

                            <div class="inner-addon left-addon">
                              <i class="glyphicon glyphicon-edit"></i>
                              <input type="hidden" name="edit" value="username">
                              <input type="submit" name="btn_edit" value="EDIT" style="background-color:transparent; font-size:16px" class = "btn btn-sm form-control">
                            </div>

                          <?php endif ?>

                        </span>
                      </td>
                    </form>

                  </tr>

                  <tr class="row">
                    <td>
                      <span>Password  : </span> &nbsp&nbsp
                    </td>
                    
                        <script type="text/javascript">
                            function pass1() {
                                var x = document.getElementById("passpro");
                                    if (x.type === "text") {
                                        x.type = "password";
                                        var visibile = document.getElementById("ipasspro").className+='glyphicon glyphicon-eye-open';                    
                                    } else {
                                        x.type = "text";
                                        var visibile = document.getElementById("ipasspro").className+='glyphicon glyphicon-eye-close';
                                    }
                            } 
                        </script>

                      <?php if ($edit_pass==TRUE): ?>
                        <form method="post" action="<?php echo base_url('index.php/home/update_pass');?>">
                      <?php else: ?>
                        <form method="post" action="<?php echo base_url('index.php/home/update');?>">
                      <?php endif ?>
                      <td>  

                        
                        <div class="inner-addon right-addon">
                            <div class="input-group">
                                <input type="password" name="password" class = "form-control"  id="passpro" placeholder="Password" value = ""  <?php if(!$edit_pass){echo "readonly";} ?> required><br>
                                <div class="input-group-addon">
                                    <div>
                                        <span id = "ipasspro" class="glyphicon glyphicon-eye-open" title = "Show Password" onclick="pass1()"></span>
                                        <!-- <input type="checkbox" name="" title="Show Password" onclick="passw()" > -->
                                    </div>
                                </div>
                            </div>
                        </div>
                      </td>
                      <td>
                          <span>

                            <?php if ($edit_pass==TRUE): ?>
                                
                              <div class="inner-addon left-addon">
                                <i  class="glyphicon glyphicon-save"></i>
                                  <input type="submit" name="btn_edit" value="SAVE" style="background-color:transparent; font-size:16px" class = "btn btn-sm form-control">
                              </div>

                            <?php else: ?>

                              <div class="inner-addon left-addon">
                                <i  class="glyphicon glyphicon-edit"></i>
                                <input type="hidden" name="edit" value="password">
                                <input type="submit" name="btn_edit" value="EDIT" style="background-color:transparent; font-size:16px" class = "btn btn-sm form-control">
                              </div>

                            <?php endif ?>

                          </span>
                      </td>
                    </form>
                  </tr>

                  <tr class="row">
                    <td> 
                       <span>Birthday  : </span> 
                    </td>

                    <?php if ($edit_dob==TRUE): ?>
                      <form method="post" action="<?php echo base_url('index.php/home/update_dob');?>">
                    <?php else: ?>
                      <form method="post" action="<?php echo base_url('index.php/home/update');?>">
                    <?php endif ?>

                      <td> 

                          <div class="inner-addon left-addon">
                              <i  class="glyphicon glyphicon-calendar"></i>
                               <input type="date" name="birthday" class = "form-control" placeholder="birthday" value ="<?php echo $this->session->userdata('birthday');?>"  
                               <?php if(!$edit_dob){echo "readonly";} ?> required>
                          </div>

                      </td>
                      <td>  
                          <span>
                          <?php if ($edit_dob==TRUE): ?>
                              
                            <div class="inner-addon left-addon">
                              <i  class="glyphicon glyphicon-save"></i>
                                <input type="submit" name="btn_edit" value="SAVE" style="background-color:transparent; font-size:16px" class = "btn btn-sm form-control">
                            </div>

                          <?php else: ?>

                            <div class="inner-addon left-addon">
                              <i  class="glyphicon glyphicon-edit"></i>
                              <input type="hidden" name="edit" value="dob">
                              <input type="submit" name="btn_edit" value="EDIT" style="background-color:transparent; font-size:16px" class = "btn btn-sm form-control">
                            </div>

                          <?php endif ?>
                        </span>
                      </td>

                    </form>
                  </tr>

                  <tr class="row">
                    <td> 
                      <span>Gender : </span>                      
                    </td>
                    
                    <?php if ($edit_gender==TRUE): ?>
                      <form method="post" action="<?php echo base_url('index.php/home/update_gender');?>">
                    <?php else: ?>
                      <form method="post" action="<?php echo base_url('index.php/home/update');?>">
                    <?php endif ?>

                      <td> 
                        <label for="gender" class="col-sm-2 form-control-label"></label>
                            <select name='gender' class="form-control" <?php if(!$edit_gender){echo "disabled";} ?> required><br>
                                <option value="Male" <?php echo set_select("gender",'Male'); ?>>Male</option>
                                <option value="Female" <?php echo set_select("gender",'Female'); ?>>Female</option>
                            </select><br>
                      </td>
                      <td>  
                          <span>
                          <?php if ($edit_gender==TRUE): ?>
                              
                            <div class="inner-addon left-addon">
                              <i  class="glyphicon glyphicon-save"></i>
                                <input type="submit" name="btn_edit" value="SAVE" style="background-color:transparent; font-size:16px" class = "btn btn-sm form-control">
                            </div>

                          <?php else: ?>

                            <div class="inner-addon left-addon">
                              <i  class="glyphicon glyphicon-edit"></i>
                              <input type="hidden" name="edit" value="gender">
                              <input type="submit" name="btn_edit" value="EDIT" style="background-color:transparent; font-size:16px" class = "btn btn-sm form-control">
                            </div>

                          <?php endif ?>
                        </span>
                      </td>

                    </form>

                  </tr>
              </table>
              <!-- <hr> 
              <strong><h4 id = "black" style="text-align: center">BMI</h4><br></strong> -->
        </div>
    </div>
    
<!-- ====================================FOOTER HERE=================================================== -->
    <?php include_once('Lib/layout/footer.php');?>
<!-- ====================================FOOTER HERE=================================================== -->
  
