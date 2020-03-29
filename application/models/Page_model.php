<?php

class Page_model extends CI_Model
{
  
  function savepage()
  {
    $data = array(
      'NIK'       => $_POST['NIK'],
      'nama'      => $_POST['nama'],
      'jk'      => $_POST['jk'],
      'email'     => $_POST['email'],
      'no_telp'     => $_POST['no_telp'],
      'alamat'    => $_POST['alamat'],
      'instansi'    => $_POST['instansi'],
      'paket'     => $_POST['paket'],
      'jml'     => $_POST['jml'],
      'total_harga' => $_POST['total_harga'],
      'tgl_checkin' => $_POST['tgl_checkin'],
      'tgl_checkout'=> $_POST ['tgl_checkout']
    );

    $this->db->insert('datawisatawan', $data);
  }

}
