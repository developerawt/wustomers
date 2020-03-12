<?php $this->load->view('includes/supadmin_side_bar');?>
<?php $this->load->view('includes/supadmin_header');?>
<style type="text/css">
  .tile_count .tile_stats_count .count_top{
    font-size:15px;
    font-family: 'Roboto', sans-serif;
    color: #000;
  }
  .tile_count {
    margin-bottom: 20px;
    margin-top: 70px;
    clear: both;
  }
</style>
<!-- page content -->
<div class="right_col" role="main">
  <!-- top tiles -->
  <div class="row tile_count">
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top">Total Stores</span>
        <div class="count blue"><?=$totalStore?></div>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top">Subscribed Stores</span>
        <div class="count green"><?=$subscribeStore?></div>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top">Unsubscribed Stores</span>
        <div class="count red"><?=$unSubscribeStore?></div>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top">Active Stores</span>
        <div class="count green"><?=$activeStore?></div>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top">Inactive Stores</span>
        <div class="count red"><?=$inActiveStore?></div>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top">Lorem Ipsum</span>
        <div class="count">N/A</div>
      </div>
  </div>
<!-- /top tiles -->
</div>
<!-- /page content -->

<?php $this->load->view('includes/supadmin_footer');?>