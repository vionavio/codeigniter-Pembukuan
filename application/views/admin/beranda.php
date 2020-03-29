<!DOCTYPE html>
<html>
  <head>
    <title>Beranda</title>
    <link href="<?php echo base_url('assets/css/bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.js')?>" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
  </head>
  <body>
        <?php $this->load->view('menu');?> 

        <div id="content">
      <table>
        <tr>
        <td><button style="margin-top: 0px;" type="button" id="sidebarCollapse" class="btn btn-success navbar-btn">
        <i class="glyphicon glyphicon-align-left"></i> &nbsp; 
        </button> </td><td style=" padding-right: 10px;"></td><td style=" text-align: right; color: #02510f;">
        <?php echo date('l, d  M  Y'); ?></td>
        </tr>
      </table>

          <center><h2>Welcome <?php echo $this->session->userdata('ses_nama'); ?></h2></center>
        </div>

      </div>
                 <?php $this->load->view('frontend/footer');?> 

    <script src="<?php echo base_url('assets/js/jquery.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
             <!--     <?php $this->load->view('frontend/footer');?>  -->

</body>
</html>
