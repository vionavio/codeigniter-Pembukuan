<div style=" padding-top: 3px; padding-bottom: 5px; background: #29a053; color: white; font-family: 'comfortaa' ">
<center> <h3>PEMBUKUAN DESA WISATA GABUGAN</h3>
<h5> Gabugan, Donokerto, Turi, Sleman, Yogyakarta </h5>
<h5>Website : www.desawisatagabugan.com </h5>
 </center>
</div>
      <div class="wrapper">
        <nav id="sidebar">

      

        <?php if($this->session->userdata('akses')=='3') { ?>
        <ul class="list-unstyled components">
            <li>
                <a href="<?php echo base_url().'admin'?>">
                    <i  class="glyphicon glyphicon-home"></i>
                    Home
                </a>
            </li>
             <li>
                <a href="<?php echo base_url().'admin/data_wisatawan'?>">
                    <i class="glyphicon glyphicon-list"></i>
                    Data Wisatawan
                </a>
            </li> 
            <li>
                <a href="<?php echo base_url().'admin/sort'?>">
                    <i class="glyphicon glyphicon-list"></i>
                    Sorting Data
                </a>
            </li> 
           
           
        </ul>
        <center>
            <b><a href="<?php echo base_url().'login/logout'?>">Sign Out</a></b></center>
        <?php } ?>




 </nav>