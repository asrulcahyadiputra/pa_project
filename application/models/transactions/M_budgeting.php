<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_budgeting extends CI_Model
{
	public function all()
	{
		$this->db->select('a.trans_id,a.t_project_id,a.total,a.status,b.t_project_name,c.project_name,c.project_due_date,d.client_name')
			->from('transactions as a')
			->join('type_of_project as b', 'a.t_project_id=b.t_project_id')
			->join('project as c', 'c.trans_id=a.trans_id')
			->join('clients as d', 'd.client_id=a.client_id')
			->where('a.trans_type', 'contract');

		return $this->db->get()->result_array();
	}
	public function select_project($trans_id)
	{
		$this->db->select('a.trans_id,a.t_project_id,a.total,a.status,b.t_project_name,c.project_name,c.project_due_date,d.client_name')
			->from('transactions as a')
			->join('type_of_project as b', 'a.t_project_id=b.t_project_id')
			->join('project as c', 'c.trans_id=a.trans_id')
			->join('clients as d', 'd.client_id=a.client_id')
			->where('a.trans_type', 'contract')
			->where('a.trans_id', $trans_id);

		return $this->db->get()->row_array();
	}
	public function work_group()
	{
		return $this->db->get('work_group')->result_array();
	}
	public function work_type()
	{
		$this->db->select("a.work_id,a.work_name,a.work_unit,b.work_group_id,b.work_group_name")
			->from('type_of_work as a')
			->join('work_group as b', 'a.work_group_id=b.work_group_id');

		return $this->db->get()->result_array();
	}

	public function select($trans_id)
	{
		$this->db->select('a.trans_id,a.t_project_id,a.description,b.t_project_name')
			->from('transactions as a')
			->join('type_of_project as b', 'a.t_project_id=b.t_project_id')
			->where('a.trans_type', 'mapping')
			->where('a.trans_id', $trans_id);

		return $this->db->get()->row_array();
	}
	public function find_detail($trans_id)
	{
		$project = $this->db->get_where('transactions', ['trans_id' => $trans_id, 'trans_type' => 'contract'])->row_array();
		$this->db->select('a.trans_id,a.t_project_id,b.pm_id,b.work_id,c.work_name,c.work_unit,c.work_group_id,d.work_group_name')
			->from('transactions as a')
			->join('project_mapping as b', 'a.trans_id=b.trans_id')
			->join('type_of_work as c', 'c.work_id=b.work_id')
			->join('work_group as d', 'd.work_group_id=c.work_group_id')
			->where('a.trans_type', 'mapping')
			->where('a.t_project_id', $project['t_project_id']);

		return $this->db->get()->result_array();
	}
	public function find_project_material($trans_id)
	{
		$project = $this->db->get_where('transactions', ['trans_id' => $trans_id, 'trans_type' => 'contract'])->row_array();
		$this->db->select('a.trans_id,a.t_project_id,b.pjm_id,b.material_id,c.material_name,c.material_unit,b.work_group_id,d.work_group_name')
			->from('transactions as a')
			->join('project_material as b', 'a.trans_id=b.trans_id')
			->join('raw_materials as c', 'c.material_id=b.material_id')
			->join('work_group as d', 'd.work_group_id=b.work_group_id')
			->where('a.trans_type', 'mapping')
			->where('a.t_project_id', $project['t_project_id']);

		return $this->db->get()->result_array();
	}
	public function select_detail($trans_id)
	{
		$this->db->select('a.trans_id,a.t_project_id,b.pb_id,b.work_id,b.pb_unit,b.pb_qty_budget,b.pb_unit_price_budget,c.work_id,c.work_name,c.work_group_id,d.work_group_name')
			->from('transactions as a')
			->join('project_budget as b', 'a.trans_id=b.trans_id')
			->join('type_of_work as c', 'c.work_id=b.work_id')
			->join('work_group as d', 'd.work_group_id=c.work_group_id')
			->where('a.trans_type', 'contract')
			->where('a.trans_id', $trans_id);

		return $this->db->get()->result_array();
	}
	public function insert()
	{
		$trans_id 	= $this->input->post('trans_id');
		$work_id		= $this->input->post('work_id');
		$material_id	= $this->input->post('material_id');

		$transactions = [
			'status'	=> 1
		];

		// budgeting
		foreach ($work_id as $key => $val) {
			$project_budget[] = [
				'trans_id'			=> $trans_id,
				'work_id'				=> $work_id[$key],
				'pb_unit'				=> $this->input->post('pb_unit')[$key],
				'pb_qty_budget'		=> $this->input->post('pb_qty_budget')[$key],
				'pb_unit_price_budget'	=> intval(preg_replace("/[^0-9]/", "", $this->input->post('pb_unit_price_budget')[$key])),
			];
		}

		// material budget
		foreach ($material_id as $i => $mat) {
			$material_budget[] = [
				'trans_id'			=> $trans_id,
				'material_id'			=> $this->input->post('material_id')[$i],
				'mb_unit'				=> $this->input->post('mb_unit')[$i],
				'mb_qty_budget'		=> $this->input->post('mb_qty_budget')[$i],
				'mb_unit_price_budget'	=> intval(preg_replace("/[^0-9]/", "", $this->input->post('mb_unit_price_budget')[$i])),
			];
		}
		$this->db->trans_start();
		$this->db->update('transactions', $transactions, ['trans_id'	=> $trans_id]);
		$this->db->insert_batch('project_budget', $project_budget);
		$this->db->insert_batch('material_budget', $material_budget);
		$this->db->trans_complete();
		$response = [
			'status'	=> 1
		];
		return $response;
	}
	public function update()
	{

		$pb_id		= $this->input->post('pb_id');
		foreach ($pb_id as $key => $val) {
			$project_budget[] = [
				'pb_id'				=> $this->input->post('pb_id')[$key],
				'pb_unit'				=> $this->input->post('pb_unit')[$key],
				'pb_qty_budget'		=> $this->input->post('pb_qty_budget')[$key],
				'pb_unit_price_budget'	=> intval(preg_replace("/[^0-9]/", "", $this->input->post('pb_unit_price_budget')[$key])),
			];
		}
		$this->db->trans_start();
		$this->db->update_batch('project_budget', $project_budget, 'pb_id');
		$this->db->trans_complete();
		$response = [
			'status'	=> 1
		];
		return $response;
	}
}

/* End of file M_budgeting.php */
