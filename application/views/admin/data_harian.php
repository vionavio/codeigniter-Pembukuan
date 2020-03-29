<!DOCTYPE html>
<html>
  <head>
    <title>Data Wisatawan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>">
    <link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
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
    </table>&nbsp; &nbsp;
    
        <div  class=" container ">
          <center><h4>Data Wisatawan</h4></center>
          <div class="col-md-12 text-right" style=" padding-bottom: 3px; ">
            <a class="btn btn-default" href="<?php echo base_url(); ?>admin/add_wisatawan"><i class="glyphicon glyphicon-plus "></i> Tambah Data</a> </div>
            <div class="col-md-12">
          <div class="box box-primary">
        <table id="table1" class="table table-hover table-responsive table-bordered table-striped" >
            <thead>
              <tr>
                <th style=" text-align: center; ">No</th>
                <th style=" text-align: center; ">NIK</th>
                <th style=" text-align: center; ">Nama</th>
                <th style=" text-align: center; ">JK</th>
                <th style=" text-align: center; ">Instansi</th>
                <th style=" text-align: center; ">Alamat</th>
                <th style=" text-align: center; ">Biaya</th>
                <th style=" text-align: center; ">Aksi</th>
              </tr>
            </thead>
            <tbody>
               <?php $no=1; foreach ($wisatawan as $u){  ?>
                    <tr>
                        <td style=" text-align: center; "><?php echo $no++; ?></td>
                        <td><?php echo $u->NIK; ?></td>
                        <td><?php echo $u->nama; ?></td>
                        <td><?php echo $u->jk; ?></td>
                        <td><?php echo $u->instansi; ?></td>
                        <td><?php echo $u->alamat; ?></td>
                        <td style=" text-align: right; " ><?php echo $u->biaya; ?></td>
                        
                      <td style=" text-align: center; "> 
                          <a class="btn btn-warning glyphicon glyphicon-eye-open" href="detail_wisatawan/<?php echo $u->NIK; ?> "> </a>
                           <a class="btn btn-info glyphicon glyphicon-edit" href="edit_wisatawan/<?php echo $u->NIK; ?> "> </a>
                         <a class="btn btn-danger glyphicon glyphicon-trash" href="deletewisatawan/<?php echo  $u->NIK; ?>"></a>
                        </td>
                    </tr>
                        <?php } ?>
                     <tr>
                        <?php foreach($total as $a) ?>
                        <td colspan="6"><strong>Total</strong></td>
                        <td style=" text-align: right; "><b><?php echo $a->total?></b></td>
                        <td></td>
                    </tr>
              
            </tbody>

          </table>

          </div>

        </div>
         <div class="col-md-11 text-left">
          <a class="btn btn-success glyphicon glyphicon-print" href="download" ></a></div> 
        </div>
        </div>
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
   <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    
         <!-- Bootstrap Js CDN -->
         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
          <script type="text/javascript">
    $(document).ready(function() {
        $('#table1').DataTable();
    } );
    </script>
  </body>
</html>
