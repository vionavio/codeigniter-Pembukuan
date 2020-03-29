<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_Database extends CI_Model {

    public function show_all_data() {
        $this->db->select('*');
        $this->db->from('datawisatawan');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    // public function show_data_by_id($id) {
    //     $condition = "emp_id =" . "'" . $id . "'";
    //     $this->db->select('*');
    //     $this->db->from('employee_info');
    //     $this->db->where($condition);
    //     $this->db->limit(1);
    //     $query = $this->db->get();

    //     if ($query->num_rows() == 1) {
    //         return $query->result();
    //     } else {
    //         return false;
    //     }
    // }

    // public function show_data_by_date($date) {
    //     $condition = "tgl_checkin =" . "'" . $date . "'";
    //     $this->db->select('*');
    //     $this->db->from('employee_info');
    //     $this->db->where($condition);
    //     $query = $this->db->get();
    //     if ($query->num_rows() > 0) {
    //         return $query->result();
    //     } else {
    //         return false;
    //     }
    // }

    function get_sum($data)
    {
          $condition = "tgl_checkin  BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";

        $this->db->select_sum('jml');
        $this->db->from('datawisatawan');
        $this->db->where($condition);
        return $this->db->get('')->row();
    }

    function total_penjualan2($data){
        $condition = "tgl_checkin  BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
     $this->db->select_sum('biaya');
        $this->db->from('datawisatawan');
        $this->db->where($condition);
        return $this->db->get('')->row();
    }

    function get_sum2()
    {
       
        $this->db->select_sum('jml');
        $this->db->from('datawisatawan');
        return $this->db->get('')->row();
    }

    public function show_data_by_date_range($data) {
        $condition = "tgl_checkin  BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
        $this->db->select('*');
        $this->db->from('datawisatawan');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

}
