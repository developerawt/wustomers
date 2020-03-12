<?php $this->load->view('includes/side_bar');?>
<?php $this->load->view('includes/header');?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://app.wustomers.com/assets/crop/js/cropzee.js" defer></script>
<label style="display: none;" id="hideImage" for="cropzee-input" class="image-previewer" data-cropzee="cropzee-input"></label>

         <!-- page content -->
 <div class="right_col" role="main">
  <?php if(validation_errors()) { ?>
<div class="alert alert-warning">
<?php echo validation_errors(); ?>
</div>
<?php } ?>
 

        <?php if($this->session->flashdata('user_registration_error')){ ?>
        <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php echo  $this->session->flashdata('user_registration_error');?> </strong> 
                </div>
                <?php } ?>
        <?php if($this->session->flashdata('data_update')){ ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><?php echo  $this->session->flashdata('data_update');?> </strong> 
        </div>
        <?php } ?>

        <?php if($this->session->flashdata('errorss')){ ?>
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><?php echo  $this->session->flashdata('errorss');?> </strong> 
        </div>
        <?php } ?>

       
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Update Products</h3>
              </div>
              
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    
                  </div>
                </div>
              </div>
            </div>

            <?php 
 
            $admin_id =$this->session->userdata('admin_id');

        ?>
                 
            
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
              <form id="myProducsForm" method="post" enctype="multipart/form-data" action="<?php echo site_url('admin/edit_product')."/".$product->product_id; ;?>" class="form-horizontal form-label-left">
                    
                <input type="hidden" name="admin_id" value="<?=$admin_id?>"/>
                <input type="hidden" name="hdn_id" value="<?=$product->product_id?>"/>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Name <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="product_name" value="<?=$product->product_name ;?>"  class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Image <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">

                      <input type="hidden" value="" id="Business_logo_url" name="product_image_url">

                      <input type="hidden" name="old_image" value="<?=$product->product_image?>">
                      <input id="cropzee-input" type="file" name="product_image" class="form-control col-md-7 col-xs-12">
                      <span><img id="imagePreview" src="<?php echo base_url('shop/product_images/').$product->product_image ; ?>"  style="width:82px; height: 70px;float: right;" ></span>
                    </div>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Price <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="product_price" value="<?=$product->product_price?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Currency<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
  <select name="product_quantity" class="form-control col-md-7 col-xs-12">
<option><?=$product->product_quantity?></option>
<option>AED</option><option>AFN</option><option>ALL</option><option>AMD</option><option>ANG</option><option>AOA</option><option>ARS</option><option>AUD</option><option>AWG</option><option>AZN</option><option>BAM</option><option>BBD</option><option>BDT</option><option>BGN</option><option>BHD</option><option>BIF</option><option>BMD</option><option>BND</option><option>BOB</option><option>BRL</option><option>BSD</option><option>BTN</option><option>BWP</option><option>BYR</option><option>BZD</option><option>CAD</option><option>CDF</option><option>CHF</option><option>CLF</option><option>CLP</option><option>CNY</option><option>COP</option><option>CRC</option><option>CUP</option><option>CVE</option><option>CZK</option><option>DJF</option><option>DKK</option><option>DOP</option><option>DZD</option><option>EGP</option><option>ETB</option><option>EUR</option><option>FJD</option><option>FKP</option><option>GBP</option><option>GEL</option><option>GHS</option><option>GIP</option><option>GMD</option><option>GNF</option><option>GTQ</option><option>GYD</option><option>HKD</option><option>HNL</option><option>HRK</option><option>HTG</option><option>HUF</option><option>IDR</option><option>ILS</option><option>INR</option><option>IQD</option><option>IRR</option><option>ISK</option><option>JEP</option><option>JMD</option><option>JOD</option><option>JPY</option><option>KES</option><option>KGS</option><option>KHR</option><option>KMF</option><option>KPW</option><option>KRW</option><option>KWD</option><option>KYD</option><option>KZT</option><option>LAK</option><option>LBP</option><option>LKR</option><option>LRD</option><option>LSL</option><option>LTL</option><option>LVL</option><option>LYD</option><option>MAD</option><option>MDL</option><option>MGA</option><option>MKD</option><option>MMK</option><option>MNT</option><option>MOP</option><option>MRO</option><option>MUR</option><option>MVR</option><option>MWK</option><option>MXN</option><option>MYR</option><option>MZN</option><option>NAD</option><option>NGN</option><option>NIO</option><option>NOK</option><option>NPR</option><option>NZD</option><option>OMR</option><option>PAB</option><option>PEN</option><option>PGK</option><option>PHP</option><option>PKR</option><option>PLN</option><option>PYG</option><option>QAR</option><option>RON</option><option>RSD</option><option>RUB</option><option>RWF</option><option>SAR</option><option>SBD</option><option>SCR</option><option>SDG</option><option>SEK</option><option>SGD</option><option>SHP</option><option>SLL</option><option>SOS</option><option>SRD</option><option>STD</option><option>SVC</option><option>SYP</option><option>SZL</option><option>THB</option><option>TJS</option><option>TMT</option><option>TND</option><option>TOP</option><option>TRY</option><option>TTD</option><option>TWD</option><option>TZS</option><option>UAH</option><option>UGX</option><option>USD</option><option>UYU</option><option>UZS</option><option>VEF</option><option>VND</option><option>VUV</option><option>WST</option><option>XAF</option><option>XCD</option><option>XDR</option><option>XOF</option><option>XPF</option><option>YER</option><option>ZAR</option><option>ZMK</option><option>ZWL</option></select>
</div>
                      </div>
                       
                       
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Product Description <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <textarea class="form-control" name="product_description"><?=$product->product_description?></textarea>
                         
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