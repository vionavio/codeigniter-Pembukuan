<?php

class Page extends CI_Controller
{
  
  function __construct()
  {
    parent::__construct();
    $this->load->model('Page_model');
    $this->load->model('Admin_model');
  }

  function index()
  {
    $this->load->view('frontend/page');
    $this->load->view('frontend/footer');
  }

  function simpanpage()
  {
    $this->Page_model->savepage();
    redirect('page');
  }
}
