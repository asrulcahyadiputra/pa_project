<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_material extends CI_Model
{
	public function all()
	{

		return $this->db->get('raw_materials')->result_array();
	}


	private function id()
	{
		$this->db->select('RIGHT(material_id,9) as id', FALSE);
		$this->db->order_by('material_id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('raw_materials');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$code = intval($data->id) + 1;
		} else {
			$code = 1;
		}

		$interval = str_pad($code, 9, "0", STR_PAD_LEFT);
		$id = "MT-" . $interval;
		return $id;
	}
	public function insert()
	{
		$data = [
			'material_id'			=> $this->id(),
			'material_name'		=> $this->input->post('material_name'),
			'material_unit' 		=> $this->input->post('material_unit'),
		];
		if ($this->db->insert('raw_materials', $data)) {
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
	public function update()
	{
		$id = $this->input->post('material_id');
		$data = [

			'material_name'		=> $this->input->post('material_name'),
			'material_unit' 		=> $this->input->post('material_unit'),
		];
		if ($this->db->update('raw_materials', $data, ['material_id' => $id])) {
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

/* End of file M_material.php */
