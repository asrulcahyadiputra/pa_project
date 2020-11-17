<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_cara_bayar extends CI_Model
{

	public function all()
	{
		return $this->db->get('payment_method')->result_array();
	}
	private function id()
	{
		$this->db->select('RIGHT(p_method_id,4) as id', FALSE);
		$this->db->order_by('p_method_id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('payment_method');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$code = intval($data->id) + 1;
		} else {
			$code = 1;
		}

		$interval = str_pad($code, 4, "0", STR_PAD_LEFT);
		$id = "CB-" . $interval;
		return $id;
	}
	public function insert()
	{
		$data = [
			'p_method_id'		=> $this->id(),
			'p_method_name'	=> $this->input->post('p_method_name'),
			'p_method_step'	=> $this->input->post('p_method_step'),
			'p_method_total'	=> $this->input->post('p_method_total')
		];
		if ($this->db->insert('payment_method', $data)) {
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
		$id = $this->input->post('p_method_id');
		$data = [
			'p_method_name'	=> $this->input->post('p_method_name'),
			'p_method_step'	=> $this->input->post('p_method_step'),
			'p_method_total'	=> $this->input->post('p_method_total')
		];
		if ($this->db->update('payment_method', $data, ['p_method_id' => $id])) {
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

/* End of file M_cara_bayar.php */
