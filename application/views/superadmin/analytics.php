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

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <h4 class="card-title">ANALYTICS</h4>
            <div class="col-md-6 adTitle">
              Total Sign ups
            </div>
            <div class="col-md-6 adTitle">
              <?=$totalStore?>
            </div>
            <div class="col-md-6 adTitle">
              Total WhatsApp Link Hits
            </div>
            <div class="col-md-6 adTitle">
              <?=$whatsAppLinkHits?>
            </div>
            <div class="col-md-6 adTitle">
              Total Pro Subscribers
            </div>
            <div class="col-md-6 adTitle">
              <?=$subscribeStore?>
            </div>
            <div class="clearfix"></div>
          </div>
      </div>
    </div>
</div>
        <!-- /page content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<?php $this->load->view('includes/footer');?>