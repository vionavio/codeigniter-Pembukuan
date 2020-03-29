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
      <div class="col-md-6 col-md-offset-3">
        <div class="row">
         
          <center><h2>Update Data Wisatawan</h2></center>
          <?php

                foreach ($edit_data as $wisata) {
                    
                ?>
            
             <form role="form" method="post" action="<?php echo base_url()."Admin/save_edit"; ?>" enctype="multipart/form-data">
             <input type="hidden" name="NIK" value="<?php echo $wisata->NIK; ?>">
                <div class="box-body">

                

                 <div class="form-group">
                  <label for="NIK">NIK</label>
                  <input required type="number" class="form-control" id="NIK" name="NIK" value="<?php echo $wisata->NIK; ?>" >
                  </div>

                   <div class="form-group">
                  <label for="nama">Nama</label>
                  <input required type="text" class="form-control" id="nama" name="nama" value="<?php echo $wisata->nama; ?>" >
                  </div>

                  <div class="form-group">
                 <label for="jk" >Jenis Kelamin</label> <br>
                 <select class="form-control required" id="jk" name="jk"   value="<?php echo $wisata->jk ?>">
                 <option required ><?php echo $wisata->jk ?></option>
                 <option value="L">L</option>
                 <option value="P">P</option>
                 </select>
                 </div>

                  <div class="form-group">
                  <label for="email">Email</label>
                  <input required type="text" class="form-control" id="email" name="email" value="<?php echo $wisata->email; ?>" >
                  </div>

                   <div class="form-group">
                  <label for="no_telp">No Telp</label>
                  <input required type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo $wisata->no_telp; ?>" >
                  </div>

                   <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea required name="alamat" rows="5" cols="55" class="form-control " id="alamat"  ><?php echo $wisata->alamat; ?></textarea>
                  </div>

                   <div class="form-group">
                  <label for="instansi">Instansi</label>
                  <input required type="text" class="form-control" id="instansi" name="instansi" value="<?php echo $wisata->instansi; ?>">
                  </div>

                  <div class="form-group">
                 <label for="paket" >Paket</label> <br>
                 <select class="form-control"  name="paket">
                 <option required ><?php echo $wisata->paket ?></option>
                 <option value="Paket Rombongan Kecil">Paket Rombongan Kecil ( < 50 orang)</option>
                 <option value="Paket Rombongan Besar">Paket Rombongan Besar ( > 50 orang)</option>
                 <option value="Paket Keluarga">Paket Keluarga ( <= 10 orang)</option>
                 </select>
                 </div>

                 <div class="form-group">
                  <label for="jml">Jumlah Orang</label>
                  <input required type="text" class="form-control" id="jml" name="jml" value="<?php echo $wisata->jml; ?>" >
                  </div>

                 <div class="form-group">
                  <label for="biaya">Total Harga</label>
                  <input required type="text" class="form-control" id="biaya" name="biaya" value="<?php echo $wisata->biaya; ?>" >
                  </div>

                  <div class="form-group">
                  <label for="tgl_checkin">Tanggal Check In</label>
                  <input required type="date" class="form-control" id="tgl_checkin" name="tgl_checkin" value="<?php echo $wisata->tgl_checkin; ?>">
                  </div>

                  <div class="form-group">
                  <label for="tgl_checkout">Tanggal Check Out</label>
                  <input required type="date" class="form-control" id="tgl_checkout" name="tgl_checkout" value="<?php echo $wisata->tgl_checkout; ?>" >
                  </div>
                 
              </div>
                
              <div class="box-footer">
                <input  type="submit" class="btn btn-success" name="edit" value="Update">
                <input type="reset" class="btn btn-danger" value="Reset" />
              </div>
            </form>

               <?php } ?>
         
        </div>
      </div>
    </div>

    <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

  </body>
</html>