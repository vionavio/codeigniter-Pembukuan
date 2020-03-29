<!DOCTYPE html>
<html>
  <head>
    <title>Pembukuan</title>
   
    <link href="<?php echo base_url('assets/css/bootstrap.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
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
        </table>

    <div class="container">
      <div class="col-md-5 col-md-offset-4">
        <div class="row">
         
          <center><h2>Data Wisatawan</h2></center>
          <?php

                foreach ($edit_data as $wisata) {
                ?>
            
             <form role="form" method="post" action="<?php echo base_url()."Admin/save_edit"; ?>" enctype="multipart/form-data">
             <input type="hidden" name="NIK" value="<?php echo $wisata->NIK; ?>">
                <div class="box-body">

                <table>
                  <tr>
                 <div class="form-group">
                  <td style="  width: 250px">
                  <label for="NIK">NIK</label>  </td>
                  <td> <?php echo $wisata->NIK; ?> </td>
                  </div>
                </tr>


                <tr>
                   <div class="form-group">
                  <td><label  for="nama">Nama</label>  </td>
                  <td> <?php echo $wisata->nama; ?> </td>
                  </div>
                </tr>

                <tr>
                  <div class="form-group">
                    <td>
                 <label  for="jk" >Jenis Kelamin</label> </td>
                 <td> <?php echo $wisata->jk ?> </td>
                 </div>
               </tr>

               <tr>
                  <div class="form-group">
                    <td>
                  <label  for="email">Email</label> </td>
                  <td> <?php echo $wisata->email; ?> </td>
                  </div>
                </tr>

                <tr>
                   <div class="form-group">
                    <td>
                  <label  for="no_telp">No Telp</label> </td>
                  <td> <?php echo $wisata->no_telp; ?> </td>
                  </div>
                </tr>

                <tr>
                   <div class="form-group">
                    <td>
                  <label  for="alamat">Alamat</label> </td>
                  <td> <?php echo $wisata->alamat; ?> </td>
                  </div>
                </tr>

                <tr>
                   <div class="form-group">
                    <td>
                  <label  for="instansi">Instansi</label> </td>
                  <td> <?php echo $wisata->instansi; ?> </td>
                  </div>
                </tr>

                <tr>
                  <div class="form-group">
                    <td>
                 <label  for="paket" >Paket</label> </td>
                 <td> <?php echo $wisata->paket ?> </td>
                 </div>

                 <tr>
                 <div class="form-group">
                  <td>
                  <label for="jml">Jumlah Orang</label> </td>
                  <td> <?php echo $wisata->jml; ?> </td>
                  </div>
                </tr>

                <tr>
                 <div class="form-group">
                  <td>
                  <label  for="biaya">Total Harga</label> </td>
                  <td> <?php echo $wisata->biaya; ?> </td>
                  </div>
                </tr>

                <tr>
                  <div class="form-group">
                    <td>
                  <label  for="tgl_checkin">Tanggal Check In</label>
                  </td>
                  <td> <?php echo $wisata->tgl_checkin; ?> </td>
                  </div>
                </tr>

                <tr>
                  <div class="form-group">
                    <td>
                  <label  for="tgl_checkout">Tanggal Check Out</label> </td>
                  <td>
                 <?php echo $wisata->tgl_checkout; ?> </td>
                  </div>
                </tr>

                
              </div>
                
              <!-- <div class="box-footer">
                <input  type="submit" class="btn btn-success" name="edit" value="Cetak">
                <input type="reset" class="btn btn-danger" value="Reset" />
             
              </div> -->
               </table> 
            
            </form>

               <?php } ?>
         
        </div>
      </div>
    </div>
                    <!--  <?php $this->load->view('frontend/footer');?>  -->

    <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

  </body>
</html>