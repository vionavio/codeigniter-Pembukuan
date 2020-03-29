<?php

class Admin_model extends CI_Model
{
	
	function get_wisatawan()
	{
		$user = $this->db->from('datawisatawan')
                           ->get()
                           ->result();
        return $user;
	}

	function get_wisatawanhari()
	{
		$user = $this->db->from('datawisatawan')
							->where('tgl_checkin', 'CURDATE()')
                           ->get()
                           ->result();
        return $user;
	}

	
	function get_total()
	{
		$this->db->select_sum('biaya', 'jumlah');
		$this->db->from('datawisatawan');
		return $this->db->get('')->row();
	}

	function update_wisatawan($NIK)
	{
		$this->db->select('*');
		$this->db->from('datawisatawan');
		$this->db->where('NIK', $NIK);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	function detail_wisatawan($NIK)
	{
		$this->db->select('*');
		$this->db->from('datawisatawan');
		$this->db->where('NIK', $NIK);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}


	function save_edit_data($NIK, $data)
	{
		$this->db->where('NIK', $NIK);
		$this->db->update('datawisatawan', $data);
	}

	function total_penjualan(){
      $query = $this->db->query(" SELECT datawisatawan.biaya, SUM(biaya) as total FROM datawisatawan ");
           
      return $query->result();
    }

    function total_penjualan2(){
      $query = $this->db->query(" SELECT datawisatawan.biaya, SUM(biaya) as total FROM datawisatawan ");
           
      return $query->result();
    }

    function get_sum()
    {
        $this->db->select_sum('jml','biaya');
        $this->db->from('datawisatawan');
        return $this->db->get('')->row();
    }

}
