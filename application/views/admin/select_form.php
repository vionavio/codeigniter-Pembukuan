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
          <center><h4>Filter Data Wisatawan</h4></center>
         
            <div class="col-md-12">
          <div class="box box-primary">
     <div>
            <div class="message">
                <?php
                if (isset($read_set_value)) {
                    echo $read_set_value;
                }
                if (isset($message_display)) {
                    echo $message_display;
                }
                ?>
            </div>

            <div id="show_form">
               
                <?php
               
                echo form_open('admin/select_by_date_range');
                echo form_label('Select By Range Of Dates : ');
                echo "<br/>";

                echo "Dari Tanggal : ";
                $data = array(
                    'type' => 'date',
                    'name' => 'date_from',
                    'value' => ''
                );
                echo form_input($data);
                
                echo " Sampai Tanggal : ";
                $data = array(
                    'type' => 'date',
                    'name' => 'date_to',
                    'value' => ''
                );
                echo form_input($data);
                echo "<div class='error_msg'>";
                if (isset($date_range_error_message)) {
                    echo $date_range_error_message;
                }
                echo "<br/>";
                echo form_submit('submit', 'Check Hasil');
                echo form_close();
                ?>
                <div class="message">
                    <?php
                    if (isset($result_display)) {
                        echo "<p><u>Result</u></p>";
                        if ($result_display == 'No record found !') {
                            echo $result_display;
                        } else { ?>
                            <table class='result_table table table-hover table-responsive table-bordered table-striped'>
                                  <tr><th>No</th>
                                      <th>NIK</th>
                                      <th>Nama</th>
                                      <th>JK</th>
                                      <th>Email</th>
                                      <th>No Telp</th>
                                      <th>Alamat</th>
                                      <th>Instansi</th>
                                      <th>Paket</th>
                                      <th>Peserta</th>
                                      <th>Biaya</th>
                                      <th>Tgl Check In</th>
                                      <th>Tgl Check Out</th>
                                      <tr/>
                           <?php $no=1;  foreach ($result_display as $value) {  ?>
                                     <tr> 
                                     <td>        <?php echo $no++; ?> </td>
                                     <td class="NIK"> <?php echo $value->NIK ?> </td>
                                     <td> <?php echo $value->nama; ?> </td> 
                                     <td> <?php echo $value->jk; ?> </td> 
                                     <td> <?php echo $value->email; ?> </td> 
                                     <td> <?php echo $value->no_telp; ?> </td> 
                                     <td> <?php echo $value->alamat; ?> </td> 
                                     <td> <?php echo $value->instansi; ?> </td> 
                                     <td> <?php echo $value->paket; ?> </td> 
                                     <td style="text-align: right;"> <?php echo $value->jml; ?> </td> 
                                     <td style="text-align: right;"> <?php echo $value->biaya; ?> </td> 
                                     <td class="j_date"> <?php echo $value->tgl_checkin ?> </td> 
                                     <td class="j_date"> <?php echo $value->tgl_checkout ?> </td> 
                                    <tr/>
                            <?php } ?>
                            <tr>
                           <td style=" text-align: center; " colspan="9"><strong>Total</strong></td>

                           <td style="text-align: right;"> <?php echo $sum_jumlah->jml; ?> </td>

                           <td style="text-align: right;"> <?php echo $total->biaya; ?> </td>
                           
                           <td colspan="2"></td>
                            </tr>
                            </table>
                       <?php } ?>
                   <?php }
                    ?>

                </div>
            </div>
            <?php
            if (isset($show_table)) {
                echo "<div class='emp_table'>";
                if ($show_table == 'Database is empty !') {
                    echo $show_table;
                } else { ?>
                    <caption>Employee Table</caption><br/><br/>
                    <table class="table table-hover table-responsive table-bordered table-striped" >
                    <tr>
                          <th>No</th>
                          <th class="NIK">NIK</th>
                          <th>Nama</th>
                          <th>JK</th>
                          <th>Email</th>
                          <th>No Telp</th>
                          <th>Alamat</th>
                          <th>Instansi</th>
                          <th>Paket</th>
                          <th>Peserta</th>
                          <th>Biaya</th>
                          <th>Tgl Check In</th>
                          <th>Tgl Check Out</th>
                    <tr/>
                   <?php $no=1; foreach ($show_table as $value) { ?>
                        <tr>
                             <td>  <?php echo $no++; ?></td>
                             <td class='NIK'> <?php echo $value->NIK ?></td> 
                             <td> <?php echo $value->nama ?> </td> 
                             <td> <?php echo $value->jk ?> </td> 
                             <td> <?php echo $value->email ?> </td> 
                             <td> <?php echo $value->no_telp ?> </td> 
                             <td> <?php echo $value->alamat ?> </td> 
                             <td> <?php echo $value->instansi ?> </td> 
                             <td> <?php echo $value->paket ?> </td> 
                             <td style="text-align: right;"> <?php echo $value->jml ?> </td> 
                             <td style="text-align: right;"> <?php echo $value->biaya ?> </td> 
                             <td class="j_date"> <?php echo $value->tgl_checkin ?> </td> 
                             <td class="j_date"> <?php echo $value->tgl_checkout ?> </td> 
                             <tr/>
                  <?php  } ?>
                 <!--  <tr>
                           <td style=" text-align: center; " colspan="9"><strong>Total</strong></td>
                           <td style="text-align: right;"> <?php echo $sum_jumlah->jml;  ?> </td>
                            <?php foreach($total as $a) ?> <td style="text-align: right;"> <?php echo $a->total?>  </td>
                          
                           <td colspan="2"></td>
                            </tr> -->
                    </table>
              <?php  } ?>
                </div>
           <?php }
            ?>
        </div>
    </div>
        

        <table id="table1" class="table table-hover table-responsive table-bordered table-striped" >
           
          

          </table>

          </div>

        </div>

         
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
