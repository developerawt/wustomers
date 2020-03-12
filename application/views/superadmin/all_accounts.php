<?php $this->load->view('includes/supadmin_side_bar');?>
<?php $this->load->view('includes/supadmin_header');?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">
  .colms{
    float: left; 
    padding: 10px;
    font-size:15px;
    font-family: 'Roboto', sans-serif;
    color: #000;
  }
  .c1{ width: 12.5%; }
  .c2{ width: 12.5%; }
  .c3{ width: 12.5%; }
  .c4{ width: 12.5%; }
  .c5{ width: 12.5%; }
  .c6{ width: 12.5%; }
  .c7{ width: 12.5%; }
  .c8{ width: 12.5%; }

  .stores{
    background: #e6e6e6;
    border-radius: 8px;
    margin: 10px 0px;
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
@media only screen and (max-width: 768px) {
  .c2, .c3, .c5, .c6{
    display: none;
  }
  .c4, .c7 {
    width: 30.5%;
  }
}
</style>
        <!-- page content -->
        <div class="right_col" role="main" style="height: 100vh;">


       <!-- <form method="post" action="<?php echo base_url('admin/all_del_and_suspend');?>"> -->
        <?php if($this->session->flashdata('delete_message')){ ?>
        <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php echo $this->session->flashdata('delete_message');?> </strong> 
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

        
             <div class="col-lg-12 grid-margin stretch-card">
             <!-- <button onclick=""  class="btn btn-primary" style="float: right;">Add </button> -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">ALL STORES</h4>
                    

                  <div class="col-md-12">
                    
                    <div class="col-md-4" id="actionButton" style="visibility: hidden;">
                    
                    <div class="col-md-2">
                     
                        <img onclick="pauseShop();" style="width: 25px;" class="bowlImg" src="<?php echo base_url(); ?>assets/images/pause.png">
                      
                    </div>

                    <div class="col-md-2">
                      
                        <img onclick="trashShop();" style="width: 25px;" class="bowlImg" src="<?php echo base_url(); ?>assets/images/trash.png">
                      
                    </div>
                    
                    </div>

                    <div class="col-md-3">
                      <select class="form-control" id="ob">
                      <option value="">-- Order By --</option>
                      
                      <option <?php echo (encoding('created_on') == $by) ? 'selected' : ''; ?> value="<?php echo encoding('created_on'); ?>">date registered</option>
                      
                      <option <?php echo (encoding('created_on') == $by) ? 'selected' : ''; ?> value="<?php echo encoding('created_on'); ?>">date subscribed</option>
                      
                      <option <?php echo (encoding('visitor_count') == $by) ? 'selected' : ''; ?> value="<?php echo encoding('visitor_count'); ?>">number of visitors</option>
                      
                      <option <?php echo (encoding('payment_status') == $by) ? 'selected' : ''; ?> value="<?php echo encoding('payment_status'); ?>">subscription status</option>
                      
                      <option <?php echo (encoding('shop_name') == $by) ? 'selected' : ''; ?> value="<?php echo encoding('shop_name'); ?>">Shop name</option>

                      
                      </select>
                    </div>
                    <div class="col-md-3">
                      <select class="form-control" id="ot">
                      <option value="">-- Order Type --</option>
                      
                      <option <?php echo (encoding('asc') == $type) ? 'selected' : ''; ?> value="<?php echo encoding('asc'); ?>">Ascending</option>
                      
                      <option <?php echo (encoding('desc') == $type) ? 'selected' : ''; ?> value="<?php echo encoding('desc'); ?>">Descending</option>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <button onclick="sortData();"  class="form-control" style="background-color: #0085ffc4; color: #FFFFFF;" type="button">Sort</button>
                    </div>
                  </div>


                  <script type="text/javascript">
                    function sortData(){
                      var e = document.getElementById("ob");
                      var ob = e.options[e.selectedIndex].value;
                      var ee = document.getElementById("ot");
                      var ot = ee.options[ee.selectedIndex].value;
                      var new_url = location.href.substring(0, location.href.indexOf('?'));
                      location.href = new_url+'?by='+ob+"&type="+ot;
                    }
                   
                  </script>


                  <div class="row">

                    <div class="colms c1">#</div>
                    <div class="colms c2">Date Registered</div>
                    <div class="colms c3">Last Subscribed</div>
                    <div class="colms c4">Name</div>
                    <div class="colms c5">Number of Visitors</div>
                    <div class="colms c6">Store Link</div>
                    <div class="colms c7">Subscription Status</div>
                    <div class="colms c8">Subscribe</div>

                  </div>
                  <?php 
                    $count=1;
                    if(is_array($admins) || is_object($admins)){ 
                      //echo"<pre>";
                      //print_r($admins);
                    foreach($admins as $admins){
                  ?>
                  <div id="<?php echo 'div'.$admins->admin_id; ?>" class="row stores">
                    <div class="colms c1">
                        <input id="checkbox<?php echo $admins->admin_id; ?>" type="checkbox" class="userSelect" name="userSelect[]" value="<?php echo $admins->admin_id; ?>" <?php echo ($admins->payment_status == 1 ? 'disabled':''); ?> >
                      </div>

                      
                    <a href="<?=site_url('superadmin/update_details')."/".$admins->admin_id?>"> 
                      
                      

                      <div class="colms c2"><?php echo date("d-m-y", strtotime($admins->created_on)); ?></div>
                      <div class="colms c3"><?php echo ($admins->payment_status == 1) ?  date("d-m-y", strtotime($admins->created_on)) : 'NA'; ?></div>
                      <div class="colms c4"><?php echo $admins->shop_name; ?></div>
                      <div class="colms c5"><?php echo $admins->visitor_count; ?></div>
                    </a>
                    <div class="colms c6"><a href="<?php echo $admins->admin_link; ?>" target="_blank" >www.wustor...</a></div>
                    <div class="colms c7" id="subTxt<?=$admins->admin_id?>"><?php echo ($admins->payment_status == 1 ? "<span style='color:#00E22B'>Subscribed</span>" : "<span style='color:#F52929'>Not Subscribed</span>"); ?></div>
                    <div class="colms c8">
                      <div class="material-switch" id="sub<?=$admins->admin_id?>">
                        <input onclick="subscription(<?=$admins->admin_id?>,<?=$admins->payment_status?>)" id="subscribe<?=$admins->admin_id?>" name="subscribe<?=$admins->admin_id?>" type="checkbox" <?php echo ($admins->payment_status == 1 ? 'checked':''); ?> >
                        <label for="subscribe<?=$admins->admin_id?>" class="label-success"></label>
                      </div>
                    </div>
                    <!--
                    <a href="<?=site_url('superadmin/update_details')."/".$admins->admin_id?>"  class="btn btn-warning"><i class="fa fa-edit"></i> </a>
                           <a class="btn btn-warning" id="<?=$admins->admin_id?>" onclick="delete_admin(this.id)" ><i class="fa fa-trash"></i></a>
                    -->       
                  </div>
                  <?php $count++; }}else{ ?>
                    <div style="text-align: center; width: 100%;color: red;">NO DATA FOUND</div>
                  <?php } ?>
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

        <?php $this->load->view('includes/supadmin_footer');?>
        
 <script>
 
   
 function delete_admin(admin_id){

alert(admin_id);

   if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
        method:"POST",
        data:{admin_id:admin_id},  
        url: "<?php echo site_url('ajax/delete_admin_by_id')?>",
        success: function(success) {
              window.location.reload();
         }
       });
     event.preventDefault(); 
  };
 }
 
 function subscription(adminId,subStatus){
    
    //$('#loading').show();
    $.ajax({
      method:"POST",
      data:{ adminId:adminId, subStatus:subStatus },  
      url: "<?php echo site_url('ajax/updateSubscription')?>",
      success: function(data) {
            
            $('#sub'+adminId).html(data);


            $('#checkbox'+adminId).prop('checked', false); // Not Works Here
            $('#actionButton').css('visibility','hidden');
            var atLeastOneIsChecked = $('input[name="userSelect[]"]:checked').length;
            if(atLeastOneIsChecked > 0){
              $('#actionButton').css('visibility','visible');
            }
            
            

            if(subStatus == 1){
              $('#subTxt'+adminId).html("<span style='color:#F52929'>Not Subscribed</span>");
              $('#checkbox'+adminId).removeAttr("disabled");

            }
            else{
               $('#subTxt'+adminId).html("<span style='color:#00E22B'>Subscribed</span>");
               $('#checkbox'+adminId).attr("disabled", true);
            }
       }
    });          
}

$('.userSelect').click(function() {
  $('#actionButton').css('visibility','hidden');
  var atLeastOneIsChecked = $('input[name="userSelect[]"]:checked').length;
  if(atLeastOneIsChecked > 0){
    $('#actionButton').css('visibility','visible');
  }
});

function pauseShop(){
  
  //var userSelect = [];
  var i = 1;
  $.each($("input[name='userSelect[]']:checked"), function(){
      //userSelect.push($(this).val());
      manageStatus($(this).val(),'active',i);
      //location.reload();
      i++;
  });
  //console.log(userSelect);
}

  function trashShop(){
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this Store!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        //var userSelect = [];
        $.each($("input[name='userSelect[]']:checked"), function(){
          //userSelect.push($(this).val());
          deleteStore($(this).val())
        });
        $('#actionButton').css('visibility','hidden');
        //console.log(userSelect);
      } 
    });
  }

function deleteStore(adminId){
    //alert(adminId);
    //return true;
    $.ajax({
        url: "<?php echo site_url('ajax/deleteStore')?>", 
        data : { 'adminId':adminId },
        type: 'POST',
        success: function(result){
          $('#div'+adminId).hide();
          //window.location.href = "<?=site_url('superadmin/all_admins')?>";
        }
    });
        
}

function manageStatus(adminId,status,i){
    var atLeastOneIsChecked = $('input[name="userSelect[]"]:checked').length;
    $.ajax({
      method:"POST",
      data:{ adminId:adminId, status:status },  
      url: "<?php echo site_url('ajax/updateStatus')?>",
      success: function(data) { 
          if(i == atLeastOneIsChecked){ 
            location.reload();
          }
       }
    });          
}

 </script>

