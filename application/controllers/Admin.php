<?php

class Admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
    $this->load->model('employee_database');

	}

	function index()
	{
    if($this->session->userdata('akses')=='3' ){
		$this->load->view('admin/beranda');
    // $this->load->view('frontend/footer');
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
	}

  function sort()
  {
    if($this->session->userdata('akses')=='3' ){
       // $data['total']=$this->Admin_model->total_penjualan2();
       // $data['sum_jumlah']=$this->employee_database->get_sum();
       $data['show_table'] = $this->view_table();


    $this->load->view('admin/select_form', $data);
    // $this->load->view('frontend/footer');
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  function view_table()
  {
    if($this->session->userdata('akses')=='3' ){
       // $data['sum_jumlah']=$this->Admin_model->get_sum();
       // $data['total']=$this->Admin_model->total_penjualan2();
    $result = $this->employee_database->show_all_data();
        if ($result != false) {
            return $result;
        } else {
            return 'Database is empty !';
        } 
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  function select_by_date_range() {
        if($this->session->userdata('akses')=='3' ){
          
        $date1 = $this->input->post('date_from');
        $date2 = $this->input->post('date_to');
        $data = array(
            'date1' => $date1,
            'date2' => $date2
        );
        if ($date1 == "" || $date2 == "") {
            $data['date_range_error_message'] = "Both date fields are required";
        } else {
            $result = $this->employee_database->show_data_by_date_range($data);
           
            if ($result != false) {
                $data['result_display'] = $result;
            } else {
                $data['result_display'] = "No record found !";
            }
             $data['sum_jumlah'] = $this->employee_database->get_sum($data);
             $data['total']=$this->employee_database->total_penjualan2($data);
        }
        //$data['sum_jumlah']=$this->employee_database->get_sum($data);
        //$data['total']=$this->Admin_model->total_penjualan2();
        $data['show_table'] = $this->view_table();
        $this->load->view('admin/select_form', $data);
    }}

   

	function data_wisatawan()
	{
	    if($this->session->userdata('akses')=='3' ){
      $data['wisatawan'] = $this->Admin_model->get_wisatawan();
      $data['total']=$this->Admin_model->total_penjualan();
       $data['sum_jumlah'] = $this->employee_database->get_sum2();
     // $data['jumlah_harga']=$this->Admin_model->get_total();
      $this->load->view('admin/data_wisatawan',$data);
      // $this->load->view('frontend/footer');
      }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
	}

  function data_harian()
  {
      if($this->session->userdata('akses')=='3' ){
      $data['wisatawan'] = $this->Admin_model->get_wisatawanhari();
      $data['total']=$this->Admin_model->total_penjualan();
     
      $this->load->view('admin/data_harian',$data);
      //$this->load->view('footer');
      }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
    
  }

   

    // public function view_table(){
    //   if($this->session->userdata('akses')=='3' ){
    //    $result = $this->employee_database->show_all_data();
    //     if ($result != false) {
    //         return $result;
    //     } else {
    //         return 'Database is empty !';
    //     } 
    //     }else{
    //   echo "Anda tidak berhak mengakses halaman ini";
    // }
    // }


	 function deletewisatawan($NIK = NULL){
        $this->db->where('NIK', $NIK);
        $this->db->delete('datawisatawan');
        redirect('/admin/data_wisatawan') ;
    }

    function edit_wisatawan($NIK = NULL)
    {
      if($this->session->userdata('akses')=='3' ){
    	$data['edit_data'] = $this->Admin_model->update_wisatawan($NIK);
    	$this->load->view('/admin/halaman_update', $data);
      //$this->load->view('footer');
      }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
    }

    function detail_wisatawan($NIK = NULL)
    {
      if($this->session->userdata('akses')=='3' ){
      $data['edit_data'] = $this->Admin_model->detail_wisatawan($NIK);
      $this->load->view('/admin/detail_wisatawan', $data);
      //$this->load->view('footer');
      }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
    }

    function add_wisatawan()
    {
      if($this->session->userdata('akses')=='3' ){
      $this->load->view('/admin/add_wisatawan');
      //$this->load->view('footer');
      return $this->db->count_all("");
      }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
    }


    function simpanpage()
    {
      $this->Page_model->savepage();
      redirect('/admin/data_wisatawan');
    }

    

   	function save_edit()
   	{
   		 $NIK = $this->input->post('NIK');
   		 $nama = $this->input->post('nama');
   		 $jk = $this->input->post('jk');
   		 $email = $this->input->post('email');
       $no_telp = $this->input->post('no_telp');
   		 $alamat = $this->input->post('alamat');
   		 $instansi = $this->input->post('instansi');
       $paket = $this->input->post('paket');
   		 $jml = $this->input->post('jml');
   		 $biaya = $this->input->post('biaya');
       $tgl_checkin = $this->input->post('tgl_checkin');
       $tgl_checkout = $this->input->post('tgl_checkout');

   		 $data =  array(
		 'NIK' => $NIK,
		 'nama' => $nama,
		 'jk' => $jk,
		 'email' => $email,
     'no_telp' => $no_telp,
		 'alamat' => $alamat,
		 'instansi' => $instansi,
     'paket' => $paket,
		 'jml' => $jml,
		 'biaya' => $biaya,
     'tgl_checkin'=>$tgl_checkin,
     'tgl_checkout'=>$tgl_checkout
   		 );

   		 $this->Admin_model->save_edit_data($NIK,$data);
   		 redirect('/admin/data_wisatawan') ;
   	}

    function download()
    {
       
        $this->load->library('excel');

        $excel = $this->excel->setActiveSheetIndex(0);

       $excel->setCellValue('A1', 'No');
       $excel->setCellValue('B1', 'NIP');
       $excel->setCellValue('C1', 'Nama');
       $excel->setCellValue('D1', 'Jenis Kelamin');
       $excel->setCellValue('E1', 'Email');
       $excel->setCellValue('F1', 'Nomor Telpon');
       $excel->setCellValue('G1', 'Alamat');
       $excel->setCellValue('H1', 'Instansi');
       $excel->setCellValue('I1', 'Paket');
       $excel->setCellValue('J1', 'Jtmlah');
       $excel->setCellValue('K1', 'Tgl Check In');
       $excel->setCellValue('L1', 'Tgl Check Out');
       $excel->setCellValue('M1', 'Biaya');
        $excel->getStyle('A1:M1')->getFont()->setBold(true);
        $excel->getStyle('A1:M1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $styleArray = array(
              'borders' => array(
                  'allborders' => array(
                      'style' => PHPExcel_Style_Border::BORDER_THIN
                  )
              )
          );
        $excel->getStyle('A1:L38')->applyFromArray($styleArray);
        $excel->getColumnDimension('A')->setWidth(5);
        $excel->getColumnDimension('B')->setWidth(25);
        $excel->getColumnDimension('C')->setWidth(20);
        $excel->getColumnDimension('D')->setWidth(15);
        $excel->getColumnDimension('E')->setWidth(20);
        $excel->getColumnDimension('F')->setWidth(15);
        $excel->getColumnDimension('G')->setWidth(25);
        $excel->getColumnDimension('H')->setWidth(25);
        $excel->getColumnDimension('I')->setWidth(25);
        $excel->getColumnDimension('J')->setWidth(25);
        $excel->getColumnDimension('K')->setWidth(20);
        $excel->getColumnDimension('L')->setWidth(30);
        $excel->getColumnDimension('M')->setWidth(25);

        $list = $this->Admin_model->get_wisatawan();
            $no=2;
        foreach ($list as $row) {
            $row = (array) $row;
            $no++;
            $excel  ->setCellValue ( "A".$no, $no-2 )
                    ->setCellValue ( "B".$no, $row["NIK"] )
                    ->setCellValue ( "C".$no, $row["nama"] )
                    ->setCellValue ( "D".$no, $row["jk"] )
                    ->setCellValue ( "E".$no, $row["email"] )
                    ->setCellValue ( "F".$no, $row["no_telp"] )
                    ->setCellValue ( "G".$no, $row["alamat"] )
                    ->setCellValue ( "H".$no, $row["instansi"] )
                    ->setCellValue ( "I".$no, $row["paket"] )
                    ->setCellValue ( "J".$no, $row["jml"] )
                    ->setCellValue ( "K".$no, $row["biaya"] )
                    ->setCellValue ( "L".$no, $row["tgl_checkin"] )
                    ->setCellValue ( "M".$no, $row["tgl_checkout"] );
                  }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data Wisatawan.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        $objWriter->save('php://output');
    }
    
}
