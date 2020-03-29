<?php
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
	}

	function index(){
		$this->load->view('login');
	}

	function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
        $cek_admin=$this->Login_model->auth_admin($username,$password);

        if($cek_admin->num_rows() > 0){ 
				$data=$cek_admin->row_array();
        		$this->session->set_userdata('masuk',TRUE);
		        if($data['level']=='1'){ //Akses admin
		            $this->session->set_userdata('akses','3');
		            $this->session->set_userdata('ses_id',$data['id_admin']);
		            $this->session->set_userdata('ses_name',$data['username']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		            redirect('admin');
		         }
        }
      
        else{  	$url=base_url();
							 echo $this->session->set_flashdata('msg','Username Atau Password Anda Salah');
							redirect($url);
					}

    }

    function logout(){ 
        $this->session->sess_destroy();
        $url=base_url('page');
        redirect($url);
    }

}
