<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_kelompok extends CI_Model
{

	public function all()
	{
		return $this->db->get('work_group')->result_array();
	}
	private function id()
	{
		$this->db->select('RIGHT(work_group_id,4) as id', FALSE);
		$this->db->order_by('work_group_id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('work_group');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$code = intval($data->id) + 1;
		} else {
			$code = 1;
		}

		$interval = str_pad($code, 4, "0", STR_PAD_LEFT);
		$id = "KP-" . $interval;
		return $id;
	}
	// insert to database
	public function insert()
	{
		$data = [
			'work_group_id'		=> $this->id(),
			'work_group_name'		=> $this->input->post('work_group_name'),
			'created_by'			=> 1 //temporary
		];
		if ($this->db->insert('work_group', $data)) {
			$response = [
				'status'		=> 1
			];
		} else {
			$response = [
				'status'		=> 1
			];
		}
		return $response;
	}
	// update from database
	public function update()
	{
		$id = $this->input->post('work_group_id');
		$data = [

			'work_group_name'		=> $this->input->post('work_group_name'),
			'updated_by'			=> 1 //temporary
		];
		if ($this->db->update('work_group', $data, ['work_group_id' => $id])) {
			$response = [
				'status'		=> 1
			];
		} else {
			$response = [
				'status'		=> 1
			];
		}
		return $response;
	}
}

/* End of file M_kelompok.php */
