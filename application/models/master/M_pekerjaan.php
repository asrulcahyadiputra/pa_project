<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pekerjaan extends CI_Model
{

	public function work_group_list()
	{
		return $this->db->get('work_group')->result_array();
	}
	public function all()
	{
		$this->db->select("a.work_id,a.work_name,a.work_unit,b.work_group_id,b.work_group_name")
			->from('type_of_work as a')
			->join('work_group as b', 'a.work_group_id=b.work_group_id');

		return $this->db->get()->result_array();
	}
	private function id()
	{
		$this->db->select('RIGHT(work_id,4) as id', FALSE);
		$this->db->order_by('work_id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('type_of_work');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$code = intval($data->id) + 1;
		} else {
			$code = 1;
		}

		$interval = str_pad($code, 4, "0", STR_PAD_LEFT);
		$id = "PK-" . $interval;
		return $id;
	}
	public function insert()
	{
		$data = [
			'work_id'			=> $this->id(),
			'work_name'		=> $this->input->post('work_name'),
			'work_group_id' 	=> $this->input->post('work_group_id'),
			'work_unit'		=> $this->input->post('work_unit'),
			'created_by'		=> 1, //temporary
		];
		if ($this->db->insert('type_of_work', $data)) {
			$response = [
				'status'	=> 1
			];
		} else {
			$response = [
				'status'	=> 1
			];
		}
		return $response;
	}
	public function update()
	{
		$id = $this->input->post('work_id');
		$data = [
			'work_name'		=> $this->input->post('work_name'),
			'work_group_id' 	=> $this->input->post('work_group_id'),
			'work_unit'		=> $this->input->post('work_unit'),
			'updated_by'		=> 1, //temporary
		];
		if ($this->db->update('type_of_work', $data, ['work_id' => $id])) {
			$response = [
				'status'	=> 1
			];
		} else {
			$response = [
				'status'	=> 1
			];
		}
		return $response;
	}
}

/* End of file M_pekerjaan.php */
