<?php $this->load->view('includes/side_bar');?>
<?php $this->load->view('includes/header');?>
<!-- page content -->
<div class="right_col" role="main" style="height:100vh;">
	
   <!-- <form method="post" action="<?php echo base_url('admin/all_del_and_suspend');?>"> -->
   <?php if($this->session->flashdata('delete_message')){ ?>
   <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong><?php echo $this->session->flashdata('delete_message');?> </strong> 
   </div>
   <?php } ?>

   


   <?php if($this->session->flashdata('Payemnt')){ ?>
   <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong><?php echo $this->session->flashdata('Payemnt');?> </strong> 
   </div>
   <?php } ?>

   <?php if($this->session->flashdata('suspend_message')){ ?>
   <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong><?php echo $this->session->flashdata('suspend_message');?> </strong> 
   </div>
   <?php } ?>


   <div id='suspend_div' class="alert alert-success alert-dismissible" style="display:none; ">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Data Successfully Suspended </strong> 
   </div>
   <div id='result' class="alert alert-success alert-dismissible" style="display:none; ">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Data Successfully Activated </strong> 
   </div>
   <div class="">
      <div class="page-title">
         <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            </div>
         </div>
      </div>
      <div class="main-panel">
         <div class="content-wrapper">
            <div class=" stretch-card">
               <!-- <button onclick=""  class="btn btn-primary" style="float: right;">Add </button> -->
               <div class="card">
                  <div class="card-body">
                     <h4 class="card-title">All Products</h4>
                      
             <?php if($products==0 ){
              echo "";
            }else{ ?>
               <p class="text-center" > Your PWA/Shop Link </p>
      <h5 class="text-center">  
      <a href="<?php echo $products[0]->admin_link; ?>" class="text-left"style="margin-left: -8px; font-size: 12px; line-height: 32px;" >
                <?php  echo $products[0]->admin_link; ?></a>
            <a class="copy_text"  data-toggle="tooltip" title="Copy to Clipboard" href="<?php  echo $products[0]->admin_link; ?>">
          <span class="icon link"><i class="fa fa-link"></i></span>Copy Link</a>
         <button id="btn-share">Share</button></h5>
<?php } ?>
        <!-- <p class="card-description">
                        </p> -->
                     <div class="table-responsive">
                        <table id="datatables" class="table table-bordered table-responsive">
                           <thead>
                              <tr>
                                 <th>S.no</th>
                                 <th>Product Name</th>
                                 <th>Product Description</th>
                                 <th>Currency </th>
                                 <th>Product Price</th>
                                 <th>Image</th>
                                 <!-- <th>Add More Image</th> -->
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php 
                               
                                 $count=1;
                                 if (is_array($products)|| is_object($products) || !empty($products) ) {
                                    foreach(@$products as $products){
                                  ?>
                              <tr>
                                 <td><?php echo $count ; ?></td>
                                 <td><?php echo $products->product_name ; ?></td>
                                 <td><?php echo $products->product_description ; ?></td>
                                 <td><?php echo $products->product_quantity ; ?></td>
                                 <td><?php echo $products->product_price ; ?></td>
                                 <td><img src="<?php echo base_url('/shop/product_images/').$products->product_image ; ?>" style="width:82px; height: 70px;" ></td>
                                 <!--  <td class="trash-butt" ><a  href="<?php // echo site_url('shop/add_images')."/".$products->product_id;?>" class="btn btn-success">
                            <i class="fa fa-picture-o">+</i></</a> </td> -->
                                  <td class="trash-butt" > 
                          <a class="btn btn-warning" href="<?php echo site_url('admin/edit_product')."/".$products->product_id ;?>" id="" ><i class="fa fa-edit "></i></a>
                          
                          <button class="btn btn-warning" id="<?php echo $products->product_id;?>" onclick="delete_admin(this.id)"><i class="fa fa-trash"></i></</button>

                           
                            </td>
                              </tr>
                              <?php $count++; } }else{ ?>


                              <tr>
                                 <td colspan="7"  >No Data Found </td>
                              </tr>
                              <?php   } ?>
                              <!-- </form> -->
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="clearfix"></div>
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
<script type="text/javascript">


   $('.copy_text').click(function (e) {
      e.preventDefault();
      var copyText = $(this).attr('href');
      document.addEventListener('copy', function(e) {
       e.clipboardData.setData('text/plain', copyText);
       e.preventDefault();
      }, true);
      document.execCommand('copy');  
      console.log('copied text : ', copyText);
      alert('copied text: ' + copyText); 
    });
</script>
<script>
    var str = $( ".fdsafas" ).text();
$( ".fdsafas" ).html( str );
    window.addEventListener('load', function() {
      document.getElementById('btn-share').addEventListener('click', function() {
      navigator.share({
        title: 'My Shop',
        text: 'Please Visit My Shop',
        url: str,
      });
    });
  });

</script>
<script>
 
   
 function delete_admin(product_id){
   if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
        method:"POST",
        data:{product_id:product_id},  
        url: "<?php echo site_url('ajax/delete_product_by_id')?>",
        success: function(success) {
              window.location.reload();
         }
       });
     event.preventDefault(); 
  };
 }
 
 </script>
