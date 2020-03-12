<?php $this->load->view('includes/supadmin_side_bar');?>
<?php $this->load->view('includes/supadmin_header');?>

<style type="text/css">
  .card{
    width: 650px;
    margin: 0 auto;
    background: #ececec;
    padding: 20px;
    border-radius: 10px;
    margin-top: 40px;
}
.adTitle{
    padding: 10px;
    font-size: 15px;
    font-family: 'Roboto', sans-serif;
    color: #000;
}

.adImgs{
  padding: 10px;
  text-align: center;
}
.adImgs2{
  padding: 10px;
  text-align: left;
}

.adImgs img, .adImgs2 img{
  cursor: pointer;
}

.colms{
    float: right; 
    font-size:15px;
    font-family: 'Roboto', sans-serif;
    color: #000;
  }

.material-switch > input[type="checkbox"] {
  display: none;   
}

.material-switch > label {
    cursor: pointer;
    height: 0px;
    position: relative; 
    width: 40px;  
}

.material-switch > label::before {
    background: rgb(0, 0, 0);
    box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
    border-radius: 8px;
    content: '';
    height: 16px;
    margin-top: -8px;
    position:absolute;
    opacity: 0.3;
    transition: all 0.4s ease-in-out;
    width: 40px;
}
.material-switch > label::after {
    background: rgb(255, 255, 255);
    border-radius: 16px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
    content: '';
    height: 24px;
    left: -4px;
    margin-top: -8px;
    position: absolute;
    top: -4px;
    transition: all 0.3s ease-in-out;
    width: 24px;
}
.material-switch > input[type="checkbox"]:checked + label::before {
    background: inherit;
    opacity: 0.5;
}
.material-switch > input[type="checkbox"]:checked + label::after {
    background: inherit;
    left: 20px;
}
.label-success {
    background-color: #00E22B;
}
.bowlImg{
  width: 25px;
}
</style>

<div class="right_col" role="main" style="height: 100vh;">

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

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <h4 class="card-title"><?=$admin_data->shop_name ;?></h4>
            <div class="col-md-6 adTitle">
              Date Registered
            </div>
            <div class="col-md-6 adTitle">
              <?php echo date("d-m-y", strtotime($admin_data->created_on)); ?>
            </div>
            <div class="col-md-6 adTitle">
              Date Subscribed
            </div>
            <div class="col-md-6 adTitle">
              <?php echo date("d-m-y", strtotime($admin_data->created_on)); ?>
            </div>
            <div class="col-md-6 adTitle">
              Subscription Expiry Date
            </div>
            <div class="col-md-6 adTitle">
              <?php echo date("d-m-y", strtotime($admin_data->created_on)); ?>
            </div>
            <div class="col-md-6 adTitle">
              Number of Visitors
            </div>
            <div class="col-md-6 adTitle">
              <?php echo $admin_data->visitor_count; ?>
            </div>
            <div class="col-md-6 adTitle">
              Number of Enquiries
            </div>
            <div class="col-md-6 adTitle">
              <?php echo $admin_data->enquiry_count; ?>
            </div>
            <div class="col-md-6 adTitle">
              Store Link
            </div>
            <div class="col-md-6 adTitle">
              <a href="<?php echo $admin_data->admin_link; ?>" target="_blank" >www.wustor...</a>
            </div>
            <div class="col-md-6 adTitle">
              Subscription status
            </div>
            <div class="col-md-6 adTitle">
              <div class="col-md-6" id="subTxt<?=$admin_data->admin_id?>">
                  <?php echo ($admin_data->payment_status == 1 ? "<span style='color:#00E22B'>Subscribed</span>" : "<span style='color:#F52929'>Not Subscribed</span>"); ?>
              </div>
              <div class="col-md-6">
                <div class="colms c7">
                      <div class="material-switch" id="sub<?=$admin_data->admin_id?>">
                        <input onclick="subscription(<?=$admin_data->admin_id?>,<?=$admin_data->payment_status?>)" id="subscribe<?=$admin_data->admin_id?>" name="subscribe<?=$admin_data->admin_id?>" type="checkbox" <?php echo ($admin_data->payment_status == 1 ? 'checked':''); ?> >
                        <label for="subscribe<?=$admin_data->admin_id?>" class="label-success"></label>
                      </div>
                    </div>
              </div>
            </div>

            <div class="col-md-6 adImgs">
              <?php 
                if($admin_data->status == 'active'){
                    $imgUrl =  site_url('/assets/images/pause.png');
                } 
                else{
                  $imgUrl = site_url('/assets/images/play.png');
                }
              ?>
              <img onclick="manageStatus(<?=$admin_data->admin_id?>,'<?=$admin_data->status?>')" class="bowlImg" 
              src="<?php echo $imgUrl; ?>"
              >
            </div>
            <div style="display: <?php echo ($admin_data->payment_status == 1 ? 'none':''); ?>" class="col-md-6 adImgs2" id="deleteBtn">
              <img onclick="deleteStore(<?=$admin_data->admin_id?>)" class="bowlImg" src="<?php echo site_url('/assets/images/trash.png') ?>">
            </div>


            <div class="clearfix"></div>
          </div>
      </div>
    </div>
</div>
        <!-- /page content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<?php $this->load->view('includes/footer');?>


<script type="text/javascript">
function manageStatus(adminId,status){

    $.ajax({
      method:"POST",
      data:{ adminId:adminId, status:status },  
      url: "<?php echo site_url('ajax/updateStatus')?>",
      success: function(data) {     
            location.reload();
       }
    });          
}

function subscription(adminId,subStatus){
    
    //$('#loading').show();
    $.ajax({
      method:"POST",
      data:{ adminId:adminId, subStatus:subStatus },  
      url: "<?php echo site_url('ajax/updateSubscription')?>",
      success: function(data) {
            
            $('#sub'+adminId).html(data);
            
            if(subStatus == 1){
              $('#subTxt'+adminId).html("<span style='color:#F52929'>Not Subscribed</span>");
              $('#deleteBtn').show();
              
            }
            else{
               $('#subTxt'+adminId).html("<span style='color:#00E22B'>Subscribed</span>");
               $('#deleteBtn').hide();
            }
       }
    });          
}


function deleteStore(adminId){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this Store!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: "<?php echo site_url('ajax/deleteStore')?>", 
                data : { 'adminId':adminId },
                type: 'POST',
                success: function(result){
                  window.location.href = "<?=site_url('superadmin/all_admins')?>";
                }
            });
        } 
    });
}
</script>