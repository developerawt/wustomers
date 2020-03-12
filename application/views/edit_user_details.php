<?php $this->load->view('includes/side_bar');?>
<?php $this->load->view('includes/header');?>

        <!-- page content -->
        
        <div class="right_col" role="main">

        

        <!-- <?php if($this->session->flashdata('update_message')){ ?>
        <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php echo $this->session->flashdata('update_message');?> </strong> 
                </div>
                <?php } ?> -->
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>User Details</h3>
              </div>
              
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            
                
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <!-- <h2>Form Design <small>different form elements</small></h2> -->
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" method="post" action="<?php echo base_url('admin/update_user_details') ;?>" data-parsley-validate class="form-horizontal form-label-left">
                    <?php $count=1;
                        foreach($user_data as $user_details){
                        
                    ?>
                    <input type="hidden" name="user_id" value="<?php echo $user_details->user_id ; ?>"/>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">User Name </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="user_name" value="<?php echo $user_details->user_name ; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">OTP <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="otp" value="<?php echo $user_details->otp ; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div> -->

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password  </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="password" value="<?php echo $user_details->password ; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Device Id <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="device_id" value="<?php echo $user_details->device_id ; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div> -->

                      <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Firebase Token<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="firebase_token" value="<?php echo $user_details->firebase_token ; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div> -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="email" value="<?php echo $user_details->email ; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Phone</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="phone" value="<?php echo $user_details->phone ; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Farm Name</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="farm_name" value="<?php echo $user_details->farm_name ; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Farm Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="farm_password" value="<?php echo $user_details->farm_password ; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Farm Location </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="farm_location" value="<?php echo $user_details->farm_location ; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Country Name</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="country_name" value="<?php echo $user_details->country_name ; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sub Country</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="sub_country" value="<?php echo $user_details->sub_country ; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Physical Address </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="physical_address" value="<?php echo $user_details->physical_address; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Farm Address </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="farm_address" value="<?php echo $user_details->farm_address ; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address Code </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="address_code" value="<?php echo $user_details->address_code ; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Farm Email </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="farm_email" value="<?php echo $user_details->farm_email; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Farm Phone</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="farm_phone" value="<?php echo $user_details->farm_phone; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Farm Contact Person </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="farm_contact_person" value="<?php echo $user_details->farm_contact_person; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Farm Capacity</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="farm_capacity" value="<?php echo $user_details->farm_capacity; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Klbo Registration Number</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="klbo_registration_number" value="<?php echo $user_details->klbo_registration_number ; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Farm Registration Date </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="farm_registration_date" value="<?php echo $user_details->farm_registration_date; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Activation Key </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="activation_key" value="<?php echo $user_details->activation_key ; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div> -->
                      <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status         <small>1-active user</small> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" value="<?php echo $user_details->isactive ; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div> -->

                      
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a class="btn btn-primary" href="<?php echo site_utl('admin/all_accounts') ?>">Cancel </a>
                          <!-- <button class="btn btn-primary" type="button"></button> -->
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Update</button>
                        </div>
                      </div>
                        <?php } ?>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->

        <?php $this->load->view('includes/footer');?>