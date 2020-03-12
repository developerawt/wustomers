<?php $this->load->view('includes/side_bar');?>
<?php $this->load->view('includes/header');?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://app.wustomers.com/assets/crop/js/cropzee.js" defer></script>
<label style="display: none;" id="hideImage" for="cropzee-input" class="image-previewer" data-cropzee="cropzee-input"></label>

<!-- page content -->
<div class="right_col" role="main">
     <?php if(validation_errors()) { ?>
     <div class="alert alert-danger alert-dismissible">
          <?php echo validation_errors();?>
     </div>
     <?php } ?>
     <?php if($this->session->flashdata('subscribe')){ ?>
     <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php echo  $this->session->flashdata('subscribe');?> </strong> 
          <a href="<?php echo site_url('/admin/pricing'); ?>" style="color: blue; font-size: 16px;" ><u>Click here to  subscribe now</u> </a> 
     </div>
     <?php } ?>
     <?php if($this->session->flashdata('data_inserted')){ ?>
     <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php echo  $this->session->flashdata('data_inserted');?> </strong> 
     </div>
     <?php } ?>
     <?php if($this->session->flashdata('user_registration_error')){ ?>
     <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php echo  $this->session->flashdata('user_registration_error');?> </strong> 
     </div>
     <?php } ?>
     <?php if($this->session->flashdata('errorsss')){ ?>
     <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php echo  $this->session->flashdata('errorsss');?> </strong> 
     </div>
     <?php } ?>
     <div class="">
          <div class="page-title">
               <div class="title_left">
                    <h3>Add Products</h3>
               </div>
          </div>
          <?php $admin_id =$this->session->userdata('admin_id');?>
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
                              <form id="myProducsForm" method="post" enctype="multipart/form-data" action="<?php echo site_url('admin/products_entry') ;?>"   class="form-horizontal form-label-left">
                                   <input type="hidden" name="admin_id" value="<?=$admin_id?>"  />
                                   <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reg_name">Product Name <span class="required">*</span> </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                             <input type="text" name="product_name"  class="form-control col-md-7 col-xs-12">
                                        </div>
                                   </div>
                                   

                                   <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Image <span class="required">*</span> </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                             <input type="hidden" value="" id="Business_logo_url" name="product_image_url">
                                             <input id="cropzee-input" type="file" name="product_image"  class="form-control col-md-7 col-xs-12">
                                        </div>
                                        <p><img id="imagePreview" src="https://via.placeholder.com/50X50/000000/FFFFFF/?text=NO" style="width: 50px;height:50px;" ></p>
                                   </div>

                                   <script>
                                        $(document).ready(function(){
                                          $("#cropzee-input").cropzee({
                                            startSize: [100, 100, '%'],
                                            aspectRatio:1,
                                          });
                                        });
                                   </script>


                                   <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Currency<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                             <select name="product_quantity" class="form-control col-md-7 col-xs-12">
                                                  <option>AED</option>
                                                  <option>AFN</option>
                                                  <option>ALL</option>
                                                  <option>AMD</option>
                                                  <option>ANG</option>
                                                  <option>AOA</option>
                                                  <option>ARS</option>
                                                  <option>AUD</option>
                                                  <option>AWG</option>
                                                  <option>AZN</option>
                                                  <option>BAM</option>
                                                  <option>BBD</option>
                                                  <option>BDT</option>
                                                  <option>BGN</option>
                                                  <option>BHD</option>
                                                  <option>BIF</option>
                                                  <option>BMD</option>
                                                  <option>BND</option>
                                                  <option>BOB</option>
                                                  <option>BRL</option>
                                                  <option>BSD</option>
                                                  <option>BTN</option>
                                                  <option>BWP</option>
                                                  <option>BYR</option>
                                                  <option>BZD</option>
                                                  <option>CAD</option>
                                                  <option>CDF</option>
                                                  <option>CHF</option>
                                                  <option>CLF</option>
                                                  <option>CLP</option>
                                                  <option>CNY</option>
                                                  <option>COP</option>
                                                  <option>CRC</option>
                                                  <option>CUP</option>
                                                  <option>CVE</option>
                                                  <option>CZK</option>
                                                  <option>DJF</option>
                                                  <option>DKK</option>
                                                  <option>DOP</option>
                                                  <option>DZD</option>
                                                  <option>EGP</option>
                                                  <option>ETB</option>
                                                  <option>EUR</option>
                                                  <option>FJD</option>
                                                  <option>FKP</option>
                                                  <option>GBP</option>
                                                  <option>GEL</option>
                                                  <option>GHS</option>
                                                  <option>GIP</option>
                                                  <option>GMD</option>
                                                  <option>GNF</option>
                                                  <option>GTQ</option>
                                                  <option>GYD</option>
                                                  <option>HKD</option>
                                                  <option>HNL</option>
                                                  <option>HRK</option>
                                                  <option>HTG</option>
                                                  <option>HUF</option>
                                                  <option>IDR</option>
                                                  <option>ILS</option>
                                                  <option>INR</option>
                                                  <option>IQD</option>
                                                  <option>IRR</option>
                                                  <option>ISK</option>
                                                  <option>JEP</option>
                                                  <option>JMD</option>
                                                  <option>JOD</option>
                                                  <option>JPY</option>
                                                  <option>KES</option>
                                                  <option>KGS</option>
                                                  <option>KHR</option>
                                                  <option>KMF</option>
                                                  <option>KPW</option>
                                                  <option>KRW</option>
                                                  <option>KWD</option>
                                                  <option>KYD</option>
                                                  <option>KZT</option>
                                                  <option>LAK</option>
                                                  <option>LBP</option>
                                                  <option>LKR</option>
                                                  <option>LRD</option>
                                                  <option>LSL</option>
                                                  <option>LTL</option>
                                                  <option>LVL</option>
                                                  <option>LYD</option>
                                                  <option>MAD</option>
                                                  <option>MDL</option>
                                                  <option>MGA</option>
                                                  <option>MKD</option>
                                                  <option>MMK</option>
                                                  <option>MNT</option>
                                                  <option>MOP</option>
                                                  <option>MRO</option>
                                                  <option>MUR</option>
                                                  <option>MVR</option>
                                                  <option>MWK</option>
                                                  <option>MXN</option>
                                                  <option>MYR</option>
                                                  <option>MZN</option>
                                                  <option>NAD</option>
                                                  <option selected="selected" >NGN</option>
                                                  <option>NIO</option>
                                                  <option>NOK</option>
                                                  <option>NPR</option>
                                                  <option>NZD</option>
                                                  <option>OMR</option>
                                                  <option>PAB</option>
                                                  <option>PEN</option>
                                                  <option>PGK</option>
                                                  <option>PHP</option>
                                                  <option>PKR</option>
                                                  <option>PLN</option>
                                                  <option>PYG</option>
                                                  <option>QAR</option>
                                                  <option>RON</option>
                                                  <option>RSD</option>
                                                  <option>RUB</option>
                                                  <option>RWF</option>
                                                  <option>SAR</option>
                                                  <option>SBD</option>
                                                  <option>SCR</option>
                                                  <option>SDG</option>
                                                  <option>SEK</option>
                                                  <option>SGD</option>
                                                  <option>SHP</option>
                                                  <option>SLL</option>
                                                  <option>SOS</option>
                                                  <option>SRD</option>
                                                  <option>STD</option>
                                                  <option>SVC</option>
                                                  <option>SYP</option>
                                                  <option>SZL</option>
                                                  <option>THB</option>
                                                  <option>TJS</option>
                                                  <option>TMT</option>
                                                  <option>TND</option>
                                                  <option>TOP</option>
                                                  <option>TRY</option>
                                                  <option>TTD</option>
                                                  <option>TWD</option>
                                                  <option>TZS</option>
                                                  <option>UAH</option>
                                                  <option>UGX</option>
                                                  <option>USD</option>
                                                  <option>UYU</option>
                                                  <option>UZS</option>
                                                  <option>VEF</option>
                                                  <option>VND</option>
                                                  <option>VUV</option>
                                                  <option>WST</option>
                                                  <option>XAF</option>
                                                  <option>XCD</option>
                                                  <option>XDR</option>
                                                  <option>XOF</option>
                                                  <option>XPF</option>
                                                  <option>YER</option>
                                                  <option>ZAR</option>
                                                  <option>ZMK</option>
                                                  <option>ZWL</option>
                                             </select>
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Price <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                             <input type="text" name="product_price"  class="form-control col-md-7 col-xs-12">
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Product Description <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                             <textarea class="form-control" name="product_description"></textarea>
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
<!-- /page content -->
<!-- footer content -->
<?php $this->load->view('includes/footer');?>
<!-- /footer content -->
</div>
</div>
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
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.12.0/validate.min.js"></script>
<script>
     $("#myProducsForm").validate({
     rules: {
       name: "required",
       email: {
         required: true,
         email: true
       }
     },
     messages: {
       name: "Please specify your name",
       email: {
         required: "We need your email address to contact you",
         email: "Your email address must be in the format of name@domain.com"
       }
     }
     });
</script>
<!-- <script type="text/javascript">
     $(function () {
       $('#myProducsForm').parsley().on('field:validated', function() {
         var ok = $('.parsley-error').length === 0;
         $('.bs-callout-info').toggleClass('hidden', !ok);
         $('.bs-callout-warning').toggleClass('hidden', ok);
       })
       .on('form:submit', function() {
         return false; // Don't submit form for this demo
       });
     });
     </script> -->
<!-- jQuery -->
<script src="<?php echo base_url();?>/assets/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<!--     <script src="<?php echo base_url();?>/assets/vendors/fastclick/lib/fastclick.js"></script>
     -->    <!-- NProgress -->
<!-- <script src="<?php echo base_url();?>/assets/vendors/nprogress/nprogress.js"></script> -->
<!-- Chart.js -->
<!-- <script src="<?php echo base_url();?>/assets/vendors/Chart.js/dist/Chart.min.js"></script> -->
<!-- gauge.js -->
<!-- <script src="<?php echo base_url();?>/assets/vendors/gauge.js/dist/gauge.min.js"></script> -->
<!-- bootstrap-progressbar -->
<!-- <script src="<?php echo base_url();?>/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> -->
<!-- iCheck -->
<!-- <script src="<?php echo base_url();?>/assets/vendors/iCheck/icheck.min.js"></script>
     --><!-- Skycons -->
<!-- <script src="<?php echo base_url();?>/assets/vendors/skycons/skycons.js"></script>
     --><!-- Flot -->
<!-- <script src="<?php echo base_url();?>/assets/vendors/Flot/jquery.flot.js"></script>
     <script src="<?php echo base_url();?>/assets/vendors/Flot/jquery.flot.pie.js"></script>
     <script src="<?php echo base_url();?>/assets/vendors/Flot/jquery.flot.time.js"></script>
     <script src="<?php echo base_url();?>/assets/vendors/Flot/jquery.flot.stack.js"></script>
      --><!-- <script src="<?php echo base_url();?>/assets/vendors/Flot/jquery.flot.resize.js"></script>
     --><!-- Flot plugins -->
<!--     <script src="<?php echo base_url();?>/assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
     <script src="<?php echo base_url();?>/assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
     <script src="<?php echo base_url();?>/assets/vendors/flot.curvedlines/curvedLines.js"></script>
     -->    <!-- DateJS -->
<!-- <script src="<?php echo base_url();?>/assets/vendors/DateJS/build/date.js"></script> -->
<!-- JQVMap -->
<script src="<?php echo base_url();?>/assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="<?php echo base_url();?>/assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?php echo base_url();?>/assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url();?>/assets/vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>/assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?php echo base_url();?>/assets/build/js/custom.min.js"></script>
<!-- <script src="jquery.js"></script>
     <script src="parsley.min.js"></script> -->
</body>
</html>