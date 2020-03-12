<?php $this->load->view('includes/side_bar');?>
<?php $this->load->view('includes/header');?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://app.wustomers.com/assets/crop/js/cropzee.js" defer></script>
<label style="display: none;" id="hideImage" for="cropzee-input" class="image-previewer" data-cropzee="cropzee-input"></label>
        <!-- page content -->
        
        <div class="right_col" role="main">

        <?php if($this->session->flashdata('errors')){ ?>
        <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php echo  $this->session->flashdata('errors');?> </strong> 
                </div>
                <?php } ?>
        <?php if($this->session->flashdata('data_update')){ ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><?php echo  $this->session->flashdata('data_update');?> </strong> 
        </div>
        <?php } ?>

       
          <div class="">
            <div class="page-title">
              
                <h3>Update Company Style</h3>
             
              
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    
                  </div>
                </div>
              </div>
            </div>

            <?php   $admin_id =$this->session->userdata('admin_id'); ?>
                 
             <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="height:100vh;">
                  <div class="">
                    <!-- <h2>Form Design <small>different form elements</small></h2> -->
                    <ul class="nav navbar-right panel_toolbox">
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="">
                    <br />
                    <form id="myProducsForm" method="post"  enctype="multipart/form-data" action="<?php echo site_url('admin/update_shop_details') ;?>" data-parsley-validate class="form-horizontal form-label-left">
                    
                <input type="hidden" name="hdn_id" value="<?=$details->shop_details_id?>"  />
                
                <input type="hidden" name="hdn_logo" value="<?=$details->Business_logo?>"  />
                <input type="hidden" name="hdn_bg_logo" value="<?=$details->background_image?>"  />
                
                <input type="hidden" name="admin_id" value="<?=$admin_id?>"  />
                
                  <div class="form-group" style="display: none;" >
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Business Name<span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">

                      <input type="text" name="Business_Name" value="<?=$details->Business_Name?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  
                  <div class="form-group" style="display: none;" >
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Business Logo <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <input type="file" name="Business_logo" style="padding-bottom: 40px;"  class="form-control col-md-7 col-xs-12">
                    </div>
                        <p><img src="<?php echo base_url('/shop/shop_image/').$details->Business_logo?>" style="width: 50px;height:50px;" ></p>
                  </div>


                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Background image   </label>
                    <div class="col-md-6 col-sm-6 col-xs-6">

                      <input type="hidden" value="" id="Business_logo_url" name="background_image_url">

                      <input id="cropzee-input" type="file" name="background_image" style="padding-bottom: 40px;"  class="form-control col-md-7 col-xs-12">
                    </div>
                        <p><img id="imagePreview" src="<?php echo base_url('/shop/shop_business/').$details->background_image?>" style="width: 70px;height:100px;" ></p>
                  </div>

                  <script>
                      $(document).ready(function(){
                        $("#cropzee-input").cropzee({
                          startSize: [100, 100, '%'],
                          aspectRatio: 1.42857142857,
                        });
                      });
                  </script>

 
                      <div class="form-group"style="display: none;">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Short Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="Short_Description" value="<?=$details->Short_Description?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group"style="display: none;">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Big Heading Deal Promotion </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="Business_deal_heading" value="<?=$details->Business_deal_heading?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                   <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Header Background Color</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="color" name="header_color" value="<?=$details->header_color?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Header Text Color</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="color" name="header_txt_color" value="<?=$details->header_txt_color?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
       
  <!-- <div class="col-md-4" >

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Background Color<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="color" name="back_color" value="<?=$details->back_color?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
  </div>  -->
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Button Color</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="color" name="button_color" value="<?=$details->button_color?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Button Text Color</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="color" name="button_txt_color" value="<?=$details->button_txt_color?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
 
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Footer Color</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="color" name="footer_color" value="<?=$details->footer_color?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Footer Text Color</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="color" name="footer_txt_color" value="<?=$details->footer_txt_color?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Footer Social Icons Color</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="color" name="footer_social_color" value="<?=$details->footer_social_color?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
 
   

  
                      <div class="form-group"style="display: none;">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Facebook <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="text" class="form-control" value="<?=$details->facebook ?>" placeholder="facebook" name="facebook">
                         
                          </div>
                      </div>



                      <div class="form-group"style="display: none;">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Instagram  <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="text" class="form-control" value="<?=$details->instagram ?>" placeholder="instagram" name="instagram">
                         
                          </div>
                      </div>


                      <div class="form-group"style="display: none;">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tweeter  <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="text" class="form-control" value="<?=$details->tweeter ?>" placeholder="tweeter" name="tweeter">
                         
                          </div>
                      </div>


                      <div class="form-group"style="display: none;">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Youtube  <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="text" class="form-control" value="<?=$details->youtube ?>" placeholder="youtube" name="youtube">
                         
                          </div>
                      </div>
                        
                      <div class="form-group"style="display: none;">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Address  <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="text" class="form-control" value="<?=$details->address1 ?>" placeholder="Building name/City" name="address1">
                         
                          </div>
                      </div>
  
                       <div class="form-group"style="display: none;">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Full Address <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea class="form-control" name="address2"><?=$details->address2?></textarea>
                    </div>
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

  <!-- footer content -->
          <?php $this->load->view('includes/footer');?>
        <!-- /footer content -->
      </div>
    </div>
        <!-- jQuery -->
    <script src="<?php echo base_url();?>/assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>/assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url();?>/assets/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url();?>/assets/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url();?>/assets/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url();?>/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url();?>/assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url();?>/assets/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url();?>/assets/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>/assets/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url();?>/assets/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url();?>/assets/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url();?>/assets/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url();?>/assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url();?>/assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo base_url();?>/assets/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url();?>/assets/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url();?>/assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo base_url();?>/assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url();?>/assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url();?>/assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url();?>/assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>/assets/build/js/custom.min.js"></script>