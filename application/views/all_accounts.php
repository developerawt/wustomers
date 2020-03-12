<?php $this->load->view('includes/side_bar');?>
<?php $this->load->view('includes/header');?>
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
                  <h4 class="card-title">All Accounts</h4>
                  <!-- <p class="card-description">
                    
                  </p> -->
                   <div class="table-responsive">
                    <table id="datatables" class="table table-bordered">
                      <thead>
                        <tr>
                         
                          <th>S.no</th>
                          <th>Admin Name</th>
                          <th>Email  </th>
                          <th>Phone</th>
                          <th>Country Name</th>
                          <th>State Name</th> 
                          <th>City Name </th>
                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php $count=1;
                          foreach($admins as $admins){
                          
                        ?>
                        <tr>
                           <td><?php echo $count ; ?></td>
                          <td><?php echo $admins->admin_name ; ?></td>
                          <td><?php echo $admins->email_id ; ?></td>
                          <td><?php echo $admins->mobile_number ; ?></td> 
                           <td><?php echo $admins->country_name ; ?></td>
                           <td><?php echo $admins->state_name ; ?></td> 
                           <td><?php echo $admins->city_name ; ?></td> 
                        
                          <td> 
                          <button class="btn btn-warning" id="<?php echo $admins->admin_id;?>" onclick="delete_admin()"><i class="fa fa-edit"></i></</button>
                           <button class="btn btn-warning" onclick="" ><i class="fa fa-trash"></i></button>
                            </td>
                          
                           
                        </tr>
                          <?php $count++; } ?>
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

        <?php $this->load->view('includes/footer');?>
        
 <script>
   $(document).ready(function(){

 function delete_admin(id){

       $.ajax({
        type: "POST",
        url: "<?php echo site_url('ajax/delete_admin_by_id')?>",
        data:id,
        success: function(response) {
        if (response == "Success")
          {
            $(btn).closest('tr').fadeOut("slow");
          }
          else
          {
            alert("Error");
          }

        }
      });
     event.preventDefault();
  };
 
}
 </script>