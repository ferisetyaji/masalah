<?php

class General extends CI_Model{

	public function read($table, $id = array())
	{
		if(empty($id)){
			$query = $this->db->get($table);
			return $query->result();
		}else{
			$query = $this->db->get_where($table, $id);
			return $query->row();
		}
	}

	public function read_by($table, $cols = 'id')
	{
		$this->db->order_by($cols, 'DESC');
		$query = $this->db->get($table);
		return $query->result();
	}

	public function last_position($table, $cols)
	{
		$this->db->order_by($cols, 'DESC');
		$query = $this->db->get($table);
		$query = $query->row();
		$nilai = !empty($query) ? $query->position+1: 1;
		return $nilai;
	}

	public function last($table, $cols = 'DESC')
	{
		$this->db->order_by('id', $cols);
		$query = $this->db->get($table);
		return $query->row();
	}

	public function reload($url, $input = array())
	{
		foreach ($input as $input_item) {
			if($this->input->post($input_item)){
				redirect(site_url($url));
			}
		}
	}
}