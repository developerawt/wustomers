<?php $this->load->view('includes/side_bar');?>
<?php $this->load->view('includes/header');?>

        <!-- page content -->
        
        <div class="right_col" role="main">

        <?php if($this->session->flashdata('user_registration_error')){ ?>
        <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php echo  $this->session->flashdata('user_registration_error');?> </strong> 
                </div>
                <?php } ?>
        <?php if($this->session->flashdata('data_insert')){ ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><?php echo  $this->session->flashdata('data_insert');?> </strong> 
        </div>
        <?php } ?>

       
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add Admin</h3>
              </div>
              
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    
                  </div>
                </div>
              </div>
            </div>

            
                
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="">
                    <!-- <h2>Form Design <small>different form elements</small></h2> -->
                    <ul class="nav navbar-right panel_toolbox">
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="">
                    <br />
                    <form id="demo-form2" method="post" action="<?php echo site_url('admin/admin_registration') ;?>" data-parsley-validate class="form-horizontal form-label-left">
                    
                <input type="hidden" name="user_id" />
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">User Name <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="user_name"  class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="password" name="password"  class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="email"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Phone <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="phone" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                       
                       
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Country Name <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                        <select name="Selcountry" id="country" class="form-control col-md-7 col-xs-12">
                        <option value="">Select Country</option>
                        <?php
                        foreach($country as $row)
                        {
                        echo '<option value="'.$row->id.'">'.$row->country_name.'</option>';
                        }
                        ?>
                        </select>
                          </div>
                      </div>
                     <!--  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">State </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                      <select name="Selstate" id="state" class="form-control col-md-7 col-xs-12">
                      <option value="">Select State</option>
                      </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> City </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <select name="Selcity" id="city" class="form-control col-md-7 col-xs-12">
                          <option value="">Select City</option>
                         </select>
                        </div>
                      -->

                      
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                      </div>
                       
                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <script>

$(document).ready(function(){
 $('#country').change(function(){
  var country_id = $('#country').val();
   if(country_id != '')
  {
   $.ajax({
    url:"<?php echo site_url(); ?>dynamic_dependent/fetch_state",
    method:"POST",
    data:{country_id:country_id},
    success:function(data)
    {
     $('#state').html(data);
     $('#city').html('<option value="">Select City</option>');
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select State</option>');
   $('#city').html('<option value="">Select City</option>');
  }
 });

 $('#state').change(function(){
  var state_id = $('#state').val();
  if(state_id != '')
  {
   $.ajax({
    url:"<?php echo site_url(); ?>dynamic_dependent/fetch_city",
    method:"POST",
    data:{state_id:state_id},
    success:function(data)
    {
     $('#city').html(data);
    }
   });
  }
  else
  {
   $('#city').html('<option value="">Select City</option>');
  }
 });
 
});
</script>

        <?php $this->load->view('includes/footer');?>