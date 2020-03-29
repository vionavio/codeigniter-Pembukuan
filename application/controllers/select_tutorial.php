<?php


class Select_Tutorial extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('table');
        $this->load->model('employee_database');
    }

    public function index() {
        if($this->session->userdata('akses')=='3' ){
       $data['show_table'] = $this->view_table();
        $this->load->view('select_form', $data); }
    }
    public function view_table(){
        if($this->session->userdata('akses')=='3' ){
       $result = $this->employee_database->show_all_data();
        if ($result != false) {
            return $result;
        } else {
            return 'Database is empty !';
        } 
    }}

    // public function select_by_id() {
    //     $id = $this->input->post('id');
    //     if ($id != "") {
    //         $result = $this->employee_database->show_data_by_id($id);
    //         if ($result != false) {
    //             $data['result_display'] = $result;
    //         } else {
    //             $data['result_display'] = "No record found !";
    //         }
    //     } else {
    //         $data = array(
    //             'id_error_message' => "Id field is required"
    //         );
    //     }
    //     $data['show_table'] = $this->view_table();
    //     $this->load->view('select_form', $data);
    // }

    // public function select_by_date() {
    //     $date = $this->input->post('date');
    //     if ($date != "") {
    //         $result = $this->employee_database->show_data_by_date($date);
    //         if ($result != false) {
    //             $data['result_display'] = $result;
    //         } else {
    //             $data['result_display'] = "No record found !";
    //         }
    //     } else {
    //         $data['date_error_message'] = "Date field is required";
    //     }
    //     $data['show_table'] = $this->view_table();
    //     $this->load->view('select_form', $data);
    // }

    public function select_by_date_range() {
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
        }
        $data['show_table'] = $this->view_table();
        $this->load->view('select_form', $data);
    }}

}
