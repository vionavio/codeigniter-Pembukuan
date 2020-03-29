<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 


require APPPATH . '/third_party/PHPExcel/PHPExcel.php';

class Excel extends PHPExcel {
	public function __construct()
    {
        parent::__construct();
        
    }
}