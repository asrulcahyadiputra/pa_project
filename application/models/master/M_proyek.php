<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_proyek extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}
	// get all data
	public function all()
	{
		return $this->db->get('type_of_project')->result_array();
	}
	private function id()
	{
		$this->db->select('RIGHT(t_project_id,4) as id', FALSE);
		$this->db->order_by('t_project_id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('type_of_project');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$code = intval($data->id) + 1;
		} else {
			$code = 1;
		}

		$interval = str_pad($code, 4, "0", STR_PAD_LEFT);
		$id = "JP-" . $interval;
		return $id;
	}
	// insert data to database
	public function insert()
	{
		$data = [
			't_project_id'			=> $this->id(),
			't_project_name'		=> $this->input->post('t_project_name'),
			'type'				=> $this->input->post('type'),
			't_project_estimation'	=> $this->input->post('t_project_estimation'),
			't_project_price'		=> intval(preg_replace("/[^0-9]/", "", $this->input->post('t_project_price'))),
			'created_by'			=> 1, //temporary
		];
		if ($this->db->insert('type_of_project', $data)) {
			$response = [
				'status'	=> 1
			];
		} else {
			$response = [
				'status'	=> 0
			];
		}
		return $response;
	}
	// update data from database
	public function update()
	{
		$id = $this->input->post('t_project_id');
		$data = [
			't_project_name'		=> $this->input->post('t_project_name'),
			'type'				=> $this->input->post('type'),
			't_project_estimation'	=> $this->input->post('t_project_estimation'),
			't_project_price'		=> intval(preg_replace("/[^0-9]/", "", $this->input->post('t_project_price'))),
			'updated_by'			=> 1, //temporary
		];
		if ($this->db->update('type_of_project', $data, ['t_project_id' => $id])) {
			$response = [
				'status'	=> 1
			];
		} else {
			$response = [
				'status'	=> 0
			];
		}
		return $response;
	}
}

/* End of file M_proyek.php */
