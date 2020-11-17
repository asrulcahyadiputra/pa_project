<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pelanggan extends CI_Model
{

	public function all()
	{
		return $this->db->get('clients')->result_array();
	}
	private function id()
	{
		$this->db->select('RIGHT(client_id,4) as id', FALSE);
		$this->db->order_by('client_id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('clients');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$code = intval($data->id) + 1;
		} else {
			$code = 1;
		}

		$interval = str_pad($code, 4, "0", STR_PAD_LEFT);
		$id = "PL-" . $interval;
		return $id;
	}
	public function insert()
	{
		$data = [
			'client_id'		=> $this->id(),
			'client_name'		=> $this->input->post('client_name'),
			'client_company'	=> $this->input->post('client_company'),
			'client_address'	=> $this->input->post('client_address'),
			'client_phone'		=> $this->input->post('client_phone'),
			'client_email'		=> $this->input->post('client_email'),
			'created_by'		=> 1 //temporary
		];
		if ($this->db->insert('clients', $data)) {
			$respons = [
				'status'	=> 1
			];
		} else {
			$respons = [
				'status'	=> 1
			];
		}
		return $respons;
	}
	public function update()
	{
		$id = $this->input->post('client_id');
		$data = [
			'client_name'		=> $this->input->post('client_name'),
			'client_company'	=> $this->input->post('client_company'),
			'client_address'	=> $this->input->post('client_address'),
			'client_phone'		=> $this->input->post('client_phone'),
			'client_email'		=> $this->input->post('client_email'),
			'created_by'		=> 1 //temporary
		];
		if ($this->db->update('clients', $data, ['client_id' => $id])) {
			$respons = [
				'status'	=> 1
			];
		} else {
			$respons = [
				'status'	=> 1
			];
		}
		return $respons;
	}
}

/* End of file M_pelanggan.php */
