<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_contract extends CI_Model
{

	public function clients()
	{
		return $this->db->get_where('clients', ['status' => 1])->result_array();
	}
	public function type_of_project()
	{
		return $this->db->get('type_of_project')->result_array();
	}
	public function payment_method()
	{
		return $this->db->get('payment_method')->result_array();
	}
	public function find_type_project($t_project_id)
	{
		return $this->db->get_where('type_of_project', ['t_project_id' => $t_project_id])->row_array();
	}
	public function all()
	{
		$this->db->select('a.trans_id,a.t_project_id,a.total,b.t_project_name,c.project_name,c.project_due_date,d.client_name')
			->from('transactions as a')
			->join('type_of_project as b', 'a.t_project_id=b.t_project_id')
			->join('project as c', 'c.trans_id=a.trans_id')
			->join('clients as d', 'd.client_id=a.client_id')
			->where('a.trans_type', 'contract');

		return $this->db->get()->result_array();
	}
	public function select($id)
	{
		$this->db->select('a.trans_id,a.t_project_id,a.surface_area,a.total,b.t_project_name,c.project_name,c.project_due_date,d.client_name,d.client_phone,d.client_address,e.p_method_step')
			->from('transactions as a')
			->join('type_of_project as b', 'a.t_project_id=b.t_project_id')
			->join('project as c', 'c.trans_id=a.trans_id')
			->join('clients as d', 'd.client_id=a.client_id')
			->join('payment_method as e', 'a.p_method_id=e.p_method_id')
			->where('a.trans_type', 'contract')
			->where('a.trans_id', $id);

		return $this->db->get()->row_array();
	}
	public function count_payment($id)
	{
		$this->db->select('count(payment_id) as payment_progress');
		$this->db->group_by('trans_id');
		return $this->db->get_where('payments', ['trans_id' => $id])->row_array();
	}
	public function timeline($id)
	{
		$this->db->order_by('due', 'ASC');
		return $this->db->get_where('project_timeline', ['trans_id' => $id])->result_array();
	}
	private function trans_id()
	{
		$this->db->select('RIGHT(trans_id,9) as trans_id', FALSE);
		$this->db->where('trans_type', 'contract');
		$this->db->order_by('trans_id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('transactions');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$id = intval($data->trans_id) + 1;
		} else {
			$id = 1;
		}
		$code = str_pad($id, 9, "0", STR_PAD_LEFT);
		$trans_id = "TRX-KNT-" . $code;
		return $trans_id;
	}
	public function insert()
	{
		$trans_id 	= $this->trans_id();
		$project_name	= $this->input->post('project_name');
		$surface_area	= $this->input->post('surface_area');
		$client_id	= $this->input->post('client_id');
		$t_project_id	= $this->input->post('t_project_id');
		$project_start = $this->input->post('project_start');
		$project_days 	= $this->input->post('project_days');
		$project_due 	= date('Y-m-d', strtotime('+' . $project_days . 'days', strtotime($project_start)));
		$p_method_id	= $this->input->post('p_method_id');
		$total		=  intval(preg_replace("/[^0-9]/", "", $this->input->post('total'))); 	// contract price
		$nominal		=  intval(preg_replace("/[^0-9]/", "", $this->input->post('nominal'))); 	//down payment
		$trans_type	= "contract";

		$transaction = [
			'trans_id'		=> $trans_id,
			'client_id'		=> $client_id,
			't_project_id'		=> $t_project_id,
			'p_method_id'		=> $p_method_id,
			'surface_area'		=> $surface_area,
			'total'			=> $total,
			'project_progress'	=> 0,
			'trans_type'		=> $trans_type,
			'created_by'		=> 1 //temporary
		];
		$project = [
			'trans_id'		=> $trans_id,
			'project_name'		=> $project_name,
			'project_start'	=> $project_start,
			'project_due_date'	=> $project_due
		];
		$payment = [
			'trans_id'		=> $trans_id,
			'nominal'			=> $nominal,
			'description'		=> 'Down Payment (Dp)'
		];
		$timeline = [
			'trans_id'		=> $trans_id,
			'pt_name'			=> 'Start',
			'due'			=> $project_start,
			'done'			=> 0,
			'created_by'		=> 1 //temporary
		];
		$gl = [
			[
				'account_no'		=> '1-10001',
				'gl_date'			=> date('Y-m-d'),
				'gl_ref'			=> $trans_id,
				'gl_balance'		=> 'd',
				'gl_nominal'		=> $nominal
			],
			[
				'account_no'		=> '2-10001',
				'gl_date'			=> date('Y-m-d'),
				'gl_ref'			=> $trans_id,
				'gl_balance'		=> 'k',
				'gl_nominal'		=> $nominal
			]
		];
		// echo "<pre>";
		// print_r($payment);
		// echo "</pre>";
		// die;
		$this->db->trans_start();
		$this->db->insert('transactions', $transaction);
		$this->db->insert('project', $project);
		$this->db->insert('payments', $payment);
		$this->db->insert('project_timeline', $timeline);
		$this->db->insert_batch('general_ledger', $gl);
		$this->db->trans_complete();
	}
	public function add_timeline($trans_id)
	{
		$timeline = [
			'trans_id'		=> $trans_id,
			'pt_name'			=> $this->input->post('pt_name'),
			'due'			=> $this->input->post('due'),
			'done'			=> 0,
			'created_by'		=> 1 //temporary
		];
		return $this->db->insert('project_timeline', $timeline);
	}
}

/* End of file M_contract.php */
